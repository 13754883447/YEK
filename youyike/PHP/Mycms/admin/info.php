<?php
session_start();
//$name=$_REQUEST['username'];
//var_dump($name);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
</head>
<body>
<h1>欢迎进入管理者系统</h1>
<div id="date"></div>
</body>
</html>
<script>
    let shijian=document.querySelector("#date");
    let t=setInterval(sj,1000);
    function sj() {
        let time=new Date();
        shijian.innerHTML=`${time}`;
    }
</script>
