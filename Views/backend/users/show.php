<!DOCTYPE html>
<html lang="en">
<head>
    <?php view('backend/partial/head_links.php') ?>
</head>
<body class="app sidebar-mini">
<?php view('backend/partial/nav_bar.php') ?>
<?php view('backend/partial/side_bar.php') ?>
<?php $user = import() ?>
<main class="app-content">
    <div class="app-title">
        <div>
            <h1><i class="fa fa-dashboard"></i> Users</h1>
            <p>show User</p>
        </div>
        <ul class="app-breadcrumb breadcrumb">
            <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
            <li class="breadcrumb-item"><a href="#">user / show </a></li>
        </ul>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <span class="pull-left">Show User</span>
                    <a href="<?php echo baseURL().'/userIndex'; ?>" class="fa fa-list pull-right text-success" title="View All"></a>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <input class="form-control" type="text" value="<?php echo $user['role_name'] ?>" readonly>
                        </div>
                        <div class="col-md-6">
                            <input class="form-control" type="text" value="<?php echo $user['name'] ?>"  readonly>
                        </div>
                    </div><hr>
                    <div class="row">
                        <div class="col-md-6">
                            <input class="form-control" type="text" value="<?php echo $user['role_name'] ?>" readonly>
                        </div>
                        <div class="col-md-6">
                            <input class="form-control" type="text" value="<?php echo $user['email'] ?>" readonly>
                        </div>
                    </div><hr>
                    <div class="row">
                        <div class="col-md-6">
                            <input class="form-control" type="text" value="<?php echo $user['mobile'] ?>" readonly>
                        </div>
                        <div class="col-md-6">
                            <input class="form-control" type="text" value="<?php echo $user['password'] ?>" readonly>
                        </div>
                    </div><hr>
                    <div class="row">
                        <div class="col-md-6">
                            <input class="form-control" type="text" value="<?php echo $user['status'] ?>" readonly>
                        </div>
                        <div class="col-md-6">
                            <input class="form-control" type="text" value="<?php echo $user['email_verified_at'] ?>" readonly>
                        </div>
                    </div>
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
