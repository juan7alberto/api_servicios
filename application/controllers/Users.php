<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Users extends CI_Controller {

	public function __construct(){
        parent::__construct();	
        $this->load->model('users_modal');
       
    }

	public function index(){
		send_output("access denied",400);
	}

	public function login(){
		$user=$this->input->post();
		//$user = json_decode(file_get_contents("php://input"),true);
		if (!empty($user['username']) && !empty($user['password'])) {

			send_output("success",400);
		}else{
            send_output("error",500);
		}
	}

	public function login2(){

		$username="juan";
		$password="";
		$ldap_dn="uid=".$username.",dc=novutek,dc=local";
		$adserver="192.168.0.31";
		$ldap=ldap_connect($adserver);


		
		//$ldapprdn='novutek.local'. "\\" . $username ;
		ldap_set_option($ldap, LDAP_OPT_PROTOCOL_VERSION, 3);
		ldap_set_option($ldap, LDAP_OPT_REFERRALS, 0);
		$bind=@ldap_bind($ldap, $ldap_dn, $password);
	  
		$msg="";
		if ($bind) {
			
			//$filter="(uid=juan)";
			//$result=ldap_search($ldap_dn,$ldap,$filter);
			//$output=ldap_get_entries($ldap,true);
            //var_dump($output);
			$msg= "logeado";
		}else{
			$msg= "error";
		}
		echo $msg;
		ldap_close($ldap);

	}
	/*
		$username="newton";
		$password="password";
		$ldap_dn="uid=".$username.",dc=example,dc=com";
		$adserver="ldap.forumsys.com";
		$ldap=ldap_connect($adserver);
		
		//$ldapprdn='novutek.local'. "\\" . $username ;
		ldap_set_option($ldap, LDAP_OPT_PROTOCOL_VERSION, 3);
		ldap_set_option($ldap, LDAP_OPT_REFERRALS, 0);
		$bind=@ldap_bind($ldap, $ldap_dn, $password);
	
		$msg="";
		if ($bind) {
			# code...
			$msg= "logeado";
		}else{
			$msg= "error";
		}
		echo $msg;
		ldap_close($ldap);
	*/
}
