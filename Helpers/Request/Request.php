<?php
namespace Request;
use Sessions\Session;

class Request extends Session implements IRequest
{
    public $GET = [];
    public $POST = [];
    public $FILES = [];

    /**
     * Request constructor.
     */
    function __construct()
    {
        foreach($_SERVER as $key => $value)
        {
            $this->{$this->toCamelCase($key)} = $value;
        }

        if ($this->requestMethod === "GET"){
            foreach ($_GET as $key => $value){
                $this->$key = $value;
            }
            $this->GET = $_GET;
        }

        if ($this->requestMethod === "POST"){
            foreach ($_POST as $key => $value){
                $this->$key = $value;
            }
            $this->POST;
        }

        foreach ($_FILES as $key => $value){
            $this->$key = $value;
        }
        $this->FILES = $_FILES;
    }

    /**
     * @param $string
     * @return mixed|string
     */
    private function toCamelCase($string)
    {
        $result = strtolower($string);
        preg_match_all('/_[a-z]/', $result, $matches);
        foreach($matches[0] as $match)
        {
            $c = str_replace('_', '', strtoupper($match));
            $result = str_replace($match, $c, $result);
        }
        return $result;
    }

    /**
     * @return string
     * To get Authorization Token From Request
     */
    public function getHttpAuthorization(){
        if (isset($this->httpAuthorization)){
            return $this->httpAuthorization;
        }else{
            return "HttpAuthorization Token Not Found";
        }
    }

    /**
     * @return array|void
     */
    public function getBody()
    {
        if($this->requestMethod === "GET")
        {
            foreach($_GET as $key => $value)
            {
                $body[$key] = filter_input(INPUT_GET, $key, FILTER_SANITIZE_SPECIAL_CHARS);
            }
            return $body;
        }
        if ($this->requestMethod == "POST")
        {
            $body = array();
            foreach($_POST as $key => $value)
            {
                $body[$key] = filter_input(INPUT_POST, $key, FILTER_SANITIZE_SPECIAL_CHARS);
            }
            return $body;
        }
    }

}