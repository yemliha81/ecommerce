<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {
    
    public $data = array();

	public function __construct()
    {
        parent::__construct();

		//echo 'Hello from constructer <br>';
		if(empty($_SESSION['language'])){
			$_SESSION['language'] = 'tr';
		}

	}
    
	public function index()
	{	
		
		$data['products'] = $this->db->select('*')
			->get('products')->result_array();
		
		$this->load->view('home', $data);
	}
	
}
