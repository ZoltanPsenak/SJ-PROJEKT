
<!DOCTYPE HTML>
<html>
<head>
    <title>User Profile</title>
    <link href="css/bootstrap.css" rel='stylesheet' type='text/css' />
    <link href="css/style.css" rel='stylesheet' type='text/css' />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700,800' rel='stylesheet' type='text/css'>
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
            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post"> 
                <div class="register-top-grid">
                    <h3>PERSONAL INFORMATION</h3>
                    <div>
                        <span>First Name<label>*</label></span>
                        <input type="text" name="firstName" value="<?php echo $user['first_name']; ?>"> 
                    </div>
                    <div>
                        <span>Last Name<label>*</label></span>
                        <input type="text" name="lastName" value="<?php echo $user['last_name']; ?>"> 
                    </div>
                    <div>
                        <span>Email Address<label>*</label></span>
                        <input type="text" name="email" value="<?php echo $user['email']; ?>" readonly> 
                    </div>
                    <div class="clear"></div>
                    <div class="clear"></div>
                </div>
                <div class="register-bottom-grid">
                    <h3>LOGIN INFORMATION</h3>
                    <div>
                        <span>Password<label>*</label></span>
                        <input type="password" name="password">
                    </div>
                    <div>
                        <span>Confirm Password<label>*</label></span>
                        <input type="password" name="confirmPassword">
                    </div>
                    <div class="clear"></div>
                </div>
                <div class="clear"></div>
                <input type="submit" value="Submit">
            </form>
        </div>
    </div>
</div>
<?php include 'footer.php'; ?>
</body>    
</html>
