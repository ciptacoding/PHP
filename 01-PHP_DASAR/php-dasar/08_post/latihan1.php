
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Latihan Post</title>
</head>
<body>

<h3>Form Menuju Halaman Lain</h3>
  <!-- ke halaman lain -->
  <form action="latihan2.php" method="post" >
    <label for="">Masukan Nama : </label>
    <input type="text" name="nama">
    <button type="submit">Kirim</button>
  </form>

  <h3>Form Menuju Halaman Sendiri</h3>
  <!-- ke halaman sendiri -->
  <?php if( isset($_POST["nama"]) ) :?>
  <h1>Selamat Datang, <?= $_POST["nama"]; ?></h1>
  <?php endif ?>
  
  <form action="" method="post" >
    <label for="">Masukan Nama : </label>
    <input type="text" name="nama">
    <button type="submit" name="submit">Kirim</button>
  </form>
</body>
</html>