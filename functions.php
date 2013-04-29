<?php
/* =============================================================================
   Thumbnails
   ========================================================================== */
   if ( function_exists( 'add_theme_support' ) ) {
		  //add_theme_support('post-thumbnails');
			add_image_size( 'thumb-300', 300, '', true ); 
			add_image_size( 'thumb-600', 600, '', true ); 
			add_image_size( 'thumb-670', 670, '', true ); 
			add_image_size( 'thumb-950', 950, '', true ); 
   }
      
/* =============================================================================
   Custom Post Types
   ========================================================================== */
	add_action('init', 'all_custom_post_types');
	    function all_custom_post_types() {
	        $types = array(
	 
	            array('the_type' => 'talks',
	                        'single' => 'Talks',
	                        'plural' => 'Talks'),
	                        
	           array('the_type' => 'twit',
	                        'single' => 'Twitter',
	                        'plural' => 'Twitter'),
	                        
	            array('the_type' => 'insta',
	                        'single' => 'Instagram',
	                        'plural' => 'Instagram'));
	 
	    foreach ($types as $type) {
	    
	        $the_type = $type['the_type'];
	          $single = $type['single'];
	          $plural = $type['plural'];
	 
	        $labels = array(
	            'name' => _x($plural, 'post type general name'),
	            'singular_name' => _x($single, 'post type singular name'),
	            'add_new' => _x('Add New', $single),
	            'add_new_item' => __('Add New '. $single),
	            'edit_item' => __('Edit '.$single),
	            'new_item' => __('New '.$single),
	            'view_item' => __('View '.$single),
	            'search_items' => __('Search '.$plural),
	            'not_found' =>  __('No '.$plural.' found'),
	            'not_found_in_trash' => __('No '.$plural.' found in Trash'),
	            'parent_item_colon' => ''
	          );
	 
	          $args = array(
	            'labels' => $labels,
	            'public' => true,
	            'has_archive' => true,
	            'publicly_queryable' => true,
	            'show_ui' => true,
	            'query_var' => true,
	            'rewrite' => true,
	            'capability_type' => 'post',
	            'hierarchical' => false,
	            'menu_position' => 5,
	            'supports' => array('title','editor', 'author', 'thumbnail','custom-fields', 'comments')
	          );
	          register_post_type($the_type, $args);
	    }
	}
	
	
/* =============================================================================
   Load scripts 
   ========================================================================== */
   function elevenblank_scripts() {
		if(!is_admin()){
		
		wp_deregister_script( 'jquery' ); // Deregister WordPress jQuery
		wp_register_script( 'jquery', 'http://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js', 'jquery', '1.8.2'); 
		wp_enqueue_script('jquery'); // Enqueue it!
		
		wp_register_script('elevenblankscripts', get_template_directory_uri() . '/js/master.js', 'jquery', '1.0.0'); 
		wp_enqueue_script('elevenblankscripts'); // Enqueue it!
		
		wp_register_script('jquery_cycle', get_template_directory_uri() . '/js/jquery.cycle2.min.js', 'jquery', '2.0.0');		
		wp_enqueue_script('jquery_cycle'); // Enqueue it!
		
      //wp_register_script( 'jq_cyc_swipe', get_template_directory_uri() . '/js/jquery.cycle2.swipe.js',  'jquery_cycle', '1.0.0' );  
		//wp_enqueue_script('jq_cyc_swipe');
		
       wp_register_script( 'jq_cyc_swipe', get_template_directory_uri() . '/js/jquery.cycle2.carousel.js',  'jquery_cycle', '1.0.0' );  
	    wp_enqueue_script('jq_cyc_swipe');
		}
	 }
	

	
/* =============================================================================
   Load stylesheets
   ========================================================================== */	
	 function elevenblank_styles() {
		wp_register_style( 'eleven_reset', get_template_directory_uri() . '/css/reset.css', array(), '1.0', 'all'); // reset 
		wp_enqueue_style( 'eleven_reset' ); // Enqueue it!
		
		wp_register_style( 'eleven_grid', get_template_directory_uri() . '/css/grid.css', array(), '1.0', 'all'); // grid css
		wp_enqueue_style( 'eleven_grid' ); // Enqueue it!
		
		wp_register_style( 'eleven_font', 'http://fonts.googleapis.com/css?family=Raleway:400,300,700', array(), '1.0', 'all'); 
		wp_enqueue_style( 'eleven_font' ); // Enqueue it!
		
		wp_register_style( 'eleven_icons', get_template_directory_uri() . '/css/entypo.css', array(), '1.0', 'all'); // styles css
		wp_enqueue_style( 'eleven_icons' ); // Enqueue it!
		
		
		wp_register_style( 'eleven_style', get_template_directory_uri() . '/style.css', array(), '1.0', 'all'); // styles css
		wp_enqueue_style( 'eleven_style' ); // Enqueue it!
		
	}
	

/* =============================================================================
   Add slug to body
   ========================================================================== */	
	 function add_slug_to_body_class( $classes ) {
		global $post;
		if( is_home() ) {			
			$key = array_search( 'blog', $classes );
			if($key > -1) {
				unset( $classes[$key] );
			};
		} elseif( is_page() ) {
			$classes[] = sanitize_html_class( $post->post_name );
		} elseif(is_singular()) {
			$classes[] = sanitize_html_class( $post->post_name );
		};
		return $classes;
	}


/* =============================================================================
   Actions + Filters 
   ========================================================================== */

   // Actions
   add_action('init', 'elevenblank_scripts'); // Add Custom Scripts
   add_action('wp_enqueue_scripts', 'elevenblank_styles'); // Add Theme Stylesheets
   
   // Remove Actions
   remove_action( 'wp_head', 'feed_links_extra', 3 ); // Display the links to the extra feeds such as category feeds
   remove_action( 'wp_head', 'feed_links', 2 ); // Display the links to the general feeds: Post and Comment Feed
   remove_action( 'wp_head', 'rsd_link' ); // Display the link to the Really Simple Discovery service endpoint, EditURI link
   remove_action( 'wp_head', 'wlwmanifest_link' ); // Display the link to the Windows Live Writer manifest file.
   remove_action( 'wp_head', 'index_rel_link' ); // index link
   remove_action( 'wp_head', 'parent_post_rel_link', 10, 0 ); // prev link
   remove_action( 'wp_head', 'start_post_rel_link', 10, 0 ); // start link
   remove_action( 'wp_head', 'adjacent_posts_rel_link', 10, 0 ); // Display relational links for the posts adjacent to the current post.
   remove_action( 'wp_head', 'wp_generator' ); // Display the XHTML generator that is generated on the wp_head hook, WP version
   remove_action( 'wp_head', 'start_post_rel_link', 10, 0 );
   remove_action( 'wp_head', 'adjacent_posts_rel_link_wp_head',10, 0 );
   remove_action( 'wp_head', 'rel_canonical');
   remove_action( 'wp_head', 'wp_shortlink_wp_head', 10, 0 );
   
   // Filters
   add_filter('body_class', 'add_slug_to_body_class' ); // Add slug to body class (Starkers build)

?>
