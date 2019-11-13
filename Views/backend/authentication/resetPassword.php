<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Main CSS-->
    <link rel="stylesheet" type="text/css" href="<?php echo asset('backend/css/main.css') ?>">
    <!-- Font-icon css-->
    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>Login - <?php echo constant('APP_NAME'); ?></title>
</head>
<body>
<section class="material-half-bg">
    <div class="cover"></div>
</section>
<section class="login-content">
    <div class="logo">
        <h1><?php echo constant('APP_NAME'); ?></h1>
    </div>
    <div class="login-box">
        <?php
        $data = import();
        if (isset($data['message'])){
            echo '<center><span style="color: red;">'.$data['message'].'</span></center>';
        }
        ?>
        <form class="login-form" method="post" action="<?php echo baseURL().'/resetAdmin'; ?>">
            <div class="form-group">
                <label class="control-label">Enter OTP</label>
                <input class="form-control" type="number" name="otp" placeholder="OTP">
            </div>
            <div class="form-group">
                <label class="control-label">New Password</label>
                <input class="form-control" type="password" name="password" placeholder="Password">
            </div>
            <div class="form-group">
                <label class="control-label">Confirm Password</label>
                <input class="form-control" type="password" name="cpassword" placeholder="Confirm Password">
            </div>
            <div class="form-group btn-container">
                <button class="btn btn-block btn-primary"><i class="fa fa-sign-in fa-lg fa-fw"></i>SIGN IN</button>
            </div>
        </form>
    </div>
</section>
<!-- Essential javascripts for application to work-->
<script src="<?php echo asset('backend/js/jquery-3.3.1.min.js') ?>"></script>
<script src="<?php echo asset('backend/js/popper.min.js') ?>"></script>
<script src="<?php echo asset('backend/js/bootstrap.min.js') ?>"></script>
<script src="<?php echo asset('backend/js/main.js') ?> "></script>
<!-- The javascript plugin to display page loading on top-->
<script src="<?php echo asset('backend/js/plugins/pace.min.js') ?>"></script>
<script type="text/javascript">
    // Login Page Flipbox control
    $('.login-content [data-toggle="flip"]').click(function() {
        $('.login-box').toggleClass('flipped');
        return false;
    });
</script>
</body>
</html>