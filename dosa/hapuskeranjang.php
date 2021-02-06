<?php
session_start();
$id_ayam = $_GET["id"];
unset($_SESSION["keranjang"][$id_ayam]);



echo "<script>alert('ayam telah telah dihapus dari keranjang belanja anda');</script>";
echo "<script>location='keranjang.php';</script>";

?>