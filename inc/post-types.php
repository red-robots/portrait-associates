<?php 
/* Custom Post Types */

add_action('init', 'js_custom_init');
function js_custom_init() 
{
	
	// Register the Homepage Portfolio
  
     $labels = array(
	'name' => _x('Portfolio', 'post type general name'),
    'singular_name' => _x('Portfolio', 'post type singular name'),
    'add_new' => _x('Add New', 'Portfolio'),
    'add_new_item' => __('Add New Portfolio'),
    'edit_item' => __('Edit Portfolio'),
    'new_item' => __('New Portfolio'),
    'view_item' => __('View Portfolio'),
    'search_items' => __('Search Portfolio'),
    'not_found' =>  __('No Portfolio found'),
    'not_found_in_trash' => __('No Portfolio found in Trash'), 
    'parent_item_colon' => '',
    'menu_name' => 'Portfolio'
  );
  $args = array(
	'labels' => $labels,
    'public' => true,
    'publicly_queryable' => true,
    'show_ui' => true, 
    'show_in_menu' => true, 
    'query_var' => true,
    'rewrite' => true,
    'capability_type' => 'post',
    'has_archive' => false, 
    'hierarchical' => false, // 'false' acts like posts 'true' acts like pages
    'menu_position' => 20,
    'supports' => array('title','editor','custom-fields','thumbnail'),
	
  ); 
  register_post_type('portfolio',$args); // name used in query


    // Register the Homepage Portfolio
  
     $labels = array(
  'name' => _x('Testimonials', 'post type general name'),
    'singular_name' => _x('Testimonial', 'post type singular name'),
    'add_new' => _x('Add New', 'Testimonial'),
    'add_new_item' => __('Add New Testimonial'),
    'edit_item' => __('Edit Testimonial'),
    'new_item' => __('New Testimonial'),
    'view_item' => __('View Testimonial'),
    'search_items' => __('Search Testimonial'),
    'not_found' =>  __('No Testimonial found'),
    'not_found_in_trash' => __('No Testimonial found in Trash'), 
    'parent_item_colon' => '',
    'menu_name' => 'Testimonial'
  );
  $args = array(
  'labels' => $labels,
    'public' => true,
    'publicly_queryable' => true,
    'show_ui' => true, 
    'show_in_menu' => true, 
    'query_var' => true,
    'rewrite' => true,
    'capability_type' => 'post',
    'has_archive' => false, 
    'hierarchical' => false, // 'false' acts like posts 'true' acts like pages
    'menu_position' => 20,
    'supports' => array('title','editor','custom-fields','thumbnail'),
  
  ); 
  register_post_type('testimonials',$args); // name used in query
     
     
  $labels = array(
    'name' => _x('Team', 'post type general name'),
    'singular_name' => _x('Team', 'post type singular name'),
    'add_new' => _x('Add New', 'Team Member'),
    'add_new_item' => __('Add New Team Member'),
    'edit_item' => __('Edit Team Member'),
    'new_item' => __('New Team Member'),
    'view_item' => __('View Team Member'),
    'search_items' => __('Search Team'),
    'not_found' =>  __('No Team Members found'),
    'not_found_in_trash' => __('No Team Members found in Trash'), 
    'parent_item_colon' => '',
    'menu_name' => 'Team'
  );
  $args = array(
  'labels' => $labels,
    'public' => true,
    'publicly_queryable' => true,
    'show_ui' => true, 
    'show_in_menu' => true, 
    'query_var' => true,
    'rewrite' => true,
    'capability_type' => 'post',
    'has_archive' => false, 
    'hierarchical' => false, // 'false' acts like posts 'true' acts like pages
    'menu_position' => 20,
    'supports' => array('title','editor','custom-fields','thumbnail'),
  
  ); 
  register_post_type('team',$args); // name used in query
  

      // Register the Artist 
  
     $labels = array(
  'name' => _x('Artist', 'post type general name'),
    'singular_name' => _x('Artist', 'post type singular name'),
    'add_new' => _x('Add New', 'Artist'),
    'add_new_item' => __('Add New Artist'),
    'edit_item' => __('Edit Artist'),
    'new_item' => __('New Artist'),
    'view_item' => __('View Artist'),
    'search_items' => __('Search Artist'),
    'not_found' =>  __('No Artist found'),
    'not_found_in_trash' => __('No Artist found in Trash'), 
    'parent_item_colon' => '',
    'menu_name' => 'Artist'
  );
  $args = array(
  'labels' => $labels,
    'public' => true,
    'publicly_queryable' => true,
    'show_ui' => true, 
    'show_in_menu' => true, 
    'query_var' => true,
    'rewrite' => true,
    'capability_type' => 'post',
    'has_archive' => false, 
    'hierarchical' => false, // 'false' acts like posts 'true' acts like pages
    'menu_position' => 20,
    'supports' => array('title','editor','custom-fields','thumbnail'),
  
  ); 
  register_post_type('artist',$args); // name used in query

  // Add more between here
  
  // and here
  
  } // close custom post type
/*
  ##############################################
  Custom Taxonomies
*/
add_action( 'init', 'build_taxonomies', 0 );
 
function build_taxonomies() {
// cusotm tax
    register_taxonomy( 'portrait_type', 'portfolio',
   array( 
    'hierarchical' => true, // true = acts like categories false = acts like tags
    'label' => 'Portrait Type', 
    'query_var' => true, 
    'rewrite' => true ,
    'show_admin_column' => true,
    'public' => true,
    'rewrite' => array( 'slug' => 'portrait-type' ),
    '_builtin' => true
  ) );
  
} // End build taxonomies