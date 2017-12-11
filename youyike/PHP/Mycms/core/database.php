<?php
/**
 * Created by PhpStorm.
 * User: 凯瑟琳
 * Date: 2017/8/2
 * Time: 15:32
 */
$db=new mysqli("localhost","root","","uek1704");
if($db->connect_error){
    echo "数据库连接错误".$db->connect_error;
    exit;
}
$db->query('set names utf8');
?>