<?php
/*
 * Tabela adicionada na v0.1.0 para gerenciar contas que vão organizar o sistema
 *
 */

class WPQPQuizValidate {
    
        public $errors;
        public $data;
    
        function __construct($data){
            $this->errors = [];
            $this->data = $data;
        }
    
        public function createValidate(){

            $this->titleValidate();
            $this->descriptionValidate();
            //$this->layoutHtmlValidate();
            //$this->layoutQuestionHtmlValidate();
            $this->finalLinkValidate();
    
            return count($this->errors) == 0;
        }
    
        public function updateValidate(){
    
            $this->titleValidate();
            $this->descriptionValidate();
            $this->layoutHtmlValidate();
            $this->layoutQuestionHtmlValidate();
            $this->finalLinkValidate();
    
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

        public function layoutHtmlValidate(){
            if(!isset($this->data['layout_html']) or empty($this->data['layout_html'])){
                $this->errors[] = ['message' => 'Layout HTML é obrigatório', 'code' => 400, 'key' => 'LayoutHtmlRequired'];
            }
            return count($this->errors) == 0;
        }

        public function layoutQuestionHtmlValidate(){
            if(!isset($this->data['layout_question_html']) or empty($this->data['layout_question_html'])){
                $this->errors[] = ['message' => 'Layout de pergunta HTML é obrigatório', 'code' => 400, 'key' => 'LayoutQuestionHtmlRequired'];
            }
            return count($this->errors) == 0;
        }

        public function finalLinkValidate(){
            if(!isset($this->data['final_link']) or empty($this->data['final_link'])){
                $this->errors[] = ['message' => 'Link final é obrigatório', 'code' => 400, 'key' => 'FinalLinkRequired'];
            }
            return count($this->errors) == 0;
        }
}