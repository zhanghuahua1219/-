<!DOCTYPE html>
<html lang="zh-CN">
<head>
  <meta charset="utf-8">
  <title>Users &laquo; Admin</title>
  <link rel="stylesheet" href="/assets/vendors/bootstrap/css/bootstrap.css">
  <link rel="stylesheet" href="/assets/vendors/font-awesome/css/font-awesome.css">
  <link rel="stylesheet" href="/assets/vendors/nprogress/nprogress.css">
  <link rel="stylesheet" href="/assets/css/admin.css">
  <script src="/assets/vendors/nprogress/nprogress.js"></script>
</head>
<?php 
include "../public/checksession.php"; 
include "../public/mysql.php";

$pageno = isset($_GET['pageno']) ? $_GET['pageno'] : 1;
$pagesize = 3;
$start = ($pageno - 1) * $pagesize;

$sql = "select * from ali_user limit $start,$pagesize";
$res = mysql_query($sql);

?>

<body>
  <script>NProgress.start()</script>

  <div class="main">
    <?php include '../public/nav.php';?>
    <div class="container-fluid">
      <div class="page-title">
        <h1>用户</h1>
        <a href="user_adduser.php">添加新用户</a>
      </div>
      <!-- 有错误信息时展示 -->
      <!-- <div class="alert alert-danger">
        <strong>错误！</strong>发生XXX错误
      </div> -->
      <div class="row">
        <div class="col-md-8">
          <div class="page-action">
            <!-- show when multiple checked -->
            <a class="btn btn-danger btn-sm" href="javascript:;" style="display: none">批量删除</a>
          </div>
          <table class="table table-striped table-bordered table-hover">
            <thead>
               <tr>
                <th class="text-center" width="40"><input type="checkbox"></th>
                <th class="text-center" width="80">头像</th>
                <th>邮箱</th>
                <th>别名</th>
                <th>昵称</th>
                <th>状态</th>
                <th class="text-center" width="100">操作</th>
              </tr>
            </thead>
            <tbody>

              <?php while($row = mysql_fetch_assoc($res)) {?>
              <tr>
                <td class="text-center"><input type="checkbox"></td>
                <td class="text-center"><img class="avatar" src="/assets/img/default.png"></td>
                <td><?php echo $row['user_email'] ?></td>
                <td><?php echo $row['user_slug'] ?></td>
                <td><?php echo $row['user_nickname'] ?></td>
                <td><?php echo $row['user_state'] == 1 ? '激活' : '未激活' ?></td>
                <td class="text-center">
                  <a href="user_edit.php?id=<?php echo $row['user_id'] ;?>" class="btn btn-default btn-xs">编辑</a>
                  <a href="javascript:;" data="<?php echo $row['user_id'] ;?>" class="btn btn-danger btn-xs deluser">删除</a>
                </td>
              </tr>
              <?php } ?>

              </tbody>
          </table>

          <?php 
          $sql = "select count(*) as num from ali_user";
          $res = mysql_query($sql);
          $tmp = mysql_fetch_assoc($res);
          $count = $tmp['num'];

          $pages = ceil($count/$pagesize);

          $prev = $pageno <= 1 ? 1 : ($pageno - 1);
          // if($pageno <= 1) {
          //  $prev = 1;
          // } else {
          //  $prev = ($pageno - 1);
          // }
          // print_r($prev);
          $next = $pageno >= $pages ? $pages : ($pageno + 1);
          // if($pageno >= $pages) {
          // $next = $pages;
          // } else {
          // $next = ($pageno + 1);
          // }
          // print_r($next);
 
           ?>

          <ul class="pagination pagination-sm pull-right">
            <li><a href="users.php?pageno=1">首页</a></li>
            <li><a href="users.php?pageno=<?php echo $prev;?>">上一页</a></li>

            <!-- for($i = 1; $i <= $pages; $i++) {?> -->
            <li><a href="users.php?pageno=<?php echo $pageno;?>"><?php echo $pageno;?></a></li>
            <!--  } ?>    -->        

            <li><a href="users.php?pageno=<?php echo $next;?>">下一页</a></li>
            <li><a href="users.php?pageno=<?php echo $pages;?>">尾页</a></li>
          </ul>
        </div>
      </div>
    </div>
  </div>
  <div class="aside">

    <?php include '../public/aside.txt'?>
  </div>

  <script src="/assets/vendors/jquery/jquery.js"></script>
  <script src="/assets/vendors/bootstrap/js/bootstrap.js"></script>
  <script>NProgress.done()</script>
 
</body>
<script>
$(function () {
	$(".deluser").click(function () {
		if(confirm('您确认删除用户吗？')) {
			var userid = $(this).attr('data');
			var that = $(this);
			$.post('user_deluser.php', {'id':userid}, function(msg){
				if(msg == 1) {
					alert('删除成功');
					that.parent().parent().remove();
				} else {
					alert('删除失败');
				}
			})

			/*$.ajax({
				url:'user_deluser.php',
				data:{'id':userid},
				type:'post',
				dataType:'text',
				success:function(data) {
					if(data == 1) {
						alert('删除成功');
						$(that).parent().parent().remove();
					} else {
						alert('删除失败');
					}
				}
			});*/
		}	
	});
});


</script>

</html>
