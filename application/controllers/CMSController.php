<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class CMSController extends CI_Controller{

  public function __construct()
  {
    parent::__construct();
    //Codeigniter : Write Less Do More
    $this->menu = array(
      'menu'    => 'cms',
      'submenu' => [
        array('menu' => 'school', 'submenu' => ['about', 'class']),
        array('menu' => 'quote', 'submenu' => ['list', 'owner_quote']),
        'motto', 'fitur', 'sponsor']
    );
    // middleware
    $this->Guard->middleware('auth');
    $this->Guard->middleware('admin');
    // model
    $this->load->model('Sponsor');
  }

  function sponsor_init()
  {
    $menu = $this->menu['submenu'][4];
    return array(
      'table'   => 'sponsors',
      'menu'    => $menu,
      'content' => $this->menu['menu'] . "/" . $menu,
      'title'   => 'Sponsor'
    );
  }
  function sponsor_index()
  {
    // breadcumbs
    $breadcumbs = array(
                      // link
      'dashboard'  => 'dashboard',
      // active
      'sponsor'
    );
    // data for view
    $data = array(

    );
    // initialize
    $init = array(
      'breadcumbs' => $breadcumbs,
      'menu'       => $this->menu['menu'],
      'submenu'    => $this->sponsor_init()['menu'],
      'content'    => $this->sponsor_init()['content'] . '/list',
      'title'      => $this->sponsor_init()['title'],
      'sub_title'  => 'List Sponsor',
      'data'       => $data,
      'script'     => $this->menu['menu'] . '/' . $this->sponsor_init()['menu']
    );
    // load view
    $this->load->view('layouts/admin', $init);
  }
  function sponsor_create()
  {
    // breadcumbs
    $breadcumbs = array(
                      // link
      'dashboard'  => 'dashboard',
      'sponsor'  => $this->menu['menu'] . '/sponsor',
      // active
      'tambah'
    );
    // data for view
    $data = array(

    );
    // initialize
    $init = array(
      'breadcumbs' => $breadcumbs,
      'menu'       => $this->menu['menu'],
      'submenu'    => $this->sponsor_init()['menu'],
      'content'    => $this->sponsor_init()['content'] . '/create',
      'title'      => $this->sponsor_init()['title'],
      'sub_title'  => 'Tambah Sponsor',
      'data'       => $data,
    );
    // load view
    $this->load->view('layouts/admin', $init);
  }
  public function sponsor_store()
  {
    // config for upload
    $configUpload = $this->Config->upload_img('sponsor');
    // uploading
    $upload = $this->Request->upload('sponsor_logo', $configUpload);
    // merge to data for insert
    $merge = ['sponsor_logo' => isset($upload['data']['file_name']) ? $upload['data']['file_name'] : 'default.png'];
    // define data for insert
    $data = array_merge($this->Request->all(), $merge);
    // insert
    $insert = $this->db->insert($this->sponsor_init()['table'], $data);
    // action after insert
    redirect('administrator/cms/sponsor');
  }
  public function sponsor_data()
  {
    $list = $this->Sponsor->resultDataTables();
    $data = array();
    $no = $_POST['start'];

    foreach ($list as $field) {
      $no++;
      $row = array();
      $row[] = $no;
      $row[] = $field->sponsor_name;
      $row[] = '<img src="'. base_url('upload/img/sponsor/' . $field->sponsor_logo) .'" style="width: 50px;">';
      $row[] = '<button type="button" class="btn btn-danger btn-sm btn-flat" id="delete" data-id="'. $field->sponsor_id .'"><i class="fa fa-trash"></i></button>' . '<button type="button" class="btn btn-warning btn-sm btn-flat" id="edit" data-id="'. $field->sponsor_id .'"><i class="fa fa-edit"></i></button>';

      $data[] = $row;
    }

    $result = array(
      'draw' => $_POST['draw'],
      'recordsTotal' => $this->Sponsor->countAll(),
      'recordsFiltered' => $this->Sponsor->countFiltered(),
      'data' => $data
    );

    echo json_encode($result);
  }
  public function sponsor_delete()
  {
    $id = $this->input->post('id');
    if ($id) {
      $this->db->where('sponsor_id', $id);
      $this->db->update($this->sponsor_init()['table'], ['sponsor_deleted_at' => date('Y-m-d H:i:s')]);
      echo json_encode(['msg' => 'success']);
    }
    else {
      echo json_encode(['msg' => 'error']);
    }
  }
  public function sponsor_edit($id)
  {
    // breadcumbs
    $breadcumbs = array(
                      // link
      'dashboard'  => 'dashboard',
      'sponsor'  => $this->menu['menu'] . '/sponsor',
      // active
      'edit'
    );
    // data for view
    $data = array(
      'sponsor' => $this->db->get_where($this->sponsor_init()['table'], ['sponsor_id' => $id])->row()
    );
    // initialize
    $init = array(
      'breadcumbs' => $breadcumbs,
      'menu'       => $this->menu['menu'],
      'submenu'    => $this->sponsor_init()['menu'],
      'content'    => $this->sponsor_init()['content'] . '/edit',
      'title'      => $this->sponsor_init()['title'],
      'sub_title'  => 'Edit Sponsor',
      'data'       => $data,
    );
    // load view
    $this->load->view('layouts/admin', $init);
  }
  public function sponsor_update($id)
  {
    // data then
    $then = $this->db->get_where($this->sponsor_init()['table'], ['sponsor_id' => $id])->row();
    // config for upload
    $configUpload = $this->Config->upload_img('sponsor');
    // uploading
    if (isset($_FILES['sponsor_logo'])) {
      $upload = $this->Request->upload('sponsor_logo', $configUpload);
    }
    // merge to data for update
    $merge = ['sponsor_logo' => isset($upload['data']['file_name']) ? $upload['data']['file_name'] : $then->sponsor_logo];
    // define data for update
    $data = array_merge($this->Request->all(), $merge);
    // update
    $this->db->where('sponsor_id', $id);
    $insert = $this->db->update($this->sponsor_init()['table'], $data);
    // action after insert
    redirect('administrator/cms/sponsor');
  }

}
