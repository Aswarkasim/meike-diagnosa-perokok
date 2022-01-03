<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        // is_logged_in_admin();
    }


    public function index()
    {
        $id_admin = $this->session->userdata('id_admin');
        $admin = $this->Crud_model->listingOne('tbl_admin', 'id_admin', $id_admin);

        $pasien = $this->Crud_model->listing('tbl_pasien');
        $penyakit = $this->Crud_model->listing('tbl_penyakit');
        $gejala = $this->Crud_model->listing('tbl_gejala');
        $data = [
            'title'     => 'Dashboard',
            'admin'      => $admin,
            'pasien'      => $pasien,
            'penyakit'      => $penyakit,
            'gejala'      => $gejala,
            'isi'   => 'dashboard/index'
        ];

        $this->load->view('layout/wrapper', $data, FALSE);
    }
}

/* End of file Dashboard.php */
