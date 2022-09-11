<?php
require '../functions.php';
requireLogin();
$currUser = getCurrentUser();

if ($_SERVER['REQUEST_METHOD'] == "POST") {
  $data = [
    'nama' => $_POST['nama'],
    'email' => $_POST['email'],
    'password' => password_hash($_POST['password'], PASSWORD_DEFAULT)
  ];

  validationSetRules($_FILES, 'foto', 'Foto', ['max' => (1024 * 2), 'format' => 'jpg|jpeg|png']);
  validationSetRules($_POST, 'nama', 'Nama', ['required' => true, 'alphaSpaces' => true]);
  validationSetRules($_POST, 'email', 'Email', ['required' => true, 'validEmail' => true, 'unique' => 'user']);
  validationSetRules($_POST, 'password', 'Password', [
    'required' => true,
    // 'containUppercase' => true,
    // 'containLowercase' => true,
    // 'containNumber' => true,
    'min' => 4
  ]);

  if (validationSuccess()) {
    if ($_FILES['foto']['error'] === 4) {
      $data['foto'] = 'default.jpg';
    } else {
      $foto = upload($_FILES, 'foto');
      $data['foto'] = $foto ? $foto : 'default.jpg';
    }

    if (insert('user', $data)) {
      flash('status', 'Saved successfully');
      redirect('admin/user-add.php');
    }
  }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <?php include APP_ROOT . '/includes/admin/head.php'; ?>

  <title><?= SITE_NAME ?> - Tambah User</title>
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

            <div class="col-md-6 mb-4">

              <?php flash('status') ?>

              <div class="card shadow">
                <div class="card-header py-3">
                  <h6 class="m-0 font-weight-bold text-primary">Tambah User</h6>
                </div>
                <div class="card-body">

                  <form method="POST" action="" enctype="multipart/form-data">
                    <div class="form-group">
                      <label for="nama">Nama</label>
                      <input type="text" class="form-control <?= validationError('nama') ? 'is-invalid' : ''; ?>" id="nama" name="nama" value="<?= old('nama') ?>">
                      <div class="invalid-feedback"><?= validationError('nama') ?></div>
                    </div>
                    <div class="form-group">
                      <label for="email">Email</label>
                      <input type="text" class="form-control <?= validationError('email') ? 'is-invalid' : ''; ?>" id="email" name="email" value="<?= old('email') ?>">
                      <div class="invalid-feedback"><?= validationError('email') ?></div>
                    </div>
                    <div class="form-group">
                      <label for="password">Password</label>
                      <div class="input-group">
                        <input type="password" class="form-control <?= validationError('password') ? 'is-invalid' : ''; ?>" id="password" name="password">
                        <div class="input-group-append">
                          <button class="btn btn-outline-secondary" type="button" id="button" onclick="togglePassword('#password', this)">
                            <i class="fas fa-fw fa-eye-slash"></i>
                          </button>
                        </div>
                      </div>
                      <small id="passwordHelpBlock" class="form-text text-muted">
                        Password minimal 4 karakter, mengandung huruf besar, kecil dan angka
                      </small>
                    </div>
                    <div class="form-group">
                      <label for="foto">Foto</label>
                      <div class="custom-file">
                        <input type="file" class="custom-file-input <?= validationError('foto') ? 'is-invalid' : ''; ?>" id="foto" name="foto">
                        <label class="custom-file-label" for="foto">Choose file</label>
                        <small id="passwordHelpBlock" class="form-text text-muted">
                          Ext: jpg, png, jpg. Size: 2MB
                        </small>
                      </div>
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