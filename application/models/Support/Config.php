<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Config extends CI_Model{

  public function __construct()
  {
    parent::__construct();
    //Codeigniter : Write Less Do More
  }

  public function upload_img($path)
  {
    return array(
      'upload_path' => './upload/img/' . $path . '/',
      'allowed_types' => 'png|jpg|jpeg|gif'
    );
  }

}
