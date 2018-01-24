<!DOCTYPE html>
<html lang="zh-CN">
<head>
  <meta charset="utf-8">
  <title>Add new post &laquo; Admin</title>
  <link rel="stylesheet" href="/assets/vendors/bootstrap/css/bootstrap.css">
  <link rel="stylesheet" href="/assets/vendors/font-awesome/css/font-awesome.css">
  <link rel="stylesheet" href="/assets/vendors/nprogress/nprogress.css">
  <link rel="stylesheet" href="/assets/css/admin.css">
  <link href="/assets/themes/default/css/umeditor.css" type="text/css" rel="stylesheet">
    <script type="text/javascript" src="/assets/third-party/jquery.min.js"></script>
    <script type="text/javascript" charset="utf-8" src="/assets/umeditor.config.js"></script>
    <script type="text/javascript" charset="utf-8" src="/assets/umeditor.min.js"></script>
    <script type="text/javascript" src="/assets/lang/zh-cn/zh-cn.js"></script>
  <script src="/assets/vendors/nprogress/nprogress.js"></script>
</head>
<body>
  <script>NProgress.start()</script>
  <?php 
      include '../public/checksession.php';
      include '../public/mysql.php';
      
      $id = $_GET['id'];
      $sql = "select * from ali_post where post_id = $id ";
      $res = mysql_query($sql);
      $post_info_arr = mysql_fetch_assoc($res);




      $sql="select * from ali_cate";
      $res = mysql_query($sql);
  ?>
  <div class="main">
    <?php include '../public/nav.php' ?>
    <div class="container-fluid">
      <div class="page-title">
        <h1>写文章</h1>
      </div>
      <!-- 有错误信息时展示 -->
      <!-- <div class="alert alert-danger">
        <strong>错误！</strong>发生XXX错误
      </div> -->
      <form class="row" action="modifypost.php" method="post" enctype="multipart/form-data">
      <input type="hidden" name="id" value="<?php echo $id ; ?>">
        <div class="col-md-9">
          <div class="form-group">
            <label for="title">标题</label>
            <input id="title" class="form-control input-lg" name="title" type="text" value="<?php echo $post_info_arr['post_title'];?>">
          </div>
          <div class="form-group">
            <label for="content">内容</label>
            <textarea name="content" id="content"><?php echo $post_info_arr['post_content']?></textarea>
          </div>
        </div>
        <div class="col-md-3">
          <div class="form-group">
            <label for="slug">别名</label>
            <input id="slug" class="form-control" name="slug" type="text" value="<?php echo $post_info_arr['post_slug']?>">
          </div>
          <div class="form-group">
            <label for="feature">特色图像</label>
            <!-- show when image chose -->
            <img class="help-block thumbnail" style="display: none">
            <input id="feature" class="form-control" name="feature" type="file">
          </div>
          <div class="form-group">
            <label for="category">所属分类</label>
            <select id="category" class="form-control" name="category">
              <option value="0">--请选择--</option>
              <?php while($row=mysql_fetch_assoc($res)){ ?>    
              <option value="<?=$row['cate_id'] ?>"($row['cate_id'] == $post_info_arr['post_cateid']) ? selected : ''><?=$row['cate_name'] ?></option>
             <?php } ?>
            </select>
          </div>
          <div class="form-group">
            <label for="created">发布时间</label>
            <input id="created" class="form-control" name="created" type="datetime-local">
          </div>
          <div class="form-group">
            <label for="status">状态</label>
            <select id="status" class="form-control" name="status">
              <option value="2" ($post_info_arr['post_state'] == '2') ? selected : ''>草稿</option>
              <option value="1" ($post_info_arr['post_state'] == '1 ') ? selected : ''>已发布</option>
            </select>
          </div>
          <div class="form-group">
            <input type="submit" class="btn btn-primary" value="保存">
          </div>
        </div>
      </form>
    </div>
  </div>

  <div class="aside">
    <?php include '../public/aside.txt' ?>
  </div>

  <script src="/assets/vendors/bootstrap/js/bootstrap.js"></script>
  <script>NProgress.done()</script>
</body>
</html>
<script type="text/javascript">
    //实例化编辑器
    var um = UM.getEditor('content',{
        initialFrameWidth:850,
        initialFrameHeight:300,
        initialContent:'文章内容'
    });
</script>