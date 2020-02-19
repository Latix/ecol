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
        </ul>
        <ul class="navbar-nav navbar-nav-right">
          <li class="nav-item d-none d-lg-block color-setting">
            <a class="nav-link" href="#">
              <i class="mdi mdi-format-color-fill"></i>
            </a>
          </li>
          <li class="nav-item nav-settings d-none d-lg-block">
            <a class="nav-link" href="#">
              <img class="img-xs rounded-circle" style="width: 26px;height: 26px;" src="images/favicon.png" alt="">
            </a>
          </li>
          <li class="nav-item active">
            <a href="?action=logout" class="nav-link"><i class="fa fa-sign-out"></i>Logout</a>
          </li>
        </ul>
        <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
          <span class="icon-menu"></span>
        </button>
      </div>
    </nav>
