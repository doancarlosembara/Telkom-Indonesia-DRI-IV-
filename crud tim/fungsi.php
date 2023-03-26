<?php

function query($data){
	global $koneksi;
	$perintah=mysqli_query($koneksi, $data);
	if(!$perintah) die("Gagal query :".mysqli_connect_error());
	return $perintah;
}
function showData(){
	$sql="SELECT * FROM users";
	$perintah=query($sql);
	return $perintah;
}
function update($type, $data){

	$sql="UPDATE users SET tim='$type' WHERE NIK IN ($data)";
	$perintah=query($sql);
	return $perintah;
	
}
	



?>