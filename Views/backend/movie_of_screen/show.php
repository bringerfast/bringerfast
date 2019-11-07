<!DOCTYPE html>
<html lang="en">
<head>
    <?php view('backend/partial/head_links.php') ?>
</head>
<body class="app sidebar-mini">
<?php view('backend/partial/nav_bar.php') ?>
<?php view('backend/partial/side_bar.php') ?>
<?php $movieOfScreen = import() ?>
<main class="app-content">
    <div class="app-title">
        <div>
            <h1><i class="fa fa-dashboard"></i> MovieOfScreen</h1>
            <p>Show MovieOfScreen</p>
        </div>
        <ul class="app-breadcrumb breadcrumb">
            <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
            <li class="breadcrumb-item"><a href="#">MovieOfScreen / show </a></li>
        </ul>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <span class="pull-left">Show MovieOfScreen</span>
                    <a href="<?php echo baseURL().'/movieOfScreenIndex'; ?>" class="fa fa-list pull-right text-success" title="View All"></a>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="from-group">
                                <input class="form-control" type="text" value="<?php echo $movieOfScreen->movie_of_screen_id ?>" readonly>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <input class="form-control" type="text" value="<?php echo $movieOfScreen->theatre_name ?>"  readonly>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <input class="form-control" type="text" value="<?php echo $movieOfScreen->screen_name ?>" readonly>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <input class="form-control" type="text" value="<?php echo $movieOfScreen->show_name ?>" readonly>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <input class="form-control" type="text" value="<?php echo $movieOfScreen->name ?>" readonly>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="from-group">
                                <input class="form-control" type="text" value="<?php echo $movieOfScreen->date_time ?>" readonly>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <input class="form-control" type="text" value="<?php echo $movieOfScreen->available_seats ?>" readonly>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="from-group">

                            </div>
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
