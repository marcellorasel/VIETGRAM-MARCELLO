<?php
session_start();
include 'koneksi.php'; 
$username = $_POST['username'];
$password = $_POST['password'];
$data = mysqli_query($conn,"select * from user where username='$username' and password='$password'");
$cek = mysqli_num_rows($data);
 
if($cek > 0){
	$data_profil = mysqli_query($conn,"select * from profile where username='$username'");
	$row_akun = mysqli_fetch_array($data_profil);
	$_SESSION['username'] = $row_akun['username'];
	$_SESSION['status'] = "login";
	$_SESSION['name'] = $row_akun['nama'];
	$_SESSION['website'] = $row_akun["website"];
	$_SESSION['bio'] = $row_akun["bio"];
	$_SESSION['email'] = $row_akun["email"];
	$_SESSION['nohp'] = $row_akun["nohp"];
	$_SESSION['gender'] = $row_akun["gender"];
	header("location:feed.php");
}else{
	header("location:index.php");

}

?>