<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Laporan extends My_Controller
{
  public $output = [
    'success' => false,
    'message' => ''
  ];

  public function __construct()
  {
    parent::__construct();
    $this->load->model([
      'laporan/laporan_model' => 'laporan_model'
    ]);
    $this->load->helper('function');
  }

  public function index()
  {
    $data['title']     = 'Laporan';

    $data['provinsi']  = $this->laporan_model->get_provinsi()->result();

    $page              = 'laporan/index';
    $data['extra_css'] = $this->load->view('laporan/css', $data, TRUE);
    $data['extra_js']  = $this->load->view('laporan/js', $data, TRUE);
    $this->template->load('backend_template', $page, $data);
  }

  public function rekap_provinsi()
  {
    $this->load->library('format_laporan');
    global $provinsi;
    $id_provinsi = $this->input->get('id_provinsi');
    $provinsi = $this->laporan_model->get_provinsi($id_provinsi)->row()->nama;
    $pdf = new Format_laporan('L', 'mm', 'a4');
    $pdf->SetTopMargin(4);
    $pdf->SetLeftMargin(8);
    $pdf->AddPage();
    $pdf->SetTitle('Laporan Perantau Per Provinsi ' . date('Y'));
    $pdf->SetCompression(true);

    // Font
    $pdf->SetFont('Arial', 'B', 'L');
    $pdf->SetFontSize(9);

    $pdf->cell(10, 10, 'No', 1, 0, 'C');
    $pdf->cell(40, 10, 'Nama Perantau', 1, 0, 'C');
    $pdf->cell(50, 10, 'Tempat, Tgl Lahir', 1, 0, 'C');
    $pdf->cell(100, 10, 'Alamat', 1, 0, 'C');
    $pdf->cell(20, 10, 'Jenkel', 1, 0, 'C');
    $pdf->cell(50, 10, 'Pekerjaan', 1, 0, 'C');
    $pdf->cell(10, 10, 'Ket', 1, 1, 'C');

    $no = 1;
    $perantau = $this->laporan_model->get_perantau($id_provinsi)->result();
    foreach ($perantau as $key => $value) {
      $rt = !empty($value->rt) ? $value->rt : '000';
      $rw = !empty($value->rw) ? $value->rw : '000';
      $alamat_lengkap = $value->alamat . ' RT/RW ' . $rt . '/' . $rw . ' Dusun ' . $value->dusun . ' Kel ' . $value->kelurahan . ' Kec ' . $value->kecamatan . ' Kab ' . $value->kabupaten . ' Prov ' . $value->prop_name;
      $pdf->cell(10, 15, $no++, 1, 0, 'C');
      $pdf->cell(40, 15, '  ' . $value->nama_lengkap, 1, 0, 'L');
      $pdf->cell(50, 15, $value->tempat_lahir . ', ' . $value->tgl_lahir, 1, 0, 'C');
      // $pdf->cell(50, 10, $alamat_lengkap, 1, 0, 'C');
      $pdf->MultiAlignCell(100, 5, $alamat_lengkap, 1, 0, 'L');
      $pdf->cell(20, 15, $value->jenis_kelamin, 1, 0, 'C');
      $pdf->cell(50, 15, $value->jenis_pekerjaan, 1, 0, 'C');
      $pdf->cell(10, 15, '-', 1, 1, 'C');
    }

    $pdf->Output('Rekap Laporan Perantau Per Provinsi', 'I');
  }
}
