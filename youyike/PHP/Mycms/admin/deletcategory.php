<?php
/**
 * Created by PhpStorm.
 * User: 凯瑟琳
 * Date: 2017/8/2
 * Time: 8:47
 */
session_start();
$id=$_REQUEST['cat_id'];
$db=new mysqli("localhost","root","","uek1704");
if($db->connect_error){
    echo "数据库连接错误".$db->connect_error;
    exit;
}
$sql="delete from category where cat_id='$id'";
$result=$db->query($sql);
if($db->affected_rows>0){
    $text="删除成功";
    $hr="category.php";
}else{
    $text="删除失败";
    $hr="category.php";
}
include_once "tips.html";
$db->close();

?>