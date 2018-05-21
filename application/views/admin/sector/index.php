<section>
	<h2>Sectors</h2>
	<?php echo anchor('admin/sector/edit', '<span class="glyphicon glyphicon-plus"></span> Add a sector'); ?>
	<table class="table table-striped">
		<thead>
			<tr>
				<th>Name</th>
				<th>Edit</th>
				<th>Delete</th>
			</tr>
		</thead>
		<tbody>
			<?php if (count($sectors)): foreach ($sectors as $sector): ?>
				<tr>
					<td><?php echo anchor($this->data['langName'] . 'admin/sector/edit/' . $sector->id, $sector->name); ?></td>
					<td><?php echo btn_edit($this->data['langName'] . 'admin/sector/edit/' . $sector->id); ?></td>
					<td><?php echo btn_delete($this->data['langName'] . 'admin/sector/delete/' . $sector->id); ?></td>
				</tr>
			<?php endforeach; ?>
			<?php else: ?>
				<tr>
					<td colspan="3">We could not find any sectors.</td>
				</tr>
			<?php endif; ?>
		</tbody>
	
	</table>
</section>