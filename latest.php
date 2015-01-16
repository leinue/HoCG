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
				<?php
					$tagsAmount=explode(",",$data['imgsrc']);
					if(count($tagsAmount)>1){
						foreach ($tagsAmount as $key => $value) {
							echo "<img alt=\"赞无图片数据\" target=\"_blank\" src=\"".$value."\" />";
						}
					}else{
						echo "<img alt=\"赞无图片数据\" target=\"_blank\" src=\"".$data['imgsrc']."\" />";
					}
				?>
				</div>
				
				<div class="content-tags">
					<ul class="tags">
					<?php
						$tagsAmount=explode(",",$data['tags']);
						if(count($tagsAmount)>1){
							foreach ($tagsAmount as $key => $value) {
								echo "<li>".$value."</li>";
							}
						}else{
							echo "<li>".$data['tags']."</li>";
						}
					?>
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

    				$('.heading-title,.de-title,.de-desc,.img-desc,content-detail,.tags li').hover(
						function(){
							$(this).stop().animate({opacity:1.5},'slow');
						},
						function(){
							$(this).stop().animate({opacity:0.6},'slow');
						}
					);
				});
			</script> 