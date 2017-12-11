<?php
session_start();
if(!isset($_SESSION['username'])){
$text="请登陆";
$hr="denglu.html";
include_once "denglu.html";
exit;
}
?>
<!DOCTYPE html>
<html lang="zh-cn">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <meta name="renderer" content="webkit">
    <title>后台管理中心</title>  
    <link rel="stylesheet" href="../static/css/pintuer.css">
    <link rel="stylesheet" href="../static/css/admin.css">
    <script src="../static/js/jquery.min.js"></script>
</head>
<body style="background-color:#f2f9fd;">
<div class="header bg-main">
  <div class="logo margin-big-left fadein-top">
    <h1><img src="../static/images/y.jpg" class="radius-circle rotate-hover" height="50" alt="" />后台管理中心</h1>
  </div>
  <div class="head-l"><a class="button button-little bg-green" href="" target="_blank"><span class="icon-home"></span> 前台首页</a> &nbsp;&nbsp;<a class="button button-little bg-red" href="denglu.html"><span class="icon-power-off"></span> 退出登录</a> </div>
</div>
<div class="leftnav">
  <div class="leftnav-title"><strong><span class="icon-list"></span>菜单列表</strong></div>
  <h2><span class="icon-user"></span>基本设置</h2>
  <ul style="display:block">
    <li><a href="pass.php" target="right"><span class="icon-caret-right"></span>修改密码</a></li>
  </ul>   
  <h2><span class="icon-pencil-square-o"></span>栏目</h2>
  <ul>
    <li>
        <a href="category.php" target="right">
            <span class="icon-caret-right"></span>栏目管理
        </a>
    </li>
      <li>
          <a href="tianjia.php" target="right">
              <span class="icon-caret-right"></span>添加栏目
          </a>
      </li>
  </ul>
    <h2><span class="icon-pencil-square-o"></span>内容</h2>
  <ul>
    <li>
          <a href="content.php" target="right">
                <span class="icon-caret-right"></span>内容管理
          </a>
    </li>
      <li>
          <a href="contenttianjia.php" target="right">
                <span class="icon-caret-right"></span>添加内容
          </a>
      </li>
  </ul>
    <h2><span class="icon-pencil-square-o"></span>推荐位</h2>
  <ul>
    <li>
          <a href="tuijian.php" target="right">
                <span class="icon-caret-right"></span>展示
          </a>
    </li>
      <li>
          <a href="tuijiantianjia.php" target="right">
                <span class="icon-caret-right"></span>添加推荐
          </a>
      </li>
  </ul>
</div>
<script type="text/javascript">
$(function(){
  $(".leftnav h2").click(function(){
	  $(this).next().slideToggle(200);	
	  $(this).toggleClass("on"); 
  })
  $(".leftnav ul li a").click(function(){
	    $("#a_leader_txt").text($(this).text());
  		$(".leftnav ul li a").removeClass("on");
		$(this).addClass("on");
  })
});
</script>
<ul class="bread">
  <li><a href="{:U('Index/info')}" target="right" class="icon-home"> 首页</a></li>
  <li><a href="##" id="a_leader_txt">网站信息</a></li>
  <li><b>当前语言：</b><span style="color:red;">中文</php></span>
  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;切换语言：<a href="##">中文</a> &nbsp;&nbsp;<a href="##">英文</a> </li>
</ul>
<div class="admin">
  <iframe scrolling="auto" rameborder="0" src="info.php" name="right" width="100%" height="100%"></iframe>
</div>
<div style="text-align:center;">
<p>来源:<a href="http://www.mycodes.net/" target="_blank">源码之家</a></p>
</div>
</body>
</html>