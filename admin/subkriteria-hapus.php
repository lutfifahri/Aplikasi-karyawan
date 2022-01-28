<?php 
include '../include/conn/config.php';
$kode_subkriteria=$_GET['kode_subkriteria'];
mysql_query("delete from tbl_subkriteria where kode_subkriteria='$kode_subkriteria'");
header("location:../admin/subkriteria.php");

?>
