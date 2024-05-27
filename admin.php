<?php
session_start();


if(!isset($_SESSION['user'])) {
    header("Location: index.php"); 
}


$loggedInUserEmail = $_SESSION['user']['email'];


if($loggedInUserEmail !== 'admin@admin.com') {
    header("Location: index.php"); 
    exit();
}


$conn = new mysqli("localhost", "root", "", "projekt");
if ($conn->connect_error) {
    die("Připojení zlyhalo: " . $conn->connect_error);
}


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
    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
    $newFileName = uniqid() . "." . $imageFileType;
    $target_file = $target_dir . $newFileName;
    move_uploaded_file($_FILES["image"]["tmp_name"], $target_file);

    
    $sql = "INSERT INTO products (name, description, price, old_price, sale, image, image_path, category) VALUES ('$name', '$description', $price, $old_price, $sale, '$newFileName', '$image_path', '$category')";
    if ($conn->query($sql) === TRUE) {
        header("Location: admin.php");
        exit();
    } else {
        echo "Chyba: " . $sql . "<br>" . $conn->error;
    }
}


$sql = "SELECT * FROM products";
$result = $conn->query($sql);

?>
<!DOCTYPE html>
<html lang="sk">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel</title>
    <link rel="stylesheet" href="css/style.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }

        .container {
            max-width: 800px;
            margin: 20px auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        h2, h3 {
            color: #333;
        }

        form {
            margin-bottom: 20px;
        }

        input[type="text"],
        input[type="number"],
        textarea,
        input[type="file"],
        input[type="submit"],
        select {
            width: 100%;
            padding: 10px;
            margin: 5px 0;
            border: 1px solid #ccc;
            border-radius: 3px;
            box-sizing: border-box;
        }

        input[type="submit"] {
            background-color: #4CAF50;
            color: white;
            border: none;
            cursor: pointer;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th, td {
            padding: 8px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        th {
            background-color: #4CAF50;
            color: white;
        }

        tr:hover {
            background-color: #f2f2f2;
        }

        img {
            max-width: 100px;
        }

        a {
            text-decoration: none;
            color: #4CAF50;
        }

        a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Vitajte v Admin Paneli</h2>
        
       
        <h3>Pridať nový produkt</h3>
        <form action="<?php echo $_SERVER["PHP_SELF"]; ?>" method="POST" enctype="multipart/form-data">
            <input type="text" name="name" placeholder="Názov produktu" required><br>
            <textarea name="description" placeholder="Popis" required></textarea><br>
            <input type="number" name="price" placeholder="Cena" step="0.01" required><br>
            <input type="number" name="old_price" placeholder="Stará cena" step="0.01"><br>
            <label>Zlava: <input type="checkbox" name="sale"></label><br>
            <select name="category">
                <option value="snowboard">Snowboard</option>
                <option value="helmet">Helmet</option>
                <option value="glases">Glases</option>
            </select><br>
            <input type="text" name="image_path" placeholder="Cesta k fotke" required><br>
            <input type="file" name="image" required><br>
            <input type="submit" name="add_product" value="Pridať produkt">
        </form>

        <hr>
        
        <table>
            <tr>
                <th>ID</th>
                <th>Názov</th>
                <th>Popis</th>
                <th>Cena</th>
                <th>Stará cena</th>
                <th>Zlava</th>
                <th>Obrázok</th>
                <th>Cesta k fotke</th>
                <th>Akcia</th>
            </tr>
            <?php 
            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
            ?>
            <tr>
                <td><?php echo $row['id']; ?></td>
                <td><?php echo $row['name']; ?></td>
                <td><?php echo $row['description']; ?></td>
                <td><?php echo $row['price']; ?></td>
                <td><?php echo $row['old_price']; ?></td>
                <td><?php echo $row['sale'] ? 'Áno' : 'Nie'; ?></td>
                <td><img src="images/<?php echo $row['image']; ?>" alt="<?php echo $row['name']; ?>" style="max-width: 100px;"></td>
                <td><?php echo $row['image_path']; ?></td>
                <td>
                    <a href="edit.php?id=<?php echo $row['id']; ?>">Upraviť</a> | 
                    <a href="delete.php?id=<?php echo $row['id']; ?>" 
                    onclick="return confirm('Naozaj chcete vymazať tento produkt?')">Vymazať</a>
</td>
</tr>
<?php 
}
} else {
echo "<tr><td colspan='9'>Žiadne produkty nenájdené</td></tr>";
}
?>
</table>
</div>

</body>
</html>
