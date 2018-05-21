<section>
	<h2>Glossaries</h2>
	<?php echo anchor('admin/glossary/edit', '<span class="glyphicon glyphicon-plus"></span> Add a glossary'); ?>
	<table class="table table-striped">
		<thead>
			<tr>
				<th>Name</th>
				<th>Edit</th>
				<th>Delete</th>
			</tr>
		</thead>
		<tbody>
			<?php if (count($glossaries)): foreach ($glossaries as $glossary): ?>
				<tr>
					<td><?php echo anchor($this->data['langName'] . 'admin/glossary/edit/' . $glossary->id, $glossary->description); ?></td>
					<td><?php echo btn_edit($this->data['langName'] . 'admin/glossary/edit/' . $glossary->id); ?></td>
					<td><?php echo btn_delete($this->data['langName'] . 'admin/glossary/delete/' . $glossary->id); ?></td>
				</tr>
			<?php endforeach; ?>
			<?php else: ?>
				<tr>
					<td colspan="3">We could not find any glossaries.</td>
				</tr>
			<?php endif; ?>
		</tbody>
	
	</table>
</section>