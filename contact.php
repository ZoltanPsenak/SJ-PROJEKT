<?php
session_start();
?>
<!DOCTYPE HTML>
<html>
<head>
<title>Kontakt</title>
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
        $("#result").html("Vybraná hodnota je: " + getSelectedValue("sample"));
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
function storeContactFormSubmission($name, $email, $subject, $message) {
    $conn = new mysqli("localhost", "root", "", "projekt");
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    $sql = "INSERT INTO formular (name, email, subject, message) VALUES (?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssss", $name, $email, $subject, $message);
    if ($stmt->execute() === TRUE) {
        echo "Nový záznam bol úspešne vytvorený";
    } else {
        echo "Chyba: " . $sql . "<br>" . $conn->error;
    }
    $stmt->close();
    $conn->close();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    $name = $_POST['name'];
    $email = $_POST['email'];
    $subject = $_POST['subject'];
    $message = $_POST['message'];
    storeContactFormSubmission($name, $email, $subject, $message);
}
?>
<?php include 'header.php'; ?>
<div class="main">
    <div class="shop_top">
        <div class="container">
            <div class="row">
                <div class="col-md-7">
                    <div class="map">
                        <iframe width="100%" height="350" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://maps.google.co.in/maps?f=q&amp;source=s_q&amp;hl=en&amp;geocode=&amp;q=Lighthouse+Point,+FL,+United+States&amp;aq=4&amp;oq=light&amp;sll=26.275636,-80.087265&amp;sspn=0.04941,0.104628&amp;ie=UTF8&amp;hq=&amp;hnear=Lighthouse+Point,+Broward,+Florida,+United+States&amp;t=m&amp;z=14&amp;ll=26.275636,-80.087265&amp;output=embed"></iframe><br><small><a href="https://maps.google.co.in/maps?f=q&amp;source=embed&amp;hl=en&amp;geocode=&amp;q=Lighthouse+Point,+FL,+United+States&amp;aq=4&amp;oq=light&amp;sll=26.275636,-80.087265&amp;sspn=0.04941,0.104628&amp;ie=UTF8&amp;hq=&amp;hnear=Lighthouse+Point,+Broward,+Florida,+United+States&amp;t=m&amp;z=14&amp;ll=26.275636,-80.087265" style="color:#666;text-align:left;font-size:12px"></a></small>
                    </div>
                </div>
                <div class="col-md-5">
                    <p class="m_8">Snowboarding je skvelý zimný šport, ktorý kombinuje rýchlosť, adrenalín a slobodu pohybu na snehu. S originálnym vybavením a správnou technikou môžete zažiť neopakovateľné zážitky na svahu. Bezpečnosť je však vždy na prvom mieste, preto nezabudnite na prilbu a vhodnú ochranu.</p>
                    <div class="address">
                        <p>500 Lorem Ipsum Dolor Sit,</p>
                        <p>22-56-2-9 Sit Amet, Lorem,</p>
                        <p>USA</p>
                        <p>Telefón:(00) 222 666 444</p>
                        <p>Fax: (000) 000 00 00 0</p>
                        <p>Email: <span>support[at]snow.com</span></p>
                        <p>Sledujte nás na: <span>Facebook</span>, <span>Twitter</span></p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12 contact">
                    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
                        <div class="to">
                            <input type="text" class="text" name="name" placeholder="Meno">
                            <input type="text" class="text" name="email" placeholder="Email">
                            <input type="text" class="text" name="subject" placeholder="Predmet">
                        </div>
                        <div class="text">
                            <textarea name="message" placeholder="Správa"></textarea>
                            <div class="form-submit">
                                <input name="submit" type="submit" id="submit" value="Odoslať"><br>
                            </div>
                        </div>
                        <div class="clear"></div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?php include 'footer.php'; ?>
</body>
</html>
