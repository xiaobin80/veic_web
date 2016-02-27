<section>
	<h2>languages</h2>
	<?php echo anchor('admin/language/edit', '<span class="glyphicon glyphicon-plus"></span> Add a language'); ?>
	<table class="table table-striped">
		<thead>
			<tr>
				<th>Name</th>
				<th>Edit</th>
				<th>Delete</th>
			</tr>
		</thead>
		<tbody>
			<?php if (count($languages)): foreach ($languages as $language): ?>
				<tr>
					<td><?php echo anchor('admin/language/edit/' . $language->id, $language->name); ?></td>
					<td><?php echo btn_edit('admin/language/edit/' . $language->id); ?></td>
					<td><?php echo btn_delete('admin/language/delete/' . $language->id); ?></td>
				</tr>
			<?php endforeach; ?>
			<?php else: ?>
				<tr>
					<td colspan="3">We could not find any languages.</td>
				</tr>
			<?php endif; ?>
		</tbody>
	
	</table>
</section>