<?php  
include 'config/class.php';
if (isset($_GET['id_phone'])) 
{
	$id_phone = $_GET['id_phone'];
	$phone->delete($id_phone);
	echo "<script>alert('Smartphone berhasil dihapus!');</script>";
	echo "<script>location='phone.php';</script>";
}
if (isset($_GET['id_kriteria'])) 
{
	$id_kriteria = $_GET['id_kriteria'];
	$kriteria->delete($id_kriteria);
	echo "<script>alert('Kriteria berhasil dihapus!');</script>";
	echo "<script>location='kriteria.php';</script>";
}
if (isset($_GET['id_user'])) 
{
	$id_user = $_GET['id_user'];
	$user->delete($id_user);
	echo "<script>alert('User berhasil dihapus!');</script>";
	echo "<script>location='user.php';</script>";
}
if (isset($_GET['id_raking'])) 
{
	$id_raking = $_GET['id_raking'];
	$rangking->delete($id_raking);
	echo "<script>alert('Rangking berhasil dihapus!');</script>";
	echo "<script>location='rangking.php';</script>";
}

if (isset($_GET['id_sub_kriteria'])) 
{
	$id_sub_kriteria = $_GET['id_sub_kriteria'];
	$id_kriteria = $_GET['id_krt'];
	$kriteria->delete_sub($id_sub_kriteria);
	echo "<script>alert('Sub kriteria berhasil dihapus!');</script>";
	echo "<script>location='sub_kriteria.php?id=$id_kriteria';</script>";
}
?>