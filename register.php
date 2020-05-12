<?php
session_start();
$sesiData = !empty($_SESSION['sesiData'])?$_SESSION['sesiData']:'';
if(!empty($sesiData['status']['msg'])){
    $statusPsn = $sesiData['status']['msg'];
    $jenisStatusPsn = $sesiData['status']['type'];
    unset($_SESSION['sesiData']['status']);
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Polling | Create Account</title>
    <link rel="stylesheet" href="style.css" type="text/css" media="all" />
</head>
<body>
    <h1 align="center ">Create Account</h1>
 <div class="container">
  <?php echo !empty($statusPsn)?'<p class="'.$jenisStatusPsn.'">'.$statusPsn.'</p>':''; ?>
  <div class="regisForm">
   <form action="prosesdaftar.php" method="post">
    <input type="number" name="npm" placeholder="NPM" required="">
    <input type="text" name="nama" placeholder="Nama" required="">
    <input type="text" name="universitas" placeholder="Universitas" required="">
    <input type="text" name="jurusan" placeholder="Jurusan" required="">
	<input type="email" name="email" placeholder="Email" required="">
    <input type="password" name="password" placeholder="Password" required="">

    <div class="tbl-kirim">
     <input type="submit" name="daftarSubmit" value="Create Account" >
    </div>
   </form>
  </div>
 </div>
</body>
</html>