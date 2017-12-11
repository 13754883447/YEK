<?php
/**
 * Created by PhpStorm.
 * User: 凯瑟琳
 * Date: 2017/7/31
 * Time: 18:09
 */
header("content-type:text/html;charset=utf8");
$db=new mysqli("localhost","root","","bool");
if($db->connect_error){
    echo "数据库连接错误".$db->connect_error;
    exit;
}
$result=$db->query("set names utf8");//范指查询器,增删改查都行
?>