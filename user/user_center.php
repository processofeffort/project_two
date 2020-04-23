<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width,initial-scale=1.0" />
<link href="../css/bootstrap.css" rel="stylesheet" />
<link href="../css/materialdesignicons.min.css" rel="stylesheet">
<link href="../css/style.min.css" rel="stylesheet">
<style>
.file {
    position: relative;
    border: 1px solid #ccc;
    border-radius: 4px;
    padding: 8px 12px;
    overflow: hidden;
    text-decoration: none;
    text-indent: 0;
    line-height: 20px;
	color: #333;
 	background-color: #fff;
}
.file input {
    position: absolute;
    font-size: 100px;
	height: 40px;
	width:90px;
    right: 0;
    top: 0;
    opacity: 0;
}
.file:hover {
    background: #AADFFD;
    border-color: #78C3F3;
    color: #004974;
    text-decoration: none;
}
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
<title>用户中心</title>
</head>
<body>
<div class="lyear-layout-web">
  <div class="lyear-layout-container">
    <!--左侧导航-->
    <aside class="lyear-layout-sidebar">    
      <!-- logo -->
      <div id="logo" class="sidebar-header">
        <a href="../home/homepage.php"><img src="../images/logo-title.png"/></a>
      </div>
      <div class="lyear-layout-sidebar-scroll">     
        <nav class="sidebar-main" style="margin-left: 30px;">
          <ul class="nav nav-drawer">
            <li class="nav-item active"> <a href="user_center.php"><i class="mdi mdi-account"></i> 个人信息</a> </li>
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
              <a href="javascript:void(0)" data-toggle="dropdown"> <span class="caret"></span>
    <?php
	if(isset($_SESSION['name'])){
		    include("../conn/conn.php");
			$sqlstr="select *from user where name='".$_SESSION['name']."'";
			$result=mysqli_query($conn,$sqlstr);
			while($myrow=mysqli_fetch_array($result)){
			if($myrow['pic']){
				echo "<div>";
				echo "<img src='../user/".$myrow['pic']."' width='30px' height='30px' style='position:absolute;top:-3px;right:70px;border-radius:20px;'/>";
				echo "<a href='../user/user_center.php' style='position:absolute;top:1px;right:25px;font-weight:bolder'>".$myrow['username']."</a>";
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
                <div class="edit-avatar">
                 <?php
				if(isset($_SESSION['name'])){
		    include("../conn/conn.php");
			$sqlstr="select *from user where name='".$_SESSION['name']."'";
			$result=mysqli_query($conn,$sqlstr);
			while($myrow=mysqli_fetch_array($result)){
				if($myrow['pic']){
				 echo "<img src='".$myrow['pic']."' width='100px' height='100px'/>";
				}else{
					echo "<img src='../images/icon.jpg' width='100px' height='100px' onmousemove=this.title='请设置头像'>";
				}
			}
				 ?>
                  <div class="avatar-divider"></div>
                  <div class="edit-avatar-content" style="margin-top:20px;">
					   <form action="" method="post" enctype="multipart/form-data">
						<a href="javascript:;" class="file">选择图像
       					<input type="file" name="file"/>
						</a>
						<br/>
        				<input type="submit" name="submit" class="btn btn-default" style="margin-top: 20px;padding:5px 25px;" value="上传" />
					  </form>
                  </div>
				 <?php
						if(isset($_POST['submit'])){
						if ($_FILES["file"]["error"] > 0){//如果上传出错
						echo "您没有上传图像！";
							}else{
								$image= $_FILES["file"]["name"];// 存储在服务器的文件的临时副本的名称
								$type= $_FILES["file"]["type"];//被上传文件的类型
								//图片另存为自己的路径下
						if (file_exists($_FILES["file"]["name"])){
						}
						else{
							$upload_file = iconv("UTF-8", "GB2312", $_FILES["file"]["name"]);
							move_uploaded_file($_FILES["file"]["tmp_name"],$upload_file );
							// echo "Stored in: " . "../source/" . $_FILES["file"]["name"];
		    			}
						 //存入数据库
						$sqlstr="update user set type='".$type."',pic='".$image."' where name='".$_SESSION['name']."'";
						$word=mysqli_query($conn,$sqlstr);	
						echo "<script>alert('图片上传成功')</script>";
						echo "<script type='text/javascript'>document.location.href='user_center.php'</script>";
				}
						}
				 ?>
				<div class="avatar-divider"></div>
                <div class="edit-avatar-content" style="margin-top:12px;">
				成就勋章：
                </div>
				<div style="margin-top:20px">
                 <?php
					$sqlstr="select *from user where name='".$_SESSION['name']."'";
					$result=mysqli_query($conn,$sqlstr);
					while($myrow=mysqli_fetch_array($result)){
				if($myrow['sucessreport']>3&&$myrow['pic_status']==1){
				 echo "<img src='".$myrow['pic_one']."' width='50px' height='50px' title='成功举报用户3次以上获得该勋章'/>";
				 echo "<input type='button' class='btn btn-primary' id='btnshow' value='已佩戴'/>";
				}
				else if($myrow['sucessreport']>3&&$myrow['pic_status']==0){
				 echo "<img src='".$myrow['pic_one']."' width='50px' height='50px' title='成功举报用户3次以上获得该勋章'/>";
				 echo "<input type='button' class='btn btn-primary' id='btnown' value='佩戴'/>";
				}
				else{
				 echo "<img src='".$myrow['pic_one']."' width='50px' height='50px' title='成功举报用户3次以上获得该勋章'/>";
				 echo "<input type='button' class='btn btn-default' value='未拥有' disabled/>";
				}
				 ?>	
				</div>
				<div class="avatar-divider"></div>
				<div class="edit-avatar-content" style="margin-top:12px;">
				联系管理员：
                </div>
				<div style="margin-top:20px">
                 <?php
					$sqlstr12="select *from admin";
					$result12=mysqli_query($conn,$sqlstr12);
					while($myrow12=mysqli_fetch_array($result12)){
					   echo "<a data-toggle='modal' data-target='#myModal10'><img src=../admin/admin_center/".$myrow12['pic']." width='50px' height='50px' style='border-radius:50px' title='管理员'/></a>";
					   echo "<input type='button' class='btn btn-primary' id='btnushow' style='margin-left:20px;z-index:1;position:relative;' data-toggle='modal' data-target='#myModal11' value='查看反馈'/>";
					}
				 ?>
					<?php 
					$sqlstr13="select count(*) from ucollectd where collect_ushow=1 and collect_user='".$_SESSION['name']."'";
				  	$result13=mysqli_query($conn,$sqlstr13);
					while($myrow13=mysqli_fetch_array($result13)){
						if($myrow13[0]==0){
						  
						}else{
							echo "<span class='radius' style='margin-left:-10px;z-index:1000;position:relative;'>$myrow13[0]</span>";
						}
						}?>
				</div>
                </div>
                <hr>
                <form method="post" action="" class="site-form" enctype="multipart/form-data">
                  <div class="form-group">
                    <label for="username">用户名</label>
                    <input type="text" class="form-control" name="username" id="username" value="<?php echo $myrow['name'];?>" disabled="disabled" />
                  </div>
				   <div class="form-group">
                    <label for="password">密码</label>
                    <input type="password" class="form-control" name="password" id="password" placeholder="输入您的密码" value="<?php echo $myrow['password'];?>" disabled="disabled" >
                  </div>
                  <div class="form-group">
                    <label for="nickname">昵称</label>
                    <input type="text" class="form-control" name="nickname" id="nickname" placeholder="输入您的昵称" value="<?php echo $myrow['username'];?>" disabled="disabled" >
                  </div>
                  <div class="form-group">
                    <label for="email">邮箱</label>
                    <input type="email" class="form-control" name="email" id="email" aria-describedby="emailHelp" placeholder="请输入正确的邮箱地址" value="<?php echo $myrow['usermail'];?>" disabled="disabled" >
                  </div>
				  <div class="form-group">
                    <label for="remark">个人简介</label>
                    <textarea class="form-control" name="remark" id="remark" rows="3" placeholder="<?php echo $myrow['remark'];?>" disabled="disabled"></textarea>
                  </div>
				  <div class="btn-group-vertical">
   					<button type="button" class="btn btn-primary" data-toggle="dropdown">
       				 修改信息<span class="caret"></span>
					</button>
    				<ul class="dropdown-menu">
						<li><a data-toggle="modal" data-target="#myModal3"><i class="mdi mdi-lock-outline"></i>修改密码</a> </li>
        				<li><a data-toggle="modal" data-target="#myModal"><i class="mdi mdi-face"></i>修改姓名</a></li>
						<li><a data-toggle="modal" data-target="#myModal2"><i class="mdi mdi-mail-ru"></i>修改邮箱</a></li>
						<li><a data-toggle="modal" data-target="#myModal1"><i class="mdi mdi-crop-square"></i>修改个人简介</a></li>
    				</ul>
    			  </div>
				<!--修改用户密码-->
				<div class="modal fade" id="myModal3" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
					<div class="modal-dialog">
					<div class="modal-content">
					<div class="modal-header">
						<input type="button" class="close" data-dismiss="modal" aria-hidden="true" value="x">
					<h4 class="modal-title" id="myModalLabel3">
					修改用户密码
					</h4>
				</div>
				<div class="modal-body">
					<input type="password" class="form-control" id="accountWord" name="accountWord" placeholder="请输入原密码"><br/>
					<input type="password" class="form-control" id="accountPassword" name="accountPassword" placeholder="请输入新的密码">
				</div>
				<div class="modal-footer">
					<input type="button" class="btn btn-default" data-dismiss="modal" value="关闭">
					<input type="submit" class="btn btn-primary" name="btn3" value="提交更改">
				</div>
				</div>
				</div>
			</div>
				<!--修改用户昵称-->
				<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
					<div class="modal-dialog">
					<div class="modal-content">
					<div class="modal-header">
						<input type="button" class="close" data-dismiss="modal" aria-hidden="true" value="x">
					<h4 class="modal-title" id="myModalLabel">
					修改用户昵称
					</h4>
				</div>
				<div class="modal-body">
					<input type="text" class="form-control" id="accountText" name="accountText" placeholder="请输入新昵称">
				</div>
				<div class="modal-footer">
					<input type="button" class="btn btn-default" data-dismiss="modal" value="关闭">
					<input type="submit" class="btn btn-primary" name="btn" value="提交更改">
				</div>
				</div>
				</div>
			</div>
				<!--修改用户邮箱-->
				<div class="modal fade" id="myModal2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
					<div class="modal-dialog">
					<div class="modal-content">
					<div class="modal-header">
						<input type="button" class="close" data-dismiss="modal" aria-hidden="true" value="x">
					<h4 class="modal-title" id="myModalLabel2">
					修改用户邮箱
					</h4>
				</div>
				<div class="modal-body">
					<input type="email" class="form-control" id="accountEmail" name="accountEmail" placeholder="请输入新的邮箱">
				</div>
				<div class="modal-footer">
					<input type="button" class="btn btn-default" data-dismiss="modal" value="关闭">
					<input type="submit" class="btn btn-primary" name="btn2" value="提交更改">
				</div>
				</div>
				</div>
			</div>
				<!--修改用户简介-->
				<div class="modal fade" id="myModal1" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
					<div class="modal-dialog">
					<div class="modal-content">
					<div class="modal-header">
						<input type="button" class="close" data-dismiss="modal" aria-hidden="true" value="x">
					<h4 class="modal-title" id="myModalLabel1">
					修改用户简介
					</h4>
				</div>
				<div class="modal-body">
					<textarea class="form-control" rows="3" id="accountIntroduction" name="accountIntroduction" placeholder="请输入新的个人简介"></textarea>
				</div>
				<div class="modal-footer">
					<input type="button" class="btn btn-default" data-dismiss="modal" value="关闭">
					<input type="submit" class="btn btn-primary" name="btn1" value="提交更改">
				</div>
				</div>
				</div>
			</div>
				<!--与管理员联系-->
				<div class="modal fade" id="myModal10" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
					<div class="modal-dialog">
					<div class="modal-content">
					<div class="modal-header">
						<input type="button" class="close" data-dismiss="modal" aria-hidden="true" value="x">
					<h4 class="modal-title" id="myModalLabel10">
					联系管理员
					</h4>
				</div>
				<div class="modal-body">
					<textarea class="form-control" rows="3" id="adminIntroduction" name="adminIntroduction" placeholder="输入您想反馈的话"></textarea>
				</div>
				<div class="modal-footer">
					<input type="button" class="btn btn-default" data-dismiss="modal" value="关闭">
					<input type="submit" class="btn btn-primary" name="btn10" value="提交">
				</div>
				</div>
				</div>
			</div>	
				<!--查看管理员反馈-->
				<div class="modal fade" id="myModal11" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
					<div class="modal-dialog">
					<div class="modal-content">
					<div class="modal-header">
						<input type="button" class="close" data-dismiss="modal" aria-hidden="true" value="x" onClick="updateMessage()">
					<h4 class="modal-title" id="myModalLabel11">
					信息反馈
					</h4>
				</div>
				<div class="modal-body">
				<?php
					$sqlstr21="update ucollectd set collect_ushow=0 where collect_user='".$_SESSION['name']."'";
				  	$result21=mysqli_query($conn,$sqlstr21);						
					$sqlstr15="select * from ucollectd where collect_user='".$_SESSION['name']."'";
				  	$result15=mysqli_query($conn,$sqlstr15);
					while($myrow15=mysqli_fetch_array($result15)){
							echo "管理员对您的建议<label>$myrow15[collect_txt]</label>在<label>$myrow15[collect_atime]</label>反馈了<label>$myrow15[collect_atxt]</label><br/>";					    
						}						
				?>
				</div>
				<div class="modal-footer">
					<input type="button" class="btn btn-default" data-dismiss="modal" value="关闭" onClick="updateMessage()">
				</div>
				</div>
				</div>
			</div>					
           </form>
			<?php
				if(isset($_POST['btn'])){
						$account_text=$_POST["accountText"];
						$sqlstr2="select id from user where name='".$_SESSION['name']."'";
						$word2=mysqli_query($conn,$sqlstr2);
						$myrow6=mysqli_fetch_array($word2);
						$sqlstr1="update user set username='".$account_text."' where name='".$_SESSION['name']."'";
						$sqlstr3="update comment set author='".$account_text."' where iid='".$myrow6[0]."'";
						$sqlstr5="update content set reuser='".$account_text."' where tid='".$myrow6[0]."'";
						$sqlstr6="update scontent set s_reuser='".$account_text."' where s_tid='".$myrow6[0]."'";
						$word1=mysqli_query($conn,$sqlstr1);
						$word6=mysqli_query($conn,$sqlstr6);
						$word5=mysqli_query($conn,$sqlstr5);
						$word3=mysqli_query($conn,$sqlstr3);
						echo "<script>alert('修改成功！')</script>";
						echo "<script type='text/javascript'>document.location.href='user_center.php'</script>";
				}
				if(isset($_POST['btn1'])){
						$account_introduction=$_POST["accountIntroduction"];
						$sqlstr2="update user set remark='".$account_introduction."' where name='".$_SESSION['name']."'";
						$word2=mysqli_query($conn,$sqlstr2);
						echo "<script>alert('更新成功！')</script>";
						echo "<script type='text/javascript'>document.location.href='user_center.php'</script>";
				}
				if(isset($_POST['btn2'])){
						$account_email=$_POST["accountEmail"];
						$sqlstr3="update user set usermail='".$account_email."' where name='".$_SESSION['name']."'";
						$word3=mysqli_query($conn,$sqlstr3);
						echo "<script>alert('修改成功！')</script>";
						echo "<script type='text/javascript'>document.location.href='user_center.php'</script>";
				}
				if(isset($_POST['btn3'])){
						$account_word=$_POST["accountWord"];
						$account_password=$_POST["accountPassword"];
						if($account_word==$myrow[1]&&$account_word==$account_password){
							echo "<script>alert('密码相同！')</script>";
						}else if($account_word==$account_password){
							echo "<script>alert('两次输入密码相同.')</script>";
				}
					else if($account_word!=$myrow[1]){
						echo "<script>alert('原密码不正确！')</script>";
					}
					else{
						$sqlstr="update user set password='".$account_password."' where name='".$_SESSION['name']."'";
						$word=mysqli_query($conn,$sqlstr);
						echo "<script>alert('修改成功！')</script>";
						echo "<script type='text/javascript'>document.location.href='user_center.php'</script>";
					}
				}	
				function msecdate($time)
				{
					$tag='Y-m-d H:i:s';
					$a = substr($time,0,10);
					$b = substr($time,10);
					$date = date($tag,$a);
					return $date;
				}		
				if(isset($_POST['btn10'])){
						$account_admin=$_POST["adminIntroduction"];
						$time=msecdate($_SESSION['time']);
						$sqlstr3="insert into ucollectd(collect_user,collect_ruser,collect_txt,collect_time,collect_ushow,collect_ashow,collect_if) values('".$_SESSION['name']."','admin','".$account_admin."','".$time."',0,1,0)";
						$word3=mysqli_query($conn,$sqlstr3);
						echo "<script>alert('已发送！请等待！')</script>";
						echo "<script type='text/javascript'>document.location.href='user_center.php'</script>";
				}					
				 ?>
				  <?php
					}
				}
				?>
              </div>
            </div>
			</div>
        </div>   
		</div>     
    </main>
    </div>
    </div>
<script src="../js/jquery.min.js"></script>
<script src="../js/bootstrap.js"></script>
<script src="../js/perfect-scrollbar.min.js"></script>
<script src="../js/main.min.js"></script>
<script>
if(document.getElementById("btnown")){
	var btn_own = document.getElementById("btnown");
	console.log(111);
	btn_own.addEventListener("click",function(){
	$.ajax({
	url:"picstatus.php",
	data:{key:1,key1:'<?php echo $_SESSION['name']?>'},
	type:"POST",
	dataType:"JSON",
	success: function(data){
	alert("佩戴成功");
	window.location.href="user_center.php";
	},
	error:function(){
		alert("请求失败");
	}
})
},false);	
}else{
	var btn_show = document.getElementById("btnshow");	
	console.log(222);
btn_show.addEventListener("click",function(){
	$.ajax({
	url:"picstatus.php",
	data:{key:0,key1:'<?php echo $_SESSION['name']?>'},
	type:"POST",
	dataType:"JSON",
	success: function(data){
	alert("取消佩戴");
	window.location.href="user_center.php";
	},
	error:function(){
		alert("请求失败");
	}
})
},false);
};
function updateMessage(){
	window.location.href="user_center.php";
}
</script>
</body>
</html>