<?php 
include 'header.php';
?>
<br>
<br>
<br>
<br>
<!DOCTYPE html>
<html>
<head>
	<title>SMA HANGTUA BELAWAN</title>
	<link href="assets/css/cosmo.min.css" rel="stylesheet">

	<style type="text/css">
	.kotak{	
		margin-top: 150px;
	}

	.kotak .input-group{
		margin-bottom: 20px;
	}
	</style>
</head>
<body  style="background: #a0bed1; url(); left bottom fixed;">

	<div class="container">
		<?php 
		if(isset($_GET['pesan'])){
			if($_GET['pesan'] == "gagal"){
				echo "<div style='margin-bottom:-55px' class='alert alert-danger' role='alert'><span class='glyphicon glyphicon-warning-sign'></span>  Login Gagal !! Username dan Password Salah !!</div>";
			}
		}
		?>


		
		
			<form action="act/login_act.php" method="post">
				
				<div class="col-md-4 col-md-offset-4 kotak">
					<center><h3>PT. MUSIM MAS KIM 2</h3></center>
					<div class="input-group">
						<span class="input-group-addon"><span class="glyphicon glyphicon-user"></span></span>
						<input type="email" class="form-control" placeholder="Email" name="email" autocomplete="off">
					</div>
					<h6>Masukan email anda</h6>
					<div class="input-group">
						<span class="input-group-addon"><span class="glyphicon glyphicon-lock"></span></span>
						<input type="password" class="form-control" placeholder="Password" name="password" autocomplete="off">
					</div>
					<h6>Masukan password anda</h6>
					<div class="input-group">
						<span class="input-group-addon"><span class="glyphicon glyphicon-lock"></span></span>
						<select name="tipe_user" class="form-control">
					        <option value="Admin" selected>Admin</option>
					        <option value="Pimpinan">.Pimpinan</option>
					      </select>
					</div>
					<h6>Masukan password anda</h6>
					<div class="input-group" style="float: right;">			
						<input type="submit" class="btn btn-primary" value="LOGIN">
					</div>
				</div>
			</form>
		

	

	 <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="assets/js/jquery-1.11.3.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="assets/js/bootstrap.min.js"></script>
</body>
</html>