<?php
session_start();
$koneksi = new mysqli("localhost","root","","dosa");
?>


<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Free Bootstrap Admin Template : Binary Admin</title>
  <!-- BOOTSTRAP STYLES-->
  <link href="assets/css/bootstrap.css" rel="stylesheet" />
  <!-- FONTAWESOME STYLES-->
  <link href="assets/css/font-awesome.css" rel="stylesheet" />
  <!-- CUSTOM STYLES-->
  <link href="assets/css/custom.css" rel="stylesheet" />
  <!-- GOOGLE FONTS-->
  <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
</head>
<body>
  <div class="container">
    <div class="row text-center">
      <div class="col-md-12">
        <br /></br />
        <h2>Toko Ayam Mutu : Login</h2>
        <h5>(Login yourself to get acces)</h5>
        <br/>
      </div>
      <div class="row">
        <div class="col-md-4 col-md-offset-4 col-sm-offset-3 col-xs-10 col-xs-offset-1">
          <div class="panel panel-default">
           <div class="panel-heading">
            <strong>Enter Detail To Login</strong>
            </div>
          <div class="panel-body">
            <form rule="form" method="post">
              <br />
              <div class="form-group input-group">
                <span class="input-group-addon"><i class="fa fa-tag"></i></span>
                <input type="text" class="form-control" name="user" />
              </div>
              <div class="form-group input-group">
                <span class="input-group-addon"><i class="fa fa-lock"></i></span>
                <input type="password" class="form-control" name="pass" />
              </div>
              <button class="btn btn-primary" name="Login">Login</button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
  <?php
// jika ada tombo Login(tombol Login di tekan)
  if (isset($_POST["Login"]))
  {


    // lakukan kuery ngecek akun ditabel pelanggan di db
    $ambil = $koneksi->query("SELECT *FROM admin
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
      echo "<div class='alert alert-danger'>Login gagal</div>";
      echo "<meta http-equiv='refresh' content='1;url=Login.php'>";

    }


  }
  ?>
  <!-- SCRIPTS -AT THE BOTOM TO REDUCE THE LOAD TIME-->
  <!-- JQUERY SCRIPTS -->
  <script src="assets/js/jquery-1.10.2.js"></script>
  <!-- BOOTSTRAP SCRIPTS -->
  <script src="assets/js/bootstrap.min.js"></script>
  <!-- METISMENU SCRIPTS -->
  <script src="assets/js/jquery.metisMenu.js"></script>
  <!-- DATA TABLE SCRIPTS -->
  <script src="assets/js/dataTables/jquery.dataTables.js"></script>
  <script src="assets/js/dataTables/dataTables.bootstrap.js"></script>
  <script>
    $(document).ready(function () {
      $('#dataTables-example').dataTable();
    });
  </script>
  <!-- CUSTOM SCRIPTS -->
  <script src="assets/js/custom.js"></script>
</body>
</html>