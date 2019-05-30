<section>
	<h2><?php echo $productName; ?></h2>
	<h5><?php echo $productStatus; ?></h5>
	
	<!-- JQuery Tabs -->
	<script>
	  $(function() {
	    $( "#tabs" ).tabs();
	  });
	</script>
	  
	<div id="tabs">
		<ul>
			<li><a href="#overView">Overview</a></li>
			<li><a href="#techParam">Technical Parameters</a></li>
		</ul>
	
		<div id="overView">
			<table class="table table-striped" border="0">
				<tbody>
					<td>
						<img src="<?php echo site_url('html/img/' . $imgName); ?>"></img>
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
						<th>Parameter Name</th>
						<th>Parameter Value</th>
					</tr>
				</thead>
				<tbody>
					<tr>
						<td>MTBF</td>
						<td><?php echo $param_list->mtbf; ?></td>
					</tr>
					<tr>
						<td>Voltage</td>
						<td><?php echo $param_list->voltage; ?></td>
					</tr>
					<tr>
						<td>Electricity</td>
						<td><?php echo $param_list->electricity; ?></td>
					</tr>
					<tr>
						<td>International Portection</td>
						<td><?php echo $param_list->ipxx; ?></td>
					</tr>
					<tr>
						<td>Temperature</td>
						<td><?php echo $param_list->temperature; ?></td>
					</tr>
				</tbody>	
							
			</table>
		</div>
		
	</div>

</section>
