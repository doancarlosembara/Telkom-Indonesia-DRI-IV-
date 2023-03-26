

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Login</title>
	<link rel="shortcut icon" type="image/x-icon" href="img\svg telkom.png">
	
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <link rel="stylesheet" href="css/magnific-popup.css">
    <link rel="stylesheet" href="css/font-awesome.min.css">
    <link rel="stylesheet" href="css/themify-icons.css">
    <link rel="stylesheet" href="css/nice-select.css">
    <link rel="stylesheet" href="css/flaticon.css">
    <link rel="stylesheet" href="css/animate.css">
    <link rel="stylesheet" href="css/slicknav.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/login.css">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>

        <div class="header-area ">
            <div id="sticky-header" class="main-header-area">
                <div class="container-fluid p-0">
                    <div class="row align-items-center justify-content-between no-gutters">
                        <div class="col-xl-2 col-lg-2">
                            <div class="logo-img">
                                <a href="Telkom Regional IV.html">
                                    <img src="img/Logo Telkom.svg" alt="" class="logoheader">
                                </a>
                            </div>
                        </div>
                        <div class="col-xl-8 col-lg-8">
                            <div class="main-menu d-none d-lg-block ">
                                <nav>
								<div class="mr-auto"></div>
								<ul id="navigation">
									<?php if (isset($_SESSION['Tim Buser'])) {?>
										<li class="nav-item">
										<a href="Tim Buser.php" class="nav-link"><?php echo $_SESSION['Tim Buser']; ?></a>
									</li>
									<li class="nav-item">
										<a href="logout.php" class="nav-link">Logout</a>
									</li>
										<?php }
										else if(isset($_SESSION['Admin Regional'])){ ?>
										<li class="nav-item">
										<a href="Admin Regional.php" class="nav-link"><?php echo $_SESSION['Admin Regional']; ?></a>
									</li>
									<li class="nav-item">
										<a href="crud users/index.php" class="nav-link">CRUD users</a>
									</li>
									<li class="nav-item">
										<a href="crud tim/index.php" class="nav-link">CRUD Tim</a>
									</li>
									<li class="nav-item">
										<a href="home.php" class="nav-link">Request</a>
									</li>
									<li class="nav-item">
										<a href="logout.php" class="nav-link">Logout</a>
									</li>
										<?php }
										else if(isset($_SESSION['Admin Witel'])){ ?>
											<li class="nav-item">
											<a href="Admin Witel.php" class="nav-link"><?php echo $_SESSION['Admin Witel']; ?></a>
										</li>
										<li class="nav-item">
												<a href="crud users/index.php" class="nav-link">CRUD users</a>
										</li>
										<li class="nav-item">
												<a href="crud tim/index.php" class="nav-link">CRUD Tim</a>
										</li>
										<li class="nav-item">
											<a href="home.php" class="nav-link">Request</a>
										</li>
										<li class="nav-item">
											<a href="logout.php" class="nav-link">Logout</a>
										</li>
										<?php }
										else{ ?><br>
											<li class="nav-item">
										<a href="index.php" class="nav-link">Login</a>
									</li>
									<li class="nav-item">
										<a href="register.php" class="nav-link">Register</a>
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
        </div>

<!-- JS here -->
<script src="js/vendor/modernizr-3.5.0.min.js"></script>
    <script src="js/vendor/jquery-1.12.4.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/isotope.pkgd.min.js"></script>
    <script src="js/ajax-form.js"></script>
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
    <script src="js/jquery.form.js"></script>
    <script src="js/jquery.validate.min.js"></script>
    <script src="js/mail-script.js"></script>
    <script src="js/main.js"></script>
</body>
</html>