<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{



    public function index()
    {
        $valid = $this->form_validation;

        $valid->set_rules(
            'username',
            'Username',
            'required',
            array('required' => 'Username harus diisi')
        );
        $valid->set_rules(
            'password',
            'Password',
            'required|min_length[6]',
            array(
                'required'     => 'Password harus diisi',
                'min_length'  => 'Password minimal 6 karakter'
            )
        );

        if ($valid->run() === FALSE) {
            $data = array(
                'title'        => 'SISTEM PAKAR | Diagnosa Penyakit Malaria',
                'isi'         => 'auth/login'
            );
            $this->load->view('layout/wrapper', $data, FALSE);
        } else {
            $i          = $this->input;
            $username   = $i->post('username');
            $password   = $i->post('password');
            $cek_login  = $this->Crud_model->login($username, $password);

            //jika ada
            if (!empty($cek_login)) {
                $s = $this->session;
                $s->set_userdata('id_admin', $cek_login->id_admin);
                $s->set_userdata('username', $cek_login->username);
                $s->set_userdata('nama_admin', $cek_login->nama_admin);

                redirect('diagnosa', 'refresh');
            } else {
                //jika tidak ditemukan
                $this->session->set_flashdata('msg', 'Username atau password salah');
                redirect(base_url('auth'), 'refresh');
            }
        }
    }

    function logout()
    {
        $this->session->unset_userdata('id_admin');
        $this->session->unset_userdata('username');
        $this->session->unset_userdata('nama_admin');

        redirect('auth', 'refresh');
    }


    function home()
    {
        $data = array(
            'title'        => 'SISTEM PAKAR | DIAGNOSA PENYAKIT PADA PEROKOK',
            'isi'         => 'home/home'
        );
        $this->load->view('layout/wrapper', $data, FALSE);
    }

    function petunjuk()
    {
        $data = array(
            'title'        => 'SISTEM PAKAR | DIAGNOSA PENYAKIT PADA PEROKOK',
            'isi'         => 'home/petunjuk'
        );
        $this->load->view('layout/wrapper', $data, FALSE);
    }

    function error()
    {
        $data = array(
            'title'     => 'SISTEM PAKAR | DIAGNOSA PENYAKIT PADA PEROKOK',
            'isi'       => 'home/error'
        );
        $this->load->view('layout/wrapper', $data, FALSE);
    }
}
