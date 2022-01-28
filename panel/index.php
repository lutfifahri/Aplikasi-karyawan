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
	<style type="text/css">
	.kotak{	
		margin-top: 150px;
	}

	.kotak .input-group{
		margin-bottom: 20px;
	}
	</style>
</head>
<body>

	<div class="container">
		<?php 
		if(isset($_GET['pesan'])){
			if($_GET['pesan'] == "gagal"){
				echo "<div style='margin-bottom:-55px' class='alert alert-danger' role='alert'><span class='glyphicon glyphicon-warning-sign'></span>  &nbsp;Login Gagal !! Username dan Password Salah !!</div>";
			}
		}
		?>
	
		
			<form action="login_act.php" method="post">
				<div class="col-md-4 col-md-offset-4 kotak">
					<center><h3>Silahkan Login . . .</h3></center>

					<div class="input-group">
						<span class="input-group-addon"><span class="glyphicon glyphicon-user"></span></span>
						<input type="email" class="form-control" placeholder="Email" name="email" autocomplete="off">
					</div>
					
					<div class="input-group">
						<span class="input-group-addon"><span class="glyphicon glyphicon-lock"></span></span>
						<input type="password" class="form-control" placeholder="Password" name="password" autocomplete="off">
					</div>
					<h6>Masukan email dan password anda</h6>
					<div class="input-group">			
						<input type="submit" class="btn btn-danger" value="LOGIN" style="box-shadow: 2px 2px 4px #000000;">
					</div>
				</div>
			</form>
	

	

	 <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="../assets/js/jquery-1.11.3.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="../assets/js/bootstrap.min.js"></script>
</body>
</html>