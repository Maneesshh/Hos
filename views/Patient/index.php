<!DOCTYPE html>
<html lang="en">
<?php
require_once "views/shared/patientlink.php";
require_once 'views/Patient/shared/patientSideNav.php';
?>
<div id="layoutSidenav_content">
  <main>
    <div class="container-fluid">
      <div class="container-fluid"></div>
      <h1 class="mt-4 text-center">Welcome <code>
          <?php $name = explode(" ",  $this->patient['pname']);
          echo $name[0]; ?>
        </code>
      </h1>
      <br>
      <div class="container mycontainer text-center w-100">
        <h2 class="font-weight-light text-center mt-3 mb-3">You can book appointment here</h2>
        <div class="row my-md-5">
          <?php
          $count = 1;
          foreach ($docDetails as $row) {
          ?>
            <div class="col-lg-4 mydocs mb-4">
              <img class="bd-placeholder-img rounded-circle mb-1" width="150" height="150" src="<?php echo $row['dimage']; ?>" />
              <rect width="100%" height="100%" fill="#777" />
              <h2><?php echo "Dr. " . $row['dname']; ?></h2>
              <span><?php echo $row['dspeciality']; ?></span>
              <p class="mt-1">
                <a onclick="
                  if(confirm('Are you sure you want to book the appointment?')){
                    location.href = 'patient/bookAppointment?docId=<?php echo $row['did'] ?>&docName=<?php echo $row['dname'] ?>';
                  }" class="mybtn container-fluid btn btn-outline-success w-75 btn-lg book">Book Appointment</a>
              </p>
            </div>
          <?php } ?>
        </div>
      </div>
    </div>
  </main>
  <?php
  require_once 'views/shared/userFooter.php';
  ?>
</div>
</div>
</body>

</html>