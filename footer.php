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
			
			<div class="column last">
				<?php if (function_exists('dynamic_sidebar')) { dynamic_sidebar('Footer (column 3)'); } ?>
			</div><!-- / .column -->
 
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

<?php wp_footer(); ?> 

</body>
</html>