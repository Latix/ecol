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
    <!-- partial:partials/_navbar.php -->
    <!-- partial:partials/_navbar.html -->
    <?php
          include('libs/navTopBar.php');
    ?>

    <!-- partial -->
    <div class="container-fluid page-body-wrapper">
      <!-- partial:partials/_settings-panel.html -->
      <?php include('libs/navTopBarRight.php') ?>
      <!-- partial -->
      <!-- partial:partials/_sidebar.html -->
      <?php include('libs/sideBar.php'); ?>
      <!-- partial -->
      <div class="main-panel">
        <div class="content-wrapper">
            <div class="row">
	            <div class="col-12">
	                <div class="card">
		                <div class="card-body">
			                <h4 class="card-title">Property Wizard</h4>

			                <div id="property-form" enctype="multipart/form-data">
			                    <div>
				                    <h3>&nbsp;&nbsp;<i class="fa fa-user"></i>&nbsp;&nbsp;<span class="hide-step-text">Basic Information</span></h3>
				                    <section>
				                    	<h4 class="head-text">Basic Information</h4>
				                        <div class="row">
				                        	<div class="col-lg-8">
						                        <label class="label-text" for="Title">Title</label>
						                        <input type="text" id="title" class="form-control title" name="title" aria-describedby="title" placeholder="Enter Title" value="<?= $_POST['title'] ?? ''; ?>"/>
				                        	</div>
			                        		<div class="col-lg-4">
				                        		<label class="label-text" for="Price">Price</label>
						                        <input type="text" id="price" class="form-control price" name="price" aria-describedby="price" placeholder="Enter Price" value="<?= $_POST['price'] ?? ''; ?>"/>
					                        </div>
				                        </div>
				                        <div class="row mt-text">
			                        		<div class="col-lg-12">
				                        		<label class="label-text" for="Description">Description</label>
						                        <textarea class="form-control description" id="description" name="description" cols="76" rows="12" value="<?= $_POST['description'] ?? ''; ?>"><?= $_POST['description'] ?? ''; ?></textarea>
					                        </div>
				                        </div>
				                    </section>
				                    <h3>&nbsp;&nbsp;<i class="fa fa-clone"></i>&nbsp;&nbsp;<span class="hide-step-text">Summary</span></h3>
				                    <section>
				                    	<h4 class="head-text">Summary</h4>
				                    	<div class="row">
				                        	<div class="col-lg-4">
						                        <label class="label-text" for="Location">Location</label>
						                        <select class="form-control location" id="location" name="location">
						                        	<?php foreach ($valid_states as $key => $value) : ?>
						                        	<option value="<?= $key; ?>" <?= (isset($_POST['location']) && $key == $_POST['location']) ? 'checked' : ''; ?>><?= $value; ?></option>
							                        <?php endforeach; ?>
						                        </select>
					                        </div>
					                        <div class="col-lg-8">
						                        <label class="label-text" for="Address">Address</label>
						                        <input type="text" id="address" class="form-control address" name="address" aria-describedby="address" placeholder="Enter Address" value="<?= $_POST['address'] ?? ''; ?>"/>
					                        </div>
				                        </div>
				                        <div class="row mt-text">
				                        	<div class="col-lg-6">
						                        <label class="label-text" for="Property_Type">Property Type</label>
						                        <select class="form-control property_type" id="property_type" name="property_type">
						                        	<?php foreach ($valid_property as $key => $value) : ?>
						                        	<option value="<?= $key; ?>" <?= (isset($_POST['location']) && $key == $_POST['property_type']) ? 'checked' : ''; ?>><?= $value; ?></option>
							                        <?php endforeach; ?>
						                        </select>
					                        </div>
					                        <div class="col-lg-6">
						                        <label class="label-text" for="Status">Status</label>
						                        <select class="form-control status" id="status" name="status">
						                        	<?php foreach ($valid_status as $key => $value) : ?>
						                        	<option value="<?= $key; ?>" <?= (isset($_POST['location']) && $key == $_POST['status']) ? 'checked' : ''; ?>><?= $value; ?></option>
							                        <?php endforeach; ?>
						                        </select>
					                        </div>
				                        </div>
				                        <div class="row mt-text">
				                        	<div class="col-lg-6">
						                        <label class="label-text" for="Title">Beds</label>
						                        <input type="number" id="beds" class="form-control beds" name="beds" value="<?= $_POST['beds'] ?? 0; ?>" aria-describedby="beds" />
				                        	</div>
				                        	<div class="col-lg-6">
						                        <label class="label-text" for="Title">Baths</label>
						                        <input type="number" id="baths" class="form-control baths" name="baths" value="<?= $_POST['baths'] ?? 0; ?>" aria-describedby="baths" />
				                        	</div>
				                        </div>
				                        <div class="row mt-text">
				                        	<div class="col-lg-6">
						                        <label class="label-text" for="Title">Area</label>
						                        <input type="number" id="area" class="form-control area" name="area" value="<?= $_POST['area'] ?? ''; ?>" aria-describedby="area" placeholder="In meter square" />
				                        	</div>
				                        	<div class="col-lg-6">
						                        <label class="label-text" for="Title">Garages</label>
						                        <input type="number" id="garages" class="form-control garages" value="<?= $_POST['garages'] ?? 0; ?>" name="garages" aria-describedby="garages" />
				                        	</div>
				                        </div>	
				                    </section>
				                    <h3>&nbsp;&nbsp;<i class="fa fa-image"></i>&nbsp;&nbsp;<span class="hide-step-text">Gallery</span></h3>
				                    <section>
				                    	<h4 class="head-text">Gallery</h4>
				                        <!--<div class="row">
				                        	<div class="col-lg-12">
				                        		<form action="/file-upload" class="dropzone d-flex align-items-center" id="dropzoneFrom">
				                        			<div class="fallback">
													    <input type="file" id="files" name="img[]" multiple />
												    </div>
				                        		</form>
							                    <label class="label-text">Picture upload (1)</label>
							                    <input type="file" id="files" name="img[]" class="file-upload-default files" multiple>
						                    </div>
					                    </div>-->
					                    <div class="row mt-text">
						                    <div class="col-lg-12">
							                    <label class="label-text">Picture upload (1)</label>
							                    <input type="file" id="file0" name="img[]" class="files file-upload-default" />
						                    </div>
				                        </div>
					                    <div class="row mt-text">
						                    <div class="col-lg-12">
							                    <label class="label-text">Picture upload (2)</label>
							                    <input type="file" id="file1" name="img[]" class="files file-upload-default" />
						                    </div>
				                        </div>
				                        <div class="row mt-text">
						                    <div class="col-lg-12">
							                    <label class="label-text">Picture upload (3)</label>
							                    <input type="file" id="file2" name="img[]" class="files file-upload-default" />
						                    </div>
				                        </div>
				                    </section>
				                    <h3>&nbsp;&nbsp;<i class="fa fa-cogs"></i>&nbsp;&nbsp;<span class="hide-step-text">Features</span></h3>
				                    <section class="features-section">
				                    	<h4 class="head-text">Features</h4>
					                    <div class="row">
					                    	<div class="form-check col-lg-4">
					                          <label class="form-check-label">
					                            <input class="checkbox" type="checkbox" name="features[]" value="Air conditioning" <?= (isset($_POST['features']) && in_array("Air conditioning", $_POST['features'])) ? 'checked' : ''; ?>>
						                            Air conditioning
					                          </label>
					                        </div>
					                        <div class="form-check col-lg-4">
					                          <label class="form-check-label">
					                            <input class="checkbox" type="checkbox" name="features[]" value="Bedding" <?= (isset($_POST['features']) && in_array("Bedding", $_POST['features'])) ? 'checked' : ''; ?>>
						                            Bedding
					                          </label>
					                        </div>
					                        <div class="form-check col-lg-4">
					                          <label class="form-check-label">
					                            <input class="checkbox" type="checkbox" name="features[]" value="Heating">
						                            Heating
					                          </label>
					                        </div>
					                    </div>
					                    <div class="row">
					                    	<div class="form-check col-lg-4">
					                          <label class="form-check-label">
					                            <input class="checkbox" type="checkbox" name="features[]" value="Internet">
						                            Internet
					                          </label>
					                        </div>
					                        <div class="form-check col-lg-4">
					                          <label class="form-check-label">
					                            <input class="checkbox" type="checkbox" name="features[]" value="Microwave">
						                            Microwave
					                          </label>
					                        </div>
					                        <div class="form-check col-lg-4">
					                          <label class="form-check-label">
					                            <input class="checkbox" type="checkbox" name="features[]" value="Smoking allowed">
						                            Smoking allowed
					                          </label>
					                        </div>
					                    </div>
					                    <div class="row">
					                    	<div class="form-check col-lg-4">
					                          <label class="form-check-label">
					                            <input class="checkbox" type="checkbox" name="features[]" value="Use of pool">
						                            Use of pool
					                          </label>
					                        </div>
					                        <div class="form-check col-lg-4">
					                          <label class="form-check-label">
					                            <input class="checkbox" type="checkbox" name="features[]" value="Toaster">
						                            Toaster
					                          </label>
					                        </div>
					                        <div class="form-check col-lg-4">
					                          <label class="form-check-label">
					                            <input class="checkbox" type="checkbox" name="features[]" value="Coffee pot">
						                            Coffee pot
					                          </label>
					                        </div>
					                    </div>
					                    <div class="row">
					                    	<div class="form-check col-lg-4">
					                          <label class="form-check-label">
					                            <input class="checkbox" type="checkbox" name="features[]" value="Cable TV">
						                            Cable TV
					                          </label>
					                        </div>
					                        <div class="form-check col-lg-4">
					                          <label class="form-check-label">
					                            <input class="checkbox" type="checkbox" name="features[]" value="Parquet">
						                            Parquet
					                          </label>
					                        </div>
					                        <div class="form-check col-lg-4">
					                          <label class="form-check-label">
					                            <input class="checkbox" type="checkbox" name="features[]" value="Roof terrace">
						                            Roof terrace
					                          </label>
					                        </div>
					                    </div>
					                    <div class="row">
					                    	<div class="form-check col-lg-4">
					                          <label class="form-check-label">
					                            <input class="checkbox" type="checkbox" name="features[]" value="Terrace">
						                            Terrace
					                          </label>
					                        </div>
					                        <div class="form-check col-lg-4">
					                          <label class="form-check-label">
					                            <input class="checkbox" type="checkbox" name="features[]" value="Balcony">
						                            Balcony
					                          </label>
					                        </div>
					                        <div class="form-check col-lg-4">
					                          <label class="form-check-label">
					                            <input class="checkbox" type="checkbox" name="features[]" value="Iron">
						                            Iron
					                          </label>
					                        </div>
					                    </div>
					                    <div class="row">
					                    	<div class="form-check col-lg-4">
					                          <label class="form-check-label">
					                            <input class="checkbox" type="checkbox" name="features[]" value="HI-FI">
						                            HI-FI
					                          </label>
					                        </div>
					                        <div class="form-check col-lg-4">
					                          <label class="form-check-label">
					                            <input class="checkbox" type="checkbox" name="features[]" value="Beach">
						                            Beach
					                          </label>
					                        </div>
					                        <div class="form-check col-lg-4">
					                          <label class="form-check-label">
					                            <input class="checkbox" type="checkbox" name="features[]" value="Garage">
						                            Garage
					                          </label>
					                        </div>
					                    </div>
				                    </section>
			                    </div>
		                    </div> <!-- form -->
 				        </div>
				        <!-- End -->
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
  <script src="node_modules/jquery-steps/build/jquery.steps.min.js"></script>
  <script src="node_modules/jquery-validation/dist/jquery.validate.min.js"></script>
  <script src="node_modules/sweetalert/dist/sweetalert.min.js"></script>
  <script src="node_modules/jquery.avgrund/jquery.avgrund.min.js"></script>
  <!-- <script src="node_modules/dropzone/dist/dropzone.js"></script> -->
  <script src="js/dropzone.js"></script>
  <script src="js/alerts.js"></script>
  <script src="js/avgrund.js"></script>
  <!-- End plugin js for this page-->
  <!-- inject:js -->
  <script src="js/off-canvas.js"></script>
  <script src="js/hoverable-collapse.js"></script>
  <script src="js/misc.js"></script>
  <script src="js/settings.js"></script>
  <script src="js/todolist.js"></script>
  <!-- endinject -->
  <!-- Custom js for this page-->
  <script src="js/wizard.js"></script>
  <!-- End custom js for this page-->
  <script type="text/javascript">
  	$(document).ready(function() {
		Dropzone.options.imageUpload = {
	        maxFilesize:1,
	        acceptedFiles: ".jpeg,.jpg,.png,.gif"
	    };
  	});
  </script>
</body>
</html>
