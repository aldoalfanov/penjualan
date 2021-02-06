<?php

 $ambil= $koneksi->query("SELECT *FROM  ayam WHERE id_ayam='$_GET[id]'");

 $pecah = $ambil->fetch_assoc();
 $fotoayam = $pecah['foto_ayam'];



$koneksi->query("DELETE FROM ayam WHERE id_ayam='$_GET[id]' ");

echo "<script>alert('ayam terhapus');</script>";
echo "<script>location='index.php?halaman=ayam';</script>";

?>