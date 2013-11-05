<?php get_header(); the_post(); ?>

<div id="main" role="main" class="inner-wrap clearfix">
 	
 	<h1 class="archive_title header"><?php the_title(); ?></h1>
 	<div class="entry-meta"></div>

 	<?php if (get_the_post_thumbnail()) { ?>
	 	<div id="featured">
			<?php the_post_thumbnail(); ?>
		</div>
	<?php } ?>
				 
	<div id="content" <?php post_class('post clearfix'); ?>>
		<?php the_content(); ?>
	</div><!-- /#content -->

	<section id="sidebar">
	 	<?php if (function_exists('dynamic_sidebar')) { dynamic_sidebar('Sidebar (Pages)'); } ?>
   	</section>
   	<div class="clear"></div>
   	
</div> <!-- /#main -->
<?php get_footer(); ?> 