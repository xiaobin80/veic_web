<section>
	<h2>parameters</h2>
	<?php echo anchor('admin/product/parameters/add', '<span class="glyphicon glyphicon-plus"></span> Add a parameter'); ?>
	<table class="table table-striped">
		<thead>
			<tr>
				<th>Name</th>
				<th>MTBF(H)</th>
				<th>Voltage(V)</th>
				<th>Electricity(A)</th>
				<th>IPxx</th>
				<th>Temperature</th>
				<th>Edit</th>
				<th>Delete</th>
			</tr>
		</thead>
		<tbody>
			<?php if (count($parameters)): foreach ($parameters as $parameter): ?>
				<tr>
					<td><?php echo anchor($this->data['langName'] . 'admin/product/parameters/edit/' . $parameter->id, $parameter->name); ?></td>
					<td><?php echo $parameter->mtbf; ?></td>
					<td><?php echo $parameter->voltage; ?></td>
					<td><?php echo $parameter->electricity; ?></td>
					<td><?php echo $parameter->ipxx; ?></td>
					<td><?php echo $parameter->temperature; ?></td>
					<td><?php echo btn_edit($this->data['langName'] . 'admin/product/parameters/edit/' . $parameter->id); ?></td>
					<td><?php echo btn_delete($this->data['langName'] . 'admin/product/parameters/delete/' . $parameter->id); ?></td>
				</tr>
			<?php endforeach; ?>
			<?php else: ?>
				<tr>
					<td colspan="8">We could not find any parameters.</td>
				</tr>
			<?php endif; ?>
		</tbody>
	
	</table>
</section>
