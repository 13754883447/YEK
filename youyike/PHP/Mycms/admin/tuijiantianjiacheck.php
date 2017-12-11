<?php
/**
 * Created by PhpStorm.
 * User: 凯瑟琳
 * Date: 2017/8/3
 * Time: 11:47
 */
include_once '../core/database.php';
session_start();
$mingcheng=$_REQUEST['mingcheng'];
$sql="insert into pos(pos_name) VALUES('$mingcheng')";
$result=$db->query($sql);
if($db->affected_rows>0){
    $text="插入成功";
    $hr="tuijiantianjia.php";
}else{
    $text="插入失败";
    $hr="tuijiantianjia.php";
}
include_once "tips.html";
$db->close();

?>