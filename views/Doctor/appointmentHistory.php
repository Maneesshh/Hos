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
                <h1 class="mt-4 text-center">Your Appointment History</h1>
                <br>
            </div>
            <div class="container-fluid w-xl-75">
                <table class="table table-bordered table-striped table-hover table-responsive-sm">
                    <thead class="thead-dark">
                        <tr>
                            <th scope="col" class="text-center">Sn</th>
                            <th scope="col" class="text-center">PId</th>
                            <th scope="col" class="text-center">Patient Name</th>
                            <th scope="col" class="text-center" style="width:25%">Remarks</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $sn = 1;
                        if (empty($result)) {
                            echo "<div class='alert alert-danger m-4 text-center py-4' role='alert'>
                            No Appointment Record Found.
                          </div";
                        } else {
                            foreach ($result as $row) {
                        ?>
                                <tr>
                                    <td class="text-center"><?php echo $sn; ?></td>
                                    <td class="text-center"><?php echo $row['pid']; ?></td>
                                    <td class="text-center"><?php echo $row['pname']; ?></td>
                                    <td class="text-center">
                                        <?php if ($row['status'] == 1) {
                                            echo "<span class='text-success h5'>Checked</span>";
                                        } else {
                                            echo "<span class='text-danger h5'>Cancelled</span>";
                                        } ?>
                                    </td>
                                </tr>
                        <?php $sn++;
                            }
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