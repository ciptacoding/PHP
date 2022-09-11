<?php
require '../functions.php';
requireLogin();

$deleteStatus = true;
if ($_SERVER['REQUEST_METHOD'] == "POST") {

  if (!isset($_POST['id']) || empty($_POST['id'])) {
    flash('status', 'Jurusan tidak ditemukan!', 'warning');
    $deleteStatus = false;
  }

  if ($deleteStatus) {
    $id = $_POST['id'];
    $data = row("SELECT * FROM jurusan WHERE id = $id");
    if (!$data) {
      flash('status', 'Jurusan tidak tersedia!', 'warning');
      $deleteStatus = false;
    }
  }

  if ($deleteStatus) {
    $checkMhs = rowCount("SELECT * FROM mahasiswa WHERE id_jurusan = $id");
    if ($checkMhs > 0) {
      flash('status', 'Jurusan tidak dapat dihapus!', 'warning');
      $deleteStatus = false;
    }
  }

  if ($deleteStatus && delete("jurusan", "id = $id")) {
    flash('status', 'Deleted successfully');
  }
}

redirect('admin/jurusan.php');
