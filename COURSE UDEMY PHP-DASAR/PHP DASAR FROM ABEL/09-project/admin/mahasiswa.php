<?php
require '../functions.php';
requireLogin();
$currUser = getCurrentUser();

$perPage = 5;

$active = isset($_GET['page']) ? (int)$_GET['page'] : 1;
$start = ($active > 1) ? ($active * $perPage) - $perPage : 0;
$i = $start + 1;

$query = "SELECT ma.*, ju.nama nama_jurusan 
          FROM mahasiswa ma 
          JOIN jurusan ju ON ma.id_jurusan = ju.id";

$keyword = "";
if (isset($_SESSION['keywordMahasiswa']) && !empty($_SESSION['keywordMahasiswa'])) {
  $keyword = $_SESSION['keywordMahasiswa'];
  $query = "SELECT ma.*, ju.nama nama_jurusan 
            FROM mahasiswa ma 
            JOIN jurusan ju ON ma.id_jurusan = ju.id 
            WHERE ma.nama LIKE '%$keyword%' or nim LIKE '%$keyword%' or ju.nama LIKE '%$keyword%'";
}

if (isset($_POST['search'])) {
  $keyword = $_SESSION['keywordMahasiswa'] = $_POST['keywordMahasiswa'];
  $query = "SELECT ma.*, ju.nama nama_jurusan 
            FROM mahasiswa ma 
            JOIN jurusan ju ON ma.id_jurusan = ju.id 
            WHERE ma.nama LIKE '%$keyword%' or nim LIKE '%$keyword%' or ju.nama LIKE '%$keyword%'";
}

$query2 = pagination($query, $perPage);
$mahasiswa = result($query2);
?>

<!DOCTYPE html>
<html lang="en">

<head>

  <?php include APP_ROOT . '/includes/admin/head.php'; ?>

  <title><?= SITE_NAME ?> - Mahasiswa</title>

</head>

<body id="page-top">

  <!-- Page Wrapper -->
  <div id="wrapper">

    <!-- Sidebar -->
    <?php $sbActive = "mahasiswa"; ?>
    <?php include APP_ROOT . '/includes/admin/sidebar.php'; ?>

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">

        <!-- Topbar -->
        <?php include APP_ROOT . '/includes/admin/navbar.php'; ?>

        <!-- Begin Page Content -->
        <div class="container-fluid">

          <?php flash('status') ?>

          <div class="card shadow">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Daftar Mahasiswa</h6>
            </div>
            <div class="card-body">
              <div class="row justify-content-between mb-3">
                <div class="col-auto">
                  <form action="" method="post">
                    <div class="input-group">
                      <input type="text" class="form-control" id="keywordMahasiswa" name="keywordMahasiswa" value="<?= $keyword ?>" placeholder="Search...">
                      <div class="input-group-append">
                        <button class="btn btn-outline-primary" type="submit" id="search" name="search"><i class="fas fa-search"></i></button>
                      </div>
                    </div>
                  </form>
                </div>
              </div>
              <div class="table-responsive">
                <table class="table table-bordered">
                  <thead>
                    <tr>
                      <th scope="col">No</th>
                      <th scope="col">Nama</th>
                      <th scope="col">Nim</th>
                      <th scope="col">Jurusan</th>
                      <th scope="col">Foto</th>
                      <th scope="col">Aksi</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php if (!$mahasiswa) : ?>
                      <tr class="text-nowrap">
                        <td colspan="6" class="text-center text-danger">Data tidak ditemukan!</td>
                      </tr>
                    <?php endif ?>
                    <?php foreach ($mahasiswa as $ma) : ?>
                      <tr>
                        <th class="align-middle text-nowrap" scope="row"><?= $i++ ?></th>
                        <td class="align-middle text-nowrap"><?= $ma['nama'] ?></td>
                        <td class="align-middle text-nowrap"><?= $ma['nim'] ?></td>
                        <td class="align-middle text-nowrap"><?= $ma['nama_jurusan'] ?></td>
                        <td class="align-middle text-nowrap"><img src="<?= url_root() ?>/uploads/<?= $ma['foto'] ?>" alt="foto" width="30"></td>
                        <td class="align-middle text-nowrap">
                          <a href="<?= url_root() ?>/admin/mahasiswa-edit.php?id=<?= $ma['id'] ?>" class="btn btn-primary btn-sm">Edit</a>
                          <form action="<?= url_root() ?>/admin/mahasiswa-delete.php" method="post" onsubmit="return confirm('yakin?')" class="d-inline-block">
                            <input type="hidden" name="id" value="<?= $ma['id'] ?>">
                            <button type="submit" class="btn btn-secondary btn-sm">Delete</button>
                          </form>
                        </td>
                      </tr>
                    <?php endforeach ?>
                  </tbody>
                </table>
              </div>
              <div class="row justify-content-between align-items-center">
                <div class="col-auto">
                  <p class="mb-0">Total: <?= rowCount($query) ?></p>
                </div>
                <div class="col-auto">
                  <?php paginationLink($query, $perPage) ?>
                </div>
              </div>
            </div>
          </div>

        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->

      <!-- Footer -->
      <?php include APP_ROOT . '/includes/admin/footer.php'; ?>

    </div>
    <!-- End of Content Wrapper -->

  </div>
  <!-- End of Page Wrapper -->

  <!-- Scroll to Top Button-->
  <?php include APP_ROOT . '/includes/admin/scroll-to-top.php'; ?>

  <!-- Logout Modal-->
  <?php include APP_ROOT . '/includes/admin/logout-modal.php'; ?>


  <!-- Script -->
  <?php include APP_ROOT . '/includes/admin/script.php'; ?>
</body>

</html>