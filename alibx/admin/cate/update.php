<!DOCTYPE html>
<html lang="zh-CN">
<head>
  <meta charset="utf-8">
  <title>Categories &laquo; Admin</title>
  <link rel="stylesheet" href="/assets/vendors/bootstrap/css/bootstrap.css">
  <link rel="stylesheet" href="/assets/vendors/font-awesome/css/font-awesome.css">
  <link rel="stylesheet" href="/assets/vendors/nprogress/nprogress.css">
  <link rel="stylesheet" href="/assets/css/admin.css">
  <script src="/assets/vendors/nprogress/nprogress.js"></script>
</head>
<body>
  <script>NProgress.start()</script>
	<?php 
  include "../public/checksession.php"; 
	$id = $_GET['id'];
	
	include "../public/mysql.php";

	$sql = "select * from ali_cate where cate_id = $id";

	$res = mysql_query($sql);

	$cate_info = mysql_fetch_assoc($res);
	// print_r($cate_info); die;
	
	 ?>

  <div class="main">
    <?php include "../public/nav.php" ?>
    <div class="container-fluid">
      <div class="page-title">
        <h1>分类目录</h1>
      </div>
      <div class="row">
        <div class="col-md-4">

          <form action="modifycate.php" method="post">

            <h2>编辑分类</h2>

            <input type="hidden" name="id" value="<?php echo $cate_info['cate_id']?>">

            <div class="form-group">
              <label for="name">名称</label>
              <input id="name" class="form-control" name="name" type="text" value="<?php echo $cate_info['cate_name']?>">
            </div>
            <div class="form-group">
              <label for="slug">别名</label>
              <input id="slug" class="form-control" name="slug" type="text" value="<?php echo $cate_info['cate_slug']?>">              
            </div>
            <div class="form-group">
               <label for="slug">图标</label>
               <input id="slug" class="form-control" name="icon" type="text" value="<?php echo $cate_info['cate_class']?>">  
            </div>
             <div class="form-group">
               <label for="slug">分类状态</label>
               <input id="slug" value="1" name="status" type="radio"  <?php echo $cate_info['cate_status'] == 1 ? 'checked' : '' ?>> 启用
               <input id="slug" value="2" name="status" type="radio"  <?php echo $cate_info['cate_status'] == 2 ? 'checked' : '' ?>> 禁用  
            </div>
             <div class="form-group">
               <label for="slug">是否显示</label>
               <input id="slug" value="1" name="show" type="radio"  <?php echo $cate_info['cate_show'] == 1 ? 'checked' : '' ?>> 显示
               <input id="slug" value="2" name="show" type="radio"  <?php echo $cate_info['cate_show'] == 2 ? 'checked' : '' ?>> 不显示 
            </div>
            <div class="form-group">
              
               <input id="slug" value="修改"  type="submit" class="btn btn-primary"> 
                
            </div>

          </form>
        </div>
        </div>
      </div>
    </div>
  </div>

  <div class="aside">
    <?php include "../public/aside.txt" ?>
  </div>

  <script src="/assets/vendors/jquery/jquery.js"></script>
  <script src="/assets/vendors/bootstrap/js/bootstrap.js"></script>
  <script>NProgress.done()</script>
</body>
</html>
