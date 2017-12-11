<?php
session_start();
$user=$_REQUEST["username"];
$password=$_REQUEST["password"];
$check=$_REQUEST["yanzhengma"];
if(strtolower($check)!=strtolower($_SESSION["word"])){
    $hr="denglu.html";
    $text="验证码错误"."<br>";
    include_once "index.html";
    exit;
}
var_dump(md5(123456));
//连接数据库
$db=new mysqli("localhost","root","","uek1704");
if($db->connect_error){
    echo "数据库连接错误".$db->connect_error;
    exit;
}
$sql="select zhanghao,pass from user where zhanghao='$user'";
$result=$db->query($sql);//范指查询器,增删改查都行
$row=$result->fetch_array(MYSQLI_ASSOC);
var_dump($row);
if($row){
    if($row["pass"]==md5($password)) {
        $hr = "index.class.php";
        $text = "登录成功";
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
var_dump($db);
//if($user=="admin"){
//    if($password=="123456"){
//        $hr="index.class.php";
//        $text="登录成功";
//        $_SESSION["username"]="admin";
//        $_SESSION["password"]="123456";
//    }else{
//        $hr="denglu.html";
//        $text="账号或密码错误"."<br>";
//    }
//}else{
//    $hr="denglu.html";
//    $text="账号不存在!"."<br>";
//}
include_once "index.html";

?>