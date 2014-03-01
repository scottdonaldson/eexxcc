<?php get_header(); the_post(); 

// Only load serif font if we're in a featured post
if ( get_post_format() === 'aside' ) { ?>
	<link href='http://fonts.googleapis.com/css?family=Bitter' rel='stylesheet' type='text/css'>
<?php } ?>

<div id="main" class="inner-wrap clearfix">

	<h1 class="archive_title header">
		<?php the_title(); ?>
	</h1>
	<div class="entry-meta">
		<?php the_author_posts_link(); ?> | <?php the_category(); ?>
	</div>

	<div id="content">
		
 	<?php if (get_the_post_thumbnail() && !get_field('hide_on_individual')) { ?>
	 	<div id="featured">
			<?php the_post_thumbnail(); ?>
		</div>
	<?php } ?>

		<div <?php post_class('clearfix entry-content'); ?>>				
			<?php the_content(); ?>
		</div><!-- .post -->

		<h4>Share this:</h4>
		<div class="fb-share-button" data-href="<?php the_permalink(); ?>" data-type="button"></div>
		<a href="<?php the_permalink(); ?>" class="twitter-share-button" data-lang="en" data-count="none" data-related="eexxcc">Share on Twitter</a>
		<a href="http://www.tumblr.com/share" title="Share on Tumblr" style="display:inline-block; text-indent:-9999px; overflow:hidden; width:61px; height:20px; background:url('http://platform.tumblr.com/v1/share_2.png') top left no-repeat transparent;">Share on Tumblr</a>
		<div class="g-plusone" data-size="medium"></div>

		<div class="slashes"></div>

		<div id="disqus_thread" style="margin-top: 25px;"></div>
	    <script type="text/javascript">
	        var disqus_shortname = 'extracurriculars'; // required: replace example with your forum shortname

	        (function() {
	            var dsq = document.createElement('script'); dsq.type = 'text/javascript'; dsq.async = true;
	            dsq.src = '//' + disqus_shortname + '.disqus.com/embed.js';
	            (document.getElementsByTagName('head')[0] || document.getElementsByTagName('body')[0]).appendChild(dsq);
	        })();
	    </script>

	</div><!-- /#content -->
	
	<?php get_sidebar(); ?>
 
</div><!-- /#main -->
<?php get_footer(); ?> 