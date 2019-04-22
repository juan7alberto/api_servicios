<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Users_modal extends CI_Model {

	public function __construct(){
        parent::__construct();	
       
    }

	public function index()
	{
		send_output("access denied",400);
	}
}
