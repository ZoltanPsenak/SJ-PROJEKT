<?php
$conn = new mysqli("localhost", "root", "", "projekt");
if ($conn->connect_error) {
    die("Pripojenie zlyhalo: " . $conn->connect_error);
}

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $id = $conn->real_escape_string($id);

    $sql = "DELETE FROM products WHERE id = $id";

    if ($conn->query($sql) === TRUE) {
        header("Location: admin.php");
        exit();
    } else {
        echo "Chyba pri mazaní produktu: " . $conn->error;
    }

    $conn->close();
} else {
    header("Location: admin.php");
    exit();
}
?>
