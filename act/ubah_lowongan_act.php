<?php 
include '../include/conn/config.php';
$kode_lowongan=$_POST['kode_lowongan'];
$judul=$_POST['judul'];
$tanggal=$_POST['tanggal'];
$lowongan=$_POST['lowongan'];

mysql_query("update tbl_lowongan set judul='$judul', tanggal='$tanggal', lowongan='$lowongan' where kode_lowongan='$kode_lowongan'");
header("location:../admin/lowongan.php");

?>