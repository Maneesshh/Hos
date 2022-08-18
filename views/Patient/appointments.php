<!DOCTYPE html>
<html lang="en">

<head>
    <?php
    require_once "views/shared/patientlink.php";
    require_once 'views/Patient/shared/patientSideNav.php';
    ?>
    <div id="layoutSidenav_content">
        <main>
            <div class="container-fluid">
                <div class="container-fluid"></div>
                <h1 class="mt-4 text-center">Doctors Appointment</h1>
                <br>
            </div>
            <?php
            $sn = 1;
            if (empty($docList)) {
                echo "<div class='alert alert-danger m-4 text-center py-4' role='alert'>
                No Appointment Record Found.
              </div";
            } else {
                foreach ($docList as $list) {
            ?>
                    <div class="container-fluid w-xl-75 mb-5">
                        <script></script>
                        <div class="text-center h3"><span style="color: #343a40"><?php echo $list['dname'] ?></span></div>
                        <table class="table table-bordered table-striped table-hover">
                            <thead style="background-color:#343a40;">
                                <tr>
                                    <th scope="col" class="text-center text-light">Sn</th>
                                    <th scope="col" class="text-center text-light">P-Id</th>
                                    <th scope="col" class="text-center text-light">Patient Name</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $sn = 1;
                                $id = $list['did'];
                                $result = $this->patientModelObj->getDynamicAppointment($id);
                                foreach ($result as $row) {
                                ?>
                                    <tr>
                                        <td class="text-center"><?php echo $sn; ?></td>
                                        <td class="text-center"><?php echo $row['pid']; ?></td>
                                        <td class="text-center"><?php echo $row['pname']; ?></td>
                                    </tr>
                                <?php $sn++;
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                    <script>
                    </script>
            <?php $sn++;
                }
            }
            ?>
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