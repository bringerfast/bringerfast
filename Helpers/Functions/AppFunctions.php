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
    if (!$_SESSION[$SessionKey]){
        redirect('/');
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




