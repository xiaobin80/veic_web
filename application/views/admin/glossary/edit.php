<section>
	<h3><?php echo empty($glossary->id) ? 'Add a new glossary' : 'Edit glossary ' . $glossary->name; ?></h3>
	<?php echo validation_errors(); ?>
	<?php 
		$strUri = $this->data['langName'] . '/admin/glossary/edit';
		dump($strUri);
		echo form_open($strUri); 
	?>
	<?php $inputAttr = 'class="form-control"'; ?>
	<table class="table">
		<tr>
			<td>Name</td>
			<td><?php echo form_input('name', set_value('name', $glossary->name), $inputAttr); ?></td>
		</tr>
		<tr>
			<td>Language</td>
			<td><?php echo form_dropdown('lang_id', $lang_list, $this->input->post('lang_id') ? $this->input->post('lang_id') :  $glossary->lang_id); ?></td>
		</tr>
		<tr>
			<td>Sector</td>
			<td><?php echo form_dropdown('sector_id', $sector_list, $this->input->post('sector_id') ? $this->input->post('sector_id') : $glossary->sector_id); ?></td>
		</tr>
		<tr>
			<td>Description</td>
			<td><?php echo form_input('description', set_value('description', $glossary->description), $inputAttr); ?></td>
		</tr>
		<tr>
			<td></td>
			<td><?php echo form_submit('save', 'Save', 'class="btn btn-primary"'); ?></td>
		</tr>
	</table>
	<?php echo form_close(); ?> 
</section>