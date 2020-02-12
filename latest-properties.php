<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Latest Properties</title>

    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/custom.css">
    <link rel="stylesheet" href="css/font-awesome.min.css">

    <link href="https://fonts.googleapis.com/css?family=Heebo:100,300,400" rel="stylesheet">
</head>

<body>

    <!-- hero section -->
    <section id="latest-property-section"
        style="background: url('./images/hero.jpg'); background-position: center; background-size: cover">

        <div class="container h-100">

            <nav class="navbar navbar-expand-lg navbar-light bg-transparent">
                <a class="navbar-brand text-white" href="#">LOGO</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse"
                    data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                    aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item active">
                            <a class="nav-link text-white" href="#">Home <span class="sr-only">(current)</span></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-white" href="#">About Us</a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link text-white dropdown-toggle" href="#" id="navbarDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Properties
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="#">prices</a>
                                <a class="dropdown-item" href="./latest-properties.html">Locations</a>
                                <a class="dropdown-item" href="./luxury-properties.html">Luxury Properties</a>
                            </div>

                        <li class="nav-item">
                            <a class="nav-link text-white" href="#">Blog</a>
                        </li>
                        </li>
                    </ul>
                </div>
            </nav>

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
            <div class="row">
                <div class="col-md-10">
                    <div class="row">

                        <div class="col-md-3 border-right">
                            <div class="form-group">
                                <label for="location">Location</label>
                                <select class="form-control" id="location">
                                    <option>1</option>
                                    <option>2</option>
                                    <option>3</option>
                                    <option>4</option>
                                    <option>5</option>
                                </select>
                            </div>
                        </div>

                        <div class="col-md-3 border-right">
                            <div class="form-group">
                                <label for="type" class="w-100 text-center">Type</label>
                                <select class="form-control" id="type">
                                    <option>1</option>
                                    <option>2</option>
                                    <option>3</option>
                                    <option>4</option>
                                    <option>5</option>
                                </select>
                            </div>
                        </div>

                        <div class="col-md-3 border-right">
                            <div class="form-group">
                                <label for="price" class="w-100 text-center">PRICE RANGE</label>
                                <select class="form-control" id="price">
                                    <option>1</option>
                                    <option>2</option>
                                    <option>3</option>
                                    <option>4</option>
                                    <option>5</option>
                                </select>
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="bed" class="w-100 text-center">BEDROOM/BATHROOM</label>
                                <div class="d-inline-flex w-100">
                                    <select class="form-control" id="bed">
                                        <option>1</option>
                                        <option>2</option>
                                        <option>3</option>
                                        <option>4</option>
                                        <option>5</option>
                                    </select>

                                    <select class="form-control" id="bath">
                                        <option>1</option>
                                        <option>2</option>
                                        <option>3</option>
                                        <option>4</option>
                                        <option>5</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-2 text-md-right my-auto">
                    <button class="btn btn-blue px-4">SEARCH</button>
                </div>
            </div>
        </div>

        <div class="container pt-5 mb-5">
            <!-- latest Properties for rent -->
            <h4 class="text-secondary font-weight-bold">LATEST PROPERTIES FOR <span style="color: #96afce;">RENT</span>
            </h4>

            <hr>

            <div class="row mt-5">
                <div class="col-md-4 mb-md-0 mb-5">
                    <div class="card latest-prop-card">
                        <div class="card-header p-0">
                            <img src="./images/prop1.png" class="img-fluid" alt="">
                        </div>

                        <div class="card-body">
                            <h5>Johnstone Estate</h5>

                            <p class="text-secondary">Apartment</p>

                            <p class="small text-secondary">Flat 3, Agungi Street, Victoria Island</p>

                            <p class="orange-text">#1,500,000.00</p>

                        </div>

                        <div class="card-footer bg-white">
                            <p class="text-secondary">1 Beds  2 Baths</p>
                        </div>
                    </div>
                </div>

                <div class="col-md-4 mb-md-0 mb-5">
                    <div class="card latest-prop-card">
                        <div class="card-header p-0">
                            <img src="./images/prop1.png" class="img-fluid" alt="">
                        </div>

                        <div class="card-body">
                            <h5>Johnstone Estate</h5>

                            <p class="text-secondary">Apartment</p>

                            <p class="small text-secondary">Flat 3, Agungi Street, Victoria Island</p>

                            <p class="orange-text">#1,500,000.00</p>

                        </div>

                        <div class="card-footer bg-white">
                            <p class="text-secondary">1 Beds  2 Baths</p>
                        </div>
                    </div>
                </div>

                <div class="col-md-4 mb-md-0 mb-5">
                    <div class="card latest-prop-card">
                        <div class="card-header p-0">
                            <img src="./images/prop1.png" class="img-fluid" alt="">
                        </div>

                        <div class="card-body">
                            <h5>Johnstone Estate</h5>

                            <p class="text-secondary">Apartment</p>

                            <p class="small text-secondary">Flat 3, Agungi Street, Victoria Island</p>

                            <p class="orange-text">#1,500,000.00</p>

                        </div>

                        <div class="card-footer bg-white">
                            <p class="text-secondary">1 Beds  2 Baths</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row mt-5">
                <div class="col-md-4 mb-md-0 mb-5">
                    <div class="card latest-prop-card">
                        <div class="card-header p-0">
                            <img src="./images/prop1.png" class="img-fluid" alt="">
                        </div>

                        <div class="card-body">
                            <h5>Johnstone Estate</h5>

                            <p class="text-secondary">Apartment</p>

                            <p class="small text-secondary">Flat 3, Agungi Street, Victoria Island</p>

                            <p class="orange-text">#1,500,000.00</p>

                        </div>

                        <div class="card-footer bg-white">
                            <p class="text-secondary">1 Beds  2 Baths</p>
                        </div>
                    </div>
                </div>

                <div class="col-md-4 mb-md-0 mb-5">
                    <div class="card latest-prop-card">
                        <div class="card-header p-0">
                            <img src="./images/prop1.png" class="img-fluid" alt="">
                        </div>

                        <div class="card-body">
                            <h5>Johnstone Estate</h5>

                            <p class="text-secondary">Apartment</p>

                            <p class="small text-secondary">Flat 3, Agungi Street, Victoria Island</p>

                            <p class="orange-text">#1,500,000.00</p>

                        </div>

                        <div class="card-footer bg-white">
                            <p class="text-secondary">1 Beds  2 Baths</p>
                        </div>
                    </div>
                </div>

                <div class="col-md-4 mb-md-0 mb-5">
                    <div class="card latest-prop-card">
                        <div class="card-header p-0">
                            <img src="./images/prop1.png" class="img-fluid" alt="">
                        </div>

                        <div class="card-body">
                            <h5>Johnstone Estate</h5>

                            <p class="text-secondary">Apartment</p>

                            <p class="small text-secondary">Flat 3, Agungi Street, Victoria Island</p>

                            <p class="orange-text">#1,500,000.00</p>

                        </div>

                        <div class="card-footer bg-white">
                            <p class="text-secondary">1 Beds  2 Baths</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div  style="background: #344c6d; height: 20vh;"></div>

        <div class="container pt-5 mb-5">
            <!-- latest Properties for rent -->
            <h4 class="text-secondary font-weight-bold">LATEST PROPERTIES FOR <span style="color: #96afce;">SALE</span>
            </h4>

            <hr>

            <div class="row mt-5">
                <div class="col-md-4 mb-md-0 mb-5">
                    <div class="card latest-prop-card">
                        <div class="card-header p-0">
                            <img src="./images/prop1.png" class="img-fluid" alt="">
                        </div>

                        <div class="card-body">
                            <h5>Johnstone Estate</h5>

                            <p class="text-secondary">Apartment</p>

                            <p class="small text-secondary">Flat 3, Agungi Street, Victoria Island</p>

                            <p class="orange-text">#1,500,000.00</p>

                        </div>

                        <div class="card-footer bg-white">
                            <p class="text-secondary">1 Beds  2 Baths</p>
                        </div>
                    </div>
                </div>

                <div class="col-md-4 mb-md-0 mb-5">
                    <div class="card latest-prop-card">
                        <div class="card-header p-0">
                            <img src="./images/prop1.png" class="img-fluid" alt="">
                        </div>

                        <div class="card-body">
                            <h5>Johnstone Estate</h5>

                            <p class="text-secondary">Apartment</p>

                            <p class="small text-secondary">Flat 3, Agungi Street, Victoria Island</p>

                            <p class="orange-text">#1,500,000.00</p>

                        </div>

                        <div class="card-footer bg-white">
                            <p class="text-secondary">1 Beds  2 Baths</p>
                        </div>
                    </div>
                </div>

                <div class="col-md-4 mb-md-0 mb-5">
                    <div class="card latest-prop-card">
                        <div class="card-header p-0">
                            <img src="./images/prop1.png" class="img-fluid" alt="">
                        </div>

                        <div class="card-body">
                            <h5>Johnstone Estate</h5>

                            <p class="text-secondary">Apartment</p>

                            <p class="small text-secondary">Flat 3, Agungi Street, Victoria Island</p>

                            <p class="orange-text">#1,500,000.00</p>

                        </div>

                        <div class="card-footer bg-white">
                            <p class="text-secondary">1 Beds  2 Baths</p>
                        </div>
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

    <footer>
        <div class="container py-5">
            <div class="row">
                <div class="col-md-9">
                    <div class="row">
                        <div class="col-md-4 footer-text">
                            <img src="" alt="Logo" class="img-fluid mb-4">
                            <p>From a younf age, I have always had a passion for Real Estates, shelter is a primary need
                                for
                                human existence.</p>

                            <p>With our vision to dominate the Real Estate industry Worldwide, starting from home -
                                Nigeria.</p>

                            <p>We are on a path to making a home available to all.</p>

                            <p class="mb-1">Chris Olekamma</p>
                            <p class="mb-0">C.E.O/Founder</p>
                        </div>
                        <div class="col-md-4 mt-md-0 mt-4 footer-text">
                            <h5 class="text-white font-weight-normal mb-4">LATEST NEWS</h5>

                            <div>
                                <p>OLEKS opens new branch in AJAH</p>
                                <p>January-17-2020</p>

                                <hr>
                            </div>

                            <div>
                                <p>OLEKS opens new branch in AJAH</p>
                                <p>January-17-2020</p>

                                <hr>
                            </div>

                            <div>
                                <p>OLEKS opens new branch in AJAH</p>
                                <p>January-17-2020</p>

                                <hr>
                            </div>
                        </div>
                        <div class="col-md-4 mt-md-0 mt-4 footer-text">
                            <h5 class="text-white font-weight-normal  mb-4">RECENT LOCATIONS</h4>

                                <p>AJAH</p>

                                <P>LEKKI</P>

                                <P>OKOMAIKO</P>

                                <P>FESTAC</P>

                                <P>EPE</P>

                                <P>VICTORIA ISLAND</P>
                        </div>
                    </div>

                    <div class="col-md-8 px-0 my-4">
                        <div class="hr"></div>
                    </div>

                    <p class="footer-text">
                        Copyright © All rights reserved
                    </p>
                </div>

                <div class="col-md-3">
                    <div class="row">
                        <div class="col-md-12 mt-md-0 mt-4">
                            <h5 class="text-white font-weight-normal  mb-4">CONTACT</h4>

                                <form>
                                    <div class="form-group">
                                        <input type="text" placeholder="NAME" class="form-control footer-input">
                                    </div>

                                    <div class="form-group">
                                        <input type="text" placeholder="EMAIL" class="form-control footer-input">
                                    </div>

                                    <div class="form-group">
                                        <textarea placeholder="COMMENT" name="comment" cols="30" rows="10"
                                            class="form-control footer-input footer-text-area"></textarea>
                                    </div>

                                    <button
                                        class="btn footer-contact-btn border-top-left-radius w-100 border-bottom-right-radius">SEND
                                        MESSAGE</button>

                                </form>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </footer>

    <script src="js/jquery-3.2.1.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/custom.js"></script>
</body>

</html>