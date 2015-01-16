			<div class="memo-panel">
				<div class="memo-heading">
					<div class="memo-top">Memories - 在这里保存着我画过的画,记忆弥足珍贵</div>
					<span class="m-h-t">历史记录</span>
					<div class="line-box"></div>
				</div>
				<div class="memo-content">
					<div class="memo-box">
						<div class="memo-left">
							<div class="memo-left-img">
								<img src="http://i1.hdslb.com/u_f/68cbd9172144db3ae631796af997547a.jpg" alt="暂无图片数据" />
							</div>
						</div>
						<div class="memo-right">
							<div class="memo-right-head">
								<a href="">dsdssdsd</a>
							</div>
							<div class="memo-right-desc">
								dsdssdsddsasnasjkfnjkas
								<span class="memo-time">2015</span>
							</div>
							<div class="memo-right-tags">
								ffddf sdsd fdfdds
							</div>
						</div>
					</div>
				</div>
			</div>
	<script type="text/javascript" src="http://ajax.microsoft.com/ajax/jquery/jquery-1.4.min.js"></script>
	<script type="text/javascript">
		$(document).ready(function(){
			$('.memo-top,.memo-right-head,.memo-time,.memo-right-desc,.memo-right-tags').css("opacity",'0.6');

    		var imgdiv=$(".memo-left-img img");

    		imgdiv.hover(function(){
    			imgdiv.animate({opacity:'0.5'},"slow");
    			imgdiv.animate({opacity:'0.9'},"slow");
    		});

    		$('.memo-top,.memo-right-head,.memo-time,.memo-right-desc,.memo-right-tags').hover(
				function(){
					$(this).stop().animate({opacity:1},'slow');
				},
				function(){
					$(this).stop().animate({opacity:0.7},'slow');
				}
			);

			

		});
	</script>