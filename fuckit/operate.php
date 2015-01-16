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
			<div class="heading-logo"><a href="http://hocg.ivydom.com">HoCG</a></div>
			<div class="heading-menu">
				<ul>
					<li class="active" id="manager">CG管理</li>
					<li id="addnew">新增CG</li>
					<li id="alercg">修改CG</li>
					<li id="pwdmgr">密码管理</li>
				</ul>
			</div>
		</div>
		<div class="main"></div>
	<script type="text/javascript" src="http://ajax.microsoft.com/ajax/jquery/jquery-1.4.min.js"></script>
	<script type="text/javascript">
		$(document).ready(function(){
			$('.main').load('manager.form.php');

			//对左边菜单栏使用渐隐渐显动画效果
			$('.heading-menu li').css("opacity",'0.7');
			$('.heading').css("opacity",'0.8');

			$('li').hover(
				function(){
					$(this).stop().animate({opacity:1},'slow');
				},
				function(){
					$(this).stop().animate({opacity:0.5},'slow');
				}
			);

			//为heading添加动画效果
			$('.heading-logo,li').hover(
				function(){
					$(this).stop().animate({opacity:1},'slow');
				},
				function(){
					$(this).stop().animate({opacity:0.5},'slow');
				}
			);

			$('.heading-menu li').click(function(){
				var currentitem=toggleMenu(this);
				switch(currentitem){
					case 0:
						$('.main').load('manager.form.php');
						break;
					case 1:
						$('.main').load('addcg.form.php');
						break;
					case 3:
						$('.main').load('pw.form.php');
						break;
					case 2:
						$('.main').load('altercg.form.php');
						break;
				}
			});

			//对左侧菜单的更换
			function toggleMenu(obj){
				//获得当前活跃菜单项的index
				var liIndex=$(obj).index();
				//取消当前活跃菜单项的活跃
				$('.heading-menu li.active').removeClass('active');

				//置当前点击的菜单项为活跃
				$(obj).addClass('active');
				return liIndex;
			}
		});
	</script>
	</body>
</html>