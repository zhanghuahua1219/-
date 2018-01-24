<?php

include "../admin/public/mysql.php";
$sql = "select * from ali_cate where cate_show=1";
$cate_res = mysql_query($sql);



?>


<div class="topnav">
      <ul>
        <li><a href="javascript:;"><i class="fa fa-glass"></i>奇趣事</a></li>
        <li><a href="javascript:;"><i class="fa fa-phone"></i>潮科技</a></li>
        <li><a href="javascript:;"><i class="fa fa-fire"></i>会生活</a></li>
        <li><a href="javascript:;"><i class="fa fa-gift"></i>美奇迹</a></li>
      </ul>
    </div>
    <div class="header">
      <h1 class="logo"><a href="index.php"><img src="/assets/img/logo.png" alt=""></a></h1>
      <ul class="nav">
        <?php while($row = mysql_fetch_assoc($cate_res)){?>
        <li><a href="list.php?id=<?=$row['cate_id'];?>&name=<?=$row['cate_name'];?>"><i class="fa <?=$row['cate_class'];?>"></i><?=$row['cate_name'];?></a></li>
        <?php }?>
      </ul>
      <div class="search">
        <form>
          <input type="text" class="keys" placeholder="输入关键字">
          <input type="submit" class="btn" value="搜索">
        </form>
      </div>
      <div class="slink">
        <a href="javascript:;">链接01</a> | <a href="javascript:;">链接02</a>
      </div>
    </div>