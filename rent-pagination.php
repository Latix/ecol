<?php
require_once('core/fetch.php');
require_once('assets/libs/mainOpt.php');

$limit = 6;
if (isset($_GET["page"])) { $page  = $_GET["page"]; } else { $page=1; };  
$start_from = ($page-1) * $limit;  

if (isset($_GET['filter-search']) && $_GET['filter-search'] == 'full-search') {
    $sql  = "SELECT * FROM property WHERE status='RT' AND ";
    $sql .= " location='".$_GET['location']."' ";
    $sql .= " AND propertyType='".$_GET['property_type']."' ";
    $sql .= ($_GET['min'] > 0 AND $_GET['max'] > 0) ? " AND price BETWEEN '".$_GET['min']."' AND '".$_GET['max']."' " : "";
    $sql .= ($_GET['beds'] > 0) ? " AND beds='".$_GET['beds']."' " : "";
    $sql .= ($_GET['baths'] > 0) ? " AND baths='".$_GET['baths']."' " : "";
    $sql .= " ORDER BY id DESC LIMIT $start_from, $limit ";
    $rent = $conn->query($sql); 
} else {
    $rent = $conn->query("SELECT * FROM property WHERE status='RT' ORDER BY id DESC LIMIT $start_from, $limit"); 
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