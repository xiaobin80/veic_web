<section>
	<h2>Images</h2>
	<?php echo anchor('admin/image/edit', '<span class="glyphicon glyphicon-plus"></span> Add a image'); ?>
	<table class="table table-striped">
		<thead>
			<tr>
				<th>Name</th>
				<th>Edit</th>
				<th>Delete</th>
			</tr>
		</thead>
		<tbody>
			<?php if (count($images)): foreach ($images as $image): ?>
				<tr>
					<td><?php echo anchor($this->data['langName'] . 'admin/image/edit/' . $image->id, $image->name); ?></td>
					<td><?php echo btn_edit($this->data['langName'] . 'admin/image/edit/' . $image->id); ?></td>
					<td><?php echo btn_delete($this->data['langName'] . 'admin/image/delete/' . $image->id); ?></td>
				</tr>
			<?php endforeach; ?>
			<?php else: ?>
				<tr>
					<td colspan="3">We could not find any images.</td>
				</tr>
			<?php endif; ?>
		</tbody>
	
	</table>
</section>