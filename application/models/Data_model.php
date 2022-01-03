<?php


defined('BASEPATH') or exit('No direct script access allowed');

class Data_model extends CI_Model
{

    public function listDataPasien()
    {
        $this->db->select('
                            tbl_pasien.*, 
                            tbl_penyakit.nama_penyakit
                            ')
            ->from('tbl_pasien')
            ->join('tbl_penyakit', 'tbl_penyakit.kode_penyakit = tbl_pasien.kode_penyakit', 'left')
            ->order_by('tbl_pasien.date_created', 'DESC');
        return $this->db->get()->result();
    }

    public function printTabulasi($start, $end)
    {
        $this->db->select('
                            tbl_pasien.*, 
                            tbl_penyakit.nama_penyakit,
                            tbl_penyakit.penanganan,
                            ')
            ->from('tbl_pasien')
            ->join('tbl_penyakit', 'tbl_penyakit.kode_penyakit = tbl_pasien.kode_penyakit', 'left')
            ->where('tbl_pasien.date_created >=', $start)
            ->where('tbl_pasien.date_created <=', $end)
            ->order_by('tbl_pasien.date_created', 'DESC');
        return $this->db->get()->result();
    }

    public function pasien($id_pasien)
    {
        $this->db->select('tbl_pasien.*, tbl_penyakit.*')
            ->from('tbl_pasien')
            ->join('tbl_penyakit', 'tbl_penyakit.kode_penyakit = tbl_pasien.kode_penyakit', 'left')
            ->where('id_pasien', $id_pasien);
        return $this->db->get()->row();
    }

    function listRole($kode_penyakit)
    {
        $this->db->select('
                            tbl_role.*, 
                            tbl_penyakit.nama_penyakit,
                            tbl_gejala.nama_gejala,
                            ')
            ->from('tbl_role')
            ->join('tbl_penyakit', 'tbl_penyakit.kode_penyakit = tbl_role.kode_penyakit', 'left')
            ->join('tbl_gejala', 'tbl_gejala.kode_gejala = tbl_role.kode_gejala', 'left')
            ->where('tbl_role.kode_penyakit', $kode_penyakit)
            ->order_by('tbl_role.kode_gejala', 'ASC');
        return $this->db->get()->result();
    }

    function listPilihDiagnosa($id_pasien)
    {
        $this->db->select('
                            tbl_diagnosa.*, 
                            tbl_gejala.nama_gejala
                            ')
            ->from('tbl_diagnosa')
            ->join('tbl_gejala', 'tbl_gejala.kode_gejala = tbl_diagnosa.kode_gejala', 'left')
            ->where('tbl_diagnosa.id_pasien', $id_pasien);
        return $this->db->get()->result();
    }

    function cekGejala($id_pasien, $kode_gejala)
    {
        return $this->db->select('*')
            ->from('tbl_diagnosa')
            ->where('id_pasien', $id_pasien)
            ->where('kode_gejala', $kode_gejala)->get()->row();
    }

    function kesamaan($id_pasien)
    {
        // return $this->db->query('SELECT tbl_role.kode_gejala FROM tbl_role WHERE EXISTS (SELECT tbl_diagnosa.kode_gejala FROM tbl_diagnosa)')->result();
        // return $this->db->query('SELECT tbl_diagnosa.kode_gejala FROM tbl_diagnosa WHERE EXISTS (SELECT tbl_role.kode_gejala FROM tbl_role)')->result();


        // return $this->db->query('SELECT DISTINCT tbl_diagnosa.kode_gejala FROM tbl_diagnosa INNER JOIN tbl_role')->result();
        return $this->db->query(
            'SELECT tbl_role.kode_gejala 
            FROM tbl_role INTERSECT SELECT tbl_diagnosa.kode_gejala 
            FROM tbl_diagnosa WHERE id_pasien = "G3D5Bn8U" '
        )->result();
    }

    function groupPenyakit()
    {
        return $this->db->select('*')
            ->from('tbl_role')
            ->group_by('kode_penyakit')
            ->get()->result();
    }

    function dataDiagnosaByPasien($id_pasien, $kode_gejala)
    {
        $this->db->select('*')
            ->from('tbl_diagnosa')
            ->where('tbl_diagnosa.id_pasien', $id_pasien)
            ->where('kode_gejala', $kode_gejala);
        return $this->db->get()->row();
    }

    function listDiagnosaRole($id_pasien)
    {
        $this->db->select('
                            tbl_diagnosa.*, 
                            tbl_role.kode_penyakit
                            ')
            ->from('tbl_diagnosa')
            ->join('tbl_role', 'tbl_role.kode_gejala = tbl_diagnosa.kode_gejala', 'left')
            ->where('tbl_diagnosa.id_pasien', $id_pasien);
        return $this->db->get()->result();
    }

    function listDiagnosaRoleByPenyakit($id_pasien, $kode_penyakit)
    {
        $this->db->select('
                            tbl_diagnosa.*, 
                            tbl_role.kode_penyakit
                            ')
            ->from('tbl_diagnosa')
            ->join('tbl_role', 'tbl_role.kode_gejala = tbl_diagnosa.kode_gejala', 'left')
            ->where('tbl_diagnosa.id_pasien', $id_pasien)
            ->where('tbl_role.kode_penyakit', $kode_penyakit);
        // ->group_by('kode_penyakit');
        return $this->db->get()->result();
    }

    function getPenyakitMax($id_pasien, $nilai_max)
    {
        return $this->db->select('*')
            ->from('tbl_diagnosa')
            ->where('id_pasien', $id_pasien)
            ->where('akumulasi_cf', $nilai_max)->get()->row();
    }

    function listGroupDiagnosa($id_pasien)
    {
        $this->db->select('
                            tbl_diagnosa.*, 
                            tbl_gejala.nama_gejala,
                            
                            ')
            ->from('tbl_diagnosa')
            ->join('tbl_gejala', 'tbl_gejala.kode_gejala = tbl_diagnosa.kode_gejala', 'left')
            ->where('tbl_diagnosa.id_pasien', $id_pasien)
            ->group_by('tbl_diagnosa.kode_penyakit');
        return $this->db->get()->result();
    }
}
