<?php 
include '../include/conn/config.php';
$kode_kriteria=$_GET['kode_kriteria'];
mysql_query("delete from tbl_kriteria where kode_kriteria='$kode_kriteria'");
header("location:../admin/kriteria.php");

?>
