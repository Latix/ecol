<!-- SWEET ALERT -->
<div class="hide">
  <span class="message"><?= $msg ?? ''; ?></span>
  <span class="message_color"><?= $type_stat ?? ''; ?></span>
</div>
<!-- SWEET ALERT -->
<nav class="navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
      <div class="text-center navbar-brand-wrapper d-flex align-items-top justify-content-center">
      </div>
      <div class="navbar-menu-wrapper d-flex align-items-center">
        <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
          <span class="icon-menu"></span>
        </button>
        <ul class="navbar-nav navbar-nav-left header-links d-none d-md-flex">

          <?php if (isset($_SESSION['seller_id'])): ?>


          <li class="nav-item active">
            <a href="../index" class="nav-link"><i class="mdi mdi-calendar"></i>Shop</a>
          </li>
          <?php endif; ?>
        </ul>
        <ul class="navbar-nav navbar-nav-right">


          <li class="nav-item d-none d-lg-block color-setting">
            <a class="nav-link" href="#">
              <i class="mdi mdi-format-color-fill"></i>
            </a>
          </li>
          <?php
            $profilePic = "";
            if(isset($_SESSION['student_id'])){
              $profilePic = "s.jpg";
            }
            if(isset($_SESSION['retailer_id'])){
              $profilePic = "r.jpg";
            }
            if(isset($_SESSION['lecturer_id'])){
              $profilePic = "l.jpg";
            }
            if(isset($_SESSION['wholesaler_id']) || isset($_SESSION['admin_id'])){
              $profilePic = "w.jpg";
            }
           ?>
          <li class="nav-item nav-settings d-none d-lg-block">
            <a class="nav-link" href="#">
              <img class="img-xs rounded-circle" src="images/favicon.png" alt="">
            </a>
          </li>
          <?php if (isset($_SESSION['student_id']) || isset($_SESSION['lecturer_id'])): ?>
          <li class="nav-item active">
            <a href="../index" class="nav-link"><i class="mdi mdi-shop"></i>Shop</a>
          </li>
        <?php endif; ?>
          <li class="nav-item active">
            <a href="?action=logout" class="nav-link"><i class="fa fa-sign-out"></i>Logout</a>
          </li>
        </ul>
        <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
          <span class="icon-menu"></span>
        </button>
      </div>
    </nav>
