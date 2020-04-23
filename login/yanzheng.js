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

function checkUserid(){
	   var userid = document.getElementById("username");
       var useridValue = userid.value;
	   var span = document.getElementById("sp");
	   if(useridValue == null || useridValue.trim().length == ""){
			span.style.color="red";
			span.innerHTML="账号不能为空";
	   }
	   else
	   {
		var reg=new RegExp("[\u4e00-\u9fa5a-zA-Z0-9\-]{4,16}");
		if(!reg.test(useridValue)){
		    span.style.color="red";
			span.innerHTML="账号不符合要求";
	   }
	     else
	   {
	   	    createXmlHttpRequestObject1();
			 xmlHttp1.onreadystatechange = byphp;//接受返回值
			//这里是异步运行了，当js执行到这一句话后不会等待他的返回值，而是直接往下进行，我测试出来的效果是当你js代码执行完了这里的值才返回来。
	   	    xmlHttp1.open("GET","yanzheng.php?id="+useridValue,false);//这个页面便是你要进行选择查询的PHP页面
	        xmlHttp1.send(null);
	   }
	}
}

function checkUserPwd(){
	   var userPwd = document.getElementById("password");
       var userPwdValue = userPwd.value;
	   var span1 = document.getElementById("sp1");
	   if(userPwdValue == null || userPwdValue.trim().length == ""){
			span1.style.color="red";
			span1.innerHTML="密码不能为空";
	   }
	   else
	   {
		var reg1=new RegExp("[\u4e00-\u9fa5a-zA-Z0-9\-]{6,16}");
		if(!reg1.test(userPwdValue)){
		    span1.style.color="red";
			span1.innerHTML="密码不符合要求";
	   }
	   else{
		    span1.style.color="green";
			span1.innerHTML="密码符合要求";
		   }
	}
}
function checkUserRePwd(){
	   var userRePwd = document.getElementById("password1");
       var userRePwdValue = userRePwd.value;
	   var userPwd = document.getElementById("password");
       var userPwdValue = userPwd.value;
	   var span5 = document.getElementById("sp5");
	   if(userRePwdValue == null || userRePwdValue.trim().length == ""){
			span5.style.color="red";
			span5.innerHTML="密码不能为空";
	   }
	   else
	   {
		if(userRePwdValue!=userPwdValue){
		    span5.style.color="red";
			span5.innerHTML="两次密码不相同";
	   }
	   else{
		    span5.style.color="green";
			span5.innerHTML="两次密码相同";
		   }
	}
}
function checkUserName(){
	   var userName = document.getElementById("userName");
       var userNameValue = userName.value;
	   var span2 = document.getElementById("sp2");
	   if(userNameValue == null || userNameValue.trim().length == ""){
			span2.style.color="red";
			span2.innerHTML="用户昵称不能为空";
	   }
	   else
	   {
		var reg2=new RegExp("[\u4e00-\u9fa5a-zA-Z0-9\-]{4,16}");
		if(!reg2.test(userNameValue)){
		    span2.style.color="red";
			span2.innerHTML="用户昵称不符合要求";
	   }
	   else{
		    span2.style.color="green";
			span2.innerHTML="用户名称符合要求";
		   // createXmlHttpRequestObject1();
//			xmlHttp1.onreadystatechange = byphp2;//接受返回值
//			//这里是异步运行了，当js执行到这一句话后不会等待他的返回值，而是直接往下进行，我测试出来的效果是当你js代码执行完了这里的值才返回来。
//	   	    xmlHttp1.open("GET","yanzheng.php?username="+userNameValue,false);//这个页面便是你要进行选择查询的PHP页面
//	        xmlHttp1.send(null);
		   }
	}
}
function checkEmail(){
	   var userEmail = document.getElementById("envelope");
       var userEmailValue = userEmail.value;
	   var span3 = document.getElementById("sp3");
	   if(userEmailValue == null || userEmailValue.trim().length == ""){
			span3.style.color="red";
			span3.innerHTML="邮箱不能为空";
	   }
	   else
	   {
		var reg3=new RegExp("[\u4e00-\u9fa5a-zA-Z0-9\-]{4,16}");
//		   var reg3=new RegExp("\w[-\w.+]*@([A-Za-z0-9][-A-Za-z0-9]+\.)+[A-Za-z]{2,14}");
		if(!reg3.test(userEmailValue)){
		    span3.style.color="red";
			span3.innerHTML="邮箱不符合要求";
	   }
	   else{
		    span3.style.color="green";
			span3.innerHTML="邮箱可以注册";
		   // createXmlHttpRequestObject1();
//			xmlHttp1.onreadystatechange = byphp2;//接受返回值
//			//这里是异步运行了，当js执行到这一句话后不会等待他的返回值，而是直接往下进行，我测试出来的效果是当你js代码执行完了这里的值才返回来。
//	   	    xmlHttp1.open("GET","yanzheng.php?username="+userNameValue,false);//这个页面便是你要进行选择查询的PHP页面
//	        xmlHttp1.send(null);
		   }
	}
}
function checkAnwser(){
	   var userAnwser = document.getElementById("anwser");
       var userAnwserValue = userAnwser.value;
	   var span7 = document.getElementById("sp7");
	   if(userAnwserValue == null || userAnwserValue.trim().length == ""){
			span7.style.color="red";
			span7.innerHTML="回答不能为空";
	   }
	   else
	   {
		var reg7=new RegExp("[\u4e00-\u9fa5a-zA-Z0-9\-]{2,16}");
		if(!reg7.test(userAnwserValue)){
		    span7.style.color="red";
			span7.innerHTML="回答不符合要求";
	   }
	   else{
		    span7.style.color="green";
			span7.innerHTML="回答符合";
		   // createXmlHttpRequestObject1();
//			xmlHttp1.onreadystatechange = byphp2;//接受返回值
//			//这里是异步运行了，当js执行到这一句话后不会等待他的返回值，而是直接往下进行，我测试出来的效果是当你js代码执行完了这里的值才返回来。
//	   	    xmlHttp1.open("GET","yanzheng.php?username="+userNameValue,false);//这个页面便是你要进行选择查询的PHP页面
//	        xmlHttp1.send(null);
		   }
	}
}
	function byphp()
	{
	if(xmlHttp1.readyState==4 && xmlHttp1.status==200)//等于1是指还未获取返回值的意思
	{
		document.getElementById('sp').innerHTML =xmlHttp1.responseText;
	}
	else
	{
		var byphp100 = "请等待";//接受PHP的返回值		
		document.getElementById('sp').innerHTML = byphp100; //设置span里的内容
	}
	}
//	function byphp2()
//	{
//	if(xmlHttp1.readyState==4 && xmlHttp1.status==200)//等于1是指还未获取返回值的意思
//	{
//		document.getElementById('spText2').innerHTML =xmlHttp1.responseText;
//	}
//	else
//	{
//		var byphp100 = "请等待";//接受PHP的返回值		
//		document.getElementById('spText2').innerHTML = byphp100; //设置span里的内容
//	}
//	}