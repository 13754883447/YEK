<?php
session_start();
$id=$_REQUEST['cat_id'];
$db=new mysqli("localhost","root","","uek1704");
if($db->connect_error){
    echo "数据库连接错误".$db->connect_error;
    exit;
}
$db->query('set names utf8');
$sql="select * from category where cat_id='$id'";
$result=$db->query($sql);
$row=$result->fetch_assoc();
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
    <script src="../static/js/pintuer.js"></script>
    <script src="../static/js/jquery.min.js"></script>
</head>
<body>
<div class="panel admin-panel margin-top">
    <div class="panel-head" id="add"><strong><span class="icon-pencil-square-o"></span>修改栏目</strong></div>
    <div class="body-content">
        <form method="post" class="form-x" action="modifycategorycheck.php">
            <div class="form-group">
                <div class="label">
                    <label>cat_id</label>
                </div>
                <div class="field">
                    <input type="text" class="input w50" name="catid" value="<?php echo $row['cat_id']?>"  readonly/>
                    <div class="tips"></div>
                </div>
            </div>
            <div class="form-group">
                <div class="label">
                    <label>栏目名称</label>
                </div>
                <div class="field">
                    <input type="text" class="input w50" name="catname" placeholder="<?php echo $row['cat_name']?>" />
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
<script>
    let input=$("input[name=catname]")
    console.log(input.val())
    $(".form-x").submit(function (e) {

        e.preventDefault();
        if(input.val()==input.placeholder||input.val()==""){
            alert("请修改栏目名称")
        }else{
            this.submit();
        }
    })
</script>

