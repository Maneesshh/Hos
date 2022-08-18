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
            <h3>Dear, User</h3>
            <p style="font-size:20px;color:#5C5C5C;">Profile updated successfull<br><br>
            Please login again to update your details system wide.</p>
            <small>You'll be logged out in <span id="timer">5</span></small>
            .</p>
            <script>
            let time = 5;
            let myinterval = setInterval(() => {
                time -= 1;
                document.querySelector("#timer").innerText = time;
                if (time == 0) {
                    location.href = '../dashboard/logout';
                }
            }, 1000);
            </script>
            <br><br>
        </div>

    </div>

</div>