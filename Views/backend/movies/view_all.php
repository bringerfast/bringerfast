<!DOCTYPE html>
<html lang="en">
<head>
    <?php view('backend/partial/head_links.php') ?>
</head>
<body class="app sidebar-mini">
<?php view('backend/partial/nav_bar.php') ?>
<?php view('backend/partial/side_bar.php') ?>
<?php $movies =  import();?>
<style>
    .table td,th{
        text-align: center;
    }
</style>
<main class="app-content">
    <div class="app-title">
        <div>
            <h1><i class="fa fa-dashboard"></i> Movies</h1>
            <p>Manage movies</p>
        </div>
        <ul class="app-breadcrumb breadcrumb">
            <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
            <li class="breadcrumb-item"><a href="#">Movies / all </a></li>
        </ul>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <span class="pull-left">All Movies</span>
                    <a href="<?php echo baseURL().'/movieForm'; ?>" class="fa fa-plus pull-right text-success" title="Create New"></a>
                </div>
                <div class="card-body">
                    <table class="table table-bordered">
                        <thead>
                            <th>ID</th>
                            <th>Category</th>
                            <th>Movie</th>
                            <th>Released On</th>
                            <th>Actor</th>
                            <th>Actress</th>
                            <th>Producer</th>
                            <th>Director</th>
                            <th>Actions</th>
                        </thead>
                        <tbody>
                            <?php foreach ($movies as $movie){ ?>
                                <tr>
                                    <td><?php echo $movie['movie_id']; ?></td>
                                    <td><?php echo $movie['r_movie_category_id']; ?></td>
                                    <td><?php echo $movie['name']; ?></td>
                                    <td><?php echo $movie['release_date']; ?></td>
                                    <td><?php echo $movie['actor']; ?></td>
                                    <td><?php echo $movie['actress']; ?></td>
                                    <td><?php echo $movie['producer']; ?></td>
                                    <td><?php echo $movie['director']; ?></td>
                                    <td>
                                        <a href="<?php echo baseURL().'/movieShow?movie_id='.$movie['movie_id']; ?>"><i class="fa fa-eye text-primary" style="margin-right: 5%;"></i></a>
                                        <a href="<?php echo baseURL().'/movieEditForm?movie_id='.$movie['movie_id']; ?>"><i class="fa fa-pencil text-warning" style="margin-right: 5%;"></i></a>
                                        <a href="<?php echo baseURL().'/movieDelete?movie_id='.$movie['movie_id']; ?>" onclick="return confirm('Are your sure to delete ?')"><i class="fa fa-trash text-danger"></i></a>
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
                            <span class="pull-right">No Of Record : <?php echo count($movies) ?></span>
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
