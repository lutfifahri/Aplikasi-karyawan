<?php 
include '../include/conn/config.php';
$id=$_POST['id'];
$nama=$_POST['nama'];
$email=$_POST['email'];
$password=$_POST['password'];

mysql_query("update tbl_akun set nama='$nama', email='$email', password='$password' where id='$id'");
header("location:../admin/akun.php");

?>