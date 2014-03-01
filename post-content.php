<div class="entry">
	<h2 class="entry-title">
		<a href="<?php the_permalink(); ?>" rel="bookmark"><?php the_title(); ?></a>
	</h2>

	<div class="entry-meta">
		<?php the_author_posts_link(); ?> | <?php the_category(); ?> | Share: <a class="popup icon-facebook" href="http://www.facebook.com/sharer/sharer.php?u=<?php the_permalink(); ?>"></a>
		<a class="icon-twitter" href="http://www.twitter.com/intent/tweet?text=<?php the_title(); ?>%20<?php the_permalink(); ?>%20(via%20%40eexxcc)"></a>
	</div>

	<div class="entry-content">
		<?php the_excerpt(); ?>
	</div>
</div><!-- / .entry -->