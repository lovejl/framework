<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="content-type" content="text/html; charset=utf-8">
<title>框架DEMO</title>
<style type="text/css">
table.gridtable {
	font-size:15px;
	color:#333333;
	border-width: 1px;
	border-color: #666666;
	border-collapse: collapse;
	width:70%;
	border-style: solid;
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
<table class="gridtable">
<col width="12%">
<col width="15%">
<col width="20%">
<col width="25%">
<col width="28%">
<tr>
	<th>库名</th>
	<th>姓名</th>
	<th>头像</th>
	<th>内容</th>
	<th>时间</th>
</tr>
<tr>
  <td rowspan="<?php echo count($ote) + 1;?>">ote</td>
</tr>
<?php foreach($ote as $value):?>
<tr>
	<td><?php echo $value['name'];?></td>
	<td><img width="50px" src="<?php echo $value['pic'];?>"></td>
	<td><?php echo $value['content'];?></td>
	<td><?php if(!empty($value['addTime'])) echo date('Y-m-d H:i:s', $value['addTime']);?></td>
</tr>
<?php endforeach;?>
<tr>
  <td rowspan="<?php echo count($product) + 1;?>">product</td>
</tr>
<?php foreach($product as $value):?>
<tr>
	<td><?php echo $value['name'];?></td>
	<td><img width="20px" src="<?php echo $value['pic'];?>"></td>
	<td><?php echo $value['content'];?></td>
	<td><?php if(!empty($value['addTime'])) echo date('Y-m-d H:i:s', $value['addTime']);?></td>
</tr>
<?php endforeach;?>
</table>
<div style="margin: 20px;">
<form action="http://<?php echo $_SERVER['SERVER_NAME'];?>/welcome/add" method="post" enctype="multipart/form-data">
头像:<input name="pic" type="file" value=""/><br/>
姓名:<input name="name" value=""/><br/>
内容:<input name="content" value=""/><br/>
库名:<select name="model">
<option value="ote">ote</option>
<option value="product">product</option>
</select><br/>
<input type="submit" value="添加">
</form>
</div>
</body>