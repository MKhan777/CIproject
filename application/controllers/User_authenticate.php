<?php


Class User_authenticate extends CI_Controller {

public function __construct() {

	//constructor initialize everything
		parent::__construct();



			}
			//end constructor


			//now load the view using index method
			public function index() 
			{
				$data['shouts']=$this->shout_model->all_shouts();
				$this->load->view('shouts/login_form');
				
				

			}

			//user register
			public function user_registration_view() {
					$this->load->view('shouts/registration_form');
						}

						public function new_user_registration() {


							// form validation
		$this->form_validation->set_rules('username', 'Username', 'trim|required');
		$this->form_validation->set_rules('email_value', 'Email', 'trim|required');
		$this->form_validation->set_rules('password', 'Password', 'trim|required');


						

						if ($this->form_validation->run() == FALSE) {
								$this->load->view('shouts/registration_form');
} else {
			$data = array(
			'user_name' => $this->input->post('username'),
			'user_email' => $this->input->post('email_value'),
			'user_password' => $this->input->post('password')
				);

			$result= $this->shout_model->insert($data);
	if ($result == TRUE) {
		$data['message_display'] = 'Registration Succesful !';
		$this->load->view('shouts/login_form', $data);
} else {
		$data['message_display'] = 'Already exist!';
		$this->load->view('shouts/registration_form', $data);
}


}
}
	

	public function user_login_process() {

		//check if logged in then log in

$this->form_validation->set_rules('username', 'Username', 'trim|required');
$this->form_validation->set_rules('password', 'Password', 'trim|required');

if ($this->form_validation->run() == FALSE) {
if(isset($this->session->userdata['logged_in'])){

	$data['shouts']=$this->shout_model->all_shouts();
$this->load->view('shouts/index',$data);
}else{
$this->load->view('shouts/login_form');
}
} else {
$data = array(
'username' => $this->input->post('username'),
'password' => $this->input->post('password')
);

//check from the model if the details are right
$result = $this->shout_model->login($data);
if ($result == TRUE) {

$username = $this->input->post('username');
$result = $this->shout_model->read_user_info($username);
if ($result != false) {
$session_data = array(
'username' => $result[0]->user_name,
'email' => $result[0]->user_email,
);
// Add user data in session
$this->session->set_userdata('logged_in', $session_data);

$data['shouts']=$this->shout_model->all_shouts();
$this->load->view('shouts/index',$data);
}
} else {
$data = array(
'error_message' => 'Invalid details : Username or Password'
);

//again load view login
$this->load->view('shouts/login_form', $data);
}
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
