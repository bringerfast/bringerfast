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
            <p>Edit Class Types</p>
        </div>
        <ul class="app-breadcrumb breadcrumb">
            <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
            <li class="breadcrumb-item"><a href="#">class type / edit </a></li>
        </ul>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <span class="pull-left">Edit Class Type</span>
                    <a href="<?php echo baseURL().'/classTypeIndex'; ?>" class="fa fa-list pull-right text-success" title="View All"></a>
                </div>
                <div class="card-body">
                    <form method="post" action="<?php echo baseURL().'/classTypeUpdate' ?>">
                        <div class="row">
                            <div class="col-md-6">
                                <input type="hidden" name="classTypeId" value="<?php echo $classType['class_type_id'] ?>">
                                <input class="form-control" type="text" name="classTypeName" value="<?php echo $classType['class_type_name']; ?>" placeholder="Enter Name Of Class Type" required>
                            </div>
                            <div class="col-md-6">
                                <input class="form-control btn-primary" type="submit" value="UPDATE THIS CLASS TYPE">
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

