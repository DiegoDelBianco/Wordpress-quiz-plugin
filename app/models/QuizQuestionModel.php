<?php

include(WPQP_DIR.'app/validates/QuizQuestionValidate.php');

class WPQPQuizQuestionModel extends WPQPDefaultModel {

	// use WPQPDefaultModel;

	public $table = WPQP_PREFIX.'quiz_questions';

	public function store($title, $description, $quiz_id){

		$data = [
            'title' => $title,
            'description' => $description,
            'quiz_id' => $quiz_id
        ];

		$validate = new WPQPQuizQuestionValidate($data);
		$validate->createValidate();

		if(count($validate->errors) > 0){
			$this->errors = $validate->errors;
			return false;
		}

		$this->db->insert($this->table, $data);

		$this->find($this->db->insert_id);

		return true;
	}

	public function update($title, $description, $layout_html, $layout_question_html, $final_link, $id = null){

		if(!isset($this->dados->id)) $this->find($id);

		if($id == null and !isset($this->dados->id)) return false;

		$data = [
            'title' => $title,
            'description' => $description,
        ];

		$validate = new QuizQuestionValidate($data);
		$validate->updateValidate();

		if(count($validate->errors) > 0){
			$this->errors = $validate->errors;
			return false;
		}

		$res = $this->db->update($this->table, $data, ['id' => $this->dados->id]);

		return true;
	}

    public function listOptions(){

        $res = $this->db->get_results(
            $this->db->prepare("select * from ".WPQP_PREFIX."quiz_question_options
                where question_id = '%d'", $this->dados->id));

        $options = [];

        foreach($res as $option){
            $optionTemp = new WPQPQuizQuestionOptionModel();
            $optionTemp->find($option->id);

            $options[] = $optionTemp;
        }

        return $options;
    }
}