<?php
require('/functions/manager.php');
error_reporting(E_ALL ^ E_NOTICE);

$pdo=new PDO("mysql:dbname=$dbname;host=$host",$user,$password);
$cgm=new CGManager($pdo);

$data=$cgm->getLatest();

?>

			<div class="content-panel">
				<div class="content-heading">
					<p class="heading-title"><?php echo explode(" ", $data['publicTime'])[0]; ?></p>
					<p class="img-desc"><?php echo $data['introduction']; ?></p>
				</div>

				<div class="content-detail">
					<p class="de-title"><?php echo $data['title']; ?></p>
					<P class="de-desc"><?php echo $data['description']; ?></p>
				</div>

				<div class="content-body-img">
					<img alt="赞无图片数据" target="_blank" src="<?php echo $data['imgsrc']; ?>" />
				</div>
				
				<div class="content-tags">
					<ul class="tags">
						<li><?php echo $data['tags']; ?></li>
					</ul>
				</div>
			</div>

			<script src="/jquery/jquery-1.11.1.min.js"></script>
			<script> 
				$(document).ready(function(){
    				var imgdiv=$(".content-body-img img");

    				imgdiv.hover(function(){
    					imgdiv.animate({opacity:'0.5'},"slow");
    					imgdiv.animate({opacity:'0.9'},"slow");
    				});
    				
				});
			</script> 