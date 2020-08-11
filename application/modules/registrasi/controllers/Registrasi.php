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
        $this->load->model([
            'registrasi/registrasi_model' => 'registrasi_model'
        ]);
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
        // if (!$this->input->is_ajax_request()) :
        // show_404();
        // else :
        $nik = $this->input->post('nik');

        if ($this->registrasi_model->check_user($nik) > 0) :
            $data['success']    = false;
            $data['message']    = 'Data sudah ada !';
        else :
            $url    = "http://36.67.167.47/account/application_req/sidara?nik={$nik}";
            $result = json_decode($url, true);

            print_r($result);
            // if ($result != NULL) :
            $data['success']    = true;
            $data['message']    = 'Data ditemukan';
            $data['nama']       = $result['data']['nama_lengkap'];
            $data['tgl_lahir']  = $result['data']['tanggal_lahir'];
        // else :
        //     $data['success']    = false;
        //     $data['message']    = 'Data tidak ditemukan !';
        // endif;
        endif;

        echo json_encode($data);
        // endif;
    }

    public function register()
    {
        if (!$this->input->is_ajax_request()) :
            show_404();
        else :
            $nik    = $this->input->post('nik');
            $url    = "http://36.67.167.47/account/application_req/sidara?nik={$nik}";

            $result = json_decode(http_request($url), true);

            if ($result['status'] == true) :
                $primary = [
                    'nik' => $nik
                ];

                $data = [
                    'nik'                   => trim($result['data']['nik']),
                    'kk'                    => trim($result['data']['kk']),
                    'nama_lengkap'          => trim($result['data']['nama_lengkap']),
                    'tempat_lahir'          => trim($result['data']['tempat_lahir']),
                    'tgl_lahir'             => trim($result['data']['tanggal_lahir']),
                    'jenis_kelamin'         => trim($result['data']['jenis_kelamin']),
                    'agama'                 => trim($result['data']['agama']),
                    'status_perkawinan'     => trim($result['data']['status_kawin']),
                    'no_telpon'             => $this->input->post('no_telp'),
                    'daerah_asal'           => $this->input->post('daerah_asal'),
                    'alamat'                => trim($result['data']['alamat']),
                    'rt'                    => trim($result['data']['rt']),
                    'rw'                    => trim($result['data']['rw']),
                    'dusun'                 => trim($result['data']['dusun']),
                    'no_kel'                => trim($result['data']['no_kel']),
                    'kelurahan'             => trim($result['data']['kelurahan']),
                    'no_kec'                => trim($result['data']['no_kec']),
                    'kecamatan'             => trim($result['data']['kecamatan']),
                    'no_kab'                => trim($result['data']['no_kab']),
                    'kabupaten'             => trim($result['data']['kabupaten']),
                    'no_prop'               => trim($result['data']['no_prop']),
                    'prop_name'             => trim($result['data']['prop_name']),
                    'jenis_pekerjaan'       => trim($result['data']['jenis_pekerjaan']),
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
