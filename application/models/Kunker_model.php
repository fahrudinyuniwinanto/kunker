<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Kunker_model extends CI_Model
{

    public $table = 'kunker';
    public $id = 'id_kunker';
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
        $this->db->select('aa.*, bb.*,cc.*,dd.*, dd.fullname as pemberi_disposisi,aa.jumlah_hari as jumlah_hari_kunjungan');
        $this->db->join('fraksi bb', 'bb.id_fraksi=aa.id_fraksi', 'left');
        $this->db->join('jenis_kunjungan cc', 'cc.id_jenis_kunjungan=aa.id_jenis_kunjungan', 'left');
        $this->db->join('users dd', 'dd.id_user=aa.id_anggota_fraksi', 'left');
        $this->db->where('aa.' . $this->id, $id);
        return $this->db->get($this->table . ' aa')->row();
    }

    // get total rows
    function total_rows($q = NULL, $status = NULL)
    {
        $this->db->select('aa.*,bb.*,cc.*,dd.*, aa.created_at as tgl_dibuat');
        $this->db->join('fraksi bb', 'bb.id_fraksi=aa.id_fraksi');
        $this->db->join('jenis_kunjungan cc', 'cc.id_jenis_kunjungan=aa.id_jenis_kunjungan');
        $this->db->join('users dd', 'dd.id_user=aa.id_anggota_fraksi');
        $this->db->group_start();
        $this->db->like('id_kunker', $q);
        $this->db->or_like('aa.id_jenis_kunjungan', $q);
        $this->db->or_like('cc.nama_kunker', $q);
        $this->db->or_like('dd.no_anggota', $q);
        $this->db->or_like('dd.fullname', $q);
        $this->db->or_like('aa.nomor_surat', $q);
        $this->db->or_like('aa.tanggal_surat', $q);
        $this->db->or_like('aa.perihal_surat', $q);
        $this->db->or_like('aa.lampiran_surat', $q);
        $this->db->or_like('aa.tingkat_keamanan', $q);
        $this->db->or_like('aa.id_fraksi', $q);
        $this->db->or_like('bb.nama_fraksi', $q);
        $this->db->or_like('aa.id_anggota_fraksi', $q);
        $this->db->or_like('aa.id_kunker_ta', $q);
        $this->db->or_like('aa.nama_daerah_tujuan', $q);
        $this->db->or_like('aa.file_surat', $q);
        $this->db->or_like('aa.file_nodin', $q);
        $this->db->or_like('aa.pemberi_disposisi', $q);
        $this->db->or_like('aa.isi_disposisi', $q);
        $this->db->or_like('aa.tujuan_disposisi', $q);
        $this->db->or_like('aa.status_disposisi', $q);
        $this->db->or_like('aa.created_at', $q);
        $this->db->or_like('aa.disposisi_at', $q);
        $this->db->or_like('aa.created_by', $q);
        $this->db->or_like('aa.disposisi_by', $q);
        $this->db->or_like('aa.diposisi_note', $q);
        $this->db->group_end();
        if ($this->session->userdata('level') == 3) {
            $this->db->where('aa.id_anggota_fraksi', $this->session->userdata('no_anggota'));
        }
        if ($status !== "") {
            $this->db->where('aa.status_disposisi', $status);
        }
        $this->db->from($this->table . ' aa');
        return $this->db->count_all_results();
    }

    // get data with limit and search
    function get_limit_data($limit, $start = 0, $q = NULL, $status = NULL)
    {
        $this->db->select('aa.*,bb.*,cc.*,dd.*, aa.created_at as tgl_dibuat');
        $this->db->join('fraksi bb', 'bb.id_fraksi=aa.id_fraksi');
        $this->db->join('jenis_kunjungan cc', 'cc.id_jenis_kunjungan=aa.id_jenis_kunjungan');
        $this->db->join('users dd', 'dd.no_anggota=aa.id_anggota_fraksi');
        $this->db->order_by($this->id, $this->order);
        $this->db->group_start();
        $this->db->like('id_kunker', $q);
        $this->db->or_like('aa.id_jenis_kunjungan', $q);
        $this->db->or_like('cc.nama_kunker', $q);
        $this->db->or_like('dd.no_anggota', $q);
        $this->db->or_like('dd.fullname', $q);
        $this->db->or_like('aa.nomor_surat', $q);
        $this->db->or_like('aa.tanggal_surat', $q);
        $this->db->or_like('aa.perihal_surat', $q);
        $this->db->or_like('aa.lampiran_surat', $q);
        $this->db->or_like('aa.tingkat_keamanan', $q);
        $this->db->or_like('aa.id_fraksi', $q);
        $this->db->or_like('bb.nama_fraksi', $q);
        $this->db->or_like('aa.id_anggota_fraksi', $q);
        $this->db->or_like('aa.id_kunker_ta', $q);
        $this->db->or_like('aa.nama_daerah_tujuan', $q);
        $this->db->or_like('aa.file_surat', $q);
        $this->db->or_like('aa.file_nodin', $q);
        $this->db->or_like('aa.pemberi_disposisi', $q);
        $this->db->or_like('aa.isi_disposisi', $q);
        $this->db->or_like('aa.tujuan_disposisi', $q);
        $this->db->or_like('aa.status_disposisi', $q);
        $this->db->group_end();
        if ($this->session->userdata('level') == 3) {
            $this->db->where('aa.id_anggota_fraksi', $this->session->userdata('no_anggota'));
        }
        if ($status != "") {
            $this->db->where('aa.status_disposisi', $status);
        }
        $this->db->limit($limit, $start);
        return $this->db->get($this->table . ' aa')->result();
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

/* End of file Kunker_model.php */
/* Location: ./application/models/Kunker_model.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2023-06-09 13:59:40 */
/* http://harviacode.com */
