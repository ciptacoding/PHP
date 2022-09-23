<?php
require "functions.php";

if(isset($_POST["btn-register"])){

  if(register($_POST) > 0){
    echo "
    <script>
      alert('Berhasil registrasi!');
    </script>
    ";
  }else{
    echo mysqli_error($conn);
  }
}

?>



<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Register</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
  <style>
    body{
      background-color: #ddd;
    }
    .container{
      margin-top: 100px;
      padding: 30px 50px 50px 50px;
      background-color: white;
      width: 30%;
      border-radius: 10px;
    }
    @media screen and (max-width: 1150px){
      .container{
        width: 50%;
      }
    }
    @media screen and (max-width: 800px){
      .container{
        width: 90%;
      }
    }
  </style>
</head>
<body>
  <div class="container">
    <h2 class="text-center">Register</h2>
    <form action="" method="post">
      <div class="mb-3">
        <label for="username" class="form-label">Username</label>
        <input type="text" class="form-control" id="username" name="username" required>
      </div>
      <div class="mb-3">
        <label for="password" class="form-label">Password</label>
        <input type="password" class="form-control" id="password" name="password" required>
      </div>
      <div class="mb-3">
        <label for="confirmPassword" class="form-label">Confirm Password</label>
        <input type="password" class="form-control" id="confirmPassword" name="confirmPassword" required>
      </div>
      <div class="d-grid">
        <button type="submit" name="btn-register" class="btn btn-primary">Register!</button>
      </div>
    </form>
  </div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>
</body>
</html>