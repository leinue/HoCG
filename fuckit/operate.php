<?php
session_start();

if(!$_SESSION){
	header('location:index.php');
}
?>

<!DOCTYPE html>
<html lang="zh-cn">
 	<head>
 		<title>HoCG - 管理面板</title>
 		<link href="style/admin.css" rel="stylesheet">
 		<meta http-equiv="Content-Type" content="text/html; charset=utf8" />
 	</head>
	<body>
		<div class="heading">
			<div class="heading-logo"><a href="">HoCG</a></div>
			<div class="heading-menu">
				<ul>
					<li class="active">CG管理</li>
					<li>新增CG</li>
					<li>密码管理</li>
				</ul>
			</div>
		</div>
	</body>
</html>