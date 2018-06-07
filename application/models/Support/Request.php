<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Request extends CI_Model{

  public function __construct()
  {
    parent::__construct();
    //Codeigniter : Write Less Do More
    $this->guarded = ['submit', '_token'];
    $this->uploadConf = array(
      'doc' => [ 'allowed_types' => 'pdf|docx' ]
    );
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

  public function upload_type($type)
  {
    return $this->uploadConf[$type];
  }
  public function upload($data)
  {
    $config = array_merge($this->uploadConf[$data['type']], ['upload_path' => './upload/' . $data['path']]);
    $this->load->library('upload', $config);
    $uploading = $this->upload->do_upload($data['file_input']) ? true : false;
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
