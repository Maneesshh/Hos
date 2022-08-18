<!DOCTYPE html>
<html lang="en">

<head>
    <style>
        .card-stats {
            box-shadow: 0 8px 8px -4px black;
        }
    </style>
    <?php
    require_once "views/shared/doctorlink.php";
    require_once 'views/Doctor/shared/doctorSideNav.php';
    ?>
    <div id="layoutSidenav_content">
        <main>
            <div class="container-fluid">
                <div class="container-fluid"></div>
                <h1 class="mt-4 text-center">Welcome <span class="h2">Dr. </span><code>
                        <?php $name = explode(" ", $this->doctor['dname']);
                        echo $name[0]; ?>
                    </code></h1>
                <br>
                <div class="container-fluid mt-lg-3">
                    <div class="row justify-content-center">
                        <div class="col-lg-4 d-flex justify-content-center mb-2">
                            <div class="card card-stats card-warning w-75 bg-primary">
                                <div class="card-body ">
                                    <div class="row">
                                        <div class="col-5">
                                            <div class="icon-big text-center h1 my-3">
                                                <i class="fas fa-user-md text-light"></i>
                                            </div>
                                        </div>
                                        <div class="col-7 d-flex align-items-center">
                                            <div class="numbers">
                                                <p class="card-category text-white h3">Doctors</p>
                                                <h5 class="card-title text-center text-white">
                                                    <?php echo $this->doctorModelObj->doctorCount()['number'];
                                                    ?></h5>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <div class="col-lg-4 d-flex justify-content-center mb-2">
                            <div class="card card-stats card-warning w-75 bg-success">
                                <div class="card-body ">
                                    <div class="row">
                                        <div class="col-5">
                                            <div class="icon-big text-center h1 my-3">
                                                <i class="fas fa-users text-light"></i>
                                            </div>
                                        </div>
                                        <div class="col-7 d-flex align-items-center">
                                            <div class="numbers">
                                                <p class="card-category text-white h3">Patients</p>
                                                <h5 class="card-title text-center text-white">
                                                    <?php echo $this->doctorModelObj->patientCount()['number'];
                                                    ?></h5>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row justify-content-center mt-md-5 my-3">
                        <div class="col-lg-4 d-flex justify-content-center mb-2">
                            <div class="card card-stats card-warning w-75 bg-secondary">
                                <div class="card-body ">
                                    <div class="row">
                                        <div class="col-5">
                                            <div class="icon-big text-center h1 my-3">
                                                <i class="fas fa-male text-light"></i>
                                            </div>
                                        </div>
                                        <div class="col-7 d-flex align-items-center">
                                            <div class="numbers">
                                                <p class="card-category text-white h3">Male</p>
                                                <h5 class="card-title text-center text-white">
                                                    <?php echo $this->doctorModelObj->maleCount()['male'];
                                                    ?></h5>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 d-flex justify-content-center mb-2">
                            <div class="card card-stats card-warning w-75 bg-secondary">
                                <div class="card-body ">
                                    <div class="row">
                                        <div class="col-5">
                                            <div class="icon-big text-center h1 my-3">
                                                <i class="fas fa-female text-light"></i>
                                            </div>
                                        </div>
                                        <div class="col-7 d-flex align-items-center">
                                            <div class="numbers">
                                                <p class="card-category text-white h3">Female</p>
                                                <h5 class="card-title text-center text-white">
                                                    <?php echo $this->doctorModelObj->femaleCount()['female'];
                                                    ?></h5>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <div class="col-lg-4 d-flex justify-content-center mb-1">
                            <div class="card card-stats card-warning w-75 bg-secondary">
                                <div class="card-body ">
                                    <div class="row">
                                        <div class="col-5">
                                            <div class="icon-big text-center h1 my-3">
                                                <i class="far fa-user text-light"></i>
                                            </div>
                                        </div>
                                        <div class="col-7 d-flex align-items-center">
                                            <div class="numbers">
                                                <p class="card-category text-white h3">Others</p>
                                                <h5 class="card-title text-center text-white">
                                                    <?php echo $this->doctorModelObj->otherCount()['other'];
                                                    ?></h5>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>

            </div>
        </main>
        <?php
        require_once 'views/shared/userFooter.php';
        ?>
    </div>
    </div>
    </body>

</html>