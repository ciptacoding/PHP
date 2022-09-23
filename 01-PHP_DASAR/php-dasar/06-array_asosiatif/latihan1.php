<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Latihan asosiatif array</title>
  <style>
    li{
      list-style: none;
    }
  </style>
</head>
<body>
  <?php 
  $books = [
    [
      "cover" => "arah_langkah.png",
      "title" => "Arah Langkah",
      "author" => "Fiersa Besari",
      "year" => 2017,
      "publisher" => "Media Kita",
    ],
    [
      "cover" => "11.png",
      "title" => "11 : 11",
      "author" => "Fiersa Besari",
      "year" => 2015,
      "publisher" => "Gramedia",
    ],
    [
      "cover" => "catatan_juang.png",
      "title" => "Catatan Juang",
      "author" => "Fiersa Besari",
      "year" => 2014,
      "publisher" => "Media Kita",
    ],
    [
      "cover" => "garis-waktu.png",
      "title" => "Garis Waktu",
      "author" => "Fiersa Besari",
      "year" => 2018,
      "publisher" => "Gramedia",
    ],
    [
      "cover" => "influence.png",
      "title" => "How To Influence People",
      "author" => "James",
      "year" => 2014,
      "publisher" => "Stanford",
    ],
    [
      "cover" => "konspirasi.png",
      "title" => "Konspirasi Alam Semesta",
      "author" => "Fiersa Besari",
      "year" => 2016,
      "publisher" => "Media Kita",
    ],
    [
      "cover" => "psikologi.png",
      "title" => "Psychology Of Money",
      "author" => "Arthur",
      "year" => 2019,
      "publisher" => "Harvard",
    ],
    [
      "cover" => "rich-dad.png",
      "title" => "Rich Dad Poor Dad",
      "author" => "Robert Kiyosaki",
      "year" => 2015,
      "publisher" => "Udap",
    ],
    [
      "cover" => "tapak-jejak.png",
      "title" => "Tapak Jejak",
      "author" => "Fiersa Besari",
      "year" => 2019,
      "publisher" => "Media Kita",
    ],
    [
      "cover" => "teras.png",
      "title" => "Filosofi Teras",
      "author" => "Muller",
      "year" => 2013,
      "publisher" => "Yunani",
    ],
  ];
  ?>
  
  <h2>Data Buku Perpustakaan</h2>
  <?php foreach($books as $book) : ?>
    <ul>
      <li>
        <img src="assets/<?=$book["cover"]; ?> " alt="error">
      </li>
      <li>Judul Buku :<?= $book["title"]; ?></li>
      <li>Penulis : <?= $book["author"]; ?></li>
      <li>Tahun : <?= $book["year"]; ?></li>
      <li>Penerbit : <?= $book["publisher"]; ?></li>
    </ul>
  <?php endforeach; ?>
</body>
</html>