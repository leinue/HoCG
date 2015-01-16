<?php 
  							require('../functions/manager.php');
  							$pdo=new PDO("mysql:dbname=$dbname;host=$host",$user,$password);
							$cgm=new CGManager($pdo);
?>
			<div class="inner">
				<div class="inner-heading">CG数据管理 - 总数:<?php echo $cgm->getAmount(); ?></div>
				<div class="mgr-box">
					<table width="960">
						<tr>
							<th><li><input type="checkbox" id="selectall"/></li></th>
    						<th><li>标题</li></th>
							<th><li>描述</li></th>
							<th><li>时间</li></th>
							<th><li>管理</li></th>
  						</tr>
  						
  						<?php
							$allCG=$cgm->getAll();
							if(!is_array($allCG)){
								echo '<tr class="mgr-content"><td><li><input class="selectone" type="checkbox"/></li></td>
							<td><li>暂无数据</li></td>
							<td><li>暂无数据</li></td>
							<td><li>暂无数据</li></td>
							<td><li>暂无数据</li></td></tr>';
							}else{
								foreach ($allCG as $key => $value) {
									echo '<tr class="mgr-content"><td><li><input type="checkbox"/></li></td>
							<td><li>'.$value->getTitle().'</li></td>
							<td><li>'.$value->getIntroduction().'</li></td>
							<td><li>'.$value->getTime().'</li></td>
							<td><li>
								<button class="btn" value="'.$value->getID().'" id="del">删除</button>
								<button class="btn" value="'.$value->getID().'" id="update">修改</button>
								<button class="btn" value="'.$value->getID().'" id="watch">查看</button>
							</li></td></tr>';
								}
							}
  						?>
  						
					</table>
				</div>
				<div class="inner-footer">
					
				</div>
			</div>
	<script type="text/javascript">
		$(document).ready(function(){
			$('li').css("opacity",'0.4');

			$('li').hover(
				function(){
					$(this).stop().animate({opacity:1},'slow');
				},
				function(){
					$(this).stop().animate({opacity:0.4},'slow');
				}
			);

			$('.btn').click(function(){
				var currentID=$(this).attr('id');
				switch(currentID){
					case 'del':
						delCG(this);
						break;
					case 'update':
						updateCG(this);
						break;
					case 'watch':
						var viewrp=$(this).attr('value');
						viewCG('../view.php?p='+viewrp);
						break;
				}
			});

			function delCG(obj){
				var id=$(obj).val();
				$.get(
					'request/delete.php',
					{id:id},
					function(data){
						$(obj).parent().parent().parent().fadeOut();
						$('.inner-heading').text('CG数据管理  - '+data);
					}
				);
			}

			function updateCG(obj){
				sessionStorage['alterp']=$(obj).attr('value');
				//获得当前活跃菜单项的index
				var liIndex=$('.heading-menu li').index();
				//取消当前活跃菜单项的活跃
				$('.heading-menu li.active').removeClass('active');
				//置当前点击的菜单项为活跃
				$('.heading-menu li:eq(2)').addClass('active');
				$('.main').load('altercg.form.php');
			}

			function viewCG(url){window.location.href=url;}

		});
	</script>