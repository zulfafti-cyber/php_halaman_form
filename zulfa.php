<?php
class User {
  public $nama;

  function __construct($nama) {
    $this->nama = htmlspecialchars($nama);
  }

  function tampil() {
    return "Halo, saya <b>$this->nama</b>";
  }
}

$hasil = "";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $user = new User($_POST['nama']);
  $hasil = $user->tampil();
}
?>

<!DOCTYPE html>
<html>
<head>
<title>Form Orang 1</title>
<style>
  body { font-family: Arial; text-align: center; margin-top: 50px; }
  input, button { padding: 10px; margin: 5px; }
  a { display:block; margin-top:20px; }
</style>
</head>

<body>

<h2>Form Orang 1</h2>

<form method="POST">
  <input type="text" name="nama" placeholder="Masukkan Nama" required>
  <button type="submit">Submit</button>
</form>

<p><?= $hasil ?></p>

<a href="index.php">⬅ Kembali ke Menu</a>

</body>
</html>