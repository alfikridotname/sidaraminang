<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard_model extends CI_Model
{
  private $tbl_perantau = 'perantau';

  public function get_total_perantau()
  {
    $result = $this->db->get($this->tbl_perantau);
    return $result->num_rows();
  }
}
