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
      'teach',
      'schedule',
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
      'category' => $category
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
      $row[] = $this->Html->btn_delete($field->teacher_file_id) . ' ' . $this->Html->link_edit('guru/upload/'.$category.'/edit'.'/'. $field->teacher_file_id) . ' ' . $this->Html->btn_tool('download', $field->teacher_file_id);
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
      'upload' => 'upload/' . $category . '/',
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

  public function upload_detail($category, $id)
  {
    // breadcumbs
    $breadcumbs = array(
      'dashboard' => '',
      'upload' => 'upload/' . $category . '/',
      // active
      'detail'
    );
    // data for view
    $data = array(
      'category' => $category,
      'teacher_file' => $this->db->get_where('teacher_files', ['teacher_file_id' => $id])->row()
    );
    // initialize
    $init = array(
      'breadcumbs' => $breadcumbs,
      'menu'       => $this->upload_init($category)['menu'],
      'submenu'    => $this->upload_init($category)['submenu'],
      'content'    => 'upload/detail',
      'title'      => $this->upload_init($category)['title'],
      'sub_title'  => "Detail " . $category,
      'data'       => $data
    );
    // load view
    $this->load->view('layouts/teacher', $init);
  }

  public function upload_edit($category, $id)
  {
    // breadcumbs
    $breadcumbs = array(
      'dashboard' => '',
      'upload' => 'upload/' . $category . '/',
      // active
      'edit'
    );
    // data for view
    $data = array(
      'category' => $category,
      'teacher_file' => $this->db->get_where('teacher_files', ['teacher_file_id' => $id])->row()
    );
    // initialize
    $init = array(
      'breadcumbs' => $breadcumbs,
      'menu'       => $this->upload_init($category)['menu'],
      'submenu'    => $this->upload_init($category)['submenu'],
      'content'    => 'upload/edit',
      'title'      => $this->upload_init($category)['title'],
      'sub_title'  => "Edit " . $category,
      'data'       => $data
    );
    // load view
    $this->load->view('layouts/teacher', $init);
  }

  public function upload_update($category, $id)
  {
    if ($this->input->post()) {
      // data then
      $then = $this->db->get_where($this->upload_init()['table'], ['teacher_file_id' => $id])->row();
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
      }
      // not insert
      else {
        echo "hahal";
      }
      // params for insert
      $params = array_merge($this->Request->all(), $dataMerge);
      // do
      $insert = $this->db->insert($this->upload_init($category)['table'], $params);
      // redirect after insert
      $redirect = ( $this->input->post('submit') == 'silent' ) ? '/tambah' : '/';
      redirect('guru/upload/' . $category .$redirect);
    }
    else {
      redirect('404');
    }
  }

  public function teach_init()
  {
    return array(
      'table'   => 'teachs',
      'menu'    => $this->menu[2],
      'title'   => 'Mengajar',
      'tables'  => [
        'table'    => 'teachs',
        'fillable' => [null, 'study_name', 'class_name', 'program_study_abbr', null],
        'searchable' => ['study_name', 'class_name', 'program_study_abbr'],
        'orderable' => array('teach_id', 'desc')
      ]
    );
  }
  public function teach_index()
  {
    // breadcumbs
    $breadcumbs = array(
      'dashboard' => '',
      // active
      'mengajar'
    );
    // data for view
    $data = array(

    );
    // initialize
    $init = array(
      'breadcumbs' => $breadcumbs,
      'menu'       => $this->teach_init()['menu'],
      'content'    => 'teach/list',
      'title'      => $this->teach_init()['title'],
      'sub_title'  => 'List',
      'data'       => $data,
      'script'     => 'teacher'
    );
    // load view
    $this->load->view('layouts/teacher', $init);
  }

  public function teach_data()
  {
    $join = array(
      'studies' => 'studies.study_id = teachs.teach_study_id',
      'classes' => 'classes.class_id = teachs.teach_class_id',
      'program_studies' => 'program_studies.program_study_id = classes.class_program_study_id'
    );
    $tables = $this->Tables->get(array_merge($this->teach_init()['tables'], ['join' => $join]));
    $list = $tables['query'];
    $data = array();
    $no = $_POST['start'];

    foreach ($list as $field) {
      $no++;
      $row = array();
      $row[] = $no;
      $row[] = $field->class_name;
      $row[] = $field->program_study_abbr;
      $row[] = $field->study_name;
      $row[] = $this->Html->btn_delete($field->teach_id) . ' ' . $this->Html->link_edit('guru/mengajar/edit'.'/'. $field->teach_id) . ' ' . $this->Html->btn_tool('download', $field->teach_id);
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

  public function teach_create()
  {
    // breadcumbs
    $breadcumbs = array(
      'dashboard' => '',
      'mengajar' => 'mengajar',
      // active
      'tambah'
    );
    // data for view
    $data = array(
      'classes' => $this->db->get('classes'),
      'studies' => $this->db->get('studies')
    );
    // initialize
    $init = array(
      'breadcumbs' => $breadcumbs,
      'menu'       => $this->teach_init()['menu'],
      'content'    => 'teach/create',
      'title'      => $this->teach_init()['title'],
      'sub_title'  => 'Tambah',
      'data'       => $data
    );
    // load view
    $this->load->view('layouts/teacher', $init);
  }
  public function teach_store()
  {
    if ($this->input->post()) {
      $dataMerge = array(
        'teach_teacher_id' => $this->session->userdata('user_data')->teacher_id
      );
      // params for insert
      $params = array_merge($this->Request->all(), $dataMerge);
      // do
      $insert = $this->db->insert($this->teach_init()['table'], $params);
      // redirect after insert
      $redirect = ( $this->input->post('submit') == 'silent' ) ? '/tambah' : '/';
      redirect('guru/mengajar');
    }
  }

  public function score_student_init()
  {
    return array(
      'table'   => ['score_types', 'scores', 'teachs', 'students'],
      'menu'    => $this->menu[4],
      'title'   => 'Nilai Siswa',
      'tables'  => array(
        'teach' => array(
          'table'    => 'teachs',
          'fillable' => [null, 'study_name', 'class_name', null],
          'searchable' => ['study_name', 'class_name'],
          'orderable' => array('teach_id', 'desc')
        )
      )
    );
  }
  public function score_student_index()
  {
    // breadcumbs
    $breadcumbs = array(
      'dashboard' => '',
      // active
      'kelas ajar'
    );
    // data for view
    $data = array(

    );
    // initialize
    $init = array(
      'breadcumbs' => $breadcumbs,
      'menu'       => $this->score_student_init()['menu'],
      'content'    => 'score_student/class_list',
      'title'      => $this->score_student_init()['title'],
      'sub_title'  => 'Kelas Ajar',
      'data'       => $data,
      'script'     => 'teacher'
    );
    // load view
    $this->load->view('layouts/teacher', $init);
  }

  public function score_student_class_teach_data()
  {
    $join = array(
      'classes' => 'classes.class_id = teachs.teach_class_id'
    );
    $tables = $this->Tables->get(array_merge($this->score_student_init()['tables']['teach'], ['join' => $join]));
    $list = $tables['query'];
    $data = array();
    $no = $_POST['start'];

    foreach ($list as $field) {
      $no++;
      $row = array();
      $row[] = $no;
      $row[] = $field->class_name;
      $row[] = $this->Html->link('guru/nilai-siswa/kelas'.'/'. $field->class_id);
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

  public function score_student_class($class_id)
  {
    // breadcumbs
    $breadcumbs = array(
      'dashboard' => '',
      'kelas ajar' => 'nilai-siswa',
      // active
      'kategori nilai'
    );
    // data for view
    $data = array(

    );
    // initialize
    $init = array(
      'breadcumbs' => $breadcumbs,
      'menu'       => $this->score_student_init()['menu'],
      'content'    => 'score_student/category_score_list',
      'title'      => $this->score_student_init()['title'],
      'sub_title'  => 'Kategori Nilai',
      'data'       => $data,
      'script'     => 'teacher'
    );
    // load view
    $this->load->view('layouts/teacher', $init);
  }

}
