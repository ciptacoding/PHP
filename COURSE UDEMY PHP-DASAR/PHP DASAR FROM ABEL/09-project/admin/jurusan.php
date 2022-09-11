<?php
require '../functions.php';
requireLogin();
$currUser = getCurrentUser();

$perPage = 5;

$active = isset($_GET['page']) ? (int)$_GET['page'] : 1;
$start = ($active > 1) ? ($active * $perPage) - $perPage : 0;
$i = $start + 1;

$query = "SELECT * FROM jurusan";

$keyword = "";
if (isset($_SESSION['keywordJurusan']) && !empty($_SESSION['keywordJurusan'])) {
  $keyword = $_SESSION['keywordJurusan'];
  $query = "SELECT * FROM jurusan WHERE nama LIKE '%$keyword%'";
}

if (isset($_POST['search'])) {
  $keyword = $_SESSION['keywordJurusan'] = $_POST['keywordJurusan'];
  $query = "SELECT * FROM jurusan WHERE nama LIKE '%$keyword%'";
}

$query2 = pagination($query, $perPage);
$jurusan = result($query2);
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <?php include APP_ROOT . '/includes/admin/head.php'; ?>

  <title><?= SITE_NAME ?> - Jurusan</title>
</head>

<body id="page-top">

  <!-- Page Wrapper -->
  <div id="wrapper">

    <!-- Sidebar -->
    <?php $sbActive = "jurusan"; ?>
    <?php include APP_ROOT . '/includes/admin/sidebar.php'; ?>

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">

        <!-- Topbar -->
        <?php include APP_ROOT . '/includes/admin/navbar.php'; ?>

        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Content Row -->
          <div class="row">

            <div class="col-md-8 mb-4">

              <?php flash('status') ?>

              <div class="card shadow">
                <div class="card-header py-3">
                  <h6 class="m-0 font-weight-bold text-primary">Daftar Jurusan</h6>
                </div>
                <div class="card-body">

                  <div class="row justify-content-between mb-3">
                    <div class="col-auto">
                      <form action="" method="post">
                        <div class="input-group">
                          <input type="text" class="form-control" id="keywordJurusan" name="keywordJurusan" value="<?= $keyword ?>" placeholder="Search...">
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
                          <th scope="col">Aksi</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php if (!$jurusan) : ?>
                          <tr class="text-nowrap">
                            <td colspan="3" class="text-center text-danger">Data tidak ditemukan!</td>
                          </tr>
                        <?php endif ?>
                        <?php foreach ($jurusan as $ju) : ?>
                          <tr>
                            <th class="align-middle text-nowrap" scope="row"><?= $i++ ?></th>
                            <td class="align-middle text-nowrap"><?= $ju['nama'] ?></td>
                            <td class="align-middle text-nowrap">
                              <form action="<?= url_root() ?>/admin/jurusan-delete.php" method="post" onsubmit="return confirm('yakin?')" class="d-inline-block">
                                <input type="hidden" name="id" value="<?= $ju['id'] ?>">
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
                      <nav aria-label="Page navigation example">
                        <?php paginationLink($query, $perPage) ?>
                      </nav>
                    </div>
                  </div>

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