<?php $this->load->view('admin/components/page_head'); ?>

<body style="background: #555;">

	<div class="modal-dialog">
		<div class="modal-content">
		
			<!-- <div class="modal-header"> -->
			<?php $this->load->view($subview); ?>
			<!-- <div class="modal-body"> -->
			
			<div class="modal-footer">
				&copy; <?php echo $meta_title; ?>
			</div>
		</div>
	</div>

<?php $this->load->view('admin/components/page_tail'); ?>
