<?php
require '../logic/logic.php';

// ketika tombol submit di klik
if(isset($_POST["submit"])){
  if(add($_POST) > 0){
    echo "
    <script> 
      alert('Data Berhasil Ditambahkan');
      document.location.href = '../index.php';
    </script>
    ";
  }else{
    echo "
    <script> 
      alert('Data Gagal Ditambahkan');
      document.location.href = '../index.php';
    </script>
    ";
  }
}
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
      width: 50%;
      margin: 10px auto;
    }
  </style>
</head>
<body>
  <!-- navbar start -->
  <nav class="navbar navbar-expand-lg" style="background-color: #6FB2D2">
    <div class="container-fluid">
      <a class="navbar-brand ms-5" href="#"><img src="../assets/ITB-RESMI-300x300.png" alt="" width="60px"></a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item ms-4">
            <a class="nav-link active mt-2" href="../index.php"><img src="../assets/home.png" class="mb-2" alt="" width="25px">Home</a>
          </li>
          <li class="nav-item ms-4">
            <a class="nav-link active mt-2" href="add.php"><img src="../assets/upload.png" alt="" class="mb-2" width="25px">Publish</a>
          </li> 
          <li class="nav-item ms-4">
            <a class="nav-link active mt-2" href="../delete/delete.php"><img src="../assets/delete.png" alt="" class="mb-2" width="22px">Delete</a>
          </li>
          <li class="nav-item ms-4">
            <a class="nav-link active mt-2" href=""><img src="../assets/update.png" alt="" class="mb-1" width="21px">Update</a>
          </li>
        </ul>
        <form class="d-flex me-5" role="search">
          <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
          <button class="btn btn-warning" type="submit">Search</button>
        </form>
      </div>
    </div>
  </nav>

  <main class="bg-info p-2 text-dark bg-opacity-10 mt-4">
    <form action="" method="post" enctype="multipart/form-data">
        <div class="mb-3 mt-3">
          <label for="nim" class="form-label">Nim :</label>
          <input type="text" class="form-control" id="nim" name="nim" required>
        </div>
        <div class="mb-3">
          <label for="nama" class="form-label">Nama :</label>
          <input type="text" class="form-control" id="nama" name="nama" required>
        </div>
        <div class="mb-3">
          <label for="prodi" class="form-label">Prodi :</label>
          <input type="text" class="form-control" id="prodi" name="prodi" required>
        </div>
        <div class="mb-3">
          <label for="angkatan" class="form-label">Angkatan :</label>
          <input type="text" class="form-control" id="angkatan" name="angkatan" required>
        </div>
        <div class="mb-3">
          <label for="email" class="form-label">Email :</label>
          <input type="text" class="form-control" id="email" name="email" required>
        </div>
        <div class="mb-3">
          <label for="foto" class="form-label">Foto :</label>
          <input class="form-control" name="foto" type="file" id="foto">
        </div>

        <button type="submit" name="submit"  class="btn btn-danger mb-3">Submit</button>
    </form>  
  </main>
