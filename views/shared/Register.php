<main>
    <div class="container-fluid">
        <div class="container-fluid">

            <form class="mt-3" method="POST" action="Doctor/Addpatient">
                <div class="row">
                    <div class="col">
                        <div class="form-group">
                            <label for="firstname">Full Name<span class="text-danger">*</span></label>
                            <input type="text" class="form-control" name="full name" placeholder="Full Name" required=""
                                id="fullname" />
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <div class="form-group">
                            <label for="email">Email: <span class="text-danger">*</span></label>
                            <input type="email" class="form-control" name="email" id="email" placeholder="Enter Email"
                                required="" />
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="email">Password: <span class="text-danger">*</span></label>
                            <input type="password" class="form-control" name="password" id="password"
                                placeholder="Enter Password" required="" />
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="confirmpassword">Confirm Password:
                                <span class="text-danger">*</span></label>
                            <input type="password" class="form-control" name="email" id="confirmpassword"
                                placeholder="Confirm Password" required="" />
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <div class="form-group">
                            <label for="phone">Contact Number:<span class="text-danger">*</span></label>
                            <input type="text" class="form-control" id="phone" name="phone" required=""
                                placeholder="Enter Contact Number" required="" />
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
                                <option value="m">Male</option>
                                <option value="f">Female</option>
                                <option value="o">Other</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-lg-6 col-sm-12">
                        <div class="form-group">
                            <label for="age">Age:
                                <span class="text-danger">*</span></label>
                            <input type="number" class="form-control" name="age" id="age" placeholder="Age"
                                required="" />
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <div class="form-group">
                            <label for="phone">Address:<span class="text-danger">*</span></label>
                            <input type="text" class="form-control" id="address" name="phone" required=""
                                placeholder="Enter Your Address" required="" />
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <input type="submit" name="insert" value="Register" class="btn btn-primary" />
                        <a href="#" class="btn btn-danger ml-2">Reset</a>
                    </div>

                </div>
            </form>
        </div>
    </div>
</main>
<?php
require_once 'views/shared/userFooter.php';
?>
</div>