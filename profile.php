<?php

    $success = false;
    $failed = false;

    if (isset($_POST['profile'])){

        extract($_POST);

        $pass = $password == null ? $auth['password'] : md5($password);

        $result = $database->query("UPDATE users SET name='$name', username='$username', email='$email', password='$pass' WHERE id='" . $auth['id'] . "'");

        if ($result){
            $success = true;
        }

    }

?>
<?php if($success): ?>
    <div class="alert alert-success" role="alert">
        Profile Updated Successfully!
    </div>
<?php endif; ?>
<?php if($failed): ?>
    <div class="alert alert-danger" role="alert">
        Error! <?=$database->error;?>
    </div>
<?php endif; ?>

<div class="row">
    <div class="col-md-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Your Profile</h4>
                <p class="card-description">Update Your Profile</p>
                <form class="forms-sample" action="profile.php" method="post">
                    <div class="form-group">
                        <label for="exampleInputUsername1">Username</label>
                        <input type="text" class="form-control" name="username" id="exampleInputUsername1" value="<?=$auth['username'];?>" placeholder="Username" />
                    </div>
                    <div class="form-group">
                        <label for="exampleInputUsername1">Name</label>
                        <input type="text" class="form-control" name="name" id="exampleInputUsername1" value="<?=$auth['name'];?>" placeholder="Name" />
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Email address</label>
                        <input type="email" class="form-control" name="email" id="exampleInputEmail1" value="<?=$auth['email'];?>" placeholder="Email" />
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Password</label>
                        <input type="password" class="form-control" name="password" id="exampleInputPassword1" placeholder="Password" />
                    </div>
                    <button type="submit" class="btn btn-success mr-2" name="profile"> Save </button>
                    <button type="reset" class="btn btn-light">Reset</button>
                </form>
            </div>
        </div>
    </div>
</div>
