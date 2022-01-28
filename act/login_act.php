<?php 
session_start();
include '../include/conn/config.php';
$email=$_POST['email'];
$password=$_POST['password'];
$tipe_user=$_POST['tipe_user'];

if ($tipe_user=="Pimpinan"){
	$query=mysql_query("select * from tbl_akun where email='$email' and password='$password'")or die(mysql_error());
	if(mysql_num_rows($query) == 1){
		$_SESSION['email'] = $email;
		header("location:../pimpinan/index?link=<?php echo $Encrypted?>");
	}else{
		header("location:../login?pesan=gagal")or die(mysql_error());
		// mysql_error();
	}
	// echo $pas;

}else{
	$query=mysql_query("select * from tbl_akun where email='$email' and password='$password'")or die(mysql_error());
	if(mysql_num_rows($query) == 1){
		$_SESSION['email'] = $email;
		header("location:../admin/index?link=<?php echo $Encrypted?>");
	}else{
		header("location:../login?pesan=gagal")or die(mysql_error());
		// mysql_error();
	}
	// echo $pas;

}




 ?>