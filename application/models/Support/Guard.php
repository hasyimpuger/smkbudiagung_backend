<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Guard extends CI_Model{

  public function __construct()
  {
    parent::__construct();
    //Codeigniter : Write Less Do More
    $this->token = "irfanganteng";
  }

  public function decrypt($string)
  {
    $result = md5($string);
    return $result;
  }

  public function middleware($role)
  {
    if ($role != 'auth') {
      if ($this->session->userdata('user_role') != $role) {
        redirect('404');
      }
    }
    else {
      if (!$this->session->userdata('user_log')) {
        redirect('login');
      }
    }
  }

}
