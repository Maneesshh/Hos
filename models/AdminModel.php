<?php
class AdminModel
{
    //for doctor/patient registration and admin/doctor updation
    public $name;
    public $email;
    public $password;
    public $confirmPassowrd;
    public $oldPassword;
    public $newPassword; //from admin/profile
    public $phone;
    public $age; //for patients
    public $gender; //for patients
    public $speciality; //for doctors
    public $description; //for doctors
    public $add;
    public $dstatus; //for availability
    public $image;

    //for doctor id and password change confirmation
    public $docId;
    public $pId;
    public $changePassword = false;

    //for patinet info search
    public $data;
    public $parameter;


    //for DB connection
    private $conn;

    public function __construct()
    {
        require_once 'services/config.php';
        $this->conn = Config::getConnection();
    }
    //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    public function adminCount()
    {
        $myQuery = $this->conn->query("SELECT COUNT(*) AS number FROM admin");
        if ($myQuery) {
            return $myQuery->fetch_assoc();
        } else {
            return "Error";
        }
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
    public function totalAppointmentCount()
    {
        $myQuery = $this->conn->query("SELECT COUNT(*) AS number FROM appointment WHERE status='0'");
        if ($myQuery) {
            return $myQuery->fetch_assoc();
        } else {
            return "Error";
        }
    }
    public function checkedAppointmentCount()
    {
        $myQuery = $this->conn->query("SELECT COUNT(*) AS number FROM appointment WHERE status='1'");
        if ($myQuery) {
            return $myQuery->fetch_assoc();
        } else {
            return "Error";
        }
    }
    public function cancelledAppointmentCount()
    {
        $myQuery = $this->conn->query("SELECT COUNT(*) AS number FROM appointment WHERE status='2'");
        if ($myQuery) {
            return $myQuery->fetch_assoc();
        } else {
            return "Error";
        }
    }

    ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    public function viewContactQuery()
    {
        $sql = "SELECT * FROM contactquery order by cid DESC";
        $result = $this->conn->query($sql);
        if ($result) {
            return $result;
        } else {
            return false;
        }
    }
    public function deleteContactQuery($id)
    {
        $sql = "DELETE FROM contactquery WHERE cid='$id'";
        $result = $this->conn->query($sql);
        if ($result) {
            return true;
        } else {
            return false;
        }
    }
    public function deleteAllContactQuery()
    {
        $sql = "TRUNCATE TABLE contactquery";
        $result = $this->conn->query($sql);
        if ($result) {
            return true;
        } else {
            return false;
        }
    }
    //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    public function doctorRegistraionCheck()
    {
        $nameCheck = false;
        $passwordCheck = false;
        $emailCheck = false;
        $phoneCheck = false;
        $specialityCheck = false;
        $descriptionCheck = false;
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
        if (!empty($this->speciality)) {
            $specialityCheck = true;
        }
        if (!empty($this->description)) {
            $descriptionCheck = true;
        }
        if (!empty($this->add)) {
            $addCheck = true;
        }
        if (!empty($this->image)) {
            $imageCheck = true;
        }
        if ($nameCheck && $passwordCheck && $emailCheck && $phoneCheck && $specialityCheck && $descriptionCheck && $addCheck && $imageCheck) {
            return true;
        } else {
            return false;
        }
    }

    public function registerDoctor()
    {
        $myquery = "INSERT INTO doctor (dname,demail,dpassword,dphone,dspeciality,ddescription,daddress,dimage) VALUES ('$this->name','$this->email','$this->password','$this->phone','$this->speciality','$this->description','$this->add','$this->image')";
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

    public function doctorProfileCheck()
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
        if (!empty($this->newPassword)) {
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

    public function updateDoctorProfile()
    {

        if ($this->changePassword) {
            if (strlen($this->newPassword) >= 8) {
                $sql = "UPDATE doctor SET dname='$this->name', demail='$this->email',dspeciality='$this->speciality', ddescription='$this->description', dpassword='$this->newPassword', dphone='$this->phone', daddress='$this->add', dstatus='$this->dstatus' WHERE did='$this->docId'";
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
            $sql = "UPDATE doctor SET dname='$this->name', demail='$this->email', dphone='$this->phone',dspeciality='$this->speciality', ddescription='$this->description',  daddress='$this->add', dstatus='$this->dstatus'  WHERE did='$this->docId'";
            $result = $this->conn->query($sql);
            if ($result) {
                return true;
            } else {
                return false;
            }
        }
    }
    /////////////////////////////////////////////////////////////////////////////////////////////////
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
    //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    public function getAdminLog()
    {
        $id = $_SESSION['admin']['aid'];
        $sql = "SELECT aid,loginTime FROM logs WHERE aid='$id' ORDER BY lid DESC";
        $result = $this->conn->query($sql);
        if ($result) {
            return $result;
        } else {
            return false;
        }
    }
    public function getDoctorLog()
    {
        $sql = "SELECT did,loginTime FROM logs WHERE did IS NOT NULL ORDER BY lid DESC";
        $result = $this->conn->query($sql);
        if ($result) {
            return $result;
        } else {
            return false;
        }
    }
    public function getDoctorNameById($id)
    {
        $sql = "SELECT dname FROM doctor WHERE did='$id'";
        $result = $this->conn->query($sql);
        if ($result) {
            return $result->fetch_assoc();
        } else {
            return false;
        }
    }
    public function deleteAllSystemLog()
    {
        $sql = "DELETE from logs where aid is not null;";
        $result = $this->conn->query($sql);
        if ($result) {
            return true;
        } else {
            return false;
        }
    }
    public function deleteAllDoctorLog()
    {
        $sql = "DELETE from logs where did is not null;";
        $result = $this->conn->query($sql);
        if ($result) {
            return true;
        } else {
            return false;
        }
    }
    public function deleteAllPatientLog()
    {
        $sql = "DELETE from logs where pid is not null;";
        $result = $this->conn->query($sql);
        if ($result) {
            return true;
        } else {
            return false;
        }
    }


    public function getPatientLog()
    {
        $sql = "SELECT pid,loginTime FROM logs WHERE pid IS NOT NULL ORDER BY lid DESC";
        $result = $this->conn->query($sql);
        if ($result) {
            return $result;
        } else {
            return false;
        }
    }
    public function getPatientNameById($id)
    {
        $sql = "SELECT pname FROM patient WHERE pid='$id'";
        $result = $this->conn->query($sql);
        if ($result) {
            return $result->fetch_assoc();
        } else {
            return false;
        }
    }
    //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    public function getDoctorList()
    {
        $sql = "SELECT * FROM doctor ORDER BY dname ASC";
        $result = $this->conn->query($sql);
        if ($result) {
            return $result;
        } else {
            return false;
        }
    }
    public function getAvailableDoctorList()
    {
        $sql = "SELECT * FROM doctor WHERE dstatus='1' ORDER BY dname ASC";
        $result = $this->conn->query($sql);
        if ($result) {
            return $result;
        } else {
            return false;
        }
    }

    public function getDynamicAppointment($docId)
    {
        $sql = "SELECT * from patient,appointment WHERE appointment.pid = patient.pid AND status=0 AND did='$docId'";
        //$sql = "SELECT * FROM appointment WHERE did='$docId' AND status='0'";
        $result = $this->conn->query($sql);
        if ($result) {
            return $result;
        } else {
            return false;
        }
    }
    //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    public function profileDetailsCheck()
    {
        $nameCheck = false;
        $emailCheck = false;
        $phoneCheck = false;
        $addCheck = false;
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
        if (!empty($this->add)) {
            $addCheck = true;
        }
        if ($nameCheck && $emailCheck && $phoneCheck && $addCheck) {
            return true;
        } else {
            return false;
        }
    }
    public function updateProfile()
    {
        if ($this->changePassword) {
            if ($this->oldPassword == $_SESSION['admin']['apassword'] && strlen($this->newPassword) >= 8) {
                $sql = "UPDATE admin SET aname='$this->name', aemail='$this->email', apassword='$this->newPassword', aphone='$this->phone', aaddress='$this->add', aimage='$this->image'";
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
            $sql = "UPDATE admin SET aname='$this->name', aemail='$this->email', aphone='$this->phone', aaddress='$this->add', aimage='$this->image'";
            $result = $this->conn->query($sql);
            if ($result) {
                return true;
            } else {
                return false;
            }
        }
    }
    //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
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
        $searchSql = "SELECT * FROM appointment WHERE pid='$ID' AND status='1'";
        return $this->conn->query($searchSql);
    }

    public function patientProfileCheck()
    {
        $nameCheck = false;
        $ageCheck = false;
        $phoneCheck = false;
        $addCheck = false;
        if (!empty($this->name)) {
            $nameCheck = true;
        }
        if (!empty($this->newPassword)) {
            $this->changePassword = true;
        }
        if (!empty($this->phone) && strlen($this->phone) == 10) {
            $phoneCheck = true;
        }
        if ($this->age >= 1 && $this->age <= 125) {
            $ageCheck = true;
        }
        if (!empty($this->add)) {
            $addCheck = true;
        }
        if ($nameCheck && $ageCheck && $phoneCheck && $addCheck) {
            return true;
        } else {
            return false;
        }
    }
    public function updatePatientProfile()
    {
        if ($this->changePassword) {
            if (strlen($this->newPassword) >= 8) {
                $sql = "UPDATE patient SET pname='$this->name', page='$this->age', ppassword='$this->newPassword', pphone='$this->phone', paddress='$this->add' where pid='$this->pId'";
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
            $sql = "UPDATE patient SET pname='$this->name', page='$this->age', pphone='$this->phone', paddress='$this->add' where pid='$this->pId'";
            $result = $this->conn->query($sql);
            if ($result) {
                return true;
            } else {
                return false;
            }
        }
    }
}
