<?php
error_reporting(E_ALL ^ E_NOTICE);
require('/functions/manager.php');
require('/functions/functions.inc.php');

$cgp=test_input($_GET['p']);

if(strlen($cgp)!=0){
	$pdo=new PDO("mysql:dbname=$dbname;host=$host",$user,$password);
	$cgm=new CGManager($pdo);

	$result=$cgm->get($cgp);
	$time_=explode(" ",$result['publicTime'])[0];

}else{

}
?>
<!DOCTYPE html>
<html lang="zh-cn">
 	<head>
 		<title>HoCG Alpha</title>
 		<link href="style/style.css" rel="stylesheet">
 		<meta http-equiv="Content-Type" content="text/html; charset=utf8" />
 	</head>
	<body>
		<div class="content-panel">
			<div class="quota twothreeeeight">
				<input type="text" class="searchform" placeholder="请输入CG序列号" autofocus />
				<input type="button" class="btn" id="searchbtn" value="搜索">
			</div>
			<div class="content-heading">
				<p class="heading-title"><?php echo $result['title']; ?></p>
				<p class="img-desc"><?php echo $result['introduction']; ?></p>
			</div>
			<div class="content-detail">
				<P class="de-desc"><?php echo $result['description']; ?></p>
			</div>
			<div class="content-body-img">
				<?php
					$tagsAmount=explode(",",$result['imgsrc']);
					if(count($tagsAmount)>1){
						foreach ($tagsAmount as $key => $value) {
							echo "<img alt=\"赞无图片数据\" target=\"_blank\" src=\"".$value."\" />";
						}
					}else{
						echo "<img alt=\"赞无图片数据\" target=\"_blank\" src=\"".$result['imgsrc']."\" />";
					}
				?>
			</div>
			
			<div class="content-tags">
				<ul class="tags">
					<?php
						$tagsAmount=explode(",",$result['tags']);
						if(count($tagsAmount)>1){
							foreach ($tagsAmount as $key => $value) {
								echo "<li>".$value."</li>";
							}
						}else{
							echo "<li>".$result['tags']."</li>";
						}
					?>
				</ul>
			</div>	
		</div>
	<script type="text/javascript" src="http://ajax.microsoft.com/ajax/jquery/jquery-1.4.min.js"></script>
	<script type="text/javascript">
		$(document).ready(function(){
			$('.btn,.searchform').css("opacity",'0.5');

    		var imgdiv=$(".content-body-img img");

    		imgdiv.hover(function(){
    			imgdiv.animate({opacity:'0.5'},"slow");
    			imgdiv.animate({opacity:'0.9'},"slow");
    		});

    		$('.heading-title,.btn,.de-desc,.searchform,.img-desc,content-detail,.tags li').hover(
				function(){
					$(this).stop().animate({opacity:1},'slow');
				},
				function(){
					$(this).stop().animate({opacity:0.5},'slow');
				}
			);

			$('.searchbtn').click(function(){
				$.get(
					'/request/getcg.php',
					{p:alterp},
					function(data){
						var cgdata=JSON.parse(data);
						$('#title').attr('value',cgdata.title);
						$('#intro').text(cgdata.introduction);
						$('#desc').text(cgdata.description);
						$('#imgs').text(cgdata.imgsrc);
						$('#tags').text(cgdata.tags);
						$('#publictime').text(cgdata.publictime);
					}
				);
			});
		});
	</script>
	</body>
</html>