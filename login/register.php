<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width,initial-scale=1.0" />
<link href="../css/bootstrap.css" rel="stylesheet" />
<script src="../js/jquery.min.js"></script>
<script src="../js/bootstrap.js"></script>
<style>
.form{background: rgba(255,255,255,0.5);width:32%;height:30%;margin:30px auto 0;}
.form-horizontal{
	margin-left:10px;
	}
input[type="text"],input[type="password"]{padding-left:30px;}
.form-control-feedback{left:0}
a{padding-top:7px;}
body{background:url(../images/5.jpg) no-repeat;
background-size:1366px 639px;
background-size:cover !important;}
</style>
<title>注册界面</title>
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
        	<div class="form-horizontal col-md-offset-3" id="register_form">
            <h3>注册</h3>
             <form id="form1" name="form1" method="post" action="../index/index_regist.php" onsubmit="return checkfrom(form1)">
                 <div class="col-md-7 col-md-offset-2">
            	<div class="form-group" style="margin-bottom:0">
                <i></i>
                <span class="glyphicon glyphicon-user form-control-feedback"></span>
                    <input class="form-control required" type="text" placeholder="用户名" id="username" name="username" onBlur="checkUserid()"/>
                     <span id="sp">4-16字符,数字,字母,符号</span>
                </div>
                </div>         
                 <div class="col-md-7 col-md-offset-2">
             <div class="form-group" style="margin-bottom:0">
             		<i></i>
                     <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                    <input class="form-control required" type="password" placeholder="密码" id="password" name="password" onBlur="checkUserPwd()"/>
                     <span id="sp1">6-16字符,限数字,字母</span>
                </div>
                </div>
                   <div class="col-md-7 col-md-offset-2">
             <div class="form-group" style="margin-bottom:0">
             		<i></i>
                     <span class="glyphicon glyphicon-check form-control-feedback"></span>
                    <input class="form-control required" type="password" placeholder="确认密码" id="password1" name="password1" onBlur="checkUserRePwd()"/>
                     <span  id="sp5">6-16字符,限数字,字母</span>
                </div>
                </div>
             <div class="col-md-7 col-md-offset-2">
             <div class="form-group" style="margin-bottom:0">
             		<i></i>
                     <span class="glyphicon glyphicon-pencil form-control-feedback"></span>
                    <input class="form-control required" type="text" placeholder="昵称" id="userName" name="userName" onBlur="checkUserName()"/>
                     <span id="sp2">4字符以上,数字,字母</span>
                </div>
                </div>
                <div class="col-md-7 col-md-offset-2">
             <div class="form-group" style="margin-bottom:0">
             		<i></i>
                     <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                    <input class="form-control required" type="text" placeholder="邮箱" id="envelope" name="envelope" onBlur="checkEmail()"/>
                     <span id="sp3">邮箱格式如xxx@163.com</span>
                </div>
                </div>
                <div class="col-md-7 col-md-offset-2">
				 	<select style="margin-left:-15px;padding:7px 32px 7px 0;border-radius:5px" id="mibao" name="mibao">
				 	<option>你的初中学校名称是什么？</option>
					<option>你喜欢哪个体育运动？</option>
					<option>你的梦想是什么？</option>
				 	</select>
                     <span id="sp4" style="margin-left:-15px;">选择其一作为安保问题</span>
                </div>
                <div class="col-md-7 col-md-offset-2">
             <div class="form-group" style="margin-bottom:0">
             		<i></i>
                     <span class="glyphicon glyphicon-eye-open form-control-feedback"></span>
                    <input class="form-control required" type="text" placeholder="密保" id="anwser" name="anwser" onBlur="checkAnwser()"/>
                     <span id="sp7">2字符以上,不限数字,中文</span>
                </div>
                </div>
                <div class="col-md-9">
                 <div class="form-group col-md-offset-9" style="padding:5% 3%">
                 <a href="login.php" class="glyphicon glyphicon-arrow-left pull-left" style="padding:6px 40px 6px 70px;">返回</a>
                 <input type="reset" class="btn btn-primary pull-left" name="reset">
                 <input type="submit" class="btn btn-success pull-right" name="submit" id="sub">
                   </div>
                 </div>
                 </form>
                 </div>
                 </div>
              </div>
<script type="text/javascript" src="yanzheng.js"></script>
<script>
function checkfrom(form){
	if(form.username.value==""){
		alert("账号不能为空");
		form.username.focus();
		return false;
		}
		if(form.password.value==""){
			alert("密码不能为空");
			form.password.focus();
		    return false;
			}
		if(form.password1.value==""){
			alert("密码不能为空");
			form.password1.focus();
		    return false;
			}
		if(form.userName.value==""){
			alert("昵称不能为空");
			form.userName.focus();
		    return false;
			}
		if(form.envelope.value==""){
			alert("邮箱不能为空");
			form.envelope.focus();
		    return false;
			}
		if(form.anwser.value==""){
			alert("密保不能为空");
			form.anwser.focus();
		    return false;
			}
	}
</script>
</body>
</html>