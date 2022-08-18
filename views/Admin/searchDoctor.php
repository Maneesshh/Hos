<!DOCTYPE html>
<html lang="en">
<?php
require_once "views/shared/adminlink.php";
require_once "views/admin/shared/adminSideNav.php";
?>
<div id="layoutSidenav_content">

  <div class="container-fluid">
    <div class="container mycontainer text-center w-100">
      <h2 class="font-weight-light text-center mt-3 mb-3">You can update doctor profile here</h2>
      <div class="row my-md-5">
        <?php
        $count = 1;
        foreach ($result as $row) {
        ?>
          <div class="col-lg-4 mydocs mb-4">
            <img class="bd-placeholder-img rounded-circle mb-1" width="170" height="170" src="<?php echo $row['dimage']; ?>" />
            <rect width="100%" height="100%" fill="#777" />
            <h2><?php echo "Dr. " . $row['dname']; ?></h2>
            <p class="mt-1">
              <button class="mybtn btn w-50 btn-lg book  <?php if ($row['dstatus'] == 1) {
                                                            echo 'btn-outline-success';
                                                          } else {
                                                            echo 'btn-outline-danger';
                                                          } ?>" data-toggle="modal" data-target="#doctor<?php echo $row['did']; ?>">Update</button>
            </p>
          </div>
          <!------------------- modal -------------------->
          <div class="modal fade" id="doctor<?php echo $row['did']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
              <!-------- form----------->
              <form method="POST" action="admin/getDoctorProfile?docId=<?php echo $row['did'] ?>" enctype="multipart/form-data" autocomplete="off">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Dr. <?php echo $row['dname']; ?>'s profile</h5>
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
                              <input type="text" class="form-control is-valid" placeholder="FirstName LastName" required="" id="fullname<?php echo $row['did']; ?>" name="fullname" maxlength="30" value="<?php echo $row['dname'] ?>" />
                              <div class="invalid-feedback">Enter FirstName MiddleName(optional) & LastName sepreated
                                by a space.</div>
                            </div>
                          </div>
                        </div>
                        <div class="row">
                          <div class="col">
                            <div class="form-group">
                              <label for="email">Email:</label>
                              <input type="email" class="form-control is-valid" name="email" id="email<?php echo $row['did']; ?>" required="" value="<?php echo $row['demail'] ?>" />
                              <div class="invalid-feedback">Please enter a valid email ending with "
                                @doctor.com ".
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="row">
                          <div class="col">
                            <div class="form-group">
                              <label for="confirmpassword">New Password:</label>
                              <div class="form-group">
                                <input type="password" class="form-control" name="newPassword" id="newPassword<?php echo $row['did']; ?>" placeholder="Leave it empty if you dont want to change it." />
                                <div class="invalid-feedback">Please enter password of 8 digits or greater.</div>
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="row">
                          <div class="col">
                            <div class="form-group">
                              <label for="phone">Contact Number: </label>
                              <input type="text" max="10" class="form-control is-valid" id="phone<?php echo $row['did']; ?>" name="phone" required="" placeholder="10 digit Contact Number" maxlength="10" pattern="[0-9]+" value="<?php echo $row['dphone'] ?>" />
                              <div class="invalid-feedback">Enter a valid number of 10 digit.</div>
                            </div>
                          </div>
                        </div>
                        <div class="row">
                          <div class="col-lg-6 col-sm-12">
                            <div class="form-group">
                              <label for="speciality">Speciality:</label>
                              <input type="text" class="form-control is-valid" name="speciality" id="speciality<?php echo $row['did']; ?>" required="" placeholder="Enter Doctor Speciality." value="<?php echo $row['dspeciality'] ?>" />
                              <div class="invalid-feedback">Cannot be empty.</div>
                            </div>
                          </div>
                          <div class="col-lg-6 col-sm-12">
                            <div class="form-group">
                              <label for="address">Address:</label>
                              <input type="text" class="form-control is-valid" id="add<?php echo $row['did']; ?>" name="add" placeholder="Enter the Address" required="" maxlength="40" value="<?php echo $row['daddress'] ?>" />
                              <div class="invalid-feedback">Cannot be empty.</div>
                            </div>
                          </div>
                        </div>
                        <div class="row">
                          <div class="col">
                            <div class="form-group">
                              <label for="description">Description:
                              </label>
                              <textarea type="text" rows="3" class="form-control is-valid" name="description" id="description<?php echo $row['did']; ?>" placeholder="description" required=""><?php echo $row['ddescription'] ?></textarea>
                              <div class="invalid-feedback">Cannot be empty.</div>
                            </div>
                          </div>
                        </div>
                        <div class="row mt-2">
                          <div class="col">
                            <div class="form-group">
                              <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="dstatus" id="available" value="1" <?php if ($row['dstatus'] == 1) {
                                                                                                                        echo 'checked';
                                                                                                                      } ?>>
                                <label class="form-check-label text-success h5" for="inlineRadio1">Available</label>
                              </div>
                              <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="dstatus" id="unavailable" value="0" <?php if ($row['dstatus'] == 0) {
                                                                                                                          echo 'checked';
                                                                                                                        } ?>>
                                <label class="form-check-label text-danger h5" for="inlineRadio2">Unavailable</label>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                    <!-- input -->
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <input id="update<?php echo $row['did']; ?>" type="submit" class="btn btn-primary" value="Update">
                  </div>
                </div>
              </form>
              <!-------- form----------->
              <script>
                let fullName<?php echo $row['did']; ?> = document.querySelector("#fullname<?php echo $row['did']; ?>");
                let email<?php echo $row['did']; ?> = document.querySelector("#email<?php echo $row['did']; ?>");
                let password<?php echo $row['did']; ?> = document.querySelector("#newPassword<?php echo $row['did']; ?>");
                let phone<?php echo $row['did']; ?> = document.querySelector("#phone<?php echo $row['did']; ?>");
                let speciality<?php echo $row['did']; ?> = document.querySelector("#speciality<?php echo $row['did']; ?>");
                let description<?php echo $row['did']; ?> = document.querySelector("#description<?php echo $row['did']; ?>");
                let add<?php echo $row['did']; ?> = document.querySelector("#add<?php echo $row['did']; ?>");

                let update<?php echo $row['did']; ?> = document.querySelector("#update<?php echo $row['did']; ?>");

                let nameRegex<?php echo $row['did']; ?> = /^[A-Za-z]{3,15}\s([a-zA-Z]{3,15}\s)?[A-Za-z]{3,15}$/i;
                let emailRegex<?php echo $row['did']; ?> = /^[a-z0-9](\.?\_?[a-z0-9]){5,}@doctor\.com$/i;
                let passwordRegex<?php echo $row['did']; ?> = /[\w]{8,10}/i;
                let phoneRegex<?php echo $row['did']; ?> = /^[0-9]{10}$/;

                let nameTest<?php echo $row['did']; ?> = true;
                let emailTest<?php echo $row['did']; ?> = true;
                let passwordTest<?php echo $row['did']; ?> = true;
                let phoneTest<?php echo $row['did']; ?> = true;
                let specialityTest<?php echo $row['did']; ?> = true;
                let addTest<?php echo $row['did']; ?> = true;
                let descriptionTest<?php echo $row['did']; ?> = true;

                fullName<?php echo $row['did']; ?>.addEventListener("change", () => {
                  if (nameRegex<?php echo $row['did']; ?>.test(fullName<?php echo $row['did']; ?>.value)) {
                    fullName<?php echo $row['did']; ?>.classList.remove("is-invalid");
                    fullName<?php echo $row['did']; ?>.classList.add("is-valid");
                    nameTest<?php echo $row['did']; ?> = true;
                  } else {
                    fullName<?php echo $row['did']; ?>.classList.remove("is-valid");
                    fullName<?php echo $row['did']; ?>.classList.add("is-invalid");
                    nameTest<?php echo $row['did']; ?> = false;
                  }
                });

                email<?php echo $row['did']; ?>.addEventListener("blur", () => {
                  if (emailRegex<?php echo $row['did']; ?>.test(email<?php echo $row['did']; ?>.value)) {
                    email<?php echo $row['did']; ?>.classList.remove("is-invalid");
                    email<?php echo $row['did']; ?>.classList.add("is-valid");
                    emailTest<?php echo $row['did']; ?> = true;
                  } else {
                    email<?php echo $row['did']; ?>.classList.remove("is-valid");
                    email<?php echo $row['did']; ?>.classList.add("is-invalid");
                    emailTest<?php echo $row['did']; ?> = false;
                  }
                });

                password<?php echo $row['did']; ?>.addEventListener("change", () => {
                  if (passwordRegex<?php echo $row['did']; ?>.test(password<?php echo $row['did']; ?>.value)) {
                    password<?php echo $row['did']; ?>.classList.remove("is-invalid");
                    password<?php echo $row['did']; ?>.classList.add("is-valid");
                    passwordTest<?php echo $row['did']; ?> = true;
                  } else {
                    password<?php echo $row['did']; ?>.classList.remove("is-valid");
                    password<?php echo $row['did']; ?>.classList.add("is-invalid");
                    passwordTest<?php echo $row['did']; ?> = false;
                  }
                });

                phone<?php echo $row['did']; ?>.addEventListener("change", () => {
                  if (phoneRegex<?php echo $row['did']; ?>.test(phone<?php echo $row['did']; ?>.value)) {
                    phone<?php echo $row['did']; ?>.classList.remove("is-invalid");
                    phone<?php echo $row['did']; ?>.classList.add("is-valid");
                    phoneTest<?php echo $row['did']; ?> = true;
                  } else {
                    phone<?php echo $row['did']; ?>.classList.remove("is-valid");
                    phone<?php echo $row['did']; ?>.classList.add("is-invalid");
                    phoneTest<?php echo $row['did']; ?> = false;
                  }
                });

                speciality<?php echo $row['did']; ?>.addEventListener("change", (e) => {
                  if (speciality<?php echo $row['did']; ?>.value != "") {
                    speciality<?php echo $row['did']; ?>.classList.remove("is-invalid");
                    speciality<?php echo $row['did']; ?>.classList.add("is-valid");
                    specialityTest<?php echo $row['did']; ?> = true;
                  } else {
                    speciality<?php echo $row['did']; ?>.classList.remove("is-valid");
                    speciality<?php echo $row['did']; ?>.classList.add("is-invalid");
                    specialityTest<?php echo $row['did']; ?> = false;
                  }
                });

                add<?php echo $row['did']; ?>.addEventListener("change", (e) => {
                  if (add<?php echo $row['did']; ?>.value != "") {
                    add<?php echo $row['did']; ?>.classList.remove("is-invalid");
                    add<?php echo $row['did']; ?>.classList.add("is-valid");
                    addTest<?php echo $row['did']; ?> = true;
                  } else {
                    add<?php echo $row['did']; ?>.classList.remove("is-valid");
                    add<?php echo $row['did']; ?>.classList.add("is-invalid");
                    addTest<?php echo $row['did']; ?> = false;
                  }
                });

                description<?php echo $row['did']; ?>.addEventListener("change", (e) => {
                  if (description<?php echo $row['did']; ?>.value != "") {
                    description<?php echo $row['did']; ?>.classList.remove("is-invalid");
                    description<?php echo $row['did']; ?>.classList.add("is-valid");
                    descriptionTest<?php echo $row['did']; ?> = true;
                  } else {
                    description<?php echo $row['did']; ?>.classList.remove("is-valid");
                    description<?php echo $row['did']; ?>.classList.add("is-invalid");
                    descriptionTest<?php echo $row['did']; ?> = false;
                  }
                });
                setInterval(() => {
                  if (nameTest<?php echo $row['did']; ?> &&
                    emailTest<?php echo $row['did']; ?> &&
                    passwordTest<?php echo $row['did']; ?> &&
                    phoneTest<?php echo $row['did']; ?> &&
                    specialityTest<?php echo $row['did']; ?> &&
                    addTest<?php echo $row['did']; ?> &&
                    descriptionTest<?php echo $row['did']; ?>) {
                    update<?php echo $row['did']; ?>.removeAttribute("disabled", "disabled");
                  } else {
                    update<?php echo $row['did']; ?>.setAttribute("disabled", "disabled");
                  }
                }, 100);
              </script>
            </div>
          </div>
          <!------------------- modal -------------------->
        <?php } ?>
      </div>
    </div>
  </div>

  <?php
  require_once 'views/shared/userFooter.php';
  ?>
</div>
</body>

</html>