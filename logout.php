<?php  
include 'config/class.php';
if (isset($_SESSION['user'])) 
{
	unset($_SESSION['user']);
}
echo "<script>alert('Berhasil logout!')</script>";
echo "<script>location='login.php';</script>";
?>