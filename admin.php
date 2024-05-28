<?php
require_once 'class/AdminPanel.php';

$adminPanel = new AdminPanel();
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
        <?php $adminPanel->getProducts(); ?>
    </table>
</div>

</body>
</html>
