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
    <!--<link rel="stylesheet" href="css/jquery.fullPage.css">-->
    <link rel="stylesheet" href="../static/iconfont/iconfont.css">
    <link rel="stylesheet" href="../static/css/swiper.min.css">
    <script src="../static/js/jquery.min.js"></script>
    <script src="../static/js/js.js"></script>
    <!--<script src="js/jquery.fullPage.min.js"></script>-->
    <link rel="stylesheet" href="../static/css/bootstrap.min.css">
    <script src="../static/js/swiper.min.js"></script>
    <link rel="stylesheet" href="../static/css/css.css">
</head>
<body>
<?php include_once 'header.php';?>
<header class="header">

    <div class="swiper-container swiper1">
        <ul class="swiper-wrapper">
            <li class="swiper-slide">
                <h2>More Than You Expect</h2>
                <p>Loan for any purpose under 0.03% per day</p>
                <div class="lianjie"><a href="Qiye.html">check yuou too</a></div>
            </li>
            <li class="swiper-slide">
                <h2>More Than You Epect</h2>
                <p>Loan for any purpose under 0.03% per day</p>
                <div class="lianjie"><a href="Qiye.html">check yuou too</a></div>
            </li>
            <li class="swiper-slide">
                <h2>ore Than You Expect</h2>
                <p>Loan for any purpose under 0.03% per day</p>
                <div class="lianjie"><a href="Myindex">check yuou too</a></div>
            </li>
        </ul>
        <div class="swiper-pagination"></div>
        <div class="swiper-button-next"></div><!--下一页-->
        <div class="swiper-button-prev"></div><!--上一页-->
    </div>
    <div class="daohangxiala">
        <ul>
            <?php
            $sql="select * from category where parent_id='0'";
            $result=$db->query($sql);
            while($row=$result->fetch_assoc()):
            ?>
                <li><a href=""><?php echo $row['cat_name']?></a></li>
            <?php endwhile;?>
        </ul>
    </div>
</header>
<section class="section1">
    <div class="xiangyin container">
        <div class="xiangyinbox row">
            <?php
            $sql="select * from content where cat_id='9' and pos_id='5'";
            $result=$db->query($sql);
            while($row=$result->fetch_assoc()):
            ?>
            <div class="col-lg-3 col-sm-6 col-xs-12">
                <div class="iconbox">
                    <div class="boxtop">
                        <div class="boxicon iconfont"><?php echo $row['con_title']?></div>
                        <p><a href='<?php echo "xiangqing.php?id={$row['con_id']}"?>'><?php echo $row['con_desc']?></a></p>
                    </div>
                    <div class="boxbody">
                        <p><?php echo $row['con_text']?></p>
                    </div>
                </div>
            </div>
            <?php endwhile;?>
        </div>
    </div>     <!-- 4张横条 响应式-->
    <div class="about container">
        <h2>About Us</h2>
        <div class="videoBOX">
            <a href="https://www.youtube.com/watch?v=1UWpbtUupQQ"></a>
            <div class="bofang"><span class="iconfont">&#xe814;</span></div>
        </div>
    </div><!-- About us-->
</section>
<section class="section2">
    <div class="S2neirong">
        <div class="S2neirongBOX">
            <div class="S2NR1 col-md-5">
                <h2>Better Rates</h2>
                <h5>By using better data</h5>
                <p>There's more to you than your credit score. Your education and job history help us understand more about your future.</p>
                <form action="">
                    <div class="sel1">
                        <select name="" id="" data-placement="Demo">
                            <option value="1">Demo Item 1-1</option>
                            <option value="2">Demo Item 1-1</option>
                            <option value="3">Demo Item 1-1</option>
                            <option value="4">Demo Item 1-1</option>
                            <option value="5">Demo Item 1-1</option>
                        </select>
                    </div>
                    <div class="sel2">
                        <select name="" id="">
                            <option value="1">Demo Item 1-1</option>
                            <option value="2">Demo Item 1-1</option>
                            <option value="3">Demo Item 1-1</option>
                            <option value="4">Demo Item 1-1</option>
                            <option value="5">Demo Item 1-1</option>
                        </select>
                    </div>
                </form>
            </div>
            <div class="S2NR2 col-md-6 col-md-offset-1">
                <table>
                    <tbody>
                    <tr>
                        <th></th>
                        <th><img src="../static/images/logo-dark.png" alt=""></th>
                        <th>Other Lenders</th>
                    </tr>
                    <tr>
                        <td>FICO score</td>
                        <td>√</td>
                        <td>√</td>
                    </tr>
                    <tr>
                        <td>FICO score</td>
                        <td>√</td>
                        <td>√</td>
                    </tr>
                    <tr>
                        <td>FICO score</td>
                        <td>√</td>
                        <td>√</td>
                    </tr>
                    <tr>
                        <td>FICO score</td>
                        <td>√</td>
                        <td>√</td>
                    </tr>
                    <tr>
                        <td>FICO score</td>
                        <td>√</td>
                        <td>√</td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <!--<div class="zhezhao"></div>-->
</section>
<section class="section3">
    <div class="S3neirong row">
        <ul class="S3neirongbox">
            <?php
            $sql="select * from content where cat_id='12'and pos_id='6'";
            $result=$db->query($sql);
            while($row=$result->fetch_assoc()):
            ?>
            <li class="col-md-4 col-xs-12">
                <div class="S3linei">
                    <div class="S3litop">
                        <h5><?php echo $row['con_title']?></h5>
                        <ul>
                            <li>☆</li>
                            <li>☆</li>
                            <li>☆</li>
                            <li>☆</li>
                            <li>☆</li>
                        </ul>
                        <p><?php echo $row['con_text']?></p>
                    </div>
                    <div class="S3libottom">
                        <div class="S3libtnr">
                            <div class="touxiang"><img src="<?php echo $row['con_img']?>" alt=""></div>
                            <div class="btbody">
                                <cite><?php echo $row['con_desc']?></cite>
                                <p><?php echo $row['con_zhiye']?></p>
                            </div>
                        </div>
                    </div>
                </div>
            </li>
            <?php endwhile;?>
        </ul>
    </div>
</section><!--医生-->
<section class="section4">
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
<section class="section5">
    <div class="S5neirongbox row">
        <div class="S5body">
            <div class="col-lg-6  S5body1 col-lg-offset-3 col-md-7 col-md-offset-5 col-sm-7 col-sm-offset-4  col-xs-12 col-xs-offset-3">
                <?php
                $sql1="select * from content where con_id=30";
                $result1=$db->query($sql1);
                $row1=$result1->fetch_assoc();
                ?>
                <?php
                $sql2="select * from content where con_id=31";
                $result2=$db->query($sql2);
                $row2=$result2->fetch_assoc();
                ?>
                <?php
                $sql3="select * from content where con_id=32";
                $result3=$db->query($sql3);
                $row3=$result3->fetch_assoc();
                ?>
                <div class="S5by1-1">
                    <img src="<?php echo $row1['con_img'];?>" alt="" class="S5b1 col-xs-12 active">
                    <img src="<?php echo $row2['con_img'];?>" alt="" class="S5b1 col-xs-12 ">
                    <img src="<?php echo $row3['con_img'];?>" alt="" class="S5b1 col-xs-12 ">
                    <div class="S5bodytop">
                        <div class="S5li active">
                            <div class="linseciton active col-xs-12">
                                <div><?php echo $row1['con_zhiye'];?></div>
                                <h4><a href="#"><?php echo $row1['con_desc'];?></a></h4>
                                <p><?php echo $row1['con_text'];?></p>
                            </div>
                            <div class="linseciton  col-xs-12">
                                <div><?php echo $row2['con_zhiye'];?></div>
                                <h4><a href="#"><?php echo $row2['con_desc'];?></a></h4>
                                <p><?php echo $row2['con_text'];?></p>
                            </div>
                            <div class="linseciton  col-xs-12">
                                <div><?php echo $row3['con_zhiye'];?></div>
                                <h4><a href="#"><?php echo $row3['con_desc'];?></a></h4>
                                <p><?php echo $row3['con_text'];?></p>
                            </div>
                        </div>
                    </div>
                </div>
                <ul class="S5ul2 col-xs-12">
                    <li class="active col-xs-4 col-lg-4">
                        <img src="<?php echo $row1['con_img'];?>" alt="">
                    </li>
                    <li class=" col-xs-4 col-lg-4">
                        <img src="<?php echo $row2['con_img'];?>" alt="">
                    </li>
                    <li class=" col-xs-4 col-lg-4">
                        <img src="<?php echo $row3['con_img'];?>" alt="">
                    </li>
                </ul>
            </div>
            <div class="col-md-3 S5body2">
                <div class="you">Your</div>
                <h2>Personal</h2>
                <h2>Managers</h2>
            </div>
        </div>
        <h2 class="S5none">Your personal managers</h2>
    </div>
</section><!--Personal Managers-->
<section class="section6">
<div class="S6neirong">
    <div class="S6neirongBOX">
        <div class="S6NR1 col-md-5">
            <h2>Better Rates</h2>
            <h5>By using better data</h5>
            <p>There's more to you than your credit score. Your education and job history help us understand more about your future.</p>
            <form action="">
                <div class="sel1">
                    <select name="" id="" data-placement="Demo">
                        <option value="1">Demo Item 1-1</option>
                        <option value="2">Demo Item 1-1</option>
                        <option value="3">Demo Item 1-1</option>
                        <option value="4">Demo Item 1-1</option>
                        <option value="5">Demo Item 1-1</option>
                    </select>
                </div>
                <div class="sel2">
                    <select name="" id="">
                        <option value="1">Demo Item 1-1</option>
                        <option value="2">Demo Item 1-1</option>
                        <option value="3">Demo Item 1-1</option>
                        <option value="4">Demo Item 1-1</option>
                        <option value="5">Demo Item 1-1</option>
                    </select>
                </div>
            </form>
        </div>
        <div class="S6NR2 col-md-6 col-md-offset-1">
            <div class="S6NR2top">
                <div class="STbox col-xs-6"><a href=""><img src="../static/images/clients-3.png" alt=""></a></div>
                <div class="STbox col-xs-6"><a href=""><img src="../static/images/clients-3.png" alt=""></a></div>
            </div>
            <div class="S6NR2top">
                <div class="STbox col-xs-6"><a href=""><img src="../static/images/clients-3.png" alt=""></a></div>
                <div class="STbox col-xs-6"><a href=""><img src="../static/images/clients-3.png" alt=""></a></div>
            </div>
        </div>
    </div>
</div>
</section><!--倒数第二-->
<?php include_once 'footer.php' ?>
</body>
</html>