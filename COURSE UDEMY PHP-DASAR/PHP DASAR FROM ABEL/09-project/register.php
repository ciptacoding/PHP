<?php
require 'functions.php';

if ($_SERVER['REQUEST_METHOD'] == "POST") {
  $data = [
    'nama' => $_POST['nama'],
    'email' => $_POST['email'],
    'password' => password_hash($_POST['password'], PASSWORD_DEFAULT)
  ];

  validationSetRules($_POST, 'nama', 'Nama', ['required' => true, 'alphaSpaces' => true]);
  validationSetRules($_POST, 'email', 'Email', ['required' => true, 'unique' => 'user', 'validEmail' => true]);
  validationSetRules($_POST, 'password', 'Password', [
    'required' => true,
    // 'containUppercase' => true,
    // 'containLowercase' => true,
    // 'containNumber' => true,
    'min' => 4
  ]);
  validationSetRules($_POST, 'repeat_password', 'Repeat Password', ['required' => true, 'matches' => 'password']);

  if (validationSuccess()) {
    if (insert('user', $data)) {
      $row = row("SELECT * FROM user ORDER BY id DESC LIMIT 1");
      $_SESSION['user_id'] = $row['id'];
      flash('status', 'Register successfully');
      redirect('admin');
    }
  }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <?php include APP_ROOT . '/includes/head.php'; ?>

  <title><?= SITE_NAME ?> - Register</title>
</head>

<body class="bg-gradient-primary">

  <div class="container">

    <!-- Outer Row -->
    <div class="row justify-content-center">

      <div class="col-lg-6">

        <div class="card o-hidden border-0 shadow-lg my-5">
          <div class="card-body p-0">
            <div class="p-5">
              <div class="text-center">
                <h1 class="h4 text-gray-900 mb-4">Create an Account!</h1>
              </div>
              <form class="user" method="POST" action="">
                <div class="form-group">
                  <input type="text" class="form-control form-control-user <?= validationError('nama') ? 'is-invalid' : ''; ?>" id="nama" name="nama" value="<?= old('nama') ?>" placeholder="Nama">
                  <div class="invalid-feedback"><?= validationError('nama') ?></div>
                </div>
                <div class="form-group">
                  <input type="text" class="form-control form-control-user <?= validationError('email') ? 'is-invalid' : ''; ?>" id="email" name="email" value="<?= old('email') ?>" placeholder="Email Address">
                  <div class="invalid-feedback"><?= validationError('email') ?></div>
                </div>
                <div class="form-group row">
                  <div class="col-sm-6 mb-3 mb-sm-0">
                    <input type="password" class="form-control form-control-user <?= validationError('password') ? 'is-invalid' : ''; ?>" id="password" name="password" placeholder="Password">
                    <div class="invalid-feedback"><?= validationError('password') ?></div>
                  </div>
                  <div class="col-sm-6">
                    <input type="password" class="form-control form-control-user <?= validationError('repeat_password') ? 'is-invalid' : ''; ?>" id="repeat_password" name="repeat_password" placeholder="Repeat Password">
                    <div class="invalid-feedback"><?= validationError('repeat_password') ?></div>
                  </div>
                </div>
                <button type="submit" class="btn btn-primary btn-user btn-block">
                  Register Account
                </button>
                <hr>
              </form>
              <div class="text-center">
                <a class="small" href="<?= url_root() ?>">Already have an account? Login!</a>
              </div>
            </div>
          </div>
        </div>

      </div>

    </div>

  </div>

  <!-- Script -->
  <?php include APP_ROOT . '/includes/script.php'; ?>
</body>

</html>