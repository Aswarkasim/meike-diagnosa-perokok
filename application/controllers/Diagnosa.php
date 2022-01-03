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
            'cf_hasil'            => $value * $gejala->nilai_cf
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

        $diagnosa = $this->DM->listDiagnosaRole($id_pasien);
        // printr_pretty($diagnosa);

        $max_cf = 0;
        $kp = '';
        $nama_p = '';

        foreach ($diagnosa as $d) {
            // echo $d->kode_penyakit . '<br>';

            $role = $this->Crud_model->listing('tbl_role');

            foreach ($role as $r) {
                if ($r->kode_gejala != $d->kode_gejala) {
                    $data = [
                        'id_pasien'     => $id_pasien,
                        'kode_gejala'           => $r->kode_gejala,
                        'kode_Penyakit'   => $r->kode_penyakit,
                        'nilai_cf'      => 0,
                        'cf_hasil'      => 0
                    ];
                    $this->Crud_model->add('tbl_diagnosa', $data);
                }
            }

            $penyakit = $this->DM->listDiagnosaRoleByPenyakit($id_pasien, $d->kode_penyakit);

            $cf = $this->CF->hitung_cf($penyakit);
            // printr_pretty($cf);
            if ($max_cf <= $cf) {
                $max_cf = $cf;
                $kp = $d->kode_penyakit;
            }
        }


        // lanjutkan nanti tapi alngsug redirect klo dapatm hasilnya
        // die($cf . $kp);

        $peny_hasil = $this->Crud_model->listingOne('tbl_penyakit', 'kode_penyakit', $kp);
        $dataPasien = [
            'akumulasi_cf'     => $max_cf,
            'kode_penyakit'    => $kp,
            'nama_penyakit'    => $peny_hasil->nama_penyakit,
        ];

        $this->Crud_model->edit('tbl_pasien', 'id_pasien', $id_pasien, $dataPasien);

        redirect('diagnosa/hasil/' . $id_pasien);
    }

    function hasil($id_pasien)
    {
        $this->load->model('CF_model', 'CF');
        $dataDiagnosa = $this->DM->listGroupDiagnosa($id_pasien);
        $diagnosaPilih = $this->DM->listPilihDiagnosa($id_pasien);

        // $kode_penyakit = $this->CF->getValuePenyakit($id_pasien);
        // print_r($kode_penyakit);
        // die;
        $pasien = $this->Crud_model->listingOne('tbl_pasien', 'id_pasien', $id_pasien);
        $penyakit = $this->Crud_model->listingOne('tbl_penyakit', 'kode_penyakit', $pasien->kode_penyakit);

        $diagnosa = $this->DM->listDiagnosaRole($id_pasien);



        $data = array(
            'title'         => 'Hasil Diagnosa',
            'penyakit'      => $penyakit,
            'pasien'         => $pasien,
            'id_pasien'      => $id_pasien,
            'dataDiagnosa'  => $dataDiagnosa,
            'diagnosaPilih'  => $diagnosaPilih,
            'diagnosa'      => $diagnosa,
            'isi'           => 'diagnosa/hasil',
        );
        $this->load->view('layout/wrapper', $data, FALSE);
    }
}

/* End of file Diagnosa.php */
