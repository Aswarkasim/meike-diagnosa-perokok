<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Crud_model extends CI_Model
{

  public function listing($table, $limit = null)
  {
    $query = $this->db->select('*')
      ->from($table)
      ->limit($limit)
      ->get();
    return $query->result();
  }

  public function listingOne($table, $field, $where)
  {
    $query = $this->db->select('*')
      ->from($table)
      ->where($field, $where)
      ->get();
    return $query->row();
  }



  function getId($table, $where)
  {
    return $this->db->get_where($where, $table);
  }

  public function listingOneAll($table, $field, $where, $limit = null, $offset = null)
  {
    $query = $this->db->select('*')
      ->from($table)
      ->where($field, $where)
      ->limit($limit)
      ->offset($offset)
      ->get();
    return $query->result();
  }

  public function add($table, $data)
  {
    $this->db->insert($table, $data);
  }

  public function edit($table, $field, $where, $data)
  {
    $this->db->where($field, $where);
    $this->db->update($table, $data);
  }

  public function delete($table, $field, $where)
  {
    $this->db->where($field, $where);
    $this->db->delete($table);
  }

  public function login($username, $password)
  {
    $this->db->select('*')
      ->from('tbl_admin')
      ->where(array(
        'username'   => $username,
        'password'  => md5($password)
      ));
    $query = $this->db->get();
    return $query->row();
  }
}
