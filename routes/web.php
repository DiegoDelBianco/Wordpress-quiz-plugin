<?php
/*
 * Define Menu e liga com as functions das páginas
 */

function wpqp_web() {

	// Página inicial (Dashboard)
	add_menu_page(
	    'Home',         		        // page_title
	    'Quiz plugin',             		// menu_title
	    'publish_pages',                // capability
	    'wpqp-home',             		// menu_slug
	    'wpqp_page_home',               // callback
	    'dashicons-admin-settings',     // icon_url
	    null                            // position
	);

	// Página para adicionar quiz
	add_submenu_page( 
		null, 							// parent_slug
		'Novo quiz', 					// page_title
		'Novo quiz', 					// menu_title
		'publish_pages', 				// capability
		'wpqp-novo-quiz', 	    		// menu_slug
		'wpqp_page_new_quiz' 	    	// callback
	);

}

add_action('admin_menu', 'wpqp_web');