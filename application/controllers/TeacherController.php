<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class TeacherController extends CI_Controller{

  public function __construct()
  {
    parent::__construct();
    // middleware
    $this->Guard->middleware('auth');
    $this->Guard->middleware('teacher');
    // init
    $this->menu = [
      'dashboard',
      array(
        'menu' => 'upload',
        'submenu' => ['silabus', 'rpp', 'modul']
      ),
      'score'
    ];
  }

  // dashboard
  public function dashboard_init()
  {
    $menu = $this->menu[0];
    return array(
      'menu'    => $menu,
      'title'   => 'Dashboard'
    );
  }
  function index()
  {
    // breadcumbs
    $breadcumbs = array(
      // active
      'dashboard'
    );
    // data for view
    $data = array(

    );
    // initialize
    $init = array(
      'breadcumbs' => $breadcumbs,
      'menu'       => $this->dashboard_init()['menu'],
      'content'    => 'dashboard',
      'title'      => 'Dashboard',
      'sub_title'  => '',
      'data'       => $data
    );
    // load view
    $this->load->view('layouts/teacher', $init);
  }

  // upload
  public function upload_init($category)
  {
    if ($category == 'silabus') $category = 0;
    elseif ($category == 'rpp') $category = 1;
    elseif ($category == 'modul') $category = 2;
    $current_menu = $this->menu[1]['submenu'][$category];
    return array(
      'table'   => 'teacher_files',
      'menu'    => $this->menu[1]['menu'],
      'submenu' => $current_menu,
      'title'   => 'Upload',
      'tables'  => [
        'table'    => 'teacher_files',
        'fillable' => [null, 'teacher_file_title', null],
        'searchable' => ['teacher_file_title'],
        'orderable' => array('teacher_file_id', 'asc')
      ]
    );
  }
  public function upload_index($category)
  {
    // breadcumbs
    $breadcumbs = array(
      'dashboard' => '',
      // active
      'upload'
    );
    // data for view
    $data = array(

    );
    // initialize
    $init = array(
      'breadcumbs' => $breadcumbs,
      'menu'       => $this->upload_init($category)['menu'],
      'submenu'    => $this->upload_init($category)['submenu'],
      'content'    => 'upload/list',
      'title'      => $this->upload_init($category)['title'],
      'sub_title'  => $category,
      'data'       => $data,
      'script'     => 'teacher'
    );
    // load view
    $this->load->view('layouts/teacher', $init);
  }
  public function upload_data($category)
  {
    $where = array(
      'teacher_file_type' => $category
    );
    $tables = $this->Tables->get(array_merge($this->upload_init($category)['tables'], ['where' => $where]));
    $list = $tables['query'];
    $data = array();
    $no = $_POST['start'];

    foreach ($list as $field) {
      $no++;
      $row = array();
      $row[] = $no;
      $row[] = $field->teacher_file_title;
      $row[] = '<button type="button" class="btn btn-danger btn-sm btn-flat" id="hapus" data-id="'. $field->teacher_file_id .'"><i class="fa fa-trash"></i></button>';

      $data[] = $row;
    }

    $result = array(
      'draw' => $_POST['draw'],
      'recordsTotal' => $tables['count_all'],
      'recordsFiltered' => $tables['count_filtered'],
      'data' => $data
    );

    echo json_encode($result);
  }
  public function upload_create($category)
  {
    // breadcumbs
    $breadcumbs = array(
      'dashboard' => '',
      'upload' => 'upload/',
      // active
      'tambah'
    );
    // data for view
    $data = array(
      'category' => $category
    );
    // initialize
    $init = array(
      'breadcumbs' => $breadcumbs,
      'menu'       => $this->upload_init($category)['menu'],
      'submenu'    => $this->upload_init($category)['submenu'],
      'content'    => 'upload/create',
      'title'      => $this->upload_init($category)['title'],
      'sub_title'  => $category,
      'data'       => $data
    );
    // load view
    $this->load->view('layouts/teacher', $init);
  }

  public function upload_store($category)
  {
    if ($this->input->post()) {
      // upload
      $upload = $this->Request->upload([
        'type' => 'doc',
        'file_input' => 'teacher_file_name',
        'path' => 'doc/teacher/'
      ]);
      // insert
      if ($upload['message'] == 'success') {
        // data merge
        $dataMerge['teacher_file_teacher_id'] = $this->session->userdata('user_data')->teacher_id;
        $dataMerge['teacher_file_type'] = $category;
        $dataMerge['teacher_file_name'] = $upload['data']['file_name'];
        $dataMerge['teacher_file_ext']  = $upload['data']['file_ext'];
        $dataMerge['teacher_file_size'] = $upload['data']['file_size'];
        // params for insert
        $params = array_merge($this->Request->all(), $dataMerge);
        // do
        $insert = $this->db->insert($this->upload_init($category)['table'], $params);
        // redirect after insert
        $redirect = ( $this->input->post('submit') == 'silent' ) ? '/tambah' : '/';
        redirect('guru/upload/' . $category .$redirect);
      }
      // not insert
      else {
        echo "hahal";
      }
    }
    else {
      redirect('404');
    }
  }

}
