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
				<a href="">HoCG</a>
			</div>
			<ul class="menu-list">
				<li class="active" id="latest">Latest</li>
				<li class="normal" id="memories">Memories</li>
			</ul>
			<ul class="menu-list">
				<li class="normal" id="github">GitHub</li>
				<li class="normal" id="api">API Documents</li>
			</ul>
			<ul class="menu-list">
				<li class="normal" id="about">About</li>
				<li class="normal" id="contact">Contact</li>
			</ul>
		</div>
	
		<div class="main">
			<div class="content-panel">
				<div class="content-heading">
					<p class="heading-title">沿海的街</p>
					<p class="img-desc">This is my CG website</p>
				</div>

				<div class="content-detail">
					<p class="de-title">2015-1-13</p>
					<P class="de-desc">To create a default inline form, add the pure-form classname to any </p>
				</div>

				<div class="content-body-img">
					<img alt="hhh" src="http://i62.tinypic.com/21vi94.jpg" />
				</div>
				
				<div class="content-tags">
					<ul class="tags">
						<li>蛤蛤蛤</li>
						<li>江泽民</li>
						<li>江泽民</li>
						<li>江泽民</li>
						<li>江泽民</li>
						<li>江泽民</li>
						<li>江泽民</li>
						<li>江泽民</li>
						<li>江泽民</li>
						<li>江泽民</li>
						<li>江泽民</li>
					</ul>
				</div>
			</div>
		</div>
 
	<script type="text/javascript" src="http://ajax.microsoft.com/ajax/jquery/jquery-1.4.min.js"></script>
	<script type="text/javascript">
		$(document).ready(function(){

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

			$('li#about').click(function(){
				toggleMenu(this);
				$('.main').load('about.html');
			});

			$('li#contact').click(function(){
				toggleMenu(this);
				$('.main').load('contact.html');
			});


			//对左侧菜单的更换
			function toggleMenu(obj){
				//获得当前活跃菜单项的index
				var liIndex=$('li.active').index();
				$('li.active').removeClass('active');
				$('li:eq('+liIndex+')').addClass('normal');
				console.log($('li:eq('+liIndex+')'));

				$(obj).removeClass('normal');
				$(obj).addClass('active');	
			}


		});
	</script>
	</body>
</html>