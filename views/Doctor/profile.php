<!DOCTYPE html>
<html lang="en">
<?php
require_once "views/shared/doctorlink.php";
require_once "views/Doctor/shared/doctorSideNav.php";
?>
<div id="layoutSidenav_content">
    <main>
        <div class="container">
            <form method="POST" action="doctor/getDoctorProfile" enctype="multipart/form-data" autocomplete="off">
                <div class="modal-body border-none">
                    <div class="card-body p-0">
                        <div class="row">
                            <div class="col">
                                <div class="form-group">
                                    <label for="full name">Name: </label>
                                    <input type="text" class="form-control is-valid" placeholder="FirstName MiddleName(optional) LastName" required="" id="fullname" name="fullname" maxlength="30" value="<?php echo $_SESSION['doctor']['dname'] ?>" />
                                    <div class="invalid-feedback">Please enter FirstName MiddleName(optional) & LastName sepreated
                                        by a space.</div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <div class="form-group">
                                    <label for="email">Email:</label>
                                    <input type="email" class="form-control is-valid" name="email" id="email" required="" value="<?php echo $_SESSION['doctor']['demail'] ?>" />
                                    <div class="invalid-feedback">Please enter a valid email ending with "
                                        @admin.com ".
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="oldPassword">Old Password: </label>
                                    <input type="password" class="form-control" name="oldPassword" id="oldPassword" value="" placeholder="Leave it empty if you dont want to change it." autocomplete="off" />
                                    <div class="invalid-feedback">Please enter your old password.</div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="confirmpassword">New Password:</label>
                                    <div class="form-group">
                                        <input type="password" class="form-control" name="newPassword" id="newPassword" placeholder="Leave it empty if you dont want to change it." />
                                        <div class="invalid-feedback">Please enter password of 8 digits or greater.</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <div class="form-group">
                                    <label for="phone">Contact Number: </label>
                                    <input type="text" max="10" class="form-control is-valid" id="phone" name="phone" required="" placeholder="10 digit Contact Number" maxlength="10" pattern="[0-9]+" value="<?php echo $_SESSION['doctor']['dphone'] ?>" />
                                    <div class="invalid-feedback">Enter a valid number of 10 digit.</div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-6 col-sm-12">
                                <div class="form-group">
                                    <label for="speciality">Speciality:</label>
                                    <input type="text" class="form-control is-valid" name="speciality" id="speciality" required="" placeholder="Enter Doctor Speciality." value="<?php echo $_SESSION['doctor']['dspeciality'] ?>" />
                                    <div class="invalid-feedback">Cannot be empty.</div>
                                </div>
                            </div>
                            <div class="col-lg-6 col-sm-12">
                                <div class="form-group">
                                    <label for="address">Address:</label>
                                    <input type="text" class="form-control is-valid" id="add" name="add" placeholder="Enter the Address" required="" maxlength="40" value="<?php echo $_SESSION['doctor']['daddress'] ?>" />
                                    <div class="invalid-feedback">Cannot be empty.</div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <div class="form-group">
                                    <label for="description">Description:
                                    </label>
                                    <input type="text" class="form-control is-valid" name="description" id="description" placeholder="description" required="" value="<?php echo $_SESSION['doctor']['ddescription'] ?>" />
                                    <div class="invalid-feedback">Cannot be empty.</div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <label for="photo">Image:</label><br>
                                <img class="img w-25 mb-2 rounded" src="<?php echo $_SESSION['doctor']['dimage'] ?>" alt="<?php echo $_SESSION['doctor']['dname'] ?>">
                                <input type="file" class="form-control-file is-valid" id="photo" name="photo" accept=".png , .jpeg , .jpg" />
                            </div>
                        </div>
                        <div class="row my-2">
                            <div class="col-5"></div>
                            <div class="col mb-3">
                                <input type="submit" class="btn btn-success" name="update" id="update" value="Update" title="Please fill the entire form to enable" />
                            </div>
                            <div class="col-5"></div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </main>
</div>
<noscript>
    <h1>Please enable Javascript.</h1>
</noscript>
<script>
    console.clear();
    let fullname = document.querySelector("#fullname");
    let email = document.querySelector("#email");
    let oldPassword = document.querySelector("#oldPassword");
    let newPassword = document.querySelector("#newPassword");
    let phone = document.querySelector("#phone");
    let speciality = document.querySelector("#speciality");
    let description = document.querySelector("#description");
    let address = document.querySelector("#add");
    let update = document.querySelector("#update");

    let nameTest = true;
    let emailTest = true;
    let passwordTest;
    let confirmPasswordTest;
    let phoneTest = true;
    let specialityTest = true;
    let descriptionTest = true;
    let addressTest = true;

    fullname.addEventListener("blur", (e) => {
        let fullnameRegex = /^[A-Za-z]{3,15}\s([a-zA-Z]{3,15}\s)?[A-Za-z]{3,15}$/i;
        if (fullnameRegex.test(fullname.value)) {
            e.target.classList.remove("is-invalid");
            e.target.classList.add("is-valid");
            nameTest = true;
        } else {
            e.target.classList.remove("is-valid");
            e.target.classList.add("is-invalid");
            nameTest = false;
        }
    });

    email.addEventListener("blur", (e) => {
        let emailRegex = /^[a-z0-9](\.?\_?[a-z0-9]){5,}@doctor.com$/i;
        if (emailRegex.test(email.value)) {
            e.target.classList.remove("is-invalid");
            e.target.classList.add("is-valid");
            emailTest = true;
        } else {
            e.target.classList.remove("is-valid");
            e.target.classList.add("is-invalid");
            emailTest = false;
        }
    });

    oldPassword.addEventListener("blur", (e) => {
        let passwordRegex = /[\w]{8,10}/i;
        if (passwordRegex.test(oldPassword.value)) {
            e.target.classList.remove("is-invalid");
            e.target.classList.add("is-valid");
            passwordTest = true;
        } else {
            e.target.classList.remove("is-valid");
            e.target.classList.add("is-invalid");
            passwordTest = false;
        }
    });

    newPassword.addEventListener("blur", (e) => {
        let confirmPasswordRegex = /[\w]{8,10}/i;
        if (confirmPasswordRegex.test(newPassword.value)) {
            e.target.classList.remove("is-invalid");
            e.target.classList.add("is-valid");
            confirmPasswordTest = true;

        } else {
            e.target.classList.remove("is-valid");
            e.target.classList.add("is-invalid");
            confirmPasswordTest = false;
        }
    });

    phone.addEventListener("blur", (e) => {
        let phoneRegex = /^[0-9]{10}$/;
        if (phoneRegex.test(phone.value)) {
            e.target.classList.remove("is-invalid");
            e.target.classList.add("is-valid");
            phoneTest = true;
        } else {
            e.target.classList.remove("is-valid");
            e.target.classList.add("is-invalid");
            phoneTest = false;
        }
    });
    speciality.addEventListener("blur", (e) => {
        if (speciality.value != "") {
            e.target.classList.remove("is-invalid");
            e.target.classList.add("is-valid");
            specialityTest = true;
        } else {
            e.target.classList.remove("is-valid");
            e.target.classList.add("is-invalid");
            specialityTest = false;
        }
    });

    description.addEventListener("blur", (e) => {
        if (description.value != "") {
            e.target.classList.remove("is-invalid");
            e.target.classList.add("is-valid");
            descriptionTest = true;
        } else {
            e.target.classList.remove("is-valid");
            e.target.classList.add("is-invalid");
            descriptionTest = false;
        }
    });

    address.addEventListener("blur", (e) => {
        let addressRegex = /[\w\W]{5,40}/;
        if (addressRegex.test(address.value)) {
            e.target.classList.remove("is-invalid");
            e.target.classList.add("is-valid");
            addressTest = true;
        } else {
            e.target.classList.remove("is-valid");
            e.target.classList.add("is-invalid");
            addressTest = false;
        }
    });
    setInterval(function() {
        if (nameTest && emailTest && phoneTest && addressTest && descriptionTest && specialityTest) {
            update.removeAttribute("disabled", "disabled");
        } else {
            update.setAttribute("disabled", "disabled");
        }
    }, 500);
</script>


</div>
<div>

</div>
</main>

<?php
require_once 'views/shared/userFooter.php';
?>
</div>
</div>
</body>

</html>