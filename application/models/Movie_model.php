<?php
Class Movie_model extends CI_Model{

	public function requestAddMovie($insert_data){
		$this->db->insert('movies',$insert_data);
		$insert_id = $this->db->insert_id();
   		return  $insert_id;
	}

	public function getAllMovies($order_field,$order_direction){
		$this->db->select('*');
		$this->db->from('movies');
		$this->db->order_by( $order_field, $order_direction );
		return $this->db->get()->result_array();
	}

	public function getOneMovie($movieID){
		$this->db->select('*');
		$this->db->from('movies');
		$this->db->where('movieID',$movieID);
		return $this->db->get()->result_array();
	}
}