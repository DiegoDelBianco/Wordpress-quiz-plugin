<?php

include(WPQP_DIR.'app/validates/QuizValidate.php');

class WPQPQuizModel extends WPQPDefaultModel {

	// use WPQPDefaultModel;

	public $table = WPQP_PREFIX.'quiz';

	public function store($title, $description, $layout_html, $layout_question_html, $final_link){

		$data = [
            'title' => $title,
            'description' => $description,
            'layout_html' => $layout_html,
            'layout_question_html' => $layout_question_html,
            'final_link' => $final_link
        ];

		$validate = new WPQPQuizValidate($data);
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
            'layout_html' => $layout_html,
            'layout_question_html' => $layout_question_html,
            'final_link' => $final_link
        ];

		$validate = new WPQPQuizValidate($data);
		$validate->updateValidate();

		if(count($validate->errors) > 0){
			$this->errors = $validate->errors;
			return false;
		}

		$res = $this->db->update($this->table, $data, ['id' => $this->dados->id]);

		return true;
	}
}