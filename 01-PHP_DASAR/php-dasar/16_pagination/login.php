<?php
  session_start();
  require 'functions.php';

  if(isset( $_COOKIE["id"]) && isset($_COOKIE["key"])){
    $id = $_COOKIE["id"];
    $key = $_COOKIE["key"];

    // ambil usrname berdasarkan id
    mysqli_query($conn, "SELECT username FROM users WHERE id = $id ");
    $row = mysqli_affected_rows($result);

    // cek cookie dan username
    if( $key === hash("sha256", $row["username"]) ){
      $_SESSION["login"] = true;
    }
  }

  if(isset($_SESSION["login"])){
    header("Location: index.php");
    exit;
  }

  
  if(isset($_POST["login"])){
    $username = $_POST["username"];
    $password = $_POST["password"];

    // cek username
    $result = mysqli_query($conn, "SELECT * FROM users WHERE username = '$username'");
    if(mysqli_num_rows($result)){
      // cek password
      $row = mysqli_fetch_assoc($result);
      if(password_verify($password, $row["password"])){
        // set session
        $_SESSION["login"] = true;

        // set cookie
        if(isset($_POST["remember"])){
          setcookie("id", $row["id"], time() + 120);
          setcookie("key", hash("sha256", $row["username"]), time()+120);
        }

        header("Location: index.php");
        exit;
      }
    }
    $error = true;
  }
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
  <style>
    body{
      background-color: #ddd;
    }
    .container{
      margin-top: 150px;
      padding: 50px 70px 70px 70px;
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
    <h2 class="text-center">Login</h2>
    <?php if(isset($error)) : ?>
      <p style="color: red; font-style: italic;" class="text-center">Username/password salah!</p>
    <?php endif; ?>
    <form action="" method="post">
      <div class="mb-3">
        <label for="username" class="form-label">Username</label>
        <input type="text" class="form-control" id="username" name="username" required>
      </div>
      <div class="mb-3">
        <label for="password" class="form-label">Password</label>
        <input type="password" class="form-control" id="password" name="password" required>
      </div>
      <div class="mb-3 form-check">
        <input type="checkbox" class="form-check-input" name="remember" id="Check1">
        <label class="form-check-label" for="Check1">Remember me</label>
      </div>
      <div class="d-grid">
        <button type="submit" name="login" class="btn btn-primary">Login</button>
      </div>
    </form>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>
</body>
</html>