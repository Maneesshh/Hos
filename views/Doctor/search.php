<!DOCTYPE html>
<html lang="en">

<head>
  <?php
  require_once "views/shared/doctorlink.php";
  require_once "views/Doctor/shared/doctorSideNav.php";
  ?>
  <div id="layoutSidenav_content">
    <main>
      <div class="container-fluid">
        <h1 class="mt-4 text-center">Patients List</h1>
      </div>
      <form action="doctor/searchReportInfo?search=all&parameter=all" method="GET">
        <div class="container my-3">
          <div class="row">
            <div class="input-group">
              <input type="search" class="form-control rounded mx-2" placeholder="Search" aria-label="Search" aria-describedby="search-addon" id="search" name="search" />
              <input type="submit" class="btn btn-outline-primary mr-2" value="Search">
            </div>
          </div>
        </div>
        <div class="container-fluid d-flex justify-content-center px-5">
          <div class="form-check mx-3">
            <input class="form-check-input" type="radio" name="parameter" id="exampleRadios1" value="all">
            <label class="form-check-label" for="exampleRadios1">
              All
            </label>
          </div>
          <div class="form-check mx-3">
            <input class="form-check-input" type="radio" name="parameter" id="exampleRadios1" value="name" checked>
            <label class="form-check-label" for="exampleRadios1">
              Name
            </label>
          </div>
          <div class="form-check mx-3">
            <input class="form-check-input" type="radio" name="parameter" id="exampleRadios2" value="email">
            <label class="form-check-label" for="exampleRadios2">
              Email
            </label>
          </div>
          <div class="form-check mx-3">
            <input class="form-check-input" type="radio" name="parameter" id="exampleRadios2" value="number">
            <label class="form-check-label" for="exampleRadios2">
              Number
            </label>
          </div>
        </div>
      </form>

      <div class="container-fluid w-xl-75">
        <table class="table table-bordered table-striped table-hover table-responsive-sm">
          <thead class="thead-dark">
            <tr>
              <th scope="col" class="text-center">SN</th>
              <th scope="col" class="text-center">Id</th>
              <th scope="col" class="text-center">Name</th>
              <th scope="col" class="text-center">Email</th>
              <th scope="col" class="text-center">Number</th>
              <th scope="col" class="text-center" style="width:25%">View</th>
            </tr>
          </thead>
          <tbody>
            <?php
            if ($_SERVER['REQUEST_URI'] == "/hospital/Doctor/SearchReport") {
              //testing if the page is in searchPatient to avoid problem
            } else {
              $sn = 1;
              $result = $this->searchResult;
              foreach ($result as $row) {
                $fetchedReport = $this->doctorModelObj->getDynamicReport($row['pid']);
            ?>
                <tr>
                  <td class="text-center align-middle"><?php echo $sn; ?></td>
                  <td class="text-center align-middle"><?php echo $row['pid']; ?></td>
                  <td class="text-center align-middle"><?php echo $row['pname']; ?></td>
                  <td class="text-center align-middle"><?php echo $row['pemail']; ?></td>
                  <td class="text-center align-middle"><?php echo $row['pphone']; ?></td>
                  <td class="text-center">
                    <button class="btn my-0 btn-primary" data-toggle="modal" data-target="#report<?php echo $row['pid']; ?>">Report</button>
                    <div class="modal fade" id="report<?php echo $row['pid']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                      <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h5 class="modal-title text-center" id="exampleModalLongTitle"><?php echo $row['pname']; ?>'s report</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
                          </div>
                          <div class="modal-body">
                            <?php if (mysqli_num_rows($fetchedReport) != 0) {
                              foreach ($fetchedReport as $report) {
                            ?>
                                <div class="container-fluid h-75" style="border-radius:3%; border-left:solid #888888 1px ;border-top:solid black 1px;box-shadow: 5px 10px 10px #888888;">
                                  <small class="float-right text-black-50"><?php echo $report['date']; ?></small>
                                  <img class="img-fluid rounded" src="<?php echo $report['report']; ?>" title="<?php echo $report['date']; ?>">
                                  <hr height="200px">
                                  <span class=""><?php echo $report['problem']; ?></span>
                                  <hr height="200px"><br>
                                </div><br>
                              <?php }
                            } else { ?>
                              <h2 class="text-danger text-center my-3">No report found.</h2>
                            <?php } ?>
                          </div>
                          <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                          </div>
                        </div>
                      </div>
                    </div>
                  </td>
                </tr>
            <?php $sn++;
              }
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