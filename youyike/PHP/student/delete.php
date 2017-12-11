<?php
/**
 * Created by PhpStorm.
 * User: 凯瑟琳
 * Date: 2017/7/31
 * Time: 19:59
 */
include_once "common.php";
$ID=$_REQUEST["id"];
$sql="delete from student where id='$ID'";
$result=$db->query($sql);
if($db->affected_rows>=1){
    echo "已移除";
}else{
    echo "移除未成功";
}
?>