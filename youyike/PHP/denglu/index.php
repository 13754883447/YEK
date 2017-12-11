<?php
/**
 * Created by PhpStorm.
 * User: 凯瑟琳
 * Date: 2017/7/26
 * Time: 10:05
 */
session_start();
if(!isset($_SESSION)){
    $text="请登陆";
    $hr="denglu.html";
    include_once "index.html";
    exit;
}
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <title>Document</title>
</head>
<body>
<div>
    <h1>Hello! Welcome to this HTML!</h1>
    <a href="denglu.html">Back</a>
</div>
</body>
</html>
