<?php
session_start();
?>
<!DOCTYPE HTML>
<html>
<head>
    <title>Free Snow Bootstrap Website Template | Shop :: w3layouts</title>
    <link href="css/bootstrap.css" rel='stylesheet' type='text/css' />
    <link href="css/style.css" rel='stylesheet' type='text/css' />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700,800' rel='stylesheet' type='text/css'>
    <script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
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
<?php 
include 'header.php'; 

$conn = new mysqli("localhost", "root", "", "projekt");
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT * FROM products WHERE category = 'glases'";
$result = $conn->query($sql);
?>
<div class="main">
    <div class="shop_top">
        <div class="container">
            <div class="row shop_box-top">
                <?php 
                if ($result->num_rows > 0) {
                    while($row = $result->fetch_assoc()) {
                ?>
                <div class="col-md-3 shop_box">
                    <img src="images/<?php echo $row['image']; ?>" class="img-responsive" alt=""/>
                    <span class="new-box">
                        <span class="new-label">New</span>
                    </span>
                    <?php if($row['sale'] == 1) { ?>
                    <span class="sale-box">
                        <span class="sale-label">Sale!</span>
                    </span>
                    <?php } ?>
                    <div class="shop_desc">
                        <h3><?php echo $row['name']; ?></h3>
                        <p><?php echo $row['description']; ?></p>
                        <span class="reducedfrom"><?php echo "$" . $row['old_price']; ?></span>
                        <span class="actual"><?php echo "$" . $row['price']; ?></span><br>
                        <ul class="buttons">
                            <li class="cart"><a href="#">Add To Cart</a></li>
                            <div class="clear"> </div>
                        </ul>
                    </div>
                </div>
                <?php 
                    }
                } else {
                    echo "No products found";
                }
                $conn->close();
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
