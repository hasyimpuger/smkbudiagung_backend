<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Request extends CI_Model{

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

  public function upload($file_input, $config)
  {
    $this->load->library('upload', $config);
    $uploading = $this->upload->do_upload($file_input) ? true : false;
    if (!$uploading) {
      return array(
        'message' => 'error',
        'data' => $this->upload->display_errors()
      );
    }
    else {
      return array(
        'message' => 'success',
        'data' => $this->upload->data()
      );
    }
  }

}
