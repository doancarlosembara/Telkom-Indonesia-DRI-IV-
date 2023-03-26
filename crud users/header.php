<?php session_start(); ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Multilogin System</title>
	<!-- CSS here -->
    <link rel="stylesheet" href="css/style.css">
    <link rel="shortcut icon" type="image/x-icon" href="img\svg telkom.png">
</head>
<body>

<div class="header-area ">
            <div id="sticky-header" class="main-header-area">
                <div class="container-fluid p-0">
                    <div class="row align-items-center justify-content-between no-gutters">
                        <div class="col-xl-2 col-lg-2">
                            <div class="logo-img" style="padding-top:25px;padding-bottom:45px;">
                                <a href="">
                                    <img src="img/Logo Telkom.svg">
                                </a>
                            </div>
                        </div>
                            <div class="main-menu d-none">
                                <nav>
								<div class="mr-auto"></div>
								<ul id="navigation">
									<?php if (isset($_SESSION['Tim Buser'])) {?>
										<li class="nav-item">
										<a class="nav-link">
											<strong>
												Hi, <?php echo $_SESSION['Tim Buser']; ?>
									</strong>
								</a>
									</li>
										<?php }
										else if(isset($_SESSION['Admin Regional'])){ ?>
										<li class="nav-item">
										<a class="nav-link">
											<strong>
												Hi, <?php echo $_SESSION['Admin Regional']; ?>
										</strong>
										</a>
									</li>
										<?php }
										else if(isset($_SESSION['Admin Witel'])){ ?>
											<li class="nav-item">
											<a class="nav-link">
												<strong>
													Hi, <?php echo $_SESSION['Admin Witel']; ?>
										</strong>
												</a>
										</li>
										<?php }
									?>
									</ul>
									</nav>
								</div>
                        <div class="col-12">
                            <div class="mobile_menu d-block d-lg-none"></div>
                        </div>
                    </div>
                </div>
            </div>

<!-- JS here -->
<script src="js/vendor/modernizr-3.5.0.min.js"></script>
    <script src="js/vendor/jquery-1.12.4.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/isotope.pkgd.min.js"></script>
    <script src="js/waypoints.min.js"></script>
    <script src="js/jquery.counterup.min.js"></script>
    <script src="js/imagesloaded.pkgd.min.js"></script>
    <script src="js/scrollIt.js"></script>
    <script src="js/jquery.scrollUp.min.js"></script>
    <script src="js/wow.min.js"></script>
    <script src="js/nice-select.min.js"></script>
    <script src="js/jquery.slicknav.min.js"></script>
    <script src="js/jquery.magnific-popup.min.js"></script>
    <script src="js/jquery.countdown.js"></script>
    <script src="js/plugins.js"></script>

    <!--contact js-->
    <script src="js/contact.js"></script>
    <script src="js/jquery.ajaxchimp.min.js"></script>
    <script src="js/jquery.validate.min.js"></script>
    <script src="js/mail-script.js"></script>
    <script src="js/main.js"></script>
</body>
</html>