<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Latihan 1 Array</title>
  <style>
    *{
      box-sizing: border-box;
    }
    .container{
      margin-bottom: 50px;
    }
    h3{
      margin-bottom: -15px;
    }
    li{
      list-style: none;
    }
  </style>
</head>
<body>
  <!-- array -->
  <?php
    $students = [
      ["Cipta Dwipajaya", 200030282, "Sistem Informasi", "cptdwpjy@gmail.com"],
      ["Abel Yoshuara", 200030582, "Sistem Informasi", "abel@gmail.com"],
      ["Agus", 200030282, "Sistem Informasi", "aguswd@gmail.com"],
    ];
  ?>

  <?php foreach($students as $student) : ?>
    <div class="container">
      <h3>Identitas Mahasiswa</h3>
        <ul>
          <li>Nama : <?= $student[0]; ?> </li>
          <li>Nim : <?= $student[1]; ?> </li>
          <li>Prodi : <?= $student[2]; ?> </li>
          <li>Email : <?= $student[3]; ?> </li>
        </ul>
    </div>
    
  <?php endforeach; ?>
</body>
</html>