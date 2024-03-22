<?php 

global $wpqp_dir;

function wpqp_page_home() {

    global $wpdb;

    $quiz = new WPQPQuizModel();
    $list_quiz = $quiz->all();

	wpqp_view( "dashboard", ['list_quiz' => $list_quiz] );
	
}

// Adiciona novo perfil
function wpqp_page_new_quiz() {

    $errors = [];

    if( isset( $_POST['action'] ) && $_POST['action'] == 'createquiz' ) {
        
        // sanitize the data
        $title = sanitize_text_field( $_POST['quiz_title'] );
        $description = sanitize_text_field( $_POST['description'] );
        $layout_html = ""; // sanitize_text_field( $_POST['layout_html'] );
        $layout_question_html = ""; // sanitize_text_field( $_POST['layout_question_html'] );
        $final_link = sanitize_text_field( $_POST['final_link'] );
        

        // create the new quiz
        $quiz = new WPQPQuizModel();
        $quiz->store( $title, $description, $layout_html, $layout_question_html, $final_link );

        $errors = $quiz->errors;

        // redirect to the dashboard
        if(count($errors) == 0){

            // Redirect to homepage with js
            echo "<script>window.location.href = '".wpqp_get_url('wpqp-home')."';</script>";
            exit;
        }
    }

	// Apresenta a página
	wpqp_view( "new-quiz", ['errors' => $errors] );
}
