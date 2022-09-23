<?php 
// jika user mencoba memasukan data dari url
// maka akan di redirect ke latihan 1
if(!isset($_GET["cover"]) || !isset($_GET["title"])
    || !isset($_GET["author"]) || !isset($_GET["year"])
    || !isset($_GET["publisher"])
  ){
  header("Location: latihan1.php");
  exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Daftar Buku</title>
  <style>
    li{
      list-style: none;
    }
  </style>
</head>
<body>
  <h2>Data Buku</h2>
  <ul>
    <li><img src="assets/<?= $_GET["cover"]; ?>" alt=""></li>
    <li>Judul Buku : <?= $_GET["title"]; ?></li>
    <li>Penulis : <?= $_GET["author"]; ?></li>
    <li>Tahun : <?= $_GET["year"]; ?></li>
    <li>Penerbit : <?= $_GET["publisher"]; ?></li>
  </ul>
  <a href="latihan1.php">Kembali Ke Daftar Buku</a>
</body>
</html>