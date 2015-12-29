<section>
	<h3><?php echo empty($contact->id) ? 'Add a new contact' : 'Edit contact ' . $contact->name; ?></h3>
	<?php echo validation_errors(); ?>
	<?php echo form_open(); ?>
	<?php $inputAttr = 'class="form-control"'; ?>
	<table class="table">
		<tr>
			<td>Language</td>
			<td><?php echo form_dropdown('lang_id', $lang_list, $this->input->post('lang_id') ? $this->input->post('lang_id') : $contact->lang_id); ?></td>
		</tr>
		<tr>
			<td>Name</td>
			<td><?php echo form_input('name', set_value('name', $contact->name), $inputAttr); ?></td>
		</tr>
		<tr>
			<td>Display Name</td>
			<td><?php echo form_input('displayName', set_value('displayName', $contact->displayName), $inputAttr); ?></td>
		</tr>
		<tr>
			<td>Tel</td>
			<td><?php echo form_input('tel', set_value('tel', $contact->tel), $inputAttr); ?></td>
		</tr>
		<tr>
			<td>Fax</td>
			<td><?php echo form_input('fax', set_value('fax', $contact->fax), $inputAttr); ?></td>
		</tr>
		<tr>
			<td>Email</td>
			<td><?php echo form_input('email', set_value('email', $contact->email), $inputAttr); ?></td>
		</tr>
		<tr>
			<td></td>
			<td><?php echo form_submit('save', 'Save', 'class="btn btn-primary"'); ?></td>
		</tr>
	</table>
	<?php echo form_close(); ?> 
</section>