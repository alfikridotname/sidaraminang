<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Registrasi extends My_Controller
{
    public $output = [
        'success' => false,
        'message' => ''
    ];

    public function __construct()
    {
        parent::__construct();
        $this->load->library('curl');
        $this->load->helper('function');
    }

    public function index()
    {
        $data['title']      = 'Registrasi Perantau Minang';
        $page               = 'registrasi/reg/index';
        $data['extra_css']  = $this->load->view('registrasi/reg/css', $data, TRUE);
        $data['extra_js']   = $this->load->view('registrasi/reg/js', $data, TRUE);
        $this->template->load('public_template', $page, $data);
    }

    public function get_data_user()
    {
        if (!$this->input->is_ajax_request()) :
            show_404();
        else :
            $nik    = $this->input->post('nik');
            $ibu    = $this->input->post('nama_ibu_kandung');
            $url = "http://localhost:8080/webservices/index.php/api/perantau/users?nik={$nik}&ibu={$ibu}";
            $result = json_decode(http_request($url), true);

            if ($result['status'] == true) :
                echo http_request($url);
            endif;
        endif;
    }

    public function register()
    {
        if (!$this->input->is_ajax_request()) :
            show_404();
        else :
            $nik    = $this->input->post('nik');
            $ibu    = $this->input->post('nama_ibu_kandung');
            $url = "http://localhost:8080/webservices/index.php/api/perantau/users?nik={$nik}&ibu={$ibu}";

            $result = json_decode(http_request($url), true);

            if ($result['status'] == true) :
                $primary = [
                    'nik' => $nik
                ];

                $data = [
                    'nik'                   => trim($result['data']['nik']),
                    'nama_lengkap'          => trim($result['data']['nama_lengkap']),
                    'jenis_kelamin'         => trim($result['data']['jenis_kelamin']),
                    'tempat_lahir'          => trim($result['data']['tempat_lahir']),
                    'tgl_lahir'             => trim($result['data']['tgl_lahir']),
                    'golongan_darah'        => trim($result['data']['golongan_darah']),
                    'agama'                 => trim($result['data']['agama']),
                    'status_perkawinan'     => trim($result['data']['status_perkawinan']),
                    'pendidikan_terakhir'   => trim($result['data']['pendidikan_terakhir']),
                    'jenis_pekerjaan'       => trim($result['data']['jenis_pekerjaan']),
                    'nama_ibu_kandung'      => trim($result['data']['nama_ibu_kandung']),
                    'nama_ayah'             => trim($result['data']['nama_ayah']),
                    'alamat'                => trim($result['data']['alamat_sekarang']),
                ];

                $check = $this->db->get_where('perantau', [
                    'nik' => $nik
                ]);

                if ($check->num_rows() > 0) :
                    $this->output['success'] = false;
                    $this->output['message'] = 'Data sudah ada !';
                else :
                    $this->db->insert('perantau', $data);
                    $this->output['success'] = true;
                    $this->output['message'] = 'Data berhasil disimpan';
                endif;
            endif;

            echo json_encode($this->output);
        endif;
    }
}
