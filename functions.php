<?php

add_theme_support( 'post-thumbnails' );
add_image_size( 'tiny', 500, 200 ); 

function custom_excerpt_length( $length ) {
	return 20;
}
add_filter( 'excerpt_length', 'custom_excerpt_length', 999 );
function new_excerpt_more( $more ) {
	return ' ...<br><a class="read-more" href="'. get_permalink( get_the_ID() ) . '">Read More</a> | Share: <a class="popup icon-facebook" href="http://www.facebook.com/sharer/sharer.php?u='. get_permalink( get_the_ID() ) .'"></a> <a class="popup icon-twitter" href="http://www.twitter.com/intent/tweet?text='.get_the_title(get_the_ID()).'%20'. get_permalink( get_the_ID() ) .'%20(via%20%23eexxcc)"></a>';
}
add_filter( 'excerpt_more', 'new_excerpt_more' );

register_nav_menus( array(
	'top' => 'Top Menu',
	'primary' => 'Primary Menu'
	) 
);

register_sidebar(array('name' => 'Sidebar'));
register_sidebars( 3, array('name' => 'Footer (column %d)') );
register_sidebar(array('name' => 'Sidebar (Pages)'));