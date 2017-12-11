<?php
/**
 * Created by PhpStorm.
 * User: 凯瑟琳
 * Date: 2017/8/2
 * Time: 21:41
 */
include_once '../core/database.php';
session_start();
$id=$_REQUEST['con_id'];
$sql="delete from content where con_id='$id'";
$result=$db->query($sql);
if($db->affected_rows>0){
    $text="删除成功";
    $hr="content.php";
}else{
    $text="删除失败";
    $hr="content.php";
}
include_once "tips.html";
$db->close();

?>