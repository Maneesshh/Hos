<?php
session_start();

if (empty($_SESSION['admin'])) {
    echo "<script>window.location.href = '../dashboard/login';</script>";
}

class AdminController
{
    public $admin;

    public $searchResult;

    private $AdminModelObj;
    function __construct()
    {
        require 'services/loader.php';

        $this->admin = $_SESSION['admin'];
        include 'models/AdminModel.php';
        $this->AdminModelObj = new AdminModel();

        // include 'models/LogModel.php';
        // $this->LogModelObj = new LogModel();
    }
    function index()
    {
        require 'views/Admin/index.php';
    }
    function addDoctor()
    {
        require 'views/Admin/addDoctor.php';
    }
    function searchDoctor()
    {
        $result = $this->AdminModelObj->getDoctorList();
        require 'views/Admin/searchDoctor.php';
    }
    function addPatient()
    {
        require 'views/Admin/addPatient.php';
    }
    function doctorRegistration()
    {
        $this->AdminModelObj->name = $_POST['fullname'];
        $this->AdminModelObj->email = $_POST['email'];
        $this->AdminModelObj->password = md5($_POST['password']);
        $this->AdminModelObj->confirmPassword = md5($_POST['confirmPassword']);
        $this->AdminModelObj->phone = $_POST['phone'];
        $this->AdminModelObj->speciality = $_POST['speciality'];
        $this->AdminModelObj->description = $_POST['description'];
        $this->AdminModelObj->add = $_POST['add'];

        $docImage = $_FILES['photo'];
        $imageExtension = "";
        if ($docImage['type'] == "image/jpeg") {
            $imageExtension = ".jpeg";
        } elseif ($docImage['type'] == "image/jpg") {
            $imageExtension = ".jpg";
        } elseif ($docImage['type'] == "image/png") {
            $imageExtension = ".png";
        } else {
            $imageExtension = ".svg";
        }
        $docImage['name'] = $_POST['email'] . $imageExtension;
        $imageDestination = "images/staff/" . $docImage['name'];

        if (move_uploaded_file($_FILES['photo']['tmp_name'], $imageDestination)) {
            echo "<script>console.log('Image moved')</script>";
        } else {
            echo "<script>console.log('Image cannot be moved')</script>";
        }
        $this->AdminModelObj->image = $imageDestination;

        $result = $this->AdminModelObj->doctorRegistraionCheck();
        if ($result) {
            if ($this->AdminModelObj->registerDoctor()) {
                require 'views/Admin/success.php';
            } else {
                require 'views/shared/error.php';
            }
        } else {
            require 'views/shared/fatalError.php';
        }
    }

    public function patientRegistration()
    {
        $this->AdminModelObj->name = $_POST['fullname'];
        $this->AdminModelObj->email = $_POST['email'];
        $this->AdminModelObj->password = md5($_POST['password']);
        $this->AdminModelObj->confirmPassword = md5($_POST['confirmPassword']);
        $this->AdminModelObj->phone = $_POST['phone'];
        $this->AdminModelObj->gender = $_POST['gender'];
        $this->AdminModelObj->age = $_POST['age'];
        $this->AdminModelObj->add = $_POST['add'];

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
        $this->AdminModelObj->image = $imageDestination;

        $result = $this->AdminModelObj->patientRegistraionCheck();
        if ($result) {
            if ($this->AdminModelObj->registerPatient()) {
                include 'views/admin/success.php';
            } else {
                include 'views/shared/error.php';
            }
        } else {
            include "views/shared/fatalError.php";
        }
    }
    ////////////////////////Appointment//////////////////////////
    public function allAppointments()
    {
        $docList = $this->AdminModelObj->getAvailableDoctorList();
        require 'views/Admin/appointments.php';
    }
    ////////////////////////Appointment//////////////////////////

    public function contactQueries()
    {
        $result = $this->AdminModelObj->viewContactQuery();
        require 'views/Admin/contactQueries.php';
    }
    public function deleteQuery()
    {
        $id = $_GET['id'];
        $result = $this->AdminModelObj->deleteContactQuery($id);
        if ($result) {
            header("location: contactQueries");
        } else {
            echo "Deletion Failure";
        }
    }
    public function deleteAllQuery()
    {
        $result = $this->AdminModelObj->deleteAllContactQuery();
        if ($result) {
            header("location: contactQueries");
        } else {
            echo "Deletion Failure";
        }
    }

    ////////////////////////LOGS//////////////////////////
    public function systemLog()
    {
        $result = $this->AdminModelObj->getAdminLog();
        require 'views/Admin/sLog.php';
    }
    public function doctorLog()
    {
        $result = $this->AdminModelObj->getDoctorLog();
        require 'views/Admin/dLog.php';
    }
    public function patientLog()
    {
        $result = $this->AdminModelObj->getPatientLog();
        require 'views/Admin/pLog.php';
    }

    public function deleteSystemLog()
    {
        $result = $this->AdminModelObj->deleteAllSystemLog();
        if ($result) {
            header("location: systemLog");
        } else {
            echo "Deletion Failure";
        }
    }
    public function deleteDoctorLog()
    {
        $result = $this->AdminModelObj->deleteAllDoctorLog();
        if ($result) {
            header("location: doctorLog");
        } else {
            echo "Deletion Failure";
        }
    }
    public function deletePatientLog()
    {
        $result = $this->AdminModelObj->deleteAllPatientLog();
        if ($result) {
            header("location: patientLog");
        } else {
            echo "Deletion Failure";
        }
    }
    ////////////////////////LOGS//////////////////////////

    public function profile()
    {
        require 'views/Admin/profile.php';
    }


    public function getAdminProfile()
    {
        $this->AdminModelObj->name = $_POST['fullname'];
        $this->AdminModelObj->email = $_POST['email'];
        if (empty($_POST['oldPassword']) && empty($_POST['newPassword'])) {
            $this->AdminModelObj->oldPassword = "";
            $this->AdminModelObj->newPassword = "";
        } else {
            $this->AdminModelObj->oldPassword = md5($_POST['oldPassword']);
            $this->AdminModelObj->newPassword = md5($_POST['newPassword']);
        }
        $this->AdminModelObj->phone = $_POST['phone'];
        $this->AdminModelObj->add = $_POST['add'];
        if ($_FILES['photo']['size'] == 0) {
            $this->AdminModelObj->image = $_SESSION['admin']['aimage'];
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
            $this->AdminModelObj->image = $imageDestination;
        }

        $result = $this->AdminModelObj->profileDetailsCheck();
        if ($result) {
            if ($this->AdminModelObj->updateProfile()) {
                include 'views/shared/updateSuccessfull.php';
            } else {
                include 'views/shared/updateFailure.php';
            }
        } else {
            include "views/shared/fatalError.php";
        }
    }

    public function getDoctorProfile()
    {
        $this->AdminModelObj->docId = $_GET['docId'];
        $this->AdminModelObj->name = $_POST['fullname'];
        $this->AdminModelObj->email = $_POST['email'];
        if (empty($_POST['newPassword'])) {
            $this->AdminModelObj->newPassword = "";
        } else {
            $this->AdminModelObj->newPassword = md5($_POST['newPassword']);
        }
        $this->AdminModelObj->speciality = $_POST['speciality'];
        $this->AdminModelObj->description = $_POST['description'];
        $this->AdminModelObj->phone = $_POST['phone'];
        $this->AdminModelObj->add = $_POST['add'];
        $this->AdminModelObj->dstatus = $_POST['dstatus'];
        $result = $this->AdminModelObj->doctorProfileCheck();
        if ($result) {
            if ($this->AdminModelObj->updateDoctorProfile()) {
                echo "<script>alert('Update Successfull');history.go(-1)</script>";
            } else {
                echo "<script>alert('Update Unsuccessfull');history.go(-1)</script>";
            }
        } else {
            include "views/shared/fatalError.php";
        }
    }
    public function searchPatient()
    {
        require 'views/Admin/searchPatient.php';
    }
    public function searchPatientInfo()
    {
        $this->AdminModelObj->parameter = $_GET['parameter'];
        $this->AdminModelObj->data = $_GET['search'];
        $this->searchResult = $this->AdminModelObj->fetchPatientInfo();
        require 'views/Admin/searchPatient.php';
    }
    public function selectUpdatePatientRecord()
    {
        $this->AdminModelObj->pId = $_GET['pId'];
        $this->AdminModelObj->name = $_POST['fullname'];
        $this->AdminModelObj->age = $_POST['age'];
        if (empty($_POST['newPassword'])) {
            $this->AdminModelObj->newPassword = "";
        } else {
            $this->AdminModelObj->newPassword = md5($_POST['newPassword']);
        }
        $this->AdminModelObj->phone = $_POST['phone'];
        $this->AdminModelObj->add = $_POST['add'];
        $result = $this->AdminModelObj->patientProfileCheck();
        if ($result) {
            if ($this->AdminModelObj->updatePatientProfile()) {
                echo "<script>alert('Update Successfull');history.go(-1)</script>";
            } else {
                echo "<script>alert('Update Unsuccessfull');history.go(-1)</script>";
            }
        } else {
            include "views/shared/fatalError.php";
        }
    }
}
