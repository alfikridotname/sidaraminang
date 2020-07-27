<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Laporan_model extends CI_Model
{
  private $tbl_perantau = 'perantau';
  private $tbl_wilayah  = 'master_wilayah';

  public function get_provinsi($id_provinsi = '')
  {
    if ($id_provinsi) :
      $where = "AND kode = {$id_provinsi}";
    else :
      $where = "";
    endif;
    $query  = $this->db->query("SELECT
                                  master_wilayah.kode,
                                  master_wilayah.nama 
                                FROM
                                  {$this->tbl_wilayah}
                                WHERE
                                  kode IN (SELECT no_prop FROM perantau)
                                  AND
                                  length( master_wilayah.kode ) = 2
                                  {$where}
                                  AND kode != 13");
    return $query;
  }

  public function get_perantau($id_provinsi)
  {
    return $this->db->get_where($this->tbl_perantau, [
      'no_prop' => $id_provinsi
    ]);
  }
}
