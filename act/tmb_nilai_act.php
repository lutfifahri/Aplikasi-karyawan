<?php 
include '../include/conn/config.php';
$kode_pelamar=$_POST['kode_pelamar'];
$kode_kriteria=$_POST['kriteria'];
$kode_subkriteria=$_POST['subkriteria'];
$kuerinya = mysql_query("SELECT * from tbl_subkriteria INNER JOIN tbl_kriteria ON tbl_subkriteria.kode_kriteria = tbl_kriteria.kode_kriteria WHERE tbl_subkriteria.kode_kriteria='$kode_kriteria' AND tbl_subkriteria.kode_subkriteria='$kode_subkriteria'");
		$datanya = mysql_fetch_assoc($kuerinya);
		$bobot_penilaian = $datanya['bobot_nilai'];

mysql_query("insert into tbl_penilaian(kode_pelamar,kode_kriteria,kode_subkriteria,bobot_penilaian) values('$kode_pelamar','$kode_kriteria','$kode_subkriteria','$bobot_penilaian')");
	header("location:../admin/nilai.php");

 ?>