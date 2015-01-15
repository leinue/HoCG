<?php
session_start();

if($_SESSION){
	header('location:operate.php');
}
?>
<!DOCTYPE html>
<html lang="zh-cn">
 	<head>
 		<title>HoCG - 管理员登录</title>
 		<link href="style/style.css" rel="stylesheet">
 		<meta http-equiv="Content-Type" content="text/html; charset=utf8" />
 	</head>
	<body>

		<div class="login">
			<div class="login-heading">管理员登录</div>
			<div class="login-form">
				<form action="access.php" method="POST">
					<input type="text" class="inputarea" placeholder="请输入管理员用户名" name="user" autofocus required />
					<input type="password" class="inputarea" placeholder="请输入管理员密码" name="pw" required />
					<input type="submit" class="sub" name="ver" value="登录" />
				</form>
			</div>
		</div>
	</body>
</html>