<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <title>Hamro Hospital</title>
    <link href="/hospital/libraries/css/index.css" rel="stylesheet" />
</head>

<body>
    <?php
    require_once './views/shared/header.php';
    ?>
    <main role="main">
        <!-- Jumbotron -->
        <div id="mybg" class="container-fluid d-flex flex-column justify-content-center vh-100 align-items-center bg-light">
            <div class="jumbotron jumbotron-fluid bg-transparent mb-0 mt-2">
                <div class="container text-center">
                    <h1 id="hh" class="display-3 mt-3 myhh">Hamro Hospital</h1>
                    <p class="lead display-5">We care about your health.</p>

                </div>
            </div>
            <div id="servicesRow" class="container-fluid row flex-row justify-content-center text-center">
                <div class="col-md-4 jumbotronblock">
                    <h6>24x7 Health Care</h6>
                    <img src="./images/icons/theart.gif" />
                </div>
                <div class="col-md-4 jumbotronblock">
                    <h6>Experienced Doctors</h6>
                    <img src="./images/icons/tdoc.gif" />
                </div>
                <div class="col-md-4 jumbotronblock">
                    <h6>Modern Technologies</h6>
                    <img class="mt-3" src="./images/icons/tline.gif" />
                </div>
            </div>
        </div>


        <!-- Carousel -->
        <div id="myCarousel" class="carousel slide carousel-fade" data-ride="carousel">
            <ol class="carousel-indicators">
                <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                <li data-target="#myCarousel" data-slide-to="1"></li>
                <li data-target="#myCarousel" data-slide-to="2"></li>
            </ol>
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img class="bd-placeholder-img" width="100%" height="100%" src="./images/carousel/1.jpg" />
                    <rect width="100%" height="100%" fill="#777" />

                    <div class="container">
                        <div class="carousel-caption text-center">
                            <h1>Best Class Surgeons.</h1>
                            <p>We've got the best class surgeons in the city.</p>
                        </div>
                    </div>
                </div>
                <div class="carousel-item">
                    <img class="bd-placeholder-img" width="100%" height="100%" src="./images/carousel/2.jpg" />
                    <rect width="100%" height="100%" fill="#777" />

                    <div class="container">
                        <div class="carousel-caption">
                            <h1>Well Trained Staff.</h1>
                            <p>All our staffs are best at their work.</p>
                        </div>
                    </div>
                </div>
                <div class="carousel-item">
                    <img class="bd-placeholder-img" width="100%" height="100%" src="./images/carousel/3.jpg" />
                    <rect width="100%" height="100%" fill="#777" />

                    <div class="container">
                        <div class="carousel-caption text-center">
                            <h1>Modern Medical Equipments.</h1>
                            <p>We've got the best of class equipments.</p>
                        </div>
                    </div>
                </div>
            </div>
            <a class="carousel-control-prev" href="#myCarousel" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#myCarousel" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>

        <!-- Gallery -->
        <div class="container-fluid">
            <h1 class="font-weight-light text-center mt-4 mb-4">
                Hospital Gallery
            </h1>

            <div class="row text-center text-lg-left">
                <div class="col-lg-4 col-md-4 col-6">
                    <span class="d-block mb-4 h-100">
                        <img class="img-fluid img-thumbnail galleryimg" src="./images/gallery/0.jpg" alt="" />
                    </span>
                </div>
                <div class="col-lg-4 col-md-4 col-6">
                    <span class="d-block mb-4 h-100">
                        <img class="img-fluid img-thumbnail galleryimg" src="./images/gallery/1.jpg" alt="" />
                    </span>
                </div>
                <div class="col-lg-4 col-md-4 col-6">
                    <span class="d-block mb-4 h-100">
                        <img class="img-fluid img-thumbnail galleryimg" src="./images/gallery/2.jpg" alt="" />
                    </span>
                </div>
                <div class="col-lg-4 col-md-4 col-6">
                    <span class="d-block mb-4 h-100">
                        <img class="img-fluid img-thumbnail galleryimg" src="./images/gallery/3.jpg" alt="" />
                    </span>
                </div>
                <div class="col-lg-4 col-md-4 col-6">
                    <span class="d-block mb-4 h-100">
                        <img class="img-fluid img-thumbnail galleryimg" src="./images/gallery/4.jpg" alt="" />
                    </span>
                </div>
                <div class="col-lg-4 col-md-4 col-6">
                    <span class="d-block mb-4 h-100">
                        <img class="img-fluid img-thumbnail galleryimg" src="./images/gallery/5.jpg" alt="" />
                    </span>
                </div>
            </div>
        </div>

        <!-- Docs -->
        <div class="container mycontainer">
            <h1 class="font-weight-light text-center mt-4 mb-3">Our Doctor's</h1>
            <div class="row my-md-5">
                <?php
                $count = 1;
                foreach ($docDetails as $row) {
                ?>
                    <div class="col-lg-4 mydocs">
                        <img class="bd-placeholder-img rounded-circle" width="140" height="140" src="<?php echo $row['dimage']; ?>" />
                        <rect width="100%" height="100%" fill="#777" />
                        <h2><?php echo "Dr. " . $row['dname']; ?></h2>
                        <span><?php echo $row['dspeciality']; ?></span>
                        <p>
                            <?php echo $row['ddescription']; ?>
                        </p>
                    </div>
                <?php } ?>
            </div>
        </div>
    </main>
    <?php
    require_once './views/shared/footer.php';
    ?>

</body>

</html>