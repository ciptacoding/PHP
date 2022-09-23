<?php
  // menghubungkan ke file function
  require "functions.php";

  // memanggil function query
  $book = query("SELECT * FROM book ORDER BY id DESC");
  // DESC = decending
  // ASC = acending

  // jika tombol search ditekan
  if( isset($_POST["search"]) ){
    $book = cari($_POST["keyword"]);
  }
?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Buku Perpustakaan</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
  <style>
    .container{
      width: 60%;
      position: relative;
      padding: 0;
    }
    #form-search{
      position: absolute;
      right: 0;
    }
    table{
      border: 2px solid black;
    }
    header{
      width: 100%;
      padding: 30px;
      background-color: lightskyblue;
      color: white;
      position: sticky;
      top: 0;
      left: 0;
      right: 0;
      z-index: 10;
    }
  </style>
</head>
<body>
  <header>
      <h1 class="text-center">LIBRARY BOOKS</h1>
  </header>
  <div class="container mt-5">
    
    <form id="form-search" class="row g-2 mb-2" action="" method="post">
      <div class="col-auto">
        <input type="text" class="form-control" name="keyword" placeholder="input keyword">
      </div>
      <div class="col-auto">
        <button type="submit" name="search" class="btn btn-primary">Search</button>
      </div>
    </form>

    <a href="tambah.php" class="btn btn-success mb-2" tabindex="-1" role="button" aria-disabled="true">Add Book</a>
    
    <table class="table">
      <thead>
        <tr class="table-info">
          <th scope="col">No</th>
          <th scope="col">Cover</th>
          <th scope="col">Title</th>
          <th scope="col">Author</th>
          <th scope="col">Year</th>
          <th scope="col">Publisher</th>
          <th scope="col">Action</th>
        </tr>
      </thead>
      <tbody>
        <?php $i = 1; ?>
        <?php foreach($book as $books) : ?>
        <?php if($i % 2 == 0) : ?>
        <tr class="table-secondary">
        <?php endif; ?>
          <th scope="row"><?= $i; ?></th>
          <td><img src="assets/<?= $books["cover"]; ?>" alt="error" width="50px"></td>
          <td><?= $books["title"]; ?></td>
          <td><?= $books["author"]; ?></td>
          <td><?= $books["year"]; ?></td>
          <td><?= $books["publisher"]; ?></td>
          <!-- button update delete -->
          <td>
            <a href="ubah.php?id=<?= $books["id"]; ?>" class="btn btn-warning" tabindex="-1" role="button" aria-disabled="true">Update</a>
            
            <a href="hapus.php?id=<?= $books["id"]; ?>" class="btn btn-danger" tabindex="-1" role="button" aria-disabled="true" onclick="return confirm('Yakin Hapus?')">Delete</a>
          </td>
        </tr>
        <?php $i++; ?>
        <?php endforeach; ?>
      </tbody>
    </table>
  </div>
  
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>
</body>
</html>