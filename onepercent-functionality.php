<?php

/*
Plugin Name: One Percent Pledge Site Functionality
Description: Provides non-theme functionality to the One Percent Pledge site on the Founders network of sites.
*/

// Register the post types we need.
add_action( 'init', 'rwi_onepercent_post_types' );

function rwi_onepercent_post_types() {
	
	// We just need basic arguments to begin with.
	$onepercent_company_args = array( 
		'capability_type' => 'page',
		'exclude_from_search' => true,
		'label' => 'Companies',
		// Adds the menu icon for our new post type.
		'menu_icon' => plugins_url( 'images/icon-briefcase.png', __FILE__ ),
		// The primary use of this site is to list these companies off. So go ahead and put it above Posts, in this case.
		'menu_position' => 3,
		'public' => true,
		'show_in_menu_bar' => false
	);
	
	register_post_type( 'onepercent_company', $onepercent_company_args );
	
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