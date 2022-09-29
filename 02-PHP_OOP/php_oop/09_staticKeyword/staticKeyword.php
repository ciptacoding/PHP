<?php
  // static biasa digunakan ketika kita membuat sebuah helper
  // keunggulan static => kita bisa memanggil sebuah kelas tanpa melakukan instance object
  // dan nilainya bersifat tetap
  class ContohStatic{
    public static $angka = 1;

    public static function greeting(){
      return "Halo ".self::$angka++." Kali. <br>";
    }
  }
  echo ContohStatic::greeting();
  echo "<hr>";


  // pebandingan static dan non static
  class Contoh{
    public static $angka = 1;

    public static function hello(){
      return "Hello ".self::$angka++." kali. <br>";
    }
  }
  $static = new Contoh();
  echo $static::hello();
  echo $static::hello();
  echo $static::hello();

  $static2 = new Contoh();
  echo $static2::hello();
  echo $static2::hello();
  echo $static2::hello();
  echo "<hr>";

  // non static
  class Contoh2{
    public $angka = 1;

    public function hello(){
      return "Hello ".$this->angka++." kali. <br>";
    }
  }
  $nonStatic = new Contoh2();
  echo $nonStatic->hello();
  echo $nonStatic->hello();
  echo $nonStatic->hello();

  $nonStatic1 = new Contoh2();
  echo $nonStatic1->hello();
  echo $nonStatic1->hello();
  echo $nonStatic1->hello();
