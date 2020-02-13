<?php
    require_once('core/fetch.php');
    require_once('assets/libs/mainOpt.php');
?>
<!DOCTYPE html>
<html lang="en">
<!-- Header -->
<?php include 'assets/libs/head.php'; ?>
<body>
    <!-- hero section -->
    <section id="hero-section" style="background: url('assets/oleks/images/hero.jpg'); background-position: center; background-size: cover">
        <div class="container h-100">
            <!-- NavBar -->
            <?php include 'assets/libs/nav.php'; ?>
            <div class="row py-5">
                <div class="col-lg-7 my-auto text-md-left text-center">
                    <h1 class="text-white font-weight-normal">Got something specific in mind?</h1>
                    <h1 class="text-white font-weight-normal">FIND YOUR PROPERTY:</h1>

                    <h4 class="text-white font-weight-normal pt-3">Fill in one or all of the search bars with any
                        keyword
                        describing your choice proprty, and pick from our robost inventory</h4>

                    <div class="mt-5 bitcoin-div light-blue-bg p-3">
                        <h3 class="text-white font-weight-normal">WE ACCEPT BITCOIN PAYMENT</h3>
                    </div>
                </div>

                <div class="col-lg-5 mt-5">
                    <div class="blue-div p-5" style="position: relative;top: -5%;">
                        <h4 class="text-white font-weight-normal">Search for Properties:</h4>
                        <form class="pt-4" method="GET">
                            <div class="form-group">
                                <label for="location" class="text-white">Location</label>
                                <select class="form-control border-top-left-radius border-bottom-right-radius" id="location" name="location">
                                    <?php foreach ($valid_states as $key => $value) : ?>
                                    <option value="<?= $key; ?>" <?= (isset($_GET['location']) && $key == $_GET['location']) ? 'checked' : ''; ?>><?= $value; ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="type" class="text-white">Property Type</label>
                                <select class="form-control border-top-left-radius border-bottom-right-radius" id="property_type" name="property_type" >
                                    <?php foreach ($valid_property as $key => $value) : ?>
                                    <option value="<?= $key; ?>" <?= (isset($_GET['location']) && $key == $_GET['property_type']) ? 'checked' : ''; ?>><?= $value; ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="price-range" class="text-white">Price Range</label>
                                <div class="row">
                                    <div class="col-md-6">
                                        <label for="bedAndBath" class="text-white">Min. Value</label>
                                        <input type="number" class="form-control" name="min" value="<?= $_GET['min'] ?? 0; ?>" />
                                    </div>
                                    <div class="col-md-6">
                                        <label for="bedAndBath" class="text-white">Max. Value</label>
                                        <input type="number" class="form-control" name="max" value="<?= $_GET['max'] ?? 0; ?>" />
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-6">
                                        <label for="bedAndBath" class="text-white">Bedrooms</label>
                                        <input type="number" class="form-control" name="beds" placeholder="Beds" value="<?= $_GET['beds'] ?? 0; ?>" />
                                    </div>
                                    <div class="col-md-6">
                                        <label for="bedAndBath" class="text-white">Bathrooms</label>
                                        <input type="number" class="form-control" name="baths" placeholder="Baths" value="<?= $_GET['baths'] ?? 0; ?>" />
                                    </div>
                                </div>
                            </div>
                            <input type="hidden" name="filter-search" value="full-search"/>
                            <button class="btn btn-blue w-100 border-top-left-radius border-bottom-right-radius my-4">Search</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- latest property -->
    <section id="latest-property" class="bg-white position-relative">
        <div class="container">
            <div class="row pt-5">
                <div class="col-md-6">
                    <a href="latest-properties.php"><h4 class="font-weight-bold blue-text cursor">LATEST PROPERTIES</h4></a>
                </div>
            </div>
            <div  class="row mt-3">
                <?php 
                    if (isset($_GET['filter-search']) && $_GET['filter-search'] == 'full-search') {
                        $sql  = "SELECT * FROM property WHERE ";
                        $sql .= " location='".$_GET['location']."' ";
                        $sql .= " AND propertyType='".$_GET['property_type']."' ";
                        $sql .= ($_GET['min'] > 0 AND $_GET['max'] > 0) ? " AND price BETWEEN '".$_GET['min']."' AND '".$_GET['max']."' " : "";
                        $sql .= ($_GET['beds'] > 0) ? " AND beds='".$_GET['beds']."' " : "";
                        $sql .= ($_GET['baths'] > 0) ? " AND baths='".$_GET['baths']."' " : "";
                        $sql .= " ORDER BY RAND() LIMIT 6 ";
                        $latest = $conn->query($sql); 
                    } else {
                        $latest = $conn->query("SELECT * FROM property ORDER BY RAND() LIMIT 6"); 
                    }
                    foreach ($latest as $property) :
                ?>
                <div class="col-md-4 magic-margin-bottom">
                    <div class="card property-card h-100 position-relative box-shadow">
                        <div class="h-100"
                            style="background: url('<?= $property['picture1']; ?>'); background-position: center; background-size: cover;">
                            <div class="h-100 black-overlay">
                            </div>
                        </div>

                        <div>
                            <p class="text-white prop-name"><?= $property['title']; ?> - For <?= $valid_status[$property['status']]; ?></p>
                        </div>
                    </div>

                    <div class="text-center mt-4">
                        <h5 class="blue-text">₦<?= number_format($property['price']); ?></h5>
                        <a href="property-details.php?id=<?= $property['id']; ?>"><button class="btn btn-blue-outline px-4">Explore</button></a>
                    </div>
                </div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

    <!-- luxery property -->
    <section id="luxury-property" class="pt-5">
        <div class="container">
            <div class="row pt-5">
                <div class="col-md-6">
                    <a href="luxury-properties.php"><h4 class="font-weight-bold text-white">LUXURY PROPERTIES</h4></a>
                </div>
                <div class="col-md-6"></div>
            </div>
            <div class="row mt-4">
                <?php 
                    if (isset($_GET['filter-search']) && $_GET['filter-search'] == 'full-search') {
                        $sql  = "SELECT * FROM property WHERE ";
                        $sql .= " location='".$_GET['location']."' ";
                        $sql .= " AND propertyType='".$_GET['property_type']."' ";
                        $sql .= ($_GET['min'] > 0 AND $_GET['max'] > 0) ? " AND price BETWEEN '".$_GET['min']."' AND '".$_GET['max']."' " : "";
                        $sql .= ($_GET['beds'] > 0) ? " AND beds='".$_GET['beds']."' " : "";
                        $sql .= ($_GET['baths'] > 0) ? " AND baths='".$_GET['baths']."' " : "";
                        $sql .= " ORDER BY RAND() LIMIT 6 ";
                        $luxury = $conn->query($sql); 
                    } else {
                        $luxury = $conn->query("SELECT * FROM property LIMIT 6"); 
                    }
                    
                    foreach ($luxury as $property) :
                ?>
                <div class="col-md-4 magic-margin-bottom ">
                    <div class="card property-card h-100 position-relative box-shadow">
                        <div class="h-100"
                            style="background: url('<?= $property['picture1']; ?>'); background-position: center; background-size: cover;">
                            <div class="h-100 black-overlay">
                            </div>
                        </div>
                        <div>
                            <p class="text-white prop-name"><?= $property['title']; ?> - For <?= $valid_status[$property['status']]; ?></p>
                        </div>
                    </div>
                    <div class="text-center mt-4">
                        <h5 class="orange-text">₦<?= number_format($property['price']); ?></h5>
                         <a href="property-details.php?id=<?= $property['id']; ?>"><button class="btn btn-orange-outline px-4">Explore</button></a>
                    </div>
                </div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>
    <!-- newsletter section -->
    <section id="newsletter" class="py-5">
        <div class="container my-5">
            <div class="row">
                <div class="col-md-5 text-md-left text-center">
                    <h3 class="text-white font-weight-normal">Newsletter? Sign up for killer deals on real estate</h3>
                </div>
                <div class="col-md-1"></div>
                <div class="col-md-6 mt-lg-0 mt-4">
                    <form>
                        <div class="row no-gutters">
                            <div class="col-md-9">
                                <input type="text" class="form-control border-top-left-radius" placeholder="Please Enter Email">
                            </div>
                            <div class="col-md-3">
                                <button class="btn btn-blue border-bottom-right-radius w-100">Get</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
    <!-- Footer -->
    <?php include 'assets/libs/footer.php'; ?>
</body>
</html>
