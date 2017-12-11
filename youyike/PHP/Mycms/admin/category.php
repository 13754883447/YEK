<?php
  session_start();
$db=new mysqli("localhost","root","","uek1704");
if($db->connect_error){
    echo "数据库连接错误".$db->connect_error;
    exit;
}
  $str="";
  function getTable($db,$num=0,$parentid=0){
      global  $str;
      $line=str_repeat("-",$num);
      $sql="select * from category where parent_id='$parentid'";
      $db->query('set names utf8');
      $result=$db->query($sql);
      $rows=$result->fetch_all(MYSQLI_ASSOC);
      if($rows){
            foreach ($rows as $value){
                $str.="
                    <tr>
                        <td>{$value['cat_id']}</td>
                        <td>&nbsp;{$line}{$value['cat_name']}</td>
                        <td>{$value['parent_id']}</td>
                        <td>
                            <div class=\"button-group\">
                            <a type=\"button\" class=\"button border-main\" href=\"modifycategory.php?cat_id={$value['cat_id']}\"><span class=\"icon-edit\"></span>修改</a>
                                <a class=\"button border-red\" href=\"deletcategory.php?cat_id= {$value['cat_id']}\" onclick=\"\"><span class=\"icon-trash-o\"></span> 删除</a>
                            </div>
                        </td>
                    </tr>
                ";
                getTable($db,$num+1,$value['cat_id']);
            }
      }
  }
getTable($db);
?>
<!DOCTYPE html>
<html lang="zh-cn">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <meta name="renderer" content="webkit">
    <title></title>
    <link rel="stylesheet" href="../static/css/pintuer.css">
    <link rel="stylesheet" href="../static/css/admin.css">
    <script src="../static/js/jquery.min.js"></script>
    <script src="../static/js/pintuer.js"></script>
</head>
<body>
<div class="panel admin-panel">
    <div class="panel-head"><strong class="icon-reorder"> 内容列表</strong></div>
    <div class="padding border-bottom">
        <button type="button" class="button border-yellow" onclick="window.location.href='#add'"><span class="icon-plus-square-o"></span> 添加分类</button>
    </div>
    <table class="table table-hover text-center">
        <tr>
            <th width="5%">ID</th>
            <th width="15%">一级分类</th>
            <th width="10%">排序</th>
            <th width="10%">操作</th>
        </tr>
<!--        遍历获取到的值-->
        <?php echo $str?>
    </table>
</div>
<script type="text/javascript">
    function del(id,mid){
        if(confirm("您确定要删除吗?")){

        }
    }
</script>
</body>
</html>