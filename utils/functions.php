<?php

function wpqp_print_response($html, $data = [], $errors = []) {
	echo json_encode([
		'html' => $message,
		'errors' => $error,
		'data' => $data
	]);
	die();
}

// Apresenta uma view com variaveis definidas em args
function wpqp_view( $view, $args = [], $as_string = false){

	// Transfora a array em variaveis
	extract($args, EXTR_SKIP);

    if($as_string)
        ob_start();

	// Chama a view solicitada
	include WPQP_DIR."/views/pages/$view.php";

    if($as_string)
        return ob_get_clean();

    return true;
}

function wpqp_get_url( $page ) {
	return admin_url()."admin.php?page=$page";
}