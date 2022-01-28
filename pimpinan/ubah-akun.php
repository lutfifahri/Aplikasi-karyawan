<?php
  	include "header.php";
 ?>
 <br>
 <br>
	<div class="container">
		  <div class="col-xs-12 col-sm-12 col-md-8">
		  	<div class="page-header">
			  <h4>Ubah Akun</h4>
			</div>
		
<?php
$email=$_SESSION['email'];
$det=mysql_query("select * from tbl_akun where email='$email'")or die(mysql_error());
while($d=mysql_fetch_array($det)){
?>					
	<form action="../act/ubah_akun_act.php" method="post" enctype="multipart/form-data">
		<table class="table">
			<input type="hidden" readonly class="form-control" name="id" value="<?php echo $d['id'] ?>">
			
			
			<tr>
				<td>Nama Lengkap</td>
				<td><input type="text" class="form-control" name="nama" value="<?php echo $d['nama'] ?>"></td>
			</tr>
			
			<tr>
				<td>Email</td>
				<td><input type="email" class="form-control" name="email" value="<?php echo $d['email'] ?>"></td>
			</tr>

			<tr>
				<td>Password</td>
				<td><input type="text" class="form-control" name="password" value="<?php echo $d['password'] ?>"></td>
			</tr>
			
		<div class="text-right">
		<a href="akun.php" class="btn btn-danger" type="button" data-dismiss="modal">BATAL</a>
		<input type="submit" class="btn btn-danger" value="UBAH">

		</div>
		<br>
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