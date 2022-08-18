<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <title>About</title>
    <style>
        .mycard:not(:hover) {
            transition: 0.3s;
        }

        .mycard:hover {
            background-color: #cacaca70;
            box-shadow: 1rem 1rem 10rem;
            transform: scale(1.06);
            transition: 0.3s;
        }
    </style>
</head>

<body>
    <?php
    require_once './views/shared/header.php';
    ?>
    <main>
        <div class="container-fluid" style="height: 14rem">
            <div class="jumbotron jumbotron-fluid mb-0 bg-light">
                <span class="container text-center">
                    <h1 class="display-4 mb-0">Hamro Hospital</h1>
                </span>
            </div>
        </div>
        <div class="bg-light py-2">
            <div class="container py-2">
                <div class="row mb-4">
                    <div class="col">
                        <h2 class="font-weight-lighter text-center">Designed By</h2>
                        <!-- <p class="font-weight-light text-center">Student's of MMC</p> -->
                    </div>
                </div>

                <div class="row text-center">
                    <!-- Team item-->
                    <div class="col-sm-6 mb-3">
                        <div class=" rounded shadow-sm py-5 px-4 mycard ">
                            <img width="150" src="images/about/dipesh.jpg" width="100" class="img-fluid rounded-circle mb-3 img-thumbnail shadow-sm" />
                            <h5 class="mb-0">Dipesh Gupta</h5>
                            <span class="small text-uppercase text-muted">BCA 4th sem</span>
                            <ul class="social mb-0 list-inline mt-2">
                                <li class="list-inline-item">
                                    <a href="#" class="social-link"><img height="15" src="images/icons/fb.png" /></a>
                                </li>
                                <li class="list-inline-item">
                                    <a href="#" class="social-link"><img height="15" src="images/icons/google.png" /></a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <!-- End-->
                    <div class="col-sm-6 mb-5">
                        <div class=" rounded shadow-sm py-5 px-4 mycard">
                            <img width="115" src="images/about/manish.jpeg" width="100" class="img-fluid rounded-circle mb-3 img-thumbnail shadow-sm" />
                            <h5 class="mb-0">Manish Bhattarai</h5>
                            <span class="small text-uppercase text-muted">BCA 4th sem</span>
                            <ul class="social mb-0 list-inline mt-2">
                                <li class="list-inline-item">
                                    <a href="#" class="social-link"><img height="15" src="images/icons/fb.png" /></a>
                                </li>
                                <li class="list-inline-item">
                                    <a href="#" class="social-link"><img height="15" src="images/icons/google.png" /></a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <!-- End-->
                </div>
            </div>
        </div>

        <div class="bg-light py-2">
            <div class="container py-2">
                <div class="row mb-4">
                    <div class="col">
                        <h2 class="font-weight-lighter text-center">Our Mentor's</h2>
                        <p class="font-weight-light text-center">We thank our mentor's for guiding and teaching us. </p>
                    </div>
                </div>

                <div class="row text-center">
                    <!-- Team item-->
                    <div class="col-sm-4 mb-3">
                        <div class=" mycard  rounded shadow-sm py-5 px-4">
                            <img width="125" src="images/about/krishnasir.jpg" width="100" class="img-fluid rounded-circle mb-3 img-thumbnail shadow-sm" />
                            <h5 class="mb-0">Krishna P. Acharya</h5>
                            <span class="small text-uppercase text-muted">D BCA<br> MMC</span>
                            <ul class="social mb-0 list-inline mt-2">
                                <li class="list-inline-item">
                                    <a href="#" class="social-link"><img height="15" src="images/icons/fb.png" /></a>
                                </li>
                                <li class="list-inline-item">
                                    <a href="#" class="social-link"><img height="15" src="images/icons/google.png" /></a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <!-- End-->
                    <!-- Team item-->
                    <div class="col-sm-4 mb-3">
                        <div class=" mycard  rounded shadow-sm py-5 px-4">
                            <img width="125" src="images/about/sunilsir.jpg" width="100" class="img-fluid rounded-circle mb-3 img-thumbnail shadow-sm" />
                            <h5 class="mb-0">Sunil Sharma</h5>
                            <span class="small text-uppercase text-muted">DD BCA <br>MMC</span>
                            <ul class="social mb-0 list-inline mt-2">
                                <li class="list-inline-item">
                                    <a href="#" class="social-link"><img height="15" src="images/icons/fb.png" /></a>
                                </li>
                                <li class="list-inline-item">
                                    <a href="#" class="social-link"><img height="15" src="images/icons/google.png" /></a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <!-- End-->
                    <div class="col-sm-4 mb-5">
                        <div class=" mycard  rounded shadow-sm py-5 px-4">
                            <img width="125" src="images/about/rajusir.jpg" width="100" class="img-fluid rounded-circle mb-3 img-thumbnail shadow-sm" />
                            <h5 class="mb-0">Raju Poudyal</h5>
                            <span class="small text-uppercase text-muted">Supervisor <br>MMC</span>
                            <ul class="social mb-0 list-inline mt-2">
                                <li class="list-inline-item">
                                    <a href="#" class="social-link"><img height="15" src="images/icons/fb.png" /></a>
                                </li>
                                <li class="list-inline-item">
                                    <a href="#" class="social-link"><img height="15" src="images/icons/google.png" /></a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <!-- End-->
                </div>
            </div>
        </div>
    </main>
    <?php
    require './views/shared/footer.php';
    ?>

</body>

</html>