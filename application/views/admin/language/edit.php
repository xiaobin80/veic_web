<section>
	<h3><?php echo empty($language->id) ? 'Add a new language' : 'Edit language ' . $language->name; ?></h3>
	<?php echo validation_errors(); ?>
	<?php 
		$strUri = $this->data['langName'] . '/admin/language/edit';
		dump($strUri);
		echo form_open($strUri); 
	?>
	<?php $inputAttr = 'class="form-control"'; ?>
	<table class="table">
		<tr>
			<td>Code</td>
			<td><?php echo form_input('code', set_value('code', $language->code), $inputAttr); ?></td>
		</tr>
		<tr>
			<td>Name</td>
			<td><?php echo form_input('name', set_value('name', $language->name), $inputAttr); ?></td>
		</tr>
		<tr>
			<td>Description</td>
			<td><?php echo form_input('description', set_value('description', $language->description), $inputAttr); ?></td>
		</tr>
		<tr>
			<td></td>
			<td><?php echo form_submit('save', 'Save', 'class="btn btn-primary"'); ?></td>
		</tr>
	</table>
	<?php echo form_close(); ?> 
</section>