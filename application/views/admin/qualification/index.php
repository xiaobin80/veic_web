<section>
	<h2>Qualifications</h2>
	<?php echo anchor('admin/qualification/edit', '<span class="glyphicon glyphicon-plus"></span> Add a qualification'); ?>
	<table class="table table-striped">
		<thead>
			<tr>
				<th>Name</th>
				<th>Edit</th>
				<th>Delete</th>
			</tr>
		</thead>
		<tbody>
			<?php if (count($qualifications)): foreach ($qualifications as $qualification): ?>
				<tr>
					<td><?php echo anchor($this->data['langName'] . 'admin/qualification/edit/' . $qualification->id, $qualification->name); ?></td>
					<td><?php echo btn_edit($this->data['langName'] . 'admin/qualification/edit/' . $qualification->id); ?></td>
					<td><?php echo btn_delete($this->data['langName'] . 'admin/qualification/delete/' . $qualification->id); ?></td>
				</tr>
			<?php endforeach; ?>
			<?php else: ?>
				<tr>
					<td colspan="3">We could not find any qualifications.</td>
				</tr>
			<?php endif; ?>
		</tbody>
	
	</table>
</section>