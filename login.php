<?php
session_start();

include 'koneksi.php';

$username =$_POST['username'];
$password = MD5($_POST['password']);

$data =mysqli_query($koneksi,"select * from admin where username='$username' and password='$password'");

$cek = mysqli_num_rows($data);

if($cek > 0){
    $row = mysqli_fetch_assoc($data);
    $_SESSION['username']= $username;
    $_SESSION['status']= "login";
    $_SESSION['level']=$row['level'];
    header("location:admin/index.php");

    if($_SESSION['level']== 1){
        header("location:admin/index.php");
    }else if ($_SESSION['level']== 2){
        header("location:pegawai/index2.php");
    }
}else{
    header("location:index.php?pesan=gagal");
}
?>