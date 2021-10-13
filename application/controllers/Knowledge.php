<?php 


defined('BASEPATH') OR exit('No direct script access allowed');

class Knowledge extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        if($this->session->userdata('id_admin')==""){
            
            redirect('error','refresh');
            
        }
    }

    public function index()
    {
        $knowledge = $this->Crud_model->listing('tbl_knowledge');
        
        $data = array(
            'title'     => 'Manjemen Knowledge',
            'add'       => 'knowledge/add',
            'edit'      => 'knowledge/edit/',
            'delete'    => 'knowledge/delete/',
            'knowledge'    => $knowledge,
			'isi'       => 'knowledge/list', );
		$this->load->view('layout/wrapper', $data, FALSE);
    }

    public function add()
    {
        $gejala = $this->Crud_model->listing('tbl_gejala');
        $penyakit = $this->Crud_model->listing('tbl_penyakit');

        $valid = $this->form_validation;
        $valid->set_rules('pertanyaan', 'Pertanyaan', 'required',
                    array('required' => ' %s harus diisi'));
        
        if($valid->run()===FALSE){
            $data = array(
                'title'     => 'Manjemen Knowledge',
                'add'       => 'knowledge/add',
                'back'      => 'knowledge',
                'gejala'    => $gejala,
                'penyakit'  => $penyakit,
                'isi'       => 'knowledge/add', );
            $this->load->view('layout/wrapper', $data, FALSE);
        }else{
            $i = $this->input;
            $to_yes="";
            $to_no="";
            if($i->post('jenis')=="penyakit"){
                $to_yes = $i->post('to_yes_penyakit');
            }else{
                $to_yes = $i->post('to_yes_gejala');
            }
 
            if($i->post('jenis_no')=="penyakit_no"){
                $to_no = $i->post('to_no_penyakit');
            }else{
                $to_no = $i->post('to_no_gejala');
            }
			      $data = array(
                    'gejala'       => $i->post('kode_gejala'),
                    'pertanyaan'   => $i->post('pertanyaan'),
                    'is_yes'       => $i->post('is_yes'),
                    'is_no'        => $i->post('is_no'),
                    'to_yes'       => $to_yes,
                    'to_no'        => $to_no
                    );
          $this->Crud_model->add('tbl_knowledge', $data);
          $this->session->set_flashdata('msg',' Data telah ditambah');
          redirect('knowledge/add','refresh');
          
        }
    }

    public function edit($id_know)
    {
        $knowledge = $this->Crud_model->listingOne('tbl_knowledge', 'id_know', $id_know);
        $gejala = $this->Crud_model->listing('tbl_gejala');
        $penyakit = $this->Crud_model->listing('tbl_penyakit');

        $valid = $this->form_validation;
        $valid->set_rules('pertanyaan', 'Pertanyaan', 'required',
                    array('required' => ' %s harus diisi'));
        
        if($valid->run()===FALSE){
            $data = array(
                'title'     => 'Manjemen Knowledge',
                'edit'       => 'knowledge/edit/'.$id_know,
                'back'      => 'knowledge',
                'gejala'    => $gejala,
                'penyakit'  => $penyakit,
                'knowledge'  => $knowledge,
                'isi'       => 'knowledge/edit', );
            $this->load->view('layout/wrapper', $data, FALSE);
        }else{
            $i = $this->input;
            $to_yes="";
            $to_no="";
            if($i->post('jenis')=="penyakit"){
                $to_yes = $i->post('to_yes_penyakit');
            }else{
                $to_yes = $i->post('to_yes_gejala');
            }
 
            if($i->post('jenis_no')=="penyakit_no"){
                $to_no = $i->post('to_no_penyakit');
            }else{
                $to_no = $i->post('to_no_gejala');
            }
			      $data = array(
                    'gejala'       => $i->post('kode_gejala'),
                    'pertanyaan'   => $i->post('pertanyaan'),
                    'is_yes'       => $i->post('is_yes'),
                    'is_no'        => $i->post('is_no'),
                    'to_yes'       => $to_yes,
                    'to_no'        => $to_no
                    );
          $this->Crud_model->edit('tbl_knowledge','id_know', $id_know, $data);
          $this->session->set_flashdata('msg',' Data telah ditambah');
          redirect('knowledge','refresh');
          
        }
    }


    function delete($id_know){
        $this->Crud_model->delete('tbl_knowledge', 'id_know', $id_know);
        redirect('knowledge','refresh');
    }


}

