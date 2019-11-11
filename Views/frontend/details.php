<!doctype html>
<html lang="en">
<head>
<?php view('frontend/partial/head_links.php') ?>
<?php $movieOfScreen = import() ?>
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
            <div class="carousel-item active">
                <a href="#">
                    <img src="<?php echo $movieOfScreen->banner_image ?>" alt="Los Angeles" width="1100" height="500">
                </a>
            </div>
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
        <div class="card-body">
            <div class="row">
                <div class="col-md-3 text-center" style="margin-top: -100px">
                    <div class="card card-inverse card-info">
                        <img class="card-img-top" src="<?php echo $movieOfScreen->list_image ?>" style="padding: 5px" height="300">
                    </div>
                    <div class="card card-inverse card-info">
                        <div class="card-block">
                            <div class="card-header">
                                <i class="fa fa-angle-down pull-left" data-toggle="collapse" data-target="#language_demo"></i>
                                <b>APPLICABLE OFFERS</b>
                            </div>
                            <div id="language_demo" class="card-body text-left collapse show">
                                <div class="row border-dotted">
                                    <div class="col-md-2">
                                        <img height="30" width="30" src="https://in.bmscdn.com/offers/offerlogo/amazon-pay-cashback-offer-amazonpaycashback.jpg?23102019181006" alt="">
                                    </div>
                                    <div class="col-md-10">
                                        <b>Amazon Pay cashback offer</b><br>
                                        <span class="offer-text">Win Cashback Upto Rs 500*</span>
                                    </div>
                                </div>
                                <div class="row border-dotted">
                                    <div class="col-md-2">
                                        <img height="30" width="30" src="https://in.bmscdn.com/offers/offerlogo/paypal-cashback-offer-paypalcashback.jpg?31102019102826" alt="">
                                    </div>
                                    <div class="col-md-10">
                                        <b>PayPal Offer</b><br>
                                        <span class="offer-text">Transact first time with Paypal and get 100% cashback up to Rs. 500</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-9">
                    <div class="row form-group">
                        <div class="col-md-4 form-group">
                            <div class="card" style="height: 100%">
                                <div class="card-header">Movie Details</div>
                                <div class="card-body">
                                    <table class="table table-sm table-borderless">
                                        <tr>
                                            <td>Movie</td>
                                            <td>:</td>
                                            <td><?php echo $movieOfScreen->name ?></td>
                                        </tr>
                                        <tr>
                                            <td>Duration</td>
                                            <td>:</td>
                                            <td><?php echo $movieOfScreen->duration ?></td>
                                        </tr>
                                        <tr>
                                            <td>Actor</td>
                                            <td>:</td>
                                            <td><?php echo $movieOfScreen->actor ?></td>
                                        </tr>
                                        <tr>
                                            <td>Actress</td>
                                            <td>:</td>
                                            <td><?php echo $movieOfScreen->actress ?></td>
                                        </tr>
                                        <tr>
                                            <td>Director</td>
                                            <td>:</td>
                                            <td><?php echo $movieOfScreen->director ?></td>
                                        </tr>
                                        <tr>
                                            <td>Producer</td>
                                            <td>:</td>
                                            <td><?php echo $movieOfScreen->producer ?></td>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-8 form-group">
                            <div class="card" style="height: 100%">
                                <div class="card-header">Movie Description</div>
                                <div class="card-body">
                                    <?php echo html_entity_decode($movieOfScreen->description)?>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header">Theatres & Details</div>
                                <div class="card-body">
                                    <div class="col-md-6 text-center">
                                        <table class="table table-sm table-striped">
                                            <tr>
                                                <td>Date & time</td>
                                                <td>:</td>
                                                <td><?php echo $movieOfScreen->date_time ?></td>
                                            </tr>
                                            <tr>
                                                <td>show</td>
                                                <td>:</td>
                                                <td><?php echo $movieOfScreen->show_name ?></td>
                                            </tr>
                                            <tr>
                                                <td>Screen</td>
                                                <td>:</td>
                                                <td><?php echo $movieOfScreen->screen_name ?></td>
                                            </tr>
                                            <tr>
                                                <td>Theatre</td>
                                                <td>:</td>
                                                <td><?php echo $movieOfScreen->theatre_name ?></td>
                                            </tr>
                                            <tr>
                                                <td>Address</td>
                                                <td>:</td>
                                                <td><?php echo $movieOfScreen->address ?></td>
                                            </tr>
                                            <tr>
                                                <td>Ticket Price</td>
                                                <td>:</td>
                                                <td><?php echo "RS. 250"; ?></td>
                                            </tr>
                                            <tr>
                                                <form action="<?php echo baseURL().'/booking' ?>" method="post">
                                                    <td><input class="form-control pull-left" type="number" placeholder="number of seats"></td>
                                                    <td></td>
                                                    <td><button class="btn btn-success pull-right">Book Now</button></td>
                                                </form>
                                            </tr>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
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