<?php include_once('admin/includes/init.php');

$categories = Category::findAll();
$top_ad = Ads::findById(1);
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1 charset=utf-8">
		 <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->

		<?php  
			echo "<title>". $title ."</title>";
			echo '<meta property="og:title"  content="'. $og_title .'" />
			<meta property="og:description" content="'. $og_description .'" />
			<meta property="og:image"  content="'. $og_image .'" />';
		?>
		<meta name="keywords" content="Partizan, Partizan Belgrade, Partizan news, Partizan Beograd, Partizan vesti, KK Partizan, Fk Partizan">
		<meta name="author" content="Zlatko Milovanovic">
		<meta name="description" content="Sve vesti o Partizanu na jednom mestu">

		<script src="https://kit.fontawesome.com/22a6057826.js" crossorigin="anonymous"></script>
		<!-- Google font -->
		<link href="https://fonts.googleapis.com/css?family=Open+Sans:400,700%7CLato:300,400" rel="stylesheet"> 
		
		<!-- Bootstrap -->
		<link type="text/css" rel="stylesheet" href="css/bootstrap.min.css"/>

		<!-- Owl Carousel -->
		<link type="text/css" rel="stylesheet" href="css/owl.carousel.css" />
		<link type="text/css" rel="stylesheet" href="css/owl.theme.default.css" />
		
		<!-- Font Awesome Icon -->
		<link rel="stylesheet" href="css/font-awesome.min.css">

		<!-- Custom stlylesheet -->
		<link type="text/css" rel="stylesheet" href="css/style.css"/>

		<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
		<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
		<!--[if lt IE 9]>
		  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
		  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
		<![endif]-->
		<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    </head>
	<body>
	
		<!-- Header -->
		<header id="header">
			<!-- Top Header -->
			<!-- <div id="top-header">
				<div class="container">
					<div class="header-links">
						<ul>
							<li><a href="#">About us</a></li>
							<li><a href="#">Contact</a></li>
							<li><a href="#">Advertisement</a></li>
							<li><a href="#">Privacy</a></li>
							<li><a href="#"><i class="fa fa-sign-in"></i> Login</a></li>
						</ul>
					</div>
					<div class="header-social">
						<ul>
							<li><a href="#"><i class="fas fa-facebook"></i></a></li>
							<li><a href="#"><i class="fas fa-twitter"></i></a></li>
							<li><a href="#"><i class="fas fa-google-plus"></i></a></li>
							<li><a href="#"><i class="fas fa-instagram"></i></a></li>
							<li><a href="#"><i class="fas fa-youtube"></i></a></li>
						</ul>
					</div>
				</div>
			</div> -->
			<!-- /Top Header -->
			
			<!-- Center Header -->
			<div id="center-header">
				<div class="container">
					<div class="header-logo">
						<a href="index.php" class="logo"><img src="./img/grb.png" alt="" height="90px"></a>
					</div>
					<div class="center-block">
						<a href="<?php echo $top_ad->link; ?>"><img class="header-ads" src="<?php echo "admin/" . $top_ad->picturePath(); ?>" alt="" width="728px"></a> 
					</div>
				</div>
			</div>
			<!-- /Center Header -->
			
			<!-- Nav Header -->
			<div id="nav-header">
				<div class="container">
					<nav id="main-nav">
						<div class="nav-logo">
							<a href="#" class="logo"><img src="./img/logo.png" alt=""></a>
						</div>
						<ul class="main-nav nav navbar-nav">
							<li><a href="index.php">Početna</a></li>

							<?php foreach($categories as $category) : ?>
							<li><a href="#<?php echo $category->name; ?>"><?php echo $category->name ?> </a></li>
							<?php endforeach; ?>
							
						</ul>
					</nav>
					<div class="button-nav">
						<button class="search-collapse-btn"><i class="fa fa-search"></i></button>
						<button class="nav-collapse-btn"><i class="fa fa-bars"></i></button>
						<div class="search-form">
							<form>
								<input class="input" type="text" name="search" placeholder="Search">
							</form>
						</div>
					</div>
				</div>
			</div>
			<!-- /Nav Header -->
		</header>
		<!-- /Header -->