			<div class="memo-panel">
				<div class="memo-heading">
					<div class="memo-top">Memories - 在这里保存着我画过的画,记忆弥足珍贵</div>
					<span class="m-h-t">历史记录</span>
					<div class="line-box"></div>
					<div class="memo-top-box"></div>
				</div>
			</div>
	<script type="text/javascript" src="http://ajax.microsoft.com/ajax/jquery/jquery-1.4.min.js"></script>
	<script type="text/javascript">
		$(document).ready(function(){
			$('.memo-top').css("opacity",'0.4');

			

			$.get(
				'request/getallcg.php',
				{},
				function(data){
					var cgdata=JSON.parse(data);
					var htmlstr='';
					for (var i = cgdata.length - 1; i >= 0; i--) {
						htmlstr+='<div class="memo-content">';
						htmlstr+='	<div class="memo-box">';
						htmlstr+='		<div class="memo-left">';
						htmlstr+='			<div class="memo-left-img">';
						htmlstr+='				<img src="'+cgdata[i].imgsrc+'" alt="暂无图片数据" />';
						htmlstr+='			</div>';
						htmlstr+='		</div>';
						htmlstr+='		<div class="memo-right">';
						htmlstr+='			<div class="memo-right-head">';
						htmlstr+='				<a href="">'+cgdata[i].title+'</a>';
						htmlstr+='			</div>';
						htmlstr+='		<div class="memo-right-desc">'+cgdata[i].introduction;
						htmlstr+='			<span class="memo-time">'+cgdata[i].publicTime+'</span>';
						htmlstr+='		</div>';
						htmlstr+='		<div class="memo-right-tags">'+cgdata[i].tags;'</div>';
						htmlstr+='</div></div></div>';
					};
					$('.memo-top-box').html(htmlstr);
				}
			);

    		var imgdiv=$(".memo-left-img img");

    		$(".memo-left-img img").live('hover',function(){
    			console.log('saasas');
    			this.animate({opacity:'0.4'},"slow");
    			this.animate({opacity:'0.9'},"slow");
    		});

    		$('.memo-top,.memo-right-head,.memo-time,.memo-right-desc,.memo-right-tags').live('hover',function(){
				$(this).stop().animate({opacity:1},'slow');
				$(this).stop().animate({opacity:0.4},'slow');
    		});

		});
	</script>