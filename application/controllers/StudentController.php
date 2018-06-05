<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class StudentController extends CI_Controller{

  public function __construct()
  {
    parent::__construct();
    //Codeigniter : Write Less Do More
    $this->menu = array(
      'menu'    => 'student',
      'submenu' => ['official', 'applicant']
    );
    // middleware
    $this->Guard->middleware('auth');
    $this->Guard->middleware('admin');
  }

  function index()
  {
    // breadcumbs
    $breadcumbs = array(
      // text        // link
      'dashboard'  => 'dashboard',
      'siswa'      => 'student',
    );
    // data for view
    $data = array(

    );
    // initialize
    $init = array(
      'menu'       => $this->menu['menu'],
      'content'    => 'student/list',
      'title'      => 'Siswa',
      'sub_title'  => 'List Siswa',
      'breadcumbs' => isset($breadcumbs) ? $breadcumbs : array(),
      'data'       => $data
    );
    // load view
    $this->load->view('layouts/admin', $init);
  }

  public function official()
  {
    // breadcumbs
    $breadcumbs = array(
      // text        // link
      'dashboard'  => 'dashboard',
      'siswa'      => 'student'
    );
    // data for view
    $data = array(

    );
    // initialize for page
    $init = array(
      'menu'       => $this->menu['menu'],
      'submenu'    => $this->menu['submenu'][0],
      'content'    => 'student/list',
      'title'      => 'Siswa',
      'sub_title'  => 'Siswa Resmi',
      'breadcumbs' => isset($breadcumbs) ? $breadcumbs : array(),
      'data'       => $data
    );
    // load view
    $this->load->view('layouts/admin', $init);
  }

}
