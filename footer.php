	<div id="footer">
		
 			<div class="widget-area">
   			
				<div class="column">
					<?php if (function_exists('dynamic_sidebar')) { dynamic_sidebar('Footer (column 1)'); } ?>
				</div><!-- / .column -->
				
				<div class="column">
					<?php if (function_exists('dynamic_sidebar')) { dynamic_sidebar('Footer (column 2)'); } ?>
				</div><!-- / .column -->
				
				<div class="column last">
					<?php if (function_exists('dynamic_sidebar')) { dynamic_sidebar('Footer (column 3)'); } ?>
				</div><!-- / .column -->
	 
	   			<div class="clear"></div>
	        </div><!-- /.widget-area-->		
         <div class="clear"></div>
        
        <div class="copyright">
			<div class="left">
				<?php _e('Copyright', 'wpzoom'); ?> &copy; <?php echo date("Y",time()); ?> <?php bloginfo('name'); ?>. <?php _e('All Rights Reserved', 'wpzoom'); ?>.
			</div>
			
			<div class="right">
				<p class="wpzoom"><a href="http://www.wpzoom.com" target="_blank" title="Premium WordPress Themes"><img src="<?php bloginfo('template_directory'); ?>/images/wpzoom.png" alt="WPZOOM" /></a> <?php _e('Designed by', 'wpzoom'); ?></p>
			</div>
			
		</div><!-- /.copyright -->
 
    </div>
 
</div><!-- /.wrap -->

<?php 
wp_reset_query(); 
if (is_single()) { ?><script type="text/javascript" src="https://apis.google.com/js/plusone.js"></script><?php } // Google Plus button 
?>


<?php if (option::get('featured_enable') == 'on' && $paged < 2 && is_home() ) { ui::js("flexslider");  ?>

<script type="text/javascript">
jQuery(document).ready(function($) {
	
  	jQuery("#slider").flexslider({
 		controlNav: false,
		directionNav:true,
		animationLoop: true,
   		animation: "<?php if (option::get('slideshow_effect') == 'Slide') { ?>slide<?php } else { ?>fade<?php } ?>",
		useCSS: false,
		video:true,
		smoothHeight: true,
		slideshow: <?php if (option::get('featured_rotate') == 'on') { echo "true"; } else { echo "false"; } ?>,
		<?php if (option::get('featured_rotate') == 'on') { ?>slideshowSpeed:<?php echo option::get('featured_interval'); ?>,<?php } ?>
		pauseOnAction: true,
		animationSpeed: 600
 	});	
 
});
</script>
<?php } ?>

<?php wp_footer(); ?> 

</body>
</html>