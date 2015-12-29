<section>
	<h3><?php echo empty($type->id) ? 'Add a new type' : 'Edit type ' . $type->name; ?></h3>
	<?php echo validation_errors(); ?>
	<?php echo form_open(); ?>
	<?php $inputAttr = 'class="form-control"'; ?>
	<table class="table">
		<tr>
			<td>Name</td>
			<td><?php echo form_input('name', set_value('name', $type->name), $inputAttr); ?></td>
		</tr>
		<tr>
			<td>Description</td>
			<td><?php echo form_input('description', set_value('description', $type->description), $inputAttr); ?></td>
		</tr>
		<tr>
			<td></td>
			<td><?php echo form_submit('save', 'Save', 'class="btn btn-primary"'); ?></td>
		</tr>
	</table>
	<?php echo form_close(); ?> 
</section>