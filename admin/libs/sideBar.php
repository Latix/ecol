<nav class="sidebar sidebar-offcanvas" id="sidebar">
  <ul class="nav">
    <li class="nav-item nav-profile">
      <div class="nav-link">
        <div class="profile-image"> <img src="images/users.png" alt="image"/> <span class="online-status online"></span> </div>
        <div class="profile-name">
          <?php if(isset($_SESSION['admin_id'])){ ?>
          <p class="name"><?= $fullName; ?></p>
        <?php } ?>
        <div class="badge badge-teal mx-auto mt-3"><?= ucfirst($valid_accounts[$position]); ?></div>
        </div>
      </div>
    </li>
    <li class="nav-item"> <a class="nav-link" href="dashboard"> <img class="menu-icon" src="images/menu_icons/menu_dash.png" alt="menu icon"> <span class="menu-title">Dashboard</span></a> </li>
    <li class="nav-item"> <a class="nav-link" href="../"> <img class="menu-icon" src="images/menu_icons/menu_home.png" alt="menu icon"> <span class="menu-title">Home</span></a> </li>
    <li class="nav-item">
      <a class="nav-link" data-toggle="collapse" href="#form-elements" aria-expanded="false" aria-controls="form-elements"> <img class="menu-icon" src="images/menu_icons/menu_upload.png" alt="menu icon"> <span class="menu-title">Properties</span><i class="menu-arrow"></i></a>
      <div class="collapse" id="form-elements">
          <ul class="nav flex-column sub-menu">
            <li class="nav-item"><a class="nav-link" href="new-property.php">Add Property</a></li>
            <li class="nav-item"> <a class="nav-link" href="view-property.php">View Properties</a></li>
        </ul>
      </div>
    </li>
     <li class="nav-item"> <a class="nav-link" href="#"> 
      <img class="menu-icon" src="images/menu_icons/menu_dash.png" alt="menu icon"> <span class="menu-title">Settings</span></a> 
    </li>
    <li class="nav-item"> <a class="nav-link" href="?action=logout"> 
      <img class="menu-icon" src="images/menu_icons/menu_logout.png" alt="menu icon"> <span class="menu-title">Logout</span></a> 
    </li>
</nav>
