<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Pasien extends CI_Controller
{

  public function __construct()
  {
    parent::__construct();
    // is_logged_in_user();
    $this->load->model('CF_model', 'CF');
    $this->load->model('Data_model', 'DM');
  }


  public function index()
  {
    $pasien = $this->DM->listDataPasien('tbl_pasien');
    $data = array(
      'title'     => 'Manjemen pasien',
      'add'       => 'pasien/add',
      'cetak'      => 'pasien/cetak/',
      'delete'    => 'pasien/delete/',
      'pasien'    => $pasien,
      'isi'       => 'pasien/list',
    );
    $this->load->view('layout/wrapper', $data, FALSE);
  }

  function delete($id_pasien)
  {
    $this->Crud_model->delete('tbl_pasien', 'id_pasien', $id_pasien);

    $this->session->set_flashdata('msg', 'Data dihapus');

    redirect('pasien', 'refresh');
  }

  function cetakTabulasi()
  {
    $start = $this->input->post('date_start');
    $end = $this->input->post('date_end');

    $data['pasien'] = $this->DM->printTabulasi($start, $end);
    $this->load->view('pasien/cetak_page', $data, FALSE);
  }

  function cetak($id_pasien)
  {
    $data['pasien'] = $this->Crud_model->listingOne('tbl_pasien', 'id_pasien', $id_pasien);
    $data['dataDiagnosa'] = $this->DM->listGroupDiagnosa($id_pasien);
    $data['data'] = $this->DM->pasien($id_pasien);
    $this->load->view('pasien/cetak', $data, FALSE);
  }
}
