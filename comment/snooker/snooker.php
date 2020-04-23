<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width,initial-scale=1.0" />
<link href="../../css/bootstrap.css" rel="stylesheet" />
<link href="../../css/common.css" rel="stylesheet" />
<link media="all" rel="stylesheet" type="text/css" href="../../js/styles/simditor.css" /> 
<title>台球版块</title>
<style>
body{
	background:url(../../images/body_bg.jpg) no-repeat;
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
    top:70%;
    left:calc(20% - 110px);
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
       <a class="navbar-brand" href="../../home/homepage.php">体育论坛</a>
    </div>
 	<div class="collapse navbar-collapse" id="example-navbar-collapse">
    	<ul class="nav navbar-nav">
        	<li><a href="../../home/homepage.php">首页</a></li>
        	<li><a href="../basketball/basketball.php">篮球</a></li>
            <li><a href="../football/football.php">足球</a></li>
            <li><a href="../table-tennis/table-tennis.php">乒乓球</a></li>
            <li><a href="../badminton/badminton.php">羽毛球</a></li>
            <li><a href="../volleyball/volleyball.php">排球</a></li>
            <li class="active"><a href="snooker.php">台球</a></li>
            <li><a href="../baseball/baseball.php">棒球</a></li>
			<li><a href="../../home/search.php">搜索</a></li>
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
			echo "href='../../home/homepage.php'";
			}
			else{
			$href="../comment/snooker/snooker.php";
			echo "href='../../login/login.php?login=$href'";
				}
			?>
			>
  			  <?php
	if(isset($_SESSION['name'])){
		    include("../../conn/conn.php");
			$href1="../comment/snooker/snooker.php";
			$sqlstr="select *from user where name='".$_SESSION['name']."'";
			$result=mysqli_query($conn,$sqlstr);
			while($myrow=mysqli_fetch_array($result)){
			if($myrow['pic']){
				echo "<div>";
				echo "<img src='../../user/".$myrow['pic']."' width='30px' height='30px' style='position:absolute;top:10px;right:90px;border-radius:25px;'/>";
				echo "<a href='../../user/user_center.php' style='position:absolute;top:14px;right:45px;font-weight:bolder'>".$myrow['username']."</a>";
				echo "<a href='../../login/logout.php?login=$href1' style='position:absolute;top:14px;font-weight:bolder'>注销</a>";
				echo "</div>";
			}
			else{
			echo "<div>";
			echo "<img src='../../images/icon.jpg' width='30px' height='30px' style='position:absolute;top:10px;right:70px;border-radius:25px;' class='img-responsive' onmousemove=this.title='用户图片未设置'>";	
	   		echo "<a href='../../user/user_center.php' style='position:absolute;top:14px;right:35px;font-weight:bolder'>".$myrow['username']."</a>";
			echo "<a href='../../login/logout.php?login=$href1' style='position:absolute;top:14px;font-weight:bolder'>注销</a>";
			echo "</div>";
				}
			  }
		}
		else{
			echo "<div onmousemove=this.title='请点击进行登录'>";
			echo "<img src='../../images/icon-user.png' width='30px' height='30px' style='position:absolute;top:10px;right:30px;' class='img-responsive' alt='无法显示'>";
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
          <div class="col-sm-12 col-md-12">
             <div class="panel panel-default" style="padding:7px;background-color:#CCC;">
               	<div class="glyphicon glyphicon-home"></div>
                 <em>></em>
                 <a href="snooker.php">台球版块</a>
             </div>
            <!--内容区-->
            <div class="panel box-shadow radius" style="margin-top:20px;">
            <!--第一评论区-->
			<div class="tab-category">
				<a href=""><strong>台球领域区</strong></a>
                <span class="pull-right" style="margin-top:13px;margin-right:20px">
                	<img src="../../images/hide.gif" id="imgsId"/>
                </span>
			</div>
            <ul style="margin-top:10px;" id="optt">
            	<li class="btn btn-primary active">全部</li>
                <li class="btn btn-default">赛事评论</li>
                <li class="btn btn-default">技术交流</li>
                <li class="btn btn-default">闲谈</li>
            </ul>
            <div class="table-responsive">
              <table class="table table-border table-hover">
             	<thead class="table-bordered">
                  <tr class="active">	
                    <td width="300px">标题</td>
                    <td width="200px">作者</td>
                    <td width="200px">回复</td>
					<td width="200px">查看</td>
                    <td>最后发表时间</td>
                  </tr>
                </thead>
                <tbody id="nr">
                </tbody>
              </table>
			<p id="nt" style="font-size:20px"></p>
            <div class="pull-right">
			<p id="xinxi" style="margin:-10px 5px 10px"></p>
            </div>
            </div><!--table responsive end-->
            <div class="panel panel-success">
				<div class="panel-heading">
					<span class="panel-title">发帖</span>
				</div> 
        		<form role="form" action="../../index/index_review.php" method="post">
				  <?php
					if(isset($_SESSION['name'])){
						echo "<div class='panel-body' id='post1'>";
						echo "所属版块：<select name='opt' onChange='op()'>";
						echo "<option>请选择版块</option>";
						echo "<option>赛事评论</option>";
						echo "<option>技术交流</option>";
						echo "<option>闲谈</option>";
						echo "</select>";
       		    		echo "标题：<input id='title' name='tit' placeholder='请输入标题(1-50个字符)'>";
						echo "</div>";
					}
					else{
						
					}
					?>
				<input type="text" name="rname" style="display:none" value="<?php include("../conn/conn.php");
			$sqlstr5="select username from user where name='".$_SESSION['name']."'";
			$result5=mysqli_query($conn,$sqlstr5); while($myrow5=mysqli_fetch_array($result5))echo "$myrow5[0]"?>">				
				<input type="text" name="asite" style="display:none" value="login.php?login=../comment/snooker.php">
				<input type="text" name="usite" style="display:none" value="snooker.php">				
				<input type="txet" name="ubelong" style="display:none" value="台球">
				<input type="text" name="uid" style="display:none" value="<?php include("../conn/conn.php");
			$sqlstr5="select id from user where name='".$_SESSION['name']."'";
			$result5=mysqli_query($conn,$sqlstr5); while($myrow5=mysqli_fetch_array($result5))echo "$myrow5[0]"?>">
				<div id="addBox" class="savetips" style="display:none"></div>
				<?php
				  if(isset($_SESSION['name'])){
					echo "<div class='form-group'>";
						echo "<textarea id='editor' name='txt' placeholder='输入内容' autofocus></textarea>";	 
//					    echo "<textarea class='form-control' rows='5' name='txt' id='searchvalue'></textarea>";
					echo "</div>";
					echo "<input type='submit' class='btn btn-primary' style='margin:10px;' name='sub' id='search' value='发布帖子'/>";
				  }
				  else{
					echo "<div class='form-group'>";
					echo "<textarea class='form-control' rows='5' name='txt' disabled placeholder='请先登陆'></textarea>";
					echo "</div>";
					echo "<input type='button' class='btn btn-primary' style='margin:0 10px 10px;' id='lg_user' value='登陆'/>";
				  }
				?>
				</form>
            </div><!--panel panel-success end-->
            </div><!--panel box-shadow radius内容区end-->
          </div>
        </div>
      </div>
<input type="text" id="key" class="non"/>
	<!--<script>
	function op(){
		var opts = document.getElementsByName("opt")[0].value;
		console.log(opts);
		}
	function opt(){
		var optss = document.getElementById("optt");
		var opt1 = optss.getElementsByTagName("li");
		console.log(opt1.length);
		for(var i=0;i<opt1.length;i++){
			opt1[i].onclick=function(){
				console.log(this.innerHTML);
				}
		}
	}
	var opt = document.getElementById("optt");
		var opts = opt.getElementsByTagName("li");
			for(var i=0;i<opts.length;i++){
			
					console.log(opts[i].innerHTML);

			}
	</script>-->
	<script>
		var opt = document.getElementById("optt");
		var opts = opt.getElementsByTagName("li");
		for(var i=0;i<opts.length;i++){
			opts[i].addEventListener("click",function(){
			cont=this.innerHTML;
				 },false)
			}
	   for(var j=0;j<opts.length;j++){
		   	opts[j].addEventListener("click",function(){
				for(var i=0;i<opts.length;i++){
					 opts[i].className="btn btn-default";
				}
				this.className="btn btn-primary active";
			},false)
	   }
	</script>
<script src="../basketball.js"></script>
<script src="../../js/jquery.min.js"></script>
<script type="text/javascript" src="../../js/scripts/jquery.min.js"></script>
<script type="text/javascript" src="../../js/scripts/module.js"></script>  
<script type="text/javascript" src="../../js/scripts/hotkeys.js"></script>  	
<script type="text/javascript" src="../../js/scripts/uploader.js"></script>  
<script type="text/javascript" src="../../js/scripts/simditor.js"></script>
<script>
var editor = new Simditor({  
   textarea: $('#editor')
});
</script>
<script>
var page = 1; //当前页 定义一个变量 当前页
Load(); //加载数据
LoadXinXi(); //加载分页信息
var opt = document.getElementById("optt");
var opts = opt.getElementsByTagName("li");
for(var i=0;i<opts.length;i++){
	 opts[i].addEventListener("click",function(){
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
 console.log(a);
 if(!a){
 $.ajax({
   url:"snookerchuli.php",
   data:{page:page,key:key},
   type:"POST",
   dataType:"JSON",
   success: function(data){
    var str = "";
    for(var k in data)
     {
   var num=Number(new Date(data[k].presentime))+5*60*1000;
//   alert("数据库时间："+num+"当前时间："+Number(new Date()));
//   console.log(num>Number(new Date()));
//		 console.log(num);
//		 console.log(Number(new Date()));
     if(num>Number(new Date())){
	  str +="<tr><td><a href='../information.php?title="+data[k].title+"&&mid="+data[k].mid+"&&belong="+data[k].classes+"'>["+data[k].belong+"]"+data[k].title+"</a>&nbsp;&nbsp;<span style='color:green;font-size:10px;'>NEW</span></td><td>"+data[k].author+"</td><td>"+data[k].review+"</td><td>"+data[k].clicknum+"</td><td>"+data[k].datime+"</td></tr>"; 
	 }else{
	  str +="<tr><td><a href='../information.php?title="+data[k].title+"&&mid="+data[k].mid+"&&belong="+data[k].classes+"'>["+data[k].belong+"]"+data[k].title+"</a></td><td>"+data[k].author+"</td><td>"+data[k].review+"</td><td>"+data[k].clicknum+"</td><td>"+data[k].datime+"</td></tr>"; 
	 }
     }
   	   if(str==""){
		    $("#nr").html("");
		    $("#nt").html("当前无任何数据");//把数据返回表格
	   }else{
		    $("#nt").html("")
		    $("#nr").html(str);//把数据返回表格
	   }
    }
  });
 }
else if(a=="全部"){
	 $.ajax({
   url:"snookerchuli.php",
   data:{page:page,key:key},
   type:"POST",
   dataType:"JSON",
   success: function(data){
    var str = "";
     for(var k in data)
     {
   var num=Number(new Date(data[k].presentime))+5*60*1000;
//   alert("数据库时间："+num+"当前时间："+Number(new Date()));
//   console.log(num>Number(new Date()));
//		 console.log(num);
//		 console.log(Number(new Date()));
     if(num>Number(new Date())){
	  str +="<tr><td><a href='../information.php?title="+data[k].title+"&&mid="+data[k].mid+"&&belong="+data[k].classes+"'>["+data[k].belong+"]"+data[k].title+"</a>&nbsp;&nbsp;<span style='color:green;font-size:10px;'>NEW</span></td><td>"+data[k].author+"</td><td>"+data[k].review+"</td><td>"+data[k].clicknum+"</td><td>"+data[k].datime+"</td></tr>"; 
	 }else{
	  str +="<tr><td><a href='../information.php?title="+data[k].title+"&&mid="+data[k].mid+"&&belong="+data[k].classes+"'>["+data[k].belong+"]"+data[k].title+"</a></td><td>"+data[k].author+"</td><td>"+data[k].review+"</td><td>"+data[k].clicknum+"</td><td>"+data[k].datime+"</td></tr>"; 
	 }
     }
    if(str==""){
		    $("#nr").html("");
		    $("#nt").html("当前无任何数据");//把数据返回表格
	   }else{
		    $("#nt").html("")
		    $("#nr").html(str);//把数据返回表格
	   }
    }
  });	
	}
else{
   $.ajax({
   url:"snookerchuli.php",
   data:{page:page,key:a},
   type:"POST",
   dataType:"JSON",
   success: function(data){
    var str = "";
     for(var k in data)
     {
   var num=Number(new Date(data[k].presentime))+5*60*1000;
//   alert("数据库时间："+num+"当前时间："+Number(new Date()));
//   console.log(num>Number(new Date()));
//		 console.log(num);
//		 console.log(Number(new Date()));
     if(num>Number(new Date())){
	  str +="<tr><td><a href='../information.php?title="+data[k].title+"&&mid="+data[k].mid+"&&belong="+data[k].classes+"'>["+data[k].belong+"]"+data[k].title+"</a>&nbsp;&nbsp;<span style='color:green;font-size:10px;'>NEW</span></td><td>"+data[k].author+"</td><td>"+data[k].review+"</td><td>"+data[k].clicknum+"</td><td>"+data[k].datime+"</td></tr>"; 
	 }else{
	  str +="<tr><td><a href='../information.php?title="+data[k].title+"&&mid="+data[k].mid+"&&belong="+data[k].classes+"'>["+data[k].belong+"]"+data[k].title+"</a></td><td>"+data[k].author+"</td><td>"+data[k].review+"</td><td>"+data[k].clicknum+"</td><td>"+data[k].datime+"</td></tr>"; 
	 }
     }
	   if(str==""){
		    $("#nr").html("");
		    $("#nt").html("当前无任何数据");//把数据返回表格
	   }else{
		    $("#nt").html("")
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
   url:"snookerzys.php",
   data:{key:key},
   type:"POST",
   dataType:"TEXT",
   success: function(d){
     maxys = d;
    }
  });
}
else if(b=="全部"){
	$.ajax({
   async:false,
   url:"snookerzys.php",
   data:{key:key},
   type:"POST",
   dataType:"TEXT",
   success: function(d){
     maxys = d;
    }
  });
}
else{
 $.ajax({
   async:false,
   url:"snookerzys.php",
   data:{key:b},
   type:"POST",
   dataType:"TEXT",
   success: function(d){
     maxys = d;
    }
  });
}
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
var logs = document.getElementById("lg_user");
logs.onclick=function(){
	window.location="../../login/login.php?login=../comment/snooker/snooker.php";
}
</script>
<script src="../../js/bootstrap.js"></script>
<script>
$(document).ready(function(){
    $('#addBox').text("输入内容不能为空");
    $('#search').click(function(){
		if($("#searchvalue").val()=="")
        {
         $('#addBox').show().delay(1000).fadeOut();
		 return false;
        }
		else{
			
		}
	});
    });	
</script>
</body>
</html>