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

	// Página para editar quiz
	add_submenu_page( 
		null, 							// parent_slug
		'Editar quiz', 					// page_title
		'Editar quiz', 					// menu_title
		'publish_pages', 				// capability
		'wpqp-editar-quiz', 	    	// menu_slug
		'wpqp_page_edit_quiz' 	    	// callback
	);

	// Página para gerenciar perguntas do quiz
	add_submenu_page( 
		null, 							// parent_slug
		'Perguntas', 					// page_title
		'Perguntas', 					// menu_title
		'publish_pages', 				// capability
		'wpqp-quiz-perguntas', 	    	// menu_slug
		'wpqp_page_quiz_questions' 	    // callback
	);

}

add_action('admin_menu', 'wpqp_web');