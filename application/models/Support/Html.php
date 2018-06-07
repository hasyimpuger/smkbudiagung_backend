<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Html extends CI_Model{

  public function __construct()
  {
    parent::__construct();
    //Codeigniter : Write Less Do More
  }

  public function btn_delete($id)
  {
    $button = array(
      'class' => 'btn btn-danger btn-sm btn-flat',
      'id' => 'delete',
      'data-id' => $id,
      'content' => '<i class="fa fa-trash"></i>'
    );
    return form_button($button);
  }

  public function btn_edit($id)
  {
    $button = array(
      'class' => 'btn btn-warning btn-sm btn-flat',
      'id' => 'edit',
      'data-id' => $id,
      'content' => '<i class="fa fa-edit"></i>'
    );
    return form_button($button);
  }

  public function link_edit($url)
  {
    return '<a href="'.base_url($url).'" class="btn btn-warning btn-sm btn-flat"><i class="fa fa-edit"></i></a>';
  }

  public function btn_tool($tool, $id)
  {
    if ($tool == 'download') {
      $icon = "fa-download";
    }
    $button = array(
      'class' => 'btn btn-default btn-sm btn-flat',
      'id' => $tool,
      'data-id' => $id,
      'content' => '<i class="fa '.$icon.'"></i>'
    );
    return form_button($button);
  }

}
