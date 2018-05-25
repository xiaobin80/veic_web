<section>
	<h3><?php echo empty($parameter->id) ? 'Add a new parameter' : 'Edit parameter'; ?></h3>
	<?php echo validation_errors(); ?>
	<?php 
		$strUri = $this->data['langName'] . '/admin/product/parameters/edit';
		dump($strUri);
		echo form_open($strUri); 
	?>
	<?php $inputAttr = 'class="form-control"'; ?>
	<table class="table">
		<tr>
			<td>Name</td>
			<td><?php echo form_input('name', set_value('name', $parameter->name), $inputAttr); ?></td>
		</tr>
		<tr>
			<td>Language</td>
			<td><?php echo form_dropdown('lang_id', $lang_list, $this->input->post('lang_id') ? $this->input->post('lang_id') : $parameter->lang_id); ?></td>
		</tr>
		<tr>
			<td>MTBF(H)</td>
			<td><?php echo form_input('mtbf', set_value('mtbf', $parameter->mtbf), $inputAttr); ?></td>
		</tr>
		<tr>
			<td>Voltage(V)</td>
			<td><?php echo form_input('voltage', set_value('voltage', $parameter->voltage), $inputAttr); ?></td>
		</tr>
		<tr>
			<td>Electricity(A)</td>
			<td><?php echo form_input('electricity', set_value('electricity', $parameter->electricity), $inputAttr); ?></td>
		</tr>
		<tr>
			<td>IPxx</td>
			<td><?php echo form_input('ipxx', set_value('ipxx', $parameter->ipxx), $inputAttr); ?></td>
		</tr>
		<tr>
			<td>Temperature</td>
			<td><?php echo form_input('temperature', set_value('temperature', $parameter->temperature), $inputAttr); ?></td>
		</tr>
		<tr>
			<td></td>
			<td><?php echo form_submit('save', 'Save', 'class="btn btn-primary"'); ?></td>
		</tr>
	</table>
	<?php echo form_close(); ?> 
</section>
