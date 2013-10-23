<?php

/* Register Thumbnails Size 
================================== */

if ( function_exists( 'add_image_size' ) ) {
    /* Slider */
    add_image_size( 'featured', 980, 550, true );
    add_image_size( 'featured-small', 700, 450, true );

    /* Featured Category Widget */
    add_image_size( 'featured-cat', 310, 220, true );
 
    /* Recent Posts Widget */
    add_image_size( 'recent-widget', 75, 50, true );

}

/* Default Thubmnail */
update_option('thumbnail_size_w', option::get('thumb_width'));
update_option('thumbnail_size_h', option::get('thumb_height'));
update_option('thumbnail_crop', 1);


/* Video auto-thumbnail
==================================== */

if (is_admin()) {
	WPZOOM_Video_Thumb::init();
}


/* 	Register Custom Menu 
==================================== */

register_nav_menu('secondary', 'Top Menu');
register_nav_menu('primary', 'Main Menu');



/* Add support for Custom Background 
==================================== */

if ( ui::is_wp_version( '3.4' ) )
	add_theme_support( 'custom-background' ); 
else
	add_custom_background( $args );


 
/* Custom Excerpt Length
==================================== */

function new_excerpt_length($length) {
	return (int) option::get("excerpt_length") ? (int) option::get("excerpt_length") : 50;
}
add_filter('excerpt_length', 'new_excerpt_length');


/* Reset [gallery] shortcode styles						
==================================== */

add_filter('gallery_style', create_function('$a', 'return "<div class=\'gallery\'>";'));


/* Email validation
==================================== */

function simple_email_check($email) {
    // First, we check that there's one @ symbol, and that the lengths are right
    if (!ereg("^[^@]{1,64}@[^@]{1,255}$", $email)) {
        // Email invalid because wrong number of characters in one section, or wrong number of @ symbols.
        return false;
    }

    return true;
}


/* Maximum width for images in posts 
=========================================== */
// Don't need this -- we can handle with CSS
// if ( ! isset( $content_width ) ) $content_width = 650;


/* Show all thumbnails in attachment.php
=========================================== */

function show_all_thumbs() {
	global $post;
	
	$post = get_post($post);
	$images =& get_children( 'post_type=attachment&post_mime_type=image&output=ARRAY_N&orderby=menu_order&order=ASC&post_parent='.$post->post_parent);
	if($images){
		foreach( $images as $imageID => $imagePost ){
			if($imageID==$post->ID){
			
			unset($the_b_img);
			$the_b_img = wp_get_attachment_image($imageID, 'thumbnail', false);
			$thumblist .= '<a class="active" href="'.get_attachment_link($imageID).'">'.$the_b_img.'</a>';
			
			
			} else {
			unset($the_b_img);
			$the_b_img = wp_get_attachment_image($imageID, 'thumbnail', false);
			$thumblist .= '<a href="'.get_attachment_link($imageID).'">'.$the_b_img.'</a>';
			}
		}
	}
	return $thumblist;
}
 
 
/* Fix widgets no-title bug  
==================================== */

add_filter ('widget_title', 'wpzoom_fix_widgets');

function wpzoom_fix_widgets($content) { 
	
	$title = $content;
	
	if (!$title)
	{
		$content = '<div class="empty"></div>';
	}
    
    return $content; 
}



/*  Limit Posts						
/*									
/*  Plugin URI: http://labitacora.net/comunBlog/limit-post.phps
/*	Usage: the_content_limit($max_charaters, $more_link)
===================================================== */
 
function the_content_limit($max_char, $more_link_text = '(more...)', $stripteaser = 0, $more_file = '', $echo = true) {
    $content = get_the_content($more_link_text, $stripteaser, $more_file);
    $content = apply_filters('the_content', $content);
    $content = str_replace(']]>', ']]&gt;', $content);
    $content = strip_tags($content);

   if (strlen($_GET['p']) > 0 && $thisshouldnotapply) {
      echo $content;
   }
   else if ((strlen($content)>$max_char) && ($espacio = strpos($content, " ", $max_char ))) {
        $content = substr($content, 0, $espacio);
        if ($echo == true) { echo $content . "..."; } else {return $content; }
   }
   else {
      if ($echo == true) { echo $content . "..."; } else {return $content; }
   }
}


/* Related Posts				
==================================== */

if ( !function_exists( 'wp_get_related_posts' ) ) {
	function wp_get_related_posts() {
		global $wpdb, $post,$table_prefix;
		$wp_rp = get_option("wp_rp");
		
		$exclude = explode(",",$wp_rp["wp_rp_exclude"]);
		$limit = $wp_rp["wp_rp_limit"];
		$wp_rp_title = $wp_rp["wp_rp_title"];
		$wp_no_rp = $wp_rp["wp_no_rp"];
	  	
		if ( $exclude != '' ) {
			$q = "SELECT tt.term_id FROM ". $table_prefix ."term_taxonomy tt, " . $table_prefix . "term_relationships tr WHERE tt.taxonomy = 'category' AND tt.term_taxonomy_id = tr.term_taxonomy_id AND tr.object_id = $post->ID";

			$cats = $wpdb->get_results($q);
			
			foreach(($cats) as $cat) {
				if (in_array($cat->term_id, $exclude) != false){
					return;
				}
			}
		}
			
		if(!$post->ID){return;}
		$now = current_time('mysql', 1);
		$tags = wp_get_post_tags($post->ID);
	  
		$taglist = "'" . $tags[0]->term_id. "'";
		
		$tagcount = count($tags);
		if ($tagcount > 1) {
			for ($i = 1; $i < $tagcount; $i++) {
				$taglist = $taglist . ", '" . $tags[$i]->term_id . "'";
			}
		}
			
		if ($limit) {
			$limitclause = "LIMIT $limit";
		}	else {
			$limitclause = "LIMIT 4";
		}
		
		$q = "SELECT p.ID, p.post_title, p.post_date, p.comment_count, count(t_r.object_id) as cnt FROM $wpdb->term_taxonomy t_t, $wpdb->term_relationships t_r, $wpdb->posts p WHERE t_t.taxonomy ='post_tag' AND t_t.term_taxonomy_id = t_r.term_taxonomy_id AND t_r.object_id  = p.ID AND (t_t.term_id IN ($taglist)) AND p.ID != $post->ID AND p.post_status = 'publish' AND p.post_date_gmt < '$now' GROUP BY t_r.object_id ORDER BY cnt DESC, p.post_date_gmt DESC $limitclause;";

	 	$related_posts = $wpdb->get_results($q);
		$output = "";
		
		if ($related_posts) {
			
			$output  .= '<div class="related_posts">';
			$output  .= '<h3 class="title">'.__('Related Posts', 'wpzoom').'</h3>';
			$output  .= '<ul>';
			 
		}		
			
		foreach ($related_posts as $related_post ){
			$output .= '<li>';

			$image_url = get_the_image(array('format' => 'array', 'post_id' => $related_post->ID));
	 
	        $dateformat = get_option('date_format');
			$wrappeddate = mysql2date($dateformat, $related_post->post_date);
			
			$output .=  '<a href="'.get_permalink($related_post->ID).'" title="'.wptexturize($related_post->post_title).'">'.wptexturize($related_post->post_title).'</a>';    
	  		
			$output .=  "$wrappeddate</li>";
		}
		
		if ($related_posts) {
			
	 		$output  .= '</ul><div class="clear"></div></div>';
			 
		}	
	 
		return $output;
	}
}

if ( !function_exists( 'wp_related_posts' ) ) {
	function wp_related_posts(){
			
		$output = wp_get_related_posts() ;

		echo $output;
	}
}

/* Comments Custom Template						
==================================== */

function wpzoom_comment( $comment, $args, $depth ) {
	$GLOBALS['comment'] = $comment;
	switch ( $comment->comment_type ) :
		case '' :
	?>
	<li <?php comment_class(); ?> id="li-comment-<?php comment_ID(); ?>">
		<div id="comment-<?php comment_ID(); ?>">
		<div class="comment-author vcard">
			<?php echo get_avatar( $comment, 60 ); ?>
			<?php printf( __( '%s <span class="says">says:</span>', 'wpzoom' ), sprintf( '<cite class="fn">%s</cite>', get_comment_author_link() ) ); ?>
			
			<div class="comment-meta commentmetadata"><a href="<?php echo esc_url( get_comment_link( $comment->comment_ID ) ); ?>">
				<?php printf( __('%s at %s', 'wpzoom'), get_comment_date(), get_comment_time()); ?></a><?php edit_comment_link( __( '(Edit)', 'wpzoom' ), ' ' );
				?>
				
			</div><!-- .comment-meta .commentmetadata -->
		
		</div><!-- .comment-author .vcard -->
		<?php if ( $comment->comment_approved == '0' ) : ?>
			<em class="comment-awaiting-moderation"><?php _e( 'Your comment is awaiting moderation.', 'wpzoom' ); ?></em>
			<br />
		<?php endif; ?>

		 

		<div class="comment-body"><?php comment_text(); ?></div>

		<div class="reply">
			<?php comment_reply_link( array_merge( $args, array( 'depth' => $depth, 'max_depth' => $args['max_depth'] ) ) ); ?>
		</div><!-- .reply -->
	</div><!-- #comment-##  -->

	<?php
			break;
		case 'pingback'  :
		case 'trackback' :
	?>
	<li class="post pingback">
		<p><?php _e( 'Pingback:', 'wpzoom' ); ?> <?php comment_author_link(); ?><?php edit_comment_link( __( '(Edit)', 'wpzoom' ), ' ' ); ?></p>
	<?php
			break;
	endswitch;
}



/* Video Embed Code Fix
==================================== */

function embed_fix($video,$width,$height) {
 
  $video = preg_replace("/(width\s*=\s*[\"\'])[0-9]+([\"\'])/i", "$1 ".$width." $2", $video);
  $video = preg_replace("/(height\s*=\s*[\"\'])[0-9]+([\"\'])/i", "$1 ".$height." $2", $video);
  if (strpos($video, "<embed src=" ) !== false) {
      $video = str_replace('</param><embed', '</param><param name="wmode" value="transparent"></param><embed wmode="transparent" ', $video);
  }
  else {
    if(strpos($video, "wmode=transparent") == false){
  
      $re1='.*?'; # Non-greedy match on filler
      $re2='((?:http|https)(?::\\/{2}[\\w]+)(?:[\\/|\\.]?)(?:[^\\s"]*))'; # HTTP URL 1
  
      if ($c=preg_match_all ("/".$re1.$re2."/is", $video, $matches))
      {
        $httpurl1=$matches[1][0];
      }
  
      if(strpos($httpurl1, "?") == true){
        $httpurl_new = $httpurl1 . '&wmode=transparent';
      }
      else {
        $httpurl_new = $httpurl1 . '?wmode=transparent';
      }
  
      $search = array($httpurl1);
      $replace = array($httpurl_new);
      $video = str_replace($search, $replace, $video);
  
      //print($httpurl_new);
      unset($httpurl_new);
  
    }
  }
  return $video;
}


?>