<section>
	<h2><?php echo $productName; ?></h2>
	<h3><?php echo $productStatus; ?></h3>
	
	<!-- JQuery Tabs -->
	<script>
	  $(function() {
	    $( "#tabs" ).tabs();
	  });
	</script>
	  
	<div id="tabs">
		<ul>
			<li><a href="#overView">概述</a></li>
			<li><a href="#techParam">技术参数</a></li>
		</ul>
	
		<div id="overView">
			<table class="table table-striped" border="0">
				<tbody>
					<td>
						<img src="<?php echo site_url('../html/img/' . $imgName); ?>"></img>
					</td>
					<td>
						<p><?php echo $productDesc; ?></p>
					</td>
				</tbody>
			</table>
		</div>
		
		<div id="techParam">
			<table class="table table-striped" border="1">
				<thead>
					<tr>
						<th>参数名称</th>
						<th>参数数值</th>
					</tr>
				</thead>
				<tbody>
					<tr>
						<td>平均无故障时间（MTBF）</td>
						<td><?php echo $param_list->mtbf; ?></td>
					</tr>
					<tr>
						<td>额定电压（V）</td>
						<td><?php echo $param_list->voltage; ?></td>
					</tr>
					<tr>
						<td>额定输入电流（mA）</td>
						<td><?php echo $param_list->electricity; ?></td>
					</tr>
					<tr>
						<td>电气防护等级（IPxx）</td>
						<td><?php echo $param_list->ipxx; ?></td>
					</tr>
					<tr>
						<td>工作温度（摄氏度）</td>
						<td><?php echo $param_list->temperature; ?></td>
					</tr>
				</tbody>	
							
			</table>
		</div>
		
	</div>

</section>
