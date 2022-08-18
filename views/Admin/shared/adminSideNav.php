<div id="layoutSidenav_nav">
    <nav class="sb-sidenav accordion sb-sidenav-light" id="sidenavAccordion">
        <div class="sb-sidenav-menu" style="background-color: #343a40">
            <div class="nav">
                <!-- <div class="sb-sidenav-menu-heading"></div> -->
                <a class="nav-link text-light" href="/hospital/Admin/Index">
                    <div class="sb-nav-link-icon">
                        <i class="fas fa-home text-light"></i>
                    </div>
                    Home
                </a>
                <div class="sb-sidenav-menu-heading">Management</div>
                <a class="nav-link collapsed text-light" href="#" data-toggle="collapse" data-target="#collapse1Layouts" aria-expanded="false" aria-controls="collapseLayouts">
                    <div class="sb-nav-link-icon">
                        <i class="fas fa-user-md text-light"></i>
                    </div>
                    Doctor
                    <div class="sb-sidenav-collapse-arrow">
                        <i class="fas fa-angle-down text-light"></i>
                    </div>
                </a>
                <div class="collapse" id="collapse1Layouts" aria-labelledby="headingOne" data-parent="#sidenavAccordion">
                    <nav class="sb-sidenav-menu-nested nav">
                        <a class="nav-link text-light" href="/hospital/Admin/AddDoctor">Add</a>
                        <a class="nav-link text-light" href="/hospital/Admin/SearchDoctor">Search/Update</a>
                    </nav>
                </div>
                <a class="nav-link collapsed text-light" href="#" data-toggle="collapse" data-target="#collapseLayouts" aria-expanded="false" aria-controls="collapseLayouts">
                    <div class="sb-nav-link-icon">
                        <i class="fas fa-users text-light"></i>
                    </div>
                    Patient
                    <div class="sb-sidenav-collapse-arrow">
                        <i class="fas fa-angle-down text-light"></i>
                    </div>
                </a>
                <div class="collapse" id="collapseLayouts" aria-labelledby="headingOne" data-parent="#sidenavAccordion">
                    <nav class="sb-sidenav-menu-nested nav">
                        <a class="nav-link text-light" href="/hospital/Admin/AddPatient">Add</a>
                        <a class="nav-link text-light" href="" hidden>Approve</a>
                        <a class="nav-link text-light" href="/hospital/Admin/SearchPatient">Search/Update</a>
                    </nav>
                </div>
                <div class="sb-sidenav-menu-heading">Hospital</div>
                <a class="nav-link text-light" href="admin/allAppointments">
                    <div class="sb-nav-link-icon text-light">
                        <i class="far fa-calendar-check"></i>
                    </div>
                    Appointments
                </a>
                <a class="nav-link text-light" href="admin/contactQueries">
                    <div class="sb-nav-link-icon">
                        <i class="fas fa-table text-light"></i>
                    </div>
                    Contact Queries
                </a>
                <!-- <a class="nav-link text-light" href="#">
                <div class="sb-nav-link-icon"><i class="fas fa-table text-light"></i></div>
                Logs
              </a> -->

                <a class="nav-link collapsed text-light" href="#" data-toggle="collapse" data-target="#logsLayouts" aria-expanded="false" aria-controls="collapseLayouts">
                    <div class="sb-nav-link-icon">
                        <i class="fas fa-list text-light"></i>
                        <!-- <img src="dform.svg" width="25" /> -->
                    </div>
                    Logs
                    <div class="sb-sidenav-collapse-arrow">
                        <i class="fas fa-angle-down text-light"></i>
                    </div>
                </a>
                <div class="collapse" id="logsLayouts" aria-labelledby="headingOne" data-parent="#sidenavAccordion">
                    <nav class="sb-sidenav-menu-nested nav">
                        <a class="nav-link text-light" href="admin/systemLog">Your Log</a>
                        <a class="nav-link text-light" href="admin/doctorLog">Doctor Log</a>
                        <a class="nav-link text-light" href="admin/patientLog">Patient Log</a>
                    </nav>
                </div>
            </div>
        </div>
        <div class="text-muted text-center py-1" style="background-color: #343a40">
            <div class="text-light-50" id="time"></div>
            <!-- <div class=" text-light">Copyright <a href="dashboard/about"> &copy;Dipesh & Manish</a></div> -->
            <script>
                setInterval(() => {
                    let date = new Date();
                    document.querySelector("#time").innerText = `${date.getFullYear()}/${date.getMonth()}/${date.getDate()}   ${date.getHours()}:${date.getMinutes()}:${date.getSeconds()}`;
                }, 1000)
            </script>
        </div>
    </nav>
</div>