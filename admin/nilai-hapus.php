<?php 
include '../include/conn/config.php';
$kode_nilai=$_GET['kode_nilai'];
mysql_query("delete from tbl_penilaian where kode_nilai='$kode_nilai'");
header("location:../admin/nilai.php");

?>
