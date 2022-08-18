<div id="layoutSidenav_nav">
  <nav class="sb-sidenav accordion sb-sidenav-light" id="sidenavAccordion">
    <div class="sb-sidenav-menu" style="background-color: #343a40">
      <div class="nav">
        <!-- <div class="sb-sidenav-menu-heading"></div> -->
        <a class="nav-link text-light" href="/hospital/Patient/Index">
          <div class="sb-nav-link-icon">
            <i class="fas fa-home text-light"></i>
          </div>
          Home
        </a>
        <a class="nav-link text-light" href="patient/reports">
          <div class="sb-nav-link-icon">
            <i class="fa fa-file"></i>
          </div>
          My Reports
        </a>
        <a class="nav-link text-light" href="patient/appointments">
          <div class="sb-nav-link-icon">
            <i class="fa fa-calendar"></i>
          </div>
          Appointment
        </a>
        <div class="sb-sidenav-menu-heading">History</div>
        <a class="nav-link text-light" href="patient/patientLog">
          <div class="sb-nav-link-icon">
            <i class="fas fa-list text-light"></i>
          </div>
          Your Log
        </a>
        <a class="nav-link text-light" href="patient/appointmentHistory">
          <div class="sb-nav-link-icon">
            <i class="fas fa-history"></i>
          </div>
          Appointment History
        </a>
      </div>
    </div>
    <div class="text-muted text-center py-1" style="background-color: #343a40">
      <div class="text-light-50" id="time"></div>
      <!-- <div class=" text-light">Copyright <a href="dashboard/about"> &copy;Dipesh & Manish</a></div> -->
      <script>
        setInterval(()=>{
          let date = new Date();
          document.querySelector("#time").innerText = `${date.getFullYear()}/${date.getMonth()}/${date.getDate()}   ${date.getHours()}:${date.getMinutes()}:${date.getSeconds()}`;
        }, 1000)
      </script>
    </div>
  </nav>
</div>