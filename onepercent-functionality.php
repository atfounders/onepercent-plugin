<?php

/*
Plugin Name: One Percent Pledge Site Functionality
Description: Provides non-theme functionality to the One Percent Pledge site on the Founders network of sites.
*/

// Register the post types we need.
add_action( 'init', 'rwi_onepercent_content_types' );

function rwi_onepercent_content_types() {
	
	// We just need basic arguments to begin with.
	$onepercent_company_args = array( 
		'capability_type' => 'page',
		'exclude_from_search' => true,
		'labels' => array(
			'name' => 'Companies',
			'singular_name' => 'Company',
			'add_new' => 'Add New',
			'all_items' => 'All Companies',
			'add_new_item' => 'Add New Company',
			'edit_item' => 'Edit Company',
			'new_item' => 'New Company',
			'view_item' => 'View Company',
			'search_items' => 'Search Companies',
			'not_found' => 'No companies found',
			'not_found_in_trash' => 'No companies found in Trash',
			'parent_item_colon' => 'Parent Company'
		),
		// Adds the menu icon for our new post type.
		'menu_icon' => plugins_url( 'images/icon-briefcase.png', __FILE__ ),
		// The primary use of this site is to list these companies off. So go ahead and put it above Posts, in this case.
		'menu_position' => 3,
		'public' => true,
		'show_in_menu_bar' => false,
		'supports' => array( 'title', 'editor', 'thumbnail' ),
		// Supports our custom taxonomy.
		'taxonomies' => array( 'onepercent_contributiontype' )
	);
	
	$onepercent_contributiontype_args = array(
		'hierarchical' => true,
		'labels' => array(
			'name' => 'Contribution Types',
			'singular_name' => 'Contribution Type',
			'search_items' => 'Search Types',
			'popular_items' => 'Popular Types',
			'all_items' => 'All Types',
			'parent_item' => 'Parent Type',
			'parent_item_colon' => 'Parent Type',
			'edit_item' => 'Edit Type',
			'update_item' => 'Update Type',
			'add_new_item' => 'Add New Type',
			'new_item_name' => 'New Type Name'
		),
		'show_ui' => true,
		'rewrite' => array( 'slug' => 'type' )
	);
	
	register_post_type( 'onepercent_company', $onepercent_company_args );
	register_taxonomy( 'onepercent_contributiontype', 'onepercent_company', $onepercent_contributiontype_args );
	
}


// Remove menu items that we don't need. This is a fairly simple WordPress site.
add_action( 'admin_menu', 'rwi_onepercent_dashboard_simplify' );

function rwi_onepercent_dashboard_simplify() {
	
	remove_menu_page( 'link-manager.php' );
	remove_menu_page( 'edit.php');
	remove_menu_page( 'edit-comments.php' );
	remove_menu_page( 'users.php' );
	
}


// Remove admin bar links we don't need either
add_action( 'wp_before_admin_bar_render', 'rwi_onepercent_admin_bar_render' );

function rwi_onepercent_admin_bar_render() {
	
	global $wp_admin_bar;
	
	$wp_admin_bar->remove_menu( 'comments' );
	$wp_admin_bar->remove_menu( 'new-content' );
	
}


// Credit The Noun Project for the use of their briefcase icon in our dashboard menu.
add_filter( 'admin_footer_text', 'rwi_onepercent_dashboard_footer' );

function rwi_onepercent_dashboard_footer() {
	
	echo 'Thank you for creating with <a href="http://wordpress.org/">WordPress</a>.<br />&ldquo;Briefcase&rdquo; symbol from <a href="http://thenounproject.com/">The Noun Project</a> collection.';
	
	//Thank you for creating with <a href="http://wordpress.org/">WordPress</a>.
	
}