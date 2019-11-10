<!doctype html>
<html lang="en">
<head>
<?php view('frontend/partial/head_links.php') ?>
<?php list($movieCategories,$movieOfScreens) = import(); ?>
</head>
<body style="background: transparent;">
<?php view('frontend/partial/header.php') ?>
<main>
    <div id="demo" class="carousel slide card" data-ride="carousel">
        <!-- Indicators -->
        <ul class="carousel-indicators">
            <li data-target="#demo" data-slide-to="0" class="active"></li>
            <li data-target="#demo" data-slide-to="1"></li>
            <li data-target="#demo" data-slide-to="2"></li>
        </ul>
        <!-- The slideshow -->
        <div class="carousel-inner">
            <?php foreach ($movieOfScreens as $key => $movieOfScreen) { ?>
                <?php reset($movieOfScreens); if ($key === key($movieOfScreens)) { ?>
                    <div class="carousel-item active">
                        <a href="#">
                            <img src="<?php echo $movieOfScreen->banner_image ?>" alt="Los Angeles" width="1100" height="500">
                        </a>
                    </div>
                <?php } else { ?>
                    <div class="carousel-item ">
                        <a href="#">
                            <img src="<?php echo $movieOfScreen->banner_image ?>" alt="Los Angeles" width="1100" height="500">
                        </a>
                    </div>
                <?php } ?>
            <?php } ?>
        </div>
        <!-- Left and right controls -->
        <a class="carousel-control-prev" href="#demo" data-slide="prev">
            <span class="carousel-control-prev-icon"></span>
        </a>
        <a class="carousel-control-next" href="#demo" data-slide="next">
            <span class="carousel-control-next-icon"></span>
        </a>
    </div>
    <div class="card">
        <div class="card-header">
            <strong class="" style="font-size: 24px;">Movies</strong>
            <a href="#" class="btn btn-success btn-sm">Now Showing</a>
            <a href="#" class="btn btn-success btn-sm">Comming Soon</a>
            <a href="#" class="btn btn-success btn-sm">Exclusive</a>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-3 text-center">
                    <div class="card card-inverse card-info">
                        <img class="card-img-top" src="https://picsum.photos/200/150/?random" style="padding: 10px" height="300px">
                    </div>
                    <div class="card card-inverse card-info">
                        <div class="card-block">
                            <div class="card-header">
                                <i class="fa fa-angle-down pull-left" data-toggle="collapse" data-target="#language_demo"></i>
                                <b>Language</b>
                            </div>
                            <div id="language_demo" class="card-body text-left collapse show">
                                <input type="checkbox"> Hindi <br>
                                <input type="checkbox"> English <br>
                                <input type="checkbox"> Marathi <br>
                                <input type="checkbox"> Gujarati <br>
                                <input type="checkbox"> Telugu <br>
                                <input type="checkbox"> Tamil <br>
                                <input type="checkbox"> Malayalam <br>
                                <input type="checkbox"> Punjabi <br>
                                <input type="checkbox"> Bhojpuri <br>
                            </div>
                        </div>
                    </div>
                    <div class="card card-inverse card-info">
                        <div class="card-block">
                            <div class="card-header">
                                <i class="fa fa-angle-down pull-left" data-toggle="collapse" data-target="#Genre_demo"></i>
                                <b>Categories</b>
                            </div>
                            <div id="Genre_demo" class="card-body text-left collapse">
                               <?php foreach (array_reverse($movieCategories) as $movieCategory) { ?>
                                    <input type="checkbox"> <?php echo $movieCategory->movie_category_name ?> <br>
                               <?php } ?>
                            </div>
                        </div>
                    </div>
                    <div class="card card-inverse card-info">
                        <div class="card-block">
                            <div class="card-header">
                                <i class="fa fa-angle-down pull-left" data-toggle="collapse" data-target="#Format_demo"></i>
                                <b>Format</b>
                            </div>
                            <div id="Format_demo" class="card-body text-left collapse">
                                <input type="checkbox"> 2D <br>
                                <input type="checkbox"> 3D <br>
                                <input type="checkbox"> 3D SCREEN X <br>
                                <input type="checkbox"> 4DX <br>
                                <input type="checkbox"> 4DX 3D <br>
                                <input type="checkbox"> MX4D <br>
                                <input type="checkbox"> IMAX 2D <br>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-9">
                    <div class="row">
                        <?php foreach ($movieOfScreens as $movieOfScreen) {  ?>
                            <div class="col-md-4 text-center">
                                <div class="card card-inverse card-info">
                                    <a href="<?php echo baseURL().'/details?movie_of_screen_id='.$movieOfScreen->movie_of_screen_id; ?>">
                                        <img class="card-img-top" src="<?php echo $movieOfScreen->list_image ?>" height="300px">
                                    </a>
                                    <div class="card-block">
                                        <div class="card-text">
                                            description
                                        </div>
                                    </div>
                                    <div class="card-footer">
                                        <small class="btn btn-sm btn-success float-left"><?php echo $movieOfScreen->name ?></small>
                                        <button class="btn btn-sm btn-info float-right"><i class="fa fa-heart"></i></i></button>
                                    </div>
                                </div>
                            </div>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
<!-- Essential javascripts for application to work-->
<script src="<?php echo asset('backend/js/jquery-3.3.1.min.js') ?>"></script>
<script src="<?php echo asset('backend/js/popper.min.js') ?>"></script>
<script src="<?php echo asset('backend/js/bootstrap.min.js') ?>"></script>
<script src="<?php echo asset('backend/js/main.js') ?>"></script>
<script src="<?php echo asset('frontend/js/main.js') ?>"></script>
</body>
</html>