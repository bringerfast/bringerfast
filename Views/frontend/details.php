<!doctype html>
<html lang="en">
<head>
<?php view('frontend/partial/head_links.php') ?>
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
                    <img src="<?php echo asset('uploads/images/1573167988_4418241524_1572467151_7313336968_bigil_banner1.jpg')?>" alt="Los Angeles" width="1100" height="500">
                </a>
            </div>
            <div class="carousel-item">
                <a href="#">
                    <img src="<?php echo asset('uploads/images/1573167988_4418241524_1572467151_7313336968_bigil_banner1.jpg')?>" alt="Los Angeles" width="1100" height="500">
                </a>
            </div>
            <div class="carousel-item">
                <a href="#">
                    <img src="<?php echo asset('uploads/images/1573167988_4418241524_1572467151_7313336968_bigil_banner1.jpg')?>" alt="Los Angeles" width="1100" height="500">
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
                <div class="col-md-3 text-center" style="margin-top: -150px">
                    <div class="card card-inverse card-info">
                        <img class="card-img-top" src="https://picsum.photos/200/150/?random" style="padding: 10px" height="300px">
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
                    <div class="row">
                        <?php for ($i=0;$i<3;$i++) { ?>
                            <div class="col-md-4 text-center">
                                <div class="card card-inverse card-info">
                                    <a href="#">
                                        <img class="card-img-top" src="https://picsum.photos/200/150/?random" height="300px">
                                    </a>
                                    <div class="card-block">
                                        <div class="card-text">
                                            description
                                        </div>
                                    </div>
                                    <div class="card-footer">
                                        <small class="btn btn-sm btn-success float-left">Name of movie</small>
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