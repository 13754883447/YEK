<?php
/**
 * Created by PhpStorm.
 * User: 凯瑟琳
 * Date: 2017/8/2
 * Time: 19:51
 */
include_once '../core/database.php';
session_start();
$title=$_REQUEST['title'];
$desc=$_REQUEST['desc'];
$img=$_REQUEST['dizhi'];
$text=$_REQUEST['text'];
$catid=$_REQUEST['cat_id'];
$posid=$_REQUEST['posid'];
$sql="insert into content(con_title,con_img,con_text,con_desc,cat_id,pos_id) VALUES('$title','$img','$text',
'$desc','$catid','$posid')";
$result=$db->query($sql);
if($db->affected_rows>0){
    $text="添加成功";
    $hr="contenttianjia.php";
}else{
    $text="添加失败";
    $hr="contenttianjia.php";
}
include_once "tips.html";
$db->close();
?>