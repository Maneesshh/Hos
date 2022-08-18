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
                <h1 class="mt-4 text-center">Patients log</h1>
                <br>
            </div>
            <div class="container-fluid w-xl-75">
                <table class="table table-bordered table-striped table-hover">
                    <thead class="thead-dark">
                        <tr>
                            <th scope="col" class="text-center">Sn</th>
                            <th scope="col" class="text-center">ID</th>
                            <th scope="col" class="text-center">Login Time</th>
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
                                <td class="text-center"><?php echo $sn; ?></td>
                                <td class="text-center"><?php echo $row['pid']; ?></td>
                                <td class="text-center"><?php echo $row['loginTime']; ?></td>
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