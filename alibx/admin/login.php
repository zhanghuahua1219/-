<!DOCTYPE html>
<html lang="zh-CN">
<head>
  <meta charset="utf-8">
  <title>Sign in &laquo; Admin</title>
  <link rel="stylesheet" href="../assets/vendors/bootstrap/css/bootstrap.css">
  <link rel="stylesheet" href="../assets/css/admin.css">
  <script src="../assets/vendors/jquery/jquery.js"></script>
</head>
<body>
  <div class="login">
    <form class="login-wrap" action="check.php" method="post">
      <img class="avatar" src="../assets/img/default.png">
      <!-- 有错误信息时展示 -->
      <!-- <div class="alert alert-danger">
        <strong>错误！</strong> 用户名或密码错误！
      </div> -->
      <div class="form-group">
        <label for="email" class="sr-only">邮箱</label>
        <input id="email" name="email" type="email" class="form-control" placeholder="邮箱" autofocus>
      </div>
      <div class="form-group">
        <label for="password" class="sr-only">密码</label>
        <input id="password" name="pwd" type="password" class="form-control" placeholder="密码">
      </div>
      <div class="form-group">
        <label for="password" class="sr-only">验证码</label>
        <input type="text" name="code" class="form-control check" placeholder="验证码" >
        <!-- <img src="../common/verify.php" onclick="changeImg(obj)"> -->
        <img src="public/verify.php"  id="code"><span id="yzm" style="color:red"></span>

      </div>
      <input class="btn btn-primary btn-block" type="submit" value="登 录">
    </form>
  </div>
</body>
<script type="text/javascript">
  /*function changeImg (obj) {
    obj.src = 'public/verify.php?_='+ Math.random();
  }*/

  $("#code").click(function () {
    // alert("wo");
    $(this)[0].src = 'public/verify.php?_='+ Math.random();
    // console.log($(this));
  });
  /*var img = document.getElementById("code");
  
  img.onclick = function () {
    
    this.src = 'public/verify.php?_='+ Math.random();
  }*/

  /*$(".btn-primary").click(function () {
    $("form").submit();
  });*/
  $(".check").keyup(function () {
    
    var code = $(this).val();
   
    // if (code.length == 4) {
    	 // alert(code.length );
    	 $.ajax({
	      url:'yzm.php',
	      data:{code:code},
	      type:'post',
	      dataType:'text',
	      success:function (data) {
	        // alert(data);
	        if (data == 1) {
	          $("#yzm").html("验证码一致");
	        } else {
	          $("#yzm").html("验证码错误");
		    }
	      }
	    });
    // }
   

  });
  
</script>
</html>
