<section>
	<h3><?php echo empty($product->id) ? 'Add a new product' : 'Edit product ' . $product->name; ?></h3>
	<?php echo validation_errors(); ?>
	<?php 
		if(empty($product->id))
			$strUri = $this->data['langName'] . '/admin/product/edit';
		else
			$strUri = $this->data['langName'] . '/admin/product/edit' . '/' . $product->id;
		
		echo form_open($strUri); 
	?>
	<?php $inputAttr = 'class="form-control"'; ?>
	<table class="table">
		<tr>
			<td>Name</td>
			<td><?php echo form_input('name', set_value('name', $product->name), $inputAttr); ?></td>
		</tr>
		<tr>
			<td>Language</td>
			<td><?php echo form_dropdown('lang_id', $lang_list, $this->input->post('lang_id') ? $this->input->post('lang_id') : $product->lang_id) ;?></td>
		</tr>
		<tr>
			<td>Image</td>
			<td><?php echo form_dropdown('img_id', $img_list, $this->input->post('img_id') ? $this->input->post('img_id') : $product->img_id) ;?></td>
		</tr>
		<tr>
			<td>Parameters List</td>
			<td><?php echo form_dropdown('param_id', $param_list, $this->input->post('param_id') ? $this->input->post('param_id') : $product->param_id) ;?></td>
		</tr>
		<tr>
			<td>Publication Status</td>
			<td><?php echo form_dropdown('statu_id', $statu_list, $this->input->post('statu_id') ? $this->input->post('statu_id') : $product->statu_id) ;?></td>
		</tr>
		<tr>
			<td>Description</td>
			<td><?php echo form_textarea('description', set_value('description', $product->description), $inputAttr); ?></td>
		</tr>
		<tr>
			<td></td>
			<td><?php echo form_submit('save', 'Save', 'class="btn btn-primary"'); ?></td>
		</tr>
	</table>
	<?php echo form_close(); ?> 
</section>