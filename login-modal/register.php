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
    <link rel="stylesheet" type="text/css" href="css/common.css">

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
    <script type="text/javascript" src="js/register.js"></script>


    <div class="col-md-4 col-md-offset-4">
    <form>
      <!-- 必填信息 -->
      <div class="form-inline">
        <label for="regname">用户名称</label>
        <input type="text" name="regname" id="regname" class="form-control" placeholder="用户名称">
        <div id="namediv" class="inline-block"></div>
      </div>
       <div class="form-inline">
        <label for="regpwd1">注册密码</label>
        <input type="password" name="regpwd1" id="regpwd1" class="form-control" placeholder="注册密码">
        <div id="pwddiv1" class="inline-block"></div>
      </div>
      <div class="form-inline">
        <label for="regpwd2">确认密码</label>
        <input type="password" name="regpwd2" id="regpwd2" class="form-control" placeholder="确认密码">
        <div id="pwddiv2" class="inline-block"></div>
      </div>
       <div class="form-inline">
        <label for="email">电子邮箱</label>
        <input type="text" name="email" id="email" class="form-control" placeholder="电子邮箱">
        <div id="emaildiv" class="inline-block"></div>
      </div>
      <!-- /必填信息 -->

      <button class="btn btn-primary" type="button" id="regbtn" disabled="disabled">注册</button>
      <button id="morebtn" class="btn btn-primary" type="button" data-toggle="collapse" data-target="#collapsesecret" aria-expanded="false" aria-controls="collapsesecret">隐藏信息</button>
      <button class="btn btn-primary" type="button" id="logbtn">登录</button>
      <!-- 隐藏信息 -->
      <!-- <a href="#collapsesecret" class="btn btn-primary" role="button" data-toggle="collapse" aria-expanded="false" aria-controls="collapsesecret">隐藏信息</a> -->
      <div class="collapse" id="collapsesecret">
        <div class="form-group">
        <label for="question">密保问题</label>
        <input type="text" name="question" id="question" class="form-control" placeholder="密保问题">
      </div>
        <div class="form-group">
        <label for="answer">密保答案</label>
        <input type="text" name="answer" id="answer" class="form-control" placeholder="密保答案">
      </div>
        <div class="form-group">
        <label for="realname">真实姓名</label>
        <input type="text" name="realname" id="realname" class="form-control" placeholder="真实姓名">
      </div>
        <div class="form-group">
        <label for="birthday">出生日期</label>
        <input type="text" name="birthday" id="birthday" class="form-control" placeholder="出生日期">
      </div>
        <div class="form-group">
        <label for="telephone">联系电话</label>
        <input type="text" name="telephone" id="telephone" class="form-control" placeholder="联系电话">
      </div>
        <div class="form-group">
        <label for="qq">QQ号码</label>
        <input type="text" name="qq" id="qq" class="form-control" placeholder="QQ号码">
      </div>
      </div>
      <!-- /隐藏信息 -->
      <!-- 等待进度条 -->
      <div id="imgdiv" style="visibility: hidden;">正在提交</div>

    </form>
</div>

  </body>
</html>