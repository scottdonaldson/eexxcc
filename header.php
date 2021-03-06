<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
 
    <title><?php wp_title(''); ?></title>

    <link rel="shortcut icon" href="<?= bloginfo('template_url'); ?>/favicon.png">

    <link rel="stylesheet" href="<?= bloginfo('stylesheet_url'); ?>">
    <link rel="stylesheet" href="<?= bloginfo('template_url'); ?>/custom.css">
	<link href='http://fonts.googleapis.com/css?family=Lato:400,700,900' rel='stylesheet'> 
	
    <link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />

    <script src="<?= bloginfo('template_url'); ?>/js/modernizr.js"></script>

    <?php wp_head(); ?>
</head>
<body <?php body_class() ?>>

	<header id="header">
		<div id="navbar" class="inner-wrap clearfix"> 
			<ul id="navsocial" class="navsocial">

				<li><a class="icon-rss" href="<?= home_url(); ?>/feed" target="_blank"></a></li>

				<li><a href="http://twitter.com/eexxcc" target="_blank" class="icon-twitter"></a></li>

				<li><a href="https://www.facebook.com/extracurricularones" target="_blank" class="icon-facebook"></a></li>

				<li><a href="http://youtube.com/extracurriculars" target="_blank" class="icon-youtube"></a></li>

				<li><a href="http://eexxcc.tumblr.com" target="_blank" class="icon-tumblr"></a></li>
  
 			</ul>

			<div id="topmenu" class="menu">
				<?php if (has_nav_menu( 'top' )) { 
					wp_nav_menu(array(
						'container' => false,
						'container_class' => '',
						'sort_column' => 'menu_order',
						'theme_location' => 'top'
						)
					);
				} 
				?>
				<form method="get" id="searchform" action="http://eexxcc.com/">
						<input type="text" onblur="if (this.value == '') {this.value = 'Search';}" onfocus="if (this.value == 'Search') {this.value = '';}" value="Search" name="s" id="s">
				</form>
			</div>

		</div><!-- #navbar -->

		<div class="slashes"></div>
		
		<div id="masthead" class="header inner-wrap clearfix">
			<a href="<?php bloginfo('url'); ?>" title="<?php bloginfo('name'); ?>">
				<img id="airplane" src="<?= bloginfo('template_url'); ?>/images/eexxcc-airplane-small.png" alt="<?php bloginfo('name'); ?>" />
				<img id="logo" src="<?= bloginfo('template_url'); ?>/images/eexxcc-logo.png" alt="<?php bloginfo('name'); ?>" />
			</a>
			<?php if (has_nav_menu( 'primary' )) { 
				wp_nav_menu(array(
				'container' => 'menu',
				'menu_id' => 'primary',
				'sort_column' => 'menu_order',
				'theme_location' => 'primary'
				));
			} ?>
		</div><!-- #masthead -->

		<div class="slashes"></div>
	
	</header> 