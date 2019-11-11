<!doctype html>
<html lang="en">
<head>
    <?php view('frontend/partial/head_links.php') ?>
    <?php $movieOfScreen = import() ?>
</head>
<body style="background: transparent;">
<?php view('frontend/partial/header.php') ?>
<main></main>
<!-- Essential javascripts for application to work-->
<script src="<?php echo asset('backend/js/jquery-3.3.1.min.js') ?>"></script>
<script src="<?php echo asset('backend/js/popper.min.js') ?>"></script>
<script src="<?php echo asset('backend/js/bootstrap.min.js') ?>"></script>
<script src="<?php echo asset('backend/js/main.js') ?>"></script>
<script src="<?php echo asset('frontend/js/main.js') ?>"></script>
</body>
</html>
