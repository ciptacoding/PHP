<?php
require '../functions.php';
requireLogin();
$currUser = getCurrentUser();
$jurusan = result("SELECT * FROM jurusan");

if (!isset($_GET['id']) || empty($_GET['id'])) {
  redirect('admin/mahasiswa.php');
}

$id = $_GET['id'];
$row = row("SELECT * FROM mahasiswa WHERE id = $id");

if (!$row) {
  redirect('admin/mahasiswa.php');
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  $data = [
    'nama' => $_POST['nama'],
    'nim' => $_POST['nim'],
    'email' => $_POST['email'],
    'id_jurusan' => $_POST['jurusan']
  ];

  validationSetRules($_FILES, 'foto', 'Foto', ['max' => (1024 * 2), 'format' => 'jpg|jpeg|png']);
  validationSetRules($_POST, 'nama', 'Nama Mahasiswa', ['required' => true, 'alphaSpaces' => true]);
  validationSetRules($_POST, 'jurusan', 'Jurusan', ['required' => true]);
  validationSetRules($_POST, 'email', 'Email', [
    'required' => true,
    'validEmail' => true,
    'unique' => ['table' => 'mahasiswa', 'where' => "id <> $id"]
  ]);
  validationSetRules($_POST, 'nim', 'Nim', [
    'required' => true,
    'numeric' => true,
    'size' => 9,
    'unique' => ['table' => 'mahasiswa', 'where' => "id <> $id"]
  ]);

  if (validationSuccess()) {
    if ($_FILES['foto']['error'] === 4) {
      $data['foto'] = $row['foto'];
    } else {
      $foto = upload($_FILES, 'foto');
      if ($foto) {
        $data['foto'] = $foto;
        if ($row['foto'] !== "default.jpg") {
          $file = APP_ROOT . '//uploads/' . $row['foto'];
          if (file_exists($file)) unlink($file);
        }
      } else {
        $data['foto'] = $row['foto'];
      }
    }

    if (update('mahasiswa', $data, "id = $id")) {
      flash('status', 'Updated successfully');
      redirect('admin/mahasiswa.php');
    }
  }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <?php include APP_ROOT . '/includes/admin/head.php'; ?>

  <title><?= SITE_NAME ?> - Edit Mahasiswa</title>
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

          <!-- Content Row -->
          <div class="row">

            <div class="col-md-6 mb-4">

              <?php flash('status') ?>

              <div class="card shadow">
                <div class="card-header py-3">
                  <h6 class="m-0 font-weight-bold text-primary">Edit Mahasiswa</h6>
                </div>
                <div class="card-body">

                  <form method="POST" action="" enctype="multipart/form-data">
                    <input type="hidden" name="id" value="<?= $row['id'] ?>">
                    <input type="hidden" name="fotoLama" value="<?= $row['foto'] ?>">
                    <div class="form-group">
                      <label for="nama">Nama</label>
                      <input type="text" class="form-control <?= validationError('nama') ? 'is-invalid' : ''; ?>" id="nama" name="nama" value="<?= old('nama') ?? $row['nama'] ?>">
                      <div class="invalid-feedback"><?= validationError('nama') ?></div>
                    </div>
                    <div class="form-group">
                      <label for="nim">Nim</label>
                      <input type="text" class="form-control <?= validationError('nim') ? 'is-invalid' : ''; ?>" id="nim" name="nim" value="<?= old('nim') ?? $row['nim'] ?>">
                      <div class="invalid-feedback"><?= validationError('nim') ?></div>
                    </div>
                    <div class="form-group">
                      <label for="email">Email</label>
                      <input type="text" class="form-control <?= validationError('email') ? 'is-invalid' : ''; ?>" id="email" name="email" value="<?= old('email') ?? $row['email'] ?>">
                      <div class="invalid-feedback"><?= validationError('email') ?></div>
                    </div>
                    <div class="form-group">
                      <label for="jurusan">Jurusan</label>
                      <select class="form-control <?= validationError('jurusan') ? 'is-invalid' : ''; ?>" id="jurusan" name="jurusan">
                        <option value="">Pilih Jurusan</option>
                        <?php foreach ($jurusan as $ju) : ?>
                          <option <?= ($row['id_jurusan'] == $ju['id']) ? 'selected' : ''; ?> value="<?= $ju['id'] ?>"><?= $ju['nama'] ?></option>
                        <?php endforeach ?>
                      </select>
                      <div class="invalid-feedback"><?= validationError('jurusan') ?></div>
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
                  <img src="<?= url_root() ?>/uploads/<?= $row['foto'] ?>" alt="foto" class="img-thumbnail img-fluid w-100">
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