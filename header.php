<!DOCTYPE HTML>
<html>
<head>
<title>Header</title>
<link href="css/bootstrap.css" rel='stylesheet' type='text/css' />
<link href="css/style.css" rel='stylesheet' type='text/css' />
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700,800' rel='stylesheet' type='text/css'>
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<script src="js/jquery.min.js"></script>

<link rel="stylesheet" href="css/fwslider.css" media="all">
<script src="js/jquery-ui.min.js"></script>
<script src="js/fwslider.js"></script>

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
<div class="header">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="header-left">
                    <div class="logo">
                        <a href="index.php"><img src="images/logo.png" alt=""/></a>
                    </div>
                    <div class="menu">
                        <a class="toggleMenu" href="#"><img src="images/nav.png" alt="" /></a>
                        <ul class="nav" id="nav">
                            <li><a href="snowboard.php">Snowboard</a></li>
                            <li><a href="helmet.php">Helmet</a></li>
                            <li><a href="glases.php">Glases</a></li>
                            <li><a href="contact.php">Contact</a></li>
                            <?php
                            if(isset($_SESSION['user']) AND $_SESSION['user']['email'] == 'admin@admin.com') {
                                echo "<li><a href='admin.php'>Admin</a></li>";
                            }
                            if(isset($_SESSION['user'])) {
                                $loggedInUser = $_SESSION['user']['email'];
                                echo "<li><a href='profile.php'>$loggedInUser</a></li>";
                                echo "<li><a href='logout.php'>Logout</a></li>";
                                }
                            else {
                                echo "<li><a href='login.php'>Login</a></li>";
                            }
                            ?>
                            <div class="clear"></div>
                        </ul>
                        <script type="text/javascript" src="js/responsive-nav.js"></script>
                    </div>
                    <div class="clear"></div>
                </div>
                <div class="header_right">
                    <div class="check_button"><a href="checkout.php">Check out</a></div>
                        </li>
                    <div class="clear"></div>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>
