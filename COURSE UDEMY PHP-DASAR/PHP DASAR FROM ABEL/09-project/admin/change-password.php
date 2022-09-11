<?php
require '../functions.php';
requireLogin();
$currUser = getCurrentUser();
$id = $currUser['id'];

if ($_SERVER['REQUEST_METHOD'] == "POST") {
  $data['password'] = password_hash($_POST['password'], PASSWORD_DEFAULT);

  validationSetRules($_POST, 'currentPassword', 'Current Password', ['required' => true]);
  validationSetRules($_POST, 'confirmPassword', 'Confirm Password', ['required' => true, 'matches' => 'password']);
  validationSetRules($_POST, 'password', 'Password', [
    'required' => true,
    // 'containUppercase' => true,
    // 'containLowercase' => true,
    // 'containNumber' => true,
    'min' => 4
  ]);

  $email = $currUser['email'];
  $row = row("SELECT * FROM user WHERE email = '$email'");
  if (!password_verify($_POST['currentPassword'], $row['password'])) {
    validationError('currentPassword', "Current Password salah!");
  }

  if (validationSuccess()) {
    if (update('user', $data, "id = $id")) {
      flash('status', 'Updated successfully');
      redirect('admin/change-password.php');
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

            <div class="col-md-6 mb-4">

              <?php flash('status') ?>

              <div class="card shadow">
                <div class="card-header py-3">
                  <h6 class="m-0 font-weight-bold text-primary">Change Password</h6>
                </div>
                <div class="card-body">

                  <form method="POST" action="" enctype="multipart/form-data">
                    <div class="form-group">
                      <label for="currentPassword">Current Password</label>
                      <input type="password" class="form-control <?= validationError('currentPassword') ? 'is-invalid' : ''; ?>" id="currentPassword" name="currentPassword">
                      <div class="invalid-feedback"><?= validationError('currentPassword') ?></div>
                    </div>
                    <div class="form-group">
                      <label for="password">Password</label>
                      <input type="password" class="form-control <?= validationError('password') ? 'is-invalid' : ''; ?>" id="password" name="password">
                      <div class="invalid-feedback"><?= validationError('password') ?></div>
                    </div>
                    <div class="form-group">
                      <label for="confirmPassword">Confirm Password</label>
                      <input type="password" class="form-control <?= validationError('confirmPassword') ? 'is-invalid' : ''; ?>" id="confirmPassword" name="confirmPassword">
                      <div class="invalid-feedback"><?= validationError('confirmPassword') ?></div>
                    </div>
                    <div class="d-flex justify-content-end mt-4">
                      <button type="submit" href="#" class="btn btn-primary">Update</button>
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