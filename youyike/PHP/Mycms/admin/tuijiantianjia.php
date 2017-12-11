<?php
    include_once '../core/database.php';
    $sql="select * from pos";
    $result=$db->query($sql);
    $astr="";
    while ($row=$result->fetch_assoc()){
        global $astr;
        $astr.="
        {$row['pos_name']} <input id='ishome' value='{$row['pos_id']}' type='radio' name='posid'/>
        ";
    }
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
<div class="panel admin-panel margin-top" id="add">
  <div class="panel-head"><strong><span class="icon-pencil-square-o"></span> 添加推荐类型</strong></div>
  <div class="body-content">
    <form method="post" class="form-x" action="tuijiantianjiacheck.php">
      <div class="form-group">
        <div class="label">
          <label>名称：</label>
        </div>
        <div class="field">
          <input type="text" class="input w50" value="" name="mingcheng" data-validate="required:请输入名称" />
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