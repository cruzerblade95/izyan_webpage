<?php

    require_once 'config.php';

    $success = false;
    $failed = false;

    if (isset($_POST['login'])){

        extract($_POST);

        $pass = md5($password);

        $result = $database->query("SELECT * FROM users WHERE username='$username' AND password='$pass'");

        if ($result->num_rows > 0){
            $success = true;

            $user = $result->fetch_assoc();

            session_start();

            $_SESSION['id'] = $user['id'];

            header('Location: home.php?page=dashboard');
        }else{
            $failed = true;
        }
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
    <link rel="stylesheet" href="assets/vendors/select2/select2.min.css" />
    <link rel="stylesheet" href="assets/vendors/select2-bootstrap-theme/select2-bootstrap.min.css" />
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
    <!-- partial -->
    <div class="container-fluid page-body-wrapper">

        <!-- partial -->
        <div class="main-panel">
            <div class="content-wrapper">
                <?php if($success): ?>
                    <div class="alert alert-success" role="alert">
                        Login Successfully!
                    </div>
                <?php endif; ?>
                <?php if($failed): ?>
                    <div class="alert alert-danger" role="alert">
                        Login Failed!
                    </div>
                <?php endif; ?>
                <div class="row">
                    <div class="col-md-12 grid-margin stretch-card">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Sign In</h4>
                                <form class="forms-sample" action="index.php" method="post">
                                    <div class="form-group">
                                        <label for="exampleInputUsername1">Username</label>
                                        <input type="text" class="form-control" id="exampleInputUsername1" name="username" placeholder="Username" />
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputPassword1">Password</label>
                                        <input type="password" class="form-control" id="exampleInputPassword1" name="password" placeholder="Password" />
                                    </div>
                                    <button type="submit" name="login" class="btn btn-primary mr-2"> Login </button>
                                    <a href="register.php" class="btn btn-light">Register</a>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- content-wrapper ends -->
            <!-- partial:../../partials/_footer.html -->
            <!-- partial -->
        </div>
        <!-- main-panel ends -->
    </div>
    <!-- page-body-wrapper ends -->
</div>
<!-- container-scroller -->
<!-- plugins:js -->
<script src="../assets/vendors/js/vendor.bundle.base.js"></script>
<!-- endinject -->
<!-- Plugin js for this page -->
<script src="../assets/vendors/select2/select2.min.js"></script>
<script src="../assets/vendors/typeahead.js/typeahead.bundle.min.js"></script>
<!-- End plugin js for this page -->
<!-- inject:js -->
<script src="../assets/js/off-canvas.js"></script>
<script src="../assets/js/hoverable-collapse.js"></script>
<script src="../assets/js/misc.js"></script>
<script src="../assets/js/settings.js"></script>
<script src="../assets/js/todolist.js"></script>
<!-- endinject -->
<!-- Custom js for this page -->
<script src="../assets/js/file-upload.js"></script>
<script src="../assets/js/typeahead.js"></script>
<script src="../assets/js/select2.js"></script>
<!-- End custom js for this page -->
</body>
</html>