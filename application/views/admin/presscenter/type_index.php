<section>
	<h2>types</h2>
	<?php echo anchor($this->data['langName'] . '/admin/presscenter/types/add', '<span class="glyphicon glyphicon-plus"></span> Add a type'); ?>
	<table class="table table-striped">
		<thead>
			<tr>
				<th>Name</th>
				<th>Edit</th>
				<th>Delete</th>
			</tr>
		</thead>
		<tbody>
			<?php if (count($types)): foreach ($types as $type): ?>
				<tr>
					<td><?php echo anchor($this->data['langName'] . '/admin/presscenter/types/edit/' . $type->id, $type->name); ?></td>
					<td><?php echo btn_edit($this->data['langName'] . '/admin/presscenter/types/edit/' . $type->id); ?></td>
					<td><?php echo btn_delete($this->data['langName'] . '/admin/presscenter/types/delete/' . $type->id); ?></td>
				</tr>
			<?php endforeach; ?>
			<?php else: ?>
				<tr>
					<td colspan="3">We could not find any types.</td>
				</tr>
			<?php endif; ?>
		</tbody>
	
	</table>
</section>