<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AuthController extends CI_Controller{

  public function __construct()
  {
    parent::__construct();
    //Codeigniter : Write Less Do More
    $this->table = 'users';
    $this->username = 'user_username';
    $this->password = 'user_password';
    // redirect after login success
    $this->redirect = array(
      'admin'   => 'administrator',
      'teacher' => 'guru',
      'student' => 'siswa',
    );
  }

  function login()
  {
    if ($this->input->post('submit')) {
      $login = $this->authenticated();
      if (!$login) {
        echo "gagal";
      }
      else {
        redirect($this->redirect[$this->session->userdata('user_role')]);
      }
    }
    $this->load->view('site/login');
  }

  public function authenticated()
  {
    $request = $this->input;
    // define key
    $username = $request->post('username');
    $password = $this->Guard->decrypt($request->post('password'));
    // compose query
    $query = $this->db->get_where($this->table, [$this->username => $username, $this->password => $password]);
    // check only username
    if ($query->num_rows() > 0) {
      // making access
      $making_access = $this->making_access($query);
      $this->session->set_userdata($making_access);
      return true;
    }
    else{
      return false;
    }
  }

  public function making_access($query)
  {
    $user_data = $this->db->get_where( ($query->row()->user_role == 'admin') ? 'users' : $query->row()->user_role . 's', [($query->row()->user_role == 'admin') ? 'user_id' : $query->row()->user_role.'_user_id' => $query->row()->user_id])->row();
    $data_making = array(
      'user_id'   => $query->row()->user_id,
      'user_role' => $query->row()->user_role,
      'user_data' => $user_data,
      'user_log' => true
    );
    return $data_making;
  }

  public function logout()
  {
    if ($this->input->post('_token') != $this->Guard->token) {
      redirect('404');
    }
    else {
      $this->session->sess_destroy();
      redirect('login');
    }
  }

}
