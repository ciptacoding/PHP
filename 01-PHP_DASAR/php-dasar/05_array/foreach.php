<?php

$numbers = [23,4,5,99,8,7,6,2,14,65,7,9];

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Latihan Foreach</title>
  <style>
    .container{
      display: flex;
    }
    .box{
      width: 30px;
      padding: 30px;
      background-color: blue;
      color: white;
      margin: 5px;
      text-align: center;
      font-size: 1.5em;
      font-weight: bold;
    }
  </style>
</head>
<body>
  <!-- cara templating -->
  <div class="container">
    <?php foreach($numbers as $number) :?>
      <div class="box"> <?= $number ?> </div>
    <?php endforeach; ?>
  </div>
  
<!-- manual -->
  <div class="container">
    <?php foreach($numbers as $number) {?>
      <div class="box"> <?php echo $number ?> </div>
    <?php } ?>
  </div>
</body>
</html>