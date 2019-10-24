<?php

namespace Request;

class Route
{
    /**
     * @var object To Store Request object
     */
    private static $request;
    /**
     * @var array To store available http methods
     */
    private static $supportedHttpMethods = array(
        "GET",
        "POST"
    );
    /**
     * @var array to store get route and callback method as key per value
     */
    private static $get;
    /**
     * @var array to store post route and callback method as key per value
     */
    private static $post;

    /**
     * @param $name
     * @param $arguments
     */
    public static function __callStatic($name, $arguments)
    {
        if ($name=="init"){
            self::resolve();
            exit;
        }
        if(!in_array(strtoupper($name), self::$supportedHttpMethods))
        {
            self::invalidMethodHandler();
        }
        self::$request = new Request();

        if (is_string($arguments[1])){
            $arr = explode('@',$arguments[1]);
            self::${strtolower($name)}[self::formatRoute($arguments[0])] =  ['\\Controllers\\'.$arr[0],$arr[1]];
        } else {
            list($route, $method) = $arguments;
            self::${strtolower($name)}[self::formatRoute($route)] =  $method;
        }
    }

    /**
     * @param $route
     * @return string
     * To remove extra slash form route or to remove tile slash of route
     * and get Get method values
     */
    private static function formatRoute($route)
    {
        $result = rtrim($route, '/');
        if ($result === '')
        {
            return '/';
        }
        return $result;
    }

    /**
     * To send response with 405
     */
    private static function invalidMethodHandler()
    {
        echo "<h1 style='text-align: center'>".self::$request->serverProtocol." 405 Method Not Allowed</h1>";
        header(self::$request->serverProtocol." 405 Method Not Allowed");
    }

    /**
     * To send response with 404
     */
    private static function defaultRequestHandler()
    {
        echo "<h1 style='text-align: center'>".self::$request->serverProtocol." 404 Not Found</h1>";
        header(self::$request->serverProtocol." 404 Not Found");
    }

    /**
     * Resolves a route
     */
    private static function resolve()
    {
        $methodDictionary = self::${strtolower(self::$request->requestMethod)};
        if (strpos(self::$request->requestUri,'?')){
            $getURL =  explode('?',self::$request->requestUri);
            $formatedRoute = self::formatRoute($getURL[0]);
        }else{
            $formatedRoute = self::formatRoute(self::$request->requestUri);
        }
        $method = $methodDictionary[$formatedRoute];
        if(is_null($method))
        {
            self::defaultRequestHandler();
            return;
        }
        if (is_array($method)){
            if(class_exists($method[0])){
                $classObject = new $method[0]();
                if (!method_exists($classObject,$method[1])){
                    throwError('Method Not Found In '.$method[0]);
                }
                echo $classObject->{$method[1]}(self::$request);
            }else{
                throwError('Class Not Found In Controllers '.$method[0]);
            }
        }else{
            echo call_user_func_array($method, array(self::$request));
        }
    }
}
