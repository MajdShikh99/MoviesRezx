<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<!-- CSS -->
    <link href='https://unpkg.com/boxicons@2.1.1/css/boxicons.min.css' rel='stylesheet'>

	<link rel="stylesheet" href="<?php echo $urlPath->assets_css('bootstrap-reboot.min.css.css'); ?>">
	<link rel="stylesheet" href="<?php echo $urlPath->assets_css('bootstrap-grid.min.css'); ?>">
	<link rel="stylesheet" href="<?php echo $urlPath->assets_css('owl.carousel.min.css'); ?>">
	<link rel="stylesheet" href="<?php echo $urlPath->assets_css('jquery.mCustomScrollbar.min.css'); ?>">
	<link rel="stylesheet" href="<?php echo $urlPath->assets_css('nouislider.min.css'); ?>">
	<link rel="stylesheet" href="<?php echo $urlPath->assets_css('ionicons.min.css'); ?>">
	<link rel="stylesheet" href="<?php echo $urlPath->assets_css('magnific-popup.css'); ?>">
	<link rel="stylesheet" href="<?php echo $urlPath->assets_css('plyr.css'); ?>">
	<link rel="stylesheet" href="<?php echo $urlPath->assets_css('photoswipe.css'); ?>">
	<link rel="stylesheet" href="<?php echo $urlPath->assets_css('default-skin.css'); ?>">
	<link rel="stylesheet" href="<?php echo $urlPath->assets_css('main.css'); ?>">

	<!-- Favicons -->
	<link rel="icon" type="image/png" href="images/icon.png" sizes="32x32">
	<link rel="apple-touch-icon" href="images/icon.png">

	<meta name="description" content="">
	<meta name="keywords" content="">
	<meta name="author" content="M0ajod">
	<title><?php echo echoOutput($titleHeader); ?></title>
	<meta name="description" content="<?php echo $settings['st_description']; ?>">
	<meta name="keywords" content="<?php echo $settings['st_keywords']; ?>">

</head>

<body class="body">
	<!-- header -->
	<header class="header">
		<div class="container">
			<div class="row">
				<div class="col-12">
					<div class="header__content">
						<!-- header logo -->
						<a href="<?php echo $urlPath->home(); ?>" class="header__logo">
							<h3 class="Logotext" style="color: #ff0000;font-size: 2.5rem;font-weight: 700;"><?php echo echoOutput($projectname); ?></h3>
						</a>
						<!-- end header logo -->

						<!-- header nav -->
						<ul class="header__nav">
							<li class="header__nav-item">
								<a href="<?php echo $urlPath->home(); ?>" class="header__nav-link">Home<i class='bx bx-home'></i></a>
							</li>

							<li class="header__nav-item">
								<a href="<?php echo $urlPath->movies(); ?>" class="header__nav-link">Movies<i class='bx bx-movie-play' ></i></a>
							</li>

							<!-- dropdown -->
							<li class="dropdown header__nav-item">
								<a class="dropdown-toggle header__nav-link header__nav-link--more" href="#" role="button" id="dropdownMenuMore" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class='bx bx-dots-horizontal-rounded' ></i></a>

								<ul class="dropdown-menu header__dropdown-menu scrollbar-dropdown" aria-labelledby="dropdownMenuMore">
									<li><a href="privacy.php">Privacy policy</a></li>
									<li><a href="about.php">About Us</a></li>
								</ul>
							</li>
							<!-- end dropdown -->
						</ul>
						<!-- end header nav -->

						<!-- header auth -->
						<div class="header__auth">
							
							<form class="header__search" action="<?php echo $urlPath->search(); ?>" method="GET">
								<input class="header__search-input" type="search" name="query" placeholder="Search movie.." autocomplete="off" required>
								<button class="header__search-button" type="button">
									<i class='bx bx-search' ></i>
								</button>
								<button class="header__search-close" type="button">
									<i class='bx bx-x' ></i>
								</button>
							</form>

							<button class="header__search-btn" type="button">
								    <i class='bx bx-search' ></i>
							</button>

						</div>
						<!-- end header auth -->

						<!-- header menu btn -->
						<button class="header__btn" type="button">
							<span></span>
							<span></span>
							<span></span>
						</button>
						<!-- end header menu btn -->
					</div>
				</div>
			</div>
		</div>
	</header>
	<!-- end header -->