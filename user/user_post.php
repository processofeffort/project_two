<!doctype html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width,initial-scale=1.0" />
<link href="../css/bootstrap.css" rel="stylesheet" />
<link href="../css/materialdesignicons.min.css" rel="stylesheet">
<link href="../css/style.min.css" rel="stylesheet">
<title>用户评论</title>
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
            <li class="nav-item active">
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
			 <li class="nav-item">
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
              <a href="javascript:void(0)" data-toggle="dropdown">><span class="caret"></span>
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
				  <?php 
				    include("../conn/conn.php");
				    echo "<div id='hiti'>您还未发过任何的帖子，先去发帖子吧！</div>";
				  	$pagesize=10;		  
					$sqlstr="select * from comment where author='".$myrow1['username']."'";
					$total=mysqli_query($conn,$sqlstr);
				  	$totalNum=mysqli_num_rows($total);
				    $pagecount=ceil($totalNum/$pagesize);
				    $page=isset($_GET['page'])?$_GET['page']:1;
		  			$page<=$pagecount?$page:$page=$pagecount;
      				$f_pageNum=$pagesize*($page-1);
				    $sqlstr2=$sqlstr." limit ".$f_pageNum.",".$pagesize;
				    $result=mysqli_query($conn,$sqlstr2);
					while($myrow=mysqli_fetch_array($result)){
						if($myrow!=0){						
				  ?>
				   <div class="form-group" style="border:1px solid #ccc;border-radius:5px;padding:5px;">
                    <label>标题:</label>
					<a href="../comment/information.php?title=<?php echo $myrow['title'];?>&&mid=<?php echo $myrow['mid'];?>&&belong=<?php echo $myrow['classes'];?>"><?php echo $myrow['title'];?></a>
					<span style="float:right;padding:0 0 0 5px;"><?php echo $myrow['review'];?></span>
					<span class="mdi mdi-message-outline" style="float:right;"></span>
					<br/>
					<label>时间:</label>
					<?php echo $myrow['datime'];?>
					<a href="javasrcipt:;" onClick="showsimple(<?php echo $myrow['mid'];?>)" style="float: right">删除</a>
                  </div>
				   <?php
						}
					}
				 ?>
              </div>
				 <?php
 						if($page){
						echo "<ul class='pagination pagination-lg pull-left'>";
						echo "<li><a>第".$page."页/共".$pagecount."页</a></li>";
						echo "<li><a>共".$totalNum."条数据</a></li>";
						echo "</ul>";
						echo "<ul class='pagination pagination-lg pull-right'>";
	 					echo "<li><a href='?page=1'>首页</a>&nbsp;</li>";
						if($page==1){
						echo "<li><a href='?page=1'>&laquo;</a>&nbsp;&nbsp;</li>";	
						}else{
						echo "<li><a href='?page=".($page-1)."'>&laquo;</a>&nbsp;&nbsp;</li>";	
						}
						for($i=1;$i<=$pagecount;$i++){
							echo "<li><a href='?page=".$i."'>$i</a></li>";
						}
						if($page==$pagecount){
						echo "<li><a href='?page=".($pagecount)."'>&raquo;</a>&nbsp;</li>";
						}
						else{
						echo "<li><a href='?page=".($page+1)."'>&raquo;</a>&nbsp;</li>";	
						}
						echo "<li><a href='?page=".$pagecount."'>尾页</a>&nbsp;&nbsp;</li>";
					    echo "</ul>";
					 }
?>
            </div>
			</div>
        </div>   
		</div>     
    </main>
    </div>
    </div>
<script src="../js/index.js"></script>
<script src="../js/jquery.min.js"></script>
<script src="../js/bootstrap.js"></script>
<script src="../js/perfect-scrollbar.min.js"></script>
<script src="../js/main.min.js"></script>
<script>
if(document.getElementById("hiti")){
	 document.getElementById("hiti").style.display="none";
}
</script>
</body>
</html>
