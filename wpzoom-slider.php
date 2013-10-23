<?php
	$loop = new WP_Query( 
	array( 
		'post__not_in' => get_option( 'sticky_posts' ),
		'posts_per_page' => option::get('featured_number'),
		'meta_key' => 'wpzoom_is_featured',
		'meta_value' => 1				
	) );
?>

<div id="slider">
 
 
	<?php 
		$i = 0;
		if ( $loop->have_posts() ) : ?>
        
        <ul class="slides">
            
            <?php rewind_posts(); 
			while ( $loop->have_posts() ) : $loop->the_post(); $i++;
			$video = get_post_meta($post->ID, 'wpzoom_post_embed_code', true); 
			?>
            
            <li>
            	<?php if (strlen($video) > 1) { // Embedding video 
 					$video = embed_fix($video,980,550); // add wmode=transparent to iframe/embed
 					?>
					
					<div class="cover"><?php echo "$video"; ?></div>
					
					<?php } else {
          				get_the_image( array( 'size' => 'featured', 'width' => 980, 'height' => 550 ) );
		      	 	 	?>
	 
						<div class="slide_content">
						
							<?php if (option::get('featured_category') == 'on') { ?><h3><?php the_category(', '); ?></h4><?php } ?>
		 					 
							<h2><a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h2>
							 
							<?php the_excerpt(); ?>
							
		 				</div>

	 				<?php }  ?>

			</li><?php endwhile; ?> 

 		</ul><!-- /.slides -->
	
		<?php else : ?>
			
		<div class="notice">
			There are no featured posts. Start marking posts as featured, or disable the slider from <strong><a href="<?php bloginfo('url') ?>/wp-admin/admin.php?page=wpzoom_options">Theme Options</a></strong>. <br />
		    For more information please <strong><a href="http://www.wpzoom.com/documentation/originmag/">read the documentation</a></strong>.
		</div><!-- /.notice -->
 
 		<?php endif; ?>
 
</div><!-- /#slider -->

<?php wp_reset_query(); ?>