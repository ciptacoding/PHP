<?php

function greeting($time = "Datang", $name = "Admin"){
  return "Selamat $time $name";
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Latihan Function</title>
</head>
<body>
  <h1><?php echo greeting("Pagi", "Budi"); ?></h1>
</body>
</html>