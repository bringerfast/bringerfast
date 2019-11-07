<!DOCTYPE html>
<html lang="en">
<head>
    <?php view('backend/partial/head_links.php') ?>
</head>
<body class="app sidebar-mini">
<?php view('backend/partial/nav_bar.php') ?>
<?php view('backend/partial/side_bar.php') ?>
<?php $theatres =  import(); ?>
<style>
    .table td,th{
        text-align: center;
    }
</style>
<main class="app-content">
    <div class="app-title">
        <div>
            <h1><i class="fa fa-dashboard"></i> Theatres</h1>
            <p>Manage theatres</p>
        </div>
        <ul class="app-breadcrumb breadcrumb">
            <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
            <li class="breadcrumb-item"><a href="#">Theatre / all </a></li>
        </ul>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <span class="pull-left">All Theatres</span>
                    <a href="<?php echo baseURL().'/theatreForm'; ?>" class="fa fa-plus pull-right text-success" title="Create New"></a>
                </div>
                <div class="card-body">
                    <table class="table table-bordered">
                        <thead>
                            <th>Theatre ID</th>
                            <th>User</th>
                            <th>Theatre Name</th>
                            <th>Address</th>
                            <th>Contact</th>
                            <th>Actions</th>
                        </thead>
                        <tbody>
                            <?php foreach ($theatres as $theatre){ ?>
                                <tr>
                                    <td><?php echo $theatre->theatre_id; ?></td>
                                    <td><?php echo $theatre->r_user_id; ?></td>
                                    <td><?php echo $theatre->theatre_name; ?></td>
                                    <td><?php echo $theatre->address; ?></td>
                                    <td><?php echo $theatre->contact; ?></td>
                                    <td>
                                        <a href="<?php echo baseURL().'/theatreShow?theatre_id='.$theatre->theatre_id; ?>"><i class="fa fa-eye text-primary" style="margin-right: 5%;"></i></a>
                                        <a href="<?php echo baseURL().'/theatreEditForm?theatre_id='.$theatre->theatre_id; ?>"><i class="fa fa-pencil text-warning" style="margin-right: 5%;"></i></a>
                                        <a href="<?php echo baseURL().'/theatreDelete?theatre_id='.$theatre->theatre_id; ?>" onclick="return confirm('Are your sure to delete ?')"><i class="fa fa-trash text-danger"></i></a>
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
                            <span class="pull-right">No Of Record : <?php echo count($theatres) ?></span>
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
