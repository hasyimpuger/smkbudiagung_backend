<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Sponsor extends CI_Model{

  public function __construct()
  {
    parent::__construct();
    // define
    $this->table = 'sponsors';
    $this->fillable = [null, 'sponsor_name', 'sponsor_logo', null];
    $this->searchable = ['sponsor_name'];
    $this->orderable = array('sponsor_id', 'asc');
  }

  public function resultQueryDataTables()
  {
    $this->db->from($this->table);
    $this->db->where('sponsor_deleted_at', '0000-00-00 00:00:00');
    // searchable
    $i = 0;
    foreach ($this->searchable as $searchable) {
      if ($_POST['search']['value']) {
        if ($i == 0) {
          $this->db->group_start();
          $this->db->like($searchable, $_POST['search']['value']);
        }
        else {
          $this->db->or_like($searchable, $_POST['search']['value']);
        }
        if ($i == count($this->searchable) - 1) {
          $this->db->group_end();
        }
      }
      $i++;
    }

    // orderable
    if (isset($_POST['order'])) {
      $this->db->order_by($this->fillable[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
    }
    else {
      $this->db->order_by(key($this->orderable), $this->orderable[key($this->orderable)]);
    }

  }

  public function resultDataTables()
  {
    $this->resultQueryDataTables();
    if ($_POST['length'] != -1) {
      $this->db->limit($_POST['length'], $_POST['start']);
    }
    $query = $this->db->get();
    return $query->result();
  }

  public function countFiltered()
  {
    $this->resultQueryDataTables();
    $query = $this->db->get();
    return $query->num_rows();
  }

  public function countAll()
  {
    $this->db->from($this->table);
    return $this->db->count_all_results();
  }


}
