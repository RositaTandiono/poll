<?php 
session_start();

include 'koneksi.php';

$npm = $_POST['npm'];
$password = $_POST['password'];

$data = mysqli_query($koneksi,"select * from mahasiswa where npm='$npm' and password='$password'");

$cek = mysqli_num_rows($data);

if($cek > 0){
	$_SESSION['npm'] = $npm;
	$_SESSION['status'] = "login";
	header("location:dashboard.php");
}else{
	header("location:index.php?pesan=gagal");
}
?>

