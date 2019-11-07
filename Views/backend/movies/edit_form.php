<!DOCTYPE html>
<html lang="en">
<head>
    <?php view('backend/partial/head_links.php') ?>
</head>
<body class="app sidebar-mini">
<?php view('backend/partial/nav_bar.php') ?>
<?php view('backend/partial/side_bar.php') ?>
<?php list($movie,$movieCategories) = import(); ?>
<main class="app-content">
    <div class="app-title">
        <div>
            <h1><i class="fa fa-dashboard"></i> Movies</h1>
            <p>Edit Movie</p>
        </div>
        <ul class="app-breadcrumb breadcrumb">
            <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
            <li class="breadcrumb-item"><a href="#">movie / edit </a></li>
        </ul>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <span class="pull-left">Edit Movie</span>
                    <a href="<?php echo baseURL().'/movieIndex'; ?>" class="fa fa-list pull-right text-success" title="View All"></a>
                </div>
                <div class="card-body">
                    <form method="post" action="<?php echo baseURL().'/movieUpdate' ?>" enctype="multipart/form-data">
                        <input type="hidden" name="movie_id" value="<?php echo $movie->movie_id;?>">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <select class="form-control" name="r_movie_category_id" required>
                                        <?php foreach ($movieCategories as $movieCategory){ ?>
                                            <option value="<?php echo $movieCategory->movie_category_id; ?>" <?php if ($movieCategory->movie_category_id==$movie->r_movie_category_id){ echo "selected"; } ?>><?php echo $movieCategory->movie_category_name; ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <input class="form-control" type="text" name="name" value="<?php echo $movie->name; ?>" placeholder="Enter Movie Name" required>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <input class="form-control" type="date" name="release_date" value="<?php echo $movie->release_date; ?>" placeholder="Enter Movie Release Date" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <input class="form-control" type="text" name="actor" value="<?php echo $movie->actor; ?>" placeholder="Enter Movie Actor" required>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <input class="form-control" type="text" name="actress" value="<?php echo $movie->actress; ?>" placeholder="Enter Movie Actress" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <input class="form-control" type="text" name="producer" value="<?php echo $movie->producer; ?>" placeholder="Enter Movie Producer" required>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <input class="form-control" type="text" name="director" value="<?php echo $movie->director; ?>" placeholder="Enter Director of movie" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <input class="form-control" type="time" name="duration" value="<?php echo $movie->duration; ?>" placeholder="Enter Movie Duration" required>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <textarea id="ckEditor" class="form-control"  name="description" >
                                        <?php echo $movie->description; ?>
                                    </textarea>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <input class="form-control" type="file" name="banner_image" placeholder="choose Banner images">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <input class="form-control" type="file" name="list_image" placeholder="choose List image">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6" style="text-align: center">
                                <div class="form-group">
                                    <img src="<?php echo $movie->banner_image ?>" height="200" width="400">
                                </div>
                            </div>
                            <div class="col-md-6" style="text-align: center">
                                <div class="form-group">
                                    <img src="<?php echo $movie->list_image ?>" height="200" width="400">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <input class="form-control btn btn-sm btn-success" type="submit" value="Update">
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
<script>
    CKEDITOR.replace( 'ckEditor' );
</script>
</body>
</html>
