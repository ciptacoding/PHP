<?php

  // cara biasa
  // require_once 'produk/InfoProduk.php';
  // require_once 'produk/Produk.php';
  // require_once 'produk/Komik.php';
  // require_once 'produk/Game.php';
  // require_once 'produk/CetakDaftarProduk.php';

  // autoloading
  spl_autoload_register(function($class){
    require_once __DIR__ . '\produk/' . $class . '.php';
  });