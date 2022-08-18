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
        <h1 class="mt-4 text-center">Your Reports</h1>
      </div>
      <div class="container-fluid w-xl-75">
        <table class="table table-bordered table-striped table-hover table-responsive-sm">
          <thead class="thead-dark">
            <tr>
              <th scope="col" class="text-center">#</th>
              <th scope="col" class="text-center">Checked By</th>
              <th scope="col" class="text-center">Checked On</th>
              <th scope="col" class="text-center">Problem</th>
              <th scope="col" class="text-center">Report (Click to enlarge)</th>
            </tr>
          </thead>
          <tbody>
            <?php
            $sn = 1;
            foreach ($result as $row) {
            ?>
              <tr>
                <td class="text-center"> <?php echo $sn; ?> </td>
                <td class="text-center"> <?php echo $row['dname']; ?> </td>
                <td class="text-center"> <?php echo $row['date']; ?> </td>
                <td class="text-center"> <?php echo $row['problem']; ?> </td>
                <td class="text-center"><img id="img<?php echo $sn; ?>" class="img-fluid rounded" height="150" width="150" src="<?php echo $row['report']; ?>"></td>
                <script>
                  let img<?php echo $sn; ?> = document.getElementById("img<?php echo $sn; ?>");
                  img<?php echo $sn; ?>.addEventListener("click", (e) => {
                    $('#img<?php echo $sn;?>').modal();
                  });
                </script>
                <!-- <button class="btn btn-primary" data-toggle="modal" data-target="#report<?php echo $row['pid']; ?>">Report</button> -->
                <div class="modal fade" id="img<?php echo $sn; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                  <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title text-center" id="exampleModalLongTitle">Checked by <?php echo $row['dname'];?> on <?php echo $row['date']; ?></h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <div class="modal-body">
                      <img class="img-fluid rounded" src="<?php echo $row['report']; ?>"><br>
                      <hr width="75%"><div class="text-center" ><?php echo $row['problem']; ?></div><hr width="75%">
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                      </div>
                    </div>
                  </div>
                </div>
              </tr>
            <?php $sn++;
            }
            ?>
          </tbody>
        </table>
      </div>
    </main>
    <?php
    require_once 'views/shared/userFooter.php';
    ?>
  </div>
  </div>
  </body>

</html>