<?php 
/* Custom Post Types */

add_action('init', 'js_custom_init');
function js_custom_init() 
{
	
	// Register the Homepage Teams
  
     $labels = array(
	'name' => _x('Team', 'post type general name'),
    'singular_name' => _x('Team Member', 'post type singular name'),
    'add_new' => _x('Add New', 'Team Member'),
    'add_new_item' => __('Add New Team Member'),
    'edit_item' => __('Edit Team Members'),
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
  
  // Add more between here
  
  // and here
  
  } // close custom post type

    /*##############################################
Custom Taxonomies     */
add_action( 'init', 'build_taxonomies', 0 );

function build_taxonomies() {
// custom tax
	register_taxonomy( 'team_type', 'team',
		array(
			'hierarchical' => true, // true = acts like categories false = acts like tags
			'label' => 'Team Type',
			'query_var' => true,
			'show_admin_column' => true,
			'public' => true,
			'rewrite' => array( 'slug' => 'team-type' ),
			'_builtin' => true
		) );

} // End build taxonomies