<section>
	<?php if (count($certificates)) : ?>
		<?php foreach ($certificates as $certificate) : ?>
			<div>
				<img src="<?php echo site_url('html/img/' . $certificate->imgName); ?>"></img>
				<p><?php echo $certificate->name; ?></p>
			</div>
		<?php endforeach; ?>
	<?php endif; ?>
</section>
