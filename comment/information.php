<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width,initial-scale=1.0" />
<link href="../css/bootstrap.css" rel="stylesheet" />
<link href="../css/common.css" rel="stylesheet" />
<link media="all" rel="stylesheet" type="text/css" href="../js/styles/simditor.css" /> 
<title>版块</title>
<style>
body{
	background:url(../images/body_bg.jpg) no-repeat;
	background-size:cover;
	}
.savetips,.savetips1,.savetips2{
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
    top:40%;
    left:calc(55% - 110px);
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
        	<li><a href="basketball/basketball.php">篮球</a></li>
            <li><a href="football/football.php">足球</a></li>
            <li><a href="table-tennis/table-tennis.php">乒乓球</a></li>
            <li><a href="badminton/badminton.php">羽毛球</a></li>
            <li><a href="volleyball/volleyball.php">排球</a></li>
            <li><a href="snooker/snooker.php">台球</a></li>
            <li><a href="baseball/baseball.php">棒球</a></li>
			<li><a href="../home/search.php">搜索</a></li>
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
			$title=$_GET['title'];
			$mid=$_GET['mid'];
			$belong=$_GET['belong'];
			echo "href='../login/login.php?login=../comment/information.php?title=".$title."%mid=".$mid."% belong=".$belong."'";
				}
			?>
			>
   			  <?php
	if(isset($_SESSION['name'])){
		    include("../conn/conn.php");
			$sqlstr="select *from user where name='".$_SESSION['name']."'";
			$title=$_GET['title'];
			$mid=$_GET['mid'];
			$belong=$_GET['belong'];
			$result=mysqli_query($conn,$sqlstr);
			while($myrow=mysqli_fetch_array($result)){
			if($myrow['pic']){
				echo "<div>";
				echo "<img src='../user/".$myrow['pic']."' width='30px' height='30px' style='position:absolute;top:10px;right:90px;border-radius:25px;'/>";
				echo "<a href='../user/user_center.php' style='position:absolute;top:14px;right:45px;font-weight:bolder'>".$myrow['username']."</a>";
				echo "<a href='../login/logout.php?login=../comment/information.php?title=".$title."%mid=".$mid."% belong=".$belong."' style='position:absolute;top:14px;font-weight:bolder'>注销</a>";
				echo "</div>";
			}
			else{
			echo "<div>";
			echo "<img src='../images/icon.jpg' width='30px' height='30px' style='position:absolute;top:10px;right:70px;border-radius:25px;' class='img-responsive' onmousemove=this.title='用户图片未设置'>";	
	   		echo "<a href='../user/user_center.php' style='position:absolute;top:14px;right:35px;font-weight:bolder'>".$myrow['username']."</a>";
			echo "<a href='../login/logout.php?login=../comment/information.php?title=".$title."%mid=".$mid."% belong=".$belong."' style='position:absolute;top:14px;font-weight:bolder'>注销</a>";
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
      <div class="container-fluid">
      	<div class="row">
		  <div class="col-sm-2 col-md-2">
<!--
		  <div class="panel box-shadow radius">第一评论区			
         </div>panel box-shadow radius内容区end
-->
		  </div>
          <div class="col-sm-8 col-md-8">
             <div class="panel panel-default" style="padding:7px;background-color:#CCC;">
               	<div class="glyphicon glyphicon-home"></div>
                 <em>></em>
				   <?php
					include("../conn/conn.php");
					$belong=$_GET['belong'];
				    echo "<a href='basketball.php'>".$belong."版块</a>";
				 ?>
				 <em>></em>
				   <?php
					include("../conn/conn.php");
					$title=$_GET['title'];
				 	$mid=$_GET['mid'];
				 	$sql="update comment set clicknum=clicknum+1 where mid='".$mid."'";
				    $result3=mysqli_query($conn,$sql);
				    echo "<a>$title</a>"
				 ?>			
             </div>
            <!--内容区-->
            <div class="panel box-shadow radius" style="margin-top:20px;padding:0 5px">
            <!--第一评论区-->
			<div class="tab-category" style="padding-bottom:5px">
				<a href=""><strong>评论区</strong></a>
                <span class="pull-right" style="margin-top:13px;margin-right:20px">
                	<img src="../images/hide.gif" id="imgsId"/>
                </span>
			</div>
			<div class="card">
              <div class="card-body">
				<div class="edit-avatar">
			     <div class="table-responsive">
                  <table class="table table-bordered">
                    <thead>
                      <tr>
                        <th style="text-align:center;width:200px;background-color:#EBF2F8"><?php include("../conn/conn.php");
				 $mid=$_GET['mid'];
			$sqlstr6="select * from comment where mid='".$mid."'";
			$result6=mysqli_query($conn,$sqlstr6); while($myrow6=mysqli_fetch_array($result6)) echo "查看：$myrow6[7]&nbsp;&nbsp;回复：$myrow6[6]"?></th>
                        <th id="tc"><?php include("../conn/conn.php");
				 $mid=$_GET['mid'];
			$sqlstr6="select * from comment where mid='".$mid."'";
			$result6=mysqli_query($conn,$sqlstr6); while($myrow6=mysqli_fetch_array($result6)) echo "$myrow6[3]"?>
			<?php
	if(isset($_SESSION['name'])){
		    include("../conn/conn.php");
			$sqlstr="select *from collect where c_user='".$_SESSION['name']."' and c_mid='".$mid."'";
			$result=mysqli_query($conn,$sqlstr);
			$myrow=mysqli_fetch_array($result);
			if($myrow[0]){
			if($myrow['c_own']==1){
				echo "<span style='float:right' id='incollect'>";
				echo "<i class='glyphicon glyphicon glyphicon-star'></i>";
				echo "已收藏</span>";
			}
			else{
			echo "<span style='float:right' id='uncollect'>";
			echo "<i class='glyphicon glyphicon glyphicon-star-empty'></i>";
			echo "收藏</span>";
				}			
			}else{
			echo "<span style='float:right' id='uncollect'>";
			echo "<i class='glyphicon glyphicon glyphicon-star-empty'></i>";
			echo "收藏</span>";			
			}
		}
		else{
			echo "<span style='float:right' onclick=alert('登陆后才能收藏！')>";
			echo "<i class='glyphicon glyphicon glyphicon-star-empty'></i>";
			echo "收藏</span>";
			}
	?>
					</th>
                     </tr>
                    </thead>
                    <tbody id="infortitle">
 				  <?php 
				    include("../conn/conn.php");
					$mid=$_GET['mid'];
				  	$pagesize=10;
					$sqlstr="select * from user inner join content on content.tid=user.id inner join comment on content.cid=comment.mid and comment.mid='".$mid."'";
					$total=mysqli_query($conn,$sqlstr);
				  	$totalNum=mysqli_num_rows($total);
				    $pagecount=ceil($totalNum/$pagesize);
				    $page=isset($_GET['page'])?$_GET['page']:1;
		  			$page<=$pagecount?$page:$page=$pagecount;
      				$f_pageNum=$pagesize*($page-1);
				    $sqlstr2=$sqlstr." limit ".$f_pageNum.",".$pagesize;
				    $result=mysqli_query($conn,$sqlstr2);
					while($myrow=mysqli_fetch_array($result)){
						if($myrow['own']!=2&&$myrow['own']!=3){													
				  ?>
			<tr>
			<td style='padding:10px 20px;background-color:#EBF2F8;color:#008b8b'>
			<?php echo $myrow['username']?><?php if($myrow['pic_status']==1){ echo "<img src=../user/".$myrow['pic_one']." width='20px' height='20px' title='举报勋章'/>";}?><br/>
			<img src='../user/<?php echo $myrow['pic']?>' width='130px' height='130px'/><br/>
			个人简介:<br/><?php echo $myrow['remark']?></td>
			<td>发表时间于<?php echo $myrow['datatime']?>
			<p style='border-bottom:1px dashed blue;'></p><br/>
			<div style='height:130px;margin-top:-20px'><?php echo $myrow['content']?></div>
			<div style='width:150px;position:relative;left:40%;top:-20px;'>
			<a href='javascript:void(0)' id="<?php echo $myrow['c_cid']?>" <?php if(isset($_SESSION['time'])){include("../conn/conn.php");$sqlstr10="select g_if from glike where g_user='".$_SESSION['name']."' and g_cid='".$myrow['c_cid']."'";$result10=mysqli_query($conn,$sqlstr10);$myrow10=mysqli_fetch_array($result10);if($myrow10[0]==1){echo "onclick=upnum(1,$myrow[c_cid],'$_SESSION[name]',1)";}else{
			echo "onclick=upnum(1,$myrow[c_cid],'$_SESSION[name]',0)";} }else echo "onclick=upnum(0,$myrow[c_cid],0,0)";?>>
			<?php if(isset($_SESSION['time'])){include("../conn/conn.php");
			$sqlstr10="select g_own from glike where g_user='".$_SESSION['name']."' and g_cid='".$myrow['c_cid']."'";
			$result10=mysqli_query($conn,$sqlstr10);$myrow10=mysqli_fetch_array($result10);
			if($myrow10[0]==2){
			echo "<i class='glyphicon glyphicon-thumbs-up' style='color:#00F9E6'>".$myrow['c_up']."赞</i>";
			}else echo "<i class='glyphicon glyphicon-thumbs-up'>".$myrow['c_up']."赞</i>";}else echo "<i class='glyphicon glyphicon-thumbs-up'>".$myrow['c_up']."赞</i>";?>
			</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			<a href='javascript:void(0)' id="<?php echo $myrow['c_cid']+100?>" onclick=downnum(<?php if(isset($_SESSION['time']))echo 1;else echo 0;?>,<?php echo $myrow['c_cid']?>,<?php if(isset($_SESSION['time'])){echo "'$_SESSION[name]'";}else echo 0;?>,<?php if(isset($_SESSION['time'])){include("../conn/conn.php");
			$sqlstr10="select g_own from glike where g_user='".$_SESSION['name']."' and g_cid='".$myrow['c_cid']."'";
			$result10=mysqli_query($conn,$sqlstr10);$myrow10=mysqli_fetch_array($result10);if($myrow10[0]){echo "$myrow10[0]";}else echo 0;}else echo 0;?>,<?php echo $myrow['c_cid']+100?>)>
			<?php if(isset($_SESSION['time'])){include("../conn/conn.php");
			$sqlstr10="select g_if from glike where g_user='".$_SESSION['name']."' and g_cid='".$myrow['c_cid']."'";
			$result10=mysqli_query($conn,$sqlstr10);$myrow10=mysqli_fetch_array($result10);
			if($myrow10[0]==1){
			echo "<i class='glyphicon glyphicon-thumbs-down' style='color:#00F9E6'></i>";
			}else echo "<i class='glyphicon glyphicon-thumbs-down'></i>";}else echo "<i class='glyphicon glyphicon-thumbs-down'></i>";?>
			</a>
			</div>
			<p style='border-bottom:1px dashed blue;'></p>
			<a href='javascript:void(0)' onclick=uport(<?php echo $myrow['c_cid']?>) style='float:left'>回复(<?php echo $myrow['c_all']?>)</a><a href='javascript:void(0)' onclick=userreport(<?php echo $myrow['username']?>,<?php if(isset($_SESSION['time']))echo 1;else echo 0;?>,<?php echo $myrow['c_cid']?>,<?php if(isset($_SESSION['time'])){include("../conn/conn.php");
			$sqlstr5="select username from user where name='".$_SESSION['name']."'";
			$result5=mysqli_query($conn,$sqlstr5); while($myrow5=mysqli_fetch_array($result5))echo "$myrow5[0]";}else echo 0;?>); style='float:right'>举报</a>
			</td>
			</tr>
					<?php
						}
					}
						?>
					</tbody>
				  </table>
					<div class="pull-right">
				 <?php
						$title=$_GET['title'];
						$mid=$_GET['mid'];
 						if($page){
						echo "<ul>";
						if($page==1){
						echo "<li id='next'><a href='?title=".$title."&&mid=".$mid."&&page=1'>&laquo;</a>&nbsp;&nbsp;</li>";	
						}else{
						echo "<li id='next'><a href='?title=".$title."&&mid=".$mid."&&page=".($page-1)."'>&laquo;</a>&nbsp;&nbsp;</li>";	
						}
						for($i=1;$i<=$pagecount;$i++){
							echo "<li class='dangqian' style='margin-right:5px;'><a href='?title=".$title."&&mid=".$mid."&&page=".$i."'>$i</a></li>";
						}
						if($page==$pagecount){
						echo "<li id='next'><a href='?title=".$title."&&mid=".$mid."&&page=".($pagecount)."'>&raquo;</a>&nbsp;</li>";
						}
						else{
						echo "<li id='prev'><a href='?title=".$title."&&mid=".$mid."&&page=".($page+1)."'>&raquo;</a>&nbsp;</li>";	
						}
					    echo "</ul>";
					 }
?>
          		 	</div>
				   </div>
				  </div>
				 </div>
				</div>
			<div class="card">
			     <div class="table-responsive">
                  <table class="table table-bordered">
                    <thead>
                      <tr>
						<td style="width:200px;line-height:30px;padding:0 30px;background-color:#EBF2F8">
						</td>
						<td>
						<div class="panel panel-success">	
							<div class="panel-heading">
								<span class="panel-title">回复</span>
							</div> 
							<div>
							</div> 
        					<form role="form" id="form" name="form" action="../index/index_report.php" method="post">
							<div id="addBox" class="savetips" style="display:none"></div>
							<div id="addBox1" class="savetips1" style="display:none"></div>
							<div id="addBox2" class="savetips2" style="display:none"></div>
							<div class="form-group">
								<input type="text" name="usite" style="display:none" value="<?php $belong=$_GET['belong']; echo $belong?>">							
								<input type="text" name="rname" style="display:none" value="<?php include("../conn/conn.php");
			$sqlstr5="select username from user where name='".$_SESSION['name']."'";
			$result5=mysqli_query($conn,$sqlstr5); while($myrow5=mysqli_fetch_array($result5))echo "$myrow5[0]"?>">
								<input type="text" name="rtext" style="display:none" value="<?php include("../conn/conn.php");
			$sqlstr5="select id from user where name='".$_SESSION['name']."'";
			$result5=mysqli_query($conn,$sqlstr5); while($myrow5=mysqli_fetch_array($result5))echo "$myrow5[0]"?>">
								<input type="text" name="rtxt" style="display:none" value="<?php include("../conn/conn.php"); $mid=$_GET['mid']; echo "$mid"?>">
								<input type="text" name="rbelong" style="display:none" value="<?php include("../conn/conn.php"); $belong=$_GET['belong']; echo "$belong"?>">
								<input type="text" name="rtitle" style="display:none" value="<?php include("../conn/conn.php"); $mid=$_GET['mid']; $sqlstr5="select title from comment where mid='".$mid."'";
			$result5=mysqli_query($conn,$sqlstr5); while($myrow5=mysqli_fetch_array($result5))echo "$myrow5[0]"?>">
								<?php 
								if(isset($_SESSION['name'])){
								  $sqlstr2="select * from user where name='".$_SESSION['name']."'";
								  $result2=mysqli_query($conn,$sqlstr2);
				  				  $myrow2=mysqli_fetch_array($result2);										
									 if($myrow2['status']==1){
										echo "<textarea id='editor' name='txt' placeholder='输入内容'></textarea>";	 
//					    echo "<textarea class='form-control' rows='5' name='txt' id='searchvalue'></textarea>";
										 
										echo "<input type='submit' class='btn btn-primary' style='margin:10px;' name='sub' id='search' value='发表回复'/>";									 
									 }else{
										echo "<textarea class='form-control' rows='5' name='txt' id='searchvalue' placeholder='用户封禁中' disabled></textarea>";
									    echo "<input type='button' class='btn btn-primary' style='margin:10px;' value='禁止' disabled/>";									 
									 }
								}else{
									echo "<textarea class='form-control' rows='5' name='txt' id='searchvalue' placeholder='请先登陆' disabled></textarea>";
									echo "<input type='button' class='btn btn-primary' style='margin:10px;' id='lg_user' value='登陆'/>";
								}
								?>								
							</div>									
							</form>
					    </div>
						</td>
                      </tr>
                    </thead>
				</table>
		</div>
</div>
            </div><!--panel box-shadow radius内容区end-->
          </div>
		   <div class="col-sm-2 col-md-2">
<!--
			 <div class="panel box-shadow radius">
            </div>panel box-shadow radius内容区end
-->
		  </div>
			  <!--举报-->
	 	<div class="modal fade" id="myModal3" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
					<div class="modal-dialog">
					<div class="modal-content">
					<div class="modal-header">
						<input type="button" class="close" data-dismiss="modal" aria-hidden="true" value="x">
					<form role="form" action="../index/index_inforeport.php" method="post">
					<h4 class="modal-title" id="myModalLabel3">
					您举报<input type="text" id="accountwd" name="wuser" style="width:50px;height:25px;border-radius:5px;text-align: center">的原因：
					</h4>
				</div>
				<div class="modal-body" style="margin-top:-30px;">
					<input type="text" name="reportbelong" style="display:none" value="<?php include("../conn/conn.php"); $belong=$_GET['belong']; echo "$belong"?>">
					<input type="text" class="form-control" id="accountremark" name="wid" style="display:none"><br/>
					<textarea class="form-control" id="accountWord" name="wtext" style="display:none"></textarea><br/>
					举报原因(至多选择三项):<br/><input type="checkbox" name="wresult" value="违法违规">违法违规<input type="checkbox" name="wresult" value="低俗">低俗<input type="checkbox" name="wresult" value="色情">色情<input type="checkbox" name="wresult" value="人身攻击">人身攻击<input type="checkbox" name="wresult" value="侵犯隐私">侵犯隐私<input type="checkbox" name="wresult" value="诈骗">诈骗<input type="checkbox" name="wresult" value="广告">广告<input type="checkbox" name="wresult" value="抢楼">抢楼<input type="checkbox" name="wresult" value="引战">引战<br/>
					<input type="text" id="wcontact" name="wcontact" style="display:none">
					<input type="text" name="wtitle" value="<?php
					include("../conn/conn.php");
					$title=$_GET['title']; echo $title?>" style="display:none">
					<input type="text" class="form-control" id="accountmail" name="wsuser" style="display:none"><br/>
				</div>
				<div class="modal-footer">
					<input type="submit" class="btn btn-primary" name="sub" value="提交"/>
					<input type="button" class="btn btn-default" data-dismiss="modal" value="关闭">
				</div>
			    </form>
				</div>
				</div>
			</div>
			<!--二级评论2-->
			<div class="modal fade" id="myModal5" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
					<div class="modal-dialog">
					<div class="modal-content">
					<div class="modal-header">
						<input type="button" class="close" data-dismiss="modal" aria-hidden="true" value="x">
						<table id="second_review">
						</table>
				</div>
				</div>
			</div>
        </div>
      </div>
<script src="basketball.js"></script>
<script src="../js/jquery.min.js"></script>
<script src="../js/bootstrap.js"></script>
<script type="text/javascript" src="../js/scripts/module.js"></script>  
<script type="text/javascript" src="../js/scripts/hotkeys.js"></script>  	
<script type="text/javascript" src="../js/scripts/uploader.js"></script>  
<script type="text/javascript" src="../js/scripts/simditor.js"></script>
<script>
var editor = new Simditor({  
   textarea: $('#editor')
});
</script>
<script>
function uport(id){
	page1 = 1; //当前页 定义一个变量 当前页
	Load(id); //加载数据
	LoadXinXi(id); //加载分页信息
}
function Load(id){
		$.ajax({
			url:"uport.php",
			data:{page1:page1,key:id},
			type:"POST",
			dataType:"JSON",
			success:function(data){
				var str = "";
				str +="<tr style='display:block;margin:20px 0 5px 0;border-bottom:1px solid gray;width:530px'><td colspan='3'><img src='../user/"+data[0].pic+"' width='35px' height='35px' style='margin:-50px 0px 6px 0px;border-radius:25px;'/></td><td>&nbsp;<span style='margin-top:10px;'>"+data[0].s_datatime+"</span><br/>&nbsp"+data[0].s_reuser+"：<div style='margin-left:5px'>"+data[0].s_content+"</div><div style='margin-left:5px'><a href='javascript:void(0)' id="+data[0].s_ccid+" onclick=upnum(<?php if(isset($_SESSION['time']))echo 1;else echo 0;?>,"+data[0].s_ccid+",<?php if(isset($_SESSION['time'])){echo "'$_SESSION[name]'";}else echo 0;?>,<?php if(isset($_SESSION['time'])){include("../conn/conn.php");$sqlstr10="select g_if from glike where g_user='".$_SESSION['name']."' and g_cid='".$myrow['c_cid']."'";$result10=mysqli_query($conn,$sqlstr10);$myrow10=mysqli_fetch_array($result10);if($myrow10[0]){echo "$myrow10[0]";}else echo 0;}else echo 0;?>)><i class='glyphicon glyphicon-thumbs-up'>("+data[0].s_cup+")赞</i></a>&nbsp;<a href='javascript:void(0)' id='<?php $mid=$_GET['mid'];$sqlstr="select * from user inner join content on content.tid=user.id inner join comment on content.cid=comment.mid and comment.mid='".$mid."'";
				$result=mysqli_query($conn,$sqlstr);$myrow=mysqli_fetch_array($result);echo $myrow['c_cid']+100?>' onclick=downnum(<?php if(isset($_SESSION['time']))echo 1;else echo 0;?>,<?php echo $myrow['c_cid']?>,<?php if(isset($_SESSION['time'])){echo "'$_SESSION[name]'";}else echo 0;?>,<?php if(isset($_SESSION['time'])){include("../conn/conn.php");
			$sqlstr10="select g_if from glike where g_user='".$_SESSION['name']."' and g_cid='".$myrow['c_cid']."'";
			$result10=mysqli_query($conn,$sqlstr10);$myrow10=mysqli_fetch_array($result10);if($myrow10[0]){echo "$myrow10[0]";}else echo 0;}else echo 0;?>,<?php echo $myrow['c_cid']+100?>)><i class='glyphicon glyphicon-thumbs-down'></i></a>&nbsp;<a href='javascript:void(0)' onclick=userport(<?php if(isset($_SESSION['time']))echo 1;else echo 0;?>,"+data[0].username+","+data[0].s_ccid+",<?php if(isset($_SESSION['time'])){include("../conn/conn.php");$sqlstr5="select username from user where name='".$_SESSION['name']."'";$result5=mysqli_query($conn,$sqlstr5); while($myrow5=mysqli_fetch_array($result5))echo "$myrow5[0]";}else echo 0;?>,"+data[0].s_scid+")>回复</a>&nbsp;<a href='javascript:void(0)' onclick=userreport(<?php echo $myrow['username']?>,<?php if(isset($_SESSION['time']))echo 1;else echo 0;?>,<?php echo $myrow['c_cid']?>,<?php if(isset($_SESSION['time'])){include("../conn/conn.php");
			$sqlstr5="select username from user where name='".$_SESSION['name']."'";
			$result5=mysqli_query($conn,$sqlstr5); while($myrow5=mysqli_fetch_array($result5))echo "$myrow5[0]";}else echo 0;?>)>举报</a></div><form role='form' action='../index/index_secondcontent.php' method='post'><input type='text' name='rtext' style='display:none' value='<?php if(isset($_SESSION['time'])){ include("../conn/conn.php");$sqlstr5="select id from user where name='".$_SESSION['name']."'";$result5=mysqli_query($conn,$sqlstr5); while($myrow5=mysqli_fetch_array($result5))echo "$myrow5[0]";}else echo 0;?>'><input type='text' name='rtxt' style='display:none' value='<?php if(isset($_SESSION['time'])){include("../conn/conn.php"); $mid=$_GET['mid']; echo "$mid";}else echo 0;?>'><input type='text' name='rtitle' style='display:none' value='<?php if(isset($_SESSION['time'])){include("../conn/conn.php"); $mid=$_GET['mid']; $sqlstr5="select title from comment where mid='".$mid."'";$result5=mysqli_query($conn,$sqlstr5); while($myrow5=mysqli_fetch_array($result5))echo "$myrow5[0]";}else echo 0;?>'><input type='text' name='cuser' id='cuser"+data[0].s_scid+"' style='display: none'><input type='text' name='csecondtxt' value='"+data[0].s_content+"' style='display:none'><input type='text' name='ssite' style='display:none' value='<?php $belong=$_GET['belong']; echo $belong?>'><input type='text' name='cid' id='cid"+data[0].s_scid+"' style='display: none'><input type='text' name='cruser' id='cruser' value='<?php if(isset($_SESSION['time'])){ include("../conn/conn.php");$sqlstr5="select username from user where name='".$_SESSION['name']."'";$result5=mysqli_query($conn,$sqlstr5); while($myrow5=mysqli_fetch_array($result5))echo "$myrow5[0]";}else echo 0;?>' style='display: none'><textarea id='ctxt"+data[0].s_scid+"' name='ctxt' style='display:none'></textarea><input type='submit' class='btn btn-primary' name='sub' id='tsub"+data[0].s_scid+"' value='提交' style='display:none;margin:10px 0;'/></form></td></tr>";		
    		for(var k in data){	
				if(data[k].s_own==2){
				str +="<tr style='display:block;margin-bottom:5px;width:530px'><td colspan='3'><img src='../user/"+data[k].pic+"' width='35px' height='35px' style='margin:-50px 0px 6px 0px;border-radius:25px;'/></td><td>&nbsp;<span style='margin-top:10px;'>"+data[k].s_datatime+"</span><br/>&nbsp"+data[k].s_reuser+"：<div style='margin-left:5px'>"+data[k].s_content+"</div><div style='margin-left:5px'><a href='javascript:void(0)' id="+data[k].s_scid+"1000 onclick=upnum(<?php if(isset($_SESSION['time']))echo 1;else echo 0;?>,"+data[k].s_ccid+",<?php if(isset($_SESSION['time'])){echo "'$_SESSION[name]'";}else echo 0;?>,<?php if(isset($_SESSION['time'])){include("../conn/conn.php");$sqlstr10="select g_if from glike where g_user='".$_SESSION['name']."' and g_cid='".$myrow['c_cid']."'";$result10=mysqli_query($conn,$sqlstr10);$myrow10=mysqli_fetch_array($result10);if($myrow10[0]){echo "$myrow10[0]";}else echo 0;}else echo 0;?>)><i class='glyphicon glyphicon-thumbs-up'>("+data[k].s_cup+")赞</i></a>&nbsp;<a href='javascript:void(0)' id='<?php $mid=$_GET['mid'];$sqlstr="select * from user inner join content on content.tid=user.id inner join comment on content.cid=comment.mid and comment.mid='".$mid."'";
				$result=mysqli_query($conn,$sqlstr);$myrow=mysqli_fetch_array($result);echo $myrow['c_cid']+100?>' onclick=downnum(<?php if(isset($_SESSION['time']))echo 1;else echo 0;?>,<?php echo $myrow['c_cid']?>,<?php if(isset($_SESSION['time'])){echo "'$_SESSION[name]'";}else echo 0;?>,<?php if(isset($_SESSION['time'])){include("../conn/conn.php");
			$sqlstr10="select g_if from glike where g_user='".$_SESSION['name']."' and g_cid='".$myrow['c_cid']."'";
			$result10=mysqli_query($conn,$sqlstr10);$myrow10=mysqli_fetch_array($result10);if($myrow10[0]){echo "$myrow10[0]";}else echo 0;}else echo 0;?>,<?php echo $myrow['c_cid']+100?>)><i class='glyphicon glyphicon-thumbs-down'></i></a>&nbsp;<a href='javascript:void(0)' onclick=userport(<?php if(isset($_SESSION['time']))echo 1;else echo 0;?>,"+data[k].username+","+data[k].s_ccid+",<?php if(isset($_SESSION['time'])){include("../conn/conn.php");$sqlstr5="select username from user where name='".$_SESSION['name']."'";$result5=mysqli_query($conn,$sqlstr5); while($myrow5=mysqli_fetch_array($result5))echo "$myrow5[0]";}else echo 0;?>,"+data[k].s_scid+")>回复</a>&nbsp;<a href='javascript:void(0)' onclick=userreport(<?php echo $myrow['username']?>,<?php if(isset($_SESSION['time']))echo 1;else echo 0;?>,<?php echo $myrow['c_cid']?>,<?php if(isset($_SESSION['time'])){include("../conn/conn.php");
			$sqlstr5="select username from user where name='".$_SESSION['name']."'";
			$result5=mysqli_query($conn,$sqlstr5); while($myrow5=mysqli_fetch_array($result5))echo "$myrow5[0]";}else echo 0;?>)>举报</a></div><form role='form' action='../index/index_thirdcontent.php' method='post'><input type='text' name='rtext' style='display:none' value='<?php if(isset($_SESSION['time'])){include("../conn/conn.php");$sqlstr5="select id from user where name='".$_SESSION['name']."'";$result5=mysqli_query($conn,$sqlstr5); while($myrow5=mysqli_fetch_array($result5))echo "$myrow5[0]";}else echo 0;?>'><input type='text' name='rtxt' style='display:none' value='<?php include("../conn/conn.php"); $mid=$_GET['mid']; echo "$mid"?>'><input type='text' name='rtitle' style='display:none' value='<?php if(isset($_SESSION['time'])){include("../conn/conn.php"); $mid=$_GET['mid']; $sqlstr5="select title from comment where mid='".$mid."'";$result5=mysqli_query($conn,$sqlstr5); while($myrow5=mysqli_fetch_array($result5))echo "$myrow5[0]";}else echo 0;?>'><input type='text' name='cuser' id='cuser"+data[k].s_scid+"' style='display: none'><input type='text' name='ssite' style='display:none' value='<?php $belong=$_GET['belong']; echo $belong?>'><input type='text' name='csecondtxt' value='"+data[k].s_content+"' style='display:none'><input type='text' name='cid' id='cid"+data[k].s_scid+"' style='display: none'><input type='text' name='cruser' id='cruser' value='<?php if(isset($_SESSION['time'])){include("../conn/conn.php");$sqlstr5="select username from user where name='".$_SESSION['name']."'";$result5=mysqli_query($conn,$sqlstr5); while($myrow5=mysqli_fetch_array($result5))echo "$myrow5[0]";}else echo 0;?>' style='display: none'><textarea id='ctxt"+data[k].s_scid+"' name='ctxt' style='display:none'></textarea><input type='submit' class='btn btn-primary' name='sub1' id='tsub"+data[k].s_scid+"' value='提交' style='display:none;margin:10px 0;'/></form></td></tr>";			 
				}else if(data[k].s_own==3){
				str +="<tr style='display:block;margin-bottom:5px;width:530px'><td colspan='3'><img src='../user/"+data[k].pic+"' width='35px' height='35px' style='margin:-50px 0px 6px 0px;border-radius:25px;'/></td><td>&nbsp;<span style='margin-top:10px;'>"+data[k].s_datatime+"</span><br/>&nbsp"+data[k].s_reuser+"回复@"+data[k].s_ruser+"：<div style='margin-left:5px'>"+data[k].s_content+"</div><div style='margin-left:5px'><a href='javascript:void(0)' id="+data[k].s_scid+"1000 onclick=upnum(<?php if(isset($_SESSION['time']))echo 1;else echo 0;?>,"+data[k].s_ccid+",<?php if(isset($_SESSION['time'])){echo "'$_SESSION[name]'";}else echo 0;?>,<?php if(isset($_SESSION['time'])){include("../conn/conn.php");$sqlstr10="select g_if from glike where g_user='".$_SESSION['name']."' and g_cid='".$myrow['c_cid']."'";$result10=mysqli_query($conn,$sqlstr10);$myrow10=mysqli_fetch_array($result10);if($myrow10[0]){echo "$myrow10[0]";}else echo 0;}else echo 0;?>)><i class='glyphicon glyphicon-thumbs-up'>("+data[k].s_cup+")赞</i></a>&nbsp;<a href='javascript:void(0)' id='<?php $mid=$_GET['mid'];$sqlstr="select * from user inner join content on content.tid=user.id inner join comment on content.cid=comment.mid and comment.mid='".$mid."'";
				$result=mysqli_query($conn,$sqlstr);$myrow=mysqli_fetch_array($result);echo $myrow['c_cid']+100?>' onclick=downnum(<?php if(isset($_SESSION['time']))echo 1;else echo 0;?>,<?php echo $myrow['c_cid']?>,<?php if(isset($_SESSION['time'])){echo "'$_SESSION[name]'";}else echo 0;?>,<?php if(isset($_SESSION['time'])){include("../conn/conn.php");
			$sqlstr10="select g_if from glike where g_user='".$_SESSION['name']."' and g_cid='".$myrow['c_cid']."'";
			$result10=mysqli_query($conn,$sqlstr10);$myrow10=mysqli_fetch_array($result10);if($myrow10[0]){echo "$myrow10[0]";}else echo 0;}else echo 0;?>,<?php echo $myrow['c_cid']+100?>)><i class='glyphicon glyphicon-thumbs-down'></i></a>&nbsp;<a href='javascript:void(0)' onclick=userport(<?php if(isset($_SESSION['time']))echo 1;else echo 0;?>,"+data[k].username+","+data[k].s_ccid+",<?php if(isset($_SESSION['time'])){include("../conn/conn.php");$sqlstr5="select username from user where name='".$_SESSION['name']."'";$result5=mysqli_query($conn,$sqlstr5); while($myrow5=mysqli_fetch_array($result5))echo "$myrow5[0]";}else echo 0;?>,"+data[k].s_scid+")>回复</a>&nbsp;<a href='javascript:void(0)' onclick=userreport(<?php echo $myrow['username']?>,<?php if(isset($_SESSION['time']))echo 1;else echo 0;?>,<?php echo $myrow['c_cid']?>,<?php if(isset($_SESSION['time'])){include("../conn/conn.php");
			$sqlstr5="select username from user where name='".$_SESSION['name']."'";
			$result5=mysqli_query($conn,$sqlstr5); while($myrow5=mysqli_fetch_array($result5))echo "$myrow5[0]";}else echo 0;?>)>举报</a></div><form role='form' action='../index/index_thirdcontent.php' method='post'><input type='text' name='rtext' style='display:none' value='<?php if(isset($_SESSION['time'])){include("../conn/conn.php");$sqlstr5="select id from user where name='".$_SESSION['name']."'";$result5=mysqli_query($conn,$sqlstr5); while($myrow5=mysqli_fetch_array($result5))echo "$myrow5[0]";}else echo 0;?>'><input type='text' name='rtxt' style='display:none' value='<?php include("../conn/conn.php"); $mid=$_GET['mid']; echo "$mid"?>'><input type='text' name='rtitle' style='display:none' value='<?php if(isset($_SESSION['time'])){include("../conn/conn.php"); $mid=$_GET['mid']; $sqlstr5="select title from comment where mid='".$mid."'";$result5=mysqli_query($conn,$sqlstr5); while($myrow5=mysqli_fetch_array($result5))echo "$myrow5[0]";}else echo 0;?>'><input type='text' name='cuser' id='cuser"+data[k].s_scid+"' style='display: none'><input type='text' name='ssite' style='display:none' value='<?php $belong=$_GET['belong']; echo $belong?>'><input type='text' name='csecondtxt' value='"+data[k].s_content+"' style='display:none'><input type='text' name='cid' id='cid"+data[k].s_scid+"' style='display: none'><input type='text' name='cruser' id='cruser' value='<?php if(isset($_SESSION['time'])){include("../conn/conn.php");$sqlstr5="select username from user where name='".$_SESSION['name']."'";$result5=mysqli_query($conn,$sqlstr5); while($myrow5=mysqli_fetch_array($result5))echo "$myrow5[0]";}else echo 0;?>' style='display: none'><textarea id='ctxt"+data[k].s_scid+"' name='ctxt' style='display:none'></textarea><input type='submit' class='btn btn-primary' name='sub1' id='tsub"+data[k].s_scid+"' value='提交' style='display:none;margin:10px 0;'/></form></td></tr>";			 
				}else{}
			}
				str+="<tr style='display:block;margin-bottom:5px;width:530px'><td><div class='pull-right'><p id='xinxi' style='margin:-10px 5px 10px'></p></div></td></tr>;"
				$("#second_review").html(str);//把数据返回表格
    			// 显示模态框
				$('#myModal5').modal('show');			
				},
				error:function(){
				alert("请求失败");
			}
		})	
}
function LoadXinXi(id)
{
 var str = "";
 var minys = 1;
 var maxys = 1;
 //查总页数
 $.ajax({
   async:false,
   url:"uportzys.php",
   data:{key:id},
   type:"POST",
   dataType:"TEXT",
   success: function(d){
     maxys = d;
    }
  });
 str += "<span id='prev'><</span>";
 for(var i=page1-10;i<page1+5;i++)
 {
  if(i>=minys && i<=maxys)
  {
   if(i==page1)
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
   page1 = page1-1;
   if(page1<1)
   {
    page1=1;
   }
   Load(id); //加载数据
   LoadXinXi(id); //加载分页信息
  })
 //给下一页加点击事件
 $("#next").click(function(){
   page1 = page1+1;
   if(page1>maxys)
   {
    page1=maxys;
   }
   Load(id); //加载数据
   LoadXinXi(id); //加载分页信息
  })
 //给中间的列表加事件
 $(".list").click(function(){
   page1 = parseInt($(this).attr("bs"));
   Load(id); //加载数据
   LoadXinXi(id); //加载分页信息
  })
}		
function upnum(gown,gid,gname,gtrue){
	if(gown==0){
		 alert("请先登录");
	}else{
		if(gtrue==1){
			var question = confirm("您确定取消赞吗？");
			 if(question !="0"){
		$.ajax({
			url:"cdelete.php",
			data:{key12:gid,key13:gname},
			type:"POST",
			dataType:"JSON",
			success: function(data){
			alert("已取消点赞");
			 $('#'+gid).html("<i class='glyphicon glyphicon-thumbs-up'>"+data.c_up+"赞</i>");
			},
			error:function(){
				alert("请求失败");
			}
		})				 
			 }
		}else{
		$.ajax({
			url:"cup.php",
			data:{key10:gid,key11:gname},
			type:"POST",
			dataType:"JSON",
			success: function(data){
			alert("点赞成功");
			 $('#'+gid).html("<i class='glyphicon glyphicon-thumbs-up' style='color:#00F9E6'>"+data.c_up+"赞</i>");
			},
			error:function(){
				alert("请求失败");
			}
		})				
		}	
	}
}
function downnum(gown,gid,gname,gtrue,gcontent){
	if(gown==0){
		 alert("请先登录");
	}else{
		if(gtrue==1){
			var question = confirm("您确定取消踩吗？");
			 if(question !="0"){
		$.ajax({
			url:"cdelete1.php",
			data:{key12:gid,key13:gname},
			type:"POST",
			dataType:"JSON",
			success: function(data){
			alert("已取消点踩");
			 $('#'+gcontent).html("<i class='glyphicon glyphicon-thumbs-down'></i>");
			},
			error:function(){
				alert("请求失败");
			}
		})				 
			 }
		}else{
		$.ajax({
			url:"cup1.php",
			data:{key10:gid,key11:gname},
			type:"POST",
			dataType:"JSON",
			success: function(data){
			alert("点踩成功");
			 $('#'+gcontent).html("<i class='glyphicon glyphicon-thumbs-down' style='color:#00F9E6'></i>");
			},
			error:function(){
				alert("请求失败");
			}
		})				
		}	
	}
}
function userport(num,uname,uid,username,usid){
	if(num==0){
		$(document).ready(function(){
    	$('#addBox1').text("无法回复，请先登陆");
         $('#addBox1').show().delay(1000).fadeOut();
		 return false;
    });
	}else{
		var txt1 = new Simditor({  
   		textarea: $('#ctxt'+usid)
		});
		$('#tsub'+usid).toggle();
		console.log('#tsub'+usid);
		$('#ctxt'+usid).attr("placeholder","@"+uname+":");
		$('#cuser'+usid).attr("value",uname);
		$('#cid'+usid).attr("value",uid);
      }
	}

function userreport(cont,num,content,username){
	if(num==0){
		$(document).ready(function(){
    	$('#addBox2').text("无法举报，请先登陆");
        $('#addBox2').show().delay(1000).fadeOut();
		return false;
    });
	}else{
		if(cont==username){
			 alert("你不能举报自己");
		}else{
		$.ajax({
			url:"creport.php",
			data:{key:cont,content:content},
			type:"POST",
			dataType:"JSON",
			success:showQuery,
			error:function(){
				alert("请求失败");
			}
		})
	}
}
}
function showQuery(data){
    $("#accountwd").val(data.username);
    $("#accountWord").val(data.content);
	$("#accountmail").val(<?php include("../conn/conn.php");
		if(isset($_SESSION['name']))
			$sqlstr5="select username from user where name='".$_SESSION['name']."'";
			$result5=mysqli_query($conn,$sqlstr5); while($myrow5=mysqli_fetch_array($result5))echo "$myrow5[0]"?>);
	$("#accountremark").val(data.cid);
    // 显示模态框
    $('#myModal3').modal('show');
}
	$("#myModal3").on('hidden.bs.modal',function(){
		var x= document.getElementsByName("wresult");
		for(var i=0;i<x.length;i++){
			x[i].checked=false;
		}
    })
</script>
<script>
 var checkboxStr=document.getElementsByName("wresult");
		var maxNums= 3;
       for(var i=0; i<checkboxStr.length; i++){  
		   checkboxStr[i].onclick=function(){
			    var _checkboxStr=document.getElementsByName("wresult");
			   	var checkcontact=document.getElementsByName("wcontact")
			    var cNums = 0;
			    var checkboxText= new Array();  
			   for(var j=0; j<_checkboxStr.length; j++){ 
			   if(_checkboxStr[j].checked){  
                //alert(checkboxStr[i].value+","+checkboxStr[i].nextSibling.nodeValue); 
				    cNums++;
                    checkboxText.push(_checkboxStr[j].value);  
			   }
		      
			   }
			   if(cNums>maxNums){
                    this.checked = false;
				    alert("选择已超过上限");
                   }
			   $("#wcontact").val(checkboxText);
			   }   
	   } 	
</script>
<script>
if(document.getElementById("uncollect")){
	var u_collect = document.getElementById("uncollect");
	u_collect.onclick=function(){
	$.ajax({
		url:"zys3.php",
		type:"POST",
		data:"key3=<?php $mid=$_GET['mid']; echo $mid?>&key4=<?php if(isset($_SESSION['name'])) echo $_SESSION['name']?>",
		dataType:"JSON",
		success: function(){
			alert("收藏成功");   
			window.location.reload(true);
   }
})
}
}		  
</script>
<script>
if(document.getElementById("incollect")){
	var i_collect = document.getElementById("incollect");
	i_collect.onclick=function(){
	$.ajax({
		url:"zys4.php",
		type:"POST",
		data:"key1=<?php $mid=$_GET['mid']; echo $mid?>&key2=<?php if(isset($_SESSION['name'])) echo $_SESSION['name']?>",
		dataType:"JSON",
		success: function(){
			alert("已取消收藏");
			window.location.reload(true);
   }
})
}
}
</script>
<script>
$(document).ready(function(){
    $('#addBox').text("输入内容不能为空");
    $('#search').click(function(){
		if($("#editor").val()=="")
        {
         $('#addBox').show().delay(1000).fadeOut();
		 return false;
        }
		else{
			
		}
	});
    });
<?php
	$title=$_GET['title'];
	$mid=$_GET['mid'];
	$belong=$_GET['belong'];													
	echo "var logs=document.getElementById('lg_user');";
	echo "logs.onclick=function(){
	window.location='../login/login.php?login=../comment/information.php?title=".$title."%mid=".$mid."% belong=".$belong."'
	};";
?>
</script>
</body>
</html>