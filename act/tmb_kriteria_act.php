<?php 
include '../include/conn/config.php';
$nama_kriteria=$_POST['nama_kriteria'];
$bobot_kriteria=$_POST['bobot_kriteria'];
$tipe_kriteria=$_POST['tipe_kriteria'];

mysql_query("insert into tbl_kriteria(nama_kriteria,bobot_kriteria,tipe_kriteria) values('$nama_kriteria','$bobot_kriteria','$tipe_kriteria')");
	header("location:../admin/kriteria.php");

 ?>
 