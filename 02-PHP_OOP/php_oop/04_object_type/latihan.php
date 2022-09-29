<?php
  // class
  class Mobil {
    // properti
    public $merk, $warna, $plat;

    // constructur
    public function __construct($merk="merk", $warna="warna", $plat=0){
      $this->merk = $merk;
      $this->warna = $warna;
      $this->plat = $plat;
    }

    // method
    public function info(){
      return "$this->merk, $this->plat";
    }
  }

  // class baru
  class InfoSemuaMobil{
    public function infoSemua(Mobil $data){
      $info = "{$data->merk} | {$data->warna} | {$data->plat}";
      return $info;
    }
  }

  // object
  $mobil1 = new Mobil("Avanza", "Putih", 2801);
  echo "Info Mobil 1 : {$mobil1->info()}";
  echo "<br>";

  // object type
  $infoAll = new InfoSemuaMobil();
  echo "Info Semua Mobil 1 : " . $infoAll->infoSemua($mobil1);
?>