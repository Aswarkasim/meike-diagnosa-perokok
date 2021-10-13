<?php


defined('BASEPATH') or exit('No direct script access allowed');

class Role extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        if ($this->session->userdata('id_admin') == "") {

            redirect('error', 'refresh');
        }


        $this->load->model('Data_model', 'DM');
    }

    public function index($kode_penyakit)
    {
        $role = $this->DM->listRole($kode_penyakit);
        $gejala = $this->Crud_model->listing('tbl_gejala');
        $data = array(
            'title'     => 'Manjemen Role',
            'add'       => 'role/add',
            'edit'      => 'role/edit/',
            'delete'    => 'role/delete/',
            'role'    => $role,
            'kode_penyakit'    => $kode_penyakit,
            'gejala'    => $gejala,
            'isi'       => 'role/list',
        );
        $this->load->view('layout/wrapper', $data, FALSE);
    }

    public function add()
    {


        $this->load->helper('string');

        $i = $this->input;
        $data = array(
            'id_role'       => random_string(),
            'kode_gejala'   => $i->post('kode_gejala'),
            'kode_penyakit'   => $i->post('kode_penyakit'),
        );
        $this->Crud_model->add('tbl_role', $data);
        $this->session->set_flashdata('msg', ' Data telah ditambah');
        redirect('role/index/' . $data['kode_penyakit'], 'refresh');
    }

    public function edit($id_role)
    {
        $this->load->helper('string');

        $i = $this->input;
        $data = array(
            'kode_gejala'       => $i->post('kode_gejala'),
            'kode_penyakit'     => $i->post('kode_penyakit'),
        );
        $this->Crud_model->edit('tbl_role', 'id_role', $id_role, $data);
        $this->session->set_flashdata('msg', ' Data telah ditambah');
        redirect('role/index/' . $data['kode_penyakit'], 'refresh');
    }

    function delete($kode_penyakit, $id_role)
    {
        $this->Crud_model->delete('tbl_role', 'id_role', $id_role);
        $this->session->set_flashdata('msg', 'Data telah dihapus');
        redirect('role/index/' . $kode_penyakit, 'refresh');
    }
}
