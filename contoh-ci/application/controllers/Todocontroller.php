<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Todocontroller extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->database();
		$this->load->helper('url');
		$this->load->model('todomodel');
	}
	
	public function index()
	{
		$this->load->view('todoview',
			["todo" => $this->todomodel->getAllTodo()->result() ]);
	}

	public function tambah(){		
		$this->todomodel->insertTodo(['todo' => $this->input->post('todo')]);

		redirect('todo');
	}

	public function hapus($id){
		$this->todomodel->hapusTodo($id);

		redirect('todo');
	}

	public function selesai($id){
		$this->todomodel->rubahStatus($id);

		redirect('todo');
	}
}
