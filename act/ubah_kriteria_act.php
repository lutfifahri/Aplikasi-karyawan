<?php 
include '../include/conn/config.php';
$kode_kriteria=$_POST['kode_kriteria'];
$nama_kriteria=$_POST['nama_kriteria'];
$bobot_kriteria=$_POST['bobot_kriteria'];
$tipe_kriteria=$_POST['tipe_kriteria'];

mysql_query("update tbl_kriteria set nama_kriteria='$nama_kriteria', bobot_kriteria='$bobot_kriteria', tipe_kriteria='$tipe_kriteria' where kode_kriteria='$kode_kriteria'");
header("location:../admin/kriteria.php");

?>