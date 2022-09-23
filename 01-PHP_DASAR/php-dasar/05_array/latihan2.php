<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Latihan 2</title>
  <style>
    .container{
      display: flex;
    }
    .box{
      height: 30px;
      width: 30px;
      background-color: blue;
      text-align: center;
      color: white;
      margin: 5px;
    }
  </style>
</head>
<body>
  <?php 
  $numbers = [
    [1,2,3],
    [4,5,6],
    [7,8,9],
  ];
  ?>

  <?php foreach($numbers as $number) : ?>
      <div class="container">
        <?php foreach($number as $value) : ?>
          <div class="box"> <?= $value; ?> </div>
        <?php endforeach; ?>
      </div>
  <?php endforeach; ?>
</body>
</html>