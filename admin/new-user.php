<?php
require_once('../core/fetch.php');
require_once('libs/adminOpt.php');
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
		<?php include('libs/sideBar.php'); ?>
			<div class="main-panel">
				<div class="content-wrapper">
					<div class="card">
						<div class="card-body">
						  	<h4 class="card-title">New User</h4>
						    <div class="row">
							    <div class="col-12">
							    	<form method="POST">
							    		<div class="form-group">
				                            <label for="name">First Name</label>
				                            <input type="text" class="form-control" id="firstName" placeholder="Enter first name" required> 
				                        </div>
				                        <div class="form-group">
				                            <label for="name">Last Name</label>
				                            <input type="text" class="form-control" id="lastName" placeholder="Enter last name" required>
				                        </div>
				                        <div class="form-group">
				                            <label for="name">Email</label>
				                            <input type="email" class="form-control" id="email" placeholder="Enter Email" required>
				                        </div>
				                        <div class="form-group">
				                            <label for="name">Password</label>
				                            <input type="password" class="form-control" id="password" placeholder="Enter Password" required>
				                        </div>
				                        <div class="form-group">
				                            <label for="name">Retype Password</label>
				                            <input type="password" class="form-control" id="retype-password" placeholder="Confirm Password" required>
				                        </div>
				                        <div class="form-group">
				                            <button type="button" class="form-control btn btn-success" id="create-user">Submit</button>
				                        </div>
							    	</form>
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
