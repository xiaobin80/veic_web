<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
  <head>
  	<title><?php echo $meta_title; ?></title>
  	<meta http-equiv="Content-Type" content="text/html; charset=utf-8 /"> 
    <meta http-equiv="X-UA-Compatible" name="viewport" content="width=device-width, initial-scale=1.0" />
    <!-- Bootstrap -->
    <link href="<?php echo site_url('html/css/bootstrap.min.css'); ?>" rel="stylesheet" media="screen">
    <link href="<?php echo site_url('html/css/admin.css'); ?>" rel="stylesheet" >
    <script src="<?php echo site_url('html/js/jquery-1.11.3.js'); ?>"></script>
    <script src="<?php echo site_url('html/js/bootstrap.min.js'); ?>"></script>
    <?php if (isset($sortable) && $sortable == TRUE): ?>
	    <script type="text/javascript" src="<?php echo site_url('html/js/jquery-ui.min.js'); ?>"></script>
	    <script type="text/javascript" src="<?php echo site_url('html/js/jquery.mjs.nestedSortable.js'); ?>"></script>
    <?php endif; ?>
    
    <?php if (isset($mceFlag) && $mceFlag == TRUE): ?>
	    <!-- TinyMCE -->
		<script src="<?php echo site_url('html/js/tinymce/tinymce.min.js'); ?>"></script>
		<script type="text/javascript">
			tinymce.init({
			    selector: "textarea",
			    theme: "modern",
			    plugins: [
			         "advlist autolink link image lists charmap print preview hr anchor pagebreak spellchecker",
			         "searchreplace wordcount visualblocks visualchars code fullscreen insertdatetime media nonbreaking",
			         "save table contextmenu directionality emoticons template paste textcolor"
			   ],
			   toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image | print preview media fullpage | forecolor backcolor emoticons", 
			   image_advtab: true,
			   style_formats: [
			        {title: 'Bold text', inline: 'b'},
			        {title: 'Red text', inline: 'span', styles: {color: '#ff0000'}},
			        {title: 'Red header', block: 'h1', styles: {color: '#ff0000'}},
			        {title: 'Example 1', inline: 'span', classes: 'example1'},
			        {title: 'Example 2', inline: 'span', classes: 'example2'},
			        {title: 'Table styles'},
			        {title: 'Table row 1', selector: 'tr', classes: 'tablerow1'}
			    ]
			 });
		</script>
		<!-- /TinyMCE -->
	<?php endif; ?>
	
	<link href="<?php echo site_url('html/css/datepicker.css'); ?>" rel="stylesheet" />
	<script src="<?php echo site_url('html/js/bootstrap-datepicker.js'); ?>"></script>
	
  </head>
