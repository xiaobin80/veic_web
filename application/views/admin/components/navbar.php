		<nav class="navbar navbar-default navbar-inverse" role="navigation">
          	<div class="collapse navbar-collapse">
          		<a class="navbar-brand" href="<?php echo site_url('' . '..'); ?>">Home</a>
	            <ul class="nav navbar-nav">
	              <li class="active"><a href="<?php echo site_url('admin/dashboard'); ?>">Dashboard</a></li>
	              <li><?php echo anchor('admin/user', 'Users'); ?></li>
	              <li><?php echo anchor('admin/language', 'Languages'); ?></li>
	              <li><?php echo anchor('admin/image', 'Images'); ?></li>
	              <li class="dropdown">
	              	<a href="#" class="dropdown-toggle" data-toggle="dropdown">Navigations<b class="caret"></b></a>
				        <ul class="dropdown-menu">
				          <li><?php echo anchor('admin/navigation', 'Navigation Maintenance'); ?></li>
				          <li class="divider"></li>
				          <li><?php echo anchor('admin/navigation/order', 'Navigation Order'); ?></li>
				        </ul>
        			</li>
	              <li class="dropdown">
	              	<a href="#" class="dropdown-toggle" data-toggle="dropdown">Products<b class="caret"></b></a>
				        <ul class="dropdown-menu">
				          <li><?php echo anchor('admin/product/status/list', 'Product Stauts'); ?></li>
				          <li><?php echo anchor('admin/product/parameters/list', 'Product Parameters'); ?></li>
				          <li class="divider"></li>
				          <li><?php echo anchor('admin/product', 'Product Details'); ?></li>
				        </ul>
        			</li>
	              
	              <li class="dropdown">
	              	<a href="#" class="dropdown-toggle" data-toggle="dropdown">News Center<b class="caret"></b></a>
				        <ul class="dropdown-menu">
				          <li><?php echo anchor('admin/presscenter/types/list', 'News Types'); ?></li>
				          <li class="divider"></li>
				          <li><?php echo anchor('admin/presscenter', 'News'); ?></li>
				        </ul>
        			</li>
        			
        			<li><?php echo anchor('admin/qualification', 'Qualifications'); ?></li>
        			<li><?php echo anchor('admin/contact', 'Contact Way'); ?></li>
        			
        			<li class="dropdown">
	              	<a href="#" class="dropdown-toggle" data-toggle="dropdown">Glossaries<b class="caret"></b></a>
				        <ul class="dropdown-menu">
				          <li><?php echo anchor('admin/glossary', 'Glossary Maintenance'); ?></li>
				          <li class="divider"></li>
				          <li><?php echo anchor('admin/sector', 'Glossary Sector'); ?></li>
				        </ul>
        			</li>
	            </ul>
	        </div>
        </nav>