<section>
	<h3><?php echo empty($statu->id) ? 'Add a new statu' : 'Edit statu ' . $statu->name; ?></h3>
	<?php echo validation_errors(); ?>
	<?php 
		if(empty($statu->id))
			$strUri = $this->data['langName'] . '/admin/status/edit';
		else
			$strUri = $this->data['langName'] . '/admin/status/edit' . '/' . $statu->id;
		
		echo form_open($strUri); 
	?>
	<?php $inputAttr = 'class="form-control"'; ?>
	<table class="table">
		<tr>
			<td>Publication Date</td>
			<td><?php echo form_input('pubdate', set_value('pubdate', $statu->pubdate), 'class="datepicker"'); ?></td>
		</tr>
		<tr>
			<td>Name</td>
			<td><?php echo form_input('name', set_value('name', $statu->name), $inputAttr); ?></td>
		</tr>
		<tr>
			<td></td>
			<td><?php echo form_submit('save', 'Save', 'class="btn btn-primary"'); ?></td>
		</tr>
	</table>
	<?php echo form_close(); ?> 
</section>

<script type="text/javascript">
	$(function() {
		$('.datepicker').datepicker({format : 'yyyy-mm-dd'});
	}); 
</script>	