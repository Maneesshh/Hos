<!DOCTYPE html>
<html lang="en">
<?php
require_once "views/shared/doctorlink.php";
require_once "views/Doctor/shared/doctorSideNav.php";
?>

<body>
    <div id="layoutSidenav_content">
        <main>
            <div class="container">
                <form method="POST" action="doctor/patientRegistration" enctype="multipart/form-data">
                    <div class="modal-body">
                        <div class="card-body p-0">
                            <div class="row">
                                <div class="col">
                                    <div class="form-group">
                                        <label for="full name">Name<span class="text-danger">*</span></label>
                                        <input type="text" class="form-control" placeholder="FirstName MiddleName(optional) LastName" required="" id="fullname" name="fullname" maxlength="30" />
                                        <div class="invalid-feedback">Please enter FirstName MiddleName(optional) & LastName sepreated
                                            by a space.</div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <div class="form-group">
                                        <label for="email">Email: <span class="text-danger">*</span></label>
                                        <input type="email" class="form-control" name="email" id="email" placeholder="xyz@gmail.com" required="" />
                                        <div class="invalid-feedback">Please enter a valid email ending with "
                                            @gmail.com ".
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="password">Password: <span class="text-danger">*</span></label>
                                        <input type="password" class="form-control" name="password" id="password" placeholder="Enter Password" required="" />
                                        <div class="invalid-feedback">Please enter password of 8 digits or greater.
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="confirmpassword">Confirm Password:
                                            <span class="text-danger">*</span></label>
                                        <input type="password" class="form-control" name="confirmPassword" id="confirmPassword" placeholder="Confirm Password" required="" />
                                        <div class="invalid-feedback">Confirmpassword and Password did not match.</div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <div class="form-group">
                                        <label for="phone">Contact Number:<span class="text-danger">*</span></label>
                                        <input type="text" max="10" class="form-control" id="phone" name="phone" required="" placeholder="10 digit Contact Number" maxlength="10" pattern="[0-9]+" />
                                        <div class="invalid-feedback">Enter a valid number of 10 digit.</div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-6 col-sm-12">
                                    <div class="form-group">
                                        <label for="gender">Gender: <span class="text-danger">*</span></label>
                                        <!-- <input type="select" class="form-control" name="gender" id="gender"
                                            required="" /> -->
                                        <select class="form-control" name="gender" id="gender">
                                            <option selected="" value="M">Male</option>
                                            <option value="F">Female</option>
                                            <option value="O">Other</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-sm-12">
                                    <div class="form-group">
                                        <label for="age">Age:
                                            <span class="text-danger">*</span></label>
                                        <input type="number" class="form-control" name="age" id="age" placeholder="Age (1-125)" required="" max="150" min="0" maxlength="3" />
                                        <div class="invalid-feedback">Enter age between 0 to 125.</div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <div class="form-group">
                                        <label for="address">Address:</label>
                                        <input type="text" class="form-control" id="add" name="add" placeholder="Enter Your Address" required="" maxlength="40" />
                                        <div class="invalid-feedback">Cannot be empty.</div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <label for="photo">Image:</label>
                                    <input type="file" class="form-control-file" id="photo" name="photo" accept=".png , .jpeg , .jpg" required="" />
                                </div>
                            </div>
                            <div class="row my-2">
                                <div class="col-5"></div>
                                <div class="col mb-3">
                                    <input type="submit" class="btn btn-success" name="register" id="register" value="Register" disabled="disabled" title="Please fill the entire form to enable" />
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
        let password = document.querySelector("#password");
        let confirmPassword = document.querySelector("#confirmPassword");
        let phone = document.querySelector("#phone");
        let gender = document.querySelector("#gender");
        let age = document.querySelector("#age");
        let address = document.querySelector("#add");
        let register = document.querySelector("#register");

        let nameTest;
        let emailTest;
        let passwordTest;
        let confirmPasswordTest;
        let phoneTest;
        let ageTest;
        let addressTest;

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
            let emailRegex = /^[a-z0-9](\.?\_?[a-z0-9]){5,}@g(oogle)?mail\.com$/i;
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


        password.addEventListener("blur", (e) => {
            let passwordRegex = /[\w]{8,10}/i;
            if (passwordRegex.test(password.value)) {
                e.target.classList.remove("is-invalid");
                e.target.classList.add("is-valid");
                passwordTest = true;
            } else {
                e.target.classList.remove("is-valid");
                e.target.classList.add("is-invalid");
                passwordTest = false;
            }
        });

        confirmPassword.addEventListener("blur", (e) => {
            let confirmPasswordRegex = /[\w]{8,10}/i
            if (confirmPassword.value == password.value && confirmPasswordRegex.test(confirmPassword.value)) {
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

        age.addEventListener("blur", (e) => {
            if (age.value >= 1 && age.value <= 125) {
                e.target.classList.remove("is-invalid");
                e.target.classList.add("is-valid");
                ageTest = true;
            } else {
                e.target.classList.remove("is-valid");
                e.target.classList.add("is-invalid");
                ageTest = false;
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
            if (nameTest && nameTest && emailTest && passwordTest && confirmPasswordTest && phoneTest && ageTest &&
                addressTest) {
                register.removeAttribute("disabled", "disabled");
            } else {
                register.setAttribute("disabled", "disabled");
            }
        }, 500);
    </script>


    </div>
    <div>
        <!-- <a href="#"><button type="button" class="btn btn-success" style="margin-left: 50%;">Register </button></a> -->
    </div>
    </main>

    <?php
    require_once 'views/shared/userFooter.php';
    ?>
    </div>
    </div>
</body>

</html>