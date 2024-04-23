<!--A Design by W3layouts
Author: W3layout
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<?php

function addUserToDatabase($firstName, $lastName, $email, $password) {
    $conn = new mysqli("localhost", "root", "", "projekt");

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $sql = "INSERT INTO uzivatelia (first_name, last_name, email, password) VALUES (?, ?, ?, ?)";

    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssss", $firstName, $lastName, $email, $password);

    if ($stmt->execute() === TRUE) {
        echo "Registracia prebehla úspešne";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $stmt->close();
    $conn->close();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $firstName = $_POST['firstName'];
    $lastName = $_POST['lastName'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    addUserToDatabase($firstName, $lastName, $email, $password);
    $_SESSION['registered'] = true; // Set a session variable
}
?>
<!DOCTYPE HTML>
<html>
<head>
<title>Register</title>
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
<?php include 'header.php'; ?>
     <div class="main">
      <div class="shop_top">
         <div class="container">
                        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>"> 
                                <div class="register-top-grid">
                                        <h3>PERSONAL INFORMATION</h3>
                                        <div>
                                            <span>First Name<label>*</label></span>
                                            <input type="text" name="firstName"> 
                                        </div>
                                        <div>
                                            <span>Last Name<label>*</label></span>
                                            <input type="text" name="lastName"> 
                                        </div>
                                        <div>
                                            <span>Email Address<label>*</label></span>
                                            <input type="text" name="email"> 
                                        </div>
                                        <div class="clear"> </div>
                                            <a class="news-letter" href="#">
                                                <label class="checkbox"><input type="checkbox" name="checkbox" checked=""><i> </i>Sign Up for Newsletter</label>
                                            </a>
                                        <div class="clear"> </div>
                                </div>
                                <div class="clear"> </div>
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
                                        <div class="clear"> </div>
                                </div>
                                <div class="clear"> </div>
                                <input type="submit" value="submit">
                        </form>
                    </div>
           </div>
      </div>
      <?php include 'footer.php'; ?>
</body>    
</html>
