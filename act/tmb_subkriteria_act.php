<?php 
include '../include/conn/config.php';
$nama_subkriteria=$_POST['nama_subkriteria'];
$kode_kriteria=$_POST['kode_kriteria'];
$bobot_nilai=$_POST['bobot_nilai'];

mysql_query("insert into tbl_subkriteria(nama_subkriteria,kode_kriteria,bobot_nilai) values('$nama_subkriteria','$kode_kriteria','$bobot_nilai')");
header("location:../admin/subkriteria.php");

?>
