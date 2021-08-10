<?php

    require_once 'auth.php';

    $page = $_GET['page'];

    $dashboard = '';
    $product = '';
    $order = '';

    if ($page == "dashboard"){
        $dashboard = 'active';
    }if ($page == "productNew" || $page == "productDisplay" || $page == "productEdit"){
        $product = 'active';
    }if ($page == "orderNew" || $page == "orderDisplay" || $page == "orderEdit"){
        $order = 'active';
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <title>RSG Medicare</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="assets/vendors/mdi/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="assets/vendors/flag-icon-css/css/flag-icon.min.css">
    <link rel="stylesheet" href="assets/vendors/css/vendor.bundle.base.css">
    <!-- endinject -->
    <!-- Plugin css for this page -->
    <link rel="stylesheet" href="assets/vendors/jquery-bar-rating/css-stars.css" />
    <link rel="stylesheet" href="assets/vendors/font-awesome/css/font-awesome.min.css" />
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <!-- endinject -->
    <!-- Layout styles -->
    <link rel="stylesheet" href="assets/css/demo_1/style.css" />
    <!-- End layout styles -->
    <link rel="shortcut icon" href="assets/images/favicon.png" />
</head>
<body>
<div class="container-scroller">
    <!-- partial:partials/_sidebar.html -->
    <nav class="sidebar sidebar-offcanvas" id="sidebar">
        <ul class="nav">
            <li class="nav-item nav-profile border-bottom">
                <a href="#" class="nav-link flex-column">
                    <div class="nav-profile-image">
                        <img src="assets/images/faces/face1.jpg" alt="profile" />
                        <!--change to offline or busy as needed-->
                    </div>
                    <div class="nav-profile-text d-flex ml-0 mb-3 flex-column">
                        <span class="font-weight-semibold mb-1 mt-2 text-center"><?=$auth['name'];?></span>
                        <span class="text-secondary icon-sm text-center">
                            <?php if ($auth['role'] == 1): ?>
                                Admin
                            <?php else: ?>
                                User
                            <?php endif; ?>
                        </span>
                    </div>
                </a>
            </li>
            <li class="nav-item pt-3">
                <a class="nav-link d-block" href="home.php?page=dashboard">
                    <img class="sidebar-brand-logo" src="assets/images/logo.jpeg" width="148px" height="46" alt="" />
                    <img class="sidebar-brand-logomini" src="assets/images/logo-mini.svg" alt="" />
                    <div class="small font-weight-light pt-1">RSG Medicare</div>
                </a>
            </li>
            <li class="pt-2 pb-1">
                <span class="nav-item-head">Menu</span>
            </li>
            <li class="nav-item <?=$dashboard;?>">
                <a class="nav-link" href="home.php?page=dashboard">
                    <i class="mdi mdi-compass-outline menu-icon"></i>
                    <span class="menu-title">Dashboard</span>
                </a>
            </li>
            <?php if ($auth['role'] == 1):?>
                <li class="nav-item <?=$product;?>">
                    <a class="nav-link" data-toggle="collapse" href="#ui-product" aria-expanded="false" aria-controls="ui-product">
                        <i class="mdi mdi-shopping"></i> &nbsp;
                        <span class="menu-title">Products</span>
                        <i class="menu-arrow"></i>
                    </a>
                    <div class="collapse" id="ui-product">
                        <ul class="nav flex-column sub-menu">
                            <li class="nav-item">
                                <a class="nav-link" href="home.php?page=productNew">New</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="home.php?page=productDisplay">Display</a>
                            </li>
                        </ul>
                    </div>
                </li>
            <?php endif; ?>
            <li class="nav-item <?=$order;?>">
                <a class="nav-link" href="home.php?page=orderDisplay">
                    <i class="mdi mdi-cart"></i>&nbsp;
                    <span class="menu-title">Order</span>
                </a>
            </li>
        </ul>
    </nav>
    <!-- partial -->
    <div class="container-fluid page-body-wrapper">
        <!-- partial:partials/_navbar.html -->
        <nav class="navbar default-layout-navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
            <div class="navbar-menu-wrapper d-flex align-items-stretch">
                <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
                    <span class="mdi mdi-chevron-double-left"></span>
                </button>
                <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center">
                    <a class="navbar-brand brand-logo-mini" href="home.html"><img src="../assets/images/logo-mini.svg" alt="logo" /></a>
                </div>
                <ul class="navbar-nav navbar-nav-right">
                    <li class="nav-item nav-logout d-none d-md-block mr-3">
                        <a class="nav-link" href="home.php?page=profile">Profile</a>
                    </li>
                    <li class="nav-item nav-logout d-none d-lg-block">
                        <a class="nav-link" href="logout.php">
                            <i class="mdi mdi-logout"></i>
                        </a>
                    </li>
                </ul>
                <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
                    <span class="mdi mdi-logout"></span>
                </button>
            </div>
        </nav>
        <!-- partial -->
        <div class="main-panel">
            <div class="content-wrapper pb-0">
                <?php include $page . '.php'; ?>
            </div>
            <!-- content-wrapper ends -->
            <!-- partial:partials/_footer.html -->
            <footer class="footer">
                <div class="d-sm-flex justify-content-center justify-content-sm-between">
                    <span class="text-muted d-block text-center text-sm-left d-sm-inline-block">Copyright © RSG Medicare 2021</span>
                </div>
            </footer>
            <!-- partial -->
        </div>
        <!-- main-panel ends -->
    </div>
    <!-- page-body-wrapper ends -->
</div>
<!-- container-scroller -->
<!-- plugins:js -->
<script src="assets/vendors/js/vendor.bundle.base.js"></script>
<!-- endinject -->
<!-- Plugin js for this page -->
<script src="assets/vendors/jquery-bar-rating/jquery.barrating.min.js"></script>
<script src="assets/vendors/chart.js/Chart.min.js"></script>
<script src="assets/vendors/flot/jquery.flot.js"></script>
<script src="assets/vendors/flot/jquery.flot.resize.js"></script>
<script src="assets/vendors/flot/jquery.flot.categories.js"></script>
<script src="assets/vendors/flot/jquery.flot.fillbetween.js"></script>
<script src="assets/vendors/flot/jquery.flot.stack.js"></script>
<!-- End plugin js for this page -->
<!-- inject:js -->
<script src="assets/js/off-canvas.js"></script>
<script src="assets/js/hoverable-collapse.js"></script>
<script src="assets/js/misc.js"></script>
<script src="assets/js/settings.js"></script>
<script src="assets/js/todolist.js"></script>
<!-- endinject -->
<!-- Custom js for this page -->
<script src="assets/js/file-upload.js"></script>
<script src="assets/js/dashboard.js"></script>
<!-- End custom js for this page -->
</body>
</html>
