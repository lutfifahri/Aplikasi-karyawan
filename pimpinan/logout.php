<?php 
session_start();
session_destroy();
header("location:../index?link=<?php echo $Encrypted?>");
?>