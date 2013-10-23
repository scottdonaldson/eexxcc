<?php get_header(); ?>
<?php $template = get_post_meta($post->ID, 'wpzoom_post_template', true); ?>

<div id="main"<?php 
	  if ($template == 'side-left') {echo " class=\"side-left\"";}
	  if ($template == 'full') {echo " class=\"full-width\"";} 
	  ?>>
	  
	<?php if (option::get('post_category') == 'on') { ?><h3 class="category_link"><?php the_category(', '); ?></h3><?php } ?>
		
	<h1 class="entry-title">
		<a href="<?php the_permalink(); ?>" title="<?php printf( esc_attr__( 'Permalink to %s', 'wpzoom' ), the_title_attribute( 'echo=0' ) ); ?>" rel="bookmark"><?php the_title(); ?></a>
	</h1>
		
 	
	<div id="content">
  	
 		<div class="col_main">
 		
 			<?php while (have_posts()) : the_post(); ?>
 		
			<div class="post-meta">
			
				<?php if (option::get('post_author') == 'on') { ?><?php _e('Posted by', 'wpzoom'); ?> <span class="vcard author"><span class="fn"><?php the_author_posts_link(); ?></span></span> <span class="separator">&times;</span><?php } ?>
				<?php if (option::get('post_date') == 'on') { ?><?php printf( __('<span class="date updated">%s</span> at %s', 'wpzoom'),  get_the_date(), get_the_time()); ?><?php } ?>

				<?php edit_post_link( __('Edit', 'wpzoom'), '<span class="separator">&times;</span> ', ''); ?>
 			</div><!-- /.post-meta -->
			
		  
			<div id="post-<?php the_ID(); ?>" <?php post_class('clearfix'); ?>>
				 
				<div class="entry">
					<?php the_content(); ?>
					<div class="clear"></div>
					
					<?php wp_link_pages( array( 'before' => '<div class="page-link"><span>' . __( 'Pages:', 'wpzoom' ) . '</span>', 'after' => '</div>' ) ); ?>
					<div class="clear"></div>
				
				</div><!-- / .entry -->
				<div class="clear"></div>
			 
			</div><!-- #post-<?php the_ID(); ?> -->
 				
			<?php if (option::get('post_tags') == 'on') { ?><?php the_tags( '<div class="tag_list">'. __('Tags:', 'wpzoom'). ' ',' <span class="separator">&times;</span> ', '</div>'); ?><?php } ?>
				
 				
		</div> <!-- /.col_main -->

			
		<div class="col_meta">
		
 			<?php if (option::get('post_nextprev') != 'on') { ?>
				<div class="prevnext">
				
					<?php
						$previous_post = get_previous_post();
						$next_post = get_next_post();
					?>
			  
					<?php if ($previous_post != NULL) { ?>
						<a href="<?php echo get_permalink($previous_post->ID); ?>" title="<?php echo $previous_post->post_title; ?>">&laquo; <?php _e('Previous', 'wpzoom'); ?></a>
					<?php } ?>
						
					<?php if ($previous_post != NULL && $next_post != NULL) { ?><span class="separator">&times;</span><?php } ?>
						
					<?php if ($next_post != NULL) { ?>
						<a class="next_link" href="<?php echo get_permalink($next_post->ID); ?>" title="<?php echo $next_post->post_title; ?>"><?php _e('Next', 'wpzoom'); ?> &raquo;</a> 
					<?php } ?>
				</div><!-- /.nextprev -->
			<?php } ?>	
  				
			
			<?php if (option::get('post_share') == 'on') { ?>
				<div class="share_box">
					<h3><?php _e('Share', 'wpzoom'); ?></h3>
					<div class="share_btn"><a href="http://twitter.com/share" data-url="<?php the_permalink() ?>" class="twitter-share-button" data-count="horizontal">Tweet</a><script type="text/javascript" src="http://platform.twitter.com/widgets.js"></script></div>
					<div class="share_btn"><iframe src="http://www.facebook.com/plugins/like.php?href=<?php echo urlencode(get_permalink($post->ID)); ?>&amp;layout=button_count&amp;show_faces=false&amp;width=1000&amp;action=like&amp;font=arial&amp;colorscheme=light&amp;height=21" scrolling="no" frameborder="0" style="border:none; overflow:hidden; width:80px; height:21px;" allowTransparency="true"></iframe></div>
					<div class="share_btn"><g:plusone size="medium"></g:plusone></div>
				</div><div class="clear"></div>
			<?php } ?>
			
			<?php if ( option::get('post_related') == 'on' && function_exists('wp_related_posts') ) wp_related_posts(); ?>
 				
		</div> <!-- /.col_meta -->
 		<div class="clear"></div>
 		 
		 
		<?php if (option::get('post_comments') == 'on') { 
			comments_template();
		} ?>
			
		<?php endwhile; ?>

	</div><!-- /#content -->
	
	
	<?php if ($template != 'full') { 
		get_sidebar(); 
	} else { echo "<div class=\"clear\"></div>"; } ?>
 
</div><!-- /#main -->
<?php get_footer(); ?> 