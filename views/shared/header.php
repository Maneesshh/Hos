<base href="/hospital/">
<header>

    <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
        <a class="navbar-brand" href="#">
            <img src="images/icons/logo.png" width="30" height="30" class="d-inline-block align-top mr-1" alt="" />Hamro
            Hospital</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarCollapse">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" href="/hospital">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/hospital/DashBoard/Contact">Contact</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/hospital/DashBoard/About">About</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/hospital/DashBoard/Notice">Notice</a>
                </li>
            </ul>
            <span class="mt-2 mt-md-0 ml-md-3 mb-sm-0">
                <button class="btn btn-success btn-sm my-md-1 mr-1 my-0" data-toggle="modal" data-target="#mysignup">
                    SignUp
                </button>
                <button class="btn btn-success btn-sm my-md-1 mx-1 my-0" data-toggle="modal" data-target="#mylogin">
                    Login
                </button>
            </span>
        </div>
    </nav>
</header>
<article>


    <!-- Signup -->
    <div class="modal fade" id="mysignup" tabindex="-1" role="dialog" aria-labelledby="mysignupTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <!-- <form method="POST" action=""> -->
                <form method="POST" action="dashboard/userSignup" enctype="multipart/form-data">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLongTitle">SignUp</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
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
                                            @gmail.com ".</div>
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
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">
                            Close
                        </button>
                        <input type="submit" class="btn btn-success" name="signup" id="signup" value="SignUp" disabled="disabled" title="Please fill the entire form to enable" />
                        <!-- <button class="btn btn-success" name="signup" id="signup">Test</button> -->
                    </div>
                </form>
            </div>
        </div>
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
        let signup = document.querySelector("#signup");

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
                signup.removeAttribute("disabled", "disabled");
            } else {
                signup.setAttribute("disabled", "disabled");
            }
        }, 500);
    </script>

    <!-- Login -->
    <div class="modal fade" id="mylogin" tabindex="-1" role="dialog" aria-labelledby="myloginTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <form method="POST" action="dashboard/LoginCheck">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLongTitle">Login</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="emailornum">Email</label>
                            <input type="email" class="form-control" id="emailornum" name="emailornum" aria-describedby="emailHelp" placeholder="Enter your email" required />
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Password</label>
                            <input type="password" class="form-control" id="loginpassword" name="loginpassword" placeholder="Password" required />
                        </div>
                        <div class="row form-group ">
                            <div class="col">
                                <div class="form-check">
                                    <a href="dashboard/signup" class="text-primary " style="text-decoration:none">Not an
                                        User?</a>
                                </div>
                            </div>
                            <div class="col text-center">
                                <a id="forgot" class="" style="text-decoration:none" title="Fill in the email">Forgot
                                    Password?</a>
                            </div>
                            <script>
                                let forgot = document.querySelector("#forgot");
                                let fEmail = document.querySelector("#emailornum");
                                let fEmailRegex = /^[a-zA-Z0-9]+(\.?[a-z0-9]){3,}@gmail\.com$/;
                                setInterval(() => {
                                    if (fEmailRegex.test(fEmail.value)) {
                                        forgot.setAttribute("href", `dashboard/forgotPassword?forgotEmail=${fEmail.value}`);
                                        forgot.classList.add("text-danger");
                                    } else {
                                        forgot.removeAttribute("href", "");
                                        forgot.classList.remove("text-danger");
                                    }
                                }, 250);
                            </script>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <input type="button" class="btn btn-danger" data-dismiss="modal" value="Close">
                        <input type="submit" class="btn btn-success" name="login" id="login" value="Login" />
                    </div>
                </form>
            </div>
        </div>
    </div>
</article>