<?php 
session_start();
  include("includes/connection.php");

   
   $output = "";

  if (isset($_POST['login'])) {
  	   
  	   $uname = $_POST['uname'];
  	   $role = $_POST['role'];
  	   $pass = $_POST['pass'];

  	   if (empty($uname)) {
  	   	
  	   }else if(empty($role)){

  	   }else if(empty($pass)){

  	   }else{

         $query = "SELECT * FROM users WHERE username='$uname' AND role='$role' AND password='$pass'";
         $res = mysqli_query($connect,$query);

         if (mysqli_num_rows($res) == 1) {

         	  if ($role == "Tim Buser") {

				$_SESSION['login'] = true;
                $_SESSION['type'] = $row['type'];
         	  	$_SESSION['Tim Buser'] = $uname;
         	  	header("Location: Tim Buser.php");
         	  	
         	  }else if($role == "Admin Witel"){
                
				$_SESSION['login'] = true;
                $_SESSION['type'] = $row['type'];
                $_SESSION['Admin Witel'] = $uname;
                header("Location: Admin Witel.php");


         	  }else if($role == "Admin Regional"){
                
				$_SESSION['login'] = true;
                $_SESSION['type'] = $row['type'];
                $_SESSION['Admin Regional'] = $uname;
                header("Location: Admin Regional.php");
			  }
			  
         	 $output .= "you have logged-In";
         }else{
             $output .= "Failed to login";
         }

  	   }
  }




 ?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Login</title>
	<link rel="shortcut icon" type="image/x-icon" href="img\svg telkom.png">

</head>
<body>
	<?php include("header.php"); ?>


<div class="about_area">
        <div class="shape-1 d-none d-xl-block">
            <img src="img/about/shap1.png" alt="">
        </div>
        <div class="shape-2 d-none d-xl-block">
            <img src="img/about/shap2.png" alt="">
        </div>
        <div class="container">
            <div class="row align-items-center">
	<div class="container">
		<div class="col-md-12">
			<div class="row d-flex justify-content-center">
				<div class="col-md-6 shadow-sm" style="margin-top:-50px;padding-bottom:100px;">
					<form method="post">
						<h3 class="text-center my-3">Login</h3>
						<div class="text-center"><?php echo $output; ?></div>
						<label>Username</label>
						<input type="text" name="uname" class="form-control my-2" placeholder="Enter Username" autocomplete="off">
                         
                         <label>Role</label>
						<select name="role" class="form-control my-2">
							<option value="">Pilih Role</option>
							<option value="Tim Buser">Tim Buser</option>
							<option value="Admin Witel">Admin Witel</option>
							<option value="Admin Regional">Admin Regional</option>
						</select>

						<label>Password</label>
						<input type="password" name="pass" class="form-control my-2" placeholder="Enter Password">

						<input type="submit" name="login" class="btn btn-success" value="Login">
					</form>
				</div>
			</div>
		</div>
	</div>
	</div>
        </div>
    </div>

</body>
</html>