<?php 
    
include 'koneksi.php';

    $cek_user=mysql_num_rows(mysql_query("SELECT * FROM pelanggan WHERE username='$_POST[username]'"));
    if (isset($_POST["Login"]))
  {


    // lakukan kuery ngecek akun ditabel pelanggan di db
    $ambil = $koneksi->query("SELECT *FROM pelanggan
      WHERE username ='$_POST[user]' AND password='$_POST[pass]'");
    //ngitung akun yang terambil
    $akunyangcocok = $ambil->num_rows;
    // jika 1 akun yang cocok, maka di loginkan
    if ($akunyangcocok==1)
    {



      $_SESSION["admin"] = $ambil->fetch_assoc();
      echo "<div class='alert alert-info'>Login sukses</div>";
      echo "<meta http-equiv='refresh' content='1;url=index.php'>";

    }
    else
    {
       echo '<script language="javascript">
              alert ("Registrasi Berhasil Di Lakukan!");
              window.location="index.php";
              </script>';
              exit();

    }
    }
?>