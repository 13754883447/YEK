<?php
/**
 * Created by PhpStorm.
 * User: 凯瑟琳
 * Date: 2017/7/28
 * Time: 14:10
 */
//接收传过来的账号
$username = $_GET['username'];
$db=new mysqli('localhost','root','','uek1704');
$sql="select zhanghao from user where zhanghao='$username' ";
$result=$db->query($sql);
//判断查询的行是否影响了，若已经存在了，就输出0，若不存在就输出1
if($result->num_rows>0){
    echo 0;
}else{
    echo 1;
}
?>