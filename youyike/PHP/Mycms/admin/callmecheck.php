<?php
/**
 * Created by PhpStorm.
 * User: 凯瑟琳
 * Date: 2017/8/7
 * Time: 22:17
 */
include_once '../core/database.php';
session_start();
$name=$_REQUEST['name'];
$sex=$_REQUEST['sex'];
$phonenumber=$_REQUEST['phonenumber'];
$sql="insert into callme(name,sex) VALUES ('$name','$sex')";
$result=$db->query($sql);
if($db->affected_rows>0){
    echo "提交成功";
}else{
    echo "提交失败";
}
?>