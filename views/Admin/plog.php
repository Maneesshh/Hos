<!DOCTYPE html>
<html lang="en">

<head>
    <?php
    require_once "views/shared/adminlink.php";
    require_once "views/Admin/shared/adminSideNav.php";
    ?>
    <div id="layoutSidenav_content">
        <main>
            <div class="container-fluid">
                <div class="container-fluid"></div>
                <h1 class="mt-4 text-center">Patients log</h1>
                <br>
            </div>
            <div class="container-fluid d-flex justify-content-end mb-2 mt-1">
                <button class="btn btn-danger btn-sm" onclick="if(confirm('Are you sure?')){
                                        location.href= 'admin/deletePatientLog';
                                    }">Delete All</button>
            </div>
            <div class="container-fluid w-xl-75">
                <table class="table table-bordered table-striped table-hover">
                    <thead class="thead-dark">
                        <tr>
                            <th scope="col" class="text-center">Sn</th>
                            <th scope="col" class="text-center">ID</th>
                            <th scope="col" class="text-center">Patient</th>
                            <th scope="col" class="text-center">Login Time</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $sn = 1;
                        $numRows = mysqli_num_rows($result);
                        $mydetails = $result->fetch_assoc();
                        if ($numRows == 0) {
                            echo "<tr>
                            <td colspan='4' class='text-center h4'>No Records Found</td>
                        </tr>";
                        } else {
                            foreach ($result as $row) {
                        ?>
                                <tr>
                                    <td class="text-center"><?php echo $sn; ?></td>
                                    <td class="text-center"><?php echo $row['pid']; ?></td>
                                    <td class="text-center"><?php $data = $this->AdminModelObj->getPatientNameById($row['pid']);
                                                            echo $data['pname']; ?></td>
                                    <td class="text-center"><?php echo $row['loginTime']; ?></td>
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