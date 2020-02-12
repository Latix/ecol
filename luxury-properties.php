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
    <section id="latest-property-section" style="background: url('assets/oleks/images/hero.jpg'); background-position: center; background-size: cover">
        <div class="container h-100">
            <!-- NavBar -->
            <?php include 'assets/libs/nav.php'; ?>
            <div class="row py-5">
                <div class="col-lg-7 my-auto text-md-left text-center mt-md-5 pt-md-5">
                    <h1 class="text-white font-weight-normal">OLEKS LATEST PROPERTIES</h1>
                    <h4 class="text-white font-weight-normal pt-3">a unique balance between affordable and luxury</h4>
                </div>
            </div>
        </div>
    </section>

    <section class="pt-5">
        <!-- filter -->
        <div class="container">
            <form method="GET">
                <div class="row">
                    <div class="col-md-10">
                        <div class="row">
                            <div class="col-md-3 border-right">
                                <div class="form-group">
                                    <label for="location">Location</label>
                                    <select class="form-control" id="location" name="location">
                                        <?php foreach ($valid_states as $key => $value) : ?>
                                        <option value="<?= $key; ?>" <?= (isset($_GET['location']) && $key == $_GET['location']) ? 'checked' : ''; ?>><?= $value; ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                            </div>

                            <div class="col-md-3 border-right">
                                <div class="form-group">
                                    <label for="type" class="w-100 text-center">Property Type</label>
                                    <select class="form-control" id="type">
                                        <?php foreach ($valid_property as $key => $value) : ?>
                                        <option value="<?= $key; ?>" <?= (isset($_GET['location']) && $key == $_GET['property_type']) ? 'checked' : ''; ?>><?= $value; ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                            </div>

                            <div class="col-md-3 border-right">
                                <div class="form-group">
                                    <label for="price" class="w-100 text-center">PRICE RANGE</label>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <input type="number" class="form-control" name="min" value="<?= $_GET['min'] ?? 0; ?>" />
                                        </div>
                                        <div class="col-md-6">
                                            <input type="number" class="form-control" name="max" value="<?= $_GET['max'] ?? 0; ?>" />
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="bed" class="w-100 text-center">BEDROOM/BATHROOM</label>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <input type="number" class="form-control" name="beds" value="<?= $_GET['beds'] ?? 0; ?>" />
                                        </div>
                                        <div class="col-md-6">
                                            <input type="number" class="form-control" name="baths" value="<?= $_GET['baths'] ?? 0; ?>" />
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <input type="hidden" name="filter-search" value="full-search"/>
                    <div class="col-md-2 text-md-right my-auto">
                        <button class="btn btn-blue px-4">SEARCH</button>
                    </div>
                </div>
            </form>
        </div>
        <div class="container pt-5 mb-5">
            <!-- latest Properties for rent -->
            <h4 class="text-secondary font-weight-bold">LUXURY PROPERTIES FOR <span style="color: #96afce;">RENT</span>
            </h4>
            <hr>
            <div class="row mt-5">
                <?php 
                    if (isset($_GET['filter-search']) && $_GET['filter-search'] == 'full-search') {
                        $sql  = "SELECT * FROM property WHERE status='RT' AND propertyType='CD' AND ";
                        $sql .= " location='".$_GET['location']."' ";
                        $sql .= " AND propertyType='".$_GET['property_type']."' ";
                        $sql .= ($_GET['min'] > 0 AND $_GET['max'] > 0) ? " AND price BETWEEN '".$_GET['min']."' AND '".$_GET['max']."' " : "";
                        $sql .= ($_GET['beds'] > 0) ? " AND beds='".$_GET['beds']."' " : "";
                        $sql .= ($_GET['baths'] > 0) ? " AND baths='".$_GET['baths']."' " : "";
                        $rent = $conn->query($sql); 
                    } else {
                        $rent = $conn->query("SELECT * FROM property WHERE status='RT' AND propertyType='CD' ORDER BY id DESC"); 
                    }
                    foreach ($rent as $property) :
                ?>
                <div class="col-md-4 mb-md-0 mb-5 marg-top">
                    <div class="card latest-prop-card">
                        <div class="card-header p-0">
                            <img src="<?= $property['picture1']; ?>" class="img-fluid" alt="">
                        </div>

                        <div class="card-body">
                            <h5><?= $property['title']; ?></h5>

                            <p class="text-secondary"><?= $valid_property[$property['propertyType']]; ?></p>

                            <p class="small text-secondary"><?= $property['address']; ?></p>

                            <p class="orange-text">₦<?= number_format($property['price']); ?></p>

                        </div>
                        <div class="card-footer bg-white">
                            <p class="text-secondary"><?= $property['beds']; ?> Beds  <?= $property['baths']; ?> Baths</p>
                            <p class="text-right prop-link"><a href="property-details.php?id=<?= $property['id']; ?>">Explore&nbsp;<i class="fa fa-arrow-right"></i></a></p>
                        </div>
                    </div>
                </div>
                <?php endforeach; ?>
            </div>
        </div>
        <div style="background: #344c6d; height: 20vh;"></div>
        <div class="container pt-5 mb-5">
            <!-- latest Properties for rent -->
            <h4 class="text-secondary font-weight-bold">LUXURY PROPERTIES FOR <span style="color: #96afce;">SALE</span>
            </h4>
            <hr>
            <div class="row mt-5">
                <?php 
                    if (isset($_GET['filter-search']) && $_GET['filter-search'] == 'full-search') {
                        $sql  = "SELECT * FROM property WHERE status='SA' AND propertyType='CD' AND ";
                        $sql .= " location='".$_GET['location']."' ";
                        $sql .= " AND propertyType='".$_GET['property_type']."' ";
                        $sql .= ($_GET['min'] > 0 AND $_GET['max'] > 0) ? " AND price BETWEEN '".$_GET['min']."' AND '".$_GET['max']."' " : "";
                        $sql .= ($_GET['beds'] > 0) ? " AND beds='".$_GET['beds']."' " : "";
                        $sql .= ($_GET['baths'] > 0) ? " AND baths='".$_GET['baths']."' " : "";
                        $sale = $conn->query($sql); 
                    } else {
                        $sale = $conn->query("SELECT * FROM property WHERE status='SA' AND propertyType='CD' ORDER BY id DESC"); 
                    }
                    foreach ($sale as $property) :
                ?>
                <div class="col-md-4 mb-md-0 mb-5 marg-top">
                    <div class="card latest-prop-card">
                        <div class="card-header p-0">
                            <img src="<?= $property['picture1']; ?>" class="img-fluid" alt="">
                        </div>

                        <div class="card-body">
                            <h5><?= $property['title']; ?></h5>

                            <p class="text-secondary"><?= $valid_property[$property['propertyType']]; ?></p>

                            <p class="small text-secondary"><?= $property['address']; ?></p>

                            <p class="orange-text">₦<?= number_format($property['price']); ?></p>

                        </div>
                        <div class="card-footer bg-white">
                            <p class="text-secondary"><?= $property['beds']; ?> Beds  <?= $property['baths']; ?> Baths</p>
                            <p class="text-right prop-link"><a href="property-details.php?id=<?= $property['id']; ?>">Explore&nbsp;<i class="fa fa-arrow-right"></i></a></p>
                        </div>
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
                                <input type="text" class="form-control border-top-left-radius"
                                    placeholder="Please Enter Email">
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
