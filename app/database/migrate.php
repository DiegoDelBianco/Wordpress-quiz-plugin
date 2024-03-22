<?php
/*
 * Este arquivo tem como intenção fazer um controle de tabelas e versionamento do banco de dados
 *
 */

// Define variavel na versão atual do plugin
$array_db = ['0.1.0' => []];

// Define tabela ->  quiz | para para registrar cada quiz criado
$array_db['0.1.0'][WPQP_PREFIX.'quiz']  = "`id` INT(11) NOT NULL AUTO_INCREMENT,";
$array_db['0.1.0'][WPQP_PREFIX.'quiz'] .= "`title` VARCHAR(255) DEFAULT NULL,";
$array_db['0.1.0'][WPQP_PREFIX.'quiz'] .= "`description` TEXT DEFAULT NULL,";
$array_db['0.1.0'][WPQP_PREFIX.'quiz'] .= "`layout_html` MEDIUMTEXT DEFAULT NULL,";
$array_db['0.1.0'][WPQP_PREFIX.'quiz'] .= "`layout_question_html` MEDIUMTEXT DEFAULT NULL,";
$array_db['0.1.0'][WPQP_PREFIX.'quiz'] .= "`final_link` VARCHAR(255) DEFAULT NULL,";
$array_db['0.1.0'][WPQP_PREFIX.'quiz'] .= "PRIMARY KEY (`id`)";

// Define tabela ->  quiz_questions | para registrar cada pergunta de um quiz
$array_db['0.1.0'][WPQP_PREFIX.'quiz_questions']  = "`id` INT(11) NOT NULL AUTO_INCREMENT,";
$array_db['0.1.0'][WPQP_PREFIX.'quiz_questions'] .= "`quiz_id` INT(11) DEFAULT NULL,";
$array_db['0.1.0'][WPQP_PREFIX.'quiz_questions'] .= "`title` VARCHAR(255) DEFAULT NULL,";
$array_db['0.1.0'][WPQP_PREFIX.'quiz_questions'] .= "`description` TEXT DEFAULT NULL,";
$array_db['0.1.0'][WPQP_PREFIX.'quiz_questions'] .= "PRIMARY KEY (`id`)";

// Define tabela ->  quiz_options | para registrar as opções de resposta de uma pergunta
$array_db['0.1.0'][WPQP_PREFIX.'quiz_question_options']  = "`id` INT(11) NOT NULL AUTO_INCREMENT,";
$array_db['0.1.0'][WPQP_PREFIX.'quiz_question_options'] .= "`question_id` INT(11) DEFAULT NULL,";
$array_db['0.1.0'][WPQP_PREFIX.'quiz_question_options'] .= "`title` VARCHAR(255) DEFAULT NULL,";
$array_db['0.1.0'][WPQP_PREFIX.'quiz_question_options'] .= "`is_correct` TINYINT(1) DEFAULT NULL,";      // não sera usado por enquanto
$array_db['0.1.0'][WPQP_PREFIX.'quiz_question_options'] .= "PRIMARY KEY (`id`)";
