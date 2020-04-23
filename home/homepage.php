<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width,initial-scale=1.0" />
<link href="../css/bootstrap.css" rel="stylesheet" />
<link href="../css/common.css" rel="stylesheet" />
<style>
body{
	background:url(../images/body_bg.jpg) no-repeat;
	background-size:cover;
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
    left:calc(85% - 110px);
    color: #fff;
	}
</style>
<title>体育论坛</title>
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
       <a class="navbar-brand" href="homepage.php">体育论坛</a>
    </div>
 	<div class="collapse navbar-collapse" id="example-navbar-collapse">
    	<ul class="nav navbar-nav">
        	<li class="active"><a href="homepage.php">首页</a></li>
        	<li><a href="../comment/basketball/basketball.php">篮球</a></li>
            <li><a href="../comment/football/football.php">足球</a></li>
            <li><a href="../comment/table-tennis/table-tennis.php">乒乓球</a></li>
            <li><a href="../comment/badminton/badminton.php">羽毛球</a></li>
            <li><a href="../comment/volleyball/volleyball.php">排球</a></li>
            <li><a href="../comment/snooker/snooker.php">台球</a></li>
            <li><a href="../comment/baseball/baseball.php">棒球</a></li>
			<li><a href="search.php">搜索</a></li>
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
		$href="../home/homepage.php";
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
        	<div class="col-sm-9 col-md-9">
            <div id="imgs" data-interval="2000" data-ride="carousel" class="carousel slide"><!--如果在这里设置style="width",则会让整个div一直保持这个宽度，缩放比例时则不能正常缩放-->
				<div class="carousel-inner">
					<div class="item active">
						<img src="../images/1.jpg" style="width:923px;height:200px;">
					</div>
					<div class="item">
						<img src="../images/2.jpg" style="width:923px;height:200px;">
					</div>
					<div class="item">
						<img src="../images/3.jpg" style="width:923px;height:200px;">
					</div>
					<div class="item">
						<img src="../images/5.jpg" style="width:923px;height:200px;">
					</div>
					<ul class="carousel-indicators" style="margin-bottom:-10px">
						<li data-target="#imgs" data-slide-to="0" class="active"></li>
						<li data-target="#imgs" data-slide-to="1"></li>
						<li data-target="#imgs" data-slide-to="2"></li>
						<li data-target="#imgs" data-slide-to="3"></li>
					</ul>
				</div>
				<a href="#imgs" data-slide="prev" class="carousel-control left" style="padding-top:90px;"><</a>
				<a href="#imgs" data-slide="next" class="carousel-control right" style="padding-top:90px;">></a>
			</div><!--imgs end-->
                
             <!--内容区-->
            <div class="panel box-shadow radius" style="margin-top:20px;">
            <!--第一评论区-->
			<div class="tab-category">
				<a href=""><strong>第一评论区</strong></a>
                <span class="pull-right" style="margin-top:13px;margin-right:20px">
                	<img src="../images/hide.gif" id="imgsId"/>
                </span>
			</div>
            	<div id="tab-category">
                  <table cellpadding="0" cellspacing="0">
                    <tbody>
                      <tr>
                        <td>
                         <div class="todaynew">
                         <span><?php include("../conn/conn.php");$today=strtotime(date("Y-m-d"),time());$usertime=date("Y-m-d H:i:s",$today);$end=$today+60*60*24;$usertime2=date("Y-m-d H:i:s",$end);
						 $sqlstr6="select count(*) from comment where presentime between '$usertime' and '$usertime2' and classes='篮球'";
						 $result6=mysqli_query($conn,$sqlstr6); while($myrow6=mysqli_fetch_array($result6))echo $myrow6[0];?></span>
                         <p>今日</p>
                         </div>
                         <div style="float:left;">
                         <h5>主题：<a href="../comment/basketball/basketball.php">篮球</a></h5>
                         <p>发表对篮球领域、文化的评论与技术交流</p>
                         <p>帖子数：<?php include("../conn/conn.php");
			$sqlstr6="select count(*) from comment where classes='篮球'";
			$result6=mysqli_query($conn,$sqlstr6); while($myrow6=mysqli_fetch_array($result6))echo "$myrow6[0]"?>，回复数：<?php include("../conn/conn.php");
			$sqlstr7="select count(*) from content where own!=1 and c_classes='篮球'";
			$result7=mysqli_query($conn,$sqlstr7); while($myrow7=mysqli_fetch_array($result7))echo "$myrow7[0]"?></p>
                         </div>
                        </td>
                      </tr>
                      <tr>
                        <td>
                         <div class="todaynew">
                         <span><?php include("../conn/conn.php");$today=strtotime(date("Y-m-d"),time());$usertime=date("Y-m-d H:i:s",$today);$end=$today+60*60*24;$usertime2=date("Y-m-d H:i:s",$end);
						 $sqlstr6="select count(*) from comment where presentime between '$usertime' and '$usertime2' and classes='足球'";
						 $result6=mysqli_query($conn,$sqlstr6); while($myrow6=mysqli_fetch_array($result6))echo $myrow6[0];?></span>
                         <p>今日</p>
                         </div>
                         <div style="float:left;">
						  <h5>主题：<a href="../comment/football/football.php">足球</a></h5>
                         <p>发表对足球领域、文化的评论与技术交流</p>
                         <p>帖子数：<?php include("../conn/conn.php");
			$sqlstr6="select count(*) from comment where classes='足球'";
			$result6=mysqli_query($conn,$sqlstr6); while($myrow6=mysqli_fetch_array($result6))echo "$myrow6[0]"?>，回复数：<?php include("../conn/conn.php");
			$sqlstr7="select count(*) from content where own!=1 and c_classes='足球'";
			$result7=mysqli_query($conn,$sqlstr7); while($myrow7=mysqli_fetch_array($result7))echo "$myrow7[0]"?></p>
                         </div>
                        </td>
                      </tr>
                      <tr>
                        <td>
                         <div class="todaynew">
                         <span><?php include("../conn/conn.php");$today=strtotime(date("Y-m-d"),time());$usertime=date("Y-m-d H:i:s",$today);$end=$today+60*60*24;$usertime2=date("Y-m-d H:i:s",$end);
						 $sqlstr6="select count(*) from comment where presentime between '$usertime' and '$usertime2' and classes='乒乓球'";
						 $result6=mysqli_query($conn,$sqlstr6); while($myrow6=mysqli_fetch_array($result6))echo $myrow6[0];?></span>
                         <p>今日</p>
                         </div>
                         <div style="float:left;">
						  <h5>主题：<a href="../comment/table-tennis/table-tennis.php">乒乓球</a></h5>
                         <p>发表对乒乓球领域、文化的评论与技术交流</p>
                         <p>帖子数：<?php include("../conn/conn.php");
			$sqlstr6="select count(*) from comment where classes='乒乓球'";
			$result6=mysqli_query($conn,$sqlstr6); while($myrow6=mysqli_fetch_array($result6))echo "$myrow6[0]"?>，回复数：<?php include("../conn/conn.php");
			$sqlstr7="select count(*) from content where own!=1 and c_classes='乒乓球'";
			$result7=mysqli_query($conn,$sqlstr7); while($myrow7=mysqli_fetch_array($result7))echo "$myrow7[0]"?></p>
                         </div>
                        </td>
                      </tr>
                    </tbody>
                  </table>
            	</div>
               </div><!--panel box-shadow radius内容区end-->
             
            <!--第二评论区-->
             <div class="panel box-shadow radius" style="margin-top:20px;">   
			<div class="tab-category">
				<a href=""><strong>第二评论区</strong></a>
                <span class="pull-right" style="margin-top:13px;margin-right:20px">
                	<img src="../images/hide.gif" id="imgId"/>
                </span>
			</div>
            	<div id="tab-category1">
                  <table cellpadding="0" cellspacing="0">
                    <tbody>
                      <tr>
                        <td>
                         <div class="todaynew">
                         <span><?php include("../conn/conn.php");$today=strtotime(date("Y-m-d"),time());$usertime=date("Y-m-d H:i:s",$today);$end=$today+60*60*24;$usertime2=date("Y-m-d H:i:s",$end);
						 $sqlstr6="select count(*) from comment where presentime between '$usertime' and '$usertime2' and classes='羽毛球'";
						 $result6=mysqli_query($conn,$sqlstr6); while($myrow6=mysqli_fetch_array($result6))echo $myrow6[0];?></span>
                         <p>今日</p>
                         </div>
                         <div style="float:left;">
                         <h5>主题：<a href="../comment/badminton/badminton.php">羽毛球</a></h5>
                         <p>发表对羽毛球领域、文化的评论与技术交流</p>
                         <p>帖子数：<?php include("../conn/conn.php");
			$sqlstr6="select count(*) from comment where classes='羽毛球'";
			$result6=mysqli_query($conn,$sqlstr6); while($myrow6=mysqli_fetch_array($result6))echo "$myrow6[0]"?>，回复数：<?php include("../conn/conn.php");
			$sqlstr7="select count(*) from content where own!=1 and c_classes='羽毛球'";
			$result7=mysqli_query($conn,$sqlstr7); while($myrow7=mysqli_fetch_array($result7))echo "$myrow7[0]"?></p>
                         </div>
                        </td>
                      </tr>
                      <tr>
                        <td>
                         <div class="todaynew">
                         <span><?php include("../conn/conn.php");$today=strtotime(date("Y-m-d"),time());$usertime=date("Y-m-d H:i:s",$today);$end=$today+60*60*24;$usertime2=date("Y-m-d H:i:s",$end);
						 $sqlstr6="select count(*) from comment where presentime between '$usertime' and '$usertime2' and classes='排球'";
						 $result6=mysqli_query($conn,$sqlstr6); while($myrow6=mysqli_fetch_array($result6))echo $myrow6[0];?></span>
                         <p>今日</p>
                         </div>
                         <div style="float:left;">
                         <h5>主题：<a href="../comment/volleyball/volleyball.php">排球</a></h5>
                         <p>发表对排球领域、文化的评论与技术交流</p>
                         <p>帖子数：<?php include("../conn/conn.php");
			$sqlstr6="select count(*) from comment where classes='排球'";
			$result6=mysqli_query($conn,$sqlstr6); while($myrow6=mysqli_fetch_array($result6))echo "$myrow6[0]"?>，回复数：<?php include("../conn/conn.php");
			$sqlstr7="select count(*) from content where own!=1 and c_classes='排球'";
			$result7=mysqli_query($conn,$sqlstr7); while($myrow7=mysqli_fetch_array($result7))echo "$myrow7[0]"?></p>
                         </div>
                        </td>
                      </tr>
                    </tbody>
                  </table>
            	</div>
            </div><!--panel box-shadow radius内容区end--> 
            
			<!--第三评论区-->
             <div class="panel box-shadow radius" style="margin-top:20px;">   
			<div class="tab-category">
				<a href=""><strong>第三评论区</strong></a>
                <span class="pull-right" style="margin-top:13px;margin-right:20px">
                	<img src="../images/hide.gif" id="imgsIds"/>
                </span>
			</div>
            	<div id="tab-category2">
                  <table cellpadding="0" cellspacing="0">
                    <tbody>
                      <tr>
                        <td>
                         <div class="todaynew">
                         <span><?php include("../conn/conn.php");$today=strtotime(date("Y-m-d"),time());$usertime=date("Y-m-d H:i:s",$today);$end=$today+60*60*24;$usertime2=date("Y-m-d H:i:s",$end);
						 $sqlstr6="select count(*) from comment where presentime between '$usertime' and '$usertime2' and classes='台球'";
						 $result6=mysqli_query($conn,$sqlstr6); while($myrow6=mysqli_fetch_array($result6))echo $myrow6[0];?></span>
                         <p>今日</p>
                         </div>
                         <div style="float:left;">
					     <h5>主题：<a href="../comment/snooker/snooker.php">台球</a></h5>
                         <p>发表对台球领域、文化的评论与技术交流</p>
                         <p>帖子数：<?php include("../conn/conn.php");
			$sqlstr6="select count(*) from comment where classes='台球'";
			$result6=mysqli_query($conn,$sqlstr6); while($myrow6=mysqli_fetch_array($result6))echo "$myrow6[0]"?>，回复数：<?php include("../conn/conn.php");
			$sqlstr7="select count(*) from content where own!=1 and c_classes='台球'";
			$result7=mysqli_query($conn,$sqlstr7); while($myrow7=mysqli_fetch_array($result7))echo "$myrow7[0]"?></p>
                         </div>
                        </td>
                      </tr>
                      <tr>
                        <td>
                         <div class="todaynew">
                         <span><?php include("../conn/conn.php");$today=strtotime(date("Y-m-d"),time());$usertime=date("Y-m-d H:i:s",$today);$end=$today+60*60*24;$usertime2=date("Y-m-d H:i:s",$end);
						 $sqlstr6="select count(*) from comment where presentime between '$usertime' and '$usertime2' and classes='棒球'";
						 $result6=mysqli_query($conn,$sqlstr6); while($myrow6=mysqli_fetch_array($result6))echo $myrow6[0];?></span>
                         <p>今日</p>
                         </div>
                         <div style="float:left;">
                         <h5>主题：<a href="../comment/baseball/baseball.php">棒球</a></h5>
                         <p>发表对棒球领域、文化的评论与技术交流</p>
                         <p>帖子数：<?php include("../conn/conn.php");
			$sqlstr6="select count(*) from comment where classes='棒球'";
			$result6=mysqli_query($conn,$sqlstr6); while($myrow6=mysqli_fetch_array($result6))echo "$myrow6[0]"?>，回复数：<?php include("../conn/conn.php");
			$sqlstr7="select count(*) from content where own!=1 and c_classes='棒球'";
			$result7=mysqli_query($conn,$sqlstr7); while($myrow7=mysqli_fetch_array($result7))echo "$myrow7[0]"?></p>
                         </div>
                        </td>
                      </tr>
                    </tbody>
                  </table>
            	</div>
            </div><!--panel box-shadow radius内容区end-->        
            </div><!--col-sm-9 col-md-9 end-->
            
            <div class="col-sm-3 col-md-3">
            <!--通告区-->
      		   <div class="panel panel-default">
                 	<div class="glyphicon glyphicon-volume-up" style="position:relative;top:9px;left:5px;"></div>
                      <div class="slideTxtBox">
                       <div class="bd">
                       <div class="tempWrap" style="overflow:hidden;position:relative;height:19px;top:-8px;margin-left:25px;">
                       		<ul style="top:0px; position:relative;padding:0px;margin:0px;">
							<?php
							include("../conn/conn.php");
							$sqlstr5="select *from advertisement";
							$result5=mysqli_query($conn,$sqlstr5);
							while($myrow5=mysqli_fetch_array($result5)){
							?>
                            <li style="height:19px;"><a href="javascript:void(0);"><?php echo $myrow5['adverttitle'];?></a></li>                          
							<?php
							}
							?>
                       </ul>
                       </div><!--tempWrap end-->
                     </div><!--bd end-->
                   </div><!--slideTxtBox end-->
               </div><!--panel panel-default end-->
          	
             <!--搜索框-->
              <div class="panel panel-default">
              <input class="form-control required" type="text" placeholder="输入搜索内容" id="searchvalue" style="width:80%;display:inline-block;"/>
			   <div id="addBox" class="savetips" style="display:none"></div>
               <button class="btn-primary" id="search">搜索</button>
              </div>
            
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
        
          
       <!--热门推荐区-->
      <div class="panel box-shadow radius">
            <div class="tab-category">
                <a href=""><strong>热门推荐</strong></a>
            </div>
            <div class="tab-category-item">
                <ul class="index_recd clickTop">
					<?php
						include("../conn/conn.php");
						$sql="select *from comment order by clicknum desc limit 0,7";
						$result1=mysqli_query($conn,$sql);
						while($myrow1=mysqli_fetch_array($result1)){
					?>
                        <li>
						<a href="../comment/information.php?title=<?php echo $myrow1['title']?>&&mid=<?php echo $myrow1['mid'];?>"><?php echo $myrow1['title'];?></a>
						<p class="hits"><i class="glyphicon glyphicon-thumbs-up"></i> <?php echo $myrow1['clicknum']+100 ?></p>
					    </li>           
					<?php
						}
					?>
                </ul>
            </div><!--tab-category-item-->
        </div><!--panel box-shadow radius-->
    </div><!--col-sm-3 col-md-3 end-->

  </div><!--row end-->
</div><!--container end-->
<!--底部内容-->
<div class="jumbotron text-center" style="margin-bottom:0;padding:10px;">
  <p>Copyright © 2019-2020 xiong</p>
  <p>该项目属于个人作品</p>
  <p>字体图标来源于<a href="https://glyphicons.com/">Glyphicons Halflings</a></p>
</div>
<script src="../js/jquery.min.js"></script>
<script src="../js/bootstrap.js"></script>
<script src="../js/jquery.SuperSlide.min.js"></script>
<script>
$(document).ready(function() {
    $("#imgsId").click(function(){
		$("#tab-category").toggle(500);
		if($("#imgsId").attr("src")=="../images/hide.gif"){
		$("#imgsId").attr("src","../images/show.gif");
		}else{
		$("#imgsId").attr("src","../images/hide.gif")	
		}
	});
});
$(document).ready(function() {
    $("#imgId").click(function(){
		$("#tab-category1").toggle(500);
		if($("#imgId").attr("src")=="../images/hide.gif"){
		$("#imgId").attr("src","../images/show.gif");
		}else{
		$("#imgId").attr("src","../images/hide.gif")	
		}
	});
});
$(document).ready(function() {
    $("#imgsIds").click(function(){
		$("#tab-category2").toggle(500);
		if($("#imgsIds").attr("src")=="../images/hide.gif"){
		$("#imgsIds").attr("src","../images/show.gif");
		}else{
		$("#imgsIds").attr("src","../images/hide.gif")	
		}
	});
});
$(document).ready(function(){
    $('#addBox').text("搜索内容为空");
    $('#search').click(function(){
		if($("#searchvalue").val()=="")
        {
         $('#addBox').show().delay(1000).fadeOut();
        }
		else{
		  var vs = $('#searchvalue').val();
		  window.location.href="search.php?keyword="+encodeURI(vs)+"";	
		}
	});
    });
jQuery(".slideTxtBox").slide({titCell: ".hd ul", mainCell: ".bd ul", autoPage: true, effect: "top", autoPlay: true});
</script>
</body>
</html>