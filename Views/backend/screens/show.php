<!DOCTYPE html>
<html lang="en">
<head>
    <?php view('backend/partial/head_links.php') ?>
</head>
<body class="app sidebar-mini">
<?php view('backend/partial/nav_bar.php') ?>
<?php view('backend/partial/side_bar.php') ?>
<?php $screen = import() ?>
<main class="app-content">
    <div class="app-title">
        <div>
            <h1><i class="fa fa-dashboard"></i> Screens</h1>
            <p>show Screen</p>
        </div>
        <ul class="app-breadcrumb breadcrumb">
            <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
            <li class="breadcrumb-item"><a href="#">screen / show </a></li>
        </ul>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <span class="pull-left">Show Screen</span>
                    <a href="<?php echo baseURL().'/screenIndex'; ?>" class="fa fa-list pull-right text-success" title="View All"></a>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="from-group">
                                <input class="form-control" type="text" value="<?php echo $screen->screen_id ?>" readonly>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <input class="form-control" type="text" value="<?php echo $screen->screen_name ?>"  readonly>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <input class="form-control" type="text" value="<?php echo $screen->theatre_name ?>" readonly>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group form-control">
                                <?php
                                $jsonArray = json_decode($screen->classes_seats);
                                $total = 0;
                                foreach ($jsonArray as $key => $value){
                                    foreach ( (array)$value as $k => $v){
                                        $k = str_replace('_',' ',$k);
                                        echo "<button class='btn-success'> $k : $v</button>&nbsp;&nbsp;";
                                        $total += $v;
                                    }
                                }
                                echo "<button class='btn-danger'> Total Seats : $total </button>";
                                ?>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <input class="form-control" type="text" value="<?php echo $screen->total_seats ?>" readonly>
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
