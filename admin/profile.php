<?php
require_once('../core/fetch.php');
require_once('libs/adminOpt.php');
checkAccess();
?>
<!DOCTYPE html>
<html lang="en">
<head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
  <?php include 'libs/head.php'; ?>
</head>

<body>
	<div class="container-scroller">
		<?php include('libs/navTopBar.php'); ?>
		<div class="container-fluid page-body-wrapper">
		<?php include('libs/navTopBarRight.php') ?>
		<?php include('libs/sideBar.php'); ?>
			<div class="main-panel">
				<div class="content-wrapper">
		            <div class="row user-profile">
			            <div class="col-lg-4 side-left d-flex align-items-stretch">
				            <div class="row">
				                <div class="col-12 grid-margin stretch-card">
					                <div class="card">
					                    <div class="card-body avatar">
						                    <h4 class="card-title">Info</h4>
						                    <img src="images/users.png" alt="">
						                    <p class="name"><?= $fullName; ?></p>
						                    <p class="designation">-  <?= $valid_accounts[$position]; ?>  -</p>
						                    <a class="d-block text-center text-dark" href="#"><?= $logged_user['email']; ?></a>
					                    </div>
					                  </div>
					                </div>
				                <div class="col-12 stretch-card">
					                <div class="card">
					                    <div class="card-body overview">
							                    <ul class="achivements">
							                        <li><label class="badge badge-pill badge-outline-primary"><b><?= $conn->query("SELECT * FROM property")->num_rows; ?></b></label><p>Properties</p></li>
							                        <li><label class="badge badge-warning"><?= $valid_accounts[$position]; ?></label><p>Type</p></li>
							                        <li><label class="badge badge-<?= $valid_accounts_status_HTML[$logged_user['status']]; ?>"><?= $valid_accounts_status[$logged_user['status']]; ?></label><p>Status</p></li>
							                    </ul>
						                    </div>
						                </div>
					                </div>
			                </div>
			            </div>
			            <div class="col-lg-8 side-right stretch-card">
			                <div class="card">
					            <div class="card-body">
					                <div class="wrapper d-block d-sm-flex align-items-center justify-content-between">
					                    <h4 class="card-title mb-0">Details</h4>
					                    <ul class="nav nav-tabs tab-solid tab-solid-primary mb-0" id="myTab" role="tablist">
					                      <li class="nav-item">
					                        <a class="nav-link active" id="info-tab" data-toggle="tab" href="#info" role="tab" aria-controls="info" aria-expanded="true">Info</a>
					                      </li>
					                      <li class="nav-item">
					                        <a class="nav-link" id="security-tab" data-toggle="tab" href="#security" role="tab" aria-controls="security">Security</a>
					                      </li>
					                    </ul>
					                </div>
					                <div class="wrapper">
					                    <hr>
					                    <div class="tab-content" id="myTabContent">
						                    <div class="tab-pane fade show active" id="info" role="tabpanel" aria-labelledby="info">
						                        <div class="form-group">
						                            <label for="name">First Name</label>
						                            <input type="text" class="form-control" id="firstName" placeholder="Change first name" value="<?= $logged_user['firstName'] ?? ''; ?>">
						                        </div>
						                        <div class="form-group">
						                            <label for="name">Last Name</label>
						                            <input type="text" class="form-control" id="lastName" placeholder="Change last name" value="<?= $logged_user['lastName'] ?? ''; ?>">
						                        </div>
						                        <div class="form-group">
						                            <label for="email">Email</label>
						                            <input type="email" class="form-control" id="none" placeholder="Change email address" value="<?= $logged_user['email'] ?? ''; ?>" disabled>
						                        </div>
						                        <div class="form-group mt-5">
						                            <span id="update-info-btn" class="btn btn-success mr-2">Update</span>
						                            <span class="btn btn-outline-danger">Cancel</span>
						                        </div>
						                    </div><!-- tab content ends -->
						                    <div class="tab-pane fade" id="security" role="tabpanel" aria-labelledby="security-tab">
						                        <div class="form-group">
						                            <label for="change-password">Change password</label>
						                            <input type="password" class="form-control" id="change-password" placeholder="Enter your current password">
						                        </div>
						                        <div class="form-group">
						                            <input type="password" class="form-control" id="new-password" placeholder="Enter your new password">
						                        </div>
						                        <div class="form-group">
						                            <input type="password" class="form-control" id="retype-password" placeholder="Retype your new password">
						                        </div>
						                        <div class="form-group mt-5">
						                            <span id="update-pwd-btn" class="btn btn-success mr-2">Update</span>
						                            <span class="btn btn-outline-danger">Cancel</a>
						                        </div>
						                    </div>
					                    </div>
					                </div>
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
