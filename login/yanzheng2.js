// JavaScript Document
var xmlHttp1;				//定义XMLHttpRequest对象
function createXmlHttpRequestObject1(){
	//如果在internet Explorer下运行
	if(window.ActiveXObject){
		try{
			xmlHttp1=new ActiveXObject("Microsoft.XMLHTTP");
		}catch(e){
			xmlHttp1=false;
		}
	}else{
	//如果在Mozilla或其他的浏览器下运行
		try{
			xmlHttp1=new XMLHttpRequest();
		}catch(e){
			xmlHttp1=false;
		}
	}
	 //返回创建的对象或显示错误信息
	if(!xmlHttp1)
		alert("返回创建的对象或显示错误信息");
		else
		return xmlHttp1;
}

function checkAnwser(){
	   var userid = document.getElementById("anwser");
       var useridValue = userid.value;
	   var useridname =document.getElementById("anwsername");
	   var useridText = useridname.value;
	   var span = document.getElementById("sp7");
	   if(useridValue == null || useridValue.trim().length == ""){
			span.style.color="red";
			span.innerHTML="密保回答不能为空";
	   }
	   else
	   {
	   	    createXmlHttpRequestObject1();
			 xmlHttp1.onreadystatechange = byphp;//接受返回值
			//这里是异步运行了，当js执行到这一句话后不会等待他的返回值，而是直接往下进行，我测试出来的效果是当你js代码执行完了这里的值才返回来。
	   	    xmlHttp1.open("GET","yanzheng2.php?id="+useridValue+"&&name="+useridText+"",false);//这个页面便是你要进行选择查询的PHP页面
	        xmlHttp1.send(null);
	}
}
	function byphp()
	{
	if(xmlHttp1.readyState==4 && xmlHttp1.status==200)//等于1是指还未获取返回值的意思
	{
		document.getElementById('sp7').innerHTML =xmlHttp1.responseText;
	}
	else
	{
		var byphp100 = "请等待";//接受PHP的返回值		
		document.getElementById('sp7').innerHTML = byphp100; //设置span里的内容
	}
	}