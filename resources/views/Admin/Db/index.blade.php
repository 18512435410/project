<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
	<style>
		a{text-decoration:none;}
		ul{list-style:none;}
		#page li{float:left;width:20px;height:20px;border:1px solid #ddd;background:black;line-height:20px;text-align:center;box-shadow:3px 3px 3px grey;}
		#page li a{color:#fff;}
		#page .disabled{background:grey;}
		#page .active{color:orange;}
	</style>
</head>
<body>

	<table width="800" border='1'>
		<tr>
			<td>序号</td>
			<td>姓名</td>
			<td>爱好</td>
			<td>操作</td>
		</tr>
		@foreach($row as $v)
		<tr>
			<td>{{$v->id}}</td>
			<td>{{$v->name}}</td>
			<td>{{$v->hobby}}</td>
			<td>删除</td>
		</tr>
		@endforeach
	</table>
	<div id='page'>
	{{$row->appends($request)->render()}}
	</div>	
</body>
</html>