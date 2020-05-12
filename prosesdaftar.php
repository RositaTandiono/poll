<?php
//memulai Session
session_start();
//memuat dan menginisialisasi class User
include 'user.php';
$user = new User();
if(isset($_POST['daftarSubmit'])){
 //memeriksa apakah rincian user kosong
    if(!empty($_POST['npm']) && !empty($_POST['nama']) && !empty($_POST['universitas']) && !empty($_POST['jurusan']) && !empty($_POST['email']) && !empty($_POST['password'])){
   //memeriksa apakah user sudah ada di dalam database
            $kondSblmnya['where'] = array('npm'=>$_POST['npm']);
            $kondSblmnya['return_type'] = 'count';
            $userSblmnya = $user->getRows($kondSblmnya);
            if($userSblmnya > 0){
                $sesiData['status']['type'] = 'error';
                $sesiData['status']['msg'] = 'NPM Sudah Terdaftar';
            }else{
    //memasukkan data user dalam database
                $userData = array(
                    'npm' => $_POST['npm'],
                    'nama' => $_POST['nama'],
                    'universitas' => $_POST['universitas'],
                    'jurusan' => $_POST['jurusan'],
                    'email' => $_POST['email'],
                    'password' => md5($_POST['password'])
                
                );
                $insert = $user->insert($userData);
    //Status ditetapkan berdasarkan data yang dimasukkan
                if($insert){
                    $sesiData['status']['type'] = 'Success';
                    $sesiData['status']['msg'] = 'Account Created';
                }else{
                    $sesiData['status']['type'] = 'Error';
                    $sesiData['status']['msg'] = 'Please Try Again';
                }
            }
        }
    }else{
        $sesiData['status']['type'] = 'Error';
        $sesiData['status']['msg'] = 'Silahkan Isi Semua'; 
    }
 //menyimpan status pendaftaran ke dalam Session
    $_SESSION['sesiData'] = $sesiData;
    $redirectURL = ($sesiData['status']['type'] == 'Success')?'index.php':'daftar.php';
 //mengalihkan ke halaman index/pendaftaran
    header("Location:".$redirectURL);
 //mengalihkan ke halaman home
    header("Location:index.php");
 //mengalihkan ke halaman home
    header("Location:index.php");

