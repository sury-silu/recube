<?php
// Exit if accessed directly
if ( !defined( 'ABSPATH' ) ) exit;

// BEGIN ENQUEUE PARENT ACTION
// AUTO GENERATED - Do not modify or remove comment markers above or below:
        
if ( !function_exists( 'chld_thm_cfg_parent_css' ) ):
    function chld_thm_cfg_parent_css() {
        wp_enqueue_style( 'chld_thm_cfg_parent', trailingslashit( get_template_directory_uri() ) . 'style.css' );
		wp_enqueue_style( 'chld_thm_style', trailingslashit(  get_stylesheet_directory_uri() ) . 'style.css' ); 
    }
endif;
add_action( 'wp_enqueue_scripts', 'chld_thm_cfg_parent_css' );

// END ENQUEUE PARENT ACTION

// When a prpoerty is deleted, send all the bidders mail.
add_action( 'delete_post', 'email_bidders');

function email_bidders( $id ){
	

	// First check if this post type is property. Leave otherwise.
	if( get_post_type( $id ) != 'estate_property' )
		return;
	
	
	// Get all the bids of the current property.
	$bids = get_posts( array(
					'post_type'		=> 'bid',
					'meta_key'		=> 'wpcf-prop-id',
					'meta_value'	=> $id,
					'posts_per_page' => -1,
			));
	
	foreach( $bids as $bid ){
		
		$agent = get_user_by( 'id', $bid->post_author );
		
		// Mail to agent.
		wp_mail( $agent->user_email, 'Property Removed' , 'A property on which you had bidded is removed.' );
	}
}