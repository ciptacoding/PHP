<?php
require '../functions.php';
requireLogin();
$currUser = getCurrentUser();

$id = $currUser['id'];

if ($_SERVER['REQUEST_METHOD'] == "POST") {
  $data = [
    'nama' => $_POST['nama'],
    'email' => $_POST['email']
  ];

  validationSetRules($_FILES, 'foto', 'Foto', ['max' => (1024 * 2), 'format' => 'jpg|jpeg|png']);
  validationSetRules($_POST, 'nama', 'Nama', ['required' => true, 'alphaSpaces' => true]);
  validationSetRules($_POST, 'email', 'Email', [
    'required' => true,
    'validEmail' => true,
    'unique' => ['table' => 'user', 'where' => "id <> $id"]
  ]);

  if (validationSuccess()) {
    if ($_FILES['foto']['error'] === 4) {
      $data['foto'] = $currUser['foto'];
    } else {
      $foto = upload($_FILES, 'foto');
      if ($foto) {
        $data['foto'] = $foto;
        if ($currUser['foto'] !== "default.jpg") {
          $file = APP_ROOT . '//uploads/' . $currUser['foto'];
          if (file_exists($file)) unlink($file);
        }
      } else {
        $data['foto'] = $currUser['foto'];
      }
    }

    if (update('user', $data, "id = $id")) {
      flash('status', 'Updated successfully');
      redirect('admin/profile.php');
    }
  }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <?php include APP_ROOT . '/includes/admin/head.php'; ?>

  <title><?= SITE_NAME ?> - Profile</title>
</head>

<body id="page-top">

  <!-- Page Wrapper -->
  <div id="wrapper">

    <!-- Sidebar -->
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
            <div class="col-md-9">
              <?php flash('status') ?>
            </div>
          </div>

          <!-- Content Row -->
          <div class="row">

            <div class="col-md-6">
              <div class="card shadow">
                <div class="card-header py-3">
                  <h6 class="m-0 font-weight-bold text-primary">Profile</h6>
                </div>
                <div class="card-body">

                  <form method="POST" action="" enctype="multipart/form-data">
                    <input type="hidden" name="id" value="<?= $currUser['id'] ?>">
                    <input type="hidden" name="fotoLama" value="<?= $currUser['foto'] ?>">
                    <div class="form-group">
                      <label for="nama">Nama</label>
                      <input type="text" class="form-control <?= validationError('nama') ? 'is-invalid' : ''; ?>" id="nama" name="nama" value="<?= old('nama') ? old('nama') : $currUser['nama'] ?>">
                      <div class="invalid-feedback"><?= validationError('nama') ?></div>
                    </div>
                    <div class="form-group">
                      <label for="email">Email</label>
                      <input type="text" class="form-control <?= validationError('email') ? 'is-invalid' : ''; ?>" id="email" name="email" value="<?= old('email') ? old('email') : $currUser['email'] ?>">
                      <div class="invalid-feedback"><?= validationError('email') ?></div>
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
                      <button type="submit" class="btn btn-primary">Update</button>
                    </div>
                  </form>

                </div>
              </div>
            </div>

            <div class="col-md-3">
              <div class="card shadow">
                <div class="card-header py-3">
                  <h6 class="m-0 font-weight-bold text-primary">Foto</h6>
                </div>
                <div class="card-body">
                  <img src="<?= url_root() ?>/uploads/<?= $currUser['foto'] ?>" alt="foto" class="img-thumbnail img-fluid w-100">
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