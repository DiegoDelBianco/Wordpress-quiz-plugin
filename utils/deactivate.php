<?php

// Desativar plugin
function wpqp_deactivate() {

	// Apaga as tabelas criadas no DB
	wpqp_end_db();
}

// Apaga as tabelas criadas no DB
function wpqp_end_db() {

	// WP Globals
	global $table_prefix, $wpdb, $wpqp_version_db;

	// Obtem tabelas
	require(WPQP_DIR.'app/database/migrate.php');

	// Loop nas tabelas para criar todas
	foreach ($array_db[WPQP_VERSION_DB] as $tabela => $sql) {
		
		// Define nome correto da tabela, considerando o prefixo do sistema
		// $tabela = $table_prefix . $tabela;

		// Apaga a tabela
	    $sql = "DROP TABLE IF EXISTS $tabela";
	    $wpdb->query($sql);
	}

}

register_deactivation_hook( WPQP_PATH, "wpqp_deactivate" ); // Desativação do plugin