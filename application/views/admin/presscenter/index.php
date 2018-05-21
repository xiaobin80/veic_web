<section>
	<h2>articles</h2>
	<?php echo anchor($this->data['langName'] . '/admin/presscenter/edit', '<span class="glyphicon glyphicon-plus"></span> Add a articles'); ?>
	<table class="table table-striped">
		<thead>
			<tr>
				<th>Title</th>
				<th>Edit</th>
				<th>Delete</th>
			</tr>
		</thead>
		<tbody>
			<?php if (count($articles)): foreach ($articles as $article): ?>
				<tr>
					<td><?php echo anchor($this->data['langName'] . '/admin/presscenter/edit/' . $article->id, $article->title); ?></td>
					<td><?php echo btn_edit($this->data['langName'] . '/admin/presscenter/edit/' . $article->id); ?></td>
					<td><?php echo btn_delete($this->data['langName'] . '/admin/presscenter/delete/' . $article->id); ?></td>
				</tr>
			<?php endforeach; ?>
			<?php else: ?>
				<tr>
					<td colspan="3">We could not find any articles.</td>
				</tr>
			<?php endif; ?>
		</tbody>
	
	</table>
</section>