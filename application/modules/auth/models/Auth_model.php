<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth_model extends CI_Model
{
  public function do_login()
  {
    $username = $this->input->post('username');
    $password = $this->input->post('password');
    if ($this->check_username($username)->num_rows() > 0) :
      if (password_verify($password, $this->check_username($username)->row()->password)) :
        $data = [
          'id_user'       => $this->check_username($username)->row()->id_user,
          'nama_lengkap'  => $this->check_username($username)->row()->nama_lengkap
        ];

        $this->session->set_userdata($data);
        return true;
      else :
        return false;
      endif;
    else :
      return false;
    endif;
  }

  private function check_username($username)
  {
    return $this->db->get_where('users', [
      'username' => $username
    ]);
  }
}
