<?php
require '../functions.php';
requireLogin();
$currUser = getCurrentUser();

if ($_SERVER['REQUEST_METHOD'] == "POST") {
  $data['nama'] = $_POST['nama'];

  validationSetRules($_POST, 'nama', 'Nama Jurusan', [
    'required' => true,
    'alphaSpaces' => true,
    'unique' => 'jurusan'
  ]);

  if (validationSuccess()) {
    if (insert('jurusan', $data)) {
      flash('status', 'Saved successfully');
      redirect('admin/jurusan-add.php');
    }
  }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <?php include APP_ROOT . '/includes/admin/head.php'; ?>

  <title><?= SITE_NAME ?> - Tambah Jurusan</title>
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

            <div class="col-md-6 mb-4">

              <?php flash('status') ?>

              <div class="card shadow">
                <div class="card-header py-3">
                  <h6 class="m-0 font-weight-bold text-primary">Tambah Jurusan</h6>
                </div>
                <div class="card-body">

                  <form method="POST" action="">
                    <div class="form-group">
                      <label for="nama">Nama Jurusan</label>
                      <input type="text" class="form-control <?= validationError('nama') ? 'is-invalid' : ''; ?>" id="nama" name="nama" value="<?= old('nama') ?>">
                      <div class="invalid-feedback"><?= validationError('nama') ?></div>
                    </div>
                    <div class="d-flex justify-content-end mt-4">
                      <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                  </form>

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