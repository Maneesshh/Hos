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
                <h1 class="mt-4 text-center">Contact Queries</h1>
                <br>
            </div>
            <div class="container-fluid d-flex justify-content-end mb-2 mt-1">
                <button class="btn btn-danger btn-sm" onclick="if(confirm('Are you sure?')){
                                        location.href= 'admin/deleteAllQuery';
                                    }">Delete All</button>
            </div>
            <div class="container-fluid w-100">
                <table class="table table-bordered table-striped table-hover table-responsive-sm">
                    <thead class="bg-secondary text-light">
                        <tr>
                            <th scope="col" class="text-center">SN</th>
                            <th scope="col" class="text-center">Name</th>
                            <th scope="col" class="text-center">Email</th>
                            <th scope="col" class="text-center">Message</th>
                            <th scope="col" class="text-center">Action </th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $sn = 1;
                        if (mysqli_num_rows($result) == 0) {
                        ?>
                            <tr>
                                <td colspan="5" class="text-center">No Records</td>
                            </tr>
                            <?php
                        } else {
                            foreach ($result as $details) { ?>
                                <tr>
                                    <td class="text-center"><?php echo $sn; ?></td>
                                    <td class="text-center"><?php echo $details['cname']; ?></td>
                                    <td class="text-center"><?php echo $details['cemail']; ?></td>
                                    <td class="text-center"><?php echo $details['cmessage']; ?></td>
                                    <td class="text-center"><button class="btn btn-danger btn-md" onclick="if(confirm('Are you sure?')){
                                        location.href= 'admin/deleteQuery?id=<?php echo $details['cid']; ?>';
                                    }">Delete</button></td>
                                </tr>
                        <?php
                                $sn++;
                            }
                        } ?>
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