<?php

  // class
  class Mahasiswa {
    // properti
    public $nama, $nim, $jurusan, $email;

    // constructor
    public function __construct($nama, $nim, $jurusan, $email){
      $this->nama = $nama;
      $this->nim = $nim;
      $this->jurusan = $jurusan;
      $this->email = $email;
    }

    // method
    public function identitas(){
      return "$this->nama, $this->nim";
    }
  }

  // object
  $mahasiswa1 = new Mahasiswa("Cipta", 200030282, "Sistem Informasi", "cptdwpjy@gmail.com");

  echo "Identitas Mahasiswa : " . $mahasiswa1->identitas();

?>