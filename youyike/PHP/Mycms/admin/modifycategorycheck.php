<?php
/**
 * Created by PhpStorm.
 * User: 凯瑟琳
 * Date: 2017/8/2
 * Time: 11:27
 */
session_start();
$id=$_REQUEST['catid'];
$name=$_REQUEST['catname'];
$db=new mysqli("localhost","root","","uek1704");
if($db->connect_error){
    echo "数据库连接错误".$db->connect_error;
    exit;
}
$db->query('set names utf8');
$sql="update category set cat_name='$name' where cat_id='$id'";
$result=$db->query($sql);
if($db->affected_rows>0){
    $text="修改成功";
    $hr="category.php";
}else{
    $text="修改失败";
    $hr="category.php";
}
include_once "tips.html";
$db->close();
?>