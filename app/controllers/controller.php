<?php 

global $wpqp_dir;

function wpqp_page_home() {

    global $wpdb;

    $sites = $wpdb->get_results("
        select id, nome
        from ".WPQP_PREFIX."contas
    ");

	wpqp_view( "dashboard", ['sites' => $sites] );
	
	if( current_user_can('editor') )
		wpqp_view( "home_editor", ['sites' => $sites] );
}

// Adiciona novo perfil
function wpqp_page_new_quiz() {

	// Apresenta a página
	wpqp_view( "new_quiz" );
}
