<?php
/**
 * Created by PhpStorm.
 * User: 凯瑟琳
 * Date: 2017/8/7
 * Time: 9:42
 */

class session
{
    function __construct()
    {
        session_start();
    }
    function set($k,$v){
        $_SESSION[$k]=$v;
    }
    function get($k){
        if(isset($_SESSION[$k])){
            return $_SESSION[$k];
        }else{
            return false;
        }
    }
    function del($k){
        unset($_SESSION[$k]);
    }
    function clear(){
        foreach ($_SESSION as $k=>$v){
            unset($_SESSION[$k]);
        }
    }
}