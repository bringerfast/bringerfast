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
    return str_replace('/Helpers/Functions','',__DIR__);
}

function dd($data){
    echo "<body style='background: #0b2e13;width: 100%;color: white;'><h1 style='text-align: center'>Display Data</h1><pre>";
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
    include_once basePath()."/Views/".$ViewName.".php";
}

function baseURL(){
    return constant("BASE_URL");
}

function view($filename){
    include_once basePath().'/Views/'.$filename;
}

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

function asset($name){
    return constant('BASE_URL').'/Assets/'.$name;
}

function throwError($errorMsg){
    echo "<body style='background: #0b2e13;width: 100%;color: white;'><h1 style='text-align: center'>Error Message</h1>";
    die(
        "<hr><div style='background: #0b2e13;width: 100%;color: white;'>$errorMsg</div><hr></body>"
    );
}

function redirect($route){
    header("Location: ".baseURL().$route);
}

/**
 * Get content form web.php then evaluate content with some addition string
 */
function RouteLoader(){
    $useStatement = 'use Request\Route;';
    $useStatement .= 'use Request\Request;';
    $webPHP = $useStatement.file_get_contents(basePath()."/Routes/web.php");
    $webPHP .= 'Route::init();';
    $route = str_replace('<?php', '',$webPHP);
    eval($route);
}
RouteLoader();




