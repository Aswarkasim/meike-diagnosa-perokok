<?php 


defined('BASEPATH') OR exit('No direct script access allowed');

class Gejala extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        if($this->session->userdata('id_admin')==""){
            
            redirect('error','refresh');
            
        }
    }

    public function index()
    {
        $gejala = $this->Crud_model->listing('tbl_gejala');
        $data = array(
            'title'     => 'Manjemen Gejala',
            'add'       => 'gejala/add',
            'edit'      => 'gejala/edit/',
            'delete'    => 'gejala/delete/',
            'gejala'    => $gejala,
			'isi'       => 'gejala/list', );
		$this->load->view('layout/wrapper', $data, FALSE);
    }

    public function add()
    {
        $valid = $this->form_validation;
        $valid->set_rules('kode', 'Kode Gejala', 'required',
                    array('required' => ' %s harus diisi'));
        $valid->set_rules('nama', 'Nama Gejala', 'required',
                    array('required' => ' %s harus diisi'));
        
        if($valid->run()===FALSE){
            $data = array(
                'title'     => 'Manjemen Gejala',
                'add'       => 'gejala/add',
                'back'      => 'gejala',
                'isi'       => 'gejala/add', );
            $this->load->view('layout/wrapper', $data, FALSE);
        }else{
            $i = $this->input;
			      $data = array(
                    'kode_gejala'   => $i->post('kode'),
                    'nama_gejala'   => $i->post('nama')
          );
          $this->Crud_model->add('tbl_gejala', $data);
          $this->session->set_flashdata('msg',' Data telah ditambah');
          redirect('gejala/add','refresh');
          
        }
    }

    public function edit($kode_gejala)
    {
        $gejala = $this->Crud_model->listingOne('tbl_gejala', 'kode_gejala', $kode_gejala);
        $valid = $this->form_validation;
        $valid->set_rules('nama', 'Nama Gejala', 'required',
                    array('required' => ' %s harus diisi'));
        
        if($valid->run()===FALSE){
            $data = array(
                'title'     => 'Manjemen Gejala',
                'edit'       => 'gejala/edit/'.$gejala->kode_gejala,
                'back'      => 'gejala',
                'gejala'    => $gejala,
                'isi'       => 'gejala/edit', );
            $this->load->view('layout/wrapper', $data, FALSE);
        }else{
            $i = $this->input;
			      $data = array(
                    'kode_gejala'   => $i->post('kode_gejala'),
                    'nama_gejala'   => $i->post('nama')
          );
          $this->Crud_model->edit('tbl_gejala', 'kode_gejala', $kode_gejala, $data);
          $this->session->set_flashdata('msg',' Data telah diedit');
          redirect('gejala/edit/'.$kode_gejala,'refresh');
          
        }
    }

    function delete($kode_gejala){
        $this->Crud_model->delete('tbl_gejala', 'kode_gejala', $kode_gejala);
        $this->session->set_flashdata('msg', 'Data telah dihapus');
        redirect('gejala','refresh');
    }


}

