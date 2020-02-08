<?php
  require_once('../core/fetch.php');
  require_once('../assets/libs/login.php');

  if (isset($_GET['error']) && $_GET['error'] == 1) {
    $msg        = 'Please provide login credentials!';
    $type_stat  = 'error';
  }
  if(isset($_SESSION['admin_id'])){
    header("Location: dashboard.php");
  }

  if(isset($_POST['login'])) {
    if($userLogin($_POST['email'], md5($_POST['password']), $conn)){
        header("Location: dashboard.php");
    }else{
        $msg        = 'Invalid email or password';
        $type_stat  = 'error';
    }
  }
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <?php include 'libs/head.php'; ?>
</head>
<body>
  <div class="container-scroller">
    <div class="container-fluid page-body-wrapper full-page-wrapper">
      <div class="content-wrapper d-flex align-items-center auth login-full-bg">
        <div class="row w-100">
          <div class="col-lg-4 mx-auto">
            <div class="auth-form-dark text-left p-5">
              <h2>Login</h2>
              <h4 class="font-weight-light">Hello! let's get started</h4>
              <form class="pt-5" method="POST">
                  <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" class="form-control" name="email" id="email" aria-describedby="email" />
                    <i class="mdi mdi-account"></i>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Password</label>
                    <input type="password" class="form-control" name="password" id="password" />
                    <i class="mdi mdi-eye"></i>
                  </div>
                  <div class="mt-5">
                    <input type="submit" class="btn btn-block btn-warning btn-lg font-weight-medium" name="login" value="Login" />
                  </div>               
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <?php include('libs/javascript.php'); ?>
</body>
</html>
