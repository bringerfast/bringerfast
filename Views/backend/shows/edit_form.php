<!DOCTYPE html>
<html lang="en">
<head>
    <?php view('backend/partial/head_links.php') ?>
</head>
<body class="app sidebar-mini">
<?php view('backend/partial/nav_bar.php') ?>
<?php view('backend/partial/side_bar.php') ?>
<?php $show = import() ?>
<main class="app-content">
    <div class="app-title">
        <div>
            <h1><i class="fa fa-dashboard"></i> Shows</h1>
            <p>Edit Show</p>
        </div>
        <ul class="app-breadcrumb breadcrumb">
            <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
            <li class="breadcrumb-item"><a href="#">show / edit </a></li>
        </ul>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <span class="pull-left">Edit Show</span>
                    <a href="<?php echo baseURL().'/showIndex'; ?>" class="fa fa-list pull-right text-success" title="View All"></a>
                </div>
                <div class="card-body">
                    <form method="post" action="<?php echo baseURL().'/showUpdate' ?>">
                        <div class="row">
                            <div class="col-md-6">
                                <input type="hidden" name="showId" value="<?php echo $show['show_id'] ?>">
                                <input class="form-control" type="text" name="showName" value="<?php echo $show['show_name']; ?>" placeholder="Enter Name Of Show" required>
                            </div>
                            <div class="col-md-6">
                                <input class="form-control btn-primary" type="submit" value="UPDATE THIS ROLE">
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

