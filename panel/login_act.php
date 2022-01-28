<?php 
session_start();
include '../include/conn/config.php';
$email=$_POST['email'];
$password=$_POST['password'];

$query=mysql_query("select * from tbl_akun where email='$email' and password='$password'")or die(mysql_error());
$cek =mysql_num_rows($query);

if ($cek > 0) {
# code...
	$data = mysql_fetch_assoc($query);

	if ($data['level']=="Admin") {
	$_SESSION['email'] = $email;
	$_SESSION['level'] = "Admin";
	
	header("location:../admin/index?link=<?php echo $Encrypted?>");
	}
	
	elseif ($data['level']=="Pimpinan") {
	
	$_SESSION['email'] = $email;
	$_SESSION['level'] = "Pimpinan";
	
		header("location:../pimpinan/index?link=<?php echo $Encrypted?>p");
	} 
	
	
}else{
	header("location:index?pesan=gagal")or die(mysql_error());
	// mysql_error()
}
// echo $pas;
 ?>