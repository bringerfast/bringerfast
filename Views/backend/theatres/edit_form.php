<!DOCTYPE html>
<html lang="en">
<head>
    <?php view('backend/partial/head_links.php') ?>
</head>
<body class="app sidebar-mini">
<?php view('backend/partial/nav_bar.php') ?>
<?php view('backend/partial/side_bar.php') ?>
<?php list($theatre,$user,$users) = import();?>
<main class="app-content">
    <div class="app-title">
        <div>
            <h1><i class="fa fa-dashboard"></i> Theatres</h1>
            <p>Edit Theatre</p>
        </div>
        <ul class="app-breadcrumb breadcrumb">
            <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
            <li class="breadcrumb-item"><a href="#">theatre / edit </a></li>
        </ul>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <span class="pull-left">Edit Theatre</span>
                    <a href="<?php echo baseURL().'/theatreIndex'; ?>" class="fa fa-list pull-right text-success" title="View All"></a>
                </div>
                <div class="card-body">
                    <form method="post" action="<?php echo baseURL().'/theatreUpdate' ?>">
                        <input type="hidden" name="theatre_id" value="<?php echo $theatre->theatre_id;?>">
                        <div class="row">
                            <?php if (is_authorised('SuperAdmin')) { ?>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <select class="form-control" name="r_user_id" required>
                                            <?php foreach ($users as $user){ ?>
                                                <option value="<?php echo $user['user_id']?>" <?php  if($user['user_id'] == $theatre->r_user_id) { echo 'selected'; } ?>><?php echo $user['name']; ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>
                            <?php } elseif (is_authorised('Admin')) { ?>
                                <input  name="r_user_id" value="<?php echo $user->user_id ?>" style="display: none">
                            <?php } ?>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <input class="form-control" type="text" name="theatre_name" value="<?php echo $theatre->theatre_name; ?>" placeholder="Enter Theatre Name" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <input class="form-control" type="text" name="address" value="<?php echo $theatre->address; ?>" placeholder="Enter Theatre Address" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <input class="form-control" type="text" name="contact" value="<?php echo $theatre->contact; ?>" placeholder="Enter Theatre Contact" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <input class="form-control btn btn-primary" type="submit" value="Update This Theatre" required>
                                </div>
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
