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
  <div class="panel-head"><strong><span class="icon-pencil-square-o"></span> 增加内容</strong></div>
  <div class="body-content">
    <form method="post" class="form-x" action="contenttijiao.php">
      <div class="form-group">
        <div class="label">
          <label>title：</label>
        </div>
        <div class="field">
          <input type="text" class="input w50" value="" name="title" data-validate="required:请输入标题" />
          <div class="tips"></div>
        </div>
      </div>
      <div class="form-group">
        <div class="label">
          <label>desc：</label>
        </div>
        <div class="field">
          <input type="text" class="input w50" name="desc" value=""  />
          <div class="tips"></div>
        </div>
      </div>
      <div class="form-group">
        <div class="label">
          <label>img：</label>
        </div>
        <div class="field">
          <input type="file" id="url1" name="file" class="input tips" style="width:25%; float:left;"  value="" data-toggle="hover" data-place="right" data-image="" />
          <input type="button" class="button bg-blue margin-left" id="image1" value="+ 上传"  style="float:left;">
          <div class="tipss">图片尺寸：1920*500</div>
            <div class="clear"></div>
            <input type="hidden" name="dizhi">
            <div id="box" style="height: auto"></div>
        </div>
      </div>
      <div class="form-group">
        <div class="label">
          <label>text：</label>
        </div>
        <div class="field">
          <textarea type="text" class="input" name="text" style="height:120px;" value=""></textarea>
          <div class="tips"></div>
        </div>
      </div>
      <div class="form-group">
        <div class="label">
          <label>cat_id：</label>
        </div>
        <div class="field">
          <input type="text" class="input w50" name="cat_id" value=""  data-validate="required:,number:cat_id必须为数字" />
          <div class="tips"></div>
        </div>
      </div>
        <div class="form-group">
            <div class="label">
                <label>推荐置顶：</label>
            </div>
            <?php echo $astr?>
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
<script>
    let dizhi=document.querySelector("input[name='dizhi']");

    let file=document.querySelector("input[type='file']");//获取
    console.log(file);
    let box=document.querySelector("#box");//
    var arr=[];
    var index=0;
    var max=1*1024*1024;//文件大小
    var geshi=["jpeg","png","gif"];
    file.onchange=function (e) {
        console.log(arr);
//        var files=this.files;
        [...this.files].forEach(function (value) {
            arr.push({id:index,file:value});
            index++;
        });
        if(!check()){
            alert("格式不正确");
            return;
        }
        box.innerHTML="";
        arr.forEach(function (value) {
            var read=new FileReader();
            read.readAsDataURL(value.file);
            read.onload=function () {
                var div=document.createElement("div");
                div.id=value.id;
                div.style.cssText="width:300px;height:200px;border:1px solid #000;position:relative;float:left;";
                div.innerHTML=`
                        <img src="${this.result}" style="width: 100%;" height="100%">
                         <span style="width: 30px; height:30px;background: rgba(0,0,0,.2);position: absolute;right:0;top:0;text-align: center;font-size: 18px;color: #fff;">X</span>
                          <div id="pre${value.id}"  style="background: red;position: absolute;bottom:0;left:0;height:2px;width: 0"></div>
                    `;
                box.appendChild(div);
                div.children[1].onclick=function () {//删除事件
                    var id=div.id;
                    arr=arr.filter(function (value) {
                        return value.id!=id;
                    });
                    box.removeChild(this.parentNode);
                };
            }
        })
    };
    function check() {//检查格式的函数
        for (var i = 0; i < arr.length; i++) {
            let size = arr[i].size;//size大小
            let type = arr[i].file.type;//type什么类型
            if (size > max || !geshi.includes(type.split("/")[1])) {
                return false;
            }
        }
        return true;
    }
    let submit=document.querySelector("#image1");//获取submit
    submit.onclick=function (e) {
        e.preventDefault();//阻止submit的默认提交动作
        arr.forEach(function (value) {
            var formdata=new FormData();//H5新属性  让携带的数据发送过去，
            formdata.append("file",value.file)//fil,被FormData.append()方法转换成了字符串（字段的值（value）
            var ajax=new XMLHttpRequest();//XMLHttpRequest 对象用于在后台与服务器交换数据。
            ajax.upload.onprogress=function (e) {//进度条事件,h5ajax的新属性
                var obj=document.querySelector('#pre'+value.id);
                obj.style.width=e.loaded/e.total*100+'%';
            };
            ajax.onload=function () {
                var a=ajax.responseText;
                dizhi.value=a;
            };
            ajax.open('post','upload.php',true);
            ajax.send(formdata);
        })
    }
</script>
</html>