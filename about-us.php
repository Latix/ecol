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
    <section id="about-hero-section"
        style="background: url('./assets/oleks/images/hero.jpg'); background-position: center; background-size: cover"
        class="position-relative pb-5">

        <div class="container h-100">
            <!-- NavBar -->
            <?php include 'assets/libs/nav.php'; ?>

            <div class="row d-flex align-items-center h-100">
                <div class="col-lg-7 my-auto text-md-left text-center">
                    <h1 class="text-white">SAVE THOUSANDS SELLING</h1>
                    <h1 class="text-white">YOUR PROPERTIES</h1>
                </div>
            </div>
        </div>

        <div class="light-blue-div text-white p-3 phone-number-div">
            <div class="d-inline-flex">
                <i class="fa fa-phone text-white my-auto pr-2"></i>
                <p class="mb-0">+234 801-0012-345</p>
            </div>
        </div>
    </section>

    <section>
        <div class="row no-gutters">
            <div class="col-md-6 bg-about-1">

            </div>
            <div class="col-md-6 d-flex align-items-center">
                <div class="bg-about-color">
                    <div class="mt-4" style="border-bottom: 6px solid #f57b18; width: 25%;"></div>

                    <div class=" py-3 px-5">
                        <h3 class="blue-text">About us</h3>

                        <h4 class="blue-text font-weight-normal">Oleks MS makes Real Estates available to you, at the
                            best
                            prices-unbeatable, the best locations-unimaginable, and at the best time-unmatchable</h4>
                    </div>
                </div>
            </div>
        </div>

        <div class="row no-gutters">
            <div class="col-md-6 order-md-1 order-12 d-flex align-items-center">
                <div class="bg-about-color py-3 px-5 ml-auto">
                    <div class="col-md-12">
                        <div class="my-4 ml-auto" style="border-bottom: 6px solid #f57b18; width: 25%;"></div>
                    </div>
                    <h3 class="blue-text text-center">Our Mission</h3>

                    <h4 class="blue-text font-weight-normal">We believe, everyone deserves a home. Its our mission to
                        make a home available to you.</h4>
                </div>
            </div>
            <div class="col-md-6 order-md-12 order-1 bg-about-2">

            </div>
        </div>

        <div class="row no-gutters">
            <div class="col-md-6 bg-about-1">

            </div>
            <div class="col-md-6 d-flex align-items-center">
                <div class="bg-about-color">
                    <div class="mt-4 mb-3" style="border-bottom: 6px solid #f57b18; width: 25%;"></div>

                    <div class="pt-3 px-5 pb-5">
                        <h3 class="blue-text">Our Approach</h3>

                        <h4 class="blue-text font-weight-normal">We are a company of the present and the future, we
                            follow
                            exisiting trends and we set the pace for other Real Estates brands.</h4>

                        <h4 class="blue-text font-weight-normal mt-3">WE ACCEPT BITCOIN PAYMENT</h4>
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