<!DOCTYPE html>
<html lang="zh-cn">
 	<head>
 		<title>HoCG Alpha</title>
 		<link href="style/style.css" rel="stylesheet">
 		<meta http-equiv="Content-Type" content="text/html; charset=utf8" />
 		<meta name="Description" content="HOCG">
		<meta name="keywords" content="SAI,数位板,CG,ACG,动漫,美术,绘画" />
 	</head>
	<body>
		<div class="left-panel">
			<div class="panel-heading">
				<a id="latest" href="">HoCG</a>
			</div>
			<ul class="menu-list">
				<li class="active" id="latest">Latest</li>
				<li class="normal" id="memories">Memories</li>
			</ul>
			<ul class="menu-list">
				<li class="normal" id="github">GitHub</li>
				<li class="normal" id="api">Design</li>
			</ul>
			<ul class="menu-list">
				<li class="normal" id="about">About</li>
				<li class="normal" id="contact">Contact</li>
			</ul>
		</div>
	
		<div class="main">

		</div>
 
	<script type="text/javascript" src="http://ajax.microsoft.com/ajax/jquery/jquery-1.4.min.js"></script>
	<script type="text/javascript">
		$(document).ready(function(){
			$('.main').load('latest.php');

			//对左边菜单栏使用渐隐渐显动画效果
			$('li.normal').css("opacity",'0.5');

			$('li.normal').hover(
				function(){
					$(this).stop().animate({opacity:1},'slow');
				},
				function(){
					$(this).stop().animate({opacity:0.3},'slow');
				}
			);

			//为heading添加动画效果
			$('.panel-heading').hover(
				function(){
					$(this).stop().animate({opacity:1},'slow');
				},
				function(){
					$(this).stop().animate({opacity:0.5},'slow');
				}
			);

			/*菜单项的单击事件*/
			$('li#about').click(function(){
				toggleMenu(this);
				$('.main').load('about.html');
			});

			$('li#contact').click(function(){
				toggleMenu(this);
				$('.main').load('contact.html');	
			});

			$('li#latest').click(function(){
				toggleMenu(this);
				$('.main').load('latest.php');
			});

			$('li#memories').click(function(){
				toggleMenu(this);
				$('.main').load('memories.php');
			});

			$('li#github').click(function(){
				toggleMenu(this);
				$('.main').load('github.html');
			});

			$('li#api').click(function(){
				toggleMenu(this);
				$('.main').load('api.html');
			});

			//对左侧菜单的更换
			function toggleMenu(obj){
				//获得当前活跃菜单项的index
				var liIndex=$('li.active').index();
				//取消当前活跃菜单项的活跃
				$('li.active').removeClass('active');
				$('li:eq('+liIndex+')').addClass('normal');

				//置当前点击的菜单项为活跃
				$(obj).removeClass('normal');
				$(obj).addClass('active');	
			}

		});
	</script>
	</body>
</html>