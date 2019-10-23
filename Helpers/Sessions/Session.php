<?php
namespace Sessions;

class Session
{
    /**
     * @param $key
     * @return mixed|string
     * To get Session value
     */
    public function getSession($key){
        return isset($_SESSION[$key])? $_SESSION[$key] : false;
    }

    /**
     * @param $key
     * @param $value
     * To set Session value
     */
    public function setSession($key,$value){
        $_SESSION[$key] = $value;
    }


    public function sessionTruncate(){
        session_destroy();
    }
}