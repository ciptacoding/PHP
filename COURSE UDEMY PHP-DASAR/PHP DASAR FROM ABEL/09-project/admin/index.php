<?php
require '../functions.php';
requireLogin();
$currUser = getCurrentUser();
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <?php include APP_ROOT . '/includes/admin/head.php'; ?>

  <title><?= SITE_NAME ?> - Dashboard</title>
</head>

<body id="page-top">

  <!-- Page Wrapper -->
  <div id="wrapper">

    <!-- Sidebar -->
    <?php $sbActive = "dashboard"; ?>
    <?php include APP_ROOT . '/includes/admin/sidebar.php'; ?>

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">

        <!-- Topbar -->
        <?php include APP_ROOT . '/includes/admin/navbar.php'; ?>

        <!-- Begin Page Content -->
        <div class="container-fluid">

          <?php flash('status'); ?>

          <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-3">
            <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
          </div>

          <!-- Content Row -->
          <div class="row">

            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">User</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800"><?= rowCount("SELECT * FROM user") ?></div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-users fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Jurusan</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800"><?= rowCount("SELECT * FROM jurusan") ?></div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-book fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-info shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Mahasiswa</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800"><?= rowCount("SELECT * FROM mahasiswa") ?></div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-user-graduate fa-2x text-gray-300"></i>
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