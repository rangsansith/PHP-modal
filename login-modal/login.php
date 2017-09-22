<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Bootstrap 101 Template</title>

    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!-- [if lt IE 9]> -->
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <!-- <![endif] -->
  </head>
  <body>

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
    <script type="text/javascript" src="js/login.js"></script>
    <div class="col-md-4 col-md-offset-4">
    <!-- 登录页面 -->
    <form>
       <div class="form-inline">
        <label for="lgname">登录名称</label>
        <input type="text" name="lgname" id="lgname" class="form-control" placeholder="登录名称">
      </div>
       <div class="form-inline">
        <label for="lgpwd">登录密码</label>
        <input type="password" name="lgpwd" id="lgpwd" class="form-control" placeholder="登录密码">
      </div>
       <div class="form-inline">
        <label for="lgchk">验&nbsp;&nbsp;证&nbsp;&nbsp;码</label>
        <input type="text" name="lgchk" id="lgchk" class="form-control" placeholder="验证码">
        <img src="" width="55" height="18" id="chkid">
        <a href="" id="changea">看不清</a>
        <input type="hidden" name="chknm" id="chknm" value="">
      </div>
      <button class="btn btn-primary" type="button" id="lgbtn">登录</button>
      <button class="btn btn-primary" type="button" id="reg">用户注册</button>
      <button class="btn btn-primary" type="button" id="found">找回密码</button>
    </form>
    <!-- /登录页面 -->
    </div>
  </body>
</html>