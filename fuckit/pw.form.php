			<div class="inner">
				<div class="inner-heading">管理员密码管理</div>
				<div class="new-cg">
					<input type="password" class="inputarea" placeholder="请输入旧密码" id="old" autofocus required />
					<input type="password" class="inputarea" placeholder="请输入新密码" id="newpw" autofocus required />
				</div>
				<div class="cg-submit">
					<button class="btn" id="submit-cg">提交</button>
				</div>
			</div>
			<script type="text/javascript">
			$(document).ready(function(){
				$('.btn').hover(
					function(){
						$(this).stop().animate({opacity:1},'slow');
					},
					function(){
						$(this).stop().animate({opacity:0.5},'slow');
					}
				);
				$('#submit-cg').click(function(){
					var old=$('#old').val();
					var newpw=$('#newpw').val();
					$.get(
						'request/alterpw.php',
						{
							old:old,
							newpw:newpw
						},
						function(data){
							$('.inner-heading').text('管理员密码管理  - '+data);
						}
					);
				});
			});
			</script>