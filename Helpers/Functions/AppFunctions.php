<?php
/**
 * To start Session Globally
 */
session_start();

/**
 * storage place of data between controller and view
 */
$GLOBALS['incommingData'] = [];
$session = '';

/**
 * @return mixed
 * To get the root path of the Application
 */
function basePath(){
    return str_replace('/Helpers/Functions','',str_replace('\\','/',__DIR__));
}

/**
 * @param $data
 * To Display Data for debug
 */
function dd($data){
    echo "<body style='background: #0b2e13;width: 100%;color: white;'><h1 style='text-align: center'>Display Data</h1><hr><pre>";
    print_r($data);
    echo "</body>";
    exit;
}

/**
 * @param $ViewName
 * @param $data
 * To export data from controller to view
 */
function export($ViewName,$data){
    global $incommingData,$session;
    $incommingData = $data;
    $session = new \Sessions\Session();
    $viewFullPath = basePath()."/Views/".$ViewName.".php";
    if (!file_exists($viewFullPath)){
        throwError('View Not Found At : '.$viewFullPath);
    }
    include_once $viewFullPath;
}

/**
 * @return mixed
 * To get base URL
 */
function baseURL(){
    return constant("BASE_URL");
}

function imageUpload($image){
    $target_dir = basePath()."/Assets/uploads/images/";
    $file_name = time()."_".rand(1111111111,9999999999)."_".basename($image["name"]);
    $target_file = $target_dir . $file_name;
    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
    // Check if image file is a actual image or fake image
    $check = getimagesize($image["tmp_name"]);
    if($check !== false) {
        $uploadOk = 1; // file is an image
    } else {
        $uploadOk = 0; // file is not an image
        dd("file is not an image");
    }
    // Check if file already exists
    if (file_exists($target_file)) {
        $uploadOk = 0;
        dd("Sorry, file already exists.");
    }
    // Check file size
    if ($image["size"] > 500000) {
        $uploadOk = 0;
        dd("Sorry, your file is too large.");
    }
    // Allow certain file formats
    if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
        && $imageFileType != "gif" ) {
        $uploadOk = 0;
        dd("Sorry, only JPG, JPEG, PNG & GIF files are allowed.");
    }
    // Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
        dd("Sorry, your file was not uploaded.");
        // if everything is ok, try to upload file
    } else {
        if (move_uploaded_file($image["tmp_name"], $target_file)) {
            return  asset('uploads/images/'.$file_name);
        } else {
            dd("Sorry, there was an error uploading your file.");
        }
    }
}

/**
 * @param $filename
 * To include view
 */
function view($filename){
    $fullPath = basePath().'/Views/'.$filename;
    if (!file_exists($fullPath)){
        throwError('View Not Found At : '.$fullPath);
    }
    include_once $fullPath;
}

/**
 * @param $SessionKey
 * To verify Authentication
 */
function auth($SessionKey){
    if (is_array($SessionKey)){
        $redirect = 1;
        foreach ($SessionKey as $value){
            if (isset($_SESSION[$value])){
                $redirect = 0;
            }
        }
        if ($redirect){
            throwError('<center>Un Authorised Access!. Please Contact Administrator</center>');
        }
    } elseif (!isset($_SESSION[$SessionKey])){
        throwError('<center>Un Authorised Access!. Please Contact Administrator</center>');
    }
}

function is_authorised($SessionKey){
    if (is_array($SessionKey)){
        $redirect = 1;
        foreach ($SessionKey as $value){
            if (isset($_SESSION[$value])){
                $redirect = 0;
            }
        }
        if ($redirect){
            return false;
        }
        return true;
    } elseif (!isset($_SESSION[$SessionKey])){
        return false;
    } else {
        return true;
    }
}

/**
 * @return mixed
 * To import data from view those data were exported at controller
 */
function import(){
    global $incommingData;
    return $incommingData;
}

/**
 * @param $name
 * @return string
 * To incllude css and js file form asset path
 */
function asset($name){
    return constant('BASE_URL').'/Assets/'.$name;
}

/**
 * @param $errorMsg
 * To display error message
 */
function throwError($errorMsg){
    echo "<body style='background: #0b2e13;width: 100%;color: white;'><h1 style='text-align: center'>Error Message</h1>";
    die(
        "<hr><div style='background: #0b2e13;width: 100%;color: white;'>$errorMsg</div><hr></body>"
    );
}

/**
 * @param $route
 * URL redirect
 */
function redirect($route){
    header("Location: ".baseURL().$route);
}

/**
 * Get content form web.php then evaluate content with some addition string
 * To autoload Routes from web.php
 */
function RouteLoader(){
    $useStatement = 'use Request\Route;';
    $useStatement .= 'use Request\Request;';
    $webPHP = $useStatement.file_get_contents(basePath()."/Routes/web.php");
    $webPHP .= 'Route::init();';
    $route = str_replace('<?php', '',$webPHP);
    eval($route);
}

/**
 * To invoke Route loader method
 */
RouteLoader();




