<?php
class PatientModel
{
    public $did;
    public $dname;

    //for patient profile info
    public $name;
    public $oldPassword;
    public $newPassword;
    public $phone;
    public $age;
    public $image;
    public $add;

    //for password change confirmation
    public $changePassword = false;

    private $conn;
    function __construct()
    {
        require 'services/Config.php';
        $this->conn = Config::getConnection();
        date_default_timezone_set("Asia/Kathmandu");
    }
    ///////////////////////////////////////////////////////////////////////
    public function getDoctorDetails()
    {
        $sql = "SELECT did,dname,dspeciality,ddescription,dimage FROM doctor WHERE dstatus='1' ORDER BY dname ASC";
        $result = $this->conn->query($sql);
        if ($result) {
            return $result;
        } else {
            return false;
        }
    }

    public function getPatientLog()
    {
        $pid = $_SESSION['patient']['pid'];
        $sql = "SELECT pid,loginTime FROM logs WHERE pid='$pid' ORDER BY lid DESC";
        $result = $this->conn->query($sql);
        if ($result) {
            return $result;
        } else {
            return false;
        }
    }

    public function checkQueue()
    {
        $count = $this->conn->query("SELECT count(*) AS num FROM appointment  WHERE did='$this->did' AND status='0'");
        $num = (int)$count->fetch_assoc()['num'];
        //since the count(*) starts from 0. therefore $num <= 1 means 2 patient
        if ($num <= 24) {
            return true;
        } else {
            return false;
        }
    }
    public function bookAppointment()
    {
        $pid = $_SESSION['patient']['pid'];
        $check = "SELECT did,pid FROM appointment WHERE pid='$pid' AND did='$this->did' AND status='0'";
        $result = $this->conn->query($check);
        if (mysqli_num_rows($result) == 0) {
            $bookSql = "INSERT INTO appointment (did,pid) VALUES ('$this->did','$pid')";
            if ($this->conn->query($bookSql)) {
                return true;
            } else {
                return false;
            }
        } else {
            return false;
        }
    }


    public function getPendingAppoinmentDetails()
    {
        $pid = $_SESSION['patient']['pid'];
        $docQuery = "SELECT * from doctor,appointment WHERE appointment.did = doctor.did AND status=0 AND pid='$pid'";
        //$docQuery = "SELECT * FROM appointment WHERE pid='$pid' AND status='0'";
        $docDetails = $this->conn->query($docQuery);
        if (mysqli_num_rows($docDetails) == 0) {
            return false;
        } else {
            return $docDetails;
        }
    }

    public function getAppointmentHistory()
    {
        $PId = $_SESSION['patient']['pid'];
        $sql = "SELECT * from doctor,appointment WHERE appointment.did = doctor.did AND pid='$PId'  ORDER BY `app-ID` DESC ";
        //$sql = "SELECT * FROM appointment WHERE did='$docId' AND status='0'";
        $result = $this->conn->query($sql);
        if ($result) {
            return $result;
        } else {
            return false;
        }
    }

    public function getDynamicAppointment($id)
    {
        $docQuery = "SELECT * from patient,appointment WHERE appointment.pid = patient.pid AND status=0 AND did='$id'";
        //$docQuery = "SELECT * FROM appointment WHERE did='$id' AND status='0'";
        $docDetails = $this->conn->query($docQuery);
        if (mysqli_num_rows($docDetails) == 0) {
            return false;
        } else {
            return $docDetails;
        }
    }
    public function profileDetailsCheck()
    {
        $nameCheck = false;
        $phoneCheck = false;
        $addCheck = false;
        $ageCheck = false;
        if (!empty($this->name)) {
            $nameCheck = true;
        }
        if (!empty($this->oldPassword) && !empty($this->newPassword)) {
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
    public function updateProfile()
    {
        $pId = $_SESSION['patient']['pid'];
        if ($this->changePassword) {
            if ($this->oldPassword == $_SESSION['patient']['ppassword'] && strlen($this->newPassword) >= 8) {
                $sql = "UPDATE patient SET pname='$this->name', ppassword='$this->newPassword',page='$this->age', pphone='$this->phone', paddress='$this->add', pimage='$this->image' WHERE pid='$pId'";
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
            $sql = "UPDATE patient SET pname='$this->name',page='$this->age', pphone='$this->phone', paddress='$this->add', pimage='$this->image' WHERE pid='$pId'";
            $result = $this->conn->query($sql);
            if ($result) {
                return true;
            } else {
                return false;
            }
        }
    }
    public function getReport()
    {
        $pId = $_SESSION['patient']['pid'];
        $searchSql = "SELECT report,date,dname,problem FROM appointment,doctor WHERE doctor.did = appointment.did AND pid='$pId' AND status='1'";
        return $this->conn->query($searchSql);
    }
}
