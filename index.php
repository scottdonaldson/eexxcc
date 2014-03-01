<?php get_header(); ?>

<div id="main" role="main" class="inner-wrap clearfix">

	<?php 
	if ( is_front_page() && !is_paged() ) {
		$i = 0;
		// First post is featured, so gets its own #featured (outside of #content)
		$featured = new WP_Query(array(
			'meta_key' => 'post_ranking',
			'orderby' => 'meta_value_num',
			'order' => 'DESC',
			'posts_per_page' => 3
			));

		if ( $featured->have_posts() ) : while ( $featured->have_posts() ) : $featured->the_post();

			$img = wp_get_attachment_image_src( get_post_thumbnail_id(), 'full' );
			$img = $img[0];

			// This is referenced in the actual loop to exclude home page features
			update_post_meta( get_the_ID(), 'currently_shown_on_home', 'true' );
			?>

			<div class="featured featured-<?= ($i + 1); ?>" style="background-image: url(<?= $img; ?>);" onclick="location.assign('<?php the_permalink(); ?>/#content');">
				<div <?php post_class('clearfix'); ?>>

					<?php get_template_part('post-content'); ?>

				</div><!-- .post -->
			</div>

		<?php 
		$i++; 

		endwhile; endif;
		wp_reset_postdata();
	}

	get_template_part('loop');
	get_sidebar(); 

	?>
	
</div><!-- #main -->
 
<?php get_footer(); ?> 