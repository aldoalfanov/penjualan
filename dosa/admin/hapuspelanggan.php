<?php

$ambil= $koneksi->query("SELECT *FROM  ayam WHERE id_ayam='$_GET[id]'");

 $pecah = $ambil->fetch_assoc();
 



$koneksi->query("DELETE FROM pelanggan WHERE id_pelanggan='$_GET[id]' ");

echo "<script>alert('Data Pelanggan Berhasil Dihapus');</script>";
echo "<script>location='index.php?halaman=pelanggan';</script>";

?>