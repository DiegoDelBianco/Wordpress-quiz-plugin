<?php

include(WPQP_DIR.'app/validates/QuizQuestionOptionValidate.php');

class WPQPQuizQuestionOptionModel extends WPQPDefaultModel {

	// use WPQPDefaultModel;

	public $table = WPQP_PREFIX.'quiz_question_options';

	public function store($title, $question_id){
        
		$data = [
            'title' => $title,
            'question_id' => $question_id,
        ];

		$validate = new WPQPQuizQuestionOptionValidate($data);
		$validate->createValidate();

		if(count($validate->errors) > 0){
			$this->errors = $validate->errors;
			return false;
		}

		$this->db->insert($this->table, $data);

		$this->find($this->db->insert_id);

		return true;
	}

	public function update($title){

		if(!isset($this->dados->id)) $this->find($id);

		if($id == null and !isset($this->dados->id)) return false;

		$data = [
            'title' => $title,
        ];

		$validate = new WPQPQuizQuestionOptionValidate($data);
		$validate->updateValidate();

		if(count($validate->errors) > 0){
			$this->errors = $validate->errors;
			return false;
		}

		$res = $this->db->update($this->table, $data, ['id' => $this->dados->id]);

		return true;
	}
}