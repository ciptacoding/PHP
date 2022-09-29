<?php

class Produk {
  private $judul, $penulis, $penerbit, $harga, $diskon = 1;

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

  public function setJudul($judul){
    $this->judul = $judul;
  }
  public function getJudul(){
    return $this->judul;
  }

  public function setPenulis($penulis){
    $this->penulis = $penulis;
  }
  public function getPenulis(){
    return $this->penulis;
  }

  public function setPenerbit($penerbit){
    $this->penerbit = $penerbit;
  }
  public function getPenerbit(){
    return $this->penerbit;
  }

  public function setDiskon($diskon){
    $this->diskon = $diskon;
  }
  public function getDiskon(){
    return $this->diskon;
  }

  public function setHarga($harga){
    $this->harga = $harga;
  }
  public function getHarga(){
    return $this->harga - ($this->harga * $this->diskon / 100);
  }
}


// class child komik
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


// class child game
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
echo "<hr>";

$produk1->setJudul("Dragon Ball");
echo $produk1->getJudul();
echo "<br>";

$produk2->setPenulis("Cipta");
echo $produk2->getPenulis();
echo "<br>";

$produk1->setPenerbit("Riyuma");
echo $produk1->getPenerbit();
echo "<br>";

$produk2->setDiskon(50);
$produk2->setHarga(500000);
echo $produk2->getHarga();