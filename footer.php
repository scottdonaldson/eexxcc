	<div id="footer">
		
		<div class="slashes"></div>

			<div id="footer-widgets" class="inner-wrap">
			
			<div class="column">
				<?php if (function_exists('dynamic_sidebar')) { dynamic_sidebar('Footer (column 1)'); } ?>
				<p>&copy; EXC <?= date('Y'); ?></p>
			</div><!-- / .column -->
			
			<div class="column">
				<?php if (function_exists('dynamic_sidebar')) { dynamic_sidebar('Footer (column 2)'); } ?>
			</div><!-- / .column -->
			
			<div class="column">
				<?php if (function_exists('dynamic_sidebar')) { dynamic_sidebar('Footer (column 3)'); } ?>
			</div><!-- / .column -->

			<div class="column">
				<ul class="navsocial">

					<li><a class="icon-rss" href="<?= home_url(); ?>/feed" target="_blank"></a></li>

					<li><a href="http://twitter.com/eexxcc" target="_blank" class="icon-twitter"></a></li>

					<li><a href="https://www.facebook.com/extracurricularones" target="_blank" class="icon-facebook"></a></li>

					<li><a href="http://youtube.com/extracurriculars" target="_blank" class="icon-youtube"></a></li>

					<li><a href="http://eexxcc.tumblr.com" target="_blank" class="icon-tumblr"></a></li>
	  
	 			</ul>
			</div>
 
   			<div class="clear"></div>
        </div><!-- /.widget-area-->		
        <div class="clear"></div>
 
    </div>
    
<?php 
wp_reset_query(); 
if (is_single()) { // Google Plus button ?>
	<script type="text/javascript" src="https://apis.google.com/js/plusone.js"></script>
<?php } ?>

<script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
<script src="<?= bloginfo('template_url'); ?>/js/script.js"></script>
<script>jQuery('.post').fitVids();</script>

<?php get_template_part('scripts'); ?>

<?php wp_footer(); ?>





</body>
</html>