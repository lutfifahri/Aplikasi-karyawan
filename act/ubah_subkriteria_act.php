<?php 
include '../include/conn/config.php';
$kode_subkriteria=$_POST['kode_subkriteria'];
$nama_subkriteria=$_POST['nama_subkriteria'];
$kode_kriteria=$_POST['kode_kriteria'];
$bobot_nilai=$_POST['bobot_nilai'];

mysql_query("update tbl_subkriteria set nama_subkriteria='$nama_subkriteria', kode_kriteria='$kode_kriteria', bobot_nilai='$bobot_nilai' where kode_subkriteria='$kode_subkriteria'");
header("location:../admin/subkriteria.php");

?>