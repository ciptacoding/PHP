<?php

class Mobil {
  private $merk, $warna, $kecepatanMax, $jumlahPenumpang;

  public function __construct($merk="merk", $warna="warna", $kecepatanMax=0, $jumlahPenumpang=0){
    $this->merk = $merk;
    $this->warna = $warna;
    $this->kecepatanMax = $kecepatanMax;
    $this->jumlahPenumpang = $jumlahPenumpang;
  }
  public function getInfoMobil(){
    $info = "Merk = {$this->merk} | Warna : {$this->warna} | Kecepatan Maksimal : {$this->kecepatanMax} km/jam. | Jumlah Penumpang : {$this->jumlahPenumpang} Orang.";
    return $info;
  }

  public function setTambahKecepatan($tambahKecepatan){
    $this->kecepatanMax = $this->kecepatanMax + $tambahKecepatan;
  }
  public function getTambahKecepatan(){
    return "Kecepatan Maksimal : ".$this->kecepatanMax." km/jam.";
  }

  public function setKurangKecepatan($kurangKecepatan){
    $this->kecepatanMax = $this->kecepatanMax - $kurangKecepatan;
  }
  public function getKurangKecepatan(){
    return "Kecepatan Maksimal : ".$this->kecepatanMax." km/jam.";
  }

  public function setMerk($merk){
    $this->merk = $merk;
  }
  public function getMerk(){
    return $this->merk;
  }

  public function setWarna($warna){
    $this->warna = $warna;
  }
  public function getWarna(){
    return $this->warna;
  }

  public function setKecepatanMax($kecepatanMax){
    $this->kecepatanMax = $kecepatanMax;
  }
  public function getKecepatanMax(){
    return $this->kecepatanMax;
  }

  public function setPenumpang($penumpang){
    $this->jumlahPenumpang = $penumpang;
  }
  public function getPenumpng(){
    return $this->jumlahPenumpang;
  }
}

// class child
  class Supercar extends Mobil{
    private $turbo = "off";

    public function __construct($merk="merk", $warna="warna", $kecepatanMax=0, $jumlahPenumpang=0, $turbo){
      parent::__construct($merk, $warna, $kecepatanMax, $jumlahPenumpang);
      $this->turbo = $turbo;
    }
    public function getInfoSupercar(){
      $info = "Supercar : ".parent::getInfoMobil()." | Turbo : {$this->turbo}.";
      return $info;
    }
  }

// printing
$avanza = new Mobil("Avanza", "Merah", 100, 6);
echo $avanza->getInfoMobil();
echo "<hr>";

$avanza->setTambahKecepatan(50);
echo $avanza->getTambahKecepatan();
echo "<br>";

$avanza->setKurangKecepatan(125);
echo $avanza->getKurangKecepatan();
echo "<br>";

$avanza->setPenumpang(7);
echo $avanza->getPenumpng();
echo "<hr>";

$tesla = new Supercar("Tesla", "Hitam", 500, 1, "on");
echo $tesla->getInfoSupercar();