<?php
/**
 * Created by PhpStorm.
 * User: 凯瑟琳
 * Date: 2017/8/7
 * Time: 9:54
 */
function P($key){
    return $_POST[$key];
}
function G($key){
    return $_GET[$key];
}
function R($key){
    return $_REQUEST[$key];
}
function F($key){
    return $_FILES[$key];
}
$name=P('name');
?>