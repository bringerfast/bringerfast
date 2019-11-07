<!DOCTYPE html>
<html lang="en">
<head>
    <?php view('backend/partial/head_links.php') ?>
</head>
<body class="app sidebar-mini">
<?php view('backend/partial/nav_bar.php') ?>
<?php view('backend/partial/side_bar.php') ?>
<?php list($theatres, $classTypes) = import();  ?>
<main class="app-content">
    <div class="app-title">
        <div>
            <h1><i class="fa fa-dashboard"></i> Screens</h1>
            <p>Create Screen</p>
        </div>
        <ul class="app-breadcrumb breadcrumb">
            <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
            <li class="breadcrumb-item"><a href="#">screen / create </a></li>
        </ul>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <span class="pull-left">Create Screen</span>
                    <a href="<?php echo baseURL().'/screenIndex'; ?>" class="fa fa-list pull-right text-success" title="View All"></a>
                </div>
                <div class="card-body">
                    <form method="post" action="<?php echo baseURL().'/screenStore' ?>">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <select class="form-control" name="r_theatre_id" required>
                                        <option disabled selected>Select Theatre</option>
                                        <?php foreach ($theatres as $theatre){ ?>
                                            <option value="<?php echo $theatre->theatre_id?>"><?php echo $theatre->theatre_name; ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <input class="form-control" type="text" name="screen_name" placeholder="Enter Screen Name" required>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <table class="table table-sm">
                                    <?php foreach ($classTypes as $classType) { ?>
                                        <tr>
                                            <td><label class="semibold-text" style="margin-top: 10px;"><?php echo $classType->class_type_name ?></label></td>
                                            <td>:</td>
                                            <td><input class="form-control" type="number" name="<?php echo $classType->class_type_name ?>" placeholder="number of seats" required></td>
                                        </tr>
                                    <?php } ?>
                                </table>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <input class="form-control" type="number" name="total_seats" placeholder="Enter Screen seats" required>
                                </div>
                                <div class="form-group">
                                    <input class="form-control btn btn-primary" type="submit" value="Create New Screen" required>
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
