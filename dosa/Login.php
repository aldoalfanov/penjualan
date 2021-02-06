<?php
session_start();
include 'koneksi.php';
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <!-- BOOTSTRAP STYLES-->
  <link href="assets/css/bootstrap.css" rel="stylesheet" />
  <!-- FONTAWESOME STYLES-->
  <link href="assets/css/font-awesome.css" rel="stylesheet" />
  <!-- CUSTOM STYLES-->
  <link href="assets/css/custom.css" rel="stylesheet" />
  <!-- GOOGLE FONTS-->
  <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
  <title>HALAMAN LOGIN</title>
</head>

<body>


<div class="container">
    <div class="row text-center">
      <div class="col-md-12">
        <br /></br />
        <h2>Login Pelanggan</h2>
        
        <br/>
      </div>
      <div class="container">
      <div class="row">
        <div class="col-md-4 col-md-offset-4 col-sm-offset-3 col-xs-10 col-xs-offset-1">
          <div class="panel panel-default">
           <div class="panel-heading">
            <strong>Silahkan Login</strong>
            </div>
          <div class="panel-body">
            <form rule="form" method="post">
              <br />
              <div class="form-group input-group">
                <span class="input-group-addon"><i class="fa fa-user"></i></span>
                <input type="username" class="form-control" name="username" />
              </div>
              <div class="form-group input-group">
                <span class="input-group-addon"><i class="fa fa-lock"></i></span>
                <input type="password" class="form-control" name="password" />
              </div>
              <button class="btn btn-primary btn-block" name="login">Login</button>
              <hr />
              Belum register ? <a href="registrasi.php">klik disini</a>
            </form>
          </div>
        </div>
      </div>
      </div>
    </div>
  </div>
  </div>
    </div>
  </div>
</div>
<?php
// jika ada tombo Login(tombol Login di tekan)
if (isset($_POST["login"]))
{
  $username = $_POST["username"];
  $password = $_POST["password"];

    // lakukan kuery ngecek akun ditabel pelanggan di db
    $ambil = $koneksi->query("SELECT *FROM pelanggan
      WHERE username ='$username' AND password='$password'");
    //ngitung akun yang terambil
    $akunyangcocok = $ambil->num_rows;
    // jika 1 akun yang cocok, maka di loginkan
    if ($akunyangcocok==1)
    {
      // anda sukses login
      // mendapatkan akun dalam bentuk array
      $akun = $ambil->fetch_assoc();
      // simpan di session pelanggan
      $_SESSION["pelanggan"] = $akun;
      echo "<script>alert('anda sukses login');</script>";
          if (isset($_SESSION['keranjang']) OR !empty($_SESSION["keranjang"])) 
          {
            echo "<script>location='CheckOut.php';</script>";
          }
          else
          {
            echo "<script>location='riwayat.php';</script>";
          }
      
    }
    else
    {
      // anda gagal login
      echo "<script>alert('anda gagal login, periksa akun anda');</script>";
      echo "<script>location='Login.php';</script>";

    }


}
?>

</body>
</html>