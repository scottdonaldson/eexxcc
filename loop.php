<?php 
$i = 0;
if (have_posts()) : while (have_posts()) : the_post(); 

	// First post is featured, so gets its own #featured (outside of #content)
	if ($i === 0) { ?>
		<div id="featured">
			<div <?php post_class('clearfix'); ?>>

				<?php if (get_the_post_thumbnail()) { ?>
					<a href="<?php the_permalink(); ?>/#content" rel="bookmark"><?php the_post_thumbnail(); ?></a>
				<?php } 
				get_template_part('post-content'); ?>

			</div><!-- .post -->
		</div>
		<div id="content">
	<?php } else { ?>
		<div <?php post_class('clearfix'); ?>>
			<?php if (get_the_post_thumbnail()) { ?>
				<a href="<?php the_permalink(); ?>" rel="bookmark"><?php the_post_thumbnail('tiny'); ?></a>
			<?php } 
			get_template_part('post-content'); ?>
		</div>
	<?php
	}
	$i++; endwhile; endif; ?>

		<?php if (get_next_posts_link() || get_previous_posts_link()) { ?>
		<div class="slashes"></div>
		<div id="pagination" class="caps">
			<?php posts_nav_link(); ?>
		</div>
		<?php } ?>

		</div><!-- #content -->
