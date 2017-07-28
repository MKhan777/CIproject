<?php

Class Shout_Model extends CI_Model{
	

	public function __construct() {

	//constructor initialize everything
		parent::__construct();
	}


	//e`nter user details in db
	public function insert($data)
	{

		//check wether username etc exists or not
			$check = "user_name =" . "'" . $data['user_name'] . "'";
			$this->db->select('*');
			$this->db->from('user_login');
			$this->db->where($check);
			$this->db->limit(1);
			//check if it has only one 
			$query = $this->db->get();



	if($query->num_rows() == 0)
	{
		$this->db->insert('user_login', $data);
		if ($this->db->affected_rows() > 0) {
			return true;
			}
	}
	else 
		return false;//already exists


	}



	//login details of user

	public function login($data) {

			$condition = "user_name =" . "'" . $data['username'] . "' AND " . "user_password =" . "'" . $data['password'] . "'";
			$this->db->select('*');
			$this->db->from('user_login');
			$this->db->where($condition);
			$this->db->limit(1);
			$query = $this->db->get();

		if ($query->num_rows() == 1) {

			///if one and only one row exists
		return true;
		}

		 else
			return false;
		
			}









	//display on top logged in 



			public function read_user_info($username) {

			$check = "user_name =" . "'" . $username . "'";
			$this->db->select('*');
			$this->db->from('user_login');
			$this->db->where($check);
			$this->db->limit(1);
			$query = $this->db->get();

			if ($query->num_rows() == 1) {
			return $query->result();
			} 

			else
					return false;
			}




			//display all messages


	public function all_shouts()
	{
		$data=array();
		

			$this->db->select('*');
			$this->db->from('shouts');
			    $this->db->group_by('id');

			$this->db->order_by('id','DESC');
			$query=$this->db->get();
			
			//$data=$query->result();
			
				

		if($query->num_rows()>0)
		{

			foreach ($query->result() as $row) {

				# code...
				$data[] = $row;

			}
		}

		return $data;
		$query->free_result();
	}

	public function create()
	{


		if (isset($this->session->userdata['logged_in'])) {
		$username = ($this->session->userdata['logged_in']['username']);
		$email = ($this->session->userdata['logged_in']['email']);

	}
		


		$data = array(
				'name' => $username,
				'email' => $email,
				'message' => $this->form_validation->set_value('message'),


			);
		$this->db->insert('shouts',$data);

	}

}








?>