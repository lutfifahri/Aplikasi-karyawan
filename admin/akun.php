<?php
  	include "header.php";
 ?>
 <br>
 <br>

		<div class="container">
		  <div class="col-xs-12 col-sm-12 col-md-8">
		  	<div class="page-header">
			  <h4>Detail Akun</h4>
			</div>
		
<div class="text-right">
<a href="index.php" class="btn btn-danger" type="button" data-dismiss="modal">BATAL</a>
<a href="ubah-akun.php" class="btn btn-danger" type="button" data-dismiss="modal">UBAH</a>
</div>
<br>

<?php
$email=$_SESSION['email'];
$det=mysql_query("select * from tbl_akun where email='$email'")or die(mysql_error());
while($d=mysql_fetch_array($det)){
?>					
	<form>
		<table class="table">

			<tr>
				<td><b>Nama Lengkap</b></td>
				<td><b><?php echo $d['nama'] ?></b></td>
			</tr>

			<tr>
				<td><b>Email</b></td>
				<td><b><?php echo $d['email'] ?></b></td>
			</tr>
			
			<tr>
				<td><b>Password</b></td>
				<td><b><?php echo $d['password'] ?></b></td>
			</tr>
			
			
		</table>
	</form>
	<?php 
}
?>


</div>
		<div class="col-xs-12 col-sm-12 col-md-4">
			<br>
			<br>
			<br>
			<br>
		  	<img src="../assets/images/login.png" width="450px"height="350px" style=" width: 100%; margin: 0 auto; height: auto;">
		 </div>
		</div>

<?php
include_once 'footer.php';
?>