<?php
session_start();

if(isset($_GET['product_id'])) {
    $productId = $_GET['product_id'];

    if(!isset($_SESSION['cart'])) {
        $_SESSION['cart'] = array();
    }

    $_SESSION['cart'][] = $productId;


    header("Location: snowboard.php");
    exit();
} else {
   
    header("Location: index.php");
    exit();
}
?>
