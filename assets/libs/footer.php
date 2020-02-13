<footer>
        <div class="container py-5">
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
                    <!-- <div class="col-md-4 mt-md-0 mt-4 footer-text">
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
                    </div> -->
                    <div class="col-md-3 mt-md-0 mt-4 footer-text">
                        <h5 class="text-white font-weight-normal  mb-4">RECENT LOCATIONS</h4>
                        <?php 
                            $i=0; foreach ($valid_states as $key => $value) {
                                if ($i < 6) {
                        ?>
                        <p><?= $value; ?></p>

                        <?php $i++; }}; ?>
                    </div>
                    <div class="col-md-5">
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
                <div class="row">
                    <div class="col-md-812 px-0 my-4">
                        <div class="hr"></div>
                    </div>
                </div>
                <div class="row">
                    <p class="footer-text">
                        Copyright © <script>document.write(new Date().getFullYear())</script> All rights reserved
                    </p>
                </div>
            </div>
        </div>
    </footer>

    <script src="assets/oleks/js/jquery-3.2.1.min.js"></script>
    <script src="assets/oleks/js/popper.min.js"></script>
    <script src="assets/oleks/js/bootstrap.min.js"></script>
    <script src="assets/oleks/js/custom.js"></script>
    <script src="assets/js/pagination.js"></script>