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
    <title>Halaman Registrasi</title>
</head>
<body>
    <div class="container">
    <div class="row text-center">
      <div class="col-md-12">
        <br /></br />
        <h2>Registrasi Pelanggan</h2>
        
        <br/>
      </div>
      <div class="container">
      <div class="row">
        <div class="col-md-4 col-md-offset-4 col-sm-offset-3 col-xs-10 col-xs-offset-1">
          <div class="panel panel-default">
           <div class="panel-heading">
            <strong>Silahkan Registrasi</strong>
            </div>
          <div class="panel-body">
            <form rule="form" method="post">
              <br />
              <div class="form-group">
                <input type="text" class="form-control" name="nama" placeholder="Masukan Nama"/>
              </div>
              <div class="form-group">
                <select name="gender" class="form-control">
                  <option>----- Pilih Jenis Kelamin -----</option>
                  <option value="Pria">Pria</option>
                  <option value="wanita">Wanita</option>
                </select>
              </div>
              <div class="form-group">
                <input type="number" class="form-control" name="nomor" placeholder="Masukan Normor Telepon" />
              </div>
              <div class="form-group">
                <textarea class="form-control" name="alamat" placeholder="Masukan Alamat"></textarea>
              </div>
              <div class="form-group input-group">
                <span class="input-group-addon"><i class="fa fa-user"></i></span>
                <input type="username" class="form-control" name="username" placeholder="Masukan Username"/>
              </div>
              <div class="form-group input-group">
                <span class="input-group-addon"><i class="fa fa-lock"></i></span>
                <input type="password" class="form-control" name="password" placeholder="Masukan Password" />
              </div>
              <button class="btn btn-primary btn-block" name="registrasi">Registrasi</button>
              <hr />
              Login ? <a href="Login.php">klik disini</a>
            </form>
              <?php
              include 'koneksi.php';
              session_start();
                if(isset($_POST['registrasi'])){
                  $_SESSION['nama'] = $_POST['nama'];
                  $_SESSION['jenis_kelamin'] = $_POST['gender'];
                  $_SESSION['No_telpn'] = $_POST['nomor'];
                  $_SESSION['alamat'] = $_POST['alamat'];
                  $_SESSION['username'] = $_POST['username'];
                  $password = $_POST['password'];
                  
                  $query_registrasi = "insert into pelanggan values ('','$_SESSION[username]','$password','$_SESSION[nama]','$_SESSION[jenis_kelamin]','$_SESSION[No_telpn]','$_SESSION[alamat]')";
                  $sql_registrasi = mysqli_query($koneksi, $query_registrasi);
                  if($sql_registrasi){
                    echo "<script>
                                alert('Anda Berhasil Registrasi!');
                                location='Login.php';
                          </script>
                          ";
                  }
                }
          ?>
              
          </div>
        </div>
      </div>
      </div>
    </div>
  </div>
  </div>

</body>
</html>