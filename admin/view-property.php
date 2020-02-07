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
					<div class="card">
						<div class="card-body">
						  	<h4 class="card-title">Data table</h4>
						    <div class="row">
							    <div class="col-12">
								    <table id="order-listing" class="table table-striped table-responsive" cellspacing="0">
								        <thead>
								          <tr>
								              <th>#</th>
								              <th class="text-center">Title</th>
								              <th class="text-center">Picture</th>
								              <th class="text-center">Price</th>
								              <th class="text-center">Description</th>
								              <th class="text-center">Type</th>
								              <th class="text-center">Status</th>
								              <th class="text-center">Address</th>
								              <th></th>
								              <th></th>
								          </tr>
								        </thead>
								        <tbody>
								        	<?php
								        		$i = 1;
								        		$properties = $conn->query("SELECT * FROM property");
								        		foreach ($properties as $property) :
								        	?>
								            <tr>
									            <td><?= $i; ?></td>
									            <td class="text-center"><?= $property['title']; ?></td>
									            <td class="text-center"><img src="<?= $property['picture1']; ?>"></td>
									            <td class="text-center">₦<?= number_format($property['price']); ?></td>
									            <td class="truncate text-center" data-toggle="tooltip" data-placement="top" title="<?= $property['description']; ?>"><?= $property['description']; ?></td>
									            <td class="text-center"><label class="badge badge-primary"><?= $valid_property[$property['propertyType']]; ?></label></td>
									            <td class="text-center"><label class="badge badge-dark"><?= $valid_status[$property['status']]; ?></label></td>
									            <td class="truncate text-center" data-toggle="tooltip" data-placement="top" title="<?= $property['address']; ?>"><?= $property['address']; ?></td>
									            <td class="text-center">
									                <a href="edit-property.php?id=<?= $property['id']; ?>"><label class="badge badge-primary" data-toggle="tooltip" data-placement="top" title="Edit Details">Edit</label></a>
									            </td> 
									            <td class="text-center">
									                <a href="#"><label class="badge badge-info" data-toggle="tooltip" data-placement="top" title="View Details">Remove</label></a>
									            </td> 
								            </tr>
								          <?php $i++; endforeach; ?>
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
<script type="text/javascript">
	$(document).ready(function () {
		// body...
		$(function () {
		  $('[data-toggle="tooltip"]').tooltip()
		})
	});
</script>
