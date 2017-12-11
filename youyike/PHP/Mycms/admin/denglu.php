<?php
session_start();
$user=$_REQUEST["username"];
$password=md5($_REQUEST["password"]);
$check=$_REQUEST["yanzhengma"];
if(strtolower($check)!=strtolower($_SESSION["word"])){
    $hr="denglu.html";
    $text="验证码错误"."<br>";
    include_once "tips.html";
    exit;
}
//连接数据库
$db=new mysqli("localhost","root","","uek1704");
if($db->connect_error){
    echo "数据库连接错误".$db->connect_error;
    exit;
}
$sql="select zhanghao,pass from user where zhanghao='$user'";
$result=$db->query($sql);//范指查询器,增删改查都行
$row=$result->fetch_array(MYSQLI_ASSOC);
if($result->num_rows>0){
    if($row["pass"]==$password) {
        $hr="index.php";
        $text="登录成功";
        $_SESSION["username"]=$user;
        $_SESSION["password"]=$password;
    }else{
        $text="密码错误";
        $hr="denglu.html";
    }
}else{
    $text="账号不存在";
    $hr="denglu.html";

}
include_once "tips.html";

?>