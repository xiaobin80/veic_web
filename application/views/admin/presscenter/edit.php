<section>
	<h3><?php echo empty($article->id) ? 'Add a new article' : 'Edit article ' . $article->title; ?></h3>
	<?php echo validation_errors(); ?>
	<?php 
		if(empty($article->id))
			$strUri = $this->data['langName'] . '/admin/presscenter/edit';
		else
			$strUri = $this->data['langName'] . '/admin/presscenter/edit' . '/' . $article->id;
		
		echo form_open($strUri); 
	?>
	<?php $inputAttr = 'class="form-control"'; ?>
	<table class="table">
		<tr>
			<td>Language</td>
			<td><?php echo form_dropdown('lang_id', $lang_list, $this->input->post('lang_id') ? $this->input->post('lang_id') : $article->lang_id) ;?></td>
		</tr>
		<tr>
			<td>Type</td>
			<td><?php echo form_dropdown('type_id', $type_list, $this->input->post('type_id') ? $this->input->post('type_id') : $article->type_id) ;?></td>
		</tr>
		<tr>
			<td>Publication Date</td>
			<td><?php echo form_input('pubdate', set_value('pubdate', $article->pubdate), 'class="datepicker"'); ?></td>
		</tr>
		<tr>
			<td>Title</td>
			<td><?php echo form_input('title', set_value('tilte', $article->title), $inputAttr); ?></td>
		</tr>
		<tr>
			<td>Slug</td>
			<td><?php echo form_input('slug', set_value('slug', $article->slug), $inputAttr); ?></td>
		</tr>
		<tr>
			<td>Body</td>
			<td><?php echo form_textarea('body', set_value('body', $article->body), 'class="tinymce"'); ?></td>
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

