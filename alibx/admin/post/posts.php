<!DOCTYPE html>
<html lang="zh-CN">
<head>
  <meta charset="utf-8">
  <title>Posts &laquo; Admin</title>
  <link rel="stylesheet" href="/assets/vendors/bootstrap/css/bootstrap.css">
  <link rel="stylesheet" href="/assets/vendors/font-awesome/css/font-awesome.css">
  <link rel="stylesheet" href="/assets/vendors/nprogress/nprogress.css">
  <link rel="stylesheet" href="/assets/css/admin.css">
  <script src="/assets/vendors/nprogress/nprogress.js"></script>
</head>
<?php 
include "../public/checksession.php";
include "../public/mysql.php";

$cateid = isset($_GET['cateid']) ? $_GET['cateid'] : 0;
$state = isset($_GET['state']) ? $_GET['state'] : 0;

$where = "";
if($cateid != 0){
	$where .= "cate_id = $cateid and ";
} 
if($state != 0) {
	$where .= "post_state = $state and ";
}
$where .= "1";

$pageno = isset($_GET['pageno']) ? $_GET['pageno'] : 1;
$pagesize = 3;
$start = ($pageno - 1) * $pagesize;
$sql="select post_id, post_title,user_nickname,cate_name,post_updtime,post_state 
  from ali_post p
  join ali_user u on p.post_author=u.user_id
  join ali_cate c on p.post_cateid=c.cate_id where $where
  limit $start, $pagesize";

$res = mysql_query($sql);

$sql = "select * from ali_cate";
$cate_res = mysql_query($sql);

 ?>
<body>
  <script>NProgress.start()</script>
 
  <div class="main">
    <?php include "../public/nav.php"; ?>
    <div class="container-fluid">
      <div class="page-title">
        <h1>所有文章</h1>
        <a href="post-add.html" class="btn btn-primary btn-xs">写文章</a>
      </div>
      <!-- 有错误信息时展示 -->
      <!-- <div class="alert alert-danger">
        <strong>错误！</strong>发生XXX错误
      </div> -->
      <div class="page-action">
        <!-- show when multiple checked -->
        <a class="btn btn-danger btn-sm" href="javascript:;" style="display: none">批量删除</a>


        <form class="form-inline" action="posts.php" method="get">
          <select name="cateid" class="form-control input-sm">
            <option value="0">所有分类</option>
            <?php while($row = mysql_fetch_assoc($cate_res)) {?>
            <option value="<?php echo $row['cate_id'] ;?>"><?php echo $row['cate_name'] ;?></option>
            <?php } ?>
          </select>
          <select name="state" class="form-control input-sm">
            <option value="0">所有状态</option>
            <option value="2">草稿</option>
            <option value="1">已发布</option>
          </select>
          <input  type="submit" class="btn btn-default btn-sm" value="筛选">
        </form>
        <?php

        $sql="select count(post_id) num
        from ali_post p
        join ali_user u on p.post_author=u.user_id
        join ali_cate c on p.post_cateid=c.cate_id where $where";
        
        $count_res = mysql_query($sql);
        $count_arr = mysql_fetch_assoc($count_res);
        $count = $count_arr['num'];

        $pages = ceil($count/$pagesize);
        
        $prev = $pageno > 1 ? ($pageno - 1) : 1;
        $next = $pageno < $pages ? ($pageno + 1) : $pages;

        ?>
        <ul class="pagination pagination-sm pull-right">
          <li><a href="posts.php?cateid=<?=$cateid?>&state<?=$state?>&pageno=1">首页</a></li>
          <li><a href="posts.php?cateid=<?=$cateid?>&state<?=$state?>&pageno=<?php echo $prev;?>">上一页</a></li>

          <?php for($i = 1; $i <= $pages; $i++) { ?>
          <li>
            <a href="posts.php?cateid=<?php echo $cateid ;?>&state=<?php echo $state ;?>&pageno=<?php echo $i;?>">
              <?php echo $i ?>
            </a>
          </li>
          <?php }?>

          <li><a href="posts.php?cateid=<?=$cateid?>&state<?=$state?>&pageno=<?php echo $next;?>">下一页</a></li>
          <li><a href="posts.php?cateid=<?=$cateid?>&state<?=$state?>&pageno=<?php echo $pages;?>">尾页</a></li>
        </ul>
      </div>
      <table class="table table-striped table-bordered table-hover">
        <thead>
          <tr>
            <th class="text-center" width="40"><input type="checkbox"></th>
            <th>标题</th>
            <th>作者</th>
            <th>分类</th>
            <th class="text-center">发表时间</th>
            <th class="text-center">状态</th>
            <th class="text-center" width="100">操作</th>
          </tr>
        </thead>
        <tbody>
         <?php while($row = mysql_fetch_assoc($res)) { ;?>
          <tr>
            <td class="text-center"><input type="checkbox"></td>
            <td><?php echo $row['post_title']; ?></td>
            <td><?php echo $row['user_nickname']; ?></td>
            <td><?php echo $row['cate_name']; ?></td>
            <td class="text-center"><?php echo date('Y/m/d',$row['post_updtime']); ?></td>
            <td class="text-center"><?php echo $row['post_state']; ?></td>
            <td class="text-center">
              <a href="editpost.php?id=<?php echo $row['post_id'];?>" class="btn btn-default btn-xs">编辑</a>
              <a href="javascript:;" data="<?php echo $row['post_id'];?>" class=" delpost btn btn-danger btn-xs">删除</a>
            </td>
          </tr>
          <?php } ;?>
        </tbody>
      </table>
    </div>
  </div>

  <div class="aside">
   <?php include "../public/aside.txt"; ?>
  </div>

  <script src="/assets/vendors/jquery/jquery.js"></script>
  <script src="/assets/vendors/bootstrap/js/bootstrap.js"></script>
  <script>NProgress.done()</script>
</body>
<script>
  $(".delpost").click(function () {
    if(confirm("您确认删除吗？")) {
      var id = $(this).attr('data');
      // alert(id);
      _this = $(this);
      $.post('delpost.php',{id:id}, function(msg) {
        // alert(msg);
        if(msg == 2) {
          alert("删除文章失败");
        } else {
          _this.parent().parent().remove();
          alert("删除文章成功");
        }
      })
    } 
  });
</script>
</html>
