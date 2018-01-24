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

header("content-type:text/html; charset=utf8");
include "../public/checksession.php"; 
include "../public/mysql.php";
$id = $_GET['id'];
// die($id);
$sql = "select * from ali_user where user_id = $id";
// print_r($sql);
$res = mysql_query($sql);
// print_r($res);
$user_info = mysql_fetch_assoc($res);
// print_r($user_info);die;

 ?> 
<body>
  <script>NProgress.start()</script>

  <div class="main">
    <?php include "../public/nav.php" ?>
    <div class="container-fluid">
      <div class="page-title">
        <h1>用户</h1>
      </div>
      <!-- 有错误信息时展示 -->
      <!-- <div class="alert alert-danger">
        <strong>错误！</strong>发生XXX错误
      </div> -->
      <div class="row">
        <div class="col-md-4">

          <form action="user_update.php" method="post">
          <input type="hidden" name="id" value="<?php echo $user_info['user_id']?>">


            <div class="form-group">
              <label for="email">邮箱</label>
              <input id="email" class="form-control" name="email" type="email" placeholder="邮箱" value="<?php echo $user_info['user_email']?>">
            </div>
            <div class="form-group">
              <label for="slug">别名</label>
              <input id="slug" class="form-control" name="slug" type="text" placeholder="slug" value="<?php echo $user_info['user_slug']?>">
              
            </div>
            <div class="form-group">
              <label for="nickname">昵称</label>
              <input id="nickname" class="form-control" name="nickname" type="text" placeholder="昵称" value="<?php echo $user_info['user_nickname']?>">
            </div>
            <div class="form-group">
              <label for="password">密码</label>
              <input id="password" class="form-control" name="password" type="text" placeholder="密码" value="<?php echo $user_info['user_password']?>">
            </div>
            <div class="form-group">
              <label for="state">用户状态：</label>
              <input id="state" name="state" type="radio" value="1" <?php echo $user_info['user_state'] == 1 ? 'checked' : ''?>>激活
              <input id="state" name="state" type="radio" value="0" <?php echo $user_info['user_state'] == 0 ? 'checked' : ''?>>未激活
            </div>
            <div class="form-group">
              <input class="btn btn-primary" type="submit" value="修改">
            </div>
          </form>
        </div>
       
      </div>
    </div>
  </div>

  <div class="aside">
    <?php include '../public/aside.txt' ?>
  </div>

  <script src="/assets/vendors/jquery/jquery.js"></script>
  <script src="/assets/vendors/bootstrap/js/bootstrap.js"></script>
  <script>NProgress.done()</script>
</body>
</html>
