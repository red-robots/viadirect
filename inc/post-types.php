<?php 
/* Custom Post Types */

add_action('init', 'js_custom_init');
function js_custom_init() 
{
	
	// Register the Homepage Slides
  
  $labels = array(
    'name' => _x('Testimonials', 'post type general name'),
      'singular_name' => _x('Testimonial', 'post type singular name'),
      'add_new' => _x('Add New', 'Testimonial'),
      'add_new_item' => __('Add New Testimonial'),
      'edit_item' => __('Edit Testimonials'),
      'new_item' => __('New Testimonial'),
      'view_item' => __('View Testimonials'),
      'search_items' => __('Search Testimonials'),
      'not_found' =>  __('No Testimonials found'),
      'not_found_in_trash' => __('No Testimonials found in Trash'), 
      'parent_item_colon' => '',
      'menu_name' => 'Testimonials'
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
    register_post_type('testimonial',$args); // name used in query

  $labels = array(
    'name' => _x('Team', 'post type general name'),
      'singular_name' => _x('Team', 'post type singular name'),
      'add_new' => _x('Add New', 'Team Member'),
      'add_new_item' => __('Add New Team Member'),
      'edit_item' => __('Edit Team Member'),
      'new_item' => __('New Team Member'),
      'view_item' => __('View Team Member'),
      'search_items' => __('Search Team Members'),
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

    $labels = array(
      'name' => _x('Events', 'post type general name'),
        'singular_name' => _x('Event', 'post type singular name'),
        'add_new' => _x('Add New', 'Event'),
        'add_new_item' => __('Add New Event'),
        'edit_item' => __('Edit Events'),
        'new_item' => __('New Event'),
        'view_item' => __('View Events'),
        'search_items' => __('Search Events'),
        'not_found' =>  __('No Events found'),
        'not_found_in_trash' => __('No Events found in Trash'), 
        'parent_item_colon' => '',
        'menu_name' => 'Events'
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
      register_post_type('event',$args); // name used in query
  
  // Add more between here
  
  // and here
  
  } // close custom post type