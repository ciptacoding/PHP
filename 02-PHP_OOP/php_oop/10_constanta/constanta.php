<?php
  // define hanya dapat digunakan di luar class dan sedangkan const bisa digunakan di luar maupun didalam class
  define("NAMA", "Toni");

  class Coba{
    const NAMA = "Cipta";
  }

  echo NAMA;
  echo "<br>";
  echo Coba::NAMA;