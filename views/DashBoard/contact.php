<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <title>Contact</title>
</head>


<style>
</style>

<body>
    <?php
    require_once './views/shared/header.php';
    ?>
    <main>
        <section class="jumbotron text-center bg-light">
            <div class="container mt-4">
                <h1 class="display-4 jumbotron-heading">Hamro Hospital</h1>
                <p class="lead text-muted mb-0">Feel free to contact us.</p>
            </div>
        </section>
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="card mb-5">
                        <div class="card-header bg-primary text-white text-center">
                            Contact us
                        </div>
                        <div class="card-body">
                            <form method="post" action="dashboard/contactQuery">
                                <div class="form-group">
                                    <label for="name">Name</label>
                                    <input type="text" class="form-control" name="name" id="name" aria-describedby="emailHelp" placeholder="Enter name" required>
                                </div>
                                <div class="form-group">
                                    <label for="email">Email address</label>
                                    <input type="email" class="form-control" name="email" id="email" aria-describedby="emailHelp" placeholder="Enter email" required>
                                    <small id="emailHelp" class="form-text text-muted">We'll never share
                                        your email with
                                        anyone else.</small>
                                </div>
                                <div class="form-group">
                                    <label for="message">Message</label>
                                    <textarea class="form-control" id="message" name="message" rows="4" required></textarea>
                                </div>
                                <div class="mx-auto">
                                    <button type="submit" class="btn btn-primary text-right float-right">Submit</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-sm-4">
                    <div class="card bg-light mb-3">
                        <div class="card-header bg-success text-white text-uppercase text-center"> Address
                        </div>
                        <div class="card-body">
                            <p>MNNP-15 Dhulabari</p>
                            <p>Jhapa Nepal</p>

                            <p>Email : Hamro.hospital@gmail.com</p>
                            <p>Tel. +977 9862******</p>

                        </div>

                    </div>
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