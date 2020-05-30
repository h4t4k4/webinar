<?php

class Todomodel extends CI_Model {
	protected $table = "tbltodo";

	public function getAllTodo(){
		return $this->db->get($this->table);			
	}

	public function insertTodo($data){
		return $this->db->insert($this->table,$data);
	}

	public function rubahStatus($id){
		return $this->db
			->where('id',$id)
			->update($this->table,['status' => 1]);
	}

	public function hapusTodo($id){
		return $this->db
				->where('id',$id)
				->delete($this->table);
	}
}
