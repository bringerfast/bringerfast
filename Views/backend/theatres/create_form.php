<!DOCTYPE html>
<html lang="en">
<head>
    <?php view('backend/partial/head_links.php') ?>
</head>
<body class="app sidebar-mini">
<?php view('backend/partial/nav_bar.php') ?>
<?php view('backend/partial/side_bar.php') ?>
<?php $users = import() ?>
<main class="app-content">
    <div class="app-title">
        <div>
            <h1><i class="fa fa-dashboard"></i> Theatres</h1>
            <p>Create Theatre</p>
        </div>
        <ul class="app-breadcrumb breadcrumb">
            <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
            <li class="breadcrumb-item"><a href="#">theatre / create </a></li>
        </ul>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <span class="pull-left">Create User</span>
                    <a href="<?php echo baseURL().'/theatreIndex'; ?>" class="fa fa-list pull-right text-success" title="View All"></a>
                </div>
                <div class="card-body">
                    <form method="post" action="<?php echo baseURL().'/theatreStore' ?>">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <select class="form-control" name="userId" required>
                                        <option disabled selected>Select User</option>
                                        <?php foreach ($users as $user){ ?>
                                            <option value="<?php echo $user['user_id']?>"><?php echo $user['name']; ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="from-group">
                                    <input class="form-control" type="text" name="theatreName" placeholder="Enter Theatre Name" required>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <input class="form-control" type="text" name="theatreAddress" placeholder="Enter Theatre Address" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <input class="form-control" type="text" name="theatreContact" placeholder="Enter Theatre Contact" required>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <input class="form-control btn btn-primary" type="submit" value="Create Theatre" required>
                                </div>
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