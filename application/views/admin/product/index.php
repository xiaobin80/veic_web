<section>
	<h2>products</h2>
	<?php echo anchor('admin/product/edit', '<span class="glyphicon glyphicon-plus"></span> Add a product'); ?>
	<table class="table table-striped">
		<thead>
			<tr>
				<th>Name</th>
				<th>Edit</th>
				<th>Delete</th>
			</tr>
		</thead>
		<tbody>
			<?php if (count($products)): foreach ($products as $product): ?>
				<tr>
					<td><?php echo anchor('admin/product/edit/' . $product->id, $product->name); ?></td>
					<td><?php echo btn_edit('admin/product/edit/' . $product->id); ?></td>
					<td><?php echo btn_delete('admin/product/delete/' . $product->id); ?></td>
				</tr>
			<?php endforeach; ?>
			<?php else: ?>
				<tr>
					<td colspan="3">We could not find any products.</td>
				</tr>
			<?php endif; ?>
		</tbody>
	
	</table>
</section>