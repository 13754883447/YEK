<link rel="stylesheet" href="../static/css/header.css">
    <nav class="daohang">
        <div class="DHneirong row">
            <button class="HDlist iconfont">&#xe609;</button>
            <div class="logo"><img src="../static/images/logo-dark.png" alt=""></div>
            <div class="gongneng">
                <ul>
                    <li>
                        <a href="Qiye.php" class="active">HOME</a>
                    </li>
                    <?php
                    $sql="select * from category where parent_id='0'";
                    $result=$db->query($sql);
                    while($row=$result->fetch_assoc()):
                        $sq="select cat_id,cat_name from category where parent_id={$row['cat_id']}";
                        $re=$db->query($sq);
                        ?>
                        <li class="slide">
                            <a href="<?php echo $row['cat_href']?>"><?php echo $row['cat_name'] ?></a>
                            <ul class="GNxiala">
                                <?php  while($ro=$re->fetch_assoc()): ?>
                                    <li><a href=""><?php echo $ro['cat_name'] ?></a></li>
                                <?php endwhile;?>
                            </ul>
                        </li>
                    <?php endwhile;?>
                </ul>
            </div>
            <div class="callme">
                <div class="phone iconfont" style="font-size: 26px">&#xe68d;</div>
                <div class="lianxi">
                    <div class="phonetext">CUSTOMER SERVICE</div>
                    <div class="number"><a href="phone.html">+10086113562</a></div>
                </div>
            </div>
        </div>
    </nav>
