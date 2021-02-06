 <?php 
 include 'koneksi.php';
if (isset($_POST["kirim"]))
{

$nama = $_POST['nama'];
$username = $_POST['username'];
$pesan = $_POST['pesan'];
$koneksi->query("INSERT INTO tabel komentar (nama, username, pesan) VALUES ('$nama', '$username', '$pesan')");
echo "<script>alert('TerimaKasih sudah mengirimkan komentar');</script>";
echo "<script>location='index.php';</script>";
  }
 ?>