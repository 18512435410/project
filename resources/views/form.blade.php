<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
	<!--
		html代码 
		相对路径
			./  当前路径
			../ 上一级路径 
		绝对路径
			带协议 http:// file:// ftp:// 带盘符 C:/xx/xxx
			只能在服务器上生效   /  域名指定的哪一个目录 
			 在当前项目里面 域名绑定到了public目录下 
			 所以 / 代表了public目录
	-->
	<script src="/static/jquery-1.8.3.min.js"></script>
</head>
<body>
	<form action="/doform" method='post'>
		用户名: <input type="text" name="user"><br>
		密码: <input type="text" name="pass"><br>
		{{csrf_field()}} <!--只有post请求需要做csrf的防护-->
		<button>提交</button>
	</form>

	<button id='but'>点我我就发get</button>
	<button id='but2'>点我我就发post</button>
</body>
</html>
<script>
$('#but').click(function(){
	$.get('/ajax',{},function(data){
		alert(data);
	})
})


$('#but2').click(function(){
	$jg = $("[name='_token']").val();  //获得 token 里面的那个加密字符串

	//post发送ajax请求的时候 额外把_token 也发送过去 
	$.post('/ajaxp',{'_token':$jg,"name":'xy','age':18},function(data){
		alert(data);
	})
})
</script>