<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width,initial-scale=1.0" />
<link href="../../css/bootstrap.css" rel="stylesheet" />
<link href="../../css/materialdesignicons.min.css" rel="stylesheet">
<link href="../../css/style.min.css" rel="stylesheet">
<link href="../../css/common.css" rel="stylesheet" />
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
<title>管理员中心</title>
</head>
<body>
<div class="lyear-layout-web">
  <div class="lyear-layout-container">
    <!--左侧导航-->
    <aside class="lyear-layout-sidebar">    
      <!-- logo -->
      <div id="logo" class="sidebar-header">
        <a href="../../home/homepage.php"><img src="../../images/admin_center.png"/></a>
      </div>
      <div class="lyear-layout-sidebar-scroll">     
        <nav class="sidebar-main" style="margin-left: 30px;">
          <ul class="nav nav-drawer">
            <li class="nav-item active"> <a href="admin_center.php"><i class="mdi mdi-account-box"></i>后台信息中心</a> </li>
            <li class="nav-item">
              <a href="../admin_usercenter/admin_usercenter.php"><i class="mdi mdi-palette"></i>用户管理</a>
            </li>
			<li class="nav-item">
              <a href="../admin_reportcenter/admin_reportcenter.php"><i class="mdi mdi-alert-circle"></i>举报管理</a>
            </li>
            <li class="nav-item">
             <a href="../admin_portcenter/admin_portcenter.php"><i class="mdi mdi-format-align-justify"></i>帖子管理</a>
            </li>
            <li class="nav-item">
              <a href="../admin_reviewcenter/admin_reviewcenter.php"><i class="mdi mdi-file-outline"></i>评论管理</a>
            </li>
            <li class="nav-item">
              <a href="../admin_messagecenter/admin_messagecenter.php"><i class="mdi mdi-message-text-outline"></i>留言管理<?php 
				  session_start();
				    include("../../conn/conn.php");
					$sqlstr="select count(*) from ucollectd where collect_ashow=1";
				  	$result=mysqli_query($conn,$sqlstr);
					while($myrow=mysqli_fetch_array($result)){
						if($myrow[0]==0){
						  
						}else{
							echo "<span class='radius'>$myrow[0]</span>";
						}
						}?></a>
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
			   <span class="navbar-page-title">后台中心</span>
          </div>
          <ul class="topbar-right">
            <li class="dropdown dropdown-profile">
              <a href="javascript:void(0)" data-toggle="dropdown"> <span class="caret"></span>
   			 <?php
			if(isset($_SESSION['name'])){
				include("../../conn/conn.php");
				$sqlstr="select *from admin where adminaccount='".$_SESSION['name']."'";
				$result=mysqli_query($conn,$sqlstr);
				while($myrow=mysqli_fetch_array($result)){
					if($myrow['pic']){
					echo "<div>";
					echo "<img src='".$myrow['pic']."' width='30px' height='30px' style='position:absolute;top:-3px;right:70px;border-radius:20px;'/>";
						echo "<a href='admin_center.php' style='position:absolute;top:1px;right:25px;font-weight:bolder;width:30px'>".$myrow['adminname']."</a>";
						echo "</div>";
				}
				else{
				echo "<div>";
				echo "<img src='../../images/icon.jpg' width='30px' height='30px' style='position:absolute;top:-1px;right:70px;border-radius:25px;' class='img-responsive' onmousemove=this.title='图片未设置'>";	
	   			echo "<a href='admin_center.php' style='position:absolute;top:3px;right:25px;font-weight:bolder;width:30px'>".$myrow['adminname']."</a>";
				echo "</div>";
				}
			  }
			}
		else{
			echo "<script>alert('您无权限访问！');</script>";
			echo "<script>document.location.href='../login/login.php'</script>";
			}
	?>
               
              </a>
              <ul class="dropdown-menu dropdown-menu-right">
<!--
				<li> <a href="#"><i class="mdi mdi-message-outline"></i> 我的信息</a> </li>
                <li class="divider"></li>
-->
               <li> <a href="../../login/logout.php?login=../home/homepage.php"><i class="mdi mdi-logout-variant"></i> 退出登录</a> </li>
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
                <div class="edit-avatar">
                 <?php
				if(isset($_SESSION['name'])){
		    include("../../conn/conn.php");
			$sqlstr="select *from admin where adminaccount='".$_SESSION['name']."'";
			$result=mysqli_query($conn,$sqlstr);
			while($myrow=mysqli_fetch_array($result)){
				if($myrow['pic']){
				 echo "<img src='".$myrow['pic']."' width='100px' height='100px'/>";
				}else{
					echo "<img src='../../images/icon.jpg' width='100px' height='100px' onmousemove=this.title='请设置头像'>";
				}
				 ?>
				   <div class="form-group" style="padding:10px 30px;">
                    <label for="username">管理员:</label>
                    <input type="text" class="form-control" name="username" id="username" value="<?php echo $myrow['adminname'];?>" disabled="disabled" />
              	  </div>
				<div style="padding:35px 30px 0px 30px;">
				<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal3">公告管理</button>
				</div>
				 <?php
				  }
				}
				?>
                </div>
			</div>
        </div> 
		</div>
	</div>
	    <div class="row">
          <div class="col-sm-6 col-lg-3">
            <div class="card bg-primary">
              <div class="card-body clearfix">
			    <div class="pull-left"> <span class="img-avatar img-avatar-48 bg-translucent"><i class="mdi mdi-search-web fa-1-5x"></i></span> </div>
                <div class="pull-left" style="padding-left:20px;">
                  <p class="h6 text-white m-t-0">今日浏览量</p>
                  <p class="h3 text-white m-b-0">#</p>
                </div>
              </div>
            </div>
          </div>
		<div class="col-sm-6 col-lg-3">
            <div class="card bg-primary">
              <div class="card-body clearfix">
                <div class="pull-left"> <span class="img-avatar img-avatar-48 bg-translucent"><i class="mdi mdi-search-web fa-1-5x"></i></span> </div>
                <div class="pull-left" style="padding-left:20px;">
                  <p class="h6 text-white m-t-0">总浏览量</p>
                  <p class="h3 text-white m-b-0">#</p>
                </div>
              </div>
            </div>
          </div>
		 <div class="col-sm-6 col-lg-3">
            <div class="card bg-danger">
              <div class="card-body clearfix">
			   <div class="pull-left"> <span class="img-avatar img-avatar-48 bg-translucent"><i class="mdi mdi-account fa-1-5x"></i></span> </div>  
                <div class="pull-left" style="padding-left:20px;">
                  <p class="h6 text-white m-t-0">今日用户注册人数</p>
                  <p class="h3 text-white m-b-0"><?php include("../../conn/conn.php");$today=strtotime(date("Y-m-d"),time());$usertime=date("Y-m-d H:i:s",$today);$end=$today+60*60*24;$usertime2=date("Y-m-d H:i:s",$end);
						 $sqlstr6="select count(*) from user where u_datatime between '$usertime' and '$usertime2'";
						 $result6=mysqli_query($conn,$sqlstr6); while($myrow6=mysqli_fetch_array($result6))echo $myrow6[0];?></p>
                </div>
              </div>
            </div>
          </div>
		<div class="col-sm-6 col-lg-3">
            <div class="card bg-success">
              <div class="card-body clearfix">
			   <div class="pull-left"> <span class="img-avatar img-avatar-48 bg-translucent"><i class="mdi mdi-account-plus fa-1-5x"></i></span> </div>
                <div class="pull-left" style="padding-left:20px;">
                  <p class="h6 text-white m-t-0">用户总数</p>
                  <p class="h3 text-white m-b-0"><?php include("../../conn/conn.php");
			$sqlstr="select count(*) from user";
			$result=mysqli_query($conn,$sqlstr);
			while($myrow=mysqli_fetch_array($result))echo $myrow[0]; ?></p>
                </div>
              </div>
            </div>
          </div>
		<div class="col-sm-6 col-lg-3">
            <div class="card bg-info">
              <div class="card-body clearfix">
		       <div class="pull-left"> <span class="img-avatar img-avatar-48 bg-translucent"><i class="mdi mdi-comment-processing-outline fa-1-5x"></i></span> </div>
                 <div class="pull-left" style="padding-left:20px;">
                  <p class="h6 text-white m-t-0">今日帖子数</p>
                  <p class="h3 text-white m-b-0"><?php include("../../conn/conn.php");$today=strtotime(date("Y-m-d"),time());$usertime=date("Y-m-d H:i:s",$today);$end=$today+60*60*24;$usertime2=date("Y-m-d H:i:s",$end);
						 $sqlstr6="select count(*) from comment where presentime between '$usertime' and '$usertime2'";
						 $result6=mysqli_query($conn,$sqlstr6); while($myrow6=mysqli_fetch_array($result6))echo $myrow6[0];?></p>
                </div>
              </div>
            </div>
          </div>
		<div class="col-sm-6 col-lg-3">
            <div class="card bg-info">
              <div class="card-body clearfix">
			   <div class="pull-left"> <span class="img-avatar img-avatar-48 bg-translucent"><i class="mdi mdi-comment-processing-outline fa-1-5x"></i></span> </div>
                <div class="pull-left"  style="padding-left:20px;">
                  <p class="h6 text-white m-t-0">帖子数</p>
                  <p class="h3 text-white m-b-0"><?php include("../../conn/conn.php");
			$sqlstr="select count(*) from comment";
			$result=mysqli_query($conn,$sqlstr);
			while($myrow=mysqli_fetch_array($result))echo $myrow[0]; ?></p>
                </div>
              </div>
            </div>
          </div>
		<div class="col-sm-6 col-lg-3">
            <div class="card bg-cyan">
              <div class="card-body clearfix">
                <div class="pull-left"> <span class="img-avatar img-avatar-48 bg-translucent"><i class="mdi mdi-comment-text-outline fa-1-5x"></i></span> </div>
                 <div class="pull-left"  style="padding-left:20px;">
                  <p class="h6 text-white m-t-0">今日回复数</p>
                  <p class="h3 text-white m-b-0"><?php include("../../conn/conn.php");$today=strtotime(date("Y-m-d"),time());$usertime=date("Y-m-d H:i:s",$today);$end=$today+60*60*24;$usertime2=date("Y-m-d H:i:s",$end);
						 $sqlstr6="select count(*) from content where datatime between '$usertime' and '$usertime2' and own !=1";
						 $result6=mysqli_query($conn,$sqlstr6); while($myrow6=mysqli_fetch_array($result6))echo $myrow6[0];?></p>
                </div>
              </div>
            </div>
          </div>
		<div class="col-sm-6 col-lg-3">
            <div class="card bg-cyan">
              <div class="card-body clearfix">
			   <div class="pull-left"> <span class="img-avatar img-avatar-48 bg-translucent"><i class="mdi mdi-comment-text-outline fa-1-5x"></i></span> </div>
                <div class="pull-left" style="padding-left:20px;">
                  <p class="h6 text-white m-t-0">回复数</p>
                  <p class="h3 text-white m-b-0"><?php include("../../conn/conn.php");
			$sqlstr="select count(*) from content where own=0";
			$result=mysqli_query($conn,$sqlstr);
			while($myrow=mysqli_fetch_array($result))echo $myrow[0]; ?></p>
                </div>
              </div>
            </div>
          </div>
	</div>
   
        <div class="row">
          
          <div class="col-lg-12">
            <div class="card">
              <div class="card-header">
                <h4>项目信息</h4>
              </div>
              <div class="card-body">
                <div class="table-responsive">
                  <table class="table table-hover">
                    <thead>
                      <tr>
                        <th>#</th>
                        <th>项目名称</th>
                        <th>开始日期</th>
                        <th>截止日期</th>
                        <th>状态</th>
                        <th>进度</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <td>1</td>
                        <td>论坛网站首页设计</td>
                        <td>10/09/2019</td>
                        <td>20/09/2019</td>
                        <td><span class="label label-warning">待定</span></td>
                        <td>
                          <div class="progress progress-striped progress-sm">
                            <div class="progress-bar progress-bar-warning" style="width:70%;"></div>
                          </div>
                        </td>
                      </tr>
                      <tr>
                        <td>2</td>
                        <td>用户登录注册设计</td>
                        <td>20/09/2019</td>
                       <td>25/09/2019</td>
                        <td><span class="label label-success">完成</span></td>
                        <td>
                          <div class="progress progress-striped progress-sm">
                            <div class="progress-bar progress-bar-success" style="width:100%;"></div>
                          </div>
                        </td>
                      </tr>
                      <tr>
                        <td>3</td>
                        <td>用户个人中心设计</td>
                         <td>01/12/2019</td>
                         <td>10/12/2019</td>
                        <td><span class="label label-warning">待定</span></td>
                        <td>
                          <div class="progress progress-striped progress-sm">
                            <div class="progress-bar progress-bar-warning" style="width:30%;"></div>
                          </div>
                        </td>
                      </tr>
                      <tr>
                        <td>4</td>
                        <td>后台管理系统模板设计</td>
                        <td>25/01/2019</td>
                        <td>09/05/2019</td>
                        <td><span class="label label-success">进行中</span></td>
                        <td>
                          <div class="progress progress-striped progress-sm">
                            <div class="progress-bar progress-bar-success" style="width:30%;"></div>
                          </div>
                        </td>
                      </tr>
                      <tr>
                        <td>5</td>
                        <td>篮球板块设计</td>
                        <td>10/10/2019</td>
                        <td>未完成</td>
                        <td><span class="label label-danger">进行中</span></td>
                        <td>
                          <div class="progress progress-striped progress-sm">
                            <div class="progress-bar progress-bar-danger" style="width:50%;"></div>
                          </div>
                        </td>
                      </tr>
                      <tr>
                        <td>6</td>
                        <td>其它设计</td>
                        <td>----------</td>
                        <td>----------</td>
                        <td><span class="label label-success">未开始</span></td>
                        <td>
                          <div class="progress progress-striped progress-sm">
                            <div class="progress-bar progress-bar-success" style="width:0;"></div>
                          </div>
                        </td>
                      </tr>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
          
        </div>
        <div class="row">      
          <div class="col-lg-12">
            <div class="card">
              <div class="card-body" style="text-align: center">
 				<p>Copyright © 2019-2020 xiong</p>
  				<p>该项目属于个人作品</p>
  				<p>字体图标来源于<a href="https://glyphicons.com/">Glyphicons Halflings</a></p>
              </div>
            </div>
          </div>
          
        </div>
	</div>
    </main>
	 		<!--广告区-->
			<div class="modal fade" id="myModal3" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
					<div class="modal-dialog">
					<div class="modal-content">
					<div class="modal-header">
						<input type="button" class="close" data-dismiss="modal" aria-hidden="true" value="x">
					<h4 class="modal-title" id="myModalLabel3">
					公告区管理
					</h4>
				</div>
				<div class="modal-body">
				  <table class="table table-bordered">
					<thead>
					 <tr>
						 <th>标题</th>
						 <th>功能</th>
					</tr>
				   </thead>
					 <tbody id="j_tb">
					<?php
							include("../../conn/conn.php");
							$sqlstr5="select *from advertisement";
							$result5=mysqli_query($conn,$sqlstr5);
							while($myrow5=mysqli_fetch_array($result5)){
					?>
					  <tr>
						  <td><?php echo $myrow5[1];?></td>
						  <td>
						  <button class="btn btn-info" data-toggle="modal" data-target="#myModal7" value="<?php echo $myrow5[0];?>">修改</button>
						  <button class="btn btn-warning" onClick="showsimple(<?php echo $myrow5[0];?>)">删除</button>
						  </td>
					  </tr>
					<?php
							}
					?>
					 </tbody>
				  </table>					                     
				<div class="modal-footer">
					<input type="button" class="btn btn-default" data-dismiss="modal" value="关闭">
					<input type="button" class="btn btn-primary" style="float:left;" data-toggle="modal" data-target="#myModal5" value="添加">
				</div>
				</div>
				</div>
			</div>
                <hr>
            </div><!--modal fade end-->
			<!--广告添加-->
			<form method="post" action="" class="site-form" enctype="multipart/form-data">
				<div class="modal fade" id="myModal5" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
					<div class="modal-dialog">
					<div class="modal-content">
					<div class="modal-header">
						<input type="button" class="close" data-dismiss="modal" aria-hidden="true" value="x">
					<h4 class="modal-title" id="myModalLabel5">
					公告添加
					</h4>
				</div>
				<div class="modal-body">
					<input type="text" class="form-control" id="adminWord" name="adminWord" placeholder="请输入新的公告"><br/>
				</div>
				<div class="modal-footer">
					<input type="button" class="btn btn-default" data-dismiss="modal" value="关闭">
					<input type="submit" class="btn btn-primary" name="btn3" value="添加">
				</div>
				</div>
				</div>
			</div>	 
			</form>
			<!--广告修改-->
			<form method="post" action="" class="site-form" enctype="multipart/form-data">
				<div class="modal fade" id="myModal7" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
					<div class="modal-dialog">
					<div class="modal-content">
					<div class="modal-header">
						<input type="button" class="close" data-dismiss="modal" aria-hidden="true" value="x">
					<h4 class="modal-title" id="myModalLabel7">
					公告修改
					</h4>
				</div>
				<div class="modal-body">
					<input type="text" class="form-control" id="adminNewWord" name="adminNewWord" value="请输入新的公告">
				</div>
				<div class="modal-footer">
					<input type="button" class="btn btn-default" data-dismiss="modal" value="关闭">
					<input type="submit" class="btn btn-primary" name="btn7" value="确定">
				</div>
				</div>
				</div>
			</div>	 
			</form>
	  	<?php
				if(isset($_POST['btn3'])){
						$admin_word=$_POST["adminWord"];
						$sqlstr6="insert into advertisement(adverttitle) value ('".$admin_word."')";
						$word6=mysqli_query($conn,$sqlstr6);
						echo "<script>alert('添加成功！')</script>";
					 	echo "<script type='text/javascript'>document.location.href='admin_center.php'</script>";
				}else if(isset($_POST['btn7'])){
						$admin_newword=$_POST["adminNewWord"];
						$sqlstr7="update advertisement set adverttitle='".$admin_newword."'";
						$word7=mysqli_query($conn,$sqlstr7);
						echo "<script>alert('修改成功！')</script>";
					 	echo "<script type='text/javascript'>document.location.href='admin_center.php'</script>";
				}else{
					
				}
				?>
    </div>
    </div>
<script src="../../js/index1.js"></script>
<script src="../../js/jquery.min.js"></script>
<script src="../../js/bootstrap.js"></script>
<script src="../../js/perfect-scrollbar.min.js"></script>
<script src="../../js/main.min.js"></script>
</body>
</html>