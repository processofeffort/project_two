<!doctype html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width,initial-scale=1.0" />
<link href="../css/bootstrap.css" rel="stylesheet" />
<link href="../css/materialdesignicons.min.css" rel="stylesheet">
<link href="../css/style.min.css" rel="stylesheet">
<title>用户手册</title>
<style>
.radius{
	width: 20px;
	height: 20px;
	display: flex;
	border-radius: 50%;
	background-color: #F90004;
	color: #FBF9F9;
	float: right;
	justify-content: center;
	align-items: center;
	}
</style>
</head>
<body>
<div class="lyear-layout-web">
  <div class="lyear-layout-container">
    <!--左侧导航-->
    <aside class="lyear-layout-sidebar">    
      <!-- logo -->	
      <div id="logo" class="sidebar-header">
        <a href="../home/homepage.php"><img src="../images/logo-title.png" title="LightYear" alt="LightYear" /></a>
      </div>
      <div class="lyear-layout-sidebar-scroll">     
        <nav class="sidebar-main" style="margin-left: 30px;">
          <ul class="nav nav-drawer">
            <li class="nav-item"> <a href="user_center.php"><i class="mdi mdi-account"></i> 个人信息</a> </li>
            <li class="nav-item">
              <a href="user_post.php"><i class="mdi mdi-palette"></i>我的帖子</a>
            </li>
            <li class="nav-item">
              <a href="user_report.php"><i class="mdi mdi-format-align-justify"></i>我的评论</a>
            </li>
			<li class="nav-item">
              <a href="user_inform.php"><i class="mdi mdi-alert-circle"></i>我的举报</a>
            </li>
            <li class="nav-item">
              <a href="user_collect.php"><i class="mdi mdi-star"></i>我的收藏</a>
            </li>
            <li class="nav-item">
              <a href="user_message.php"><i class="mdi mdi-message-text-outline"></i>我的消息<?php 
				  session_start();
				    include("../conn/conn.php");
				    $sql="select username from user where name='".$_SESSION['name']."'";
				    $result1=mysqli_query($conn,$sql);
				  	$myrow1=mysqli_fetch_array($result1);
					$sqlstr="select count(*) from scontent where s_own!=1 and s_own!=0 and s_reuser='".$myrow1[0]."' and s_cif=1";
				  	$result=mysqli_query($conn,$sqlstr);
					while($myrow=mysqli_fetch_array($result)){
						if($myrow[0]==0){
						  
						}else{
							echo "<span class='radius'>$myrow[0]</span>";
						}
						}?></a>
            </li>
			 <li class="nav-item active">
              <a href="user_notebook.php"><i class="mdi mdi-alert"></i>用户手册</a>
            </li>
          </ul>
        </nav>
      </div>  
    </aside>
    <!--End 左侧导航-->
    
    <!--头部信息-->
    <header class="lyear-layout-header">
      
      <nav class="navbar navbar-default">
        <div class="topbar">
          
          <div class="topbar-left">
            <div class="lyear-aside-toggler">
              <span class="lyear-toggler-bar"></span>
              <span class="lyear-toggler-bar"></span>
              <span class="lyear-toggler-bar"></span>
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
            </ul>
            </div>
          </div>
          <ul class="topbar-right">
            <li class="dropdown dropdown-profile">
              <a href="javascript:void(0)" data-toggle="dropdown"><span class="caret"></span>
    <?php
	if(isset($_SESSION['name'])){
		    include("../conn/conn.php");
			$sqlstr="select *from user where name='".$_SESSION['name']."'";
			$result=mysqli_query($conn,$sqlstr);
			while($myrow=mysqli_fetch_array($result)){
			if($myrow['pic']){
				echo "<div>";
				echo "<img src='../user/".$myrow['pic']."' width='30px' height='30px' style='position:absolute;top:5px;right:70px;border-radius:20px;'/>";
				echo "<a href='../user/user_center.php' style='position:absolute;top:9px;right:25px;font-weight:bolder'>".$myrow['username']."</a>";
				echo "</div>";
			}
			else{
			echo "<div>";
			echo "<img src='../images/icon.jpg' width='30px' height='30px' style='position:absolute;top:10px;right:70px;border-radius:25px;' class='img-responsive' onmousemove=this.title='用户图片未设置'>";	
	   		echo "<a href='../user/user_center.php' style='position:absolute;top:13px;right:35px;font-weight:bolder'>".$myrow['username']."</a>";
			echo "</div>";
				}
			  }
		}
		else{
			echo "<script>alert('您未登陆！');</script>";
			echo "<script>document.location.href='../login/login.php'</script>";
			}
	?>
               
              </a>
              <ul class="dropdown-menu dropdown-menu-right">
<!--
				<li> <a href="#"><i class="mdi mdi-message-outline"></i> 我的消息</a> </li>
                <li class="divider"></li>
-->
                <li> <a href="../login/logout.php?login=../home/homepage.php"><i class="mdi mdi-logout-variant"></i> 退出登录</a> </li>
              </ul>
            </li>
          </ul>         
        </div>
      </nav>
    </header>

<main class="lyear-layout-content"> 
      <div class="container-fluid">    
        <div class="row">
          <div class="col-lg-12">
            <div class="card">
              <div class="card-body">
				<h4 style="text-align: center">用户须知</h4>
				<p>作为本站的用户，希望你遵循以下准则。</p>
				<p>1.不要发布任何谩骂、不堪、颜色言论。</p>
				<p>2.维护好自己的用户信息，不要透露给不熟悉的人。</p>
				<p>3.维护本站，举报任何不合法、不良好信息，做一个积极，良好的用户。</p>
				<h4 style="text-align: center">用户成就</h4>
				<p>达成以下要求，颁发网站成就。</p>
				<p>1.成功举报不良言论三次以上。</p>
				<p>2.个人言论完全正常，无不合法行为。</p>
				<p>3.做一个维护网站的积极用户。</p>
              </div>
            </div>
			</div>
        </div>   
		</div>     
    </main>
    </div>
    </div>
<script src="../js/index2.js"></script>
<script src="../js/jquery.min.js"></script>
<script src="../js/bootstrap.js"></script>
<script src="../js/perfect-scrollbar.min.js"></script>
<script src="../js/main.min.js"></script>
</body>
</html>
