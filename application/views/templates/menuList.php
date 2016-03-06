<section>
	<?php if(count($article_list)): ?>
		<ul>
			<?php foreach ($article_list as $article): ?>
				<li><?php echo anchor('article/view/' . $article->id, $article->title . ' - ' . $article->pubdate); ?></li>
			<?php endforeach; ?>
		</ul>
	<?php endif; ?>
</section>