<?php


defined('BASEPATH') or exit('No direct script access allowed');

class Diagnosa extends CI_Controller
{


    public function __construct()
    {
        parent::__construct();

        $this->load->model('Data_model', 'DM');
    }


    public function index()
    {
        $data = array(
            'title'     => 'Diagnosa',
            'isi'       => 'diagnosa/add_pasien',
        );
        $this->load->view('layout/wrapper', $data, FALSE);
    }

    function add()
    {

        $this->load->helper('string');

        $i = $this->input;
        $data = [
            'id_pasien'     => random_string(),
            'nama_pasien'   => $i->post('nama_pasien'),
            'umur'          => $i->post('umur'),
        ];

        $this->Crud_model->add('tbl_pasien', $data);
        redirect('diagnosa/list/' . $data['id_pasien']);
    }

    public function list($id_pasien)
    {

        $gejala = $this->Crud_model->listing('tbl_gejala');

        $pilihGejala = $this->DM->listPilihDiagnosa($id_pasien);
        $data = array(
            'title'     => 'Diagnosa',
            'gejala'    => $gejala,
            'pilihGejala'    => $pilihGejala,
            'id_pasien'    => $id_pasien,
            'isi'       => 'diagnosa/list',
        );
        $this->load->view('layout/wrapper', $data, FALSE);
    }

    function pilih($id_pasien, $kode_gejala, $value)
    {
        switch ($value) {
            case '1':
                $value = 0.6;
                break;

            case '2':
                $value = 0.8;
                break;
            case '3':
                $value = 1;
                break;

            default:
                $value = 0;
                break;
        }
        $gejala = $this->Crud_model->listingOne('tbl_gejala', 'kode_gejala', $kode_gejala);
        $data = [
            'id_pasien'     => $id_pasien,
            'kode_gejala'   => $gejala->kode_gejala,
            'nilai_cf'            => $value,
            'cf_hasil'            => $value * $gejala->cf
        ];
        $this->Crud_model->add('tbl_diagnosa', $data);
        redirect('diagnosa/list/' . $id_pasien);
    }

    function salah($id_pasien, $id_diagnosa)
    {
        $this->Crud_model->delete('tbl_diagnosa', 'id_diagnosa', $id_diagnosa);
        redirect('diagnosa/list/' . $id_pasien);
    }

    function proses($id_pasien)
    {

        $this->load->model('CF_model', 'CF');

        $dataDiagnosa = $this->DM->listPilihDiagnosa($id_pasien);

        $kode_penyakit = $this->CF->getValuePenyakit($id_pasien);
        $penyakit = $this->Crud_model->listingOne('tbl_penyakit', 'kode_penyakit', $kode_penyakit);

        $cf = $this->CF->hitung_cf($dataDiagnosa);

        // print_r($cf);
        // die;

        $dataPasien = [
            'akumulasi_cf'     => $cf,
            'kode_penyakit'    => $kode_penyakit,
            'nama_penyakit'    => $penyakit->nama_penyakit,
        ];

        $this->Crud_model->edit('tbl_pasien', 'id_pasien', $id_pasien, $dataPasien);

        $pasien = $this->Crud_model->listingOne('tbl_pasien', 'id_pasien', $id_pasien);
        $data = array(
            'title'         => 'Hasil Diagnosa',
            'penyakit'      => $penyakit,
            'pasien'      => $pasien,
            'dataDiagnosa'  => $dataDiagnosa,
            'isi'           => 'diagnosa/hasil',
        );
        $this->load->view('layout/wrapper', $data, FALSE);
    }
}

/* End of file Diagnosa.php */
