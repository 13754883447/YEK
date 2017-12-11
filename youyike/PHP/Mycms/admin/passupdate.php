<?php
/**
 * Created by PhpStorm.
 * User: 凯瑟琳
 * Date: 2017/8/1
 * Time: 16:59
 */
session_start();
$username=$_SESSION["username"];
$oldpass=md5($_REQUEST["oldpass"]);
$newpass=md5($_REQUEST["newpass"]);
$db=new mysqli('localhost','root','','uek1704');
$sql="select pass from user where zhanghao='$username' ";
$result=$db->query($sql);
$row=$result->fetch_assoc();
if($result->num_rows>0){
    if($row['pass']==$oldpass){
        $sql="update user set pass='$newpass' where zhanghao='$username'";
        $result=$db->query($sql);
        $text="修改成功！";
        $hr="denglu.html";
    }else{
        $text="原密码错误！";
        $hr="index.class.php";
    }
}else{
    $text="原密码错误！";
    $hr="index.class.php";
}
include_once "tips.html";
?>