<?php
session_start();

$_SESSION['cart'] = array();
session_destroy();
?>
<!DOCTYPE html>
<html>
<head>
    <title>Thank You</title>
    <style>
        body {
            background-color: #f2f2f2;
            font-family: Arial, sans-serif;
            text-align: center;
            padding: 50px;
        }
        h1 {
            color: #333;
        }
        p {
            color: #666;
        }
    </style>
</head>
<body>
    <h1>Thank You!</h1>
    <p>Thank you for your submission. We appreciate your order.</p>
    <p>You will be redirected to the homepage in 5 seconds.</p>

    <?php
    header("refresh:5; url=index.php");
    ?>
</body>
</html>
