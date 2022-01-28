<?php 
include '../include/conn/config.php';
$kode_lowongan=$_GET['kode_lowongan'];
mysql_query("delete from tbl_lowongan where kode_lowongan='$kode_lowongan'");
header("location:../admin/lowongan.php");

?>
