<?php
/**
 * Created by PhpStorm.
 * User: 凯瑟琳
 * Date: 2017/8/2
 * Time: 15:30
 */
include_once "../core/database.php";
//session_start();
$name=$_REQUEST['title'];
$parentid=$_REQUEST['pid'];
    $sql="insert into category(cat_name,parent_id) values('$name','$parentid')";
$result=$db->query($sql);
if($db->affected_rows>0){
    $text="添加成功";
    $hr="tianjia.php";
}else{
    $text="添加失败";
    $hr="tianjia.php";
}
include_once "tips.html";
$db->close();
?>