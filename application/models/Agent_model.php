<?php

/**

*/
class Agent_model extends CI_Model
{
	
	function __construct()
	{
		parent::__construct();
	}

	public function getAgents()
	{
		$this->db->select('*');
		$this->db->from('agent');

		$data = $this->db->get();
		return $data->result();
	}

	public function delete_agent($user_username){

		$this->db->where('user_username', $user_username);
		$res = $this->db->delete('agent');
		
		$this->db->where('username',$user_username);
		$res1 = $this->db->delete('user');
		if ($res && $res1) {
			return TRUE;
		}
		else 
		{
			return FALSE;
		}
	}

	public function accept_agent($user_username){

	 	$data = array(
	 		'status' => 'accepted'
	 	);

		$this->db->where('user_username', $user_username);
		$res = $this->db->update('agent', $data);
		if ($res) {
			return TRUE;
		}else {
			return FALSE;
		}
	}


	public function search_email($username){
			
		$this->db->where('user_username',$username);
		$query = $this->db->get('agent');
		return $query->result();
	}



}
?>