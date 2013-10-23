<div class="entry">
	<h2 class="entry-title">
		<a href="<?php the_permalink(); ?>" rel="bookmark"><?php the_title(); ?></a>
	</h2>

	<div class="entry-meta">
		<?php the_author_posts_link(); ?> | <?php the_category(); ?>
	</div>

	<div class="entry-content">
		<?php the_excerpt(); ?>
	</div>
</div><!-- / .entry -->