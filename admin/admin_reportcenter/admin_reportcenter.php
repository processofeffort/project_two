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
<title>管理员中心-举报管理</title>
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
			<li class="nav-item active">
              <a href="admin_reportcenter.php"><i class="mdi mdi-alert-circle"></i>举报管理</a>
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
			   <span class="navbar-page-title">后台中心>举报管理</span>
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
              <div class="card-body">
				<div class="edit-avatar">
				   <div class="form-group">
					<ul id="uld">
					<li class="btn btn-danger">未审核</li>
					<li class="btn btn-success">已审核</li>
					</ul>
              	  </div>
					<input type="text" id="key" style="display:none" value="处理成功"/>
			   </div>
			 	 <div class="table-responsive">
                  <table class="table table-bordered">
                    <thead id="tr">
                    </thead>
					<tbody id="nr">
              		</tbody>
				  </table>
				  <p id="nt" style="font-size:20px"></p>
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
var ul = document.getElementById("uld");
var uli = ul.getElementsByTagName("li");
for(var i=0;i<uli.length;i++){
     uli[i].addEventListener("click",function(){
	 cont=this.innerHTML;
	 page = 1;
  	 Load(cont); //加载数据
     LoadXinXi(cont); //加载分页信息
		},false)
}
function Load(cont)
{
 var key = $("#key").val(); //查询条件
 var a=cont;
 if(!a){
 $.ajax({
   url:"creport.php",
   data:{page:page,key:key},
   type:"POST",
   dataType:"JSON",
   success: function(data){
    var str = "";
	var st="";
	st+="<tr><th style='text-align:center;width:100px'>举报帖子ID</th><th style='text-align:center;width:100px'>被举报用户</th><th style='text-align:center'>被举报内容</th><th style='text-align:center'>举报原因</th><th style='text-align:center'>举报用户</th><th style='text-align:center'>举报日期</th><th style='text-align:center'>审核</th><th style='text-align:center'>操作</th></tr>";
    for(var k in data)
     {
      str +="<tr style='text-align:center'><td>"+data[k].wid+"</td><td>"+data[k].wuser+"</td><td style='width:200px'>"+data[k].wtext+"</td><td>"+data[k].wresult+"</td><td>"+data[k].wsuser+"</td><td>"+data[k].wdatatime+"</td><td style='color:#48b0f7'>"+data[k].wstatus+"</td><td><button class='btn btn-success' onclick=sure("+data[k].rid+",'"+data[k].wuser+"')>√</button>&nbsp;<button class='btn btn-danger' onclick=miss("+data[k].rid+")>×</button></td></tr>";
     }
   	   if(str==""){
		    $("#nr").html("");
		    $("#tr").html(st);
		    $("#nt").html("当前无任何数据");//把数据返回表格
	   }else{
		    $("#nt").html("");
		    $("#tr").html(st);
		    $("#nr").html(str);//把数据返回表格
	   }
    }
  });
 }
else if(a=="未审核"){
$.ajax({
   url:"creport.php",
   data:{page:page,key:key},
   type:"POST",
   dataType:"JSON",
   success: function(data){
    var str = "";
	var st="";
	st+="<tr><th style='text-align:center;width:100px'>举报帖子ID</th><th style='text-align:center;width:100px'>被举报用户</th><th style='text-align:center'>被举报内容</th><th style='text-align:center'>举报原因</th><th style='text-align:center'>举报用户</th><th style='text-align:center'>举报日期</th><th style='text-align:center'>审核</th><th style='text-align:center'>操作</th></tr>";
    for(var k in data)
     {
      str +="<tr style='text-align:center'><td>"+data[k].wid+"</td><td>"+data[k].wuser+"</td><td style='width:200px'>"+data[k].wtext+"</td><td>"+data[k].wresult+"</td><td>"+data[k].wsuser+"</td><td>"+data[k].wdatatime+"</td><td style='color:#48b0f7'>"+data[k].wstatus+"</td><td><button class='btn btn-success' onclick=sure("+data[k].rid+","+data[k].wuser+")>√</button>&nbsp;<button class='btn btn-danger' onclick=miss("+data[k].rid+")>×</button></td></tr>";
     }
   	   if(str==""){
		    $("#nr").html("");
		     $("#tr").html(st);
		    $("#nt").html("当前无任何数据");//把数据返回表格
	   }else{
		    $("#nt").html("");
		     $("#tr").html(st);
		    $("#nr").html(str);//把数据返回表格
	   }
    }
  });
}
else{
   a='审核中';
   $.ajax({
   url:"creport.php",
   data:{page:page,key:a},
   type:"POST",
   dataType:"JSON",
   success: function(data){
    var str = "";
	var st="";
	st+="<tr><th style='text-align:center;width:100px'>举报帖子ID</th><th style='text-align:center;width:100px'>被举报用户</th><th style='text-align:center'>被举报内容</th><th style='text-align:center'>举报原因</th><th style='text-align:center'>举报用户</th><th style='text-align:center'>举报日期</th><th style='text-align:center'>审核</th></tr>";
     for(var k in data)
     {
	   if(data[k].wend=="举报成功"){
       str +="<tr style='text-align:center'><td>"+data[k].wid+"</td><td>"+data[k].wuser+"</td><td style='width:200px'>"+data[k].wtext+"</td><td>"+data[k].wresult+"</td><td>"+data[k].wsuser+"</td><td>"+data[k].wdatatime+"</td><td style='color:#f96868'>"+data[k].wend+"</td></tr>";		   
	   }else{
       str +="<tr style='text-align:center'><td>"+data[k].wid+"</td><td>"+data[k].wuser+"</td><td style='width:200px'>"+data[k].wtext+"</td><td>"+data[k].wresult+"</td><td>"+data[k].wsuser+"</td><td>"+data[k].wdatatime+"</td><td style='color:#48b0f7'>"+data[k].wend+"</td></tr>";			   
	   }
     }
	   if(str==""){
		    $("#nr").html("");
		    $("#tr").html(st);
		    $("#nt").html("当前无任何数据");//把数据返回表格
	   }else{
		    $("#nt").html("");
		    $("#tr").html(st);
		    $("#nr").html(str);//把数据返回表格
	   }
 
    }
  });
	}
}
function LoadXinXi(cont)
{
 var str = "";
 var minys = 1;
 var maxys = 1;
 var key = $("#key").val();
 var b=cont;
 //查总页数
if(!b){
 $.ajax({
   async:false,
   url:"cpage.php",
   data:{key:key},
   type:"POST",
   dataType:"TEXT",
   success: function(d){
     maxys = d;
    }
  });
}
else if(b=="未审核"){
 $.ajax({
   async:false,
   url:"cpage.php",
   data:{key:key},
   type:"POST",
   dataType:"TEXT",
   success: function(d){
     maxys = d;
    }
  });	
}
else{
b='审核中';
 $.ajax({
   async:false,
   url:"cpage.php",
   data:{key:b},
   type:"POST",
   dataType:"TEXT",
   success: function(d){
     maxys = d;
    }
  });
}
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
   Load(cont); //加载数据
   LoadXinXi(cont); //加载分页信息
  })
 //给下一页加点击事件
 $("#next").click(function(){
   page = page+1;
   if(page>maxys)
   {
    page=maxys;
   }
   Load(cont); //加载数据
   LoadXinXi(cont); //加载分页信息
  })
 //给中间的列表加事件
 $(".list").click(function(){
   page = parseInt($(this).attr("bs"));
   Load(cont); //加载数据
   LoadXinXi(cont); //加载分页信息
  })
}
function sure(id,name){
$.ajax({
   url:"csure.php",
   data:{id:id,name:name},
   type:"POST",
   dataType:"JSON",
   success: function(){
	   alert("处理成功");
	   location.href="admin_reportcenter.php";
   },
   error:function(){
	   alert("处理失败");
   }
	})
}
function miss(id){
$.ajax({
   url:"cmiss.php",
   data:{id:id},
   type:"POST",
   dataType:"JSON",
   success: function(){
	   alert("处理成功");
	   location.href="admin_reportcenter.php";
   },
   error:function(){
	   alert("处理失败");
   }
	})
}
</script>
</body>
</html>