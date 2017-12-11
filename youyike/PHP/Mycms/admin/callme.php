<?php
include_once '../core/database.php';
session_start();
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../static/iconfont/iconfont.css">
    <link rel="stylesheet" href="../static/css/swiper.min.css">
    <script src="../static/js/jquery.min.js"></script>
    <script src="../static/js/js.js"></script>
    <!--<script src="js/jquery.fullPage.min.js"></script>-->
    <link rel="stylesheet" href="../static/css/bootstrap.min.css">
    <script src="../static/js/swiper.min.js"></script>
    <link rel="stylesheet" href="../static/css/css.css">
<!--    <link rel="stylesheet" href="../static/css/callme.css">-->
</head>
<body>
<?php include_once 'header.php'?>
<section class="Ab-1">
    <div class="Ab-1body row">
        <h2 class="col-xs-12">About</h2>
        <p class="col-xs-12"><a href="Qiye.html">Home</a>&nbsp;&nbsp;->&nbsp;&nbsp;callme</p>
    </div>
</section><!--banner-->
<div class="form">
<form action="callmecheck.php" method="post">
    <pre>
    姓名:<input type="text" name="name">

    性别:<input type="text" name="sex">

    电话:<input type="text" name="phonenumber">

    <input type="submit" value="提交">
    </pre>
</form>
</div>
<?php include_once 'footer.php'?>
</html>
<script>
//    let name=document.querySelector("input[name='name']");
//    let sex=document.querySelector("input[name='sex']");
//    let phonenumber=document.querySelector("input[name='phonenumber']");
    $("input[name='name']").focus(function(){
//       alert(1);
    });
    $("input[name='name']").blur(function(){
        if(!name){
            alert("请填写名字");
        }
        var str =  $("input[name='name']").val();
        var ret = /^([\u4e00-\u9fa5]{1,20}|[a-zA-Z\.\s]{1,20})$/;
        if(ret.test(str)){
            alert('ok');
        }else{
            alert('wrong');
        }
    })
</script>
