<?php
require 'functions.php';

if (isset($_COOKIE['id']) && isset($_COOKIE['key'])) {
  $id = $_COOKIE['id'];
  $key = $_COOKIE['key'];

  $row = row("SELECT id, email FROM user WHERE id = $id");

  if ($key === hash('sha256', $row['email'])) {
    $_SESSION['user_id'] = $row['id'];
  }
}

if (isset($_SESSION['user_id'])) {
  redirect('admin');
}

if ($_SERVER['REQUEST_METHOD'] == "POST") {

  validationSetRules($_POST, 'email', 'Email', ['required' => true, 'validEmail' => true]);
  validationSetRules($_POST, 'password', 'Password', ['required' => true]);

  if (validationSuccess()) {

    $email = $_POST['email'];
    $password = $_POST['password'];

    $result = mysqli_query($conn, "SELECT * FROM user WHERE email = '$email'");

    if (mysqli_num_rows($result) === 1) {
      $row = mysqli_fetch_assoc($result);

      if (password_verify($password, $row["password"])) {
        $_SESSION['user_id'] = $row['id'];

        if (isset($_POST['remember'])) {
          setcookie('id', $row['id'], time() + (86400 * 15));
          setcookie('key', hash('sha256', $row['email']), time() + (86400 * 15));
        }

        flash('status', 'Login successfully');

        if (isset($_SESSION['return_to'])) {
          $page = $_SESSION['return_to'];
          unset($_SESSION['return_to']);

          header('Location: ' . $page, true, 303);
          exit;
        }

        redirect('admin');
      }
    }

    $errorLogin = true;
  }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <?php include APP_ROOT . '/includes/head.php'; ?>

  <title><?= SITE_NAME ?> - Login</title>
</head>

<body class="bg-gradient-primary">

  <div class="container my-5">

    <!-- Outer Row -->
    <div class="row justify-content-center">

      <div class="col-lg-6">

        <div class="card o-hidden border-0 shadow-lg my-5">

          <div class="card-body p-0">

            <div class="p-5">
              <div class="text-center">
                <h1 class="h4 text-gray-900 mb-4">Welcome Back!</h1>
              </div>

              <?php flash('status'); ?>

              <?php if (isset($errorLogin)) : ?>
                <div class="alert alert-danger" role="alert">
                  Incorrect email or password!
                </div>
              <?php endif ?>

              <form class="user" method="POST" action="">
                <div class="form-group">
                  <input type="email" class="form-control form-control-user <?= validationError('email') ? 'is-invalid' : ''; ?>" id="email" name="email" value="<?= old('email') ?>" placeholder="Enter Email Address...">
                  <div class="invalid-feedback pl-3"><?= validationError('email') ?></div>
                </div>
                <div class="form-group">
                  <input type="password" class="form-control form-control-user <?= validationError('password') ? 'is-invalid' : ''; ?>" id="password" name="password" placeholder="Password">
                  <div class="invalid-feedback pl-3"><?= validationError('password') ?></div>
                </div>
                <div class="form-group">
                  <div class="custom-control custom-checkbox small">
                    <input type="checkbox" class="custom-control-input" id="remember" name="remember">
                    <label class="custom-control-label" for="remember">Remember
                      Me</label>
                  </div>
                </div>
                <button type="submit" class="btn btn-primary btn-user btn-block">Login</button>
                <hr>
              </form>
              <div class="text-center">
                <a class="small" href="<?= url_root() ?>/register.php">Create an Account!</a>
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