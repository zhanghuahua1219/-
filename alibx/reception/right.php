<?php

include "../admin/public/mysql.php";
$sql = "select * from ali_post order by rand() limit 0, 5";
$rand_res = mysql_query($sql);

$sql = "select member_nickname, cmt_time, cmt_content, post_id from ali_member m join ali_comment c on m.member_id = c.cmt_memid join ali_post p on c.cmt_postid = p.post_id order by cmt_time desc limit 0, 6";

$cmt_res = mysql_query($sql);

?>

<div class="aside">
      <div class="widgets">
        <h4>搜索</h4>
        <div class="body search">
          <form>
            <input type="text" class="keys" placeholder="输入关键字">
            <input type="submit" class="btn" value="搜索">
          </form>
        </div>
      </div>
      <div class="widgets">
        <h4>随机推荐</h4>
        <ul class="body random">
          <?php while($row = mysql_fetch_assoc($rand_res)){?>
          <li>
            <a href="javascript:;">
              <p class="title"><?=$row['post_title'];?></p>
              <p class="reading">阅读(<?=$row['post_click'];?>)</p>
              <div class="pic">
                <img src="/uploads/<?=$row['post_file'];?>" alt="">
              </div>
            </a>
          </li>
          <?php }?>
        </ul>
      </div>
      <div class="widgets">
        <h4>最新评论</h4>
        <ul class="body discuz">
          <?php while($row = mysql_fetch_assoc($cmt_res)){?>
          <li>
            <a href="javascript:;">
              <div class="avatar">
                <img src="/uploads/avatar_1.jpg" alt="">
              </div>
              <div class="txt">
                <p>
                  <span><?=$row['member_nickname']?></span>9个月前(<?=date('m-d', $row['cmt_time']);?>)说:
                </p>
                <p><?=$row['cmt_content'];?></p>
              </div>
            </a>
          </li>
          <?php }?>
        </ul>
      </div>
    </div>