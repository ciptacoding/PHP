<?php
// interface hanya ada method tanpa implementasi dan setiap class turunannya harus      mengimplementasikan semua method yang ada didalam interface
interface InfoProduk{
  public function getInfoProduk();
}

abstract class Produk {
  protected $judul, $penulis, $penerbit, $harga, $diskon = 1;

  public function __construct($judul = "judul", $penulis = "penulis", $penerbit = "penerbit", $harga = 0){
    $this->judul = $judul;
    $this->penulis = $penulis;
    $this->penerbit = $penerbit;
    $this->harga = $harga;
  }

  public function copyright(){
    return "$this->penulis, $this->penerbit";
  }

  abstract public function getInfo();

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
class Komik extends Produk implements InfoProduk{
  public $jmlHalaman;

  public function __construct($judul = "judul", $penulis = "penulis", $penerbit = "penerbit", $harga = 0, $jmlHalaman = 0){
    parent::__construct($judul, $penulis, $penerbit, $harga);
    $this->jmlHalaman = $jmlHalaman;
  }

  public function getInfo(){
    $result = "{$this->judul} | {$this->copyright()} (Rp.{$this->harga})";
    return $result;
  }
  public function getInfoProduk(){
    $str = "Komik : " . $this->getInfo() . " ~ {$this->jmlHalaman} Halaman.";
    return $str;
  }
}


// class child game
class Game extends Produk implements InfoProduk{
  public $waktuMain;

  public function __construct($judul = "judul", $penulis = "penulis", $penerbit = "penerbit", $harga = "harga", $waktuMain = 0){
    parent::__construct($judul, $penulis, $penerbit, $harga);
    $this->waktuMain = $waktuMain;
  }

  public function getInfo(){
    $result = "{$this->judul} | {$this->copyright()} (Rp.{$this->harga})";
    return $result;
  }
  public function getInfoProduk(){
    $str = "Game : " . $this->getInfo() . " ~ {$this->waktuMain} Jam.";
    return $str;
  }
}

  class CetakDaftarProduk {
    public $daftarProduk = [];

    public function tambahProduk(Produk $produk){
      $this->daftarProduk[] = $produk;
    }

    public function cetak(){
      $str = "DAFTAR PRODUK : <br>";
      foreach($this->daftarProduk as $produk){
        $str.= "- {$produk->getInfoProduk()} <br>";
      }
      return $str;
    }
  }

$produk1 = new Komik("Naruto", "Masashi Kishimoto", "Shonen Jump", 30000, 100);
$produk2 = new Game("GTA 5", "John Stones", "Rockstars Games", 150000,50);

$cetakProduk = new cetakDaftarProduk();
$cetakProduk->tambahProduk($produk1);
$cetakProduk->tambahProduk($produk2);
echo $cetakProduk->cetak();