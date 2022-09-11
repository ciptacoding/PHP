<?php
require '../functions.php';
requireLogin();

$deleteStatus = true;
if ($_SERVER['REQUEST_METHOD'] == "POST") {

  if (!isset($_POST['id']) || empty($_POST['id'])) {
    flash('status', 'Mahasiswa tidak ditemukan!', 'warning');
    $deleteStatus = false;
  }

  if ($deleteStatus) {
    $id = $_POST['id'];
    $data = row("SELECT * FROM mahasiswa WHERE id = $id");
    if (!$data) {
      flash('status', 'Mahasiswa tidak tersedia!', 'warning');
      $deleteStatus = false;
    }
  }

  if ($deleteStatus && delete("mahasiswa", "id = $id")) {
    if ($data['foto'] != "default.jpg") {
      $file =  APP_ROOT . '//uploads/' . $data['foto'];
      if (file_exists($file)) {
        unlink($file);
      }
    }
    flash('status', 'Deleted successfully');
  }
}

redirect('admin/mahasiswa.php');
