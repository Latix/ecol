<?php
    require_once('core/fetch.php');
    require_once('assets/libs/mainOpt.php');

    $items = 6;

    if (isset($_GET['filter-search']) && $_GET['filter-search'] == 'full-search') {
        $rent_sql  = "SELECT * FROM property WHERE status='RT' AND propertyType='CO' AND ";
        $rent_sql .= " location='".$_GET['location']."' ";
        $rent_sql .= " AND propertyType='".$_GET['property_type']."' ";
        $rent_sql .= ($_GET['min'] > 0 AND $_GET['max'] > 0) ? " AND price BETWEEN '".$_GET['min']."' AND '".$_GET['max']."' " : "";
        $rent_sql .= ($_GET['beds'] > 0) ? " AND beds='".$_GET['beds']."' " : "";
        $rent_sql .= ($_GET['baths'] > 0) ? " AND baths='".$_GET['baths']."' " : "";
        $rent_total_pages = $conn->query($sql)->num_rows; 

        $sale_sql  = "SELECT * FROM property WHERE status='SA' AND propertyType='CO' AND ";
        $sale_sql .= " location='".$_GET['location']."' ";
        $sale_sql .= " AND propertyType='".$_GET['property_type']."' ";
        $sale_sql .= ($_GET['min'] > 0 AND $_GET['max'] > 0) ? " AND price BETWEEN '".$_GET['min']."' AND '".$_GET['max']."' " : "";
        $sale_sql .= ($_GET['beds'] > 0) ? " AND beds='".$_GET['beds']."' " : "";
        $sale_sql .= ($_GET['baths'] > 0) ? " AND baths='".$_GET['baths']."' " : "";
        $sale_total_pages = $conn->query($sql)->num_rows; 
    } else {
        $rent_total_pages = $conn->query("SELECT * FROM property WHERE status='RT' AND propertyType='CO'")->num_rows;
        $sale_total_pages = $conn->query("SELECT * FROM property WHERE status='SA' AND propertyType='CO'")->num_rows;
    }
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
                                    <select class="form-control" id="property_type" name="property_type">
                                        <?php foreach ($valid_property as $key => $value) : ?>
                                        <option value="<?= $key; ?>" <?= (isset($_GET['property_type']) && $key == $_GET['property_type']) ? 'checked' : ''; ?>><?= $value; ?></option>
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
            <h4 class="text-secondary font-weight-bold">LATEST PROPERTIES FOR <span style="color: #96afce;">RENT</span>
            </h4>
            <hr>
            <div id="rent-target-content" class="row mt-5">
                 
            </div>
            <nav style="float: right;padding: 10px;">
                <ul class="rent-pagination">
                <?php if(!empty($total_pages)):for($i=1; $i<=$total_pages; $i++):  
                    if($i == 1):?>
                    <li class='active' id="<?php echo $i;?>"><a href='luxury-rent-pagination.php?page=<?php echo $i;?>'><?php echo $i;?></a></li> 
                    <?php else:?>
                    <li id="<?php echo $i;?>"><a href='luxury-rent-pagination.php?page=<?php echo $i;?>'><?php echo $i;?></a></li>
                <?php endif;?>          
                <?php endfor; endif;?>
                </ul>
            </nav>
        </div>
        <div style="background: #344c6d; height: 20vh;"></div>
        <div class="container pt-5 mb-5">
            <!-- latest Properties for rent -->
            <h4 class="text-secondary font-weight-bold">LATEST PROPERTIES FOR <span style="color: #96afce;">SALE</span>
            </h4>
            <hr>
            <div class="row mt-5">
                <div id="sale-target-content" class="row mt-5">
                 
                </div>
                <nav style="float: right;padding: 10px;">
                    <ul class="sale-pagination">
                    <?php if(!empty($total_pages)):for($i=1; $i<=$total_pages; $i++):  
                        if($i == 1):?>
                        <li class='active' id="<?php echo $i;?>"><a href='luxury-sale-pagination.php?page=<?php echo $i;?>'><?php echo $i;?></a></li> 
                        <?php else:?>
                        <li id="<?php echo $i;?>"><a href='luxury-sale-pagination.php?page=<?php echo $i;?>'><?php echo $i;?></a></li>
                    <?php endif;?>          
                    <?php endfor; endif;?>
                    </ul>
                </nav>
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
    <input type="hidden" id="location" value="<?= $_GET['location'] ?? ''; ?>">
    <input type="hidden" id="min" value="<?= $_GET['min'] ?? ''; ?>">
    <input type="hidden" id="max" value="<?= $_GET['max'] ?? ''; ?>">
    <input type="hidden" id="beds" value="<?= $_GET['beds'] ?? ''; ?>">
    <input type="hidden" id="baths" value="<?= $_GET['baths'] ?? ''; ?>">
    <input type="hidden" id="propertyType" value="<?= $_GET['property_type'] ?? ''; ?>">
    <input type="hidden" id="filter-search" value="<?= $_GET['filter-search'] ?? ''; ?>">
    <!-- Footer -->
    <?php include 'assets/libs/footer.php'; ?>
</body>
</html>
<script type="text/javascript">
    $(document).ready(function(){
        var location        = $('#location').val();
        var min             = $('#min').val();
        var max             = $('#max').val();
        var beds            = $('#beds').val();
        var baths           = $('#baths').val();
        var propertyType    = $('#propertyType').val();
        var filter_search   = $('#filter-search').val();

        $('.rent-pagination').pagination({
            items: <?= $rent_total_pages?>,
            itemsOnPage: <?= $items; ?>,
            cssStyle: 'light-theme',
            currentPage : 1,
            onPageClick : function(pageNumber) {
                jQuery("#rent-target-content").html('<img src="assets/images/loader.gif" width="300" height="150" />');
                if (filter_search == 'full-search') {
                    jQuery("#rent-target-content").load("luxury-rent-pagination.php?page="+pageNumber+"&location="+location+"&property_type="+propertyType+"&min="+min+"&max="+max+"&beds="+beds+"&baths="+baths+"&filter-search="+filter_search);
                } else {
                    jQuery("#rent-target-content").load("luxury-rent-pagination.php?page=" + pageNumber);
                }
            },
            onInit :function() {
                jQuery("#rent-target-content").html('<img src="assets/images/loader.gif" width="300" height="150" />');
                if (filter_search == 'full-search') {
                    jQuery("#rent-target-content").load("luxury-rent-pagination.php?page=1"+"&location="+location+"&property_type="+propertyType+"&min="+min+"&max="+max+"&beds="+beds+"&baths="+baths+"&filter-search="+filter_search);
                } else {
                    jQuery("#rent-target-content").load("luxury-rent-pagination.php?page=1");
                }
            }
        });

        $('.sale-pagination').pagination({
            items: <?= $sale_total_pages?>,
            itemsOnPage: <?= $items; ?>,
            cssStyle: 'light-theme',
            currentPage : 1,
            onPageClick : function(pageNumber) {
                jQuery("#sale-target-content").html('<img src="assets/images/loader.gif" width="300" height="150" />');
                if (filter_search == 'full-search') {
                    jQuery("#sale-target-content").load("luxury-sale-pagination.php?page="+pageNumber+"&location="+location+"&property_type="+propertyType+"&min="+min+"&max="+max+"&beds="+beds+"&baths="+baths+"&filter-search="+filter_search);
                } else {
                    jQuery("#sale-target-content").load("luxury-sale-pagination.php?page=" + pageNumber);
                }
            },
            onInit :function() {
                jQuery("#sale-target-content").html('<img src="assets/images/loader.gif" width="300" height="150" />');
                if (filter_search == 'full-search') {
                    jQuery("#sale-target-content").load("luxury-sale-pagination.php?page=1"+"&location="+location+"&property_type="+propertyType+"&min="+min+"&max="+max+"&beds="+beds+"&baths="+baths+"&filter-search="+filter_search);
                } else {
                    jQuery("#sale-target-content").load("luxury-sale-pagination.php?page=1");
                }
            }
        });
    });
</script>
