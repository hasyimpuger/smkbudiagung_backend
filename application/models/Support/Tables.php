<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tables extends CI_Model{

  public function __construct()
  {
    parent::__construct();
  }

  public function resultQueryDataTables($data)
  {
    $table      = $data['table'];
    if (substr($table, strlen($table)-1 , 1) == 's') $field_default = substr($table, 0, strlen($table)-1);
    $fillable   = $data['fillable'];
    $searchable = $data['searchable'];
    $orderable  = $data['orderable'];

    $this->db->from($table);
    $this->db->where($field_default . '_deleted_at', '0000-00-00 00:00:00');
    if (isset($data['join'])) {
      foreach ($data['join'] as $key => $value) {
        $this->db->join($key, $value);
      }
    }
    if (isset($data['where'])) {
      foreach ($data['where'] as $key => $value) {
        $this->db->where($key, $value);
      }
    }
    // searchable
    $i = 0;
    foreach ($searchable as $search) {
      if ($_POST['search']['value']) {
        if ($i == 0) {
          $this->db->group_start();
          $this->db->like($search, $_POST['search']['value']);
        }
        else {
          $this->db->or_like($search, $_POST['search']['value']);
        }
        if ($i == count($searchable) - 1) {
          $this->db->group_end();
        }
      }
      $i++;
    }

    // orderable
    if (isset($_POST['order'])) {
      $this->db->order_by($fillable[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
    }
    else {
      $this->db->order_by(key($orderable), $orderable[key($orderable)]);
    }

  }

  public function get($data)
  {
    $this->resultQueryDataTables($data);
    if ($_POST['length'] != -1) {
      $this->db->limit($_POST['length'], $_POST['start']);
    }
    //
    $query = $this->db->get();
    //
    $this->resultQueryDataTables($data);
    $count_filtered = $this->db->get()->num_rows();
    //
    $this->db->from($data['table']);
    $count_all = $this->db->count_all_results();
    return array(
      'query' => $query->result(),
      'count_filtered' => $count_filtered,
      'count_all' => $count_all,
    );
  }
}
