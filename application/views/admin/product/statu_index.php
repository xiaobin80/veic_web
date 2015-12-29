<section>
	<h2>status</h2>
	<?php echo anchor('admin/product/status/add', '<span class="glyphicon glyphicon-plus"></span> Add a statu'); ?>
	<table class="table table-striped">
		<thead>
			<tr>
				<th>Name</th>
				<th>Edit</th>
				<th>Delete</th>
			</tr>
		</thead>
		<tbody>
			<?php if (count($status)): foreach ($status as $statu): ?>
				<tr>
					<td><?php echo anchor('admin/product/status/edit/' . $statu->id, $statu->name); ?></td>
					<td><?php echo btn_edit('admin/product/status/edit/' . $statu->id); ?></td>
					<td><?php echo btn_delete('admin/product/status/delete/' . $statu->id); ?></td>
				</tr>
			<?php endforeach; ?>
			<?php else: ?>
				<tr>
					<td colspan="3">We could not find any status.</td>
				</tr>
			<?php endif; ?>
		</tbody>
	
	</table>
</section>