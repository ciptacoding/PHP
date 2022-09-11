<?php
require '../functions.php';
requireLogin();

$deleteStatus = true;
if ($_SERVER['REQUEST_METHOD'] == "POST") {

  if (!isset($_POST['id']) || empty($_POST['id'])) {
    flash('status', 'User tidak ditemukan!', 'warning');
    $deleteStatus = false;
  }

  if ($deleteStatus) {
    $id = $_POST['id'];
    $data = row("SELECT * FROM user WHERE id = $id");
    if (!$data) {
      flash('status', 'User tidak tersedia!', 'warning');
      $deleteStatus = false;
    }
  }

  if ($deleteStatus && $_SESSION['user_id'] == $id) {
    flash('status', 'User tidak dapat dihapus!', 'warning');
    $deleteStatus = false;
  }

  if ($deleteStatus && delete("user", "id = $id")) {
    if ($data['foto'] != "default.jpg") {
      $file =  APP_ROOT . '//uploads/' . $data['foto'];
      if (file_exists($file)) {
        unlink($file);
      }
    }
    flash('status', 'Deleted successfully');
  }
}

redirect('admin/user.php');
