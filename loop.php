<div id="content">

<?php 

if ( have_posts() ) : while ( have_posts() ) : the_post(); 

	// don't show home page features
	if ( get_post_meta(get_the_ID(), 'currently_shown_on_home', true) !== 'true') {
	?>

		<div <?php post_class('clearfix'); ?>>
			<?php get_template_part('post-content');
			if (get_the_post_thumbnail()) { ?>
				<a href="<?php the_permalink(); ?>" rel="bookmark"><?php the_post_thumbnail('tiny'); ?></a>
			<?php } ?>
		</div>
	<?php
	}
endwhile; endif;
?>

<?php if (get_next_posts_link() || get_previous_posts_link()) { ?>
<div class="slashes"></div>
<div id="pagination" class="caps">
	<?php posts_nav_link(); ?>
</div>
<?php } ?>

</div><!-- #content -->
