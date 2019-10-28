<!DOCTYPE html>
<html lang="en">
<head>
    <?php view('backend/partial/head_links.php') ?>
</head>
<body class="app sidebar-mini">
<?php view('backend/partial/nav_bar.php') ?>
<?php view('backend/partial/side_bar.php') ?>
<?php $roles = import() ?>
<main class="app-content">
    <div class="app-title">
        <div>
            <h1><i class="fa fa-dashboard"></i> Users</h1>
            <p>Create User</p>
        </div>
        <ul class="app-breadcrumb breadcrumb">
            <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
            <li class="breadcrumb-item"><a href="#">user / create </a></li>
        </ul>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <span class="pull-left">Create User</span>
                    <a href="<?php echo baseURL().'/userIndex'; ?>" class="fa fa-list pull-right text-success" title="View All"></a>
                </div>
                <div class="card-body">
                    <form method="post" action="<?php echo baseURL().'/userStore' ?>">
                        <div class="row">
                            <div class="col-md-6">
                                <select class="form-control" name="userRole" required>
                                    <option disabled selected>Select Role</option>
                                    <?php foreach ($roles as $role){ ?>
                                        <option value="<?php echo $role['role_id']?>"><?php echo $role['role_name']; ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                            <div class="col-md-6">
                                <input class="form-control" type="text" name="userName" placeholder="Enter User Name" required>
                            </div>
                        </div><hr>
                        <div class="row">
                            <div class="col-md-6">
                                <input class="form-control" type="text" name="userEmail" placeholder="Enter User Email" required>
                            </div>
                            <div class="col-md-6">
                                <input class="form-control" type="text" name="userMobile" placeholder="Enter User Mobile" required>
                            </div>
                        </div><hr>
                        <div class="row">
                            <div class="col-md-6">
                                <input class="form-control" type="text" name="userPassword" placeholder="Enter User Password" required>
                            </div>
                            <div class="col-md-6">
                                <input class="form-control" type="text" name="usercPassword" placeholder="Enter User Confirm Password" required>
                            </div>
                        </div><hr>
                        <div class="row">
                            <div class="col-md-6">
                                <select class="form-control" name="userStatus" required>
                                    <option disabled selected>Select Status</option>
                                    <option value="1">Active</option>
                                    <option value="0">Suspend</option>
                                </select>
                            </div>
                            <div class="col-md-6">
                                <input class="form-control btn btn-outline-primary" type="submit" value="Create New User" required>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="card-footer">
                    <div class="row"></div>
                </div>
            </div>
        </div>
    </div>
</main>
<?php view('backend/partial/foot_links.php') ?>
</body>
</html>
