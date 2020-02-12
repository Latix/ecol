<?php
    require_once('core/fetch.php');
    require_once('assets/libs/mainOpt.php');
    if (isset($_GET['id'])) :
        $property = $conn->query("SELECT * FROM property WHERE id='".$_GET['id']."'")->fetch_assoc();
    else :
        header("Location: ./");
    endif;
?>
<!DOCTYPE html>
<html lang="en">
<!-- Header -->
<?php include 'assets/libs/head.php'; ?>
<body>
    <!-- hero section -->
    <section id="details-section"
        style="background: url('<?= $property['picture1']; ?>'); background-position: center; background-size: cover" class="position-relative">
        <div class="container h-100 ">
            <!-- NavBar -->
            <?php include 'assets/libs/nav.php'; ?>
            <div class="details-header py-md-0 py-5">
                <div class="row">
                    <div class="col-md-12">
                        <div class=" p-3" style="background: rgba(0, 0, 0, 0.5);">
                            <h4 class="font-weight-normal orange-text"><?= $property['title']; ?></h4>
                            <h6 class="font-weight-normal text-white">
                            <?= custom_echo("Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.", 500); ?>
                            </h6>
                            <h5 class="orange-text font-weight-normal text-right">₦<?= number_format($property['price']); ?></h5>
                            <div class="row mt-5">
                                <div class="col-md-3">
                                    <h6 class="font-weight-normal text-white"><i class="fa fa-home mr-2"></i><?= $valid_property[$property['propertyType']]; ?></h6>
                                </div>
                                <div class="col-md-2">
                                    <h6 class="font-weight-normal text-white"><i class="fa fa-info-circle mr-2"></i><?= $valid_status[$property['status']]; ?></h6>
                                </div>
                                <div class="col-md-7">
                                    <h6 class="font-weight-normal text-white"><i class="fa fa-map-marker mr-2"></i><?= $property['address']; ?></h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- feature section -->
    <section>
        <div class="row no-gutters marg-rd">
            <div class="col-md-7  order-md-1 prop-details-card"
                style="background: url('<?= (is_null($property['picture2']) || $property['picture2'] == '') ? $property['picture1'] : $property['picture2']; ?>'); background-position: center; background-size: cover;">

            </div>
            <div class="col-md-5 col-md-push-5 order-1 prop-details-card">
                <div>
                    <div class="py-3" style="background: #edf2f7;"></div>
                    <div class="p-3" style="background: #dee7f0;">
                        <h4 class="blue-text">FEATURES</h4>
                    </div>
                </div>

                <div class="px-5 py-4">
                    <?php
                        $features = explode(',', $property['features']);
                        $i = 0;
                    ?>
                    <div class="blue-text font-weight-normal">
                        <?php foreach ($features as $feature) : ?>
                        <h5><?= $features[$i]; ?></h5>
                    <?php $i++; endforeach; ?>
                    </div>
                </div>
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
