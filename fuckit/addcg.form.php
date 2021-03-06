			<div class="inner">
				<div class="inner-heading">新增CG</div>
				<div class="new-cg">
					<input type="text" class="inputarea" placeholder="请输入CG名" id="title" autofocus required />
					<input type="text" class="inputarea" placeholder="请用一句话介绍此CG" id="intro" autofocus required />
					<textarea height="200" width="700" placeholder="请输入CG详细介绍" id="desc" autofocus required></textarea>
					<input type="text" class="inputarea imgsrc" placeholder="请输入CG图片地址(目前不支持图片上传功能),多张图片用英文状态下逗号分割" id="imgs" autofocus required />
					<input type="text" class="inputarea imgsrc" placeholder="请输入CG标签,用英文状态下的逗号分割" id="tags" autofocus required />
				</div>
				<div class="cg-submit">
					<button class="btn" id="submit-cg">提交</button>
				</div>
			</div>
			<script type="text/javascript">
			$(document).ready(function(){
				$('.btn,.inputarea,#desc').css("opacity",'0.5');
				$('.btn,.inputarea,#desc').hover(
					function(){
						$(this).stop().animate({opacity:1},'slow');
					},
					function(){
						$(this).stop().animate({opacity:0.5},'slow');
					}
				);
				$('#submit-cg').click(function(){
					var title=$('#title').val();
					var intro=$('#intro').val();
					var desc=$('#desc').val();
					var imgs=$('#imgs').val();
					var tags=$('#tags').val();
					$.get(
						'request/add.php',
						{
							title:title,
							intro:intro,
							desc:desc,
							imgsrc:imgs,
							tags:tags
						},
						function(data){
							$('.inner-heading').text('新增CG  - '+data);
						}
					);
				});
			});
			</script>