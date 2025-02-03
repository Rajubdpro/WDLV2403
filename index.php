<?php
session_start();
// Session check
require 'session_check.php';
// Database connection
require 'db.php';

// Logo
$sql = "SELECT * FROM logos";
$result = $conn->query($sql);
$after_assoc = mysqli_fetch_assoc($result);

// About
$sql = "SELECT * FROM abouts";
$result = $conn->query($sql);
$data = mysqli_fetch_assoc($result);

// Display Skill
$select_skill = "SELECT * FROM skills WHERE status =1";
$skill_result = mysqli_query($conn, $select_skill);

// Display Services
$select_service = "SELECT * FROM services WHERE status =1";
$select_res = mysqli_query($conn, $select_service);

// Display portfolio
$select_portfolio = "SELECT * FROM portfolios WHERE status =1";
$select_port_res = mysqli_query($conn, $select_portfolio);

?>


<!DOCTYPE html>
<html lang="zxx">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <meta name="description" content="portfolio,creative,business,company,agency,multipurpose,modern,bootstrap4">
  <title>Creative portfolio website</title>
  <!-- Mobile Specific Meta-->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- bootstrap.min css -->
  <link rel="stylesheet" href="/wdlv2403/frontend/plugins/bootstrap/css/bootstrap.min.css">
  <!-- Icon Css -->
  <link rel="stylesheet" href="/wdlv2403/frontend/plugins/themify/css/themify-icons.css">
  <!-- animate.css -->
  <link rel="stylesheet" href="/wdlv2403/frontend/plugins/animate-css/animate.css">
  <link rel="stylesheet" href="/wdlv2403/frontend/plugins/aos/aos.css">
  <!-- owl carousel -->
  <link rel="stylesheet" href="/wdlv2403/frontend/plugins/owl/assets/owl.carousel.min.css">
  <link rel="stylesheet" href="/wdlv2403/frontend/plugins/owl/assets/owl.theme.default.min.css" >
  <!-- Slick slider CSS -->
  <link rel="stylesheet" href="/wdlv2403/frontend/plugins/slick-carousel/slick/slick.css">
  <link rel="stylesheet" href="/wdlv2403/frontend/plugins/slick-carousel/slick/slick-theme.css">
    <!--------------------->
    <!---Favicon icon--->
    <link rel="icon" href="assets/images/favicon.svg" type="image/x-icon">

  <!-- Main Stylesheet -->
  <link rel="stylesheet" href="/wdlv2403/frontend/css/style.css">

</head>

<body class="portfolio" id="top">

<!-- Navigation start -->
<!-- Header Start --> 

<nav class="navbar navbar-expand-lg bg-transprent py-4 fixed-top navigation" id="navbar">
	<div class="container">
	  <a class="navbar-brand" href="index.php">
            <img width="115" src="uploads/logo/<?= $after_assoc['header_logo']?>">
	  </a>
	  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExample09" aria-controls="navbarsExample09" aria-expanded="false" aria-label="Toggle navigation">
		<span class="ti-view-list"></span>
	  </button>
  
	  <div class="collapse navbar-collapse text-center" id="navbarsExample09">
			<ul class="navbar-nav ml-auto">
			   <li class="nav-item"><a class="nav-link" href="index.php">Home</a></li>
			   <li class="nav-item"><a class="nav-link smoth-scroll" href="#skillbar">Expertise</a></li>
			   <li class="nav-item"><a class="nav-link smoth-scroll" href="#service">Services</a></li>
			   <li class="nav-item"><a class="nav-link smoth-scroll" href="#portfolio">Portfolio</a></li>
			   <li class="nav-item"><a class="nav-link smoth-scroll" href="#testimonial">Testimonial</a></li>
			   <li class="nav-item"><a class="nav-link smoth-scroll" href="#contact">Contact</a></li>
			</ul>
	  </div>
	</div>
</nav>

<!-- Navigation End -->

<!-- Banner start -->

<!-- Slider Start -->
<section class="slider py-7 ">
	<div class="container">
		<div class="row align-items-center">
			<div class="col-lg-5 col-sm-12 col-12 col-md-5">
				<div class="slider-img position-relative">
					<img src="uploads/about/<?= $data['photo']?>" alt="" class="img-fluid w-100">
				</div>
			</div>

			<div class="col-lg-6 col-12 col-md-7">
				<div class="ml-5 position-relative mt-5 mt-lg-0">
					<span class="head-trans"><?= $data['watermark']?></span>
					<h1 class="font-weight-normal text-color text-md"><i class="ti-minus mr-2"></i><?= $data['designation']?></h1>
					<h2 class="mt-3 text-lg mb-3 text-capitalize"><?= $data['name']?></h2>
					<p class="animated fadeInUp lead mt-4 mb-5 text-white-50 lh-35"><?= $data['short_des']?></p>
					<a href="#about" class="btn btn-solid-border">About Me</a>
				</div>
			</div>
		</div>
	</div>
</section>
<!-- Banner End -->

<!-- Skills start -->
<section class="section bg-gray" id="skillbar" data-aos="fade-up">
	<div class="container">
		<div class="row justify-content-center">
			<div class="col-lg-8">
				<div class="section-title text-center">
					<span class="text-color mb-0 text-uppercase letter-spacing text-sm"><i class="ti-minus mr-2"></i>Skills Set</span>
					<h2 class="title">Expertise</h2>
				</div>
			</div>
		</div>
		<div class="row">
            <?php
            foreach ($skill_result as $item){
            ?>
			<div class="col-lg-6 col-md-6">
				<div class="skill-bar mb-4 mb-lg-0">
					<div class="mb-4 text-right"><h4 class="font-weight-normal"><?=$item['skill_name']?></h4></div>
					<div class="progress">
						<div class="progress-bar" data-percent="95">
							<span class="percent-text"><span class="count"><?=$item['percentage']?></span>%</span>
						</div>
					</div>
				</div>
			</div>
            <?php
            }
            ?>
		</div>
	</div>
</section>	

<!-- Skills End -->

<!-- Service start -->
<section class="section bg-gray" id="service" data-aos="fade-up">
	<div class="container">
		<div class="row justify-content-center">
			<div class="col-lg-8">
				<div class="section-title text-center">
					<span class="text-color mb-0 text-uppercase letter-spacing text-sm"><i class="ti-minus mr-2"></i>What i do</span>
					<h2 class="title">Services</h2>
				</div>
			</div>
		</div>
		<div class="row no-gutters">
            <?php
            foreach ($select_res as $data){
            ?>
			<div class="col-lg-4 col-md-6">
				<div class="card p-5 rounded-0">
					<h3 class="my-4 text-capitalize"><?= $data['name']?></h3>
					<p><?= $data['description']?></p>
				</div>
			</div>
                <?php
            }
            ?>
		</div>

		<div class="row align-items-center mt-5" data-aos="fade-up">
			<div class="col-lg-6 mt-5">
				<h2 class="mb-5 text-lg-2 text-white-50">Let's <span class="text-white">work together</span> on your next project </h2>
			</div>
			<div class="col-lg-4 ml-auto text-right">
				<a href="#contact" class="btn btn-main text-white smoth-scroll">Hire Me</a>
			</div>
		</div>
	</div>
</section>
<!-- Service End -->

<!-- Portfolio start -->
<section class="section" id="portfolio" data-aos="fade-up">
	<div class="container">
		<div class="row justify-content-center">
			<div class="col-lg-8">
				<div class="section-title text-center">
					<span class="text-color mb-0 text-uppercase letter-spacing text-sm"><i class="ti-minus"></i>works</span>
					<h2 class="title">Portfolio</h2>
				</div>
			</div>
		</div>
	</div>

	<div class="container-fluid">
		<div class="row">
			<div class="post_gallery owl-carousel owl-theme">
                <?php
                foreach ($select_port_res as $data){
                 ?>
				<div class="item">
					<div class="portfolio-item position-relative">
						<img height="300" src="/wdlv2403/uploads/portfolio/<?= $data['photo']?>" alt="">

						<div class="portoflio-item-overlay">
							<a href="portfolio-single.html"><i class="ti-plus"></i></a>
						</div>
					</div>
					<div class="text mt-3">
						<h4 class="mb-1 text-capitalize"><?= $data['title']?></h4>
						<p class="text-uppercase letter-spacing text-sm"><?= $data['category']?></p>
					</div>
				</div>
                    <?php
                }
                ?>
			</div>
		</div>
	</div>
</section>
<!-- Portfolio End -->

<!-- Tetsimonial start -->
<section id="testimonial" class="section testomionial" data-aos="fade-up">
	<div class="container">
		<div class="row">
			<div class="col-lg-8">
				<div class="section-title">
					<span class="text-color mb-0 text-uppercase letter-spacing text-sm"> <i class="ti-minus mr-2"></i>testimonial</span>
					<h1 class="title">What People Say About me</h1>
				</div>
			</div>
		</div>

		<div class="row justify-content-center">
			<div class="col-lg-10">
				<div class="testimonial-slider">
					<div class="testimonial-item position-relative">
						<i class="ti-quote-left text-white-50"></i>
						<div class="testimonial-content">
							<p class="text-md mt-3">They do this through collaboration between our strategists, designers and technologists.They craft beautiful and unique digital experiences.Unlimited power and customization possibilities.Pixel perfect design & clear code delivered to you.</p>

							<div class="media mt-5 align-items-center">
								<img src="/wdlv2403/frontend/images/about/2.jpg" alt="" class="img-fluid  rounded-circle align-self-center mr-4">
								<div class="media-body">
									<h3 class="mb-0">John Smith</h3>
									<span class="text-muted">Creative Designer</span>
								</div>
							</div>
						</div>
					</div>
					<div class="testimonial-item position-relative">
						<i class="ti-quote-left text-white-50"></i>
						<div class="testimonial-content">
							<p class="text-md mt-3">They do this through collaboration between our strategists, designers and technologists.They craft beautiful and unique digital experiences.Unlimited power and customization possibilities.Pixel perfect design & clear code delivered to you.</p>

							<div class="media mt-5 align-items-center">
								<img src="/wdlv2403/frontend/images/about/3.jpg" alt="" class="img-fluid  rounded-circle align-self-center mr-4">
								<div class="media-body">
									<h3 class="mb-0">Smith Austin</h3>
									<span class="text-muted">Developer</span>
								</div>
							</div>
						</div>
					</div>
					<div class="testimonial-item position-relative">
						<i class="ti-quote-left text-white-50"></i>
						<div class="testimonial-content">
							<p class="text-md mt-3">They do this through collaboration between our strategists, designers and technologists.They craft beautiful and unique digital experiences.Unlimited power and customization possibilities.Pixel perfect design & clear code delivered to you.</p>

							<div class="media mt-5 align-items-center">
								<img src="/wdlv2403/frontend/images/about/3.jpg" alt="" class="img-fluid  rounded-circle align-self-center mr-4">
								<div class="media-body">
									<h3 class="mb-0">Mike jack</h3>
									<span class="text-muted">Marketer</span>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>	
		</div>
	</div>
</section>
<!-- Tetsimonial End -->

<!-- Contact start -->
<section class="section" id="contact" data-aos="fade-up">
	<div class="container">
		<div class="row justify-content-center">
			<div class="col-lg-8">
				<div class="section-title text-center">
					<span class="text-color mb-0 text-uppercase letter-spacing text-sm"> <i class="ti-minus mr-2"></i>Contact</span>
					<h1 class="title">Get in Touch</h1>
				</div>
			</div>
		</div>

		<div class="row justify-content-center">
			<div class="col-lg-8">
					<form class="contact__form form-row contact-form" method="post" action="http://themeturn.com/tf-db/ratsaan/mail.php" id="contactForm">
					 <div class="row">
                        <div class="col-12">
                            <div class="alert alert-success contact__msg" style="display: none" role="alert">
                                Your message was sent successfully.
                            </div>
                        </div>
                    </div>
					<div class="form-group col-lg-6 mb-5">
						<input type="text" id="name" name="name" class="form-control bg-transparent" placeholder="Your Name">
					</div>
					<div class="form-group col-lg-6 mb-5">
						<input type="text" name="email" id="email" class="form-control bg-transparent" placeholder="Your Email">
					</div>
					<div class="form-group col-lg-12 mb-5">
						<input type="text" name="subject" id="subject" class="form-control bg-transparent" placeholder="Your Subject">
					</div>
					
					<div class="form-group col-lg-12 mb-5">
						<textarea id="message" name="message" cols="30" rows="6" class="form-control bg-transparent" placeholder="Your Message"></textarea>
						
						<div class="text-center">
							 <input class="btn btn-main text-white mt-5" id="submit" name="submit" type="submit" class="btn btn-hero" value="Send Message">
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
</section>
<!-- Contact End -->

<!-- Footer start -->
<footer class="footer border-top-1">
	<div class="container">
		<div class="row align-items-center text-center text-lg-left">
			<div class="col-lg-2">
                <a class="footer_logo" href="index.php">
                    <img width="100" src="uploads/logo/<?= $after_assoc['footer_logo']?>">
                </a>
			</div>
			<div class="col-lg-10">
				<div class="text-right">
					<p class="lead"><span class="text-color">Dreambuzz</span> © 2019 All Right Reserved Ratsaan.</p>
					<a href="#top" class="backtop smoth-scroll"><i class="ti-angle-up"></i></a>
				</div>
			</div>
		</div>
	</div>
</footer>
<!-- Footer End -->


    <!-- 
    Essential Scripts
    =====================================-->

    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <!-- Main jQuery -->
    <script src="/wdlv2403/frontend/plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4.3.1 -->
    <script src="/wdlv2403/frontend/plugins/bootstrap/js/popper.js"></script>
    <script src="/wdlv2403/frontend/plugins/bootstrap/js/bootstrap.min.js"></script>
    <script src="/wdlv2403/frontend/plugins/nav/jquery.easing.1.3.html"></script>
    
    <!-- Slick Slider -->
    <script src="/wdlv2403/frontend/plugins/slick-carousel/slick/slick.min.js"></script>
    <script src="/wdlv2403/frontend/plugins/owl/owl.carousel.min.js"></script>
  
    <!-- Skill COunt -->
    <script src="/wdlv2403/frontend/plugins/counto/apear.js"></script>
    <script src="/wdlv2403/frontend/plugins/counto/counTo.js"></script>
    <!-- AOS Animation -->
    <script src="/wdlv2403/frontend/plugins/aos/aos.js"></script>
    
    <script src="/wdlv2403/frontend/js/script.js"></script>
    <script src="/wdlv2403/frontend/js/ajax-contact.html"></script>

  </body>
</html>
   