<?php
include("src/config.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Skydash Admin</title>
  <!-- plugins:css -->
  <link rel="stylesheet" href="vendors/feather/feather.css">
  <link rel="stylesheet" href="vendors/ti-icons/css/themify-icons.css">
  <link rel="stylesheet" href="vendors/css/vendor.bundle.base.css">
  <!-- endinject -->
  <!-- Plugin css for this page -->
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href="css/vertical-layout-light/style.css">
  <!-- endinject -->
  <link rel="shortcut icon" href="images/favicon.png" />
</head>

<body>
    <div class="container-fluid page-body-wrapper full-page-wrapper">
      <div class="content-wrapper d-flex align-items-center auth px-0">
        <div class="row w-100 mx-0">
          <div class="col-lg-6 mx-auto">
            <div class="auth-form-light text-left py-5 px-4 px-sm-5">
              <div class="brand-logo">
                <img style="width:100%;height:200px; margin:auto;" src="https://w7.pngwing.com/pngs/886/300/png-transparent-user-other-furniture-child-thumbnail.png" alt="logo">
              </div>
              <h4>New here?</h4>
              <h6 class="font-weight-light">Signing up is easy. It only takes a few steps</h6>

<form class="pt-3" action="login_save.php" method="post" enctype="multipart/form-data">
    <div class="form-group">
        <input type="email" name="email" class="form-control form-control-lg" id="exampleInputEmail1" placeholder="Email">
    </div>
    <div class="form-group">
        <input type="password" name="password" class="form-control form-control-lg" id="exampleInputPassword1" placeholder="Password">
    </div>
    <div class="mb-4">
        <div class="form-check">
        <label class="form-check-label text-muted">
            <input type="checkbox" name="agree" class="form-check-input">
            Rimembar me!
        </label>
        </div>
    </div>
    <div class="mt-3">
        <button type="submit" name="signup" class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn">LOGIN NOW</button>
    </div>
    <div class="text-center mt-4 font-weight-light">
        Already have an account? <a href="login.html" class="text-primary">Login</a>
    </div>
</form>


    </div>
    </div>
</div>
</div>
      <!-- content-wrapper ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>
<?php include("src/footer.php"); ?>