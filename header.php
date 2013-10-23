<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
 
    <title><?php ui::title(); ?></title>

    <link rel="stylesheet" type="text/css" href="<?php bloginfo('stylesheet_url'); ?>" media="screen" />
	<link href='http://fonts.googleapis.com/css?family=Lato:400,700,900' rel='stylesheet' type='text/css'> 
	
    <link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />

    <?php wp_head(); ?>
</head>
<body <?php body_class() ?>>

	<div class="inner-wrap">

		<header id="header">
			<div id="navbar"> 

				<?php if (option::get("social_icons") == 'on') {?>
					<ul id="navsocial">

						<?php if (option::get('social_rss') == 'on') { ?>
							<li>
								<a href="<?php if (strlen(option::get('misc_feedburner')) < 10) { bloginfo('rss2_url');} else { echo option::get('misc_feedburner'); } ?>"><img src="<?php bloginfo('template_directory'); ?>/images/rss.png" width="16" height="16" alt="<?php echo option::get('social_rss_title'); ?>" /><?php echo option::get('social_rss_title'); ?></a>
							</li>
						<?php } ?>

						<?php if (option::get('social_twitter_show') == 'on') { ?>
							<li>
								<a href="http://twitter.com/<?php echo option::get('social_twitter'); ?>" rel="external,nofollow"><img src="<?php bloginfo('template_directory'); ?>/images/twitter.png" width="16" height="16" alt="<?php echo option::get('social_twitter_title'); ?>" ><?php echo option::get('social_twitter_title'); ?></a>
							</li>
						<?php } ?>

						<?php if (option::get('social_facebook_show') == 'on') { ?>
							<li>
								<a href="<?php echo option::get('social_facebook'); ?>" rel="external,nofollow"><img src="<?php bloginfo('template_directory'); ?>/images/facebook.png" width="16" height="16" alt="<?php echo option::get('social_facebook_title'); ?>" ><?php echo option::get('social_facebook_title'); ?></a>
							</li>
						<?php } ?>
		  
		 			</ul>
				<?php } ?>

 				 
				<div id="navbar_wrap">

					<?php if (has_nav_menu( 'secondary' )) { 
						wp_nav_menu(array(
						'container' => 'menu',
						'container_class' => '',
						'menu_class' => 'dropdown',
						'menu_id' => 'mainmenu',
						'sort_column' => 'menu_order',
						'theme_location' => 'secondary'
						));
					} 
					?>

					<div class="clear"></div>
					<a class="btn_menu" id="toggle-top" href="#"><?php _e('Open Top Menu', 'wpzoom'); ?><span></span></a>


				</div>
				<div class="clear"></div>	


	  
			</div><!-- /#navbar -->
			
			<div id="logo" <?php if (option::get('ad_head_select') == 'on') { ?>class="left-align"<?php } ?>>
				<?php if (!option::get('misc_logo_path')) { echo "<h1>"; } ?>
				
				<a href="<?php bloginfo('url'); ?>" title="<?php bloginfo('description'); ?>">
					<?php if (!option::get('misc_logo_path')) { bloginfo('name'); } else { ?>
						<img src="<?php echo ui::logo(); ?>" alt="<?php bloginfo('name'); ?>" />
					<?php } ?>
				</a>
				
				<?php if (!option::get('misc_logo_path')) { echo "</h1>"; } ?>

				<?php if (option::get('logo_desc') == 'on') {  ?><span><?php bloginfo('description'); ?></span><?php } ?>
			</div><!-- / #logo -->


			<?php if (option::get('ad_head_select') == 'on') { ?>
				<div class="adv">
				
					<?php if ( option::get('ad_head_code') <> "") { 
						echo stripslashes(option::get('ad_head_code'));             
					} else { ?>
						<a href="<?php echo option::get('banner_top_url'); ?>"><img src="<?php echo option::get('banner_top'); ?>" alt="<?php echo option::get('banner_top_alt'); ?>" /></a>
					<?php } ?>		   	
						
				</div><!-- /.adv --> <div class="clear"></div>
			<?php } ?>
 
   		
			<div id="navbarsecond">

 				<?php if (has_nav_menu( 'primary' )) { 
					wp_nav_menu(array(
					'container' => 'menu',
					'container_class' => '',
					'menu_class' => 'dropdown',
					'menu_id' => 'secondmenu',
					'sort_column' => 'menu_order',
					'theme_location' => 'primary'
					));
				}					
				else
					{
						echo '<p>Please set your Main navigation menu on the <strong><a href="'.get_admin_url().'nav-menus.php">Appearance > Menus</a></strong> page.</p>
					 ';
					}
				?>


 				<div class="clear"></div>
 				<a class="btn_menu" id="toggle-main" href="#"><?php _e('Open Main Menu', 'wpzoom'); ?><span></span></a>
			</div><!-- /#navbarsecond -->
		
		</header> 