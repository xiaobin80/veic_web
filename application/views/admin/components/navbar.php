		<nav class="navbar navbar-default navbar-inverse" role="navigation">
          	<div class="collapse navbar-collapse">
          		<a class="navbar-brand" href="<?php echo site_url('' . $this->data['langName']); ?>">Home</a>
	            <ul class="nav navbar-nav">
	              <li class="active"><a href="<?php echo site_url($this->data['langName'] . '/admin/dashboard'); ?>">Dashboard</a></li>
	              <li><?php echo anchor($this->data['langName'] . '/admin/user', 'Users'); ?></li>
	              <li><?php echo anchor($this->data['langName'] . '/admin/language', 'Languages'); ?></li>
	              <li><?php echo anchor($this->data['langName'] . '/admin/image', 'Images'); ?></li>
	              <li class="dropdown">
	              	<a href="#" class="dropdown-toggle" data-toggle="dropdown">Navigations<b class="caret"></b></a>
				        <ul class="dropdown-menu">
				          <li><?php echo anchor($this->data['langName'] . '/admin/navigation', 'Navigation Maintenance'); ?></li>
				          <li class="divider"></li>
				          <li><?php echo anchor($this->data['langName'] . '/admin/navigation/order', 'Navigation Order'); ?></li>
				        </ul>
        			</li>
	              <li class="dropdown">
	              	<a href="#" class="dropdown-toggle" data-toggle="dropdown">Products<b class="caret"></b></a>
				        <ul class="dropdown-menu">
				          <li><?php echo anchor($this->data['langName'] . '/admin/product/status/list', 'Product Stauts'); ?></li>
				          <li><?php echo anchor($this->data['langName'] . '/admin/product/parameters/list', 'Product Parameters'); ?></li>
				          <li class="divider"></li>
				          <li><?php echo anchor($this->data['langName'] . '/admin/product', 'Product Details'); ?></li>
				        </ul>
        			</li>
	              
	              <li class="dropdown">
	              	<a href="#" class="dropdown-toggle" data-toggle="dropdown">News Center<b class="caret"></b></a>
				        <ul class="dropdown-menu">
				          <li><?php echo anchor($this->data['langName'] . '/admin/presscenter/types/list', 'News Types'); ?></li>
				          <li class="divider"></li>
				          <li><?php echo anchor($this->data['langName'] . '/admin/presscenter', 'News'); ?></li>
				        </ul>
        			</li>
        			
        			<li><?php echo anchor($this->data['langName'] . '/admin/qualification', 'Qualifications'); ?></li>
        			<li><?php echo anchor($this->data['langName'] . '/admin/contact', 'Contact Way'); ?></li>
        			
        			<li class="dropdown">
	              	<a href="#" class="dropdown-toggle" data-toggle="dropdown">Glossaries<b class="caret"></b></a>
				        <ul class="dropdown-menu">
				          <li><?php echo anchor($this->data['langName'] . '/admin/glossary', 'Glossary Maintenance'); ?></li>
				          <li class="divider"></li>
				          <li><?php echo anchor($this->data['langName'] . '/admin/sector', 'Glossary Sector'); ?></li>
				        </ul>
        			</li>
	            </ul>
	        </div>
        </nav>