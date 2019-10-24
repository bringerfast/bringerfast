<!DOCTYPE html>
<html lang="en">
<head>
    <?php view('backend/partial/head_links.php') ?>
</head>
<body class="app sidebar-mini">
<?php view('backend/partial/nav_bar.php') ?>
<?php view('backend/partial/side_bar.php') ?>
<?php $movieCategory = import() ?>
<main class="app-content">
    <div class="app-title">
        <div>
            <h1><i class="fa fa-dashboard"></i> Movie Category</h1>
            <p>Show Movie Category</p>
        </div>
        <ul class="app-breadcrumb breadcrumb">
            <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
            <li class="breadcrumb-item"><a href="#">movie category / show </a></li>
        </ul>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <span class="pull-left">Show Role</span>
                    <a href="<?php echo baseURL().'/movieCategoryForm'; ?>" class="fa fa-plus pull-right text-primary" title="New"></a>
                    <a href="<?php echo baseURL().'/movieCategoryEditForm?movie_category_id='.$movieCategory['movie_category_id']; ?>" class="fa fa-pencil pull-right text-warning" title="Edit"></a>
                    <a href="<?php echo baseURL().'/movieCategoryIndex'; ?>" class="fa fa-list pull-right text-success" title="View All"></a>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <input class="form-control" type="text" name="roleId" value="<?php echo $movieCategory['movie_category_id'] ?>" readonly>
                        </div>
                        <div class="col-md-6">
                            <input class="form-control" type="text" name="roleName" value="<?php echo $movieCategory['movie_category_name']; ?>" readonly>
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

