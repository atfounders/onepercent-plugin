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
		'exclude_from_search' => true,
		'label' => 'Companies',
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
