<?php
/*
 * Tabela adicionada na v0.1.0 para gerenciar contas que vão organizar o sistema
 *
 */

class WPQPDefaultModel {
	public $dados;
	public $db;
    public $errors;

	function __construct(){
		global $wpdb;
		$this->db = $wpdb;
        $this->errors = [];
	}

	/*public function store($data){

		$this->db->insert($this->table, $data);

		$this->find($this->db->insert_id);

		return true;
	}*/

	public function find($id){
		$res = $this->db->get_results(
			$this->db->prepare("select * from ".$this->table."
				where id = '%d'", $id));

		if( count( $res ) == 0 ){ 
            $errors[] = ['message' => 'Registro não encontrado', 'code' => 404, 'key' => 'RegisterNotFound'];
            return false;
        }

		$this->dados = $res[0];

		return true;
	}

	public static function count_all(){
		$instancia = new self();

		$res = $instancia->db->get_results($instancia->db->prepare("select * from ".$instancia->table));

		return count( $res );
	}

	public static function all(){
		$instancia = new self();

		$res = $instancia->db->get_results("select * from " . $instancia->table);

		return $res;
	}


	/*public function update($data, $id = null){

		if(!isset($this->dados->id)) $this->find($id);

		if($id == null and !isset($this->dados->id)){ 
            $errors[] = ['message' => 'Registro não encontrado', 'code' => 404, 'key' => 'RegisterNotFound'];
            return false;
        }

		$res = $this->db->update($this->table, $data, ['id' => $this->dados->id]);

		return true;
	}*/


	public function destroy($id = null){

		if(!isset($this->dados->id)) $this->find($id);

		if($id == null and !isset($this->dados->id)){ 
            $errors[] = ['message' => 'Registro não encontrado', 'code' => 404, 'key' => 'RegisterNotFound'];
            return false;
        }

		$res = $this->db->get_results(
			$this->db->prepare("delete from ".$this->table."
				where id = '%d'", $this->dados->id));

		return true;
	}
}