<?php
require_once 'koneksi.php';
require_once 'fungsi.php';



$NIK_err = $up_type_err ="";
if($_SERVER['REQUEST_METHOD']=='POST'){
	
	
	if(empty($_POST['NIK'])){
		$NIK_err = "Harap pilih salah satu data yang akan dihapus";
	}else{
		$NIK = $_POST['NIK'];
		$NIK = implode(",", $NIK);
	}
	if(empty($_POST['update_type'])){
		$up_type_err = "Pilih parameter update";
	}else{
		$update_type = $_POST['update_type'];
	}
	if(empty($NIK_err) && empty($up_type_err)){
		if(update($update_type, $NIK)):
			echo '<div class="alert alert-success">Ok data berhasil</div>';
		else:
			echo '<div class="alert alert-danger">data gagal disimpan</div>';
		endif;
	}
}

?>
<!DOCTYPE html>
<html>
<head>
	<title>CRUD Tim</title>
	    <link rel="shortcut icon" type="image/x-icon" href="img\svg telkom.png">
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
</head>
<body>

<?php include("header.php"); ?>
						
		<div class="container" style="padding-top:25px;">
			<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
				<div class="form-group">
					<label>Nama Tim:</label>
					<input type="text" class="form-control" name="update_type">
					<span class="text-danger"><?php echo $up_type_err; ?></span>
				</div>
			<div class="form-group">
				<button type="submit" class="btn btn-md btn-primary"> Update</button>
			</div>
			<table class="table table-bordered mt-4">
				<thead>
					<th colspan="7">Data Tim dan Admin</th>
				</thead>
				<thead>
					<th>NO</th>
					<th>NAMA</th>
					<th>NIK</th>
					<th>witel</th>
					<th>role</th>
					<th>tim</th>
					<th>CEK</th>
				</thead>
				<tbody>
					<?php

						$no = 1;
						
						$data =showData();
						while($row=$data->fetch_array()){
							echo '
								<tr>
									<td>'.$no.'</td>
									<td>'.$row['username'].'</td>
									<td>'.$row['NIK'].'</td>
									<td>'.$row['witel'].'</td>
									<td>'.$row['role'].'</td>
									<td>'.$row['tim'].'</td>
									<td>

										<input type="checkbox" name="NIK[]" value="'.$row['NIK'].'">
									</td>
								</tr>


							';
							$no++;
						}
						$data->free_result();

					?>
				</tbody>
			</table>
				
				<span class="text-danger"><?php echo $NIK_err; ?></span>
			</form>
		</div>

</body>
</html>