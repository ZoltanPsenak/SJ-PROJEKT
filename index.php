<?php
session_start();
?>
<!DOCTYPE HTML>
<html>
<head>
<title>Domov</title>
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
	<?php include 'header.php'; ?>
	<div class="banner">
       <div id="fwslider">
         <div class="slider_container">
            <div class="slide"> 
               <img src="images/slider1.jpg" class="img-responsive" alt=""/>
                <div class="slide_content">
                    <div class="slide_content_wrap">
                        <h1 class="title">Prejdite cez<br>Všetko</h1>
                        <div class="button"><a href="shop.php">Zobraziť detaily</a></div>
                    </div>
                </div>
            </div>
            <div class="slide">
               <img src="images/slider2.jpg" class="img-responsive" alt=""/>
                <div class="slide_content">
                    <div class="slide_content_wrap">
                        <h1 class="title">Prejdite cez<br>Všetko</h1>
                       	<div class="button"><a href="shop.php">Zobraziť detaily</a></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="timers"></div>
        <div class="slidePrev"><span></span></div>
        <div class="slideNext"><span></span></div>
       </div>
      </div>
	  <div class="main">
		<div class="content-top">
			<h2>Lyže a snowboardy</h2>
			<p>Pozrite si našu najnovšiu kolekciu lyží a snowboardov nižšie:</p>
			<div class="close_but"><i class="close1"> </i></div>
				<ul id="flexiselDemo3">
				<li><img src="images/board1.jpg" /></li>
				<li><img src="images/board2.jpg" /></li>
				<li><img src="images/board3.jpg" /></li>
				<li><img src="images/board4.jpg" /></li>
				<li><img src="images/board5.jpg" /></li>
			</ul>
		<h3>Rad Extreme lyží</h3>
			<script type="text/javascript">
		$(window).load(function() {
			$("#flexiselDemo3").flexisel({
				visibleItems: 5,
				animationSpeed: 1000,
				autoPlay: true,
				autoPlaySpeed: 3000,    		
				pauseOnHover: true,
				enableResponsiveBreakpoints: true,
		    	responsiveBreakpoints: { 
		    		portrait: { 
		    			changePoint:480,
		    			visibleItems: 1
		    		}, 
		    		landscape: { 
		    			changePoint:640,
		    			visibleItems: 2
		    		},
		    		tablet: { 
		    			changePoint:768,
		    			visibleItems: 3
		    		}
		    	}
		    });
		    
		});
		</script>
		<script type="text/javascript" src="js/jquery.flexisel.js"></script>
		</div>
	</div>
	<div class="content-bottom">
		<div class="container">
			<div class="row content_bottom-text">
			  <div class="col-md-7">
				<h3>Lyžovanie na horách<br>Lyžovanie a snowboarding</h3>
				<p class="m_1">Snowboarding je vzrušujúci šport, ktorý vás zavedie do srdca krásy prírody. Pripojte si svoje vybavenie a vyrezávajte cez neporušený sneh, zatiaľ čo zažívate vzrušenie dobyvania hôr.</p>
				<p class="m_2">Či ste začiatočník alebo skúsený jazdec, naša kolekcia snowboardov a vybavenia vás vybaví pre váš ďalší dobrodružstvo. Preskúmajte našu ponuku a pripravte sa na výjazd na svahy!</p>
			  </div>
			</div>
		</div>
	</div>
	<div class="features">
		<div class="container">
			<h3 class="m_3">Vlastnosti</h3>
			<div class="close_but"><i class="close1"> </i></div>
			  <div class="row">
				<div class="col-md-3 top_box">
				  <div class="view view-ninth"><a href="single.php">
                    <img src="images/pic1.jpg" class="img-responsive
                    " alt=""/>
                    <div class="mask mask-1"> </div>
                    <div class="mask mask-2"> </div>
                      <div class="content">
                        <h2>Štýl</h2>
                        <p>Skúsenosti bezkonkurenčné pohodlie a výkon s naším špičkovým vybavením.</p>
                      </div>
                   </a> </div>
                  <h4 class="m_4"><a href="#">Neprekonateľná kvalita</a></h4>
                  <p class="m_5">Vytvorené na dokonalosť</p>
                </div>
                <div class="col-md-3 top_box">
					<div class="view view-ninth"><a href="single.php">
                    <img src="images/pic2.jpg" class="img-responsive" alt=""/>
                    <div class="mask mask-1"> </div>
                    <div class="mask mask-2"> </div>
                      <div class="content">
                        <h2>Štýl</h2>
                        <p>Preskúmajte najnovšie trendy v móde a štýle snowboardingu.</p>
                      </div>
                    </a> </div>
                   <h4 class="m_4"><a href="#">Módne dopredu</a></h4>
                   <p class="m_5">Držte sa pred konkurenciou</p>
				</div>
				<div class="col-md-3 top_box">
					<div class="view view-ninth"><a href="single.php">
                    <img src="images/pic3.jpg" class="img-responsive" alt=""/>
                    <div class="mask mask-1"> </div>
                    <div class="mask mask-2"> </div>
                      <div class="content">
                        <h2>Štýl</h2>
                        <p>Objavte našu škálu doplnkov navrhnutých pre maximálnu funkcionalitu.</p>
                      </div>
                    </a> </div>
                   <h4 class="m_4"><a href="#">Funkčné doplnky</a></h4>
                   <p class="m_5">Zlepšite svoj výkon</p>
				</div>
				<div class="col-md-3 top_box1">
					<div class="view view-ninth"><a href="single.php">
                    <img src="images/pic4.jpg" class="img-responsive" alt=""/>
                    <div class="mask mask-1"> </div>
                    <div class="mask mask-2"> </div>
                      <div class="content">
                        <h2>Štýl</h2>
                        <p>Zažite vzrušenie dobrodružstva so špecializovaným vybavením.</p>
                      </div>
                     </a> </div>
                   <h4 class="m_4"><a href="#">Pripravené na dobrodružstvo</a></h4>
                   <p class="m_5">Uvoľni svojho vnútorného objaviteľa</p>
				</div>
			</div>
		 </div>
	    </div>
	<?php include 'footer.php'; ?>
</body>	
</html>
