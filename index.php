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
                    <div class="blue-div p-5">
                        <h4 class="text-white font-weight-normal">Search for Properties:</h4>
                        <form class="pt-4">
                            <div class="form-group">
                                <label for="location" class="text-white">Location</label>
                                <input type="text"
                                    class="form-control border-top-left-radius border-bottom-right-radius" id="location"
                                    placeholder="e.g Lekki">
                            </div>

                            <div class="form-group">
                                <label for="type" class="text-white">Type</label>
                                <select class="form-control border-top-left-radius border-bottom-right-radius"
                                    id="type">
                                    <option>1</option>
                                    <option>2</option>
                                    <option>3</option>
                                    <option>4</option>
                                    <option>5</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="price-range" class="text-white">Price Range</label>
                                <select class="form-control border-top-left-radius border-bottom-right-radius"
                                    id="price-range">
                                    <option>1</option>
                                    <option>2</option>
                                    <option>3</option>
                                    <option>4</option>
                                    <option>5</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="bedAndBath" class="text-white">Bedroom/Bathroom</label>

                                <div class="d-inline-flex w-100">
                                    <select
                                        class="form-control border-top-left-radius no-border-bottom-right no-border-top-right"
                                        id="bedAndBath">
                                        <option>1</option>
                                        <option>2</option>
                                        <option>3</option>
                                        <option>4</option>
                                        <option>5</option>
                                    </select>

                                    <select style="border-left: 1px solid grey !important;"
                                        class="form-control border-bottom-right-radius no-border-top-left no-border-bottom-left"
                                        id="bedAndBath">
                                        <option>1</option>
                                        <option>2</option>
                                        <option>3</option>
                                        <option>4</option>
                                        <option>5</option>
                                    </select>
                                </div>
                            </div>

                            <button
                                class="btn btn-blue w-100 border-top-left-radius border-bottom-right-radius my-4">Search</button>
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
            <div class="row mt-3">
                <div class="col-lg-3 col-md-6 magic-margin-bottom ">
                    <div class="card property-card h-100 position-relative box-shadow">
                        <div class="h-100"
                            style="background: url('assets/oleks/images/prop1.png'); background-position: center; background-size: cover;">
                            <div class="h-100 black-overlay">
                            </div>
                        </div>

                        <div>
                            <p class="text-white prop-name">Thomas Estate</p>
                            <div class="prop-name-border"></div>
                        </div>
                    </div>

                    <div class="text-center mt-4">
                        <h5 class="blue-text">$15000</h5>

                        <h5 class="blue-text">#105000</h5>

                        <a href="./property-details.html"><button class="btn btn-blue-outline px-4">Explore</button></a>
                    </div>
                </div>
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
                <div class="col-md-4 magic-margin-bottom ">
                    <div class="card property-card h-100 position-relative box-shadow">
                        <div class="h-100"
                            style="background: url('assets/oleks/images/prop1.png'); background-position: center; background-size: cover;">
                            <div class="h-100 black-overlay">
                            </div>
                        </div>
                        <div>
                            <p class="text-white prop-name">Thomas Estate</p>
                            <div class="prop-name-border"></div>
                        </div>
                    </div>
                    <div class="text-center mt-4">
                        <h5 class="orange-text">#105000</h5>
                        <button class="btn btn-orange-outline px-4">Explore</button>
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
