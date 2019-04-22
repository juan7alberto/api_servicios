<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Services_modal extends CI_Model {

	 public function __construct(){
        parent::__construct();	
    }

    public function get_all(){
    	$this->db->select("*");
    	$this->db->from("services"); 
    	return $this->db->get()->result();

    }

    public function get_by_id($id){
    	$this->db->where("id",$id);
    	$this->db->select("*");
    	$this->db->from("services");
    	return $this->db->get()->row();

    }

    public function create($data){
        if ($this->db->insert("services",$data)) {
        	return true;
        }else{
        	return false;
        }

    }

    public function update($id,$data){
        $this->db->set($data);
        $this->db->where("id",$id);
        if($this->db->update("services")){
        	return true;
        }else{
        	return false;
        }
    }
}
