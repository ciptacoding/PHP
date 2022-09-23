<?php 

  session_start();

  if(!isset($_SESSION["login"])){
    header("Location: login.php");
    exit;
  }
  
require "functions.php";

  // menangkap id yang dikirim
  $id = $_GET["id"];
  
  // menampilkan data dari id yang dikirim menggunakan function query
  $dataBooks = query("SELECT * FROM book WHERE id = $id")[0];

  // ketika tombol submit di klik
  if( isset($_POST["submit"]) ){

    // mengambil function ubah dan mengecek returnnya
    if( ubah($_POST) > 0 ){
      echo "
        <script>
          alert('Data Berhasil Diubah');
          document.location.href = 'index.php';
        </script>
        ";
    }else{
      echo "
        <script>
          alert('Data Gagal Diubah');
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

      <h1 class="text-center">Change Books</h1>

      <form action="" method="post" enctype="multipart/form-data">
        <input type="hidden" name="id" value="<?= $dataBooks["id"]; ?>">
        <input type="hidden" name="coverLama" value="<?= $dataBooks["cover"]; ?>">


        <div class="mb-3">
          <label for="title" class="form-label">Title :</label>
          <input type="text" class="form-control" id="title" name="title" required value="<?= $dataBooks["title"]; ?>">
        </div>
        <div class="mb-3">
          <label for="author" class="form-label">Author :</label>
          <input type="text" class="form-control" id="author" name="author" required value="<?= $dataBooks["author"]; ?>">
        </div>
        <div class="mb-3">
          <label for="year" class="form-label">Year :</label>
          <input type="text" class="form-control" id="year" name="year" required
          value="<?= $dataBooks["year"]; ?>">
        </div>
        <div class="mb-3">
          <label for="publisher" class="form-label">Publisher :</label>
          <input type="text" class="form-control" id="publisher" name="publisher" required value="<?= $dataBooks["publisher"]; ?>">
        </div>
        <div class="mb-3">
          <label for="formFile" class="form-label">Cover :</label><br>
          <img src="assets/<?= $dataBooks["cover"]; ?>" alt="" width="50px">
          <input class="form-control" name="cover" type="file" id="formFile">
        </div>
        <button type="submit" name="submit"  class="btn btn-primary mb-5">Submit</button>
      </form>  
    </div>
    

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>
  </body>
</html>