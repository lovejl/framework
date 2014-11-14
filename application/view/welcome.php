<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="content-type" content="text/html; charset=utf-8">
<title>框架</title>
<style type="text/css">
table.gridtable {
	font-family: verdana,arial,sans-serif;
	font-size:18px;
	color:#333333;
	border-width: 1px;
	border-color: #666666;
	border-collapse: collapse;
	width:50%;
}
table.gridtable th {
	border-width: 1px;
	padding: 8px;
	border-style: solid;
	border-color: #666666;
	background-color: #dedede;
}
table.gridtable td {
	border-width: 1px;
	padding: 8px;
	border-style: solid;
	border-color: #666666;
	background-color: #ffffff;
}
</style>
</head>
<body>
<table class="gridtable" align="center">
<colgroup>
	<col width="20%">
	<col width="20%">
	<col width="40%">
	<col width="20%">
</colgroup>
<tr>
	<th>姓名</th>
	<th>头像</th>
	<th>内容</th>
	<th>时间</th>
</tr>
<?php foreach($data as $value):?>
<tr>
	<td><?php echo $value['name'];?></td>
	<td><img width="50px" src="<?php echo $value['pic'];?>"></td>
	<td><?php echo $value['content'];?></td>
	<td><?php echo date('Y-m-d H:i:s', $value['addTime']);?></td>
</tr>
<?php endforeach;?>
</table>
<div align="center" style="padding-top: 20px;">
<form action="http://<?php echo $_SERVER['SERVER_NAME'];?>/welcome/add" method="post">
姓名:<input name="name" value=""/><br/>
内容:<input name="content" value=""/><br/>
<input type="submit" value="添加">
</form>
</div>
</body>