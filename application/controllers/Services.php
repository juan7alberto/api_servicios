<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Services extends CI_Controller {

	public function __construct(){
        parent::__construct();	
        $this->load->model('services_modal');
       
    }

	public function index(){
		send_output("access denied",400);
	}

	public function get_services(){

		$output=$this->services_modal->get_all();
		if ($output) {
			send_output($output,200);
		}else{
			send_output("not found",404);
		}

	}

	public function get_service($id){

		$output=$this->services_modal->get_by_id($id);
		if ($output) {
			send_output($output,200);
		}else{
			send_output("not found",404);    
		}

	}

	public function create_service(){

		$service=$this->input->post(array("name","url","image","description"));
		$output=$this->services_modal->create($service);
		if ($output) {
			send_output("success",200);
		}else{
			send_output("error",500);
		}


	}

	public function update_service($id){

		$service=$this->input->input_stream(array("name","url","image","description"));
		$output=$this->services_modal->update($id,$service);
		if ($output) {
			send_output("success",200);
		}else{
			send_output("error",500);
		}


	}

}
