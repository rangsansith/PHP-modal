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
    <script type="text/javascript" src="js/found.js"></script>
    
    <div class="col-md-4 col-md-offset-4">
      <!-- 找回密码 -->
      <div class="form-inline">
        <label for="foundname">找回账号</label>
        <input type="text" name="foundname" id="foundname" class="form-control" placeholder="找回密码">
      </div>
       <div class="form-inline">
        <label for="fdquestion">密保问题</label>
        <input type="text" name="fdquestion" id="fdquestion" class="form-control" placeholder="密保问题">
      </div>
      <div class="form-inline">
        <label for="fdanswer">密保答案</label>
        <input type="text" name="fdanswer" id="fdanswer" class="form-control" placeholder="密保答案">
      </div>
      <div class="col-md-offset-3"><button type="button" class="btn btn-default" id="step1">完成</button></div>
      <!-- /找回密码 -->
    </div>

  </body>
</html>