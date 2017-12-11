<?php
session_start();
$user=$_REQUEST["username"];
$password=md5($_REQUEST["password"]);
$check=$_REQUEST["yanzhengma"];
if(strtolower($check)!=strtolower($_SESSION["word"])){
    $hr="denglu.html";
    $text="验证码错误"."<br>";
    include_once "index.html";
    exit;
}
//连接数据库
$db=new mysqli("localhost","root","","uek1704");
$sql="insert into user(zhanghao,pass) value ('$user','$password')";
$result=$db->query($sql);//范指查询器,增删改查都行
// $db.class.class->affected_rows;  //影响的行数
var_dump($result);
var_dump($db->affected_rows);
if($db->affected_rows==1){
    $hr='denglu.html';
    $text ='注册成功';
}else{
    $hr='zhuce.html';
    $text ='注册失败';
}
include_once "index.html";
?>