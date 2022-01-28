<?php
 include "header.php";
?>
<br>
<br>
<br>
<br>
<div class="container">	
<div class="col-md-6 text-left">
<br>
</div>
<div class="col-md-6 text-right">
&nbsp;<button onclick="location.href='pelamar.php'" class="btn btn-danger">KEMBALI</button>
</div>

<?php
$kode_pelamar=mysql_real_escape_string($_GET['kode_pelamar']);
$det=mysql_query("select * from tbl_pelamar where kode_pelamar='$kode_pelamar'")or die(mysql_error());
while($d=mysql_fetch_array($det)){
?>					
	<form >
		<table class="table">

		<tr><td>
		<h4>Data Pelamar</h4></td>
		</tr>
			<tr>
				<td><b>Kode Lowongan</b></td>
				<td><b><?php echo $d['kode_lowongan'] ?></b></td>
			</tr>
			<tr>
				<td><b>Nama Lengkap</b></td>
				<td><b><?php echo $d['nama'] ?></b></td>
			</tr>

			<tr>
				<td><b>Alamat</b></td>
				<td><b><?php echo $d['alamat'] ?></b></td>
			</tr>
			
			<tr>
				<td><b>Jenis Kelamin</b></td>
				<td><b><?php echo $d['jenis_kelamin'] ?></b></td>
			</tr>

			<tr>
				<td><b>No Telepon</b></td>
				<td><b><?php echo $d['no_telp'] ?></b></td>
			</tr>

		<tr>
		<td><b>Document</b></td>
		<td><object onerror="this.src='../assets/images/images-not.png'" data="../assets/document/<?php echo $d['document']?>" width="900" height="500" style="border:1px solid;"></object></td>
		<tr>

			

		
		</table>
	</form>

	<?php 
}
?>


</div>

<?php
include_once 'footer.php';
?>
