<section>
	<h3><?php echo empty($qualification->id) ? 'Add a new Qualification' : 'Edit qualification ' . $qualification->name; ?></h3>
	<?php echo validation_errors(); ?>
	<?php 
		if(empty($qualification->id))
			$strUri = $this->data['langName'] . '/admin/qualification/edit';
		else
			$strUri = $this->data['langName'] . '/admin/qualification/edit' . '/' . $qualification->id;
		
		echo form_open($strUri); 
	?>
	<?php $inputAttr = 'class="form-control"'; ?>
	<table class="table">
		<tr>
			<td>Name</td>
			<td><?php echo form_input('name', set_value('name', $qualification->name), $inputAttr); ?></td>
		</tr>
		<tr>
			<td>Technique</td>
			<td><?php echo form_checkbox('flag', $this->input->post('flag') ? $this->input->post('flag') : $qualification->flag, $qualification->flag == 0 ? FALSE : TRUE, 'id="flag"'); ?></td>
		</tr>
		<tr>
			<td>Language</td>
			<td><?php echo form_dropdown('lang_id', $lang_list, $this->input->post('lang_id') ? $this->input->post('lang_id') : $qualification->lang_id); ?></td>
		</tr>
		<tr>
			<td>Image</td>
			<td><?php echo form_dropdown('img_id', $img_list, $this->input->post('img_id') ? $this->input->post('img_id') : $qualification->img_id); ?></td>
		</tr>
		<tr>
			<td>Description</td>
			<td><?php echo form_textarea('description', set_value('description', $qualification->description), 'class="tinymce"'); ?></td>
		</tr>
		<tr>
			<td></td>
			<td><?php echo form_submit('save', 'Save', 'class="btn btn-primary"'); ?></td>
		</tr>
	</table>
	<?php echo form_close(); ?>
</section>

<script type="text/javascript">
$(document).ready(function(){
	$("#flag").change(function() {
		if ($("#flag").is(":checked")) {
			$("#flag").val(1);
		}
	}); 
})
</script>