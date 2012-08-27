<?php

/*
Plugin Name: One Percent Pledge Site Functionality
Description: Provides non-theme functionality to the One Percent Pledge site on the Founders network of sites.
*/

// Register the post types we need.
add_action( 'init', 'rwi_onepercent_post_types' );

function rwi_onepercent_post_types() {
	
	// We just need basic arguments to begin with.
	$onepercent_company_args = array( 'public' => true, 'label' => 'Companies' );
	
	register_post_type( 'onepercent_company', $onepercent_company_args );
	
}


