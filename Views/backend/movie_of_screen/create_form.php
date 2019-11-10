<!DOCTYPE html>
<html lang="en">
<head>
    <?php view('backend/partial/head_links.php') ?>
</head>
<body class="app sidebar-mini">
<?php view('backend/partial/nav_bar.php') ?>
<?php view('backend/partial/side_bar.php') ?>
<?php list($theatres, $screens, $shows, $movies) = import();  ?>
<main class="app-content">
    <div class="app-title">
        <div>
            <h1><i class="fa fa-dashboard"></i> Movies Of Screens</h1>
            <p>Manage Movies Of Screens</p>
        </div>
        <ul class="app-breadcrumb breadcrumb">
            <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
            <li class="breadcrumb-item"><a href="#">MoviesOfScreens / create </a></li>
        </ul>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <span class="pull-left">Create Screen</span>
                    <a href="<?php echo baseURL().'/movieOfScreenIndex'; ?>" class="fa fa-list pull-right text-success" title="View All"></a>
                </div>
                <div class="card-body">
                    <form method="post" action="<?php echo baseURL().'/movieOfScreenStore' ?>">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <select class="form-control" name="r_theatre_id" id="r_theatre_id" onchange="getScreen(this)" required>
                                        <option disabled selected>Select Theatre</option>
                                        <?php foreach ($theatres as $theatre){ ?>
                                            <option value="<?php echo $theatre->theatre_id?>"><?php echo $theatre->theatre_name." (".$theatre->address.")"; ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <select class="form-control" name="r_screen_id" id="r_screen_id" onchange="setTotalSeat(this)" required>
                                        <option disabled selected>Select Screen</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <select class="form-control" name="r_show_id" required>
                                        <option disabled selected>Select Show</option>
                                        <?php foreach (array_reverse($shows) as $show){ ?>
                                            <option value="<?php echo $show->show_id ?>"><?php echo $show->show_name; ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <select class="form-control" name="r_movie_id" required>
                                        <option disabled selected>Select Movie</option>
                                        <?php foreach ($movies as $movie){ ?>
                                            <option value="<?php echo $movie->movie_id?>"><?php echo $movie->name; ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <input class="form-control" type="datetime-local" name="date_time" placeholder="Chose date time" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <input class="form-control" type="number" name="available_seats" id="available_seats" placeholder="Enter Screen seats" required>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <input class="form-control btn btn-primary" type="submit" value="Create New Screen" required>
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
        array.forEach(myFunction);
        function myFunction(item, index) {
            if (ele.value == item['screen_id']){
                document.getElementById('available_seats').value = item['total_seats'];
            }
        }
    }
</script>
</body>
</html>
