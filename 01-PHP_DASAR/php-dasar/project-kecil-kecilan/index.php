<?php 
require 'logic/logic.php';

$student = query("SELECT * FROM identitas");
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Data Mahasiswa</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
  <style>
    *{
      box-sizing: border-box;
    }
    body{
      background-color: #ddd;
    }
    .nav-link{
      font-size: 18px;
    }
    main{
      margin: 10px;
    }
    thead{
      background-color: #ffc107;
    }
  </style>
</head>
<body>
  <!-- navbar start -->
  <nav class="navbar navbar-expand-lg" style="background-color: #6FB2D2">
    <div class="container-fluid">
      <a class="navbar-brand ms-5" href="#"><img src="assets/ITB-RESMI-300x300.png" alt="" width="60px"></a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item ms-4">
            <a class="nav-link active mt-2" href="index.php"><img src="assets/home.png" class="mb-2" alt="" width="25px">Home</a>
          </li>
          <li class="nav-item ms-4">
            <a class="nav-link active mt-2" href="add/add.php"><img src="assets/upload.png" alt="" class="mb-2" width="25px">Publish</a>
          </li> 
          <li class="nav-item ms-4">
            <a class="nav-link active mt-2" href="delete/delete.php"><img src="assets/delete.png" alt="" class="mb-2" width="22px">Delete</a>
          </li>
          <li class="nav-item ms-4">
            <a class="nav-link active mt-2" href=""><img src="assets/update.png" alt="" class="mb-1" width="21px">Update</a>
          </li>
        </ul>
        <form class="d-flex me-5" role="search" method="post" action="" >
          <input class="form-control me-2" type="search" name="search" placeholder="Search" aria-label="Search">
          <button class="btn btn-warning" type="submit" name="search">Search</button>
        </form>
      </div>
    </div>
  </nav>

  <main>
    <!-- table data start-->
    <table class="table">
      <thead>
        <tr class="table">
          <th scope="col">No</th>
          <th scope="col">Foto</th>
          <th scope="col">Nim</th>
          <th scope="col">Nama</th>
          <th scope="col">Prodi</th>
          <th scope="col">Angkatan</th>
          <th scope="col">Email</th>
        </tr>
      </thead>
      <tbody>
        <?php $i=1; ?>
        <?php foreach($student as $students) : ?> 
        <tr class="table-light">
          <td><?= $i; ?></td>
          <td><img src="img/<?= $students["foto"]; ?>" alt="" width="25px"></td>
          <td><?= $students["nim"];?></td>
          <td><?= $students["nama"];?></td>
          <td><?= $students["prodi"];?></td>
          <td><?= $students["angkatan"];?></td>
          <td><?= $students["email"];?></td>
        </tr>
        <?php $i++; ?>
        <?php endforeach; ?>
      </tbody>
    </table>
  </main>
  

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>
</body>
</html>