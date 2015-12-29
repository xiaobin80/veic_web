<section>
	<h3><?php echo empty($user->id) ? 'Add a new user' : 'Edit user ' . $user->name; ?></h3>
	<?php echo validation_errors(); ?>
	<?php echo form_open(); ?>
	<?php $inputAttr = 'class="form-control"'; ?>
	<table class="table">
		<tr>
			<td>Email</td>
			<td><?php echo form_input('email', set_value('email', $user->email), $inputAttr); ?></td>
		</tr>
		<tr>
			<td>Name</td>
			<td><?php echo form_input('name', set_value('name', $user->name), $inputAttr); ?></td>
		</tr>
		<tr>
			<td>Password</td>
			<td><?php echo form_password('password', '', $inputAttr); ?></td>
		</tr>
		<tr>
			<td>Confirm password</td>
			<td><?php echo form_password('password_confirm', '', $inputAttr); ?></td>
		</tr>
		<tr>
			<td></td>
			<td><?php echo form_submit('save', 'Save', 'class="btn btn-primary"'); ?></td>
		</tr>
	</table>
	<?php echo form_close(); ?> 
</section>

