<?php
include_once '../core/database.php';
  session_start();
  $str="";
  function getTable($db){
      global  $str;
        $sql="select * from pos";
        $result=$db->query($sql);
        $rows=$result->fetch_all(MYSQLI_ASSOC);
        if($rows){
            foreach ($rows as $value){
                $str.="
                 <option value='{$value["pos_id"]}'>{$value['pos_name']}</option>
      \";
                ";
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
    <div class="panel-head" id="add"><strong><span class="icon-pencil-square-o"></span>查看内容</strong></div>
    <div class="body-content">
        <form method="post" class="form-x" action="showtuijian.php">
            <div class="form-group">
                <div class="label">
                    <label>上级分类：</label>
                </div>
                <div class="field">
                    <select name="pid" class="input w50">
                        <?php echo $str?>
                    </select>
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