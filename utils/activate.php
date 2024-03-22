<?php

// Ativar plugin
function wpqp_activate() {

	// Configura tabelas no DB
	wpqp_init_db();
}

// Configura tabelas no DB
function wpqp_init_db() {

	// WP Globals
	global $table_prefix, $wpdb;

	// Obtem tabelas
	require(WPQP_DIR.'app/database/migrate.php');

	// Inclui o upgrade script para usar a função dbDelta ao criar as tabelas
	require_once( ABSPATH . '/wp-admin/includes/upgrade.php' );
	
	// Loop nas tabelas para criar todas
	foreach ($array_db[WPQP_VERSION_DB] as $tabela => $sql) {

		// Define nome correto da tabela a ser implementada, considerando o prefixo do sistema, boas práticas ;-)
		//$tabela = $table_prefix . $tabela;

		// Verifica se a tabela já existe no sistema, e cria caso não exista
		if($wpdb->get_var( "show tables like '$tabela'" ) != $tabela)
			dbDelta( "CREATE TABLE `$tabela` ($sql) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;" );
	}

}

register_activation_hook( WPQP_PATH, "wpqp_activate" );     // Ativação do plugin