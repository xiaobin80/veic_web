<section>
	<h3><?php echo empty($navigation->id) ? 'Add a new navigation' : 'Edit navigation ' . $navigation->name; ?></h3>
	<?php echo validation_errors(); ?>
	<?php echo form_open(); ?>
	<?php $inputAttr = 'class="form-control"'; ?>
	<table class="table">
		<tr>
			<td>Name</td>
			<td><?php echo form_input('name', set_value('name', $navigation->name), $inputAttr); ?></td>
		</tr>
		<tr>
			<td>Language</td>
			<td><?php echo form_dropdown('lang_id', $lang_list, $this->input->post('lang_id') ? $this->input->post('lang_id') : $navigation->lang_id); ?></td>
		</tr>
		<tr>
			<td>Link</td>
			<td><?php echo form_input('link', set_value('link', $navigation->link), $inputAttr); ?></td>
		</tr>
		<tr>
			<td>Template</td>
			<td><?php echo form_input('template', set_value('template', $navigation->template), $inputAttr); ?></td>
		</tr>
		<tr>
			<td></td>
			<td><?php echo form_submit('save', 'Save', 'class="btn btn-primary"'); ?></td>
		</tr>
	</table>
	<?php echo form_close(); ?> 
</section>