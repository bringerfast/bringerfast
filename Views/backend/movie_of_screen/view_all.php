<!DOCTYPE html>
<html lang="en">
<head>
    <?php view('backend/partial/head_links.php') ?>
</head>
<body class="app sidebar-mini">
<?php view('backend/partial/nav_bar.php') ?>
<?php view('backend/partial/side_bar.php') ?>
<?php $movieOfScreens =  import(); ?>
<style>
    .table td,th{
        text-align: center;
    }
</style>
<main class="app-content">
    <div class="app-title">
        <div>
            <h1><i class="fa fa-hourglass"></i> Movies Of Screens</h1>
            <p>Manage Movies of Screens</p>
        </div>
        <ul class="app-breadcrumb breadcrumb">
            <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
            <li class="breadcrumb-item"><a href="#">Movies of Screens / all </a></li>
        </ul>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header"><?php ?>
                    <span class="pull-left">All Movies Of Screens</span>
                    <a href="<?php echo baseURL().'/movieOfScreenForm'; ?>" class="fa fa-plus pull-right text-success" title="Create New"></a>
                </div>
                <div class="card-body table-responsive">
                    <table class="table table-bordered table-sm">
                        <thead>
                            <th>ID</th>
                            <th>Theatre</th>
                            <th>Screen</th>
                            <th>Show</th>
                            <th>Movie</th>
                            <th>Date & Time</th>
                            <th>Available Seats</th>
                            <th>Actions</th>
                        </thead>
                        <tbody>
                            <?php foreach ($movieOfScreens as $movieOfScreen){ ?>
                                <tr>
                                    <td><?php echo $movieOfScreen->movie_of_screen_id; ?></td>
                                    <td><a href="<?php echo baseURL().'/theatreShow?theatre_id='.$movieOfScreen->r_theatre_id; ?>"><?php echo $movieOfScreen->theatre_name; ?></a></td>
                                    <td><a href="<?php echo baseURL().'/screenShow?screen_id='.$movieOfScreen->r_screen_id; ?>"><?php echo $movieOfScreen->screen_name; ?></a></td>
                                    <td><a href="<?php echo baseURL().'/showShow?show_id='.$movieOfScreen->r_show_id; ?>"><?php echo $movieOfScreen->show_name; ?></a></td>
                                    <td><a href="<?php echo baseURL().'/movieShow?movie_id='.$movieOfScreen->r_movie_id; ?>"><?php echo $movieOfScreen->name; ?></a></td>
                                    <td><?php echo $movieOfScreen->date_time; ?></td>
                                    <td><?php echo $movieOfScreen->total_seats; ?></td>
                                    <td>
                                        <a href="<?php echo baseURL().'/movieOfScreenShow?movie_of_screen_id='.$movieOfScreen->movie_of_screen_id; ?>"><i class="fa fa-eye text-primary" style="margin-right: 5%;"></i></a>
                                        <a href="<?php echo baseURL().'/movieOfScreenEditForm?movie_of_screen_id='.$movieOfScreen->movie_of_screen_id; ?>"><i class="fa fa-pencil text-warning" style="margin-right: 5%;"></i></a>
                                        <a href="<?php echo baseURL().'/movieOfScreenDelete?movie_of_screen_id='.$movieOfScreen->movie_of_screen_id; ?>" onclick="return confirm('Are your sure to delete ?')"><i class="fa fa-trash text-danger"></i></a>
                                    </td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
                <div class="card-footer">
                    <div class="row">
                        <div class="col-md-5"></div>
                        <div class="col-md-2 text-center">
                            <a class="link pull-left"><< </a>
                            1
                            <a class="link pull-right">>> </a>
                        </div>
                        <div class="col-md-5">
                            <span class="pull-right">No Of Record : <?php echo count($movieOfScreens) ?></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
<?php view('backend/partial/foot_links.php') ?>
</body>
</html>
