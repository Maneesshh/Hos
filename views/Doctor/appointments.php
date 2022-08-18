<!DOCTYPE html>
<html lang="en">

<head>
    <?php
    require_once "views/shared/doctorlink.php";
    require_once 'views/Doctor/shared/doctorSideNav.php';
    ?>
    <div id="layoutSidenav_content">
        <main>
            <div class="container-fluid">
                <div class="container-fluid"></div>
                <h1 class="mt-4 text-center">Your Appointments</h1>
                <br>
            </div>
            <div class="container-fluid w-xl-75">
                <table class="table table-bordered table-striped table-hover table-responsive-sm">
                    <thead class="thead-dark">
                        <tr>
                            <th scope="col" class="text-center">Sn</th>
                            <th scope="col" class="text-center">PId</th>
                            <th scope="col" class="text-center">Patient Name</th>
                            <th scope="col" class="text-center" style="width:25%">Operation</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $sn = 1;
                        $numRows = mysqli_num_rows($result);
                        $mydetails = $result->fetch_assoc();
                        foreach ($result as $row) {
                        ?>
                            <tr>
                                <td class="text-center align-middle"><?php echo $sn; ?></td>
                                <td class="text-center align-middle"><?php echo $row['pid']; ?></td>
                                <td class="text-center align-middle"><?php echo $row['pname']; ?></td>
                                <td class="text-center">
                                    <button class="btn btn-success mb-1" data-toggle="modal" data-target="#patient<?php echo $row['pid']; ?>">Check</button>
                                    <a onclick="if(confirm('Are you sure you want to cancel?')){href='doctor/cancelPatientAppointment?appointment=<?php echo $row['app-ID'] ?>'}"><button class="btn btn-danger  mb-1">Cancel</button></a>
                                    <!-- Modal -->
                                    <div class="modal fade" id="patient<?php echo $row['pid']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered" role="document">
                                            <div class="modal-content">
                                                <form action="doctor/updatePatientReport?appointment=<?php echo $row['app-ID'] ?>&pemail=<?php echo $row['pemail']; ?>" method="POST" enctype="multipart/form-data">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLongTitle">Please upload <?php echo $row['pname']; ?>'s report</h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <!-- <div class="row my-3">
                                                            <div class="col text-center form-group">
                                                                <input type="file" class="form-control-file" id="photo" name="photo" accept=".png , .jpeg , .jpg" required="" />
                                                            </div>
                                                        </div> -->
                                                        <div class="row">
                                                            <div class="col">
                                                                <div class="form-group">
                                                                    <label for="problem">Problem :</label>
                                                                    <textarea type="text" rows="3" class="form-control" name="problem" id="problem" required="" placeholder="Patient Problem Description" required></textarea>
                                                                    <div class="invalid-feedback">Please enter a valid email ending with "
                                                                        @admin.com ".
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col">
                                                                <div class="form-group">
                                                                    <label for="email">Scanned Report:</label>
                                                                    <input type="file" class="form-control-file" id="photo" name="photo" accept=".png , .jpeg , .jpg" required />
                                                                </div>
                                                            </div>
                                                        </div>

                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                                        <input type="submit" class="btn btn-success" value="Upload">
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>

                                </td>
                            </tr>
                        <?php $sn++;
                        }
                        ?>
                    </tbody>
                </table>
            </div>
            <?php ?>


        </main>
        <?php
        require_once 'views/shared/userFooter.php';
        ?>
    </div>
    </div>
    </body>

</html>


<!--                                <div class="row">
                                        <div class="col-12">
                                            <form action=""> <input type="file" class="form-control-file"></form>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-6"><a href="#" class="btn btn-success">Checked</a></div>
                                        <div class="col-6"><a href="#" class="btn btn-danger">Cancel</a></div>
                                    </div> -->