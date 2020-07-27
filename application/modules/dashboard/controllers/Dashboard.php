<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends My_Controller
{
  public $output = [
    'success' => false,
    'message' => ''
  ];

  public function __construct()
  {
    parent::__construct();
    $this->load->model([
      'dashboard/dashboard_model' => 'dashboard_model'
    ]);
    $this->load->helper('function');
  }

  public function index()
  {
    $data['title']          = 'Dashboard';

    $data['total_perantau'] = $this->dashboard_model->get_total_perantau();

    $page                   = 'dashboard/dashboard/index';
    $data['extra_css']      = $this->load->view('dashboard/dashboard/css', $data, TRUE);
    $data['extra_js']       = $this->load->view('dashboard/dashboard/js', $data, TRUE);
    $this->template->load('backend_template', $page, $data);
  }
}
