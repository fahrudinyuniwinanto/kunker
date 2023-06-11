<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Users_model extends CI_Model
{

    public $table = 'users';
    public $id = 'id_user';
    public $order = 'DESC';

    function __construct()
    {
        parent::__construct();
    }

    // get all
    function get_all()
    {
        $this->db->order_by($this->id, $this->order);
        return $this->db->get($this->table)->result();
    }

    // get data by id
    function get_by_id($id)
    {
        $this->db->select("bb.*,aa.*");
        $this->db->where($this->id, $id);
        $this->db->join('user_group as bb', 'aa.id_group=bb.id', 'left');
        return $this->db->get($this->table . " aa")->row();
    }

    // get total rows
    function total_rows($q = NULL)
    {
        $this->db->join('user_group as bb', 'aa.id_group=bb.id', 'left');
        $this->db->like('aa.id_user', $q);
        $this->db->or_like('aa.fullname', $q);
        $this->db->or_like('aa.username', $q);
        $this->db->or_like('aa.password', $q);
        $this->db->or_like('aa.email', $q);
        $this->db->or_like('aa.id_group', $q);
        $this->db->or_like('aa.foto', $q);
        $this->db->or_like('aa.telp', $q);
        $this->db->or_like('aa.note', $q);
        $this->db->or_like('aa.created_by', $q);
        $this->db->or_like('aa.updated_by', $q);
        $this->db->or_like('aa.created_at', $q);
        $this->db->or_like('aa.updated_at', $q);
        $this->db->or_like('aa.note_1', $q);
        $this->db->from($this->table . " aa");
        return $this->db->count_all_results();
    }

    // get data with limit and search
    function get_limit_data($limit, $start = 0, $q = NULL)
    {
        $this->db->join('user_group as bb', 'aa.id_group=bb.id', 'left');
        $this->db->order_by("aa." . $this->id, "aa." . $this->order);
        $this->db->like('aa.id_user', $q);
        $this->db->or_like('aa.fullname', $q);
        $this->db->or_like('aa.username', $q);
        $this->db->or_like('aa.password', $q);
        $this->db->or_like('aa.email', $q);
        $this->db->or_like('aa.id_group', $q);
        $this->db->or_like('aa.foto', $q);
        $this->db->or_like('aa.telp', $q);
        $this->db->or_like('aa.note', $q);
        $this->db->or_like('aa.created_by', $q);
        $this->db->or_like('aa.updated_by', $q);
        $this->db->or_like('aa.created_at', $q);
        $this->db->or_like('aa.updated_at', $q);
        $this->db->or_like('aa.note_1', $q);
        $this->db->limit($limit, $start);
        return $this->db->get($this->table . " aa")->result();
    }

    // get total rows
    function total_rows_ta($q = NULL)
    {
        $this->db->join('user_group as bb', 'aa.id_group=bb.id', 'left');
        $this->db->group_start();
        $this->db->like('aa.id_user', $q);
        $this->db->or_like('aa.fullname', $q);
        $this->db->or_like('aa.username', $q);
        $this->db->or_like('aa.password', $q);
        $this->db->or_like('aa.email', $q);
        $this->db->or_like('aa.id_group', $q);
        $this->db->or_like('aa.foto', $q);
        $this->db->or_like('aa.telp', $q);
        $this->db->or_like('aa.note', $q);
        $this->db->or_like('aa.created_by', $q);
        $this->db->or_like('aa.updated_by', $q);
        $this->db->or_like('aa.created_at', $q);
        $this->db->or_like('aa.updated_at', $q);
        $this->db->or_like('aa.note_1', $q);
        $this->db->group_end();
        $this->db->where('id_parent !=', '0');
        $this->db->from($this->table . " aa");
        return $this->db->count_all_results();
    }

    // get data with limit and search
    function get_limit_data_ta($limit, $start = 0, $q = NULL)
    {
        $this->db->join('user_group as bb', 'aa.id_group=bb.id', 'left');
        $this->db->order_by("aa." . $this->id, "aa." . $this->order);
        $this->db->group_start();
        $this->db->like('aa.id_user', $q);
        $this->db->or_like('aa.fullname', $q);
        $this->db->or_like('aa.username', $q);
        $this->db->or_like('aa.password', $q);
        $this->db->or_like('aa.email', $q);
        $this->db->or_like('aa.id_group', $q);
        $this->db->or_like('aa.foto', $q);
        $this->db->or_like('aa.telp', $q);
        $this->db->or_like('aa.note', $q);
        $this->db->or_like('aa.created_by', $q);
        $this->db->or_like('aa.updated_by', $q);
        $this->db->or_like('aa.created_at', $q);
        $this->db->or_like('aa.updated_at', $q);
        $this->db->or_like('aa.note_1', $q);
        $this->db->group_end();
        $this->db->where('id_parent !=', '0');
        $this->db->limit($limit, $start);
        return $this->db->get($this->table . " aa")->result();
    }

    // get total rows
    function total_rows_anggota_fraksi($q = NULL)
    {
        $this->db->join('user_group as bb', 'aa.id_group=bb.id', 'left');
        $this->db->group_start();
        $this->db->like('aa.id_user', $q);
        $this->db->or_like('aa.fullname', $q);
        $this->db->or_like('aa.username', $q);
        $this->db->or_like('aa.password', $q);
        $this->db->or_like('aa.email', $q);
        $this->db->or_like('aa.id_group', $q);
        $this->db->or_like('aa.foto', $q);
        $this->db->or_like('aa.telp', $q);
        $this->db->or_like('aa.note', $q);
        $this->db->or_like('aa.created_by', $q);
        $this->db->or_like('aa.updated_by', $q);
        $this->db->or_like('aa.created_at', $q);
        $this->db->or_like('aa.updated_at', $q);
        $this->db->or_like('aa.note_1', $q);
        $this->db->group_end();
        $this->db->where('id_parent', '0');
        $this->db->from($this->table . " aa");
        return $this->db->count_all_results();
    }

    // get data with limit and search
    function get_limit_data_anggota_fraksi($limit, $start = 0, $q = NULL)
    {
        $this->db->join('user_group as bb', 'aa.id_group=bb.id', 'left');
        $this->db->order_by("aa." . $this->id, "aa." . $this->order);
        $this->db->group_start();
        $this->db->like('aa.id_user', $q);
        $this->db->or_like('aa.fullname', $q);
        $this->db->or_like('aa.username', $q);
        $this->db->or_like('aa.password', $q);
        $this->db->or_like('aa.email', $q);
        $this->db->or_like('aa.id_group', $q);
        $this->db->or_like('aa.foto', $q);
        $this->db->or_like('aa.telp', $q);
        $this->db->or_like('aa.note', $q);
        $this->db->or_like('aa.created_by', $q);
        $this->db->or_like('aa.updated_by', $q);
        $this->db->or_like('aa.created_at', $q);
        $this->db->or_like('aa.updated_at', $q);
        $this->db->or_like('aa.note_1', $q);
        $this->db->group_end();
        $this->db->where('id_parent', '0');
        $this->db->limit($limit, $start);
        return $this->db->get($this->table . " aa")->result();
    }

    //fungsi untuk setjoin 
    function set_join($data)
    {
        foreach ($data as $row) {
            $table_join = $row['table_join'];
            $column_join = $row['column_join'];

            $this->db->join($table_join, $column_join);
        }
    }

    //fungsi untuk get data join/ menampilkan data hasil join
    function get_data_join($select, $data)
    {
        $this->db->select($select);
        $this->set_join($data);
        return $this->db->get($this->table)->result();
    }

    // insert data
    function insert($data)
    {
        $this->db->insert($this->table, $data);
    }

    // update data
    function update($id, $data)
    {
        $this->db->where($this->id, $id);
        $this->db->update($this->table, $data);
    }

    // delete data
    function delete($id)
    {
        $this->db->where($this->id, $id);
        $this->db->delete($this->table);
    }
}

/* End of file Users_model.php */
/* Location: ./application/models/Users_model.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2018-11-13 02:45:48 */
/* http://harviacode.com */
