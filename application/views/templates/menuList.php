<section>
	<?php if(count($menu_team_list)): ?>
		<ul>
			<?php foreach ($menu_team_list as $menu): ?>
				<li><?php echo anchor($this->data['langName'] . '/page/invoke/' . $menu->linkAddr, $menu->name); ?></li>
			<?php endforeach; ?>
		</ul>
	<?php endif; ?>
</section>