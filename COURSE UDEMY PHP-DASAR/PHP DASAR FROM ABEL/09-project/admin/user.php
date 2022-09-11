<?php
require '../functions.php';
requireLogin();
$currUser = getCurrentUser();

$perPage = 5;

$active = isset($_GET['page']) ? (int)$_GET['page'] : 1;
$start = ($active > 1) ? ($active * $perPage) - $perPage : 0;
$i = $start + 1;

$query = "SELECT * FROM user";

$keyword = "";
if (isset($_SESSION['keywordUser']) && !empty($_SESSION['keywordUser'])) {
  $keyword = $_SESSION['keywordUser'];
  $query = "SELECT * FROM user WHERE nama LIKE '%$keyword%' or email LIKE '%$keyword%'";
}

if (isset($_POST['search'])) {
  $keyword = $_SESSION['keywordUser'] = $_POST['keywordUser'];
  $query = "SELECT * FROM user WHERE nama LIKE '%$keyword%' or email LIKE '%$keyword%'";
}

$query2 = pagination($query, $perPage);
$user = result($query2);
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <?php include APP_ROOT . '/includes/admin/head.php'; ?>

  <title><?= SITE_NAME ?> - User</title>
</head>

<body id="page-top">

  <!-- Page Wrapper -->
  <div id="wrapper">

    <!-- Sidebar -->
    <?php $sbActive = "user"; ?>
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

            <div class="col-md-10 mb-4">

              <?php flash('status') ?>

              <div class="card shadow">
                <div class="card-header py-3">
                  <h6 class="m-0 font-weight-bold text-primary">Daftar User</h6>
                </div>
                <div class="card-body">

                  <div class="row mb-3">
                    <div class="col-md-6">
                      <form action="" method="post">
                        <div class="input-group">
                          <input type="text" class="form-control" id="keywordUser" name="keywordUser" value="<?= $keyword ?>" placeholder="Search...">
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
                          <th scope="col">Email</th>
                          <th scope="col">Foto</th>
                          <th scope="col">Aksi</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php if (!$user) : ?>
                          <tr class="text-nowrap">
                            <td colspan="5" class="text-center text-danger">Data tidak ditemukan!</td>
                          </tr>
                        <?php endif ?>
                        <?php foreach ($user as $us) : ?>
                          <tr>
                            <th class="align-middle text-nowrap" scope="row"><?= $i++ ?></th>
                            <td class="align-middle text-nowrap"><?= $us['nama'] ?></td>
                            <td class="align-middle text-nowrap"><?= $us['email'] ?></td>
                            <td class="align-middle text-nowrap"><img src="<?= url_root() ?>/uploads/<?= $us['foto'] ?>" alt="foto" width="25"></td>
                            <td class="align-middle text-nowrap">
                              <form action="<?= url_root() ?>/admin/user-delete.php" method="post" onsubmit="return confirm('yakin?')" class="d-inline-block">
                                <input type="hidden" name="id" value="<?= $us['id'] ?>">
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