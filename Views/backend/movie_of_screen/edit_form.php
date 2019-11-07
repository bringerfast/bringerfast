<!DOCTYPE html>
<html lang="en">
<head>
    <?php view('backend/partial/head_links.php') ?>
</head>
<body class="app sidebar-mini">
<?php view('backend/partial/nav_bar.php') ?>
<?php view('backend/partial/side_bar.php') ?>
<?php list($theatres,$screens,$shows,$movies,$movieOfScreen) = import(); ?>
<main class="app-content">
    <div class="app-title">
        <div>
            <h1><i class="fa fa-dashboard"></i> Movie Of Screen</h1>
            <p>Edit Movie Of Screen</p>
        </div>
        <ul class="app-breadcrumb breadcrumb">
            <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
            <li class="breadcrumb-item"><a href="#">MovieOfScreen / edit </a></li>
        </ul>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <span class="pull-left">Edit MoiveOfScreen</span>
                    <a href="<?php echo baseURL().'/movieOfScreenIndex'; ?>" class="fa fa-list pull-right text-success" title="View All"></a>
                </div>
                <div class="card-body">
                    <form method="post" action="<?php echo baseURL().'/movieOfScreenUpdate' ?>">
                        <input type="hidden" name="movie_of_screen_id" value="<?php echo $movieOfScreen->movie_of_screen_id;?>">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <select class="form-control" name="r_theatre_id" id="r_theatre_id" onchange="getScreen(this)" required>
                                        <?php foreach ($theatres as $theatre){ ?>
                                            <option value="<?php echo $theatre->theatre_id?>" <?php  if($theatre->theatre_id == $movieOfScreen->r_theatre_id) { echo 'selected'; } ?>><?php echo $theatre->theatre_name; ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <select class="form-control" name="r_screen_id" id="r_screen_id" onchange="setTotalSeat(this)" required>
                                        <?php foreach ($screens as $screen){ ?>
                                            <option value="<?php echo $screen['screen_id'] ?>" <?php  if($screen['screen_id'] == $movieOfScreen->r_screen_id) { echo 'selected'; } ?>><?php echo $screen['screen_name']; ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <select class="form-control" name="r_show_id" required>
                                        <?php foreach ($shows as $show){ ?>
                                            <option value="<?php echo $show->show_id ?>" <?php  if($show->show_id == $movieOfScreen->r_show_id) { echo 'selected'; } ?>><?php echo $show->show_name; ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <select class="form-control" name="r_movie_id" required>
                                        <?php foreach ($movies as $movie){ ?>
                                            <option value="<?php echo $movie->movie_id?>" <?php  if($movie->movie_id == $movieOfScreen->r_movie_id) { echo 'selected'; } ?>><?php echo $movie->name; ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <input class="form-control" type="datetime-local" name="date_time" value="<?php echo $movieOfScreen->date_time; ?>" placeholder="Enter Screen Name" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <input class="form-control" type="number" name="available_seats" id="available_seats" value="<?php echo $movieOfScreen->available_seats; ?>" placeholder="Enter Screen Seats" required>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">

                            </div>
                            <div class="col-md-6">
                                <input class="form-control btn btn-primary" type="submit" value="Update This MovieOfScreen" required>
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
    var array;
    function getScreen(ele) {
        var formData = new FormData();
        formData.append('r_theatre_id',ele.value);
        var xmlHttp = new XMLHttpRequest();
        xmlHttp.upload.addEventListener("progress", progressHandler, false);
        xmlHttp.addEventListener("load", completeHandler, false);
        xmlHttp.addEventListener("error", errorHandler, false);
        xmlHttp.addEventListener("abort", abortHandler, false);
        xmlHttp.open("post", "/getScreenOfTheatre");
        xmlHttp.send(formData);
        function progressHandler(event) {
            console.log('loading...');
        }
        function completeHandler(event) {
            $("#r_screen_id").empty();
            var sel = document.getElementById('r_screen_id');
            var opt = document.createElement('option');
            opt.appendChild( document.createTextNode('Select Screen') );
            opt.setAttribute('disabled','true');
            opt.setAttribute('selected','true');
            sel.appendChild(opt);
            array = JSON.parse(event.target.responseText);
            array.forEach(myFunction);
            function myFunction(item, index) {
                var opt = document.createElement('option');
                opt.appendChild( document.createTextNode(item['screen_name']) );
                opt.value = item['screen_id'];
                sel.appendChild(opt);
            }
            console.log('loading completed');
        }
        function errorHandler(event) {
            console.log('error');
        }
        function abortHandler() {
            console.log('abort');
        }
    }

    function setTotalSeat(ele) {
        if (typeof array === "undefined"){
            getScreen(document.getElementById('r_theatre_id'));
        } else {
            array.forEach(myFunction);
            function myFunction(item, index) {
                if (ele.value == item['screen_id']){
                    document.getElementById('available_seats').value = item['total_seats'];
                }
            }
        }
    }
</script>
</body>
</html>
