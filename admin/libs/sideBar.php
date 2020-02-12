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
    <li class="nav-item"> <a class="nav-link" href="dashboard.php"> <img class="menu-icon" src="images/menu_icons/menu_dash.png" alt="menu icon"> <span class="menu-title">Dashboard</span></a> </li>
    <li class="nav-item"> <a class="nav-link" href="../"> <img class="menu-icon" src="images/menu_icons/menu_home.png" alt="menu icon"> <span class="menu-title">Home</span></a> </li>
    <li class="nav-item">
      <a class="nav-link" data-toggle="collapse" href="#users" aria-expanded="false" aria-controls="users"> <img class="menu-icon" src="images/menu_icons/menu_users.png" alt="menu icon"> <span class="menu-title">Users</span><i class="menu-arrow"></i></a>
      <div class="collapse" id="users">
          <ul class="nav flex-column sub-menu">
            <li class="nav-item"><a class="nav-link" href="new-user.php">Create User</a></li>
            <li class="nav-item"> <a class="nav-link" href="view-users.php">View User(s)</a></li>
        </ul>
      </div>
    </li>
    <li class="nav-item">
      <a class="nav-link" data-toggle="collapse" href="#property" aria-expanded="false" aria-controls="property"> <img class="menu-icon" src="images/menu_icons/menu_upload.png" alt="menu icon"> <span class="menu-title">Properties</span><i class="menu-arrow"></i></a>
      <div class="collapse" id="property">
          <ul class="nav flex-column sub-menu">
            <li class="nav-item"><a class="nav-link" href="new-property.php">Add Property</a></li>
            <li class="nav-item"> <a class="nav-link" href="view-property.php">View Properties</a></li>
        </ul>
      </div>
    </li>
    <li class="nav-item">
      <a class="nav-link" data-toggle="collapse" href="#profile" aria-expanded="false" aria-controls="property"> <img class="menu-icon" src="images/menu_icons/menu_dash.png" alt="menu icon"> <span class="menu-title">Settings</span><i class="menu-arrow"></i></a>
      <div class="collapse" id="profile">
          <ul class="nav flex-column sub-menu">
            <li class="nav-item"><a class="nav-link" href="profile.php">Profile</a></li>
        </ul>
      </div>
    </li>
    <li class="nav-item"> <a class="nav-link" href="?action=logout"> 
      <img class="menu-icon" src="images/menu_icons/menu_logout.png" alt="menu icon"> <span class="menu-title">Logout</span></a> 
    </li>
</nav>
