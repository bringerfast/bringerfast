<!DOCTYPE html>
<html lang="en">
<head>
    <?php view('backend/partial/head_links.php') ?>
</head>
<body class="app sidebar-mini">
<?php view('backend/partial/nav_bar.php') ?>
<?php view('backend/partial/side_bar.php') ?>
<?php $arr = import(); $screen = $arr[0]; $theatres = $arr[1]; $classTypes = $arr[2]; ?>
<main class="app-content">
    <div class="app-title">
        <div>
            <h1><i class="fa fa-dashboard"></i> Screens</h1>
            <p>Edit Screen</p>
        </div>
        <ul class="app-breadcrumb breadcrumb">
            <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
            <li class="breadcrumb-item"><a href="#">screen / edit </a></li>
        </ul>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <span class="pull-left">Edit Screen</span>
                    <a href="<?php echo baseURL().'/screenIndex'; ?>" class="fa fa-list pull-right text-success" title="View All"></a>
                </div>
                <div class="card-body">
                    <form method="post" action="<?php echo baseURL().'/screenUpdate' ?>">
                        <input type="hidden" name="screen_id" value="<?php echo $screen->screen_id;?>">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <select class="form-control" name="r_theatre_id" required>
                                        <?php foreach ($theatres as $theatre){ ?>
                                            <option value="<?php echo $theatre->theatre_id?>" <?php  if($theatre->theatre_id == $screen->r_theatre_id) { echo 'selected'; } ?>><?php echo $theatre->theatre_name; ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <select class="form-control" name="r_class_type_id" required>
                                        <?php foreach ($classTypes as $classType){ ?>
                                            <option value="<?php echo $classType->class_type_id ?>" <?php  if($classType->class_type_id == $screen->r_class_type_id) { echo 'selected'; } ?>><?php echo $classType->class_type_name; ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <input class="form-control" type="text" name="screen_name" value="<?php echo $screen->screen_name; ?>" placeholder="Enter Screen Name" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <input class="form-control" type="text" name="total_seats" value="<?php echo $screen->total_seats; ?>" placeholder="Enter Screen Seats" required>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">

                            </div>
                            <div class="col-md-6">
                                <input class="form-control btn btn-primary" type="submit" value="Update This Screen" required>
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
