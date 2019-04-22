<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Notification extends CI_Controller {

	public function __construct(){
        parent::__construct();	
        $this->load->model('notification_modal');
       
    }

	public function index(){
		send_output("access denied",400);
	}

	public function get_notifications(){

		$output=$this->notification_modal->get_all();
		if ($output) {
			send_output($output,200);
		}else{
			send_output("not found",404);
		}

	}

	public function get_notification($id){

		$output=$this->notification_modal->get_by_id($id);
		if ($output) {
			send_output($output,200);
		}else{
			send_output("not found",404);    
		}

	}

	public function create_notification(){

		$service=$this->input->post(array("message","sender","receiver"));
		$output=$this->notification_modal->create($service);
		if ($output) {
			send_output("success",200);
		}else{
			send_output("error",500);
		}


	}

	public function update_notification($id){

		$service=$this->input->input_stream(array("message","sender","receiver"));
		$output=$this->notification_modal->update($id,$service);
		if ($output) {
			send_output("success",200);
		}else{
			send_output("error",500);
		}


	}
}
