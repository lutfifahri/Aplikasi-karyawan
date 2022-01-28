<?php 
	session_start();
	include '../include/conn/cek.php';
	include '../include/conn/config.php';
	?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>PT. MUSIM MAS KIM 2</title>

    <!-- Bootstrap -->
    <link href="../assets/css/cosmo.min.css" rel="stylesheet">
    <link href="../assets/css/dataTables.bootstrap.min.css" rel="stylesheet">

    <script type="text/javascript" src="../assets/js/new/jquery.js"></script>
	<script type="text/javascript" src="../assets/js/new/jquery.js"></script>
	<script type="text/javascript" src="../assets/js/new/bootstrap.js"></script>
	<script type="text/javascript" src="../assets/js/new/jquery-ui/jquery-ui.js"></script>	
  </head>
  <body>

  	<?php 
        include "../function.php";

        $id    ="link";
        $Encrypted    =encrypt($id);
    ?> 

  
	<nav class="navbar navbar-static-top" style="background:#9be5dc; box-shadow: 8px 8px 16px #000000; width:100%; z-index:1000; position:fixed;">
	  <div class="container">
		<!-- Brand and toggle get grouped for better mobile display -->
		<div class="navbar-header" >
		  <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
			<span class="sr-only">Toggle navigation</span>
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
		  </button>
		</div>

		<!-- Collect the nav links, forms, and other content for toggling -->
		<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1" >
		  <ul class="nav navbar-nav">
			<li><a href="index?link=<?php echo $Encrypted?>"><font color="black">HOME</font></a></li>
			<li><a href="metode_moora.php?link=<?php echo $Encrypted?>"><font color="black">METODE MOORA</font></a></li>
			<li><a href="metode_saw.php?link=<?php echo $Encrypted?>"><font color="black">SAW</font></a></li>

			
	
			<li><a href="analisametode.php?link=<?php echo $Encrypted?>"><font color="black">LAPORAN</font></a></li>
		  </ul>

		  <ul class="nav navbar-nav navbar-right">
		<?php
		$email=$_SESSION['email'];
		$det=mysql_query("select * from tbl_akun where email='$email'")or die(mysql_error());
		while($d=mysql_fetch_array($det)){
		?>

		<li><a href="#"><font color="black"><?php echo $d['nama'] ?></font></a></li>
		<?php 
                                }
                                ?>
			<li class="dropdown">
			  <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><font color="black"><span class="glyphicon glyphicon-user"></span><span class="caret"></span></font></a>
			  <ul class="dropdown-menu">
				<li><a href="akun.php?link=<?php echo $Encrypted?>">Akun</a></li>
				<li role="separator" class="divider"></li>
				<li><a href="logout.php?link=<?php echo $Encrypted?>">Logout</a></li>
			  </ul>
			</li>
		  </ul>
		</div><!-- /.navbar-collapse -->
	  </div><!-- /.container-fluid -->
	</nav>
  
    <div class="container">