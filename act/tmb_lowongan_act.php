<?php 
include '../include/conn/config.php';
$kode_lowongan=$_POST['kode_lowongan'];
$judul=$_POST['judul'];
$tanggal=$_POST['tanggal'];
$lowongan=$_POST['lowongan'];

mysql_query("insert into tbl_lowongan(kode_lowongan,judul,tanggal,lowongan) values('$kode_lowongan','$judul','$tanggal','$lowongan')") or die(mysql_error());
	header("location:../admin/lowongan.php");

 ?>
 