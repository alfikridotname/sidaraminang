<?php
defined('BASEPATH') or exit('No direct script access allowed');

class My_Controller extends MX_Controller
{
  public function __construct()
  {
    parent::__construct();
    if (!$this->session->userdata('nama_lengkap') && $this->router->fetch_class() != 'auth' && $this->router->fetch_class() != 'registrasi') :
      redirect('auth');

    endif;
  }
}
