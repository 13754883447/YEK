<?php
/**
 * Created by PhpStorm.
 * User: 凯瑟琳
 * Date: 2017/7/24
 * Time: 11:22
 */
echo "你好！";
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<style>
    div.box{
        width: 200px;
        height: 200px;
        background-color: wheat;
        margin-top: 20px;
    }
</style>
<body>
<?php
    echo "大头大头下雨不愁";
?>
<?php
    echo "<div class='box'></div>"
?>
<div class='<?php  if(1){echo "box";}   ?>'></div>
<?php
    if(1) {
        ?>
        <div class="box"></div>
        <b>132</b>
        <?php
    }
?>
<?php $num=100?>
<?php if($num>200):?><!--混排方式-->
<?php endif;?>
</body>
</html>
