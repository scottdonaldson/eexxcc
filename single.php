<?php get_header(); the_post(); ?>

<div id="main" class="inner-wrap clearfix">
		
	<h1 class="archive_title header">
		<?php the_title(); ?>
	</h1>
	<div class="entry-meta">
		<?php the_author_posts_link(); ?> | <?php the_category(); ?>
	</div>
		
 	<?php if (get_the_post_thumbnail()) { ?>
	 	<div id="featured">
			<?php the_post_thumbnail(); ?>
		</div>
	<?php } ?>

	<div id="content">
 		
		<div <?php post_class('clearfix'); ?>>				
			<?php the_content(); ?>
		</div><!-- .post -->

		<h4>Share this: 
		<a class="popup icon-facebook" href="http://www.facebook.com/sharer/sharer.php?u=<?php the_permalink(); ?>"></a>
		<a class="popup icon-twitter" href="http://www.twitter.com/intent/tweet?text=<?php the_title(); ?>%20<?php the_permalink(); ?>%20(via%20%23eexxcc)"></a></h4>

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