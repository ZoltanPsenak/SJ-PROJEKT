<!--A Design by W3layouts
Author: W3layout
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<!DOCTYPE HTML>
<html>
<head>
<title>Free Snow Bootstrap Website Template | Experiance :: w3layouts</title>
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
    <!-- light-box -->
	<script type="text/javascript" src="js/jquery.fancybox.js"></script>
	<link rel="stylesheet" type="text/css" href="css/jquery.fancybox.css" media="screen" />
   <script type="text/javascript">
		$(document).ready(function() {
			/*
			 *  Simple image gallery. Uses default settings
			 */

			$('.fancybox').fancybox();

		});
	</script>
</head>
<body>
<?php include 'header.php'; ?>
     <div class="main">
      <div class="shop_top">
		<div class="container">
			<div class="row ex_box">
				<h3 class="m_2">Our Experiance</h3>
				<div class="col-md-4 team1">
				<div class="img_section magnifier2">
				  <a class="fancybox" href="images/e1.jpg" data-fancybox-group="gallery" title="Lorem ipsum dolor sit amet"><img src="images/e1.jpg" class="img-responsive" alt=""><span> </span>
					<div class="img_section_txt">
						Duis aute irure dolor
					</div>
				</a></div>
				</div>
				<div class="col-md-4 team1">
				<div class="img_section magnifier2">
				  <a class="fancybox" href="images/e2.jpg" data-fancybox-group="gallery" title="Lorem ipsum dolor sit amet"><img src="images/e2.jpg" class="img-responsive" alt=""><span> </span>
					<div class="img_section_txt">
						Duis aute irure dolor
					</div>
				</a></div>
				</div>
				<div class="col-md-4 team1">
				<div class="img_section magnifier2">
				  <a class="fancybox" href="images/e3.jpg" data-fancybox-group="gallery" title="Lorem ipsum dolor sit amet"><img src="images/e3.jpg" class="img-responsive" alt=""><span> </span>
					<div class="img_section_txt">
						Duis aute irure dolor
					</div>
				</a></div>
				</div>
		    </div>
		    <div class="row ex_box">
				<div class="col-md-4 team1">
				<div class="img_section magnifier2">
				  <a class="fancybox" href="images/e4.jpg" data-fancybox-group="gallery" title="Lorem ipsum dolor sit amet"><img src="images/e4.jpg" class="img-responsive" alt=""><span> </span>
					<div class="img_section_txt">
						Duis aute irure dolor
					</div>
				</a></div>
				</div>
				<div class="col-md-4 team1">
				<div class="img_section magnifier2">
				  <a class="fancybox" href="images/e5.jpg" data-fancybox-group="gallery" title="Lorem ipsum dolor sit amet"><img src="images/e5.jpg" class="img-responsive" alt=""><span> </span>
					<div class="img_section_txt">
						Duis aute irure dolor
					</div>
				</a></div>
				</div>
				<div class="col-md-4 team1">
				<div class="img_section magnifier2">
				  <a class="fancybox" href="images/e6.jpg" data-fancybox-group="gallery" title="Lorem ipsum dolor sit amet"><img src="images/e6.jpg" class="img-responsive" alt=""><span> </span>
					<div class="img_section_txt">
						Duis aute irure dolor
					</div>
				</a></div>
				</div>
		    </div>
		    <div class="row ex1_box">
			   <div class="col-md-4 team1">
				<div class="img_section magnifier2">
				  <a class="fancybox" href="images/e7.jpg" data-fancybox-group="gallery" title="Lorem ipsum dolor sit amet"><img src="images/e7.jpg" class="img-responsive" alt=""><span> </span>
					<div class="img_section_txt">
						Duis aute irure dolor
					</div>
				</a></div>
				</div>
				<div class="col-md-4 team1">
				<div class="img_section magnifier2">
				  <a class="fancybox" href="images/e8.jpg" data-fancybox-group="gallery" title="Lorem ipsum dolor sit amet"><img src="images/e8.jpg" class="img-responsive" alt=""><span> </span>
					<div class="img_section_txt">
						Duis aute irure dolor
					</div>
				</a></div>
				</div>
				<div class="col-md-4 team1">
				<div class="img_section magnifier2">
				  <a class="fancybox" href="images/e9.jpg" data-fancybox-group="gallery" title="Lorem ipsum dolor sit amet"><img src="images/e9.jpg" class="img-responsive" alt=""><span> </span>
					<div class="img_section_txt">
						Duis aute irure dolor
					</div>
				</a></div>
			   </div>
		    </div>
		 </div>
	   </div>
	  </div>
	<?php include 'footer.php'; ?>
</body>	
</html>