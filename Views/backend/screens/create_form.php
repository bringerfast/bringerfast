<!DOCTYPE html>
<html lang="en">
<head>
    <?php view('backend/partial/head_links.php') ?>
</head>
<body class="app sidebar-mini">
<?php view('backend/partial/nav_bar.php') ?>
<?php view('backend/partial/side_bar.php') ?>
<?php $arr = import(); $theatres = $arr[0]; $classTypes = $arr[1]; ?>
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
                                    <select class="form-control" name="screenTheatreId" required>
                                        <option disabled selected>Select Theatre</option>
                                        <?php foreach ($theatres as $theatre){ ?>
                                            <option value="<?php echo $theatre['theatre_id']?>"><?php echo $theatre['theatre_name']; ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <select class="form-control" name="screenClassTypeId" required>
                                        <option disabled selected>Select ClassType</option>
                                        <?php foreach ($classTypes as $classType){ ?>
                                            <option value="<?php echo $classType['class_type_id']?>"><?php echo $classType['class_type_name']; ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <input class="form-control" type="text" name="screenName" placeholder="Enter Screen Name" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <input class="form-control" type="number" name="screenSeat" placeholder="Enter Screen seats" required>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <input class="form-control btn btn-primary" type="submit" value="Create New Screen" required>
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
