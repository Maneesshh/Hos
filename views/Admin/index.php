<!DOCTYPE html>
<html lang="en">

<head>
    <style>
        .card-stats {
            box-shadow: 0 8px 8px -4px black;
        }
    </style>
    <?php
    require_once "views/shared/adminlink.php";
    require_once "views/Admin/shared/adminSideNav.php";
    ?>
    <div id="layoutSidenav_content">
        <main>
            <div class="container-fluid">
                <div class="container-fluid"></div>
                <h1 class="mt-4 text-center">Welcome <code>
                        <?php
                        $name = explode(" ", $this->admin['aname']);
                        echo $name[0];
                        ?></code></h1>
                <br>
                <div class="container-fluid mt-lg-3">
                    <div class="row justify-content-center my-md-3 mb-sm-3">
                        <div class="col-lg-4 d-flex justify-content-center mb-2">
                            <div class="card card-stats card-warning w-75 bg-info ">
                                <div class="card-body ">
                                    <div class="row">
                                        <div class="col-5">
                                            <div class="icon-big text-center h1 my-3">
                                                <i class="fas fa-user text-white"></i>
                                            </div>
                                        </div>
                                        <div class="col-7 d-flex align-items-center">
                                            <div class="numbers">
                                                <p class="card-category text-white h3">Admin</p>
                                                <h5 class="card-title text-center text-white">
                                                    <?php echo $this->AdminModelObj->adminCount()['number']; ?></h5>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
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
                                                    <?php echo $this->AdminModelObj->doctorCount()['number']; ?></h5>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <div class="col-lg-4 d-flex justify-content-center  mb-2">
                            <div class="card card-stats card-warning w-75" style="background-color: teal;">
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
                                                    <?php echo $this->AdminModelObj->patientCount()['number']; ?></h5>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row justify-content-center my-md-3 mb-sm-3">
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
                                                    <?php echo $this->AdminModelObj->maleCount()['male'];
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
                                                    <?php echo $this->AdminModelObj->femaleCount()['female'];
                                                    ?></h5>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <div class="col-lg-4 d-flex justify-content-center  mb-2">
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
                                                    <?php echo $this->AdminModelObj->otherCount()['other'];
                                                    ?></h5>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row justify-content-center my-md-3 mb-sm-3">
                        <div class="col-lg-4 d-flex justify-content-center mb-2">
                            <div class="card card-stats card-warning w-75 bg-dark">
                                <div class="card-body ">
                                    <div class="row">
                                        <div class="col-5 mr-0">
                                            <div class="icon-big text-center h1 my-3">
                                                <i class="far fa-calendar-check text-white"></i>
                                            </div>
                                        </div>
                                        <div class="col-7 d-flex align-items-center">
                                            <div class="numbers">
                                                <p class="card-category text-white h5">Appointments</p>
                                                <h4 class="card-title text-center text-white">
                                                    <?php echo $this->AdminModelObj->totalAppointmentCount()['number']; ?></h4>
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
                                        <div class="col-5 ">
                                            <div class="icon-big text-center h1 my-3">
                                                <i class="fas fa-user-md text-light"></i>
                                            </div>
                                        </div>
                                        <div class="col-7 d-flex align-items-center">
                                            <div class="numbers">
                                                <p class="card-category text-white h3">Checked</p>
                                                <h5 class="card-title text-center text-white">
                                                    <?php echo $this->AdminModelObj->checkedAppointmentCount()['number']; ?></h5>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 d-flex justify-content-center mb-2">
                            <div class="card card-stats card-warning w-75 bg-danger">
                                <div class="card-body ">
                                    <div class="row">
                                        <div class="col-5">
                                            <div class="icon-big text-center h1 my-3">
                                                <i class="fas fa-users text-light"></i>
                                            </div>
                                        </div>
                                        <div class="col-7 d-flex align-items-center">
                                            <div class="numbers">
                                                <p class="card-category text-white h3">Cancelled</p>
                                                <h5 class="card-title text-center text-white">
                                                    <?php echo $this->AdminModelObj->cancelledAppointmentCount()['number']; ?></h5>
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