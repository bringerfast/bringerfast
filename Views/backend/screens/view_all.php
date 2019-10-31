<!DOCTYPE html>
<html lang="en">
<head>
    <?php view('backend/partial/head_links.php') ?>
</head>
<body class="app sidebar-mini">
<?php view('backend/partial/nav_bar.php') ?>
<?php view('backend/partial/side_bar.php') ?>
<?php $screens =  import(); ?>
<style>
    .table td,th{
        text-align: center;
    }
</style>
<main class="app-content">
    <div class="app-title">
        <div>
            <h1><i class="fa fa-dashboard"></i> Screens</h1>
            <p>Manage screens</p>
        </div>
        <ul class="app-breadcrumb breadcrumb">
            <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
            <li class="breadcrumb-item"><a href="#">Screen / all </a></li>
        </ul>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <span class="pull-left">All Screens</span>
                    <a href="<?php echo baseURL().'/screenForm'; ?>" class="fa fa-plus pull-right text-success" title="Create New"></a>
                </div>
                <div class="card-body">
                    <table class="table table-bordered">
                        <thead>
                            <th>Screen ID</th>
                            <th>Theatre</th>
                            <th>Class</th>
                            <th>Screen Name</th>
                            <th>Total Seats</th>
                            <th>Actions</th>
                        </thead>
                        <tbody>
                            <?php foreach ($screens as $value){ ?>
                                <tr>
                                    <td><?php echo $value['screen_id']; ?></td>
                                    <td><a href="<?php echo baseURL().'/theatreShow?theatre_id='.$value['r_theatre_id']; ?>"><?php echo $value['theatre_name']; ?></a></td>
                                    <td><a href="<?php echo baseURL().'/classTypeShow?class_type_id='.$value['r_class_type_id']; ?>"><?php echo $value['class_type_name']; ?></a></td>
                                    <td><?php echo $value['screen_name']; ?></td>
                                    <td><?php echo $value['total_seats']; ?></td>
                                    <td>
                                        <a href="<?php echo baseURL().'/screenShow?screen_id='.$value['screen_id']; ?>"><i class="fa fa-eye text-primary" style="margin-right: 5%;"></i></a>
                                        <a href="<?php echo baseURL().'/screenEditForm?screen_id='.$value['screen_id']; ?>"><i class="fa fa-pencil text-warning" style="margin-right: 5%;"></i></a>
                                        <a href="<?php echo baseURL().'/screenDelete?screen_id='.$value['screen_id']; ?>" onclick="return confirm('Are your sure to delte ?')"><i class="fa fa-trash text-danger"></i></a>
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
                            <span class="pull-right">No Of Record : <?php echo count($screens) ?></span>
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
