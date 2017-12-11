<?php
/**
 * Created by PhpStorm.
 * User: 凯瑟琳
 * Date: 2017/8/3
 * Time: 9:04
 */
include_once '../core/database.php';
session_start();
$id=$_REQUEST['con_id'];
$title=$_REQUEST['title'];
$desc=$_REQUEST['desc'];
$img=$_REQUEST['dizhi'];
$text=$_REQUEST['text'];
$catid=$_REQUEST['cat_id'];
$posid=$_REQUEST['posid'];
$sql="update content set con_title='$title',con_desc='$desc',con_img='$img',con_text='$text',
cat_id='$catid',pos_id='$posid' 
where 
con_id='$id'";
$result=$db->query($sql);
if($db->affected_rows>0){
    $text="修改成功";
    $hr="content.php";
}else{
    $text="修改失败";
    $hr="contentxiugai.php";
}
include_once 'tips.html';
$db->close();
?>