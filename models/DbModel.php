<?php
class DbModel
{
    //for signup
    public $name;
    public $email;
    public $password;
    public $confirmPassword;
    public $phone;
    public $gender;
    public $age;
    public $add;
    public $image;

    //for login
    public $loginemail;
    public $loginpassword;

    //fetched user details
    public $userDetails;

    //for contactQuery
    public $cname;
    public $cemail;
    public $cmessage;

    //for objects
    public $dbObj;
    private $conn;

    //for forgotten password
    public $mailAddress;

    function __construct()
    {
        require 'services/Config.php';
        $this->conn = Config::getConnection();
        date_default_timezone_set("Asia/Kathmandu");
    }
    ///////////////////////////////////////////////////////////////////////

    public function getDoctorDetails()
    {
        $sql = "SELECT dname,dspeciality,ddescription,dimage FROM doctor WHERE dstatus='1' ORDER BY dname ASC ";
        $result = $this->conn->query($sql);
        if ($result) {
            return $result;
        } else {
            return false;
        }
    }
    ///////////////////////////////////////////////////For ContactQuery/////////////////////////////////////////////////////////////////////
    public function storeContactQuery()
    {
        $sql = "INSERT INTO contactquery (cname,cemail,cmessage) VALUES ('$this->cname','$this->cemail','$this->cmessage')";
        $result = $this->conn->query($sql);
        if ($result) {
            return true;
        } else {
            return false;
        }
    }
    ///////////////////////////////////////////////////For Signup/////////////////////////////////////////////////////////////////////

    public function evaluateUserDetails()
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

    public function insertUserDetails()
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

    ///////////////////////////////////////////////////For Signup/////////////////////////////////////////////////////////////////////


    ///////////////////////////////////////////////////For login/////////////////////////////////////////////////////////////////////
    public function isAdmin()
    {
        $adminSql = "SELECT * FROM admin WHERE aemail= '$this->loginemail' AND apassword='$this->loginpassword'";
        $result = $this->conn->query($adminSql);
        $rowCount = mysqli_num_rows($result);
        if ($rowCount == 0) {
            return false;
        } else {
            $this->userDetails = $result;
            return true;
        }
    }
    public function isDoctor()
    {
        $this->doctorSql = "SELECT * FROM doctor WHERE demail='$this->loginemail' AND dpassword='$this->loginpassword' AND dstatus='1'";
        $result = $this->conn->query($this->doctorSql);
        if (mysqli_num_rows($result) == 0) {
            return false;
        } else {
            $this->userDetails = $result;
            return true;
        }
    }
    public function isPatient()
    {
        $this->patientSql = "SELECT * FROM patient WHERE pemail='$this->loginemail' AND ppassword='$this->loginpassword'";
        $result = $this->conn->query($this->patientSql);
        if (mysqli_num_rows($result) == 0) {
            return false;
        } else {
            $this->userDetails = $result;
            return true;
        }
    }

    public function userTypeVerification()
    {
        if ($this->dbObj->isAdmin()) {
            return "Admin";
        } elseif ($this->dbObj->isDoctor()) {
            return "Doctor";
        } elseif ($this->dbObj->isPatient()) {
            return "Patient";
        } else {
            return "Unidentified";
        }
    }
    ///////////////////////////////////////////////////For login/////////////////////////////////////////////////////////////////////


    ///////////////////////////////////////////////////For logs/////////////////////////////////////////////////////////////////////
    public function adminLog()
    {
        $time = date("Y/m/d D h:i A");
        $detail = $_SESSION['admin']['aid'];
        $sql = "INSERT INTO logs (aid,loginTime) VALUES ('$detail','$time')";
        if ($this->conn->query($sql)) {
            echo "<script>console.log('Log inserted');</script>";
        } else {
            echo "<script>console.log('Log Failure');</script>";
        }
    }
    public function doctorLog()
    {
        $time = date("Y/m/d D h:i A");
        $detail = $_SESSION['doctor']['did'];
        $sql = "INSERT INTO logs (did,loginTime) VALUES ('$detail','$time')";
        if ($this->conn->query($sql)) {
            echo "<script>console.log('Log inserted');</script>";
        } else {
            echo "<script>console.log('Log Failure');</script>";
        }
    }
    public function patientLog()
    {
        $time = date("Y/m/d D h:i A");
        $detail = $_SESSION['patient']['pid'];
        $sql = "INSERT INTO logs (pid,loginTime) VALUES ('$detail','$time')";
        if ($this->conn->query($sql)) {
            echo "<script>console.log('Log inserted');</script>";
        } else {
            echo "<script>console.log('Log Failure');</script>";
        }
    }
    ///////////////////////////////////////////////////For logs/////////////////////////////////////////////////////////////////////

    ///////////////////////////////////////////////////For forgotPassword///////////////////////////////////////////////////////////
    public function getForgotUserDetail($email)
    {
        $sql = "SELECT pemail,pimage FROM patient WHERE pemail='$email'";
        $result = $this->conn->query($sql);
        if ($result) {
            return $result;
        } else {
            return false;
        }
    }
    public function sendMailToUser()
    {
        $newPassword = (rand(0, 9) . rand(0, 9) . rand(0, 9) . rand(0, 9) . rand(0, 9) . rand(0, 9) . rand(0, 9) . rand(0, 9));
        // echo "<script>alert('$newPassword')</script>";
        $hashedPassword = md5($newPassword);
        $sql = "UPDATE patient SET ppassword='$hashedPassword' WHERE pemail='$this->mailAddress'";
        $result = $this->conn->query($sql);
        if ($result) {
            $to = $this->mailAddress;
            $subject = "Password Changed Successfully";
            $body = "Your new login password for $this->mailAddress is $newPassword";
            $headers = "From: HamroHospital.com";
            if (mail($to, $subject, $body, $headers)) {
                return true;
            } else {
                return false;
            }
        } else {
            return false;
        }
    }
}
