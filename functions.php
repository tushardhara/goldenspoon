<?php
/*****************************************************************************/
/*Define Constants*/
/*****************************************************************************/

define('THEMEROOT', get_stylesheet_directory_uri());
define('IMAGES',THEMEROOT. '/images');
/**
 * Sets up theme defaults and registers the various WordPress features that
 * gs supports.
 */
function gs_setup() {
	/*
	 * Makes gs available for translation.
	 *
	 * Translations can be added to the /languages/ directory.
	 * If you're building a theme based on Twenty Thirteen, use a find and
	 * replace to change 'twentythirteen' to the name of your theme in all
	 * template files.
	 */

	//require( get_template_directory() . '/inc/widgets.php' );
	// Adds RSS feed links to <head> for posts and comments.
	add_theme_support( 'automatic-feed-links' );
	/*
	 * This theme supports all available post formats by default.
	 * See http://codex.wordpress.org/Post_Formats
	 */
	add_theme_support( 'post-formats', array(
		 'video'
	) );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menu( 'primary', __( 'Navigation Menu', 'gs' ) );
	register_nav_menu( 'footer-nav', __( 'Footer Menu', 'gs' ) );

	/*
	 * This theme uses a custom image size for featured images, displayed on
	 * "standard" posts and pages.
	 */
	add_theme_support( 'post-thumbnails' );
	//set_post_thumbnail_size( 300, 150, true );
	add_image_size( 'small-list-container',100, 68,true);
	add_image_size( 'thumbnail-container',300, 150,true);
	add_image_size( 'slider-container',630, 420,true);
	add_image_size('small-footer',140,180,true);
	add_image_size('full-size',1000,390,true);
}
add_action( 'after_setup_theme', 'gs_setup' );


	function custom_excerpt_length( $length ) {
		return 45;
	}
	add_filter( 'excerpt_length', 'custom_excerpt_length', 999 );
	
	function new_excerpt_more( $more ) {
		return '';
	}
	add_filter('excerpt_more', 'new_excerpt_more');
/*add_action('wp_footer', 'my_custom_js');*/
function gs_scripts_styles() {
	wp_deregister_script('jquery');
	wp_register_script('jquery', "//ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js", false, true);
	wp_enqueue_script('jquery');
	wp_enqueue_script( 'main', get_template_directory_uri() . '/js/main.js', array( 'jquery' ), false, true );
	
}
add_action( 'wp_enqueue_scripts', 'gs_scripts_styles' );

/**
 * Loads a set of CSS and/or Javascript documents. 
 */
function mega_enqueue_admin_scripts($hook) {
	wp_register_style( 'ot-admin-custom', get_template_directory_uri() . '/inc/css/ot-admin-custom.css' );
	if ( $hook == 'appearance_page_ot-theme-options' ) {
		wp_enqueue_style( 'ot-admin-custom' );
	}

	wp_register_style( 'admin.custom', get_template_directory_uri() . '/inc/css/admin.custom.css' );
	wp_register_script( 'jquery.admin.custom', get_template_directory_uri() . '/inc/jquery.admin.custom.js', array( 'jquery' ) );
	if( $hook != 'edit.php' && $hook != 'post.php' && $hook != 'post-new.php' ) 
		return;
	wp_enqueue_style( 'admin.custom' );
	wp_enqueue_script( 'jquery.admin.custom' );
}
add_action( 'admin_enqueue_scripts', 'mega_enqueue_admin_scripts' );

// Gallery
function mega_clean( $var ) {
	return sanitize_text_field( $var );
}

	/**
 * Get Vimeo & YouTube Thumbnail.
 */
function mega_get_video_image($url){
	if(preg_match('/youtube/', $url)) {			
		if(preg_match('/[\\?\\&]v=([^\\?\\&]+)/', $url, $matches)) {
			return "http://img.youtube.com/vi/".$matches[1]."/default.jpg";  
		}
	}
	elseif(preg_match('/vimeo/', $url)) {			
		if(preg_match('~^http://(?:www\.)?vimeo\.com/(?:clip:)?(\d+)~', $url, $matches))	{
				$id = $matches[1];	
				if (!function_exists('curl_init')) die('CURL is not installed!');
				$url = "http://vimeo.com/api/v2/video/".$id.".php";
				$ch = curl_init();
				curl_setopt($ch, CURLOPT_URL, $url);
				curl_setopt($ch, CURLOPT_HEADER, 0);
				curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
				curl_setopt($ch, CURLOPT_TIMEOUT, 10);
				$output = unserialize(curl_exec($ch));
				$output = $output[0]["thumbnail_medium"]; 
				curl_close($ch);
				return $output;
		}
	}		
}

/**
 * Retrieve YouTube/Vimeo iframe code from URL.
 */
function mega_get_video( $postid, $width = 940, $height = 308 ) {	
	$video_url = get_post_meta( $postid, 'mega_youtube_vimeo_url', true );	
	if(preg_match('/youtube/', $video_url)) {			
		if(preg_match('/[\\?\\&]v=([^\\?\\&]+)/', $video_url, $matches)) {
			$output = '<iframe width="'. $width .'" height="'. $height .'" src="http://www.youtube.com/embed/'.$matches[1].'?wmode=transparent&showinfo=0&rel=0" frameborder="0" allowfullscreen></iframe> ';
		}
		else {
			$output = __( 'Sorry that seems to be an invalid YouTube URL.', 'mega' );
		}			
	}
	elseif(preg_match('/vimeo/', $video_url)) {			
		if(preg_match('~^http://(?:www\.)?vimeo\.com/(?:clip:)?(\d+)~', $video_url, $matches))	{				
			$output = '<iframe src="http://player.vimeo.com/video/'. $matches[1] .'?title=0&amp;byline=0&amp;portrait=0" width="'. $width .'" height="'. $height .'" frameborder="0" webkitAllowFullScreen allowFullScreen></iframe>';         	
		}
		else {
			$output = __( 'Sorry that seems to be an invalid Vimeo URL.', 'mega' );
		}			
	}
	else {
		$output = __( 'Sorry that seems to be an invalid YouTube or Vimeo URL.', 'mega' );
	}	
	echo $output;	
}

/**
 * Load up our theme meta boxes and related code.
 */
	require( get_template_directory() . '/inc/meta-functions.php' );
	require( get_template_directory() . '/inc/meta-box-post.php' );
	require( get_template_directory() . '/inc/meta-box-page.php' );

/**
 * Registering a post type called "FAQ".
 */
function create_faq_type() {
	register_post_type( 'faq',
		array(
			'labels' => array(
				'name' => __( 'FAQs', 'gs' ),
				'singular_name' => __( 'FAQ', 'gs' ),
				'add_new' => _x( 'Add New FAQ', 'faq', 'gs' ),
				'add_new_item' => __( 'Add New FAQ', 'gs' ),
				'edit_item' => __( 'Edit FAQ', 'gs' ),
				'new_item' => __( 'New FAQ', 'gs' ),
				'all_items' => __( 'All FAQ', 'gs' ),
				'view_item' => __( 'View FAQ', 'gs' ),
				'search_items' => __( 'Search FAQ', 'gs' ),
				'not_found' =>  __( 'No FAQs found', 'gs' ),
				'not_found_in_trash' => __( 'No FAQs found in Trash', 'gs' )
			),
			'publicly_queryable' => true,
			'show_ui' => true, 
			'show_in_menu' => true,
			'show_in_nav_menus' => true,
			'query_var' => true,
			'rewrite' => array( 'slug' => 'faq', 'with_front' => false ),
			'capability_type' => 'post',
			'has_archive' => true,
			'public' => true,
			'hierarchical' => false,
			'menu_position' => 5,
			'exclude_from_search' => false,
			'supports' => array( 'title', 'editor' )
		)
	);
}
add_action( 'init', 'create_faq_type' );

// add filter to ensure the text Issue, or issue, is displayed when user updates a issue 
function faq_updated_messages( $messages ) {
  global $post, $post_ID;

  $messages['faq'] = array(
    0 => '', // Unused. Messages start at index 1.
    1 => sprintf( __('FAQ updated. <a href="%s">View FAQ</a>', 'gs'), esc_url( get_permalink($post_ID) ) ),
    2 => __('Custom field updated.', 'gs'),
    3 => __('Custom field deleted.', 'gs'),
    4 => __('FAQ updated.', 'gs'),
    /* translators: %s: date and time of the revision */
    5 => isset($_GET['revision']) ? sprintf( __('FAQ restored to revision from %s', 'gs'), wp_post_revision_title( (int) $_GET['revision'], false ) ) : false,
    6 => sprintf( __('FAQ published. <a href="%s">View FAQ</a>', 'gs'), esc_url( get_permalink($post_ID) ) ),
    7 => __('FAQ saved.', 'gs'),
    8 => sprintf( __('FAQ submitted. <a target="_blank" href="%s">Preview FAQ</a>', 'gs'), esc_url( add_query_arg( 'preview', 'true', get_permalink($post_ID) ) ) ),
    9 => sprintf( __('FAQ scheduled for: <strong>%1$s</strong>. <a target="_blank" href="%2$s">Preview FAQ</a>', 'gs'),
      // translators: Publish box date format, see http://php.net/date
      date_i18n( __( 'M j, Y @ G:i', 'gs' ), strtotime( $post->post_date ) ), esc_url( get_permalink($post_ID) ) ),
    10 => sprintf( __('FAQ draft updated. <a target="_blank" href="%s">Preview FAQ</a>', 'gs'), esc_url( add_query_arg( 'preview', 'true', get_permalink($post_ID) ) ) ),
  );

  return $messages;
}
add_filter( 'post_updated_messages', 'faq_updated_messages' );

/**
 * Registering a post type called "Golden Customers".
 */
function create_gcustomer_type() {
	register_post_type( 'gcustomer',
		array(
			'labels' => array(
				'name' => __( 'Golden Customers', 'gs' ),
				'singular_name' => __( 'Golden Customer', 'gs' ),
				'add_new' => _x( 'Add New Golden Customer', 'gcustomer', 'gs' ),
				'add_new_item' => __( 'Add New Golden Customer', 'gs' ),
				'edit_item' => __( 'Edit Golden Customer', 'gs' ),
				'new_item' => __( 'New Golden Customer', 'gs' ),
				'all_items' => __( 'All Golden Customers', 'gs' ),
				'view_item' => __( 'View Golden Customer', 'gs' ),
				'search_items' => __( 'Search Golden Customers', 'gs' ),
				'not_found' =>  __( 'No Golden Customers found', 'gs' ),
				'not_found_in_trash' => __( 'No Golden Customers found in Trash', 'gs' )
			),
			'publicly_queryable' => true,
			'show_ui' => true, 
			'show_in_menu' => true,
			'show_in_nav_menus' => true,
			'query_var' => true,
			'rewrite' => array( 'slug' => 'gcustomer', 'with_front' => false ),
			'capability_type' => 'post',
			'has_archive' => true,
			'public' => true,
			'hierarchical' => false,
			'menu_position' => 5,
			'exclude_from_search' => false,
			'supports' => array( 'title', 'editor','thumbnail' )
		)
	);
}
add_action( 'init', 'create_gcustomer_type' );

// add filter to ensure the text Issue, or issue, is displayed when user updates a issue 
function gcustomer_updated_messages( $messages ) {
  global $post, $post_ID;

  $messages['gcustomer'] = array(
    0 => '', // Unused. Messages start at index 1.
    1 => sprintf( __('Golden Customer updated. <a href="%s">View Golden Customer</a>', 'gs'), esc_url( get_permalink($post_ID) ) ),
    2 => __('Custom field updated.', 'gs'),
    3 => __('Custom field deleted.', 'gs'),
    4 => __('Golden Customer updated.', 'gs'),
    /* translators: %s: date and time of the revision */
    5 => isset($_GET['revision']) ? sprintf( __('Golden Customer restored to revision from %s', 'gs'), wp_post_revision_title( (int) $_GET['revision'], false ) ) : false,
    6 => sprintf( __('Golden Customer published. <a href="%s">View Golden Customer</a>', 'gs'), esc_url( get_permalink($post_ID) ) ),
    7 => __('Golden Customer saved.', 'gs'),
    8 => sprintf( __('Golden Customer submitted. <a target="_blank" href="%s">Preview Golden Customer</a>', 'gs'), esc_url( add_query_arg( 'preview', 'true', get_permalink($post_ID) ) ) ),
    9 => sprintf( __('Golden Customer scheduled for: <strong>%1$s</strong>. <a target="_blank" href="%2$s">Preview Golden Customer</a>', 'gs'),
      // translators: Publish box date format, see http://php.net/date
      date_i18n( __( 'M j, Y @ G:i', 'gs' ), strtotime( $post->post_date ) ), esc_url( get_permalink($post_ID) ) ),
    10 => sprintf( __('Golden Customer draft updated. <a target="_blank" href="%s">Preview Golden Customer</a>', 'gs'), esc_url( add_query_arg( 'preview', 'true', get_permalink($post_ID) ) ) ),
  );

  return $messages;
}
add_filter( 'post_updated_messages', 'gcustomer_updated_messages' );
/**
 * Registering a post type called "Press Page".
 */
function create_press_type() {
	register_post_type( 'press',
		array(
			'labels' => array(
				'name' => __( 'Press', 'gs' ),
				'singular_name' => __( 'Press', 'gs' ),
				'add_new' => _x( 'Add New Press', 'press', 'gs' ),
				'add_new_item' => __( 'Add New Press', 'gs' ),
				'edit_item' => __( 'Edit Press', 'gs' ),
				'new_item' => __( 'New Press', 'gs' ),
				'all_items' => __( 'All Press', 'gs' ),
				'view_item' => __( 'View Press', 'gs' ),
				'search_items' => __( 'Search Press', 'gs' ),
				'not_found' =>  __( 'No Press found', 'gs' ),
				'not_found_in_trash' => __( 'No Press found in Trash', 'gs' )
			),
			'publicly_queryable' => true,
			'show_ui' => true, 
			'show_in_menu' => true,
			'show_in_nav_menus' => true,
			'query_var' => true,
			'rewrite' => array( 'slug' => 'press', 'with_front' => false ),
			'capability_type' => 'post',
			'has_archive' => true,
			'public' => true,
			'hierarchical' => false,
			'menu_position' => 5,
			'exclude_from_search' => false,
			'supports' => array( 'title', 'editor','thumbnail' )
		)
	);
}
add_action( 'init', 'create_press_type' );

// add filter to ensure the text Issue, or issue, is displayed when user updates a issue 
function press_updated_messages( $messages ) {
  global $post, $post_ID;

  $messages['press'] = array(
    0 => '', // Unused. Messages start at index 1.
    1 => sprintf( __('Press updated. <a href="%s">View Press</a>', 'gs'), esc_url( get_permalink($post_ID) ) ),
    2 => __('Custom field updated.', 'gs'),
    3 => __('Custom field deleted.', 'gs'),
    4 => __('Press updated.', 'gs'),
    /* translators: %s: date and time of the revision */
    5 => isset($_GET['revision']) ? sprintf( __('Press restored to revision from %s', 'gs'), wp_post_revision_title( (int) $_GET['revision'], false ) ) : false,
    6 => sprintf( __('Press published. <a href="%s">View Press</a>', 'gs'), esc_url( get_permalink($post_ID) ) ),
    7 => __('Press saved.', 'gs'),
    8 => sprintf( __('Press submitted. <a target="_blank" href="%s">Preview Press</a>', 'gs'), esc_url( add_query_arg( 'preview', 'true', get_permalink($post_ID) ) ) ),
    9 => sprintf( __('Press scheduled for: <strong>%1$s</strong>. <a target="_blank" href="%2$s">Preview Press</a>', 'gs'),
      // translators: Publish box date format, see http://php.net/date
      date_i18n( __( 'M j, Y @ G:i', 'gs' ), strtotime( $post->post_date ) ), esc_url( get_permalink($post_ID) ) ),
    10 => sprintf( __('Press draft updated. <a target="_blank" href="%s">Preview Press</a>', 'gs'), esc_url( add_query_arg( 'preview', 'true', get_permalink($post_ID) ) ) ),
  );

  return $messages;
}
add_filter( 'post_updated_messages', 'press_updated_messages' );
/**
 * Registering a post type called "Menu Page".
 */
function create_menu_type() {
	register_post_type( 'menu',
		array(
			'labels' => array(
				'name' => __( 'Menu', 'gs' ),
				'singular_name' => __( 'Menu', 'gs' ),
				'add_new' => _x( 'Add New Menu', 'menu', 'gs' ),
				'add_new_item' => __( 'Add New Menu', 'gs' ),
				'edit_item' => __( 'Edit Menu', 'gs' ),
				'new_item' => __( 'New Menu', 'gs' ),
				'all_items' => __( 'All Menu', 'gs' ),
				'view_item' => __( 'View Menu', 'gs' ),
				'search_items' => __( 'Search Menu', 'gs' ),
				'not_found' =>  __( 'No Menu found', 'gs' ),
				'not_found_in_trash' => __( 'No Menu found in Trash', 'gs' )
			),
			'publicly_queryable' => true,
			'show_ui' => true, 
			'show_in_menu' => true,
			'show_in_nav_menus' => true,
			'query_var' => true,
			'rewrite' => array( 'slug' => 'gmenu', 'with_front' => false ),
			'capability_type' => 'post',
			'has_archive' => true,
			'public' => true,
			'hierarchical' => false,
			'menu_position' => 5,
			'exclude_from_search' => false,
			'supports' => array( 'title', 'editor','thumbnail' )
		)
	);
}
add_action( 'init', 'create_menu_type' );

// add filter to ensure the text Issue, or issue, is displayed when user updates a issue 
function menu_updated_messages( $messages ) {
  global $post, $post_ID;

  $messages['menu'] = array(
    0 => '', // Unused. Messages start at index 1.
    1 => sprintf( __('Menu updated. <a href="%s">View Menu</a>', 'gs'), esc_url( get_permalink($post_ID) ) ),
    2 => __('Custom field updated.', 'gs'),
    3 => __('Custom field deleted.', 'gs'),
    4 => __('Menu updated.', 'gs'),
    /* translators: %s: date and time of the revision */
    5 => isset($_GET['revision']) ? sprintf( __('Menu restored to revision from %s', 'gs'), wp_post_revision_title( (int) $_GET['revision'], false ) ) : false,
    6 => sprintf( __('Menu published. <a href="%s">View Menu</a>', 'gs'), esc_url( get_permalink($post_ID) ) ),
    7 => __('Menu saved.', 'gs'),
    8 => sprintf( __('Menu submitted. <a target="_blank" href="%s">Preview Menu</a>', 'gs'), esc_url( add_query_arg( 'preview', 'true', get_permalink($post_ID) ) ) ),
    9 => sprintf( __('Menu scheduled for: <strong>%1$s</strong>. <a target="_blank" href="%2$s">Preview Menu</a>', 'gs'),
      // translators: Publish box date format, see http://php.net/date
      date_i18n( __( 'M j, Y @ G:i', 'gs' ), strtotime( $post->post_date ) ), esc_url( get_permalink($post_ID) ) ),
    10 => sprintf( __('Menu draft updated. <a target="_blank" href="%s">Preview Menu</a>', 'gs'), esc_url( add_query_arg( 'preview', 'true', get_permalink($post_ID) ) ) ),
  );

  return $messages;
}
add_filter( 'post_updated_messages', 'menu_updated_messages' );

/**
 * Options Tree.
 */
 
/**
 * Optional: set 'ot_show_pages' filter to false.
 * This will hide the settings & documentation pages.
 */
add_filter( 'ot_show_pages', '__return_false' );

/**
 * Optional: set 'ot_show_new_layout' filter to false.
 * This will hide the "New Layout" section on the Theme Options page.
 */
add_filter( 'ot_show_new_layout', '__return_false' );

/**
 * Required: set 'ot_theme_mode' filter to true.
 */
add_filter( 'ot_theme_mode', '__return_true' );

/**
 * Required: include OptionTree.
 */
include_once( trailingslashit( get_template_directory() ) . 'option-tree/ot-loader.php' );

include_once( trailingslashit( get_template_directory() ) . 'inc/theme-options.php' );


function wpbeginner_numeric_posts_nav() {


	global $wp_query;

	/** Stop execution if there's only 1 page */
	if( $wp_query->max_num_pages <= 1 )
		return;

	$paged = get_query_var( 'paged' ) ? absint( get_query_var( 'paged' ) ) : 1;
	$max   = intval( $wp_query->max_num_pages );

	/**	Add current page to the array */
	if ( $paged >= 1 )
		$links[] = $paged;

	/**	Add the pages around the current page to the array */
	if ( $paged >= 3 ) {
		$links[] = $paged - 1;
		$links[] = $paged - 2;
	}

	if ( ( $paged + 2 ) <= $max ) {
		$links[] = $paged + 2;
		$links[] = $paged + 1;
	}

	echo '<div class="navigation"><ul>' . "\n";

	/**	Previous Post Link */
	if ( get_previous_posts_link() )
		printf( '<li>%s</li>' . "\n", get_previous_posts_link() );

	/**	Link to first page, plus ellipses if necessary */
	if ( ! in_array( 1, $links ) ) {
		$class = 1 == $paged ? ' class="active"' : '';

		printf( '<li%s><a href="%s">%s</a></li>' . "\n", $class, esc_url( get_pagenum_link( 1 ) ), '1' );

		if ( ! in_array( 2, $links ) )
			echo '<li>…</li>';
	}

	/**	Link to current page, plus 2 pages in either direction if necessary */
	sort( $links );
	foreach ( (array) $links as $link ) {
		$class = $paged == $link ? ' class="active"' : '';
		printf( '<li%s><a href="%s">%s</a></li>' . "\n", $class, esc_url( get_pagenum_link( $link ) ), $link );
	}

	/**	Link to last page, plus ellipses if necessary */
	if ( ! in_array( $max, $links ) ) {
		if ( ! in_array( $max - 1, $links ) )
			echo '<li>…</li>' . "\n";

		$class = $paged == $max ? ' class="active"' : '';
		printf( '<li%s><a href="%s">%s</a></li>' . "\n", $class, esc_url( get_pagenum_link( $max ) ), $max );
	}

	/**	Next Post Link */
	if ( get_next_posts_link() )
		printf( '<li>%s</li>' . "\n", get_next_posts_link() );

	echo '</ul></div>' . "\n";

}

function example_ajax_request() {
       if (isset($_REQUEST)) {
		if(!filter_var($_REQUEST['email'], FILTER_VALIDATE_EMAIL))
  		{
  			echo "E-mail is not valid";
  		}
		else
  		{
  			if( null == username_exists( $_REQUEST['email']) ) {
			  // Generate the password and create the user
			  $password = wp_generate_password( 12, false );
			  $user_id = wp_create_user(  $_REQUEST['email'], $password,  $_REQUEST['email'] );

			  // Set the nickname
			  wp_update_user(
			    array(
			      'ID'          =>    $user_id,
			      'nickname'    =>     $_REQUEST['email']
			    )
			  );

			  // Set the role
			  $user = new WP_User( $user_id );
			  $user->set_role( 'subscriber' );

			  // Email the user
			  wp_mail( $email_address, wp_title(), 'Thank you for subscribing with us!' );

			}else{
				echo "You are already our subscriber" ;
			}
  		}
	}
   die();
}
add_action( 'wp_ajax_example_ajax_request', 'example_ajax_request' );
// If you wanted to also use the function for non-logged in users (in a theme for example)
add_action( 'wp_ajax_nopriv_example_ajax_request', 'example_ajax_request' );
?>