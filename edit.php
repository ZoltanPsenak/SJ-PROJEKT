<?php

session_start();


if (!isset($_GET['id'])) {
    header("Location: admin.php");
    exit();
}

$conn = new mysqli("localhost", "root", "", "projekt");
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["edit_product"])) {
    $id = $conn->real_escape_string($_GET['id']);
    
    $name = $conn->real_escape_string($_POST["name"]);
    $description = $conn->real_escape_string($_POST["description"]);
    $price = $conn->real_escape_string($_POST["price"]);
    $old_price = isset($_POST["old_price"]) ? $conn->real_escape_string($_POST["old_price"]) : null;
    $sale = isset($_POST["sale"]) ? 1 : 0;
    $category = $conn->real_escape_string($_POST["category"]); 
    $image_path = $conn->real_escape_string($_POST["image_path"]);
    
    $image_update = '';
    if (!empty($_FILES["image"]["name"])) {
        $target_dir = "images/";
        $target_file = $target_dir . basename($_FILES["image"]["name"]);
        $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
        $newFileName = uniqid() . "." . $imageFileType;
        $target_file = $target_dir . $newFileName;
        move_uploaded_file($_FILES["image"]["tmp_name"], $target_file);
        $image_update = ", image='$newFileName'";
    }

    $sql = "UPDATE products SET name='$name', description='$description', price=$price, old_price=$old_price, sale=$sale, category='$category', image_path='$image_path'$image_update WHERE id=$id";
    
    if ($conn->query($sql) === TRUE) {
        header("Location: admin.php");
        exit();
    } else {
        echo "Error updating record: " . $conn->error;
    }
}

$id = $conn->real_escape_string($_GET['id']);
$sql = "SELECT * FROM products WHERE id=$id";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
} else {
    header("Location: admin.php");
    exit();
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="sk">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Product</title>
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

        h2 {
            color: #333;
        }

        form {
            margin-bottom: 20px;
        }

        input[type="text"],
        textarea,
        input[type="number"],
        input[type="checkbox"],
        input[type="submit"],
        input[type="file"],
        select { 
            width: 100%;
            padding: 10px;
            margin: 5px 0;
            border: 1px solid #ccc;
            border-radius: 3px;
            box-sizing: border-box;
        }

        textarea {
            resize: vertical;
        }

        input[type="submit"] {
            background-color: #4CAF50;
            color: white;
            border: none;
            cursor: pointer;
        }

        label {
            display: block;
            margin-bottom: 5px;
        }

        .checkbox-label {
            display: inline-block;
            margin-right: 10px;
        }

        .checkbox-label input {
            margin-right: 5px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Uprava produktu</h2>
        
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]) . '?id=' . $id; ?>" method="POST" enctype="multipart/form-data">
            <input type="text" name="name" value="<?php echo $row['name']; ?>" placeholder="Product Name" required><br>
            <textarea name="description" placeholder="Description" required><?php echo $row['description']; ?></textarea><br>
            <input type="number" name="price" value="<?php echo $row['price']; ?>" placeholder="Price" step="0.01" required><br>
            <input type="number" name="old_price" value="<?php echo $row['old_price']; ?>" placeholder="Old Price" step="0.01"><br>
            <label class="checkbox-label">Zlava: <input type="checkbox" name="sale" <?php if ($row['sale'] == 1) echo 'checked'; ?>></label><br>
            <label for="category">Category:</label> 
            <select name="category" id="category"> 
                <option value="snowboard" <?php if ($row['category'] == 'snowboard') echo 'selected'; ?>>Snowboard</option>
                <option value="helmet" <?php if ($row['category'] == 'helmet') echo 'selected'; ?>>Helmet</option>
                <option value="glases" <?php if ($row['category'] == 'glases') echo 'selected'; ?>>Glases</option>
            </select><br>
            <input type="text" name="image_path" value="<?php echo $row['image_path']; ?>" placeholder="Cesta k fotke" required><br>
            <input type="file" name="image"><br>
            <input type="submit" name="edit_product" value="Ulozit">
        </form>
    </div>
</body>
</html>
