<?php
include_once '../core/database.php';
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimum-scale=1.0, maximum-scale=1.0">
    <link rel="stylesheet" href="../static/iconfont/iconfont.css">
    <script src="../static/js/jquery.min.js"></script>
    <link rel="stylesheet" href="../static/css/bootstrap.min.css">
    <link rel="stylesheet" href="../static/css/about.css">
</head>
<body>
<?php include_once 'header.php';?>
<section class="Ab-1">
    <div class="Ab-1body row">
        <h2 class="col-xs-12">About</h2>
        <p class="col-xs-12"><a href="Qiye.html">Home</a>&nbsp;&nbsp;->&nbsp;&nbsp;About</p>
    </div>
</section><!--banner-->
<section class="Ab-2">
    <div class="Ab-2body row">
        <?php
        $sql="select * from about where ab_id='1'";
        $result=$db->query($sql);
        $row=$result->fetch_assoc();
        ?>
        <div class="xiaoxiang col-lg-6 col-md-6"><img src="<?php echo $row['ab_img'];?>" alt=""></div>
        <div class="shuju col-lg-6 col-md-6 col-sm-12 col-xs-12">
            <h1><?php echo $row['ab_title']?></h1>
            <p><?php echo $row['ab_text']?></p>
            <div class="jindutiaobox">
                <ul>
                    <li>
                        <p><?php echo $row['ab_tx1']?></p>
                        <div class="jindubox">
                            <div class="jindu1"><div class="jindu2 w7"></div></div>
                        </div>
                    </li>
                    <li>
                        <p><?php echo $row['ab_tx2']?></p>
                        <div class="jindubox">
                            <div class="jindu1"><div class="jindu2 w54"></div></div>
                        </div>
                    </li>
                    <li>
                        <p><?php echo $row['ab_tx3']?></p>
                        <div class="jindubox">
                            <div class="jindu1"><div class="jindu2 w87"></div></div>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</section><!--What We Do-->
<section class="Ab-3">
    <div class="S4neirong row">
        <h2>Get a Loan In 3 Quick Steps</h2>
            <ul>
                <?php
                $sql="select * from content where cat_id='11'and pos_id='6'";
                $result=$db->query($sql);
                while($row=$result->fetch_assoc()):
                    ?>
                    <li class="col-md-4 col-xs-12 col-sm-12">
                        <div class="S4linei">
                            <div class="S4biaoti"><?php echo $row['con_title']?></div>
                            <h5><?php echo $row['con_desc']?></h5>
                            <p><?php echo $row['con_text']?></p>
                        </div>
                    </li>
                <?php endwhile;?>
        </ul>
    </div>
</section><!--3个框-->
<section class="Ab-4">
    <div class="Ab-4body row">
        <?php
        $sql="select * from about where ab_id='2'";
        $result=$db->query($sql);
        $row=$result->fetch_assoc();
        ?>
        <div class="shuju4 col-lg-6 col-md-6 col-sm-12 col-xs-12">
            <h1><?php echo $row['ab_title']?></h1>
            <p><?php echo $row['ab_text']?></p>
            <div class="shuju4body">
                <p><?php echo $row['ab_tx1']?></p>
                <p><?php echo $row['ab_tx2']?></p>
            </div>
        </div>
        <div class="xiaoxiang col-lg-6 col-md-6"><img src="<?php echo $row['ab_img']?>" alt=""></div>
    </div>
</section><!--What We Do2-->
<section class="Ab-5">
    <div class="Ab-5body row">
        <?php
        $sql="select * from about where cat_id='14' and pos_id='1'";
        $result=$db->query($sql);
        while($row=$result->fetch_assoc()):
            ?>
        <div class="col-lg-3 col-md-6">
            <div class="Ab-5imgbox">
                <img src="<?php echo $row['ab_img']?>" alt="">
                <div class="Ab-5zhezhao"><a href=""><?php echo $row['ab_tx1']?></a></div>
            </div>
            <div class="A5-textbox">
                <h4><a href=""><?php echo $row['ab_title']?></a></h4>
                <p><?php echo $row['ab_text']?></p>
                <hr>
                <ul>
                    <li class="iconfont col-lg-4 col-xs-4 col-md-4 col-sm-4"><a href="">&#xe60f;</a></li>
                    <li class="iconfont col-lg-4 col-xs-4 col-md-4 col-sm-4"><a href="">&#xe600;</a></li>
                    <li class="iconfont col-lg-4 col-xs-4 col-md-4 col-sm-4"><a href="">&#xe601;</a></li>
                </ul>
            </div>
        </div>
        <?php endwhile;?>
    </div>
</section><!--医生名单-->
<?php include_once 'footer.php';?>
</body>
<script>
	$(function () {
		$(".lianjie").addClass("lianjiein");
		$(".swiper1>ul>li>h2").addClass("h2in");
		$(".swiper1>ul>li>p").addClass("pin");
		$(".HDlist").click(function () {//菜单header
			$(".daohangxiala").slideToggle();
		})
		var wh=$(window).height();//滚动条
		$(window).scroll(function(){//轮播
			var s=wh-$(window).scrollTop();
			if(s>275){
				$(".daohang").css({
					position: "relative",
					width:"100%",
					margin:"0 auto",
					height:"107px",
					padding:0,
				});
				$(".DHneirong").css({
					width: "",
					height: "",
					margin: "0 auto",
					display: "flex",
					"justify-content": "space-between",
					padding: "36px 15px 34px",
				})
			}
			if(s<275){
				$(".daohang").css({
					position: "fixed",
					top:0,
					left:0,
					height:"56px",
				})
				$(".DHneirong").css({
					height: "100%",
					padding: 0,
					"padding-top":"10px",
				})
			}
		});
		let S5li=$(".S5ul2>li");
		$(".S5ul2>li").click(function (index,value) {//S5任务详细
			var i=$(this).index();
			$(".S5ul2>li").removeClass("active").eq(i).addClass("active");
			$(".S5b1").removeClass("active").eq(i).addClass("active");
			$(".linseciton").removeClass("active").eq(i).addClass("active");
		})
		//header下拉
		console.log($(".GNxiala"));
		console.log($(".slide"));
		$(".slide").hover(function (index) {
			$(".GNxiala").finish();
			var i=$(this).index()-1;
			$(".GNxiala").eq(i).slideToggle();
		})
	})
</script>
</html>