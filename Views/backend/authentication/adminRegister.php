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
<section class="login-content" style="margin-top: -60px;">
    <div class="logo">
        <h1><?php echo "Admin Register" ?></h1>
    </div>
    <div class="login-box">
        <div class="login-form" style="min-height: 470px;background: white">
            <div class="form-group small">
                <label class="control-label" id="userNameLabel">USER NAME</label>
                <input class="form-control" type="text" name="userName" id="userName" placeholder="User Name" autofocus>
            </div>
            <div class="form-group small">
                <label class="control-label" id="userEmailLabel">USER EMAIL</label>
                <input class="form-control" type="email" name="userEmail" id="userEmail" placeholder="User Email" >
            </div>
            <div class="form-group small">
                <label class="control-label" id="userMobileNumberLabel">USER MOBILE</label>
                <input class="form-control" type="number" name="userMobileNumber" id="userMobileNumber" placeholder="Mobile Number" >
            </div>
            <div class="form-group small">
                <label class="control-label" id="userPasswordLabel">PASSWORD</label>
                <input class="form-control" type="password" name="userPassword" id="userPassword" placeholder="Password" >
            </div>
            <div class="form-group small">
                <label class="control-label" id="userConfirmPasswordLabel">CONFIRM PASSWORD</label>
                <input class="form-control input-sm" type="password" name="userConfirmPassword" id="userConfirmPassword" placeholder="Confirm Password">
            </div>

            <div class="form-group small">
                <div class="utility">
                    <span class="pull-left">
                        <p class="semibold-text mb-2">
                            <a href="<?php echo baseURL().'/admin'?>">Allready have account? </a>
                        </p>
                    </span>
                    <span class="pull-right">
                        <p class="semibold-text mb-2">
                            <button class="btn-success" id="submitBtn" onclick="userValidation()" type="submit">Register</button>
                        </p>
                    </span>
                </div>
            </div>

        </div>
    </div>
</section>
<!-- Essential javascripts for application to work-->
<script src="<?php echo asset('backend/js/jquery-3.3.1.min.js') ?>"></script>
<script src="<?php echo asset('backend/js/popper.min.js') ?>"></script>
<script src="<?php echo asset('backend/js/bootstrap.min.js') ?>"></script>
<script src="<?php echo asset('backend/js/main.js') ?> "></script>
<!-- The javascript plugin to display page loading on top-->
<script src="<?php echo asset('backend/js/plugins/pace.min.js') ?>"></script>
<script>
    function getByID(id) {
        return document.getElementById(id);
    }

    function getByClass(className) {
        return document.getElementsByClassName(className);
    }

    function userValidation() {
        getByID('userNameLabel').innerHTML = "User Name";
        getByID('userEmailLabel').innerHTML = "User Email";
        getByID('userMobileNumberLabel').innerHTML = "User Mobile";
        getByID('userPasswordLabel').innerHTML = "User Password";
        getByID('userConfirmPasswordLabel').innerHTML = "User Confirm Password";
        if (requiredValidation()){
            if(inputDataValidation()){
                ajax();
            }
        }
    }

    function requiredValidation() {
        var userName = getByID('userName');
        var userEmail = getByID('userEmail');
        var userMobileNumber = getByID('userMobileNumber');
        var userPassword = getByID('userPassword');
        var userConfirmPassword = getByID('userConfirmPassword');
        var returnValue = true;
        if (userName.value == "") {
            returnValue = false;
            getByID('userNameLabel').innerHTML="<span>User Name <span  style='color:red''>* required</span></span >";
        }

        if (userEmail.value == "") {
            returnValue = false;
            getByID('userEmailLabel').innerHTML="<span>User Email <span  style='color:red''>* required</span></span >";
        }

        if (userMobileNumber.value == "") {
            returnValue = false;
            getByID('userMobileNumberLabel').innerHTML="<span>User Mobile <span  style='color:red''>* required</span></span >";
        }

        if (userPassword.value == "") {
            returnValue = false;
            getByID('userPasswordLabel').innerHTML="<span>User Password <span  style='color:red''>* required</span></span >";
        }

        if (userConfirmPassword.value == "") {
            returnValue = false;
            getByID('userConfirmPasswordLabel').innerHTML="<span>User Confirm Password <span  style='color:red''>* required</span></span >";
        }

        return returnValue;
    }

    function inputDataValidation() {
        var userName = getByID('userName');
        var userEmail = getByID('userEmail');
        var userMobileNumber = getByID('userMobileNumber');
        var userPassword = getByID('userPassword');
        var userConfirmPassword = getByID('userConfirmPassword');

        var returnValue = true;

        if (!ValidateEmail(userEmail.value)) {
            returnValue = false;
            getByID('userEmailLabel').innerHTML="<span>User Email <span  style='color:red''>* not Valid</span></span >";
        }

        if (!CheckPassword(userPassword.value)){
            returnValue = false;
            getByID('userPasswordLabel').innerHTML="<span>User Password <span  style='color:red''>* alphanumeric & 6 char needed</span></span >";
        }

        if (userPassword.value != userConfirmPassword.value){
            returnValue = false;
            getByID('userConfirmPasswordLabel').innerHTML="<span>User Confirm Password <span  style='color:red''>* not matched</span></span >";
        }

        return returnValue;
    }

    function ValidateEmail(mail)
    {
        return /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(mail)
    }

    function CheckPassword(password)
    {
        return /(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{6,}/.test(password);
    }

    function ajax() {
        getByID('submitBtn').setAttribute('disabled',true);
        var formData = new FormData();
        formData.append('name',getByID('userName').value);
        formData.append('email',getByID('userEmail').value);
        formData.append('mobile',getByID('userMobileNumber').value);
        formData.append('password',getByID('userPassword').value);
        var xmlHttp = new XMLHttpRequest();
        xmlHttp.upload.addEventListener("progress", progressHandler, false);
        xmlHttp.addEventListener("load", completeHandler, false);
        xmlHttp.addEventListener("error", errorHandler, false);
        xmlHttp.addEventListener("abort", abortHandler, false);
        xmlHttp.open("post", "/adminRegister");
        xmlHttp.send(formData);
        function progressHandler(event) {
            console.log('loading...');
        }
        function completeHandler(event) {
            alert(event.target.responseText);
            $(':input').val('');
            getByID('submitBtn').removeAttribute('disabled','');
            console.log('loading completed');
        }
        function errorHandler(event) {
            console.log('error');
        }
        function abortHandler() {
            console.log('abort');
        }
    }

</script>
</body>
</html>