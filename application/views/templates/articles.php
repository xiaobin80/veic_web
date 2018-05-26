<section>
	<?php if(count($article_list)): ?>
		<ul>
			<?php foreach ($article_list as $article): ?>
				<li><?php echo anchor($this->data['langName'] . '/article/view/' . $article->id, $article->title . ' - ' . $article->pubdate); ?></li>
			<?php endforeach; ?>
		</ul>
	<?php endif; ?>
</section>

<!-- pagination -->
<?php if($pagination): ?>
	<?php echo $pagination; ?>
<?php endif; ?>
