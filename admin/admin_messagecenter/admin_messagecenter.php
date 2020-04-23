<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width,initial-scale=1.0" />
<link href="../../css/bootstrap.css" rel="stylesheet" />
<link href="../../css/materialdesignicons.min.css" rel="stylesheet">
<link href="../../css/common.css" rel="stylesheet" />
<link href="../../css/style.min.css" rel="stylesheet">
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
<title>管理员中心-留言管理</title>
</head>
<body>
<div class="lyear-layout-web">
  <div class="lyear-layout-container">
    <!--左侧导航-->
    <aside class="lyear-layout-sidebar">    
      <!-- logo -->
	 <?php
	   session_start();
	   include("../../conn/conn.php");
	   $sql20="update ucollectd set collect_ashow=0 where collect_ruser='".$_SESSION['name']."'";
	   $result20=mysqli_query($conn,$sql20);
	  ?>		
      <div id="logo" class="sidebar-header">
        <a href="../../home/homepage.php"><img src="../../images/admin_center.png"/></a>
      </div>
      <div class="lyear-layout-sidebar-scroll">     
        <nav class="sidebar-main" style="margin-left: 30px;">
          <ul class="nav nav-drawer">
            <li class="nav-item"> <a href="../admin_center/admin_center.php"><i class="mdi mdi-account-box"></i>后台信息中心</a> </li>
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
            <li class="nav-item active">
              <a href="admin_messagecenter.php"><i class="mdi mdi-message-text-outline"></i>留言管理<?php 
				    include("../../conn/conn.php");
					$sqlstr10="select count(*) from ucollectd where collect_ashow=1";
				  	$result10=mysqli_query($conn,$sqlstr10);
					while($myrow10=mysqli_fetch_array($result10)){
						if($myrow10[0]==0){
						  
						}else{
							echo "<span class='radius'>$myrow10[0]</span>";
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
			   <span class="navbar-page-title">后台中心>留言管理</span>
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
					if($myrow[3]){
					echo "<div>";
					echo "<img src='../admin_center/".$myrow[3]."' width='30px' height='30px' style='position:absolute;top:-3px;right:70px;border-radius:20px;'/>";
						echo "<a href='../admin_center/admin_center.php' style='position:absolute;top:1px;right:25px;font-weight:bolder;width:30px'>".$myrow[5]."</a>";
						echo "</div>";
				}
				else{
				echo "<div>";
				echo "<img src='../images/icon.jpg' width='30px' height='30px' style='position:absolute;top:-1px;right:70px;border-radius:25px;' class='img-responsive' onmousemove=this.title='图片未设置'>";	
	   			echo "<a href='../admin_center/admin_center.php' style='position:absolute;top:3px;right:25px;font-weight:bolder;width:30px'>".$myrow[5]."</a>";
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
          <div class="col-sm-12 col-md-12">
            <div class="card">
              <div class="card-body" id="nt">			  
			</div>	
			<div class="pull-right">
		    <p id="xinxi"></p>
          	</div>	
        </div> 
		</div>
	</div>
	</div>
	<form method="post" action="" class="site-form" enctype="multipart/form-data">
		<!--管理员反馈-->
				<div class="modal fade" id="myModal1" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
					<div class="modal-dialog">
					<div class="modal-content">
					<div class="modal-header">
						<input type="button" class="close" data-dismiss="modal" aria-hidden="true" value="x">
					<h4 class="modal-title" id="myModalLabel1">
					管理员反馈
					</h4>
				</div>
				<div class="modal-body">
					用户名：<input type="text" class="form-control" id="accountwd" name="accountwd" readonly><br/>
					<textarea class="form-control" rows="3" id="accountIntroduction" name="accountIntroduction" placeholder="输入回复内容"></textarea>
				</div>
				<div class="modal-footer">
					<input type="button" class="btn btn-default" data-dismiss="modal" value="关闭">
					<input type="submit" class="btn btn-primary" name="btn1" value="确定">
				</div>
				</div>
				</div>
			</div>
		</form>
   </main>
	<?php
	  function msecdate($time)
	  {
		  $tag='Y-m-d H:i:s';
		  $a = substr($time,0,10);
		  $b = substr($time,10);
		  $date = date($tag,$a);
		  return $date;
	  }
	  if(isset($_POST['btn1'])){
		$ctime=msecdate(time());
		$account_name=$_POST["accountwd"];
		$account_introduction=$_POST["accountIntroduction"];
	    $sqlstr2="update ucollectd set collect_atxt='".$account_introduction."' where collect_id='".$account_name."'";
		$sqlstr1="update ucollectd set collect_atime='".$ctime."' where collect_id='".$account_name."'";
		$sqlstr3="update ucollectd set collect_if=1 where collect_id='".$account_name."'";
		$sqlstr5="update ucollectd set collect_ushow=1 where collect_id='".$account_name."'";
		$word2=mysqli_query($conn,$sqlstr2);
		$word1=mysqli_query($conn,$sqlstr1);
		$word3=mysqli_query($conn,$sqlstr3);
		$word5=mysqli_query($conn,$sqlstr5);
		echo "<script>alert('回复成功！')</script>";
		echo "<script type='text/javascript'>document.location.href='admin_messagecenter.php'</script>";
	    }
	  ?>	 
    </div>
    </div>
<script src="../../js/index1.js"></script>
<script src="../../js/jquery.min.js"></script>
<script src="../../js/bootstrap.js"></script>
<script src="../../js/perfect-scrollbar.min.js"></script>
<script src="../../js/main.min.js"></script>
<script>
var page = 1; //当前页 定义一个变量 当前页
Load(); //加载数据
LoadXinXi(); //加载分页信息
function Load()
{
 $.ajax({
   url:"ucollectd.php",
   data:{page:page},
   type:"POST",
   dataType:"JSON",
   success: function(data){
    var str = "";
    for(var k in data)
     {
		 if(data[k].collect_if==0){
			 str+="<div class='form-group' style='border:1px solid #ccc;border-radius:5px;padding:5px;'><label>留言者:</label>"+data[k].collect_user+"<a onclick=changeReview("+data[k].collect_id+") style='float:right'>待回复</a><br/><label>留言内容:</label>"+data[k].collect_txt+"<br/><label>留言时间:</label>"+data[k].collect_time+"</div>";	 
		 }else{
			 str+="<div class='form-group' style='border:1px solid #ccc;border-radius:5px;padding:5px;'><label>留言者:</label>"+data[k].collect_user+"<a href='javasrcipt:void(0)' style='float:right'>已回复</a><br/><label>留言内容:</label>"+data[k].collect_txt+"<br/><label>留言时间:</label>"+data[k].collect_time+"</div>";				 
		 }

     }
      $("#nt").html(str);//把数据返回表格
    }
  });
}					 
function LoadXinXi()
{
 var str = "";
 var minys = 1;
 var maxys = 1;
 //查总页数
 $.ajax({
   async:false,
   url:"ucollectdpage.php",
   type:"POST",
   dataType:"TEXT",
   success: function(d){
     maxys = d;
    }
  });
 str += "<span id='prev'>&laquo;</span>";
 for(var i=page-10;i<page+5;i++)
 {
  if(i>=minys && i<=maxys)
  {
   if(i==page)
   {
    str += "<span class='dangqian' bs='"+i+"'>"+i+"</span>  "
   }
   else
   {
    str += "<span class='list' bs='"+i+"'>"+i+"</span>  ";
   }
  }
 }  
 str += "<span id='next'>&raquo;</span>";
 $("#xinxi").html(str);
 //给上一页添加点击事件
 $("#prev").click(function(){
   page = page-1;
   if(page<1)
   {
    page=1;
   }
   Load(); //加载数据
   LoadXinXi(); //加载分页信息
  })
 //给下一页加点击事件
 $("#next").click(function(){
   page = page+1;
   if(page>maxys)
   {
    page=maxys;
   }
   Load(); //加载数据
   LoadXinXi(); //加载分页信息
  })
 //给中间的列表加事件
 $(".list").click(function(){
   page = parseInt($(this).attr("bs"));
   Load(); //加载数据
   LoadXinXi(); //加载分页信息
  })
}	
function changeReview(key){
	 $("#accountwd").val(key);
	 $('#myModal1').modal('show');
	}
</script>
</body>
</html>