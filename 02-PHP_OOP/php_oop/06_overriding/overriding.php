<?php

class Produk {
  public $judul, $penulis, $penerbit, $harga;

  public function __construct($judul = "judul", $penulis = "penulis", $penerbit = "penerbit", $harga = 0){
    $this->judul = $judul;
    $this->penulis = $penulis;
    $this->penerbit = $penerbit;
    $this->harga = $harga;
  }

  public function copyright(){
    return "$this->penulis, $this->penerbit";
  }

  public function getInfoProduk(){
    $result = "{$this->judul} | {$this->copyright()} ({$this->harga})";
    return $result;
  }
}


// membuat child komik
class Komik extends Produk{
  public $jmlHalaman;

  public function __construct($judul = "judul", $penulis = "penulis", $penerbit = "penerbit", $harga = 0, $jmlHalaman = 0){
    parent::__construct($judul, $penulis, $penerbit, $harga);
    $this->jmlHalaman = $jmlHalaman;
  }

  public function getInfoProduk(){
    $str = "Komik : " . parent::getInfoProduk() . " ~ {$this->jmlHalaman} Halaman.";
    return $str;
  }
}


// membuat child game
class Game extends Produk{
  public $waktuMain;

  public function __construct($judul = "judul", $penulis = "penulis", $penerbit = "penerbit", $harga = "harga", $waktuMain = 0){
    parent::__construct($judul, $penulis, $penerbit, $harga);
    $this->waktuMain = $waktuMain;
  }

  public function getInfoProduk(){
    $str = "Game : " . parent::getInfoProduk() . " ~ {$this->waktuMain} Jam.";
    return $str;
  }
}

$produk1 = new Komik("Naruto", "Masashi Kishimoto", "Shonen Jump", 30000, 100);
$produk2 = new Game("GTA 5", "John Stones", "Rockstars Games", 150000,50);

echo $produk1->getInfoProduk();
echo "<br>";
echo $produk2->getInfoProduk();