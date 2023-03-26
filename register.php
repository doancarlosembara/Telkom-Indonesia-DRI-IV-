<?php
    session_start(); //we need session for the log in thingy XD 
    include("functions.php");
?>

<?php 

include("includes/connection.php");

$output = "";

if (isset($_POST['register'])) {
	
	$NIK = $_POST['NIK'];
	$uname = $_POST['uname'];
	$telephone = $_POST['telephone'];
	$email = $_POST['email'];
	$pass = $_POST['pass'];
	$c_pass = $_POST['c_pass'];
	$witel = $_POST['witel'];
	$role = $_POST['role'];
	$type = $_POST['type'];

	$error = array();

	if (empty($NIK)) {
		$error['error'] = "NIK is Empty";
	}else if(empty($uname)){
		$error['error'] = "Username is empty";
	}else if(empty($telephone)){
		$error['error'] = "No. HP is empty";
	}else if(empty($email)){
		$error['error'] = "Email is empty";
	}else if(empty($pass)){
		$error['error'] = "Enter Password";
	}else if(empty($c_pass)){
		$error['error'] = "Confirm Password";
	}else if($pass != $c_pass){
		$error['error'] = "Both password do not match";
	}else if(empty($witel)){
		$error['error'] = "Select witel";
	}else if(empty($role)){
		$error['error'] = "Select role";
	}else if(empty($type)){
		$error['error'] = "Select type";
	}



	if (isset($error['error'])) {
		$output .= $error['error'];
	}else{
		$output .= "";
	}


	if (count($error) < 1) {
		
		$query = "INSERT INTO requests (NIK,username,telephone,email,password,witel,role,type) VALUES('$NIK','$uname','$telephone','$email','$pass','$witel','$role','$type')";
		$res = mysqli_query($connect,$query);

		if ($res) {
			$output .= "You have successfully registered";
		}else{
			$output .= "Failed to register";
		}
	}
}



 ?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Register</title>
	<link rel="shortcut icon" type="image/x-icon" href="img\svg telkom.png">
</head>

<?php
        if(isset($_POST['requests'])){
            $NIK = $_POST['NIK'];
			$uname = $_POST['uname'];
			$telephone = $_POST['telephone'];
			$email = $_POST['email'];
			$pass = $_POST['pass'];
			$c_pass = $_POST['c_pass'];
			$witel = $_POST['witel'];
			$role = $_POST['role'];
			$type = $_POST['type'];
			$query = "INSERT INTO requests (NIK,username,telephone,email,password,witel,role,type) VALUES('$NIK','$uname','$email','$telephone','$pass','$witel','$role','$type')";
            if(performQuery($query)){
                echo "<script>alert('Your account request is now pending for approval. Please wait for confirmation. Thank you.')</script>";
            }else{
                echo "<script>alert('Unknown error occured.')</script>";
            }
        }
		?>


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
				<div class="col-md-6 shadow-sm">
					<form method="post">
						<h3 class="text-center my-3">Register</h3>

						<div class="text-center"><?php echo $output; ?></div>

						<label>NIK</label>
						<input type="text" name="NIK" class="form-control my-2" placeholder="Enter NIK" autocomplete="off">

						<label>username</label>
						<input type="text" name="uname" class="form-control my-2" placeholder="Enter Username" autocomplete="off">

						<label>No. Telp</label>
						<input type="text" name="telephone" class="form-control my-2" placeholder="Enter No. Telephone" autocomplete="off">

						<label for="inputEmail">Email</label>
						<input type="email" id="inputEmail" name="email" class="form-control my-2" placeholder="Enter Email" required autofocus>

						<label for="inputPassword">Password</label>
						<input type="password" id="inputPassword" name="pass" class="form-control my-2" placeholder="Enter Password">

						<label>Confirm Password</label>
						<input type="password" name="c_pass" class="form-control my-2" placeholder="Enter Confirm Password">

						<label>Witel</label>
						<select class="form-control my-2" name="witel">
							<option value="">Pilih Witel</option>
							<option value="Kudus">Kudus</option>
							<option value="Magelang">Magelang</option>
							<option value="Pekalongan">Pekalongan</option>
							<option value="Purwokerto">Purwokerto</option>
							<option value="Semarang">Semarang</option>
							<option value="Solo">Solo</option>
							<option value="Yogyakarta">Yogyakarta</option>
							</select>
							<label for="" class="control-label">Role</label>
							<select name="role" class="form-control my-2">
								<option value="Tim Buser">Tim Buser</option>
								<option value="Admin Witel">Admin Witel</option>
								<option value="Admin Regional">Admin Regional</option>
							</select>
							<label for="" class="control-label">Type</label>
							<select name="type" class="form-control my-2">
								<option value="3">Buser</option>
								<option value="2">Witel</option>
								<option value="1">Regional</option>
							</select><br>

						<!-- captcha -->
		<form method="post" onsubmit="return submitUserForm();">
    <div class="g-recaptcha" data-sitekey="6LduyhIhAAAAABiJyTGQyF_aTge7JVSDzmQNtNip" data-callback="verifyCaptcha"></div>
    <div id="g-recaptcha-error"></div><br>
	<input type="checkbox" name="terms" id="terms" onchange="activateButton(this)">  
	I Agree to The <a href="terms and conditions.html">Terms & Coditions</a>
	<div class="input-group" style="padding-bottom:25px;">
	<input type="submit" name="register" class="btn btn-success" value="Register">
			</div>
</form>
					</form>
				</div>
			</div>
		</div>
	</div>
	</div>
        </div>
    </div>

	<div class="" style="margin-top: 30px;"></div>
	<script src='https://www.google.com/recaptcha/api.js'></script>

<script>
var recaptcha_response = '';
function submitUserForm() {
    if(recaptcha_response.length == 0) {
        document.getElementById('g-recaptcha-error').innerHTML = '<span style="color:red;">This field is required.</span>';
        return false;
    }
    return true;
}
 
function verifyCaptcha(token) {
    recaptcha_response = token;
    document.getElementById('g-recaptcha-error').innerHTML = '';
}

<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
</script>

</body>
</html>