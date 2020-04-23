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
<title>管理员中心-帖子管理</title>
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
            <li class="nav-item"> <a href="../admin_center/admin_center.php"><i class="mdi mdi-account-box"></i>后台信息中心</a> </li>
            <li class="nav-item">
              <a href="../admin_usercenter/admin_usercenter.php"><i class="mdi mdi-palette"></i>用户管理</a>
            </li>
			<li class="nav-item">
              <a href="../admin_reportcenter/admin_reportcenter.php"><i class="mdi mdi-alert-circle"></i>举报管理</a>
            </li>
            <li class="nav-item active">
              <a href="admin_portcenter.php"><i class="mdi mdi-format-align-justify"></i>帖子管理</a>
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
			   <span class="navbar-page-title">后台中心>帖子管理</span>
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
					echo "<img src='../admin_center/".$myrow[3]."' width='30px' height='30px' style='position:absolute;top:-3px;right:70px;border-radius:20px;'/>";
						echo "<a href='../admin_center/admin_center.php' style='position:absolute;top:1px;right:25px;font-weight:bolder;width:30px'>".$myrow['adminname']."</a>";
						echo "</div>";
				}
				else{
				echo "<div>";
				echo "<img src='../images/icon.jpg' width='30px' height='30px' style='position:absolute;top:-1px;right:70px;border-radius:25px;' class='img-responsive' onmousemove=this.title='图片未设置'>";	
	   			echo "<a href='.../admin_center/admin_center.php' style='position:absolute;top:3px;right:25px;font-weight:bolder;width:30px'>".$myrow['adminname']."</a>";
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
              <div class="card-body">
				<div class="edit-avatar">
				   <div class="form-group">
                    <input type="text" class="form-control" placeholder="请输入发帖者搜索" name="username" id="key"/>
              	  </div>
				   <div class="form-group" style="padding:0 20px;">
					<input type="button" class="form-control btn btn-info" id="key1" value="搜索"/>
              	  </div>
			   </div>
			 	 <div class="table-responsive">
                  <table class="table table-bordered">
                    <thead>
                      <tr>
						<th style="text-align: center">发帖者ID</th>
                        <th style="text-align: center">发帖者</th>
						<th style="text-align: center">帖子ID</th>
                        <th style="text-align: center;width:200px">版块所属</th>
                        <th style="text-align: center">发帖标题</th>
                        <th style="text-align: center">发帖内容</th>
                        <th style="text-align: center">发帖时间</th>
                      </tr>
                    </thead>
                    <tbody id="nt">
					  </tbody>
					 </table>
					<div class="pull-right">
					<p id="xinxi"></p>
          			</div>
					</div>
			</div>
        </div> 
		</div>
	</div>
	</div>
   </main>
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
var skey = document.getElementById("key1");
skey.onclick=function(){
	Load($("#key").val());
	LoadXinXi($("#key").val());
}
function Load(key)
{
 var key = $("#key").val(); //查询条件
 $.ajax({
   url:"cdata2.php",
   data:{page:page,key:key},
   type:"POST",
   dataType:"JSON",
   success: function(data){
    var str = "";
    for(var k in data)
     {
		 str+="<tr><td style='text-align: center;line-height:40px;'>"+data[k].iid+"</td><td style='text-align: center;line-height:40px;'>"+data[k].author+"</td><td style='text-align: center;line-height:40px;'>"+data[k].mid+"</td><td style='text-align: center;line-height:40px;'>"+data[k].belong+"</td><td style='text-align: center;line-height:40px;'>"+data[k].title+"</td><td style='text-align: center;line-height:40px;'>"+data[k].txt+"</td><td style='text-align: center;line-height:40px;'>"+data[k].datime+"</td></tr>";
     }
      $("#nt").html(str);//把数据返回表格
    }
  });
}
function LoadXinXi(key)
{
 var str = "";
 var minys = 1;
 var maxys = 1;
 var key = $("#key").val();
 //查总页数
 $.ajax({
   async:false,
   url:"czys2.php",
   data:{key:key},
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
   Load(key); //加载数据
   LoadXinXi(key); //加载分页信息
  })
 //给下一页加点击事件
 $("#next").click(function(){
   page = page+1;
   if(page>maxys)
   {
    page=maxys;
   }
   Load(key); //加载数据
   LoadXinXi(key); //加载分页信息
  })
 //给中间的列表加事件
 $(".list").click(function(){
   page = parseInt($(this).attr("bs"));
   Load(key); //加载数据
   LoadXinXi(key); //加载分页信息
  })
}	
</script>
</body>
</html>