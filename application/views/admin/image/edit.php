<section>
	<h3><?php echo empty($image->id) ? 'Add a new image' : 'Edit image ' . $image->name; ?></h3>
	<?php echo validation_errors(); ?>
	<?php 
		$strUri = $this->data['langName'] . '/admin/image/edit';
		dump($strUri);
		echo form_open($strUri); 
	?>
	<?php $inputAttr = 'class="form-control"'; ?>
	<table class="table">
		<tr>
			<td>Name</td>
			<td><?php echo form_input('name', set_value('name', $image->name), $inputAttr); ?></td>
		</tr>
		<tr>
			<td>Description</td>
			<td><?php echo form_input('description', set_value('description', $image->description), $inputAttr); ?></td>
		</tr>
		<tr>
			<td></td>
			<td><?php echo form_submit('save', 'Save', 'class="btn btn-primary"'); ?></td>
		</tr>
	</table>
	<?php echo form_close(); ?> 
</section>