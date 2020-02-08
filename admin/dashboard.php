<?php
require_once('../core/fetch.php');
include 'libs/adminOpt.php';
checkAccess();
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <?php include 'libs/head.php'; ?>
</head>
<body>
  <div class="container-scroller">
    <?php include('libs/navTopBar.php'); ?>
    <div class="container-fluid page-body-wrapper">
      <?php include('libs/navTopBarRight.php') ?>
      <?php include('libs/sideBar.php') ?>
      <div class="main-panel">
        <div class="content-wrapper">
          <div class="row">
            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 grid-margin stretch-card">
              <div class="card card-statistics">
                <div class="card-body">
                  <div class="clearfix">
                    <div class="float-left">
                      <i class="mdi mdi-home-variant text-dark icon-lg"></i>
                    </div>
                    <div class="float-right">
                      <p class="card-text text-right">Total Properties</p>
                      <div class="fluid-container">
                        <h3 class="card-title font-weight-bold text-right mb-0"><?= $conn->query("SELECT * FROM property")->num_rows; ?></h3>
                      </div>
                    </div>
                  </div>
                  <p class="text-muted mt-3">
                    <i class="mdi mdi-alert-octagon mr-1" aria-hidden="true"></i>Total
                  </p>
                </div>
              </div>
            </div>
            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 grid-margin stretch-card">
              <div class="card card-statistics">
                <div class="card-body">
                  <div class="clearfix">
                    <div class="float-left">
                      <i class="mdi mdi-home-variant text-dark icon-lg"></i>
                    </div>
                    <div class="float-right">
                      <p class="card-text text-right">Total Users</p>
                      <div class="fluid-container">
                        <h3 class="card-title font-weight-bold text-right mb-0"><?= $conn->query("SELECT * FROM users WHERE accountType != 'RT'")->num_rows; ?></h3>
                      </div>
                    </div>
                  </div>
                  <p class="text-muted mt-3">
                    <i class="mdi mdi-alert-octagon mr-1" aria-hidden="true"></i>Total
                  </p>
                </div>
              </div>
            </div>
            <div class="col-xl6 col-lg6 col-md-6 col-sm-6 grid-margin stretch-card">
              <div class="card card-statistics">
                <div class="card-body">
                  <div class="clearfix">
                    <div class="float-left">
                      <i class="mdi mdi-plus-circle-outline text-dark icon-lg"></i>
                    </div>
                    <div class="float-right">
                      <p class="card-text text-right">Add Property</p>
                      <div class="fluid-container">
                        <h3 class="card-title font-weight-bold text-right mb-0"><span class="card-link"><a href="new-property.php">Click Here</a></span></h3>
                      </div>
                    </div>
                  </div>
                  <p class="text-muted mt-3">
                    <i class="mdi mdi-alert-octagon mr-1" aria-hidden="true"></i>New
                  </p>
                </div>
              </div>
            </div>
            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 grid-margin stretch-card">
              <div class="card card-statistics">
                <div class="card-body">
                  <div class="clearfix">
                    <div class="float-left">
                      <i class="mdi mdi-home-modern text-dark icon-lg"></i>
                    </div>
                    <div class="float-right">
                      <p class="card-text text-right">View Properties</p>
                      <div class="fluid-container">
                        <h3 class="card-title font-weight-bold text-right mb-0"><span class="card-link"><a href="view-property.php">Click Here</a></span></h3>
                      </div>
                    </div>
                  </div>
                  <p class="text-muted mt-3">
                    <i class="mdi mdi-alert-octagon mr-1" aria-hidden="true"></i>View
                  </p>
                </div>
              </div>
            </div>
          </div>
        </div>
        <?php include('libs/footer.php'); ?>
        <?php include('libs/javascript.php'); ?>
      </div>
    </div>
  </div>
</body>
</html>
