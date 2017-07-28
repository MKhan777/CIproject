<?php

Class Shouts_controller extends CI_Controller{
	

	public function __construct() {

	//constructor initialize everything
		parent::__construct();
	}

	public function index()
	{
		$data['shouts']=$this->shout_model->all_shouts();
		$this->load->view('shouts/login_form',$data);
	
	}

	public function create()
	{
		$data['shouts']= $this->shout_model->all_shouts();
		

		$this->form_validation->set_rules('message','Shout','required|trim|htmlspecialchars');


		if($this->form_validation->run()==FALSE)
		{
			
			$this->load->view('shouts/index',$data);
		
		}

		else 
		{
			$this->shout_model->create();
			$this->session->set_flashdata('success', 'Thanks for shouting!');
			redirect('Shouts_controller/index');


		}
	
	}


// Logout from logged in page
public function logout() {

// Removing session data
$sess_array = array(
'username' => ''
);
$this->session->unset_userdata('logged_in', $sess_array);
$data['message_display'] = 'Successfully Logout';

//again show log in page after that
$this->load->view('shouts/login_form', $data);
}




}








?>