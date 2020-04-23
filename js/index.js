// JavaScript Document
var xmlHttp;
function del(){
	//如果在internet Explorer下运行
	if(window.ActiveXObject){
		try{
			xmlHttp=new ActiveXObject("Microsoft.XMLHTTP");
		}catch(e){
			xmlHttp=false;
		}
	}else{
	//如果在Mozilla或其他的浏览器下运行
		try{
			xmlHttp=new XMLHttpRequest();
		}catch(e){
			xmlHttp=false;
		}
	}
	 //返回创建的对象或显示错误信息
	if(!xmlHttp)
		alert("返回创建的对象或显示错误信息");
		else
		return xmlHttp;
}
function showsimple(id){
	  var question = confirm("确定删除吗？");
	  if(question !="0"){
		del();
		xmlHttp.onreadystatechange=StatHandler;	//判断URL调用的状态值并处理
		xmlHttp.open("GET",'del.php?id='+id,true);
		xmlHttp.send(null);	
	  }
	else{
		return;
	}
}
function StatHandler(){
	if(xmlHttp.readyState==4 && xmlHttp.status==200){
		var msg = xmlHttp.responseText;
		if(msg==1){
			alert("删除成功!");
			window.location.reload(true);	
			}
			else{
			alert("删除失败!");
			return false;
				}
	}
		xml.send(null);
}