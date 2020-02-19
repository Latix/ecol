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
						  	<h4 class="card-title">All Properties</h4>
						    <div class="row">
							    <div class="col-12 table-responsive">
								    <table id="order-listing" class="table table-striped" cellspacing="0">
								        <thead>
								          <tr>
												<th class="text-center">Picture</th>
												<th class="text-center">Title</th>
												<th class="text-center">Price</th>
												<th class="text-center">Description</th>
												<th class="text-center">Type</th>
												<th class="text-center">Status</th>
												<th class="text-center">Address</th>
												<th class="text-center"></th>
												<th class="text-center"></th>
								          </tr>
								        </thead>
								        <tbody>
								        	<?php
								        		$properties = $conn->query("SELECT * FROM property");
								        		foreach ($properties as $property) :
								        	?>
								            <tr>
									            <td class="text-center"><img style="border-radius: 0;" src="<?= $property['picture1']; ?>"></td>
									            <td class="text-center"><?= $property['title']; ?></td>
									            <td class="text-center">₦<?= number_format($property['price']); ?></td>
									            <td class="truncate text-center" data-toggle="tooltip" data-placement="top" title="<?= $property['description']; ?>"><?= custom_echo($property['description'], 50); ?></td>
									            <td class="text-center"><label class="badge badge-<?= $valid_property_HTML[$property['propertyType']]; ?>"><?= $valid_property[$property['propertyType']]; ?></label></td>
									            <td class="text-center"><label class="badge badge-<?= $valid_status_HTML[$property['status']]; ?>"><?= $valid_status[$property['status']]; ?></label></td>
									            <td class="truncate text-center" data-toggle="tooltip" data-placement="top" title="<?= $property['address']; ?>"><?= $property['address']; ?></td>
									            <td class="text-center">
									                <a href="edit-property.php?id=<?= $property['id']; ?>"><label class="badge badge-primary" data-toggle="tooltip" data-placement="top" title="Edit Details">Edit</label></a>
									            </td> 
									            <td class="text-center">
									                <a href="#" onclick="showSwal('warning-message-and-cancel', <?= $property['id']; ?>)"><label class="badge badge-danger" data-toggle="tooltip" data-placement="top" title="View Details">Remove</label></a>
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
