<?php
session_start();

include 'class/cart.php';

$conn = new mysqli("localhost", "root", "", "projekt");
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$cart = new Cart();

if (isset($_POST['remove_product_id'])) {
    $cart->removeProduct($_POST['remove_product_id']);
    header("Location: checkout.php");
    exit();
}

$cart_products = $cart->getCartProducts($conn);
$total_price = $cart->getTotalPrice($conn);

$conn->close();
?>
<!DOCTYPE HTML>
<html>
<head>
    <title>Checkout</title>
    <link href="css/bootstrap.css" rel='stylesheet' type='text/css' />
    <link href="css/style.css" rel='stylesheet' type='text/css' />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700,800' rel='stylesheet' type='text/css'>
    <script type="application/x-javascript"> 
        addEventListener("load", function() { 
            setTimeout(hideURLbar, 0); 
        }, false); 
        function hideURLbar(){ 
            window.scrollTo(0,1); 
        } 
    </script>
    <script src="js/jquery.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            $(".dropdown img.flag").addClass("flagvisibility");

            $(".dropdown dt a").click(function() {
                $(".dropdown dd ul").toggle();
            });
                            
            $(".dropdown dd ul li a").click(function() {
                var text = $(this).html();
                $(".dropdown dt a span").html(text);
                $(".dropdown dd ul").hide();
                $("#result").html("Selected value is: " + getSelectedValue("sample"));
            });
                            
            function getSelectedValue(id) {
                return $("#" + id).find("dt a span.value").html();
            }

            $(document).bind('click', function(e) {
                var $clicked = $(e.target);
                if (! $clicked.parents().hasClass("dropdown"))
                    $(".dropdown dd ul").hide();
            });

            $("#flagSwitcher").click(function() {
                $(".dropdown img.flag").toggleClass("flagvisibility");
            });
        });
    </script>
</head>
<body>
    <?php include 'header.php'; ?>
    <div class="main">
        <div class="shop_top">
            <div class="container">
                <h4 class="title">Shopping Cart</h4>
                <div class="row shop_box-top">
                    <?php 
                    if (!empty($cart_products)) {
                        foreach ($cart_products as $product) {
                    ?>
                    <div class="col-md-3 shop_box">
                        <img src="images/<?php echo $product['image']; ?>" class="img-responsive" alt=""/>
                        <div class="shop_desc">
                            <h3><?php echo $product['name']; ?></h3>
                            <p><?php echo $product['description']; ?></p>
                            <span class="quantity">Quantity: <?php echo $product['quantity']; ?></span><br>
                            <span class="price"><?php echo "$" . $product['price']; ?></span><br>
                            <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
                                <input type="hidden" name="remove_product_id" value="<?php echo $product['id']; ?>">
                                <input type="submit" value="Remove from Cart">
                            </form>
                        </div>
                    </div>
                    <?php 
                        }
                    ?>
                    <div class="col-md-12">
                        <h4>Total Price: <?php echo "$" . $total_price; ?></h4>
                        <form method="post" action="purchase.php">
                            <input type="submit" value="Buy Now">
                        </form>
                    </div>
                    <?php
                    } else {
                        echo "<p>Your shopping cart is empty.</p>";
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>
    <div class="footer">
        <div class="container">
            <?php include 'footer.php'; ?>
        </div>
    </div>
</body>
</html>
