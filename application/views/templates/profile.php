<section>
	<?php if (count($profile)): ?>
		<?php foreach ($profile as $item) : ?>
			<div>
				<h4><?php echo $item->title; ?></h4>
				<p><?php echo $item->body; ?></p>
			</div>
		<?php endforeach; ?>
	<?php endif; ?>
</section>
