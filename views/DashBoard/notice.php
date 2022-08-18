<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <title>Notice</title>

</head>

<body>
    <?php
    require_once './views/shared/header.php';
    ?>
    <main>
        <section class="jumbotron text-center bg-light mb-1">
            <div class="container mt-4">
                <h1 class="display-4 jumbotron-heading">Hamro Hospital</h1>
                <p class="lead text-muted mb-0">Notice Board</p>
            </div>
        </section>
        <div class="container-fluid px-4 ">

            <div class="row">
                <div class="col-md-6">
                    <div class="card bg-light mb-3">
                        <div class="card-header bg-info text-white text-uppercase text-center"> Schedule
                        </div>
                        <div class="card-body">
                            <p>> Hospital opens at 10am and closes at 9pm.</p>
                            <p>> Emergency services are available 24hrs but a valid reason is needed.
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="card bg-light mb-3">
                        <div class="card-header bg-success text-white text-uppercase text-center"> Vaccancy
                        </div>
                        <div class="card-body">
                            <p>> Vaccancy will be available shortly.</p>
                            <p>> Please contact us for more informtion.</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card bg-light mb-3 ">
                <div class="card-header bg-info text-white text-uppercase text-center"> Rules
                </div>
                <div class="card-body">
                    <p>> Wearing the <strong>mask</strong> is compulsory.</p>
                    <p>> Limit visitors to two per patient at one time.</p>
                    <p>> Maintain low voice tones in all areas of the hospital.</p>
                    <p>> Restrict calls to patient rooms after 9 p.m.</p>
                    <p>> Avoid visiting in hallways in patient care areas.</p>
                    <p>> Patients must bring their report if they have cheked up previously.
                    </p>
                </div>
            </div>

            <div class="card bg-light mb-3 ">
                <div class="card-header bg-secondary text-white text-uppercase text-center">Lan Testing
                </div>
                <div class="card-body">
                    <?php
                    $resultCode = "";
                    exec('ipconfig', $resultCode);
                    if (empty($resultCode[36])) {
                        echo "<p class='h5 text-center'>Please connect to a Wifi/Hotspot.</p>";
                    } else {
                        $myIp = $resultCode[36];
                        $ipV4 = explode(":", $myIp);
                        echo "<p>You can use this WebApp in your android device by entering <strong>" . $ipV4[1] . "</strong> in your browser.</p>";
                    }
                    ?>
                </div>
            </div>
        </div>
    </main>
    <!-- Footer-->
    <?php
    require './views/shared/footer.php';
    ?>
</body>

</html>