<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Request extends CI_Controller{

  public function __construct()
  {
    parent::__construct();
    //Codeigniter : Write Less Do More
    $this->guarded = ['submit', '_token'];
  }

  function all()
  {
    $request = $_POST;
    foreach ($this->guarded as $guard) {
      if ($guard) {
        unset($request[$guard]);
      }
    }
    return $request;
  }

}
