<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Notification extends CI_Controller {

	public function __construct(){
        parent::__construct();	
        $this->load->model('notification_modal');
       
    }

	public function index()
	{
		send_output("access denied",400);
	}
}
