<?php
session_start();
class DashBoardController
{
    public $DashBoardObj;
    public $adminModeObj;

    public $myemail;
    public $mypassword;

    public $doc;
    //public $docDetails;
    function __construct()
    {
        require 'services/loader.php';

        require 'models/DbModel.php';
        $this->DashBoardObj = new DbModel();

        $this->doc = $this->DashBoardObj->getDoctorDetails(); //for doctor details on landing page

        require 'models/AdminModel.php';
        $this->adminModelObj = new AdminModel();
    }
    function index()
    {
        $docDetails = $this->doc;
        require 'views/DashBoard/index.php';
    }
    function about()
    {
        require 'views/DashBoard/about.php';
    }
    function contact()
    {
        require 'views/DashBoard/contact.php';
    }
    function contactQuery()
    {
        $this->DashBoardObj->cname = $_POST['name'];
        $this->DashBoardObj->cemail = $_POST['email'];
        $this->DashBoardObj->cmessage = $_POST['message'];
        $result = $this->DashBoardObj->storeContactQuery();
        if ($result) {
            echo "
            <script>
            alert('We got you message. You will be recieving from us shortly.');
            location.href = '../../';
            </script>";
        }
    }
    function notice()
    {
        require 'views/DashBoard/notice.php';
    }

    /////////////////////////////////////Signup/////////////////////////////////////////////////
    function signUp()
    {
        $docDetails = $this->doc;
        require 'views/DashBoard/index.php';
        echo "<script>$('#mysignup').modal();</script>";
    }
    function userSignup()
    {
        if (isset($_POST['signup'])) {
            $this->DashBoardObj->name = $_POST['fullname'];
            $this->DashBoardObj->email = $_POST['email'];
            $this->DashBoardObj->password = md5($_POST['password']);
            $this->DashBoardObj->confirmPassword = md5($_POST['confirmPassword']);
            $this->DashBoardObj->phone = $_POST['phone'];
            $this->DashBoardObj->gender = $_POST['gender'];
            $this->DashBoardObj->age = $_POST['age'];
            $this->DashBoardObj->add = $_POST['add'];

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
            $this->DashBoardObj->image = $imageDestination;

            $result = $this->DashBoardObj->evaluateUserDetails();
            if ($result) {
                if ($this->DashBoardObj->insertUserDetails()) {
                    include 'views/DashBoard/success.php';
                } else {
                    include 'views/shared/error.php';
                }
            } else {
                include "views/shared/fatalError.php";
            }
        }
    }
    ######################################Signup###############################################

    /////////////////////////////////////Login/////////////////////////////////////////////////
    function login()
    {
        $docDetails = $this->doc;
        require 'views/DashBoard/index.php';
        echo "<script>$('#mylogin').modal();</script>";
    }
    function loginCheck()
    {

        if (isset($_POST['login'])) {
            //Getting value from the login modal
            $this->myemail = $_POST['emailornum'];
            $this->mypassword = md5($_POST['loginpassword']); //password encryption

            //supplying email and pw to the DB model
            $this->DashBoardObj->loginemail = $this->myemail;
            $this->DashBoardObj->loginpassword = $this->mypassword;
            $this->DashBoardObj->dbObj = $this->DashBoardObj;

            $result = $this->DashBoardObj->userTypeVerification();

            //for unidentified user...
            if ($result == "Unidentified") {
                echo "<script>
                alert('Incorrect email or password.');
                window.location.href = 'login';
                </script>";
                // header("location: login");

            } else {
                $this->userInfo = $this->DashBoardObj->userDetails;
                $staff = $this->userInfo->fetch_assoc();
                switch ($result) {
                    case "Admin":
                        $_SESSION['admin'] = $staff;
                        $this->DashBoardObj->adminLog();
                        echo "<script>window.location.href='../Admin/index';</script>";
                        break;
                    case "Doctor":
                        $_SESSION['doctor'] = $staff;
                        $this->DashBoardObj->doctorLog();
                        echo "<script>window.location.href='../Doctor/index';</script>";
                        break;
                    case "Patient":
                        $_SESSION['patient'] = $staff;
                        $this->DashBoardObj->patientLog();
                        echo "<script>window.location.href='../Patient/index';</script>";
                        break;
                    default:
                        header("location: login");
                }
            }
        }
    }
    ######################################Logout###############################################    
    function logout()
    {
        session_unset();
        session_destroy();
        echo "<script>location.href = '../dashboard/login'</script>";
    }

    ######################################forgot password############################################
    function forgotPassword()
    {
        require 'views/DashBoard/passwordRecovery.php';
    }
    function sendMail()
    {
        $tempMail = $_GET['mailId'];
        $this->DashBoardObj->mailAddress = $tempMail;
        $result = $this->DashBoardObj->sendMailToUser();
        if ($result) {
            echo "<script>alert('Your new login password has been sent to $tempMail.')</script>";
            echo "<script>location.href = '../dashboard/login'</script>";
        } else {
            echo "<script>alert('Mail couldn't be sent.')</script>";
            echo "<script>location.href = '../dashboard/login'</script>";
        }
    }
}
