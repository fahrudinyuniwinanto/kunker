<?php

if (!defined('BASEPATH'))
	exit('No direct script access allowed');

class Kunker extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		is_logged();
		$this->load->model('Kunker_model');
		$this->load->model('Kunker_ta_model');
		$this->load->library('form_validation');
	}

	public function index()
	{
		$q = urldecode($this->input->get('q', TRUE));
		$start = intval($this->input->get('start'));

		if ($q <> '') {
			$config['base_url'] = base_url() . 'kunker/index.html?q=' . urlencode($q);
			$config['first_url'] = base_url() . 'kunker/index.html?q=' . urlencode($q);
		} else {
			$config['base_url'] = base_url() . 'kunker/index.html';
			$config['first_url'] = base_url() . 'kunker/index.html';
		}

		$config['per_page'] = 10;
		$config['page_query_string'] = TRUE;
		$config['total_rows'] = $this->Kunker_model->total_rows($q);
		$kunker = $this->Kunker_model->get_limit_data($config['per_page'], $start, $q);

		$this->load->library('pagination');
		$this->pagination->initialize($config);

		$data = array(
			'kunker_data' => $kunker,
			'q' => $q,
			'pagination' => $this->pagination->create_links(),
			'total_rows' => $config['total_rows'],
			'start' => $start,
			'content' => 'backend/kunker/kunker_list',
		);
		$this->load->view(layout(), $data);
	}

	public function lookup()
	{
		$q = urldecode($this->input->get('q', TRUE));
		$start = intval($this->input->get('start'));
		$idhtml = $this->input->get('idhtml');

		if ($q <> '') {
			$config['base_url'] = base_url() . 'kunker/index.html?q=' . urlencode($q);
			$config['first_url'] = base_url() . 'kunker/index.html?q=' . urlencode($q);
		} else {
			$config['base_url'] = base_url() . 'kunker/index.html';
			$config['first_url'] = base_url() . 'kunker/index.html';
		}

		$config['per_page'] = 10;
		$config['page_query_string'] = TRUE;
		$config['total_rows'] = $this->Kunker_model->total_rows($q);
		$kunker = $this->Kunker_model->get_limit_data($config['per_page'], $start, $q);


		$data = array(
			'kunker_data' => $kunker,
			'idhtml' => $idhtml,
			'q' => $q,
			'total_rows' => $config['total_rows'],
			'start' => $start,
			'content' => 'backend/kunker/kunker_lookup',
		);
		ob_start();
		$this->load->view($data['content'], $data);
		return ob_get_contents();
		ob_end_clean();
	}

	public function read($id)
	{

		$row = $this->Kunker_model->get_by_id($id);
		if ($row) {
			$data = array(
				'id_kunker' => $row->id_kunker,
				'id_jenis_kunjungan' => $row->id_jenis_kunjungan,
				'nomor_surat' => $row->nomor_surat,
				'tanggal_surat' => $row->tanggal_surat,
				'perihal_surat' => $row->perihal_surat,
				'lampiran_surat' => $row->lampiran_surat,
				'tingkat_keamanan' => $row->tingkat_keamanan,
				'id_fraksi' => $row->id_fraksi,
				'id_anggota_fraksi' => $row->id_anggota_fraksi,
				'id_kunker_ta' => $row->id_kunker_ta,
				'nama_daerah_tujuan' => $row->nama_daerah_tujuan,
				'file_surat' => $row->file_surat,
				'file_nodin' => $row->file_nodin,
				'pemberi_disposisi' => $row->pemberi_disposisi,
				'isi_disposisi' => $row->isi_disposisi,
				'tujuan_disposisi' => $row->tujuan_disposisi,
				'status_disposisi' => $row->status_disposisi,
				'created_at' => $row->created_at,
				'disposisi_at' => $row->disposisi_at,
				'created_by' => $row->created_by,
				'disposisi_by' => $row->disposisi_by,
				'diposisi_note' => $row->diposisi_note, 'content' => 'backend/kunker/kunker_read',
			);
			$this->load->view(
				layout(),
				$data
			);
		} else {
			$this->session->set_flashdata('message', 'Record Not Found');
			redirect(site_url('kunker'));
		}
	}

	public function create()
	{
		$data = array(
			'button' => 'Ajukan',
			'action' => site_url('kunker/create_action'),
			'id_kunker' => set_value('id_kunker'),
			'id_jenis_kunjungan' => set_value('id_jenis_kunjungan'),
			'nomor_surat' => set_value('nomor_surat'),
			'jumlah_hari' => set_value('jumlah_hari'),
			'tanggal_surat' => set_value('tanggal_surat'),
			'perihal_surat' => set_value('perihal_surat'),
			'lampiran_surat' => set_value('lampiran_surat'),
			'tingkat_keamanan' => set_value('tingkat_keamanan'),
			'id_fraksi' => set_value('id_fraksi', $this->session->userdata('id_fraksi')),
			'id_anggota_fraksi' => set_value('id_anggota_fraksi', $this->session->userdata('id_user')),
			'id_kunker_ta' => set_value('id_kunker_ta'),
			'nama_daerah_tujuan' => set_value('nama_daerah_tujuan'),
			'file_surat' => set_value('file_surat'),
			'file_nodin' => set_value('file_nodin'),
			'pemberi_disposisi' => set_value('pemberi_disposisi'),
			'tgl_berangkat' => set_value('tgl_berangkat'),
			'tgl_kembali' => set_value('tgl_kembali'),
			'isi_disposisi' => set_value('isi_disposisi'),
			'tujuan_disposisi' => set_value('tujuan_disposisi'),
			'status_disposisi' => set_value('status_disposisi'),
			'created_at' => set_value('created_at'),
			'disposisi_at' => set_value('disposisi_at'),
			'created_by' => set_value('created_by'),
			'disposisi_by' => set_value('disposisi_by'),
			'diposisi_note' => set_value('diposisi_note'),
			'content' => 'backend/kunker/kunker_form',
		);
		$this->load->view(layout(), $data);
	}

	public function create_action()
	{
		$this->_rules();

		if ($this->form_validation->run() == FALSE) {
			$this->create();
		} else {

			//validasi ajuan kunjungan kerja
			//ambil data jenis kunjungan => maksimal kunjungan
			$jenis_kunjungan = $this->db->get_where('jenis_kunjungan', ['id_jenis_kunjungan' => $this->input->post('id_jenis_kunjungan', TRUE)])->row();
			//count jumlah kunjungan di table kunker berdasar id jenis kunjungan
			$jumlah_kunjungan = $this->db->get_where('kunker', ['id_jenis_kunjungan' => $this->input->post('id_jenis_kunjungan', TRUE)])->num_rows();
			//jika jumlah kunjungan >= maksimal kunjungan-> tolak jika tidak -> lanjutkan input
			if ($jumlah_kunjungan >= $jenis_kunjungan->maksimal_kunjungan) {

				$this->session->set_flashdata('error_message', 'Quota kunjungan untuk jenis kunjungan ' . $jenis_kunjungan->nama_kunker . ' tersebut sudah penuh. Maksimal adalah ' . $jenis_kunjungan->maksimal_kunjungan . ' kunjungan.');
				redirect(site_url('kunker/create'));
			} else {

				$data = array(
					'id_jenis_kunjungan' => $this->input->post('id_jenis_kunjungan', TRUE),
					'nomor_surat' => $this->input->post('nomor_surat', TRUE),
					'tanggal_surat' => $this->input->post('tanggal_surat', TRUE),
					'tgl_berangkat' => $this->input->post('tgl_berangkat', TRUE),
					'tgl_kembali' => $this->input->post('tgl_kembali', TRUE),
					'perihal_surat' => $this->input->post('perihal_surat', TRUE),
					'lampiran_surat' => $this->input->post('lampiran_surat', TRUE),
					'tingkat_keamanan' => $this->input->post('tingkat_keamanan', TRUE),
					'id_fraksi' => $this->input->post('id_fraksi', TRUE),
					'id_anggota_fraksi' => $this->input->post('id_anggota_fraksi', TRUE),
					'id_kunker_ta' => $this->input->post('id_kunker_ta', TRUE),
					'nama_daerah_tujuan' => $this->input->post('nama_daerah_tujuan', TRUE),
					'file_surat' => sf_upload('dok_permohonan', 'assets/dok_permohonan', 'pdf', 2048, 'file_surat'),
					'created_at' => date('Y-m-d H:i:s'),
				);
				//input ke kunker;
				$this->Kunker_model->insert($data);
				$insert_id = $this->db->insert_id();
				$arr_ta = $this->input->post('id_ta', TRUE);
				foreach ($arr_ta as $v) {
					$data = array(
						'id_kunker' => $insert_id,
						'id_ta' => $v,
					);
					//input ke kunker_ta;
					$this->Kunker_ta_model->insert($data);
				}

				$this->session->set_flashdata('message', 'Data Kunjungan Berhasil Diajukan');
				redirect(site_url('kunker'));
			}
		}
	}

	public function update($id)
	{
		$row = $this->Kunker_model->get_by_id($id);

		if ($row) {
			$data = array(
				'button' => 'Update',
				'action' => site_url('kunker/update_action'),
				'id_kunker' => set_value('id_kunker', $row->id_kunker),
				'id_jenis_kunjungan' => set_value('id_jenis_kunjungan', $row->id_jenis_kunjungan),
				'nomor_surat' => set_value('nomor_surat', $row->nomor_surat),
				'tanggal_surat' => set_value('tanggal_surat', $row->tanggal_surat),
				'perihal_surat' => set_value('perihal_surat', $row->perihal_surat),
				'lampiran_surat' => set_value('lampiran_surat', $row->lampiran_surat),
				'tingkat_keamanan' => set_value('tingkat_keamanan', $row->tingkat_keamanan),
				'id_fraksi' => set_value('id_fraksi', $row->id_fraksi),
				'id_anggota_fraksi' => set_value('id_anggota_fraksi', $row->id_anggota_fraksi),
				'id_kunker_ta' => set_value('id_kunker_ta', $row->id_kunker_ta),
				'nama_daerah_tujuan' => set_value('nama_daerah_tujuan', $row->nama_daerah_tujuan),
				'file_surat' => set_value('file_surat', $row->file_surat),
				'file_nodin' => set_value('file_nodin', $row->file_nodin),
				'pemberi_disposisi' => set_value('pemberi_disposisi', $row->pemberi_disposisi),
				'tgl_berangkat' => set_value('tgl_berangkat', $row->tgl_berangkat),
				'tgl_kembali' => set_value('tgl_kembali', $row->tgl_kembali),
				'isi_disposisi' => set_value('isi_disposisi', $row->isi_disposisi),
				'tujuan_disposisi' => set_value('tujuan_disposisi', $row->tujuan_disposisi),
				'status_disposisi' => set_value('status_disposisi', $row->status_disposisi),
				'created_at' => set_value('created_at', $row->created_at),
				'disposisi_at' => set_value('disposisi_at', $row->disposisi_at),
				'created_by' => set_value('created_by', $row->created_by),
				'disposisi_by' => set_value('disposisi_by', $row->disposisi_by),
				'diposisi_note' => set_value('diposisi_note', $row->diposisi_note),
				'content' => 'backend/kunker/kunker_form',
			);
			$this->load->view(layout(), $data);
		} else {
			$this->session->set_flashdata('message', 'Record Not Found');
			redirect(site_url('kunker'));
		}
	}

	public function update_action()
	{
		$this->_rules();

		if ($this->form_validation->run() == FALSE) {
			$this->update($this->input->post('id_kunker', TRUE));
		} else {
			$data = array(
				'id_jenis_kunjungan' => $this->input->post('id_jenis_kunjungan', TRUE),
				'nomor_surat' => $this->input->post('nomor_surat', TRUE),
				'tanggal_surat' => $this->input->post('tanggal_surat', TRUE),
				'perihal_surat' => $this->input->post('perihal_surat', TRUE),
				'lampiran_surat' => $this->input->post('lampiran_surat', TRUE),
				'tingkat_keamanan' => $this->input->post('tingkat_keamanan', TRUE),
				'id_fraksi' => $this->input->post('id_fraksi', TRUE),
				'id_anggota_fraksi' => $this->input->post('id_anggota_fraksi', TRUE),
				'id_kunker_ta' => $this->input->post('id_kunker_ta', TRUE),
				'nama_daerah_tujuan' => $this->input->post('nama_daerah_tujuan', TRUE),
				'file_surat' => $this->input->post('file_surat', TRUE),
				'file_nodin' => $this->input->post('file_nodin', TRUE),
				'pemberi_disposisi' => $this->input->post('pemberi_disposisi', TRUE),
				'isi_disposisi' => $this->input->post('isi_disposisi', TRUE),
				'tujuan_disposisi' => $this->input->post('tujuan_disposisi', TRUE),
				'status_disposisi' => $this->input->post('status_disposisi', TRUE),
				'created_at' => $this->input->post('created_at', TRUE),
				'disposisi_at' => $this->input->post('disposisi_at', TRUE),
				'created_by' => $this->input->post('created_by', TRUE),
				'disposisi_by' => $this->input->post('disposisi_by', TRUE),
				'diposisi_note' => $this->input->post('diposisi_note', TRUE),
			);

			$this->Kunker_model->update($this->input->post('id_kunker', TRUE), $data);
			$this->session->set_flashdata('message', 'Update Record Success');
			redirect(site_url('kunker'));
		}
	}

	public function delete($id)
	{
		$row = $this->Kunker_model->get_by_id($id);

		if ($row) {
			$this->Kunker_model->delete($id);
			$this->session->set_flashdata('message', 'Delete Record Success');
			redirect(site_url('kunker'));
		} else {
			$this->session->set_flashdata('message', 'Record Not Found');
			redirect(site_url('kunker'));
		}
	}

	public function verify($id)
	{

		$row = $this->Kunker_model->get_by_id($id);
		if ($row) {
			$data = $row;
			$data->content = 'backend/kunker/kunker_verify';


			// wfDebug($data);
			$this->load->view(
				layout(),
				$data
			);
		} else {
			$this->session->set_flashdata('message', 'Record Not Found');
			redirect(site_url('kunker'));
		}
	}

	public function getArrTa()
	{
		$search = $this->input->get('q');
		$id_ta = $this->input->get('id_ta');
		$this->db->select('id_user, fullname');
		$this->db->like('fullname', $search);
		$this->db->where('id_parent', $id_ta);
		$q = $this->db->get('users')->result();
		echo json_encode($q);
	}

	public function _rules()
	{
		$this->form_validation->set_rules('id_jenis_kunjungan', 'id jenis kunjungan', 'trim|required');
		$this->form_validation->set_rules('nomor_surat', 'nomor surat', 'trim|required');
		$this->form_validation->set_rules('tanggal_surat', 'tanggal surat', 'trim|required');
		$this->form_validation->set_rules('perihal_surat', 'perihal surat', 'trim|required');
		$this->form_validation->set_rules('lampiran_surat', 'lampiran surat', 'trim|required');
		$this->form_validation->set_rules('tingkat_keamanan', 'tingkat keamanan', 'trim|required');
		$this->form_validation->set_rules('id_fraksi', 'id fraksi', 'trim|required');
		$this->form_validation->set_rules('id_anggota_fraksi', 'id anggota fraksi', 'trim|required');
		$this->form_validation->set_rules('id_kunker_ta', 'id kunker ta', 'trim');
		$this->form_validation->set_rules('nama_daerah_tujuan', 'nama daerah tujuan', 'trim|required');
		$this->form_validation->set_rules('file_surat', 'file surat', 'trim');
		$this->form_validation->set_rules('file_nodin', 'file nodin', 'trim');
		$this->form_validation->set_rules('pemberi_disposisi', 'pemberi disposisi', 'trim');
		$this->form_validation->set_rules('isi_disposisi', 'isi disposisi', 'trim');
		$this->form_validation->set_rules('tujuan_disposisi', 'tujuan disposisi', 'trim');
		$this->form_validation->set_rules('status_disposisi', 'status disposisi', 'trim');
		$this->form_validation->set_rules('created_at', 'created at', 'trim');
		$this->form_validation->set_rules('disposisi_at', 'disposisi at', 'trim');
		$this->form_validation->set_rules('created_by', 'created by', 'trim');
		$this->form_validation->set_rules('disposisi_by', 'disposisi by', 'trim');
		$this->form_validation->set_rules('diposisi_note', 'diposisi note', 'trim');

		$this->form_validation->set_rules('id_kunker', 'id_kunker', 'trim');
		$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
	}

	public function excel()
	{
		$this->load->helper('exportexcel');
		$namaFile = "kunker.xls";
		$judul = "kunker";
		$tablehead = 0;
		$tablebody = 1;
		$nourut = 1;
		//penulisan header
		header("Pragma: public");
		header("Expires: 0");
		header("Cache-Control: must-revalidate, post-check=0,pre-check=0");
		header("Content-Type: application/force-download");
		header("Content-Type: application/octet-stream");
		header("Content-Type: application/download");
		header("Content-Disposition: attachment;filename=" . $namaFile . "");
		header("Content-Transfer-Encoding: binary ");

		xlsBOF();

		$kolomhead = 0;
		xlsWriteLabel($tablehead, $kolomhead++, "No");
		xlsWriteLabel($tablehead, $kolomhead++, "Id Jenis Kunjungan");
		xlsWriteLabel($tablehead, $kolomhead++, "Nomor Surat");
		xlsWriteLabel($tablehead, $kolomhead++, "Tanggal Surat");
		xlsWriteLabel($tablehead, $kolomhead++, "Perihal Surat");
		xlsWriteLabel($tablehead, $kolomhead++, "Lampiran Surat");
		xlsWriteLabel($tablehead, $kolomhead++, "Tingkat Keamanan");
		xlsWriteLabel($tablehead, $kolomhead++, "Id Fraksi");
		xlsWriteLabel($tablehead, $kolomhead++, "Id Anggota Fraksi");
		xlsWriteLabel($tablehead, $kolomhead++, "Id Kunker Ta");
		xlsWriteLabel($tablehead, $kolomhead++, "Nama Daerah Tujuan");
		xlsWriteLabel($tablehead, $kolomhead++, "File Surat");
		xlsWriteLabel($tablehead, $kolomhead++, "File Nodin");
		xlsWriteLabel($tablehead, $kolomhead++, "Pemberi Disposisi");
		xlsWriteLabel($tablehead, $kolomhead++, "Isi Disposisi");
		xlsWriteLabel($tablehead, $kolomhead++, "Tujuan Disposisi");
		xlsWriteLabel($tablehead, $kolomhead++, "Status Disposisi");
		xlsWriteLabel($tablehead, $kolomhead++, "Created At");
		xlsWriteLabel($tablehead, $kolomhead++, "Disposisi At");
		xlsWriteLabel($tablehead, $kolomhead++, "Created By");
		xlsWriteLabel($tablehead, $kolomhead++, "Disposisi By");
		xlsWriteLabel($tablehead, $kolomhead++, "Diposisi Note");

		foreach ($this->Kunker_model->get_all() as $data) {
			$kolombody = 0;

			//ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
			xlsWriteNumber($tablebody, $kolombody++, $nourut);
			xlsWriteNumber($tablebody, $kolombody++, $data->id_jenis_kunjungan);
			xlsWriteLabel($tablebody, $kolombody++, $data->nomor_surat);
			xlsWriteLabel($tablebody, $kolombody++, $data->tanggal_surat);
			xlsWriteLabel($tablebody, $kolombody++, $data->perihal_surat);
			xlsWriteLabel($tablebody, $kolombody++, $data->lampiran_surat);
			xlsWriteLabel($tablebody, $kolombody++, $data->tingkat_keamanan);
			xlsWriteNumber($tablebody, $kolombody++, $data->id_fraksi);
			xlsWriteNumber($tablebody, $kolombody++, $data->id_anggota_fraksi);
			xlsWriteNumber($tablebody, $kolombody++, $data->id_kunker_ta);
			xlsWriteLabel($tablebody, $kolombody++, $data->nama_daerah_tujuan);
			xlsWriteLabel($tablebody, $kolombody++, $data->file_surat);
			xlsWriteLabel($tablebody, $kolombody++, $data->file_nodin);
			xlsWriteLabel($tablebody, $kolombody++, $data->pemberi_disposisi);
			xlsWriteLabel($tablebody, $kolombody++, $data->isi_disposisi);
			xlsWriteLabel($tablebody, $kolombody++, $data->tujuan_disposisi);
			xlsWriteNumber($tablebody, $kolombody++, $data->status_disposisi);
			xlsWriteLabel($tablebody, $kolombody++, $data->created_at);
			xlsWriteLabel($tablebody, $kolombody++, $data->disposisi_at);
			xlsWriteNumber($tablebody, $kolombody++, $data->created_by);
			xlsWriteNumber($tablebody, $kolombody++, $data->disposisi_by);
			xlsWriteLabel($tablebody, $kolombody++, $data->diposisi_note);

			$tablebody++;
			$nourut++;
		}

		xlsEOF();
		exit();
	}
}
