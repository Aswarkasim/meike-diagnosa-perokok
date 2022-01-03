<?php


defined('BASEPATH') or exit('No direct script access allowed');

class Penyakit extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        if ($this->session->userdata('id_admin') == "") {

            redirect('error', 'refresh');
        }
    }

    public function index()
    {
        $penyakit = $this->Crud_model->listing('tbl_penyakit');
        $data = array(
            'title'     => 'Manjemen Penyakit',
            'add'       => 'penyakit/add',
            'edit'      => 'penyakit/edit/',
            'delete'    => 'penyakit/delete/',
            'role'    => 'role/index/',
            'penyakit'    => $penyakit,
            'isi'       => 'penyakit/list',
        );
        $this->load->view('layout/wrapper', $data, FALSE);
    }

    public function detail($kode_penyakit)
    {
        $penyakit = $this->Crud_model->listingOne('tbl_penyakit', 'kode_penyakit', $kode_penyakit);
        $data = array(
            'penyakit'    => $penyakit,
            'isi'       => 'penyakit/detail',
        );
        $this->load->view('layout/wrapper', $data, FALSE);
    }

    public function add()
    {
        $valid = $this->form_validation;
        $valid->set_rules(
            'kode',
            'Kode Penyakit',
            'required|is_unique[tbl_penyakit.kode_penyakit]',
            array('required' => ' %s harus diisi', 'is_unique'  => '%s kode penyakit telah digunakan')
        );
        $valid->set_rules(
            'nama',
            'Nama Penyakit',
            'required',
            array('required' => ' %s harus diisi')
        );

        if ($valid->run() === FALSE) {
            $data = array(
                'title'     => 'Manjemen Penyakit',
                'add'       => 'penyakit/add',
                'back'      => 'penyakit',
                'isi'       => 'penyakit/add',
            );
            $this->load->view('layout/wrapper', $data, FALSE);
        } else {
            $i = $this->input;
            $data = array(
                'kode_penyakit'   => $i->post('kode'),
                'nama_penyakit'   => $i->post('nama'),
                'deskripsi'       => $i->post('deskripsi'),
                'akibat'          => $i->post('akibat'),
                'penyebab'        => $i->post('penyebab'),
                'link_video'      => '',
                'penanganan'      => $i->post('penanganan')
            );
            $this->Crud_model->add('tbl_penyakit', $data);
            $this->session->set_flashdata('msg', ' Data telah ditambah');
            redirect('penyakit/add', 'refresh');
        }
    }

    public function edit($kode_penyakit)
    {
        $penyakit = $this->Crud_model->listingOne('tbl_penyakit', 'kode_penyakit', $kode_penyakit);
        $valid = $this->form_validation;
        $valid->set_rules(
            'nama',
            'Nama Penyakit',
            'required',
            array('required' => ' %s harus diisi')
        );

        if ($valid->run() === FALSE) {
            $data = array(
                'title'     => 'Manjemen Penyakit',
                'edit'       => 'penyakit/edit/' . $penyakit->kode_penyakit,
                'back'      => 'penyakit',
                'penyakit'    => $penyakit,
                'isi'       => 'penyakit/edit',
            );
            $this->load->view('layout/wrapper', $data, FALSE);
        } else {
            $i = $this->input;
            $data = array(
                'kode_penyakit'   => $kode_penyakit,
                'nama_penyakit'   => $i->post('nama'),
                'deskripsi'       => $i->post('deskripsi'),
                'akibat'          => $i->post('akibat'),
                'penyebab'          => $i->post('penyebab'),
                'link_video'          => '',
                'penanganan'      => $i->post('penanganan')
            );
            $this->Crud_model->edit('tbl_penyakit', 'kode_penyakit', $kode_penyakit, $data);
            $this->session->set_flashdata('msg', ' Data telah diedit');
            redirect('penyakit/edit/' . $kode_penyakit, 'refresh');
        }
    }

    function delete($kode_penyakit)
    {
        $this->Crud_model->delete('tbl_penyakit', 'kode_penyakit', $kode_penyakit);
        redirect('penyakit', 'refresh');
    }
}
