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
        <h1 class="mt-4 text-center">Patients List</h1>
      </div>
      <form action="admin/searchPatientInfo?search=all&parameter=all" method="GET">
        <div class="container my-3">
          <div class="row">
            <div class="input-group">
              <input type="search" class="form-control rounded mx-2" placeholder="Search" aria-label="Search" aria-describedby="search-addon" id="search" name="search" />
              <input type="submit" class="btn btn-outline-primary mr-2" value="Search">
            </div>
          </div>
        </div>
        <div class="container-fluid d-flex justify-content-center">
          <div class="form-check mx-3 ">
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
              <th scope="col" class="text-center" style="width:25%">Operation</th>
            </tr>
          </thead>
          <tbody>
            <?php
            if ($_SERVER['REQUEST_URI'] == "/hospital/Admin/SearchPatient") {
              //testing if the page is in searchPatient to avoid problem
            } else {
              $sn = 1;
              $result = $this->searchResult;
              foreach ($result as $row) {
                $fetchedReport = $this->AdminModelObj->getDynamicReport($row['pid']);
            ?>
                <tr>
                  <td class="text-center align-middle"><?php echo $sn; ?></td>
                  <td class="text-center align-middle"><?php echo $row['pid']; ?></td>
                  <td class="text-center align-middle"><?php echo $row['pname']; ?></td>
                  <td class="text-center align-middle"><?php echo $row['pemail']; ?></td>
                  <td class="text-center align-middle"><?php echo $row['pphone']; ?></td>
                  <td class="text-center">
                    <button class="btn btn-success mb-1" data-toggle="modal" data-target="#patient<?php echo $row['pid']; ?>">Update</button>
                    <!-- Modal for update-->
                    <div class="modal fade" id="patient<?php echo $row['pid']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                      <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                          <!-- form -->
                          <form action="admin/selectUpdatePatientRecord?pId=<?php echo $row['pid'] ?>" method="POST">
                            <div class="modal-header">
                              <h5 class="modal-title" id="exampleModalLongTitle">Update <?php echo $row['pname']; ?>'s (<?php echo $row['pemail']; ?>) profile</h5>
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                              </button>
                            </div>
                            <div class="modal-body">
                              <!-- input -->
                              <div class="modal-body border-none">
                                <div class="card-body p-0">
                                  <div class="row">
                                    <div class="col">
                                      <div class="form-group">
                                        <label for="full name">Name: </label>
                                        <input type="text" class="form-control is-valid" placeholder="FirstName LastName" required="" id="fullname<?php echo $row['pid']; ?>" name="fullname" maxlength="30" value="<?php echo $row['pname'] ?>" />
                                        <div class="invalid-feedback">Enter FirstName MiddleName(optional) & LastName sepreated
                                          by a space.</div>
                                      </div>
                                    </div>
                                  </div>
                                  <div class="row">
                                    <div class="col">
                                      <div class="form-group">
                                        <label for="confirmpassword">New Password:</label>
                                        <div class="form-group">
                                          <input type="password" class="form-control" name="newPassword" id="newPassword<?php echo $row['pid']; ?>" placeholder="Leave it empty if you dont want to change it." />
                                          <div class="invalid-feedback">Please enter password of 8 digits or greater.</div>
                                        </div>
                                      </div>
                                    </div>
                                  </div>
                                  <div class="row">
                                    <div class="col">
                                      <div class="form-group">
                                        <label for="age">Age:
                                        </label>
                                        <input type="number" class="form-control is-valid" name="age" id="age<?php echo $row['pid']; ?>" placeholder="Age (1-125)" required="" max="150" min="0" maxlength="3" value="<?php echo $row['page'] ?>" />
                                        <div class="invalid-feedback">Enter age between 0 to 125.</div>
                                      </div>
                                    </div>
                                  </div>
                                  <div class="row">
                                    <div class="col">
                                      <div class="form-group">
                                        <label for="phone">Contact Number: </label>
                                        <input type="text" max="10" class="form-control is-valid" id="phone<?php echo $row['pid']; ?>" name="phone" required="" placeholder="10 digit Contact Number" maxlength="10" pattern="[0-9]+" value="<?php echo $row['pphone'] ?>" />
                                        <div class="invalid-feedback">Enter a valid number of 10 digit.</div>
                                      </div>
                                    </div>
                                  </div>
                                  <div class="row">
                                    <div class="col">
                                      <div class="form-group">
                                        <label for="address">Address:</label>
                                        <input type="text" class="form-control is-valid" id="add<?php echo $row['pid']; ?>" name="add" placeholder="Enter the Address" required="" maxlength="40" value="<?php echo $row['paddress'] ?>" />
                                        <div class="invalid-feedback">Cannot be empty.</div>
                                      </div>
                                    </div>
                                  </div>
                                </div>
                              </div>
                              <!-- input -->
                            </div>
                            <div class="modal-footer">
                              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                              <input id="update<?php echo $row['pid']; ?>" type="submit" class="btn btn-success" value="Update">
                            </div>
                          </form>
                          <!-- form -->
                          <script>
                            let fullName<?php echo $row['pid']; ?> = document.querySelector("#fullname<?php echo $row['pid']; ?>");
                            let password<?php echo $row['pid']; ?> = document.querySelector("#newPassword<?php echo $row['pid']; ?>");
                            let phone<?php echo $row['pid']; ?> = document.querySelector("#phone<?php echo $row['pid']; ?>");
                            let age<?php echo $row['pid']; ?> = document.querySelector("#age<?php echo $row['pid']; ?>");
                            let add<?php echo $row['pid']; ?> = document.querySelector("#add<?php echo $row['pid']; ?>");

                            let nameRegex<?php echo $row['pid']; ?> = /^[A-Za-z]{3,15}\s([a-zA-Z]{3,15}\s)?[A-Za-z]{3,15}$/i;
                            let passwordRegex<?php echo $row['pid']; ?> = /[\w]{8,10}/i;
                            let phoneRegex<?php echo $row['pid']; ?> = /^[0-9]{10}$/;

                            let nameTest<?php echo $row['pid']; ?> = true;
                            let passwordTest<?php echo $row['pid']; ?> = true;
                            let phoneTest<?php echo $row['pid']; ?> = true;
                            let ageTest<?php echo $row['pid']; ?> = true;
                            let addTest<?php echo $row['pid']; ?> = true;

                            fullName<?php echo $row['pid']; ?>.addEventListener("change", () => {
                              if (nameRegex<?php echo $row['pid']; ?>.test(fullName<?php echo $row['pid']; ?>.value)) {
                                fullName<?php echo $row['pid']; ?>.classList.remove("is-invalid");
                                fullName<?php echo $row['pid']; ?>.classList.add("is-valid");
                                nameTest<?php echo $row['pid']; ?> = true;
                              } else {
                                fullName<?php echo $row['pid']; ?>.classList.remove("is-valid");
                                fullName<?php echo $row['pid']; ?>.classList.add("is-invalid");
                                nameTest<?php echo $row['pid']; ?> = false;
                              }
                            })

                            password<?php echo $row['pid']; ?>.addEventListener("change", () => {
                              if (passwordRegex<?php echo $row['pid']; ?>.test(password<?php echo $row['pid']; ?>.value)) {
                                password<?php echo $row['pid']; ?>.classList.remove("is-invalid");
                                password<?php echo $row['pid']; ?>.classList.add("is-valid");
                                passwordTest<?php echo $row['pid']; ?> = true;
                              } else {
                                password<?php echo $row['pid']; ?>.classList.remove("is-valid");
                                password<?php echo $row['pid']; ?>.classList.add("is-invalid");
                                passwordTest<?php echo $row['pid']; ?> = false;
                              }
                            })


                            phone<?php echo $row['pid']; ?>.addEventListener("change", () => {
                              if (phoneRegex<?php echo $row['pid']; ?>.test(phone<?php echo $row['pid']; ?>.value)) {
                                phone<?php echo $row['pid']; ?>.classList.remove("is-invalid");
                                phone<?php echo $row['pid']; ?>.classList.add("is-valid");
                                phoneTest<?php echo $row['pid']; ?> = true;
                              } else {
                                phone<?php echo $row['pid']; ?>.classList.remove("is-valid");
                                phone<?php echo $row['pid']; ?>.classList.add("is-invalid");
                                phoneTest<?php echo $row['pid']; ?> = false;
                              }
                            })

                            age<?php echo $row['pid']; ?>.addEventListener("change", () => {
                              if (age<?php echo $row['pid']; ?>.value >= 0 && age<?php echo $row['pid']; ?>.value <= 125) {
                                age<?php echo $row['pid']; ?>.classList.remove("is-invalid");
                                age<?php echo $row['pid']; ?>.classList.add("is-valid");
                                ageTest<?php echo $row['pid']; ?> = true;
                              } else {
                                age<?php echo $row['pid']; ?>.classList.remove("is-valid");
                                age<?php echo $row['pid']; ?>.classList.add("is-invalid");
                                ageTest<?php echo $row['pid']; ?> = false;
                              }
                            })

                            add<?php echo $row['pid']; ?>.addEventListener("change", (e) => {
                              if (add<?php echo $row['pid']; ?>.value != "") {
                                add<?php echo $row['pid']; ?>.classList.remove("is-invalid");
                                add<?php echo $row['pid']; ?>.classList.add("is-valid");
                                addTest<?php echo $row['pid']; ?> = true;
                              } else {
                                add<?php echo $row['pid']; ?>.classList.remove("is-valid");
                                add<?php echo $row['pid']; ?>.classList.add("is-invalid");
                                addTest<?php echo $row['pid']; ?> = false;
                              }
                            });
                            setInterval(() => {
                              if (nameTest<?php echo $row['pid']; ?> &&
                                passwordTest<?php echo $row['pid']; ?> &&
                                phoneTest<?php echo $row['pid']; ?> &&
                                addTest<?php echo $row['pid']; ?> &&
                                ageTest<?php echo $row['pid']; ?>) {
                                update<?php echo $row['pid']; ?>.removeAttribute("disabled", "disabled");
                              } else {
                                update<?php echo $row['pid']; ?>.setAttribute("disabled", "disabled");
                              }
                            }, 100);
                          </script>
                        </div>
                      </div>
                    </div>
                    <!-- Modal for update -->
                    <button class="btn btn-primary  mb-1" data-toggle="modal" data-target="#report<?php echo $row['pid']; ?>">Report</button>
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