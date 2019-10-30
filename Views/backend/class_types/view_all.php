<!DOCTYPE html>
<html lang="en">
<head>
    <?php view('backend/partial/head_links.php') ?>
</head>
<body class="app sidebar-mini">
<?php view('backend/partial/nav_bar.php') ?>
<?php view('backend/partial/side_bar.php') ?>
<?php $classTypes =  import(); ?>
<style>
    .table td,th{
        text-align: center;
    }
</style>
<main class="app-content">
    <div class="app-title">
        <div>
            <h1><i class="fa fa-dashboard"></i> Class Types</h1>
            <p>Manage Class Types</p>
        </div>
        <ul class="app-breadcrumb breadcrumb">
            <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
            <li class="breadcrumb-item"><a href="#">Class Types </a></li>
        </ul>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <span class="pull-left">All Class Types</span>
                    <a href="<?php echo baseURL().'/classTypeForm'; ?>" class="fa fa-plus pull-right text-success" title="Create New"></a>
                </div>
                <div class="card-body">
                    <table class="table table-bordered">
                        <thead>
                            <th>Class Type ID</th>
                            <th>Class Type Name</th>
                            <th>Actions</th>
                        </thead>
                        <tbody>
                            <?php foreach ($classTypes as $classType){ ?>
                                <tr>
                                    <td><?php echo $classType['class_type_id']; ?></td>
                                    <td><?php echo $classType['class_type_name']; ?></td>
                                    <td>
                                        <a href="<?php echo baseURL().'/classTypeShow?class_type_id='.$classType['class_type_id']; ?>"><i class="fa fa-eye text-primary" style="margin-right: 5%;"></i></a>
                                        <a href="<?php echo baseURL().'/classTypeEditForm?class_type_id='.$classType['class_type_id']; ?>"><i class="fa fa-pencil text-warning" style="margin-right: 5%;"></i></a>
                                        <a href="<?php echo baseURL().'/classTypeDelete?class_type_id='.$classType['class_type_id']; ?>" onclick="return confirm('Are you sure to delete ?')"><i class="fa fa-trash text-danger"></i></a>
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
                            <span class="pull-right">No Of Record : <?php echo count($classTypes) ?></span>
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
