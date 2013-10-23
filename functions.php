<?php

add_theme_support( 'post-thumbnails' );
add_image_size( 'tiny', 300, 120 ); 

function custom_excerpt_length( $length ) {
	return 20;
}
add_filter( 'excerpt_length', 'custom_excerpt_length', 999 );
function new_excerpt_more( $more ) {
	return ' ... <a class="read-more" href="'. get_permalink( get_the_ID() ) . '">Read More</a>';
}
add_filter( 'excerpt_more', 'new_excerpt_more' );

register_nav_menus( array(
	'top' => 'Top Menu',
	'primary' => 'Primary Menu'
	) 
);

register_sidebar(array('name' => 'Sidebar'));
register_sidebars( 3, array('name' => 'Footer (column %d)') );