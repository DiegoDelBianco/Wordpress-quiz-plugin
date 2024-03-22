<?php
/*
 * Plugin Name:       Wordpress quiz plugin
 * Description:       Crie seus próprios quiz.
 * Version:           0.1.0
 * Requires at least: 5.2
 * Requires PHP:      8.1
 * Author:            Diego Del Bianco
 * Author URI:        https://delbianco.emp.br/
 */

// date_default_timezone_set('America/Sao_Paulo');

// Variaveis globais do plugin relevantes
global $table_prefix;

// CONSTANTS
define("WPQP_VERSION", '0.1.2');
define("WPQP_VERSION_DB", '0.1.0');
define("WPQP_PATH", __FILE__);
define("WPQP_DIR", plugin_dir_path(WPQP_PATH));
define('WPQP_PREFIX', $table_prefix."wpqp_");

require(WPQP_DIR.'utils/activate.php');                     // Função de ativação e suas dependencias
require(WPQP_DIR.'utils/deactivate.php');                   // Função de desativação e suas dependencias
require(WPQP_DIR.'utils/functions.php');

require(WPQP_DIR.'app/models/Model.php');
require(WPQP_DIR.'app/models/QuizModel.php');
require(WPQP_DIR.'app/models/QuizQuestionModel.php');
require(WPQP_DIR.'app/models/QuizQuestionOptionModel.php');

require(WPQP_DIR.'app/controllers/controller.php');         // Definiação das funções das páginas, semelhante a um "controller"

require(WPQP_DIR.'routes/web.php');
require(WPQP_DIR.'routes/ajax.php');
