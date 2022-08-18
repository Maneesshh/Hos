<?php
session_start();

if (empty($_SESSION['doctor'])) {
    echo "<script>window.location.href = '../dashboard/login';</script>";
}

class DoctorController
{
    public $doctor;
    public $searchResult;

    private $doctorModelObj;
    function __construct()
    {
        require 'services/loader.php';

        $this->doctor = $_SESSION['doctor'];
        include 'models/DoctorModel.php';
        $this->doctorModelObj = new DoctorModel();
    }
    function index()
    {
        require 'views/Doctor/index.php';
    }
    function addPatient()
    {
        require 'views/Doctor/preg.php';
    }
    function searchReport()
    {
        require 'views/Doctor/search.php';
    }
    public function searchReportInfo(){
        $this->doctorModelObj->parameter = $_GET['parameter'];
        $this->doctorModelObj->data = $_GET['search'];
        $this->searchResult = $this->doctorModelObj->fetchPatientInfo();
        require 'views/Doctor/search.php';
    }
    public function patientRegistration()
    {
        $this->doctorModelObj->name = $_POST['fullname'];
        $this->doctorModelObj->email = $_POST['email'];
        $this->doctorModelObj->password = md5($_POST['password']);
        $this->doctorModelObj->confirmPassword = md5($_POST['confirmPassword']);
        $this->doctorModelObj->phone = $_POST['phone'];
        $this->doctorModelObj->gender = $_POST['gender'];
        $this->doctorModelObj->age = $_POST['age'];
        $this->doctorModelObj->add = $_POST['add'];

        $myImage = $_FILES['photo'];
        $imageExtension = "";
        if ($myImage['type'] == "image/jpeg") {
            $imageExtension = ".jpeg";
        } elseif ($myImage['type'] == "image/jpg") {
            $imageExtension = ".jpg";
        } elseif ($myImage['type'] == "image/png") {
            $imageExtension = ".png";
        } else {
            $imageExtension = ".svg";
        }
        $myImage['name'] = $_POST['email'] . $imageExtension;
        $imageDestination = "images/users/" . $myImage['name'];

        if (move_uploaded_file($_FILES['photo']['tmp_name'], $imageDestination)) {
            echo "<script>console.log('Image moved')</script>";
        } else {
            echo "<script>console.log('Image cannot be moved')</script>";
        }
        $this->doctorModelObj->image = $imageDestination;

        $result = $this->doctorModelObj->patientRegistraionCheck();
        if ($result) {
            if ($this->doctorModelObj->registerPatient()) {
                include 'views/doctor/success.php';
            } else {
                include 'views/shared/error.php';
            }
        } else {
            include "views/shared/fatalError.php";
        }
    }
    public function doctorLog()
    {
        $result = $this->doctorModelObj->getDoctorLog();
        require 'views/Doctor/dlog.php';
    }
    public function appointmentHistory()
    {
        $result = $this->doctorModelObj->getAppointmentHistory();
        require 'views/Doctor/appointmentHistory.php';
    }
    public function appointments()
    {
        $result = $this->doctorModelObj->getDoctorAppointments();
        require 'views/Doctor/appointments.php';
    }
    public function profile()
    {
        require 'views/Doctor/profile.php';
    }
    public function getDoctorProfile()
    {
        $this->doctorModelObj->name = $_POST['fullname'];
        $this->doctorModelObj->email = $_POST['email'];
        if (empty($_POST['oldPassword']) && empty($_POST['newPassword'])) {
            $this->doctorModelObj->oldPassword = "";
            $this->doctorModelObj->newPassword = "";
        } else {
            $this->doctorModelObj->oldPassword = md5($_POST['oldPassword']);
            $this->doctorModelObj->newPassword = md5($_POST['newPassword']);
        }
        $this->doctorModelObj->speciality = $_POST['speciality'];
        $this->doctorModelObj->description = $_POST['description'];
        $this->doctorModelObj->phone = $_POST['phone'];
        $this->doctorModelObj->add = $_POST['add'];
        if ($_FILES['photo']['size'] == 0) {
            $this->doctorModelObj->image = $_SESSION['doctor']['dimage'];
        } else {
            $myImage = $_FILES['photo'];
            $imageExtension = "";
            if ($myImage['type'] == "image/jpeg") {
                $imageExtension = ".jpeg";
            } elseif ($myImage['type'] == "image/jpg") {
                $imageExtension = ".jpg";
            } elseif ($myImage['type'] == "image/png") {
                $imageExtension = ".png";
            } else {
                $imageExtension = ".svg";
            }
            $myImage['name'] = $_POST['email'] . $imageExtension;
            $imageDestination = "images/staff/" . $myImage['name'];

            if (move_uploaded_file($_FILES['photo']['tmp_name'], $imageDestination)) {
                echo "<script>console.log('Image moved')</script>";
            } else {
                echo "<script>console.log('Image cannot be moved')</script>";
            }
            $this->doctorModelObj->image = $imageDestination;
        }

        $result = $this->doctorModelObj->profileDetailsCheck();
        if ($result) {
            if ($this->doctorModelObj->updateProfile()) {
                include 'views/shared/updateSuccessfull.php';
            } else {
                include 'views/shared/updateFailure.php';
            }
        } else {
            include "views/shared/fatalError.php";
        }
    }
    public function cancelPatientAppointment()
    {
        $this->doctorModelObj->appointment = $_GET['appointment'];
        if($this->doctorModelObj->cancelAppointment()){
            //echo "cancelled";
            echo "<script>history.go(-1);</script>";
        }
    }
    public function updatePatientReport()
    {
        date_default_timezone_set("Asia/Kathmandu");
        $time = date("YmdDhiA");
        $appID = $_GET['appointment'];
        $pemail = $_GET['pemail'];
        if ($_FILES['photo']['size'] == 0) {
            $this->doctorModelObj->report = NULL;
        } else {
            $myImage = $_FILES['photo'];
            $imageExtension = "";
            if ($myImage['type'] == "image/jpeg") {
                $imageExtension = ".jpeg";
            } elseif ($myImage['type'] == "image/jpg") {
                $imageExtension = ".jpg";
            } elseif ($myImage['type'] == "image/png") {
                $imageExtension = ".png";
            } else {
                $imageExtension = ".svg";
            }
            $myImage['name'] = $pemail . "_" . $time . $imageExtension;
            $url = "images/report/$pemail";
            if (!(is_dir($url))) {
                mkdir($url);
            }
            $reportDestination = "images/report/$pemail/" . $myImage['name'];
            if (move_uploaded_file($_FILES['photo']['tmp_name'], $reportDestination)) {
                echo "<script>console.log('Image moved')</script>";
            } else {
                echo "<script>console.log('Image cannot be moved')</script>";
            }
            $this->doctorModelObj->report = $reportDestination;
            $this->doctorModelObj->appointment = $appID;
            $this->doctorModelObj->problem = $_POST['problem'];
        }
        
        if ($this->doctorModelObj->updateReport()) {
            echo "<script>alert('updated');history.go(-1);</script>";
        } else {
            echo "<script>alert('failed');history.go(-1);</script>";
        }
    }
}
