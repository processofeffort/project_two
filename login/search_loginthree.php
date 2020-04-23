<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width,initial-scale=1.0" />
<link href="../css/bootstrap.css" rel="stylesheet" />
<style>
.form{background: rgba(255,255,255,0.5);width:35%;height: 20%; margin:120px auto;}
input[type="text"],input[type="password"]{padding-left:30px;}
.form-control-feedback{left:0}
.checkbox-user{padding-left:20%;}
body{background:url(../images/1.jpg) no-repeat;
background-size:1366px 639px;
background-size:cover !important;}
</style>
<title>找回密码界面</title>
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
            <h3>找回密码</h3>
			<h4 id="hs">第三步骤：修改密码</h4>
			<?php
				include("../conn/conn.php");
			    $key = $_GET['account'];
			?>
			 <div class="col-md-9" name="grop">
             <div class="form-group" style="margin-bottom:15px">
             		<i></i>
                    <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                    <input class="form-control required" type="text" placeholder="密码" id="password" name="password" onBlur="checkUserPwd()"/>
				 	<input class="form-control required" type="text" placeholder="用户" id="anwsername" name="anwsername" value="<?php echo $key?>" style="display:none"/>
                     <span id="sp1">*6-16字符,限数字,字母</span>
                </div>
				</div>
			<div class="col-md-9" name="grop">
             <div class="form-group" style="margin-bottom:15px">
             		<i></i>
                    <span class="glyphicon glyphicon-check form-control-feedback"></span>
                    <input class="form-control required" type="password" placeholder="确认密码" id="password1" name="password1" onBlur="checkUserRePwd()"/>
                     <span id="sp5">*6-16字符,限数字,字母</span>
                </div>
				</div>
                <div class="col-md-9" name="grop">
                 <div class="form-group col-md-offset-9 " style="padding:0 30%;margin-bottom:15px">
                 	<button type="button" class="btn btn-success pull-left" id="btn" disabled>下一步</button>
                   </div>
                </div>
                </div>
                </div>
              </div>
<script src="../js/jquery.min.js"></script>
<script src="../js/bootstrap.js"></script>
<script type="text/javascript" src="yanzheng.js"></script>
<script>
document.getElementById("btn").addEventListener("click",function(){
	var key = $("#password").val();
	var key1 = $("#anwsername").val();
	$.ajax({
		url:"xpassword.php",
		data:{key:key,key1:key1},
		type:"POST",
		dataType:"JSON",
		success:function(){
			alert("密码修改成功");
			window.location.href="login.php";
		},
		error:function(){
			alert("请求失败");
			}
		})
},false);
</script>
<script>
setInterval(function(){	
if(document.getElementById("password").value&&document.getElementById("sp1").style.color=="green"&&document.getElementById("password1").value&&document.getElementById("sp5").style.color=="green"){
	$("#btn").prop("disabled",false);
}else{
	$("#btn").prop("disabled",true);
}
},10)
</script>
</body>
</html>