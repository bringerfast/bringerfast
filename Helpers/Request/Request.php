<?php
namespace Request;
use Sessions\Session;

class Request extends Session implements IRequest
{
    /**
     * Request constructor.
     */
    function __construct()
    {
        foreach($_SERVER as $key => $value)
        {
            $this->{$this->toCamelCase($key)} = $value;
        }
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
            $body = array();
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