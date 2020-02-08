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
						  	<h4 class="card-title">All Users</h4>
						    <div class="row">
							    <div class="col-12 table-responsive">
								    <table id="order-listing" class="table table-striped" cellspacing="0">
								        <thead>
								          <tr>
												<th class="text-center">First Name</th>
												<th class="text-center">Last Name</th>
												<th class="text-center">Email</th>
												<th class="text-center">Account</th>
												<th class="text-center">Status</th>
												<th class="text-center">Action(s)</th>
								          </tr>
								        </thead>
								        <tbody>
								        	<?php
								        		$users = $conn->query("SELECT * FROM users");
								        		foreach ($users as $user) :
								        	?>
								            <tr>
									            <td class="text-center"><?= $user['firstName']; ?></td>
									            <td class="text-center"><?= $user['lastName']; ?></td>
									            <td class="text-center"><?= $user['email']; ?></td>
									            <td class="text-center"><span class="badge badge-<?= $valid_accounts_HTML[$user['accountType']]; ?>"><?= $valid_accounts[$user['accountType']]; ?></span></td>
									            <td class="text-center"><span class="badge badge-<?= $valid_accounts_status_HTML[$user['status']]; ?>"><?= $valid_accounts_status[$user['status']]; ?></span></td>
									            <td class="text-center">
									            	<?php if ($user['status'] == 1) : ?>
										            	<a id="block-user" attr-id="<?= $user['id']; ?>"><label class="badge badge-danger" data-toggle="tooltip" data-placement="top" title="Block User">Block</label></a>
										            <?php else: ?>
										            	<a id="unblock-user" attr-id="<?= $user['id']; ?>"><label class="badge badge-teal" data-toggle="tooltip" data-placement="top" title="Unblock User">UnBlock</label></a>
										            <?php endif; ?>
									            </td>
								            </tr>
								          <?php endforeach; ?>
								        </tbody>
								    </table>
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
