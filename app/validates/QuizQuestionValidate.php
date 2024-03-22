<?php
/*
 * Tabela adicionada na v0.1.0 para gerenciar contas que vão organizar o sistema
 *
 */

class WPQPQuizQuestionValidate {
    
        public $errors;
        public $data;
    
        function __construct($data){
            $this->errors = [];
            $this->data = $data;
        }
    
        public function createValidate(){
    
            $this->titleValidate();
            $this->descriptionValidate();
            $this->quizIdValidate();
    
            return count($this->errors) == 0;
        }
    
        public function updateValidate(){
    
            $this->titleValidate();
            $this->descriptionValidate();
    
            return count($this->errors) == 0;
        }

        public function titleValidate(){
            if(!isset($this->data['title']) or empty($this->data['title'])){
                $this->errors[] = ['message' => 'Título é obrigatório', 'code' => 400, 'key' => 'TitleRequired'];
            }
            return count($this->errors) == 0;
        }

        public function descriptionValidate(){
            if(!isset($this->data['description']) or empty($this->data['description'])){
                $this->errors[] = ['message' => 'Descrição é obrigatória', 'code' => 400, 'key' => 'DescriptionRequired'];
            }
            return count($this->errors) == 0;
        }

        public function quizIdValidate(){
            if(!isset($this->data['quiz_id']) or empty($this->data['quiz_id'])){
                $this->errors[] = ['message' => 'Ops algo deu errado.', 'code' => 400, 'key' => 'SomeError'];
            }

            $quiz = new WPQPQuizModel();
            $quiz->find($this->data['quiz_id']);

            if(!isset($quiz->dados->id)){
                $this->errors[] = ['message' => 'Quiz não encontrado', 'code' => 404, 'key' => 'QuizNotFound'];
            }

            return count($this->errors) == 0;
        }

}