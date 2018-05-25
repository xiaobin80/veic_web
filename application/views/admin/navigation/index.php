<section>
	<h2>navigations</h2>
	<?php echo anchor($this->data['langName'] . '/admin/navigation/edit', '<span class="glyphicon glyphicon-plus"></span> Add a navigation'); ?>
	<table class="table table-striped">
		<thead>
			<tr>
				<th>Name</th>
				<th>Edit</th>
				<th>Delete</th>
			</tr>
		</thead>
		<tbody>
			<?php if (count($navigations)): foreach ($navigations as $navigation): ?>
				<tr>
					<td><?php echo anchor($this->data['langName'] . '/admin/navigation/edit/' . $navigation->id, $navigation->name); ?></td>
					<td><?php echo btn_edit($this->data['langName'] . '/admin/navigation/edit/' . $navigation->id); ?></td>
					<td><?php echo btn_delete($this->data['langName'] . '/admin/navigation/delete/' . $navigation->id); ?></td>
				</tr>
			<?php endforeach; ?>
			<?php else: ?>
				<tr>
					<td colspan="3">We could not find any navigations.</td>
				</tr>
			<?php endif; ?>
		</tbody>
	
	</table>
</section>