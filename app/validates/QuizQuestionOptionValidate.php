<?php
/*
 * Tabela adicionada na v0.1.0 para gerenciar contas que vão organizar o sistema
 *
 */

class WPQPQuizQuestionOptionValidate {
    
        public $errors;
        public $data;
    
        function __construct($data){
            $this->errors = [];
            $this->data = $data;
        }
    
        public function createValidate(){
    
            $this->titleValidate();
            $this->questionIdValidate();
    
            return count($this->errors) == 0;
        }
    
        public function updateValidate(){
    
            $this->titleValidate();
    
            return count($this->errors) == 0;
        }

        public function titleValidate(){
            if(!isset($this->data['title']) or empty($this->data['title'])){
                $this->errors[] = ['message' => 'Título é obrigatório', 'code' => 400, 'key' => 'TitleRequired'];
            }
            return count($this->errors) == 0;
        }


        public function questionIdValidate(){
            if(!isset($this->data['question_id']) or empty($this->data['question_id'])){
                $this->errors[] = ['message' => 'Ops algo deu errado.', 'code' => 400, 'key' => 'SomeError'];
            }

            $question = new WPQPQuizQuestionModel();
            $question->find($this->data['question_id']);

            if(!isset($question->dados->id)){
                $this->errors[] = ['message' => 'Quiz não encontrado', 'code' => 404, 'key' => 'QuizNotFound'];
            }

            return count($this->errors) == 0;
        }

}