<?php
class DoctorModel
{
  //for patient registration and doctor profile
  public $name;
  public $email;
  public $password;
  public $confirmPassowrd;
  public $phone;
  public $age;
  public $gender;
  public $add;
  public $image;
  public $oldPassword; //for doctor profile
  public $newPassword; //for doctor profile
  public $speciality; //for doctor profile
  public $description; //for doctor profile

  //for password change confirmation
  public $changePassword = false;

  //for report 
  public $report;
  public $appointment;
  public $problem;

  //for patinet info search
  public $data;
  public $parameter;

  //for DB connection
  private $conn;

  function __construct()
  {
    require_once "services/Config.php";
    $this->conn = Config::getConnection();
  }
  public function doctorCount()
  {
    $myQuery = $this->conn->query("SELECT COUNT(*) AS number FROM doctor");
    if ($myQuery) {
      return $myQuery->fetch_assoc();
    } else {
      return "Error";
    }
  }

  public function patientCount()
  {
    $myQuery = $this->conn->query("SELECT COUNT(*) AS number FROM patient");
    if ($myQuery) {
      return $myQuery->fetch_assoc();
    } else {
      return "Error";
    }
  }
  public function maleCount()
  {
    $male = $this->conn->query("SELECT COUNT(*) AS male FROM patient WHERE pgender='m'");
    if ($male) {
      return $male->fetch_assoc();
    } else {
      return "Error";
    }
  }
  public function femaleCount()
  {
    $female = $this->conn->query("SELECT COUNT(*) AS female FROM patient WHERE pgender='f'");
    if ($female) {
      return $female->fetch_assoc();
    } else {
      return "Error";
    }
  }
  public function otherCount()
  {
    $other = $this->conn->query("SELECT COUNT(*) AS other FROM patient WHERE pgender='o'");
    if ($other) {
      return $other->fetch_assoc();
    } else {
      return "Error";
    }
  }

  ///////////////////////////////Patient Registration/////////////////////////////////////
  public function patientRegistraionCheck()
  {
    $nameCheck = false;
    $passwordCheck = false;
    $emailCheck = false;
    $phoneCheck = false;
    $ageCheck = false;
    $addCheck = false;
    $imageCheck = false;
    if (!empty($this->name)) {
      $nameCheck = true;
    }
    if ($this->password == $this->confirmPassword) {
      $passwordCheck = true;
    }
    if (!empty($this->phone) && strlen($this->phone) == 10) {
      $phoneCheck = true;
    }
    if (!empty($this->email)) {
      $emailCheck = true;
    }
    if ($this->age >= 1 && $this->age <= 125) {
      $ageCheck = true;
    }
    if (!empty($this->add)) {
      $addCheck = true;
    }
    if (!empty($this->image)) {
      $imageCheck = true;
    }
    if ($nameCheck && $passwordCheck && $emailCheck && $phoneCheck && $ageCheck && $addCheck && $imageCheck) {
      return true;
    } else {
      return false;
    }
  }

  public function registerPatient()
  {
    $myquery = "INSERT INTO patient (pname,pemail,ppassword,pphone,pgender,page,paddress,pimage) VALUES ('$this->name','$this->email','$this->password','$this->phone','$this->gender','$this->age','$this->add','$this->image')";
    try {
      if ($this->conn->query($myquery)) {
        echo "<script>console.log('Inserted')</script>";
        return true;
      }
    } catch (Exception $e) {
      echo "<script>console.log('$e->getMessage();')</script>";
      return false;
    }
  }
  public function getDoctorLog()
  {
    $docId = $_SESSION['doctor']['did'];
    $sql = "SELECT did,loginTime FROM logs WHERE did='$docId' ORDER BY lid DESC";
    $result = $this->conn->query($sql);
    if ($result) {
      return $result;
    } else {
      return false;
    }
  }
  public function getDoctorAppointments()
  {
    $docId = $_SESSION['doctor']['did'];
    $sql = "SELECT * from patient,appointment WHERE appointment.pid = patient.pid AND status=0 AND did='$docId'";
    $result = $this->conn->query($sql);
    if ($result) {
      return $result;
    } else {
      return false;
    }
  }
  public function getAppointmentHistory()
  {
    $docId = $_SESSION['doctor']['did'];
    $sql = "SELECT * from patient,appointment WHERE appointment.pid = patient.pid AND status!=0 AND did='$docId' ORDER BY `app-ID` DESC ";
    //$sql = "SELECT * FROM appointment WHERE did='$docId' AND status='0'";
    $result = $this->conn->query($sql);
    if ($result) {
      return $result;
    } else {
      return false;
    }
  }

  public function profileDetailsCheck()
  {
    $nameCheck = false;
    $emailCheck = false;
    $phoneCheck = false;
    $addCheck = false;
    $specialityCheck = false;
    $descriptionCheck = false;

    if (!empty($this->name)) {
      $nameCheck = true;
    }
    if (!empty($this->oldPassword) && !empty($this->newPassword)) {
      $this->changePassword = true;
    }
    if (!empty($this->phone) && strlen($this->phone) == 10) {
      $phoneCheck = true;
    }
    if (!empty($this->email)) {
      $emailCheck = true;
    }
    if (!empty($this->speciality)) {
      $specialityCheck = true;
    }
    if (!empty($this->description)) {
      $descriptionCheck = true;
    }
    if (!empty($this->add)) {
      $addCheck = true;
    }
    if ($nameCheck && $emailCheck && $phoneCheck && $specialityCheck && $descriptionCheck && $addCheck) {
      return true;
    } else {
      return false;
    }
  }
  public function updateProfile()
  {
    $dId = $_SESSION['doctor']['did'];
    if ($this->changePassword) {
      if ($this->oldPassword == $_SESSION['doctor']['dpassword'] && strlen($this->newPassword) >= 8) {
        $sql = "UPDATE doctor SET dname='$this->name', demail='$this->email',dspeciality='$this->speciality', ddescription='$this->description', dpassword='$this->newPassword', dphone='$this->phone', daddress='$this->add', dimage='$this->image' WHERE did='$dId'";
        $result = $this->conn->query($sql);
        if ($result) {
          return true;
        } else {
          return false;
        }
      } else {
        return false;
      }
    } else {
      $sql = "UPDATE doctor SET dname='$this->name', demail='$this->email', dphone='$this->phone',dspeciality='$this->speciality', ddescription='$this->description',  daddress='$this->add', dimage='$this->image' WHERE did='$dId'";
      $result = $this->conn->query($sql);
      if ($result) {
        return true;
      } else {
        return false;
      }
    }
  }
  public function updateReport()
  {
    $checked = 1;
    $sql = "UPDATE appointment SET report='$this->report',status=$checked,problem='$this->problem' WHERE `app-ID`='$this->appointment'";
    $result = $this->conn->query($sql);
    if ($result) {
      return true;
    } else {
      return false;
    }
  }
  public function cancelAppointment()
  {
    $cancelled = 2;
    $sql = "UPDATE appointment SET status=$cancelled WHERE `app-ID`='$this->appointment'";
    $result = $this->conn->query($sql);
    if ($result) {
      return true;
    } else {
      return false;
    }
  }
  ///////////////////////Report///////////////////////////////
  public function fetchPatientInfo()
  {
    $searchSql = "";
    switch ($this->parameter) {
      case "name":
        $searchSql = "SELECT * FROM patient WHERE pname like '%$this->data%'";
        break;
      case "email":
        $searchSql = "SELECT * FROM patient WHERE pemail like '%$this->data%'";
        break;
      case "number":
        $searchSql = "SELECT * FROM patient WHERE pphone like '%$this->data%'";
        break;
      default:
        $searchSql = "SELECT * FROM patient";
    }
    return $this->conn->query($searchSql);
  }
  public function getDynamicReport($ID)
  {
    $docId = $_SESSION['doctor']['did'];
    $searchSql = "SELECT * FROM appointment WHERE pid='$ID' AND status='1' AND did='$docId'";
    return $this->conn->query($searchSql);
  }
}
