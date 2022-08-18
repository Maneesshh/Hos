<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <title>Notice</title>
    <style>
        #content {
            max-width: 25rem;
        }

        @media screen and (max-width: 1440px) {
            #content {
                width: 30%;
            }
        }

        @media screen and (max-width: 800px) {
            #content {
                width: 65%;
            }
        }
    </style>
</head>

<body>
    <?php
    require_once './views/shared/header.php';

    ?>
    <main>
        <!-- card -->
        <div class="container-fluid w-100 vh-100 d-flex align-items-center justify-content-center">
            <?php
            $forgotEmail = $_GET['forgotEmail'];
            $result = $this->DashBoardObj->getForgotUserDetail($forgotEmail);
            $rowCount = mysqli_num_rows($result);
            $result = $result->fetch_assoc();
            if ($rowCount == 1) {
            ?>
                <div class="card text-center" id="content">
                    <div class="card-header">
                        <img class="card-img-top img-fluid" src="<?php echo $result['pimage']; ?> " />
                    </div>
                    <div class=" card-body">
                        <h5 class="card-title font-weight-light"><?php echo $result['pemail']; ?></h5>
                        <p class="card-text font-weight-bold">Is this you?</p>
                        <a href="dashboard/sendMail?mailId=<?php echo $result['pemail']; ?>" class="btn btn-block btn-success mx-2">Yes</a>
                        <a href="dashboard/login" class="btn btn-block btn-danger mx-2">No</a>
                    </div>
                </div>
            <?php } else { ?>
                <div class="alert alert-warning w-75 text-center" role="alert">
                    <div class="sb-nav-link-icon">
                        <i class="fas fa-home text-light"></i>
                    </div>
                    <h4 class="alert-heading h2">Error</h4>
                    <p>The email <b>(<?php echo $forgotEmail; ?>)</b> couldn't be found in our server.</p>
                    <hr>
                    <p class="mb-0">If you want to reset your password please your proper email address.</p>
                </div>
            <?php
            } ?>

        </div>
    </main>
    <!-- Footer-->
    <?php
    require './views/shared/footer.php';
    ?>
</body>

</html>