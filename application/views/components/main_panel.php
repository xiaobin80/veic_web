        
        <div class="container">
        	<section>
        		<h1><?php echo anchor('', ' '); ?></h1>
        	</section>
	        <nav class="navbar navbar-default" role="navigation">
	          	<div class="collapse navbar-collapse">
	          		<a class="navbar-brand" href="<?php echo site_url(APPPATH . '..'); ?>"><?php echo $this->Glossary_M->get_word('home', $this->data['lang_id']); ?></a>
		            <ul class="nav navbar-nav">
		            <?php echo get_menu($menu, $menu_prefix); ?>
		            </ul>
		        </div>
	        </nav>
			<div class="row">
	        	<!-- Main column -->
	        	<div class="col-md-9">
	        		<div>
	        			<?php 
	        			if ($isSearch) {
	        				echo '<p>' .
	        				$this->Glossary_M->get_word('Search with', $this->data['lang_id']) .
	        				' "' .
	        				urldecode($searchVal) .
	        				'" ' .
	        			    $this->Glossary_M->get_word('results', $this->data['lang_id']) .
	        			    '</p>';
	        			}
	        			else 
	        				$this->load->view('components/breadcrumb'); 
	        			
	        			?>
	        		</div>
	    			<?php $this->load->view($subview); ?>     	
				</div>
	        	<!-- Sidebar -->
	        	<div class="col-md-3">
					<?php $this->load->view('components/sidebar'); ?>
				</div>
			</div>
        </div>   
 
        