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

function wpqp_shortcode($atts = array(), $content = null){

    if(!isset($atts['id']))
        return;

    $return = "";

    $quiz = new WPQPQuizModel();
    $quiz->find($atts['id']);

    $quiz_html = str_replace("\'", "'", str_replace('\"', '"', $quiz->dados->layout_html));
    $quiz_question_html = str_replace("\'", "'", str_replace('\"', '"', $quiz->dados->layout_question_html));
    $quiz_question_option_html = str_replace("\'", "'", str_replace('\"', '"', $quiz->dados->layout_question_option_html));
    $quiz_css = str_replace("\'", "'", str_replace('\"', '"', $quiz->dados->layout_css));
    $quiz_js = str_replace("\'", "'", str_replace('\"', '"', $quiz->dados->layout_js));

    $return = $quiz_html;
    $return = str_replace('[title]', $quiz->dados->title, $return);
    $return = str_replace('[description]', $quiz->dados->description, $return);

    $return_questions = "";
    $questions_count = 1;
    $quiz_questions = $quiz->listQuestions();
    foreach($quiz_questions as $question){
        $options_count = 1;
        $return_question_temp = $quiz_question_html;
        $return_question_temp = str_replace('[title]', $question->dados->title, $return_question_temp);
        $return_question_temp = str_replace('[description]', $question->dados->description, $return_question_temp);

        $return_options = "";
        $quiz_options = $question->listOptions();
        foreach($quiz_options as $option){
            $return_options_temp = $quiz_question_option_html;
            $return_options_temp = str_replace('[title]', $option->dados->title, $return_options_temp);
            $return_options_temp = str_replace('[option_n]', $options_count, $return_options_temp);
            $return_options .= $return_options_temp;
            $options_count++;
        }

        $return_question_temp = str_replace('[options]', $return_options, $return_question_temp);
        $return_question_temp = str_replace('[question_n]', $questions_count, $return_question_temp);
        $return_question_temp = str_replace('[options_count]', $options_count, $return_question_temp);

        $return_questions .= $return_question_temp;
        $questions_count++;
    }

    $return = str_replace('[questions]', $return_questions, $return);

    $return .= "<style>$quiz_css</style>";
    $return .= "<script>$quiz_js</script>";

    $return = str_replace('[questions_count]', $questions_count, $return);
    $return = str_replace('[final_link]', $quiz->dados->final_link, $return);

    return $return;
}

function add_google_fonts() {
    wp_enqueue_style( 'google-fonts', 'https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap', false );   
}