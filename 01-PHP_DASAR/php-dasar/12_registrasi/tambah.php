<?php 
require "functions.php";

  // ketika tombol submit di klik
  if( isset($_POST["submit"]) ){
    // mengambil function tambah dan mengecek returnnya
    if( tambah($_POST) > 0 ){
      echo "
        <script>
          alert('Data Berhasil Ditambahkan');
          document.location.href = 'index.php';
        </script>
        ";
    }else{
      echo "
        <script>
          alert('Data Gagal Ditambahkan');
          document.location.href = 'index.php';
        </script>
        ";
    }
  }

?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Buku Perpustakaan</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    <style>
      .container{
        width: 50%;
      }
    </style>
  </head>
  <body>
    <div class="container bg-success p-2 text-dark bg-opacity-10 mt-5">
      <a href="index.php" class="btn btn-danger" tabindex="-1" role="button" aria-disabled="true"><-back</a>

      <h1 class="text-center">Add New Books</h1>
      <form action="" method="post" enctype="multipart/form-data">
        <div class="mb-3">
          <label for="title" class="form-label">Title :</label>
          <input type="text" class="form-control" id="title" name="title" required>
        </div>
        <div class="mb-3">
          <label for="author" class="form-label">Author :</label>
          <input type="text" class="form-control" id="author" name="author" required>
        </div>
        <div class="mb-3">
          <label for="year" class="form-label">Year :</label>
          <input type="text" class="form-control" id="year" name="year" required>
        </div>
        <div class="mb-3">
          <label for="publisher" class="form-label">Publisher :</label>
          <input type="text" class="form-control" id="publisher" name="publisher" required>
        </div>
        <div class="mb-3">
          <label for="formFile" class="form-label">Cover :</label>
          <input class="form-control" name="cover" type="file" id="formFile">
        </div>

        <button type="submit" name="submit"  class="btn btn-primary mb-5">Submit</button>
      </form>  
    </div>
    

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>
  </body>
</html>
