<?php
session_start();
//mendapatkan id_ayam dari url
$id_ayam = $_GET['id'];

if (isset($_SESSION['keranjang'][$id_ayam]))
{
	$_SESSION['keranjang'][$id_ayam]+=1;
}
else
{
	$_SESSION['keranjang'][$id_ayam]=1;
}

// echo "<prev>";
// print_r($_SESSION);
// echo "</prev>";

// larikan kehalaman keranjang
echo "<script>alert('ayam telah masuk ke keranjang belanja anda');</script>";
echo "<script>location='keranjang.php';</script>";
?>