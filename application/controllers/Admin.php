<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

    
    public function __construct()
    {
        parent::__construct();
        if($this->session->userdata('id_admin')==""){
            
            redirect('error','refresh');
            
        }
    }
    

    public function index()
    {
        $admin = $this->Crud_model->listing('tbl_admin');
        $data = array(
            'title'     => 'Manjemen Admin',
            'add'       => 'admin/add',
            'edit'      => 'admin/edit/',
            'delete'    => 'admin/delete/',
            'admin'    => $admin,
			'isi'       => 'admin/list', );
		$this->load->view('layout/wrapper', $data, FALSE);
    }

    public function add()
    {
        $valid = $this->form_validation;
        $valid->set_rules('username', 'username', 'required|is_unique[tbl_admin.username]',
                    array('required' => ' %s harus diisi',
                          'is_unique'=> ' Masukkan username yang berbeda <strong>'.$this->input->post('username').'</strong> sudah digunakan'));
        $valid->set_rules('nama_admin', 'Nama Admin', 'required',
                    array('required' => ' %s harus diisi'));
        $valid->set_rules('password', 'Password', 'required',
                    array('required' => ' %s harus diisi'));
        $valid->set_rules('re-password', 'Pasword yang dimasukkan', 'required|matches[password]',
                    array('required' => ' %s harus sama'));
        
        if($valid->run()===FALSE){
            $data = array(
                'title'     => 'Manjemen Admin',
                'add'       => 'admin/add',
                'back'      => 'admin',
                'isi'       => 'admin/add', );
            $this->load->view('layout/wrapper', $data, FALSE);
        }else{
            $i = $this->input;
			      $data = array(
                    'nama_admin'   => $i->post('nama_admin'),
                    'username'     => $i->post('username'),
                    'password'     => md5($i->post('password'))
          );
          $this->Crud_model->add('tbl_admin', $data);
          $this->session->set_flashdata('msg',' Data telah ditambah');
          redirect('admin/add','refresh');
          
        }
    }

    public function edit($id_admin)
    {
        $admin = $this->Crud_model->listingOne('tbl_admin', 'id_admin', $id_admin);
        $valid = $this->form_validation;
        $i = $this->input;
        $valid->set_rules('nama_admin', 'Nama Admin', 'required',
                    array('required' => ' %s harus diisi'));
        if($i->post('password')!=""){
            $valid->set_rules('password', 'Password', 'min_length[6]',
                    array('min_length' => ' %s minimal 6 karakter'));
            $valid->set_rules('re-password', 'Retype-Pasword', 'required|matches[password]',
                        array('required' => ' %s tidak boleh kosong',
                              'matches'  => ' %s harus sama'   
                        ));
        }
        
        if($valid->run()===FALSE){
            $data = array(
                'title'     => 'Manjemen Admin',
                'edit'       => 'admin/edit/'.$admin->id_admin,
                'back'      => 'admin',
                'admin'    => $admin,
                'isi'       => 'admin/edit', );
            $this->load->view('layout/wrapper', $data, FALSE);
        }else{
                if($i->post('password')==""){
                    $data = array(
                        'nama_admin'   => $i->post('nama_admin'),
                        'password'     => $admin->password);
                }else{
                    $data = array(
                        'nama_admin'   => $i->post('nama_admin'),
                        'password'     => md5($i->post('password')));
                }
			      
          $this->Crud_model->edit('tbl_admin', 'id_admin', $id_admin, $data);
          $this->session->set_flashdata('msg',' Data telah diedit');
          redirect('admin/edit/'.$id_admin,'refresh');
          
        }
    }

    function delete($id_admin){
        $this->Crud_model->delete('tbl_admin', 'id_admin', $id_admin);
        redirect('admin','refresh');
    }


}

