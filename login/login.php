<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width,initial-scale=1.0" />
<link href="../css/bootstrap.css" rel="stylesheet" />
<script src="../js/jquery.min.js"></script>
<script src="../js/bootstrap.js"></script>
<style>
.form{background: rgba(255,255,255,0.5);width:35%;height: 20%; margin:120px auto;}
input[type="text"],input[type="password"]{padding-left:30px;}
.form-control-feedback{left:0}
.checkbox-user{padding-left:20%;}
body{background:url(../images/2.jpg) no-repeat;
background-size:1366px 639px;
background-size:cover !important;}
</style>
<title>登录界面</title>
</head>
<body>
<nav class="navbar navbar-inverse" role="navigation">
	<div class="container-fluid">
    <div class="navbar-header">
    	<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#example-navbar-collapse">
        <span class="sr-only">切换导航</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        </button>
       <a class="navbar-brand" href="#">体育论坛</a>
    </div>
 	<div class="collapse navbar-collapse" id="example-navbar-collapse">
    	<ul class="nav navbar-nav">
        	<li><a href="../home/homepage.php">首页</a></li>
        	<li><a href="../comment/basketball/basketball.php">篮球</a></li>
            <li><a href="../comment/football/football.php">足球</a></li>
            <li><a href="../comment/table-tennis/table-tennis.php">乒乓球</a></li>
            <li><a href="../comment/badminton/badminton.php">羽毛球</a></li>
            <li><a href="../comment/volleyball/volleyball.php">排球</a></li>
            <li><a href="../comment/snooker/snooker.php">台球</a></li>
            <li><a href="../comment/baseball/baseball.php">棒球</a></li>
			<li><a href="../home/search.php">搜索</a></li>
            </ul>
            <ul class="nav navbar-nav">
            <li class="dropdown">
            	<a href="#" class="dropdown-toggle" data-toggle="dropdown">关于我们<b class="caret"></b>
                </a>
                <ul class="dropdown-menu">
                	<li><a href="#">制作:xiong</a></li>
                    <li><a href="#">编辑:xiong</a></li>
                    <li><a href="#">创作:xiong</a></li>
                </ul>
            </li>
            </ul>
            </div>
            </div>
            </nav>
     <div class="container">
     <div class="form row">
        	<div class="form-horizontal col-md-offset-3" id="login_form">
            <h3>登录</h3>
            <form id="form" name="form" method="post" action="../index/index_ok.php" onsubmit="return checkfrom(form)">
            <div class="col-md-9">
            	<div class="form-group" style="margin-bottom:15px">
                <i></i>
                <span class="glyphicon glyphicon-user form-control-feedback"></span>
                    <input class="form-control required" type="text" placeholder="用户名" id="username" name="username" autofocus="autofocus" maxlength="20"/>
					<input type="text" id="lhref" name="lhref" style="display:none" value="<?php $href=$_GET['login'];if(strpos($href,"%")!==false){echo str_replace("%","&&",$href);}else echo $href?>">
                </div>
                </div>
                 <div class="col-md-9">
             <div class="form-group" style="margin-bottom:15px">
             		<i></i>
                     <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                    <input class="form-control required" type="password" placeholder="密码" id="password" name="password" autofocus="autofocus" maxlength="15" />
                </div>
                </div>
                <div class="col-md-9">
                <div class="form-group" style="margin-bottom:15px">
                 <label class="checkbox-user">
                        <input type="radio" name="browser" value="1" checked="checked"/>用户</label>
                         <label class="checkbox-user">
                         <input type="radio" name="browser" value="2" />管理员</label>
                 </div>
                 <div class="form-group col-md-offset-9 " style="padding:0 20%;margin-bottom:15px">
                 	<button type="submit" class="btn btn-success pull-left" name="submit">登录</button>
					<button type="reset" class="btn btn-primary pull-right" name="reset">取消</button>
                   </div>
				<div class="form-group col-md-offset-9" style="margin-bottom:15px">
				<p class="text-left form-control-static" style="float: left;">没有账号？<a href="register.php" class=" text-primary">立即注册</a></p>
				<p class="text-right form-control-static"><a href="search_login.php" class=" text-primary">忘记密码</a></p>
				</div>
                </div>
                </form>
                </div>
                </div>
              </div>
<script>
function checkfrom(form){
	if(form.username.value==""){
		alert("账号不能为空");
		form.username.focus();
		return false;
		}
		if(form.password.value==""){
			alert("密码不能为空");
			form.username.focus();
		    return false;
			}
	}
</script>
</body>
</html>