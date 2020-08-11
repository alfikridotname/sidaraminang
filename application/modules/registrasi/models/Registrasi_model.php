<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Registrasi_model extends CI_Model
{
    protected $tbl_perantau = 'perantau';

    public function check_user($nik)
    {
        $result = $this->db->get_where($this->tbl_perantau, [
            'nik' => $nik
        ])->num_rows();

        return $result;
    }
}
