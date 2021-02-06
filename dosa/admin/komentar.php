<?php 
  require('koneksi.php');
  $idkomen = $_GET['idKomen'];
  $query = mysqli_query($koneksi, "SELECT FROM komentar WHERE id_komentar = $id_komentar");
  if($query){
    echo "<script>alert('ada notifikasi');</script>";
    echo "<script>location='index.php?halaman=komentar';</script>";
  }

 ?>