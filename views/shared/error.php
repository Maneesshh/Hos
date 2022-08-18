<?php
require_once "views/shared/links.php";
?>

<head>
    <title>Error</title>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
</head>
<div class="container-fluid mt-3 d-flex justify-content-center">
    <div class="row text-center justify-content-center">
        <div class="col-sm-6 col-sm-offset-3">
            <br><br> <br><br>
            <h1 class="mt-3 text-danger font-weight-bolder">Error</h1>
            <img src="/hospital/images/icons/wrong.jpg" style="border-radius:100%;" width="150">
            <br>
            <h3>Dear, User</h3>
            <p style="font-size:20px;color:#5C5C5C;">Please use proper details or try using another email
                address to continue.</p>
            <p style="font-size:15px;color:#5C5C5C;">You'll be redirected to previous page in <span id="timer">5</span>.
            </p>

            <script>
            let time = 5;
            let myinterval = setInterval(() => {
                time -= 1;
                document.querySelector("#timer").innerText = time;
                if (time == 0) {
                    history.go(-1);
                    //$("#mysignup").modal();
                }
            }, 1000);
            </script>
            <br><br>
        </div>

    </div>

</div>