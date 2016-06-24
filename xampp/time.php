
<!DOCTYPE html>

<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
	<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>SpinalCo</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="Free HTML5 Template by FREEHTML5.CO" />
	<meta name="keywords" content="free html5, free template, free bootstrap, html5, css3, mobile first, responsive" />
	<meta name="author" content="FREEHTML5.CO" />
    <meta http-equiv="refresh" content="1" />
  
	
	<!-- Magnific Popup -->
	<link rel="stylesheet" href="css/magnific-popup.css">
	<!-- Bootstrap  -->
	<link rel="stylesheet" href="css/bootstrap.css">

	
	<link rel="stylesheet" href="css/style.css">

	

	


	<!-- Modernizr JS -->
	<script src="js/modernizr-2.6.2.min.js"></script>
	<!-- FOR IE9 below -->
	<!--[if lt IE 9]>
	<script src="js/respond.min.js"></script>
	<![endif]-->

	</head>

	
	<body>

	<!-- Loader -->
	<div class="fh5co-loader"></div>
	
	<div id="fh5co-page">
		<section id="fh5co-header">
			<div class="container">
				<nav role="navigation">
					<ul class="pull-left left-menu">
						<li><a href="about.html">About</a></li>
						<li><a href="spinalco.html">SpinalCo</a></li>
						<li><a href="team.html">Team</a></li>
					</ul>
					<h1 id="fh5co-logo"><a href="spinalco.html">SpinalCo<span>.</span></a></h1>
					
				</nav>
			</div>
		</section>
		<!-- #fh5co-header -->

		<section id="fh5co-hero" class="no-js-fullheight" style="background-image: url(images/full_image_2.jpg);" data-next="yes">
			<div class="fh5co-overlay"></div>
			<div class="container">
				<div class="fh5co-intro no-js-fullheight">
					<div class="fh5co-intro-text">
						
					</div>
				</div>
			</div>
			
		</section>
		<!-- END #fh5co-hero -->
        
        <section id="fh5co-features">
			<div class="container">
				<div class="row text-center row-bottom-padded-md">
					<div class="col-md-8 col-md-offset-2">
                        
                         
                <?php
                
                
                    $connection = mysqli_connect("localhost","root","hsulm123");

                        mysqli_select_db($connection, "spinalco");
                        // anmeldedaten übergeben
                        mysqli_query($connection, "SET NAMES 'utf8'");
                    // Daten aus der Übergabe holen und sql Statement schreiben
                    $sql = "SELECT * FROM data";
                    // Datenbankaktion mit dem zuvor erzeugten sql Statement
                    $select = mysqli_query($connection, $sql);
                    //$db_link = mysqli_connect("localhost","root","hsulm123","spinalco");
                   
				    
                $werte = mysqli_fetch_assoc($select);
                        
                        
               
                
                            
                if ($werte["activesit"] == "0"){
                    echo '<p>Your chair is waiting for you</p>';
                    echo '<figure><img src="images/empty.jpg" height="300px"/></figure>';
                    echo '<p>When you sitting down the session begins</p>';
                }
                else {
                
                if ($werte["standup"] == "1"){
                    //nicht ok
                    echo '<p>Your sitting time is over, please stand up and take a walk</p>';
                    echo '<figure><img src="images/standup.jpg" height="300px"/></figure>';
                    echo '<p>It is import to walk around by time, please take min. 2min for your walk</p>';
                    
                }
                else{
                    //ok
                    echo '<p>Still have a seat</p>';
                    echo '<figure><img src="images/sitdown.jpg" height="300px"/></figure>';
                    echo '<p>Your sitting time is not over an hour</p>';
                }
                }
                               
                    ?>
            
                        
                        
					</div>
				</div>
                </section>
            
            <a href="position.php">Sitting Position</a>

		 
        

		<!-- END #fh5co-pricing -->

		
		<footer id="fh5co-footer">
			<div class="container">
				<div class="row row-bottom-padded-md">
					<div class="col-md-3 col-sm-6 col-xs-12 animate-box">
						<div class="fh5co-footer-widget">
							<h3>Team</h3>
							<ul class="fh5co-links">
								<li><a href="team.html">About us</a></li>
							</ul>
						</div>
					</div>

					

					<div class="col-md-3 col-sm-6 col-xs-12 animate-box">
						<div class="fh5co-footer-widget">
							<h3>Contact Us</h3>
							<p>
								<a href="mailto:sjung@mail.hs-ulm.de.co">sjung@mail.hs-ulm.de</a> <br>
								Priwitzstraße 10 <br>
								Ulm <br>
								<a href="tel:+123456789">+12 34  5677 89</a>
							</p>
						</div>
					</div>

					

				</div>
				
			</div>
			<div class="fh5co-copyright animate-box">
				<div class="container">
					<div class="row">
						<div class="col-md-12">
							<p class="fh5co-left"><small>&copy; 2016 <a href="index.html">Guide</a> free html5. All Rights Reserved.</small></p>
							<p class="fh5co-right"><small class="fh5co-right">Designed by <a href="http://freehtml5.co" target="_blank">FREEHTML5.co</a> Demo Images: <a href="http://unsplash.com" target="_blank">Unsplash</a></small></p>
						</div>
					</div>
				</div>
			</div>
				</div>
				
			</div>
			<div class="fh5co-copyright animate-box">
				<div class="container">
					<div class="row">
						<div class="col-md-12">
							<p class="fh5co-left"><small>&copy; 2016 <a href="index.html">Guide</a> free html5. All Rights Reserved.</small></p>
							<p class="fh5co-right"><small class="fh5co-right">Designed by <a href="http://freehtml5.co" target="_blank">FREEHTML5.co</a> Demo Images: <a href="http://unsplash.com" target="_blank">Unsplash</a></small></p>
						</div>
					</div>
				</div>
			</div>
		</footer>
		<!-- END #fh5co-footer -->
	</div>
	<!-- END #fh5co-page -->
	
	

	
	<!-- jQuery -->
	<script src="js/jquery.min.js"></script>
	<!-- jQuery Easing -->
	<script src="js/jquery.easing.1.3.js"></script>
	<!-- Bootstrap -->
	<script src="js/bootstrap.min.js"></script>
	<!-- Waypoints -->
	<script src="js/jquery.waypoints.min.js"></script>
	<!-- Flexslider -->
	<script src="js/jquery.flexslider-min.js"></script>
	<!-- Magnific Popup -->
	<script src="js/jquery.magnific-popup.min.js"></script>
	<script src="js/magnific-popup-options.js"></script>

	

	<!-- Main JS (Do not remove) -->
	<script src="js/main.js"></script>

	
	</body>
</html>


		
            
                        