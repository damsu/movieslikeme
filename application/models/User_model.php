<?php
Class User_model extends CI_Model{

	public function requestLogin($username, $password){
		echo("<script>console.log('PHP: ".$username."');</script>");
		$this->db->select('*');
		$this->db->from('users');
		$this->db->where('username',$username);
		$this->db->where('password',$password);
		$query= $this->db->get();
		if ( $query->num_rows() > 0 )
    	{
        	$row = $query->row_array();
        	echo("<script>console.log('PHP: ".$row['username']."');</script>");
        	return $row;
    	}
	}

	public function requestRegistration($insert_data){
		$this->db->insert('users',$insert_data);
		return $this->db->affected_rows();
	}

	public function checkAvailability($username){
		$this->db->select('username');
		$this->db->from('users');
		$this->db->where('username',$username);
		return $this->db->get()->result_array();
	}

	public function requestProfileUpdate($insert_data){
		$this->db->where('userID',$insert_data['userID']);
		$this->db->update('users',$insert_data);
		return $this->db->affected_rows();
	}

	/*public function deleteCustomer($selected_id){
		$this->db->where('id_customers',$selected_id);
		$this->db->delete('customers');
	}
*/
}