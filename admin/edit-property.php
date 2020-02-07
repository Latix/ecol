<?php
require_once('../core/fetch.php');
require_once('libs/adminOpt.php');
checkAccess();

if (isset($_GET['id'])) :
	$property = $conn->query("SELECT * FROM property WHERE id=".$_GET['id'])->fetch_assoc();
endif;
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
            <div class="row">
	            <div class="col-12">
	                <div class="card">
		                <div class="card-body">
			                <h4 class="card-title">Update Property Wizard</h4>
			                <input type="hidden" id="propertyID" name="propertyID" value="<?= $property['id']; ?>">
			                <div id="edit-property-form" enctype="multipart/form-data">
			                    <div>
				                    <h3>&nbsp;&nbsp;<i class="fa fa-user"></i>&nbsp;&nbsp;<span class="hide-step-text">Basic Information</span></h3>
				                    <section>
				                    	<h4 class="head-text">Basic Information</h4>
				                        <div class="row">
				                        	<div class="col-lg-8">
						                        <label class="label-text" for="Title">Title</label>
						                        <input type="text" id="title" class="form-control title" name="title" aria-describedby="title" placeholder="Enter Title" value="<?= $property['title']; ?>"/>
				                        	</div>
			                        		<div class="col-lg-4">
				                        		<label class="label-text" for="Price">Price</label>
						                        <input type="text" id="price" class="form-control price" name="price" aria-describedby="price" placeholder="Enter Price" value="<?= number_format($property['price']); ?>"/>
					                        </div>
				                        </div>
				                        <div class="row mt-text">
			                        		<div class="col-lg-12">
				                        		<label class="label-text" for="Description">Description</label>
						                        <textarea class="form-control description" id="description" name="description" cols="76" rows="12" value="<?= $property['description']; ?>"><?= $property['description']; ?></textarea>
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
						                        	<option value="<?= $key; ?>" <?= (isset($property['location']) && $key == $property['location']) ? 'checked' : ''; ?>><?= $value; ?></option>
							                        <?php endforeach; ?>
						                        </select>
					                        </div>
					                        <div class="col-lg-8">
						                        <label class="label-text" for="Address">Address</label>
						                        <input type="text" id="address" class="form-control address" name="address" aria-describedby="address" placeholder="Enter Address" value="<?= $property['address']; ?>"/>
					                        </div>
				                        </div>
				                        <div class="row mt-text">
				                        	<div class="col-lg-6">
						                        <label class="label-text" for="Property_Type">Property Type</label>
						                        <select class="form-control property_type" id="property_type" name="property_type">
						                        	<?php foreach ($valid_property as $key => $value) : ?>
						                        	<option value="<?= $key; ?>" <?= (isset($property['property_type']) && $key == $property['property_type']) ? 'checked' : ''; ?>><?= $value; ?></option>
							                        <?php endforeach; ?>
						                        </select>
					                        </div>
					                        <div class="col-lg-6">
						                        <label class="label-text" for="Status">Status</label>
						                        <select class="form-control status" id="status" name="status">
						                        	<?php foreach ($valid_status as $key => $value) : ?>
						                        	<option value="<?= $key; ?>" <?= (isset($property['status']) && $key == $property['status']) ? 'checked' : ''; ?>><?= $value; ?></option>
							                        <?php endforeach; ?>
						                        </select>
					                        </div>
				                        </div>
				                        <div class="row mt-text">
				                        	<div class="col-lg-6">
						                        <label class="label-text" for="Title">Beds</label>
						                        <input type="number" id="beds" class="form-control beds" name="beds" value="<?= $property['beds'] ?? 0; ?>" aria-describedby="beds" />
				                        	</div>
				                        	<div class="col-lg-6">
						                        <label class="label-text" for="Title">Baths</label>
						                        <input type="number" id="baths" class="form-control baths" name="baths" value="<?= $property['baths'] ?? 0; ?>" aria-describedby="baths" />
				                        	</div>
				                        </div>
				                        <div class="row mt-text">
				                        	<div class="col-lg-6">
						                        <label class="label-text" for="Title">Area</label>
						                        <input type="number" id="area" class="form-control area" name="area" value="<?= $property['area'] ?? ''; ?>" aria-describedby="area" placeholder="In meter square" />
				                        	</div>
				                        	<div class="col-lg-6">
						                        <label class="label-text" for="Title">Garages</label>
						                        <input type="number" id="garages" class="form-control garages" value="<?= $property['garages'] ?? 0; ?>" name="garages" aria-describedby="garages" />
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
							                    <input type="hidden" class="img_file1" name="img_file1" value="<?= $property['picture1'] ?? ''; ?>" >
						                    </div>
				                        </div>
					                    <div class="row mt-text">
						                    <div class="col-lg-12">
							                    <label class="label-text">Picture upload (2)</label>
							                    <input type="file" id="file1" name="img[]" class="files file-upload-default" />
							                    <input type="hidden" class="img_file2" name="img_file2" value="<?= $property['picture2'] ?? ''; ?>" >
						                    </div>
				                        </div>
				                        <div class="row mt-text">
						                    <div class="col-lg-12">
							                    <label class="label-text">Picture upload (3)</label>
							                    <input type="file" id="file2" name="img[]" class="files file-upload-default" />
							                    <input type="hidden" class="img_file3" name="img_file3" value="<?= $property['picture3'] ?? ''; ?>" >
						                    </div>
				                        </div>
				                    </section>
				                    <h3>&nbsp;&nbsp;<i class="fa fa-cogs"></i>&nbsp;&nbsp;<span class="hide-step-text">Features</span></h3>
				                    <section class="features-section">
				                    	<h4 class="head-text">Features</h4>
				                    	<?php $features = explode(', ', $property['features']); ?>
					                    <div class="row">
					                    	<div class="form-check col-lg-4">
					                          <label class="form-check-label">
					                            <input class="checkbox" type="checkbox" name="features[]" value="Air conditioning" <?= (isset($features) && in_array("Air conditioning", $features)) ? 'checked' : ''; ?>>
						                            Air conditioning
					                          </label>
					                        </div>
					                        <div class="form-check col-lg-4">
					                          <label class="form-check-label">
					                            <input class="checkbox" type="checkbox" name="features[]" value="Bedding" <?= (isset($features) && in_array("Bedding", $features)) ? 'checked' : ''; ?>>
						                            Bedding
					                          </label>
					                        </div>
					                        <div class="form-check col-lg-4">
					                          <label class="form-check-label">
					                            <input class="checkbox" type="checkbox" name="features[]" value="Heating" <?= (isset($features) && in_array("Heating", $features)) ? 'checked' : ''; ?>>
						                            Heating
					                          </label>
					                        </div>
					                    </div>
					                    <div class="row">
					                    	<div class="form-check col-lg-4">
					                          <label class="form-check-label">
					                            <input class="checkbox" type="checkbox" name="features[]" value="Internet" <?= (isset($features) && in_array("Internet", $features)) ? 'checked' : ''; ?>>
						                            Internet
					                          </label>
					                        </div>
					                        <div class="form-check col-lg-4">
					                          <label class="form-check-label">
					                            <input class="checkbox" type="checkbox" name="features[]" value="Microwave" <?= (isset($features) && in_array("Microwave", $features)) ? 'checked' : ''; ?>>
						                            Microwave
					                          </label>
					                        </div>
					                        <div class="form-check col-lg-4">
					                          <label class="form-check-label">
					                            <input class="checkbox" type="checkbox" name="features[]" value="Smoking allowed" <?= (isset($features) && in_array("Smoking allowed", $features)) ? 'checked' : ''; ?>>
						                            Smoking allowed
					                          </label>
					                        </div>
					                    </div>
					                    <div class="row">
					                    	<div class="form-check col-lg-4">
					                          <label class="form-check-label">
					                            <input class="checkbox" type="checkbox" name="features[]" value="Use of pool" <?= (isset($features) && in_array("Use of pool", $features)) ? 'checked' : ''; ?>>
						                            Use of pool
					                          </label>
					                        </div>
					                        <div class="form-check col-lg-4">
					                          <label class="form-check-label">
					                            <input class="checkbox" type="checkbox" name="features[]" value="Toaster" <?= (isset($features) && in_array("Toaster", $features)) ? 'checked' : ''; ?>>
						                            Toaster
					                          </label>
					                        </div>
					                        <div class="form-check col-lg-4">
					                          <label class="form-check-label">
					                            <input class="checkbox" type="checkbox" name="features[]" value="Coffee pot" <?= (isset($features) && in_array("Coffee pot", $features)) ? 'checked' : ''; ?>>
						                            Coffee pot
					                          </label>
					                        </div>
					                    </div>
					                    <div class="row">
					                    	<div class="form-check col-lg-4">
					                          <label class="form-check-label">
					                            <input class="checkbox" type="checkbox" name="features[]" value="Cable TV" <?= (isset($features) && in_array("Cable TV", $features)) ? 'checked' : ''; ?>>
						                            Cable TV
					                          </label>
					                        </div>
					                        <div class="form-check col-lg-4">
					                          <label class="form-check-label">
					                            <input class="checkbox" type="checkbox" name="features[]" value="Parquet" <?= (isset($features) && in_array("Parquet", $features)) ? 'checked' : ''; ?>>
						                            Parquet
					                          </label>
					                        </div>
					                        <div class="form-check col-lg-4">
					                          <label class="form-check-label">
					                            <input class="checkbox" type="checkbox" name="features[]" value="Roof terrace" <?= (isset($features) && in_array("Roof Terrace", $features)) ? 'checked' : ''; ?>>
						                            Roof terrace
					                          </label>
					                        </div>
					                    </div>
					                    <div class="row">
					                    	<div class="form-check col-lg-4">
					                          <label class="form-check-label">
					                            <input class="checkbox" type="checkbox" name="features[]" value="Terrace" <?= (isset($features) && in_array("Terrace", $features)) ? 'checked' : ''; ?>>
						                            Terrace
					                          </label>
					                        </div>
					                        <div class="form-check col-lg-4">
					                          <label class="form-check-label">
					                            <input class="checkbox" type="checkbox" name="features[]" value="Balcony" <?= (isset($features) && in_array("Balcony", $features)) ? 'checked' : ''; ?>>
						                            Balcony
					                          </label>
					                        </div>
					                        <div class="form-check col-lg-4">
					                          <label class="form-check-label">
					                            <input class="checkbox" type="checkbox" name="features[]" value="Iron" <?= (isset($features) && in_array("Iron", $features)) ? 'checked' : ''; ?>>
						                            Iron
					                          </label>
					                        </div>
					                    </div>
					                    <div class="row">
					                    	<div class="form-check col-lg-4">
					                          <label class="form-check-label">
					                            <input class="checkbox" type="checkbox" name="features[]" value="HI-FI" <?= (isset($features) && in_array("HI-FI", $features)) ? 'checked' : ''; ?>>
						                            HI-FI
					                          </label>
					                        </div>
					                        <div class="form-check col-lg-4">
					                          <label class="form-check-label">
					                            <input class="checkbox" type="checkbox" name="features[]" value="Beach" <?= (isset($features) && in_array("Beach", $features)) ? 'checked' : ''; ?>>
						                            Beach
					                          </label>
					                        </div>
					                        <div class="form-check col-lg-4">
					                          <label class="form-check-label">
					                            <input class="checkbox" type="checkbox" name="features[]" value="Garage" <?= (isset($features) && in_array("Garage", $features)) ? 'checked' : ''; ?>>
						                            Garage
					                          </label>
					                        </div>
					                    </div>
				                    </section>
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
