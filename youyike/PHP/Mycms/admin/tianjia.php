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
        $sql="select * from category where parent_id='$parentid'";
        $db->query("set names utf8");
        $result=$db->query($sql);
        $rows=$result->fetch_all(MYSQLI_ASSOC);
        $line=str_repeat("-",$num);
        if($rows){
            foreach ($rows as $value){
                $str.="
                 <option value='{$value["cat_id"]}'>{$line}{$value['cat_name']}</option>
      \";
                ";
                getTable($db,$num+1,$value["cat_id"]);
            }
        }
  }
getTable($db);
  $db->close();
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
<div class="panel admin-panel margin-top">
    <div class="panel-head" id="add"><strong><span class="icon-pencil-square-o"></span>添加内容</strong></div>
    <div class="body-content">
        <form method="post" class="form-x" action="tianjiacheck.php">
            <div class="form-group">
                <div class="label">
                    <label>上级分类：</label>
                </div>
                <div class="field">
                    <select name="pid" class="input w50">
                        <option value="0">作为一级标题</option>
                        <?php echo $str?>
                    </select>
                    <div class="tips">不选择上级分类默认为一级分类</div>
                </div>
            </div>
            <div class="form-group">
                <div class="label">
                    <label>分类标题：</label>
                </div>
                <div class="field">
                    <input type="text" class="input w50" name="title" />
                    <div class="tips"></div>
                </div>
            </div>
            <div class="form-group">
                <div class="label">
                    <label></label>
                </div>
                <div class="field">
                    <button class="button bg-main icon-check-square-o" type="submit"> 提交</button>
                </div>
            </div>
        </form>
    </div>
</div>
</body>
</html>