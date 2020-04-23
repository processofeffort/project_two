<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width,initial-scale=1.0" />
<link href="../css/bootstrap.css" rel="stylesheet" />
<link href="../css/common.css" rel="stylesheet" />
<title>搜索版块</title>
<style>
body{
	background:url(../images/body_bg.jpg) no-repeat;
	background-size:cover;
	}
.table-border{
	border:1px solid #999;
}
.savetips{
	width: 220px;
    height: 50px;
	border-radius: 20px;
	background:#454545;
	font-size: 16px;
	font-family: 'Montserrat', sans-serif;
	font-weight: bold;
	text-align: center;
	line-height: 50px;
    position: fixed;
    top:10%;
    left:calc(50% - 110px);
    color: #fff;
	}
</style>
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
       <a class="navbar-brand" href="../home/homepage.php">体育论坛</a>
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
			<li class="active"><a href="search.php">搜索</a></li>
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
            <ul class="nav navbar-nav navbar-right">
            <li><a <?php
			if(!session_id()) session_start();
			if(isset($_SESSION['name'])){
			echo "href='homepage.php'";
			}
			else{
				$href="../home/search.php";
				echo "href='../login/login.php?login=$href'";
				}
			?>
			>
   			  <?php
	if(isset($_SESSION['name'])){
		    include("../conn/conn.php");
			$sqlstr="select *from user where name='".$_SESSION['name']."'";
			$href1="../home/homepage.php";
			$result=mysqli_query($conn,$sqlstr);
			while($myrow=mysqli_fetch_array($result)){
			if($myrow['pic']){
				echo "<div>";
				echo "<img src='../user/".$myrow['pic']."' width='30px' height='30px' style='position:absolute;top:10px;right:90px;border-radius:25px;'/>";
				echo "<a href='../user/user_center.php' style='position:absolute;top:14px;right:45px;font-weight:bolder'>".$myrow['username']."</a>";
				echo "<a href='../login/logout.php?login=$href1' style='position:absolute;top:14px;font-weight:bolder'>注销</a>";
				echo "</div>";
			}
			else{
			echo "<div>";
			echo "<img src='../images/icon.jpg' width='30px' height='30px' style='position:absolute;top:10px;right:70px;border-radius:25px;' class='img-responsive' onmousemove=this.title='用户图片未设置'>";	
	   		echo "<a href='../user/user_center.php' style='position:absolute;top:14px;right:35px;font-weight:bolder'>".$myrow['username']."</a>";
			echo "<a href='../login/logout.php?login=$href1' style='position:absolute;top:14px;font-weight:bolder'>注销</a>";
			echo "</div>";
				}
			  }
		}
		else{
			echo "<div onmousemove=this.title='请点击进行登录'>";
			echo "<img src='../images/icon-user.png' width='30px' height='30px' style='position:absolute;top:10px;right:30px;' class='img-responsive' alt='无法显示'>";
			echo "</div>";
			}
	?>
</a>    
				</li>
            </ul>
            </div>
            </div>
            </nav>
      <div class="container">
      	<div class="row">
		 <div class="col-sm-1 col-md-1">
			 
			</div>
          <div class="col-sm-7 col-md-7">
            <!--内容区-->
            <div class="panel box-shadow radius">
            <!--第一评论区-->
			<div class="tab-category">
				<a><strong>搜索</strong></a>
					<div class="panel-body" id="post1">
					<input class="form-control required" type="text" id="searchvalue" name="stxt" placeholder="输入搜索内容" style="width:30%;display:inline-block;"/>
					<div id="addBox" class="savetips" style="display:none"></div>
				    <select id="opt" class="ot" style="padding:4px 0 8px 5px">
					<option value="0">全部</option>
					<option value="1">关键字</option>
					</select>
					<input type="button" class="btn-success" id="search" style="padding:4px 7px" value="搜索"/>
					</div>
			<div class="table-responsive">
              <table class="table table-border table-hover">
                <tbody id="nk">
                </tbody>
              </table>
			<p id="nt" style="font-size:20px;margin-left:20px"></p>
			<p id="xinxi" style="margin:-10px 5px 10px;display:inline-block;"></p>
            </div><!--table responsive end-->
			</div>
            </div><!--panel box-shadow radius内容区end-->
          </div>
		  <div class="col-sm-3 col-md-3">
			    <!--推荐-->
            <div class="panel box-shadow radius">
			<div class="tab-category">
				<a><strong>今日推荐</strong></a>
			</div>
			<div class="tab-category-item">
				<ul class="index_recd">
					<?php
						include("../conn/conn.php");
						$today=strtotime(date("Y-m-d"),time());
					    $usertime=date("Y-m-d H:i:s",$today);
					    $end=$today+60*60*24;
					    $usertime2=date("Y-m-d H:i:s",$end);
						echo "<span id='hdate'>暂无数据...</span>";
						$sql1="select *from comment where presentime between '$usertime' and '$usertime2' order by review desc limit 0,5";
						$result2=mysqli_query($conn,$sql1);
						while($myrow2=mysqli_fetch_array($result2)){
							if($myrow2){
					?>
                        <li>
						<a href="../comment/information.php?title=<?php echo $myrow2['title']?>&&mid=<?php echo $myrow2['mid'];?>" id="phdata"><?php echo $myrow2['title'];?></a>					
					    </li>           
					<?php
						}
						}
					?>
				</ul>
			</div><!--tab-category-item end-->
			</div><!--panel box-shadow radius end-->
			 
            <!--论坛精华区-->
            <div class="panel box-shadow radius">
			<div class="tab-category">
				<a href=""><strong>论坛精华</strong></a>
			</div>
			<div class="tab-category-item">
				<ul class="index_recd">
					<?php
						include("../conn/conn.php");
						$sql1="select *from comment order by review desc limit 0,5";
						$result2=mysqli_query($conn,$sql1);
						while($myrow2=mysqli_fetch_array($result2)){
					?>
                        <li>
						<a href="../comment/information.php?title=<?php echo $myrow2['title']?>&&mid=<?php echo $myrow2['mid'];?>"><?php echo $myrow2['title'];?></a>
						<p class="hits"><i class="glyphicon glyphicon-fire"></i><?php echo $myrow2['review']+5 ?></p>
					    </li>           
					<?php
						}
					?>
				</ul>
			</div><!--tab-category-item end-->
		</div><!--panel box-shadow radius end-->
		  </div>	
        </div>
      </div>
<script src="../js/jquery.min.js"></script>
<script src="../js/bootstrap.js"></script>
<script>
if(document.getElementById("phdata")){
	 document.getElementById("hdate").style.display="none";
}
</script>
<script>
$(document).ready(function(){
    $('#addBox').text("搜索内容不能为空");
    $('#search').click(function(){
		if($("#searchvalue").val()=="")
        {
         $('#addBox').show().delay(1000).fadeOut();
        }
		else{
			var vs = $('#searchvalue').val();
			history.pushState(null,"","?keyword="+vs+"")
			var page = 1; //当前页 定义一个变量 当前页
			var s =$('select  option:selected').val();
			console.log(s);
			Load(vs,Number(s));
			LoadXinXi(vs,Number(s));
		}
	});
    });	
</script>
<script>
if(location.href.split){
	var tit = decodeURI(location.href.split("?")[1]);
	var tit1 = tit.split("=")[1];
	if(tit.split("=")[1]&&tit.split("=")[0]=='keyword'){
		document.getElementById("searchvalue").value=tit1;
	}
	else{
		document.getElementById("searchvalue").value="";
	}
}
if($('#searchvalue').val()==""){
	var page = 1; //当前页 定义一个变量 当前页
	Load(0,0);
	LoadXinXi(0,0);
}
else{
	var page = 1; //当前页 定义一个变量 当前页
	var vs1 = $('#searchvalue').val();
	var s1 =$('select  option:selected').val();
	console.log(Number(s1));
	Load(vs1,Number(s1));
	LoadXinXi(vs1,Number(s1));
}
function Load(cont,cont1)
{
 var a=cont;
 $.ajax({
   url:"csport.php",
   data:{page:page,key:cont,key1:cont1},
   type:"POST",
   dataType:"JSON",
   success: function(data){
    var str = "";
    for(var k in data)
     {
      str +="<tr style='background-color:#F0F7FF;'><td><a href='../comment/information.php?title="+data[k].title+"&&mid="+data[k].mid+"&&belong="+data[k].classes+"' style='pointer-events:auto;border-bottom:0'>"+data[k].title+"</a>&nbsp;&nbsp;"+data[k].classes+"—["+data[k].belong+"]</td><td style='text-align:right;'>时间："+data[k].datime+"</td></tr><tr><td colspan='2'>帖子主题："+data[k].txt+"</td></tr>";
     }
	 if(str==""){
	   $("#nt").html("当前无任何数据");//把数据返回表格
	   $("#nk").html("");//把数据返回表格 
	 }else{
	   $("#nt").html("");//把数据返回表格
	   $("#nk").html(str);//把数据返回表格 
	 }
    }
  });
}
function LoadXinXi(cont,cont1)
{
 var str = "";
 var minys = 1;
 var maxys = 1;
 var b=cont;
 //查总页数
 $.ajax({
   async:false,
   url:"zys.php",
   data:{key:b,key1:cont1},
   type:"POST",
   dataType:"TEXT",
   success: function(d){
     maxys = d;
    }
  });
if(maxys==0){
  $("#xinxi").html(str);
}else{
 str += "<span id='prev'><</span>";
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
 str += "<span id='next'>></span>";
 $("#xinxi").html(str);
 //给上一页添加点击事件
 $("#prev").click(function(){
   page = page-1;
   if(page<1)
   {
    page=1;
   }
   Load(cont,cont1); //加载数据
   LoadXinXi(cont,cont1); //加载分页信息
  })
 //给下一页加点击事件
 $("#next").click(function(){
   page = page+1;
   if(page>maxys)
   {
    page=maxys;
   }
   Load(cont,cont1); //加载数据
   LoadXinXi(cont,cont1); //加载分页信息
  })
 //给中间的列表加事件
 $(".list").click(function(){
   page = parseInt($(this).attr("bs"));
   Load(cont,cont1); //加载数据
   LoadXinXi(cont,cont1); //加载分页信息
  })	
}
}
</script>
</body>
</html>