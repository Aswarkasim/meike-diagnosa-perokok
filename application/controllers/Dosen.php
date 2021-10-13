<?php


defined('BASEPATH') OR exit('No direct script access allowed');

class Dosen extends CI_Controller {

    
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Dosen_model');
        
    }
    

    public function index()
    {
        $data['dosen'] = $this->Dosen_model->read();
        $this->load->view('list_dosen', $data);
    }

}

