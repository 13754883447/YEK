<?php
/**
 * Created by PhpStorm.
 * User: 凯瑟琳
 * Date: 2017/7/31
 * Time: 18:23
 */
include_once "common.php";
$sql="insert into student(name,age,sex) values ('','0','')";
$result=$db->query($sql);
echo $db->insert_id;
?>