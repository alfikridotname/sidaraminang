<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends My_Controller
{
    public $output = [
        'success' => false,
        'message' => ''
    ];

    public function __construct()
    {
        parent::__construct();
        $this->load->model([
            'auth/auth_model' => 'auth_model'
        ]);
    }

    public function index()
    {
        $data['title']      = 'Administrator';
        $page               = 'auth/index';
        $data['extra_css']  = $this->load->view('auth/css', $data, TRUE);
        $data['extra_js']   = $this->load->view('auth/js', $data, TRUE);
        $this->template->load('public_template', $page, $data);
    }

    public function login()
    {
        $login = $this->auth_model->do_login();
        if ($login) {
            $this->output['success'] = true;
        }

        echo json_encode($this->output);
    }
}
