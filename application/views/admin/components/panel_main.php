        
        <div class="container">
			<div class="row">
	        	<!-- Main column -->
	        	<div class="col-md-9">
	    			<?php $this->load->view($subview); ?>     	
				</div>
	        	<!-- Sidebar -->
	        	<div class="col-md-3">
					<section>
						<?php echo mailto('tdtc_hrb@163.com', '<span class="glyphicon glyphicon-user"></span> tdtc_hrb@163.com'); ?></br>
						<?php echo anchor('admin/user/logout', '<span class="glyphicon glyphicon-off"></span> logout'); ?>
					</section>
	        	</div>
			</div>
        </div>