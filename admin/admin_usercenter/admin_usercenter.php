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
            <li class="nav-item"> <a href="../admin_center/admin_center.php"><i class="mdi mdi-account-box"></i>后台信息中心</a> </li>
            <li class="nav-item active">
              <a href="admin_usercenter.php"><i class="mdi mdi-palette"></i>用户管理</a>
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
			   <span class="navbar-page-title">后台中心>用户管理</span>
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
	   			echo "<a href='../admin_center/admin_center.php' style='position:absolute;top:3px;right:25px;font-weight:bolder;width:30px'>".$myrow['adminname']."</a>";
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
                    <input type="text" class="form-control" placeholder="请输入用户名搜索" name="username" id="key"/>
              	  </div>
				   <div class="form-group" style="padding:0 20px;">
					<input type="button" class="form-control btn btn-info" id="key1" value="搜索"/>
              	  </div>
			   </div>
			 	 <div class="table-responsive">
                  <table class="table table-bordered">
                    <thead>
                      <tr>
                        <th style="text-align: center">用户名</th>
                        <th style="text-align: center;width:200px">用户邮箱</th>
                        <th style="text-align: center">用户个人简介</th>
                        <th style="text-align: center">用户状态</th>
                        <th style="text-align: center;width:500px">功能</th>
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
	  <!--查看用户信息-->
	 	<div class="modal fade" id="myModal3" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
					<div class="modal-dialog">
					<div class="modal-content">
					<div class="modal-header">
						<input type="button" class="close" data-dismiss="modal" aria-hidden="true" value="x">
					<h4 class="modal-title" id="myModalLabel3">
					用户详细信息
					</h4>
				</div>
				<div class="modal-body">
					用户名：<input type="text" class="form-control" id="accountwd" name="accountwd" readonly><br/>
					用户密码：<input type="text" class="form-control" id="accountWord" name="accountWord" readonly><br/>
					用户姓名：<input type="text" class="form-control" id="accountname" name="accountname" readonly><br/>
					用户邮箱：<input type="email" class="form-control" id="accountmail" name="accountmail" readonly><br/>
					用户简介：<input type="text" class="form-control" id="accountremark" name="accountremark" readonly><br/>
				</div>
				<div class="modal-footer">
					<input type="button" class="btn btn-default" data-dismiss="modal" value="关闭">
				</div>
				</div>
				</div>
			</div>
	  <!--用户记录查看-->
	 	<div class="modal fade" id="myModal5" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
					<div class="modal-dialog">
					<div class="modal-content">
					<div class="modal-header">
						<input type="button" class="close" data-dismiss="modal" aria-hidden="true" value="x">
					<h4 class="modal-title" id="myModalLabel5">
					用户记录信息
					</h4>
				</div>
				<div class="modal-body">
					用户名：<input type="text" class="form-control" id="accountName" name="accountName" readonly><br/>
					<ol id="modal-body">
					</ol>
				</div>
				<div class="modal-footer">
					<input type="button" class="btn btn-default" data-dismiss="modal" value="关闭">
				</div>
				</div>
				</div>
			</div>
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
   url:"cdata.php",
   data:{page:page,key:key},
   type:"POST",
   dataType:"JSON",
   success: function(data){
    var str = "";
    for(var k in data)
     {
		if(data[k].status==1&&data[k].remark!=""){
		 str+="<tr><td style='text-align: center;line-height:40px;'>"+data[k].username+"</td><td style='text-align: center;line-height:40px;'>"+data[k].usermail+"</td><td style='text-align: center;line-height:40px;'>"+data[k].remark+"</td><td style='text-align: center;line-height:40px;'><span style='color:#48b0f7'>正常</span></td><td><button class='btn btn-info' onClick=changeAjax("+data[k].username+")>详细信息</button>&nbsp;&nbsp;&nbsp;<button class='btn btn-cyan' onClick=changeTime("+data[k].username+")>记录查看</button>&nbsp;&nbsp;&nbsp;<button class='btn btn-primary' onClick=changeWord("+data[k].username+")>密码重置</button>&nbsp;&nbsp;&nbsp;<button class='btn btn-danger' onclick=changeStatus("+data[k].username+")>封禁</button></td></tr>";
		}else if(data[k].status==1&&data[k].remark==""){
		 str+="<tr><td style='text-align: center;line-height:40px;'>"+data[k].username+"</td><td style='text-align: center;line-height:40px;'>"+data[k].usermail+"</td><td style='text-align: center;line-height:40px;'>无</td><td style='text-align: center;line-height:40px;'><span style='color:#48b0f7'>正常</span></td><td><button class='btn btn-info' onClick=changeAjax("+data[k].username+")>详细信息</button>&nbsp;&nbsp;&nbsp;<button class='btn btn-cyan' onClick=changeTime("+data[k].username+")>记录查看</button>&nbsp;&nbsp;&nbsp;<button class='btn btn-primary' onClick=changeWord("+data[k].username+")>密码重置</button>&nbsp;&nbsp;&nbsp;<button class='btn btn-danger' onclick=changeStatus("+data[k].username+")>封禁</button></td></tr>";
		}else if(data[k].status==0&&data[k].remark!=""){
		 str+="<tr><td style='text-align: center;line-height:40px;'>"+data[k].username+"</td><td style='text-align: center;line-height:40px;'>"+data[k].usermail+"</td><td style='text-align: center;line-height:40px;'>"+data[k].remark+"</td><td style='text-align: center;line-height:40px;'><span style='color:#f96868'>封禁</span></td><td><button class='btn btn-info' onClick=changeAjax("+data[k].username+")>详细信息</button>&nbsp;&nbsp;&nbsp;<button class='btn btn-cyan' onClick=changeTime("+data[k].username+")>记录查看</button>&nbsp;&nbsp;&nbsp;<button class='btn btn-primary' onClick=changeWord("+data[k].username+")>密码重置</button>&nbsp;&nbsp;&nbsp;<button class='btn btn-success' onclick=changeStatus("+data[k].username+")>恢复</button></td></tr>";			
		}else{
		 str+="<tr><td style='text-align: center;line-height:40px;'>"+data[k].username+"</td><td style='text-align: center;line-height:40px;'>"+data[k].usermail+"</td><td style='text-align: center;line-height:40px;'>无</td><td style='text-align: center;line-height:40px;'><span style='color:#f96868'>封禁</span></td><td><button class='btn btn-info' onClick=changeAjax("+data[k].username+")>详细信息</button>&nbsp;&nbsp;&nbsp;<button class='btn btn-cyan' onClick=changeTime("+data[k].username+")>记录查看</button>&nbsp;&nbsp;&nbsp;<button class='btn btn-primary' onClick=changeWord("+data[k].username+")>密码重置</button>&nbsp;&nbsp;&nbsp;<button class='btn btn-success' onclick=changeStatus("+data[k].username+")>恢复</button></td></tr>";			
		}
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
   url:"czys.php",
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
	function changeAjax(key){
		var checkAjax = key;
		console.log(checkAjax);
		$.ajax({
			url:"cajax.php",
			data:{key:checkAjax},
			type:"POST",
			dataType:"JSON",
			success:showQuery,
			error:function(){
				alert("请求失败");
			}
		})
	}
	function changeTime(keyword){
		var checkTime = keyword;
		console.log(checkTime);
		$.ajax({
			url:"ctime.php",
			data:{keyword:checkTime},
			type:"POST",
			dataType:"JSON",
			success:showQuery1,
			error:function(){
				alert("请求失败");
			}
		})
	}
function changeWord(key){
	var checkTime = key;
	console.log(checkTime);
		$.ajax({
			url:"cword.php",
			data:{key:checkTime},
			type:"POST",
			dataType:"JSON",
			success:function(){
				alert("密码重置成功");
			},
			error:function(){
				alert("请求失败");
			}
		})
	}
function changeStatus(key){
	var checkTime = key;
	console.log(checkTime);
		$.ajax({
			url:"cstatus.php",
			data:{key:checkTime},
			type:"POST",
			dataType:"JSON",
			success:function(data){
				if(data==1){
				  alert("用户封禁成功");
				  location.href="admin_usercenter.php";
				}else{
			      alert("用户解禁成功");
				  location.href="admin_usercenter.php";
				}
			},
			error:function(){
				alert("请求失败");
			}
		})
	}
</script>
<script>
function showQuery(data){
    $("#accountwd").val(data.name);
    $("#accountWord").val(data.password);
	$("#accountname").val(data.username);
	$("#accountmail").val(data.usermail);
	$("#accountremark").val(data.remark);
    // 显示模态框
    $('#myModal3').modal('show');
}
</script>
<script>
function showQuery1(data){
	$("#accountName").val(data[0].username);
	var str = "";
    for(var k in data)
     {	
	  if(data[k].wend=="举报成功"){
		 str +="<li style='display:none'>"+data[k].wtext+"</li>"
	  }
     }
     $("#modal-body").html(str);//把数据返回表格
    // 显示模态框
    $('#myModal5').modal('show');
	var dat = document.getElementById("modal-body");
	var datli = dat.getElementsByTagName("li");
	console.log(datli.length);
	for(var k=0;k<datli.length;k++){
		var daiv = document.createElement("div");
		daiv.id=k+100;
		dat.appendChild(daiv);
	}
	var daiad = dat.getElementsByTagName("div");
	console.log(daiad);
//	var daxt = dat.getElementsByTagName("input");
	for(var j=1;j<=datli.length;j++){
		var daxs = document.createElement("p");
		daxs.innerHTML="记录"+j+":";
		daiad[j-1].appendChild(daxs);
//		daiad[j-1].insertBefore(daxs,daxt[j-1].childNodes[j-1]);
//		console.log(daxt[j-1].childNodes[0]);
	}
	for(var i=0;i<datli.length;i++){
		var dax = document.createElement("input");
		dax.className="form-control";
		dax.id=i;
		dax.style.marginBottom="10px";
		dax.style.width="570px";
		dax.style.marginLeft="-5px";
		dax.setAttribute("type","text");
		dax.setAttribute("readonly",true);
		daiad[i].appendChild(dax);
		$('#'+i).val(datli[i].innerText);
	}
	console.log(daxs);
//	console.log(daxt);
}	
</script>
</body>
</html>