<?php
/**
 * Created by PhpStorm.
 * User: 凯瑟琳
 * Date: 2017/7/31
 * Time: 23:37
 */
include_once "common.php";
$ID=$_REQUEST["id"];
$TYPE=$_REQUEST["Type"];
$VALUE=$_REQUEST["value"];
$sql="update student set $TYPE='$VALUE' where id='$ID'";
var_dump($sql);
$result=$db->query($sql);
if($db->affected_rows>=1){
    echo "修改成功";
}else{
    echo "修改未成功";
}
?>