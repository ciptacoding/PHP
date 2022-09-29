<?php

class Produk {
  public $judul, $penulis, $penerbit; 
  protected $diskon;
  private $harga;

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
    $result = "{$this->judul} | {$this->copyright()} (Rp.{$this->harga})";
    return $result;
  }

  public function getHarga(){
    return $this->harga - ($this->harga * $this->diskon / 100);
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

  public function setDiskon($diskon){
    $this->diskon = $diskon;
  }
}

$produk1 = new Komik("Naruto", "Masashi Kishimoto", "Shonen Jump", 30000, 100);
$produk2 = new Game("GTA 5", "John Stones", "Rockstars Games", 150000,50);

echo $produk1->getInfoProduk();
echo "<br>";
echo $produk2->getInfoProduk();
echo "<hr>";

echo $produk1->getHarga();
echo "<br>";
$produk2->setDiskon(50);
echo $produk2->getHarga();