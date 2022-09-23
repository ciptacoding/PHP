<?php 
// cek apakah tombol submit sudah ditekan
  if(isset($_POST["submit"])){

    // lalu cek username dan password
    if($_POST["nama"] ==="admin" && $_POST["password"] === "123"){
      header("Location: admin.php");
      exit;
    }else{
      $error = true;
    }
  }
  
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login</title>
  <style>
    .container{
      font-size: 2em;
      background-color: salmon;
      width: 50%;
      height: 350px;
      margin: 0 auto;
    }
    li{
      list-style: none;
      margin: 10px;
    }
    h1{
      text-align: center;
    }
    form{
      width: 50%;
      margin: 0 auto;
    }
    p{
      color: red;
      font-style: italic;
    }
  </style>
</head>
<body>
  <div class="container">
    <h1>Form Login</h1>
    <?php if(isset($error)) : ?>
      <p>Maaf, username atau password yang anda masukan salah!</p>
    <?php endif; ?>
    <form action="" method="post">
      <ul>
        <li>
          <label for="username">username : </label>
          <input type="text" name="nama" id="username">
        </li>
        <li>
          <label for="password">password : </label>
          <input type="password" name="password" id="password">
        </li>
        <li>
          <button type="submit" name="submit">Kirim</button>
        </li>
      </ul> 
    </form>
  </div>
</body>
</html>