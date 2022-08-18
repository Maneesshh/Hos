<?php
require_once "views/shared/links.php";
?>

<head>
    <title>Success</title>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
</head>
<div class="container-fluid mt-3 d-flex justify-content-center">
    <div class="row text-center justify-content-center">
        <div class="col-sm-8 col-sm-offset-3">
            <br><br> <br><br>
            <h1 style="color:#0fad00" class="mt-3">Success</h1>
            <img src="/hospital/images/icons/success.png" width="100">
            <br><br>
            <h3>Dear, Admin</h3>
            <p style="font-size:20px;color:#5C5C5C;">Registration has been successfully.<br> Please visit the
                link
                below to
                enter the user account or you'll be redirected towards previous page in <span id="timer">5</span> .</p>
            <a href="../DashBoard/login" class="btn btn-success">Log in</a>
            <script>
            let time = 5;
            let myinterval = setInterval(() => {
                time -= 1;
                document.querySelector("#timer").innerText = time;
                if (time == 0) {
                    history.go(-1);
                }
            }, 1000);
            </script>
            <br><br>
        </div>

    </div>

</div>