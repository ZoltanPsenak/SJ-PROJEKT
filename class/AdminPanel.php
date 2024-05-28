<?php
session_start();

class AdminPanel {
    private $conn;

    public function __construct() {
        $this->conn = new mysqli("localhost", "root", "", "projekt");
        if ($this->conn->connect_error) {
            die("Připojení zlyhalo: " . $this->conn->connect_error);
        }
    }

    public function checkUserSession() {
        if (!isset($_SESSION['user'])) {
            header("Location: index.php");
            exit();
        }
    }

    public function checkAdminUser() {
        $loggedInUserEmail = $_SESSION['user']['email'];
        if ($loggedInUserEmail !== 'admin@admin.com') {
            header("Location: index.php");
            exit();
        }
    }

    public function addProduct() {
        if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["add_product"])) {
            $name = $_POST["name"];
            $description = $_POST["description"];
            $price = $_POST["price"];
            $old_price = isset($_POST["old_price"]) ? $_POST["old_price"] : null;
            $sale = isset($_POST["sale"]) ? 1 : 0;
            $category = $_POST["category"];
            $image_path = $_POST["image_path"];

            $target_dir = "images/";
            $target_file = $target_dir . basename($_FILES["image"]["name"]);
            $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
            $newFileName = uniqid() . "." . $imageFileType;
            $target_file = $target_dir . $newFileName;
            move_uploaded_file($_FILES["image"]["tmp_name"], $target_file);

            $sql = "INSERT INTO products (name, description, price, old_price, sale, image, image_path, category) VALUES ('$name', '$description', $price, $old_price, $sale, '$newFileName', '$image_path', '$category')";
            if ($this->conn->query($sql) === TRUE) {
                header("Location: admin.php");
                exit();
            } else {
                echo "Chyba: " . $sql . "<br>" . $this->conn->error;
            }
        }
    }

    public function getProducts() {
        $sql = "SELECT * FROM products";
        $result = $this->conn->query($sql);

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $row['id'] . "</td>";
                echo "<td>" . $row['name'] . "</td>";
                echo "<td>" . $row['description'] . "</td>";
                echo "<td>" . $row['price'] . "</td>";
                echo "<td>" . $row['old_price'] . "</td>";
                echo "<td>" . ($row['sale'] ? 'Áno' : 'Nie') . "</td>";
                echo "<td><img src='images/" . $row['image'] . "' alt='" . $row['name'] . "' style='max-width: 100px;'></td>";
                echo "<td>" . $row['image_path'] . "</td>";
                echo "<td>";
                echo "<a href='edit.php?id=" . $row['id'] . "'>Upraviť</a> | ";
                echo "<a href='delete.php?id=" . $row['id'] . "' onclick=\"return confirm('Naozaj chcete vymazať tento produkt?')\">Vymazať</a>";
                echo "</td>";
                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='9'>Žiadne produkty nenájdené</td></tr>";
        }
    }
}
?>
