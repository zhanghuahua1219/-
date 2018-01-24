<!DOCTYPE html>
<html lang="zh-CN">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>阿里百秀-发现生活，发现美!</title>
  <link rel="stylesheet" href="/assets/css/style.css">
  <link rel="stylesheet" href="/assets/vendors/font-awesome/css/font-awesome.css">
</head>
<body>
  <div class="wrapper">
    
  <?php
  
  include "left.php";
  include "right.php";

  $id = $_GET['id'];
  $name = $_GET['name'];

  $sql = "select post_id, post_title, user_id, num, post_desc, post_updtime, post_click, post_good, cate_name, user_nickname, post_file from ali_post p 
  join ali_user u on p.post_author=u.user_id
  join ali_cate c on p.post_cateid=c.cate_id
  left join (select cmt_postid,count(*) num from ali_comment group by cmt_postid) tmp
  on tmp.cmt_postid=p.post_id
  where cate_id=$id
  order by post_updtime desc limit 0, 3";

  $post_res = mysql_query($sql);
  
  ?>

    <div class="content">
      <div class="panel new">
        <h3><?=$name;?></h3>
        <div class="entry">
          <div class="head">
            <a href="javascript:;">星球大战：原力觉醒视频演示 电影票68</a>
          </div>
          <div class="main">
            <p class="info">admin 发表于 2015-06-29</p>
            <p class="brief">星球大战:原力觉醒：《星球大战:原力觉醒》中国首映盛典红毯，星球大战:原力觉醒：《星球大战:原力觉醒》中国首映盛典红毯，星球大战:原力觉醒：《星球大战:原力觉醒》中国首映盛典红毯星球大战:原力觉醒：《星球大战:原力觉醒》中国首映盛典红毯，星球大战:原力觉醒：《星球大战:原力觉醒》中国首映盛典红毯，星球大战:原力觉醒：《星球大战:原力觉醒》中国首映盛典红毯</p>
            <p class="extra">
              <span class="reading">阅读(3406)</span>
              <span class="comment">评论(0)</span>
              <a href="javascript:;" class="like">
                <i class="fa fa-thumbs-up"></i>
                <span>赞(167)</span>
              </a>
              <a href="javascript:;" class="tags">
                分类：<span>星球大战</span>
              </a>
            </p>
            <a href="javascript:;" class="thumb">
              <img src="/uploads/hots_2.jpg" alt="">
            </a>
          </div>
        </div>
        <?php while($row = mysql_fetch_assoc($post_res)){?>
        <div class="entry">
          <div class="head">
            <span class="sort"><?=$row['cate_name'];?></span>
            <a href="javascript:;"><?=$row['post_title'];?></a>
          </div>
          <div class="main">
            <p class="info"><?=$row['user_nickname'];?> 发表于 <?=date('Y-m-d',$row['post_updtime']);?></p>
            <p class="brief"><?=htmlspecialchars_decode($row['post_desc']);?></p>
            <p class="extra">
              <span class="reading">阅读(<?=$row['post_click'];?>)</span>
              <span class="comment">评论(<?=$row['num'];?>)</span>
              <a href="javascript:;" class="like">
                <i class="fa fa-thumbs-up"></i>
                <span>赞(<?=$row['post_good'];?>)</span>
              </a>
              <a href="javascript:;" class="tags">
                分类：<span>星球大战</span>
              </a>
            </p>
            <a href="javascript:;" class="thumb">
              <img src="/admin/uploads/<?=$row['post_file'];?>" alt="">
            </a>
          </div>
        </div>
        <?php }?>
      </div>
    </div>
    <div class="footer">
      <p>© 2016 XIU主题演示 本站主题由 themebetter 提供</p>
    </div>
  </div>
</body>
</html>
