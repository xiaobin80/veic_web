<section>
	<h3><?php echo empty($sector->id) ? 'Add a new sector' : 'Edit sector ' . $sector->name; ?></h3>
	<?php echo validation_errors(); ?>
	<?php echo form_open(); ?>
	<?php $inputAttr = 'class="form-control"'; ?>
	<table class="table">
		<tr>
			<td>Name</td>
			<td><?php echo form_input('name', set_value('name', $sector->name), $inputAttr); ?></td>
		</tr>
		<tr>
			<td>Description</td>
			<td><?php echo form_input('description', set_value('description', $sector->description), $inputAttr); ?></td>
		</tr>
		<tr>
			<td></td>
			<td><?php echo form_submit('save', 'Save', 'class="btn btn-primary"'); ?></td>
		</tr>
	</table>
	<?php echo form_close(); ?> 
</section>