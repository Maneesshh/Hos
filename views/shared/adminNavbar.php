<?php
if (empty($_SESSION['admin'])) {
  echo "<script>window.location.href = 'dashboard/login';</script>";
}
?>

<base href="/hospital/">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
</head>
<nav class="sb-topnav navbar navbar-expand navbar-dark position-fixed w-100" style="background-color: #343a40">
    <a class="navbar-brand" href="#">
        <img src="images/icons/logo.png" width="30" height="30" class="d-inline-block align-top mr-1" alt="" />Hamro
        Hospital</a>
    <button class="btn btn-link btn-sm order-1 order-lg-0 ml-lg-3 btn-outline-dark" id="sidebarToggle" href="#">
        <i class="fas fa-bars text-light"></i>
    </button>
    <!-- Navbar-->
    <ul class="navbar-nav ml-auto ml-md-0 w-100 d-flex justify-content-end">
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" id="userDropdown" href="#" role="button" data-toggle="dropdown"
                aria-haspopup="true" aria-expanded="false"><i class="fas fa-user fa-fw text-light"></i></a>
            <div class="dropdown-menu dropdown-menu-right mt-2" aria-labelledby="userDropdown">
                <div class="container-fluid">
                    <div class="col w-100">
                        <div class="row">
                            <img class="img-fluid rounded mw-100" src="<?php echo $this->admin['aimage']; ?>" />
                        </div>

                        <div class="text-center font-weight-bold mt-1">
                            <span class="font-weight-lighter"><?php echo $this->admin['aname']; ?></span><a href="admin/profile" class="text-decoration-none text-black-50">
                                <span class="font-weight-lighter mt-1"><br>Edit <i class="fas fa-edit"></i></span>
                            </a>
                        </div>
                        <div class="dropdown-divider w-100"></div>
                        <div class="row">
                            <a href="dashboard/logout" class="w-100 text-decoration-none">
                                <button class="btn btn-sm btn-danger btn-block">
                                    LogOut
                                </button></a>
                        </div>
                    </div>
                </div>
            </div>
        </li>
    </ul>
</nav>