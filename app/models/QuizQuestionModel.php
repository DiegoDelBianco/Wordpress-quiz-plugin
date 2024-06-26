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

	public function update($title, $description, $id = null){

		if(!isset($this->dados->id)) $this->find($id);

		if($id == null and !isset($this->dados->id)) return false;

		$data = [
            'title' => $title,
            'description' => $description,
        ];

		$validate = new WPQPQuizQuestionValidate($data);
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

	public function delete($id = null){

		if(!isset($this->dados->id)) $this->find($id);

		if($id == null and !isset($this->dados->id)) return false;

		$options = $this->listOptions();
		foreach ($options as $key => $value) {
			$value->delete();
		}
		
		$this->destroy();

		return true;
	}
}