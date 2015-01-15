			<div class="inner">
				<div class="inner-heading">CG数据管理</div>
				<div class="mgr-box">
					<table width="960">
						<tr>
							<th><li>选择</li></th>
    						<th><li>标题</li></th>
							<th><li>描述</li></th>
							<th><li>时间</li></th>
							<th><li>管理</li></th>
  						</tr>
  						
  						<?php
  							require('../functions/manager.php');
  							$pdo=new PDO("mysql:dbname=$dbname;host=$host",$user,$password);
							$cgm=new CGManager($pdo);

							$allCG=$cgm->getAll();
							if(!is_array($allCG)){
								echo '<tr class="mgr-content"><td><li><input type="checkbox"/></li></td>
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
								<button class="btn" id="del">删除</button>
								<button class="btn" id="update">修改</button>
								<button class="btn" id="watch">查看</button>
							</li></td></tr>';
								}
							}
  						?>
  						
					</table>
				</div>
			</div>