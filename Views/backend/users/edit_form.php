<!DOCTYPE html>
<html lang="en">
<head>
    <?php view('backend/partial/head_links.php') ?>
</head>
<body class="app sidebar-mini">
<?php view('backend/partial/nav_bar.php') ?>
<?php view('backend/partial/side_bar.php') ?>
<?php list($user,$roles) = import();  ?>
<main class="app-content">
    <div class="app-title">
        <div>
            <h1><i class="fa fa-dashboard"></i> Users</h1>
            <p>Edit User</p>
        </div>
        <ul class="app-breadcrumb breadcrumb">
            <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
            <li class="breadcrumb-item"><a href="#">user / edit </a></li>
        </ul>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <span class="pull-left">Edit User </span>
                    <a href="<?php echo baseURL().'/userIndex'; ?>" class="fa fa-list pull-right text-success" title="View All"></a>
                </div>
                <div class="card-body">
                    <form method="post" action="<?php echo baseURL().'/userUpdate' ?>">
                        <input type="hidden" name="user_id" value="<?php echo $user->user_id;?>">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <select class="form-control" name="r_role_id" required>
                                        <?php foreach ($roles as $role){ ?>
                                            <option value="<?php echo $role->role_id?>" <?php  if($role->role_id == $user->r_role_id) { echo 'selected'; } ?>><?php echo $role->role_name; ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <input class="form-control" type="text" name="name" value="<?php echo $user->name; ?>" placeholder="Enter User Name" required>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <input class="form-control" type="text" name="email" value="<?php echo $user->email; ?>" placeholder="Enter User Email" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <input class="form-control" type="text" name="mobile" value="<?php echo $user->mobile; ?>" placeholder="Enter User Mobile" required>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <input class="form-control" type="text" name="password" value="<?php echo $user->password; ?>" placeholder="Enter User Password" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <input class="form-control" type="text" name="c_password" value="<?php echo $user->password; ?>" placeholder="Enter User Confirm Password" required>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <select class="form-control" name="status" required>
                                    <option disabled selected>Select Status</option>
                                    <option value="1" <?php echo $user->status==1? 'selected':''; ?>>Active</option>
                                    <option value="0" <?php echo $user->status==0? 'selected':''; ?>>Suspend</option>
                                </select>
                            </div>
                            <div class="col-md-6">
                                <input class="form-control btn btn-outline-primary" type="submit" value="Update This User" required>
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
