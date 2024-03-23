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

/*
wpqp_page_edit_quiz
wpqp_page_quiz_questions
*/

function wpqp_page_edit_quiz() {
    
        $errors = [];
    
        if( isset( $_POST['action'] ) && $_POST['action'] == 'updatequiz' ) {
            
            // sanitize the data
            $title = sanitize_text_field( $_POST['quiz_title'] );
            $description = sanitize_text_field( $_POST['description'] );
            $layout_html = ""; // sanitize_text_field( $_POST['layout_html'] );
            $layout_question_html = ""; // sanitize_text_field( $_POST['layout_question_html'] );
            $final_link = sanitize_text_field( $_POST['final_link'] );
            $id = sanitize_text_field( $_GET['id'] );
            
    
            // create the new quiz
            $quiz = new WPQPQuizModel();
            $quiz->update( $title, $description, $layout_html, $layout_question_html, $final_link, $id );
    
            $errors = $quiz->errors;
    
            // redirect to the dashboard
            if(count($errors) == 0){
    
                // Redirect to homepage with js
                echo "<script>window.location.href = '".wpqp_get_url('wpqp-home')."';</script>";
                exit;
            }
        }
    
        $quiz = new WPQPQuizModel();
        $quiz->find( $_GET['id'] );
    
        // Apresenta a página
        wpqp_view( "edit-quiz", ['errors' => $errors, 'quiz' => $quiz] );
}

function wpqp_page_edit_html() {
    
    $errors = [];

    if( isset( $_POST['action'] ) && $_POST['action'] == 'updatehtml' ) {
        
        // sanitize the data
        $layout_html =  $_POST['layout_html'] ;
        $layout_question_html =   $_POST['layout_question_html'] ;
        $layout_question_option_html =   $_POST['layout_question_option_html'] ;
        $layout_css =  $_POST['layout_css'] ;
        $layout_js =  $_POST['layout_js'] ;
        

        // create the new quiz
        $quiz = new WPQPQuizModel();
        $quiz->updateHtml( $layout_html, $layout_question_html, $layout_question_option_html, $layout_css, $layout_js, $_GET['id']);

        $errors = $quiz->errors;

        // redirect to the dashboard
        if(count($errors) == 0){

            // Redirect to homepage with js
            echo "<script>window.location.href = '".wpqp_get_url('wpqp-home')."';</script>";
            exit;
        }
    }

    $quiz = new WPQPQuizModel();
    $quiz->find( $_GET['id'] );

    // Apresenta a página
    wpqp_view( "edit-quiz-layout-html", ['errors' => $errors, 'quiz' => $quiz] );
}

function wpqp_page_quiz_questions() {
    
        $errors = [];
    
        if( isset( $_POST['action'] ) && $_POST['action'] == 'newquestion' ) {

            $title = sanitize_text_field( $_POST['title'] );
            $description = sanitize_text_field( $_POST['description'] );
            $quiz_id = sanitize_text_field( $_GET['id'] );

            $question = new WPQPQuizQuestionModel();
            $question->store( $title, $description, $quiz_id );

            $errors = $question->errors;

        }
        if( isset( $_POST['action'] ) && $_POST['action'] == 'updatequestion' ) {

        }
        if( isset( $_POST['action'] ) && $_POST['action'] == 'deletequestion' ) {

        }
        if( isset( $_POST['action'] ) && $_POST['action'] == 'newquestionoption' ) {
                
            $title = sanitize_text_field( $_POST['title'] );
            $question_id = sanitize_text_field( $_POST['question_id'] );
    
            $question_option = new WPQPQuizQuestionOptionModel();
            $question_option->store( $title, $question_id );

            $errors = $question_option->errors;
        }
        if( isset( $_POST['action'] ) && $_POST['action'] == 'updatequestionoption' ) {

        }
        if( isset( $_POST['action'] ) && $_POST['action'] == 'deletequestionoption' ) {

        }
    
        $quiz = new WPQPQuizModel();
        $quiz->find( $_GET['id'] );
    
        // Apresenta a página
        wpqp_view( "manege-quiz", ['errors' => $errors, 'quiz' => $quiz] );
}