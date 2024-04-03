<!--A Design by W3layouts
Author: W3layout
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<!DOCTYPE HTML>
<html>
<head>
<title>Free Snow Bootstrap Website Template | Checkout :: w3layouts</title>
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
function loginUser($email, $password) {

    $conn = new mysqli("localhost", "root", "", "projekt");

    
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    
    $sql = "SELECT * FROM uzivatelia WHERE email = ? AND password = ?";
    
    
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ss", $email, $password);
    
    
    $stmt->execute();
    
    
    $result = $stmt->get_result();
    
    
    if ($result->num_rows == 1) {
        
        return $result->fetch_assoc();
    } else {
        
        return false;
    }


    $stmt->close();
    $conn->close();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    $email = $_POST['email'];
    $password = $_POST['password'];

    
    $user = loginUser($email, $password);

    if ($user) {
        
        echo "User authenticated successfully!";
    } else {
        
        echo "Invalid email or password!";
    }
}
?>
<?php include 'header.php'; ?>
<div class="main">
    <div class="shop_top">
        <div class="container">
            <div class="col-md-6">
                <div class="login-page">
                    <h4 class="title">New Customers</h4>
                    <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat. Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat, vel illum dolore eu feugiat nulla facilisis</p>
                    <div class="button1">
                        <a href="register.php"><input type="submit" name="Submit" value="Create an Account"></a>
                    </div>
                    <div class="clear"></div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="login-title">
                    <h4 class="title">Registered Customers</h4>
                    <div id="loginbox" class="loginbox">
                        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" name="login" id="login-form">
                            <fieldset class="input">
                                <p id="login-form-username">
                                    <label for="modlgn_username">Email</label>
                                    <input id="modlgn_username" type="text" name="email" class="inputbox" size="18" autocomplete="off">
                                </p>
                                <p id="login-form-password">
                                    <label for="modlgn_passwd">Password</label>
                                    <input id="modlgn_passwd" type="password" name="password" class="inputbox" size="18" autocomplete="off">
                                </p>
                                <div class="remember">
                                    <p id="login-form-remember">
                                        <label for="modlgn_remember"><a href="#">Forget Your Password ? </a></label>
                                    </p>
                                    <input type="submit" name="Submit" class="button" value="Login"><div class="clear"></div>
                                </div>
                            </fieldset>
                        </form>
                    </div>
                </div>
                <div class="clear"></div>
            </div>
        </div>
    </div>
</div>
<?php include 'footer.php'; ?>
</body>   
</html>
