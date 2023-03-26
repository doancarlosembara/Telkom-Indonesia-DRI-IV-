<!DOCTYPE html>
<html lang="en">
<?php 
session_start();
include('./db_connect.php');
  ob_start();
  // if(!isset($_SESSION['system'])){

    $system = $conn->query("SELECT * FROM system_settings")->fetch_array();
    foreach($system as $k => $v){
      $_SESSION['system'][$k] = $v;
    }
  // }
  ob_end_flush();
?>
<?php 
if(isset($_SESSION['login_id']))
header("location:dashboard.php?page=home");

?>
<head>
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
<?php include 'header.php' ?>
<body class="hold-transition login-page" >

<div class="header-area ">
            <div id="sticky-header" class="main-header-area">
                <div class="container-fluid p-0">
                    <div class="row align-items-center justify-content-between no-gutters">
                        <div class="col-xl-2 col-lg-2">
                            <div class="logo-img">
                                <a href="">
                                    <img src="Logo Telkom.svg" alt="" class="logoheader">
                                </a>
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-3">
                            <div class="main-menu d-none d-lg-block ">
                                <nav>
								<div class="mr-auto"></div>
								<ul id="navigation">
									<?php if (isset($_SESSION['Tim Buser'])) {?>
                    <li class="nav-item">
										<a href="Admin Regional.php" class="nav-link">Welcome, <?php echo $_SESSION['Tim Buser']; ?>!</a>
									</li>
										<?php }
										else if(isset($_SESSION['Admin Regional'])){ ?>
										<li class="nav-item">
										<a href="Admin Regional.php" class="nav-link">Welcome, <?php echo $_SESSION['Admin Regional']; ?>!</a>
									</li>
										<?php }
										else if(isset($_SESSION['Admin Witel'])){ ?>
											<li class="nav-item">
											<a href="Admin Witel.php" class="nav-link">Welcome, <?php echo $_SESSION['Admin Witel']; ?>!</a>
										</li>
										<?php }
                    else { ?>
                    <li class="nav-item">
											<a href="Admin Witel.php" class="nav-link"></a>
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

        <div class="section-top-border">
				<div class="row">
					<div class="col-md-4">
					</div>
					<div class="col-md-4">
          <div class="login-box">
  <div class="login-logo">
    <a>Dashboard</a>
  </div>
  <form action="" id="login-form">
        <div class="input-group mb-3">
          <input type="email" class="form-control" name="email" required placeholder="Email">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="password" class="form-control" name="password" required placeholder="Password">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-8">
            <div class="icheck-primary">
              <input type="checkbox" id="remember">
              <label for="remember">
                Remember Me
              </label>
            </div>
          </div>
          <!-- /.col -->
          <div class="col-4">
            <button type="submit" class="btn btn-primary">Sign In</button>
          </div>
          <!-- /.col -->
        </div>
      </form>
  </div>
</div>
					</div>
					<div class="col-md-4">
					</div>
				</div>
			</div>

<!-- /.login-box -->
<script>
  $(document).ready(function(){
    $('#login-form').submit(function(e){
    e.preventDefault()
    start_load()
    if($(this).find('.alert-danger').length > 0 )
      $(this).find('.alert-danger').remove();
    $.ajax({
      url:'ajax.php?action=login',
      method:'POST',
      data:$(this).serialize(),
      error:err=>{
        console.log(err)
        end_load();

      },
      success:function(resp){
        if(resp == 1){
          location.href ='dashboard.php?page=home';
        }else{
          $('#login-form').prepend('<div class="alert alert-danger">Username or password is incorrect.</div>')
          end_load();
        }
      }
    })
  })
  })
</script>
<?php include 'footer.php' ?>

</body>
</html>
