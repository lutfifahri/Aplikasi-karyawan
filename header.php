<?php 
  include 'include/conn/config.php';
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
    <link href="assets/css/cosmo.min.css" rel="stylesheet">
    <link href="assets/css/shop.css" rel="stylesheet">
    <link href="assets/css/dataTables.bootstrap.min.css" rel="stylesheet">


  <script type="text/javascript" src="assets/js/new/jquery.js"></script>
	<script type="text/javascript" src="assets/js/new/jquery.js"></script>
	<script type="text/javascript" src="assets/js/new/bootstrap.js"></script>
	<script type="text/javascript" src="assets/js/new/jquery-ui/jquery-ui.js"></script>	
  <script type="text/javascript" src="ckeditor/ckeditor.js"></script> 
  </head>


  <body>
  	<?php 
        include "function.php";

        $id    ="link";
        $Encrypted    =encrypt($id);
    ?> 

  
	<nav class="navbar navbar-static-top" style="background:#a0bed1; box-shadow: 8px 8px 16px #000000; width:100%; z-index:1000; position:fixed;">
    <div style="text-align: left; margin: 20px;">
       <a href="index?link=<?php echo $Encrypted?>" class="btn btn-primary" style="text-align:left;box-shadow: 2px 2px 8px #888888;">Lowongan</a>
      <a href="pengumuman?link=<?php echo $Encrypted?>" class="btn btn-primary" style="text-align:left;box-shadow: 2px 2px 8px #888888;">Pengumuman</a>
      <a href="login?link=<?php echo $Encrypted?>" class="btn btn-primary" style="text-align:right;box-shadow: 2px 2px 8px #888888;">Login</a>
    </div>
	</nav>

  

    	