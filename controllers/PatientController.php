<?php
session_start();

if (empty($_SESSION['patient'])) {
    echo "<script>window.location.href = '../dashboard/login';</script>";
}

class PatientController
{
    public $patient;
    private $patientModelObj;
    function __construct()
    {
        require 'services/loader.php';

        $this->patient = $_SESSION['patient'];

        require 'models/PatientModel.php';
        $this->patientModelObj = new PatientModel();
    }
    public function index()
    {
        $docDetails = $this->patientModelObj->getDoctorDetails();
        require './views/Patient/index.php';
    }
    public function bookAppointment()
    {
        $this->patientModelObj->did = $_GET['docId'];
        $this->patientModelObj->dname = $_GET['docName'];

        if ($this->patientModelObj->checkQueue()) {
            $result = $this->patientModelObj->bookAppointment();
            if ($result) {
                require 'views/Patient/success.php';
            } else {
                require 'views/Patient/error.php';
            }
        } else {
            require 'views/Patient/queueFull.php';
        }
    }
    public function patientLog()
    {
        $result = $this->patientModelObj->getPatientLog();
        require './views/Patient/plog.php';
    }
    public function appointments()
    {
        $docList = $this->patientModelObj->getPendingAppoinmentDetails();
        require 'views/Patient/appointments.php';
    }
    public function appointmentHistory(){
        $result = $this->patientModelObj->getAppointmentHistory();
        require 'views/Patient/appointmentHistory.php';
    }
    public function reports(){
        $result = $this->patientModelObj->getReport();
        require 'views/Patient/reports.php';
    }
    public function profile()
    {
        require 'views/Patient/profile.php';
    }
    public function getPatientProfile()
    {

        $this->patientModelObj->name = $_POST['fullname'];
        if (empty($_POST['oldPassword']) && empty($_POST['newPassword'])) {
            $this->patientModelObj->oldPassword = "";
            $this->patientModelObj->newPassword = "";
        } else {
            $this->patientModelObj->oldPassword = md5($_POST['oldPassword']);
            $this->patientModelObj->newPassword = md5($_POST['newPassword']);
        }
        $this->patientModelObj->phone = $_POST['phone'];
        $this->patientModelObj->age = $_POST['age'];
        $this->patientModelObj->add = $_POST['add'];
        if ($_FILES['photo']['size'] == 0) {
            $this->patientModelObj->image = $_SESSION['patient']['pimage'];
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
            $this->patientModelObj->image = $imageDestination;
        }

        $result = $this->patientModelObj->profileDetailsCheck();
        if ($result) {
            if ($this->patientModelObj->updateProfile()) {
                include 'views/shared/updateSuccessfull.php';
            } else {
                include 'views/shared/updateFailure.php';
            }
        } else {
            include "views/shared/fatalError.php";
        }
    }
}
