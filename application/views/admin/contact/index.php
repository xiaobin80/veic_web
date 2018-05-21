<section>
	<h2>contacts</h2>
	<?php echo anchor('admin/contact/edit', '<span class="glyphicon glyphicon-plus"></span> Add a contact'); ?>
	<table class="table table-striped">
		<thead>
			<tr>
				<th>Display Name</th>
				<th>Edit</th>
				<th>Delete</th>
			</tr>
		</thead>
		<tbody>
			<?php if (count($contacts)): foreach ($contacts as $contact): ?>
				<tr>
					<td><?php echo anchor($this->data['langName'] . 'admin/contact/edit/' . $contact->id, $contact->displayName); ?></td>
					<td><?php echo btn_edit($this->data['langName'] . 'admin/contact/edit/' . $contact->id); ?></td>
					<td><?php echo btn_delete($this->data['langName'] . 'admin/contact/delete/' . $contact->id); ?></td>
				</tr>
			<?php endforeach; ?>
			<?php else: ?>
				<tr>
					<td colspan="3">We could not find any contacts.</td>
				</tr>
			<?php endif; ?>
		</tbody>
	
	</table>
</section>