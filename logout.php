<?php 
session_start();


if (isset($_SESSION['Tim Buser'])) {
	unset($_SESSION['Tim Buser']);
	header("Location:index.php");
}else if(isset($_SESSION['Admin Witel'])){
	unset($_SESSION['Admin Witel']);
	header("Location:index.php");
}else if(isset($_SESSION['Admin Regional'])){
	unset($_SESSION['Admin Regional']);
	header("Location:index.php");
}



 ?>