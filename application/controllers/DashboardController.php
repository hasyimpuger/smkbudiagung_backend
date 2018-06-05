<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class DashboardController extends CI_Controller{

  public function __construct()
  {
    parent::__construct();
    //Codeigniter : Write Less Do More
    $this->menu = "dashboard";
    // middleware
    $this->Guard->middleware('auth');
    $this->Guard->middleware('admin');
  }

  function index()
  {
    // breadcumbs
    $breadcumbs = array(
      'dashboard' => 'dashboard',
      'huha' => 'hihi',
    );
    // data for view
    $data = array(

    );
    // initialize
    $init = array(
      'menu'       => $this->menu,
      'content'    => 'dashboard',
      'title'      => 'dashboard',
      'sub_title'  => '',
      'breadcumbs' => isset($breadcumbs) ? $breadcumbs : array(),
      'data'       => $data
    );
    // load view
    $this->load->view('layouts/admin', $init);
  }

}
