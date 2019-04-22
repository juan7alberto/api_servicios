<?php 
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
	
	if(!function_exists("send_output")){
	    function send_output($response,$code){
	        $ci = & get_instance();
			$ci->output->set_status_header($code)
					   ->set_content_type("application/json","utf-8")
					   ->set_output(json_encode(array("response"=>$response)))
					   ->_display();
			exit;
	    }
	}

 ?>