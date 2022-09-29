<?php

  // cara biasa
  // require_once 'produk/InfoProduk.php';
  // require_once 'produk/Produk.php';
  // require_once 'produk/Komik.php';
  // require_once 'produk/Game.php';
  // require_once 'produk/CetakDaftarProduk.php';
  // require_once 'produk/User.php';
  // require_once 'service/User.php';

  // autoloading
  spl_autoload_register(function($class){
    //  app\produk\User = ["app", "produk", "User"];
    $class = explode('\\', $class);
    $class = end($class);
    require_once __DIR__ . '\produk/' . $class . '.php';
  });

  spl_autoload_register(function($class){
    //  app\produk\User = ["app", "produk", "User"];
    $class = explode('\\', $class);
    $class = end($class);
    require_once __DIR__ . '\service/' . $class . '.php';
  });