<?php
/**
 * Created by PhpStorm.
 * User: 凯瑟琳
 * Date: 2017/8/6
 * Time: 10:07
 */
include_once '../core/database.php';
session_start();
$id=$_REQUEST['id'];
echo $id;
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
    <link rel="stylesheet" href="../static/css/bootstrap.min.css">
    <script src="../static/js/swiper.min.js"></script>
    <link rel="stylesheet" href="../static/css/css.css">
    <link rel="stylesheet" href="../static/css/xiangqing.css">
</head>
<body>
<?php include_once 'header.php'?>
<section class="box">
    <div class="body">
        <?php
        $sql="select * from content where con_id='$id'";
        $result=$db->query($sql);
        $row=$result->fetch_assoc();
        ?>
        <h1 class="title" style="text-align: center;margin-bottom: 30px;"><?php echo $row['con_desc'];?></h1>
        <div style="text-align: center;font-size: 24px;margin-bottom: 30px;"><?php echo $row['con_text'];?></div>
        <div><?php echo $row['con_textbig'];?></div>
    </div>
</section>
<?php include_once 'footer.php'?>
</body>
</html>
