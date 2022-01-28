<?php 
include '../include/conn/config.php';
$kode_pelamar=$_GET['kode_pelamar'];
$pilih = mysql_query("select * from tbl_pelamar  where kode_pelamar='$kode_pelamar'");
$data = mysql_fetch_array($pilih);
$document = $data['document'];
unlink('../assets/document/'.$document);
$hapus = mysql_query("delete from tbl_pelamar where kode_pelamar='$kode_pelamar'");
header("location:../admin/pelamar.php");
?>


