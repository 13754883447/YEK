<?php
/**
 * Created by PhpStorm.
 * User: 凯瑟琳
 * Date: 2017/7/31
 * Time: 18:24
 */
include_once "common.php";
$sql='select * from student';
$result=$db->query($sql);
$row=$result->fetch_all(MYSQLI_BOTH);
if($result->num_rows>0){
    echo json_encode($row);
}else{
    echo "有误";
}
?>