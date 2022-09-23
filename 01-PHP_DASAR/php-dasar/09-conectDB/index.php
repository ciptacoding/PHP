<?php
  // menghubungkan ke file function
  require "functions.php";
  // memanggil function query
  $book = query("SELECT * FROM book");
?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Latihan Database</title>
</head>
<body>
  <h1>Daftar Buku</h1>
  <table cellpadding="10" border="1" cellspacing="0">
    <tr>
      <th>No</th>
      <th>Aksi</th>
      <th>Cover</th>
      <th>Judul</th>
      <th>Penulis</th>
      <th>Tahun</th>
      <th>Penerbit</th>
    </tr>
    <?php $i = 1; ?>
    <?php foreach($book as $books) : ?>
    <tr>
      <td><?= $i; ?></td>
      <td><a href="">Ubah</a> <a href="">Hapus</a></td>
      <td><img src="assets/<?php echo $books["cover"]; ?>" alt="error" width="50px"></td>
      <td><?= $books["title"]; ?></td>
      <td><?php echo $books["author"]; ?></td>
      <td><?= $books["year"]; ?></td>
      <td><?= $books["publisher"]; ?></td>
    </tr>
    <?php $i++; ?>
    <?php endforeach; ?>
  </table>
</body>
</html>