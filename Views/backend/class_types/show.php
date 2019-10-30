<!DOCTYPE html>
<html lang="en">
<head>
    <?php view('backend/partial/head_links.php') ?>
</head>
<body class="app sidebar-mini">
<?php view('backend/partial/nav_bar.php') ?>
<?php view('backend/partial/side_bar.php') ?>
<?php $classType = import() ?>
<main class="app-content">
    <div class="app-title">
        <div>
            <h1><i class="fa fa-dashboard"></i> Class Types</h1>
            <p>Show Class Type</p>
        </div>
        <ul class="app-breadcrumb breadcrumb">
            <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
            <li class="breadcrumb-item"><a href="#">Class Type / show </a></li>
        </ul>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <span class="pull-left">Show Class Type</span>
                    <a href="<?php echo baseURL().'/classTypeForm'; ?>" class="fa fa-plus pull-right text-primary" title="New"></a>
                    <a href="<?php echo baseURL().'/classTypeEditForm?class_type_id='.$classType['class_type_id']; ?>" class="fa fa-pencil pull-right text-warning" title="Edit"></a>
                    <a href="<?php echo baseURL().'/classTypeIndex'; ?>" class="fa fa-list pull-right text-success" title="View All"></a>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <input class="form-control" type="text" name="classTypeId" value="<?php echo $classType['class_type_id'] ?>" readonly>
                        </div>
                        <div class="col-md-6">
                            <input class="form-control" type="text" name="classTypeName" value="<?php echo $classType['class_type_name']; ?>" readonly>
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

