<!DOCTYPE html>
<html lang="en">
<head>
    <?php view('backend/partial/head_links.php') ?>
</head>
<body class="app sidebar-mini">
<?php view('backend/partial/nav_bar.php') ?>
<?php view('backend/partial/side_bar.php') ?>
<?php list($screen,$theatres,$classTypes) = import(); ?>
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
                                    <input class="form-control" type="text" name="screen_name" value="<?php echo $screen->screen_name; ?>" placeholder="Enter Screen Name" required>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <table class="table table-sm">
                                        <?php
                                        $TempArray = [];
                                        foreach (json_decode($screen->classes_seats) as $key => $value){
                                            foreach ((array)$value as $k => $v){
                                                $TempArray[$k]=$v;
                                            }
                                        }
                                        foreach ($classTypes as $classType) { ?>
                                            <tr>
                                                <td><label class="semibold-text" style="margin-top: 10px;"><?php echo $classType->class_type_name ?></label></td>
                                                <td>:</td>
                                                <td><input class="form-control" type="number" name="<?php echo $classType->class_type_name ?>" placeholder="number of seats" value="<?php echo $TempArray[str_replace(' ','_',$classType->class_type_name)] ?>" required></td>
                                            </tr>
                                        <?php } ?>
                                    </table>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <input class="form-control" type="text" name="total_seats" value="<?php echo $screen->total_seats; ?>" placeholder="Enter Screen Seats" required>
                                </div>
                                <div class="form-group">
                                    <input class="form-control btn btn-primary" type="submit" value="Update This Screen" required>
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
