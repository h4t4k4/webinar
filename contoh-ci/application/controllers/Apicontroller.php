<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Apicontroller extends CI_Controller {
	public function __construct(){
		parent::__construct();
		$this->load->database();
		$this->load->model('todomodel');
	}

	public function show(){
		echo json_encode(["data" => $this->todomodel->getAllTodo()->result()]);
	}
}
