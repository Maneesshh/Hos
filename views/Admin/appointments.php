<!DOCTYPE html>
<html lang="en">
<?php
require_once "views/shared/adminlink.php";
require_once 'views/Admin/shared/adminSideNav.php';
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
        foreach ($docList as $list) {
        ?>
            <div class="container-fluid w-xl-75 mb-5">
                <script></script>
                <div class="text-center h3"><span style="color: #343a40"><?php echo $list['dname'] ?></span></div>
                <table class="table table-bordered table-striped table-hover">
                    <thead style="background-color:#484e54ee;">
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
                        $result = $this->AdminModelObj->getDynamicAppointment($id);
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
        ?>
    </main>
    <?php
    require_once 'views/shared/userFooter.php';
    ?>
</div>
</div>
</body>

</html>