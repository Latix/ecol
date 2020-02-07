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
    <!-- partial:partials/_navbar.php -->
    <?php
         include('libs/navTopBar.php');
    ?>
    <!-- partial -->
    <div class="container-fluid page-body-wrapper">
      <!-- partial:partials/_settings-panel.php -->
      <?php include('libs/navTopBarRight.php') ?>
      <!-- partial -->
      <!-- partial:partials/_sidebar.php -->
      <?php include('libs/sideBar.php') ?>
      <!-- partial -->
      <div class="main-panel">
        <div class="content-wrapper">
          <div class="row">
            <div class="col-xl-4 col-lg-4 col-md-4 col-sm-6 grid-margin stretch-card">
              <div class="card card-statistics">
                <div class="card-body">
                  <div class="clearfix">
                    <div class="float-left">
                      <i class="mdi mdi-home-variant text-dark icon-lg"></i>
                    </div>
                    <div class="float-right">
                      <p class="card-text text-right">Total Properties</p>
                      <div class="fluid-container">
                        <h3 class="card-title font-weight-bold text-right mb-0">5</h3>
                      </div>
                    </div>
                  </div>
                  <p class="text-muted mt-3">
                    <i class="mdi mdi-alert-octagon mr-1" aria-hidden="true"></i>Total
                  </p>
                </div>
              </div>
            </div><div class="col-xl-4 col-lg-4 col-md-4 col-sm-6 grid-margin stretch-card">
              <div class="card card-statistics">
                <div class="card-body">
                  <div class="clearfix">
                    <div class="float-left">
                      <i class="mdi mdi-plus-circle-outline text-dark icon-lg"></i>
                    </div>
                    <div class="float-right">
                      <p class="card-text text-right">Add Property</p>
                      <div class="fluid-container">
                        <h3 class="card-title font-weight-bold text-right mb-0">-</h3>
                      </div>
                    </div>
                  </div>
                  <p class="text-muted mt-3">
                    <i class="mdi mdi-alert-octagon mr-1" aria-hidden="true"></i>New
                  </p>
                </div>
              </div>
            </div><div class="col-xl-4 col-lg-4 col-md-4 col-sm-6 grid-margin stretch-card">
              <div class="card card-statistics">
                <div class="card-body">
                  <div class="clearfix">
                    <div class="float-left">
                      <i class="mdi mdi-home-modern text-dark icon-lg"></i>
                    </div>
                    <div class="float-right">
                      <p class="card-text text-right">View Properties</p>
                      <div class="fluid-container">
                        <h3 class="card-title font-weight-bold text-right mb-0">-</h3>
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
        <!-- content-wrapper ends -->
        <!-- partial:partials/_footer.php -->
        <?php include('libs/footer.php'); ?>
        <!-- partial -->
      </div>
      <!-- main-panel ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>
  <!-- container-scroller -->

  <!-- plugins:js -->
  <script src="node_modules/jquery/dist/jquery.min.js"></script>
  <script src="node_modules/popper.js/dist/umd/popper.min.js"></script>
  <script src="node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
  <script src="node_modules/perfect-scrollbar/dist/perfect-scrollbar.min.js"></script>
  
  <!-- endinject -->
  <!-- Plugin js for this page-->
  <script src="node_modules/raphael/raphael.min.js"></script>
  <script src="node_modules/morris.js/morris.min.js"></script>
  <script src="node_modules/jquery-sparkline/jquery.sparkline.min.js"></script>
  <script src="node_modules/chartist/dist/chartist.min.js"></script>
  <script src="node_modules/chart.js/dist/Chart.min.js"></script>
  <script src="node_modules/jvectormap/jquery-jvectormap.min.js"></script>
  <script src="node_modules/jvectormap/tests/assets/jquery-jvectormap-world-mill-en.js"></script>
  <script src="node_modules/jquery-steps/build/jquery.steps.min.js"></script>
  <script src="node_modules/jquery-validation/dist/jquery.validate.min.js"></script>
  <!-- End plugin js for this page-->
  <!-- inject:js -->
  <script src="js/off-canvas.js"></script>
  <script src="js/hoverable-collapse.js"></script>
  <script src="js/misc.js"></script>
  <script src="js/settings.js"></script>
  <script src="js/todolist.js"></script>
  <!-- endinject -->
</body>
</html>
