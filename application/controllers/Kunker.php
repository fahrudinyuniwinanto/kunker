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
		$this->load->model('Jenis_kunjungan_model');
		$this->load->library('form_validation');
	}

	public function index()
	{
		$q = urldecode($this->input->get('q', TRUE));
		$status = urldecode($this->input->get('s', TRUE));
		$start = intval($this->input->get('start'));
		if (strpos($q, 'A-') !== false) {
			$q = str_replace('A-', '', $q);
		}

		if ($q <> '') {
			$config['base_url'] = base_url() . 'kunker/index.html?q=' . urlencode($q) . '&s=' . urlencode($status);
			$config['first_url'] = base_url() . 'kunker/index.html?q=' . urlencode($q) . '&s=' . urlencode($status);
		} else {
			$config['base_url'] = base_url() . 'kunker/index.html';
			$config['first_url'] = base_url() . 'kunker/index.html';
		}
		$config['per_page'] = 10;
		$config['page_query_string'] = TRUE;
		$config['total_rows'] = $this->Kunker_model->total_rows($q, $status);
		$kunker = $this->Kunker_model->get_limit_data($config['per_page'], $start, $q, $status);

		$this->load->library('pagination');
		$this->pagination->initialize($config);

		$data = array(
			'kunker_data' => $kunker,
			'q' => $q,
			's' => $status,
			'pagination' => $this->pagination->create_links(),
			'total_rows' => $config['total_rows'],
			'start' => $start,
			'content' => 'backend/kunker/kunker_list',
		);
		$this->load->view(layout(), $data);
	}

	public function cekNotifikasi()
	{
		// wfDebug($_SESSION);
		$taOrTu = getSession('id_group');
		// die($taOrTu);
		if ($taOrTu == 3) { //ta
			$numrows = $this->db->get_where('kunker', ['id_anggota_fraksi' => getSession('no_anggota'), 'notif_adminta' => 1])->num_rows();
		} else if ($taOrTu == 2) { //tu
			$numrows = $this->db->get_where('kunker', ['status_disposisi' => 0, 'notif_admintu' => 1])->num_rows();
		} else if ($taOrTu == 5) { //biro
			$numrows = $this->db->get_where('kunker', ['dispo_keu_stat' => 0, 'dispo_keu_notif_from' => 1])->num_rows();
		} else if ($taOrTu == 7) { //biro
			$numrows = $this->db->get_where('kunker', ['dispo_kasubbag_stat' => 0, 'dispo_kasubbag_notif_from' => 1])->num_rows();
		} else if ($taOrTu == 6) { //biro
			$numrows = $this->db->get_where('kunker', ['dispo_kabag_stat' => 0, 'dispo_kabag_notif_from' => 1])->num_rows();
		} else {
			$numrows = 0;
		}
		// die($this->db->last_query());
		echo json_encode(['numrows' => $numrows]);
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
		$this->db->where(['id_kunker' => $id])->update('kunker', ['notif_adminta' => 0]);
		if ($row) {
			$data = array(
				'id_kunker' => $row->id_kunker,
				'id_jenis_kunjungan' => $row->id_jenis_kunjungan,
				'maksimal_kunjungan' => $row->maksimal_kunjungan,
				'jumlah_hari' => $row->jumlah_hari_kunjungan,
				'nama_kunker' => $row->nama_kunker,
				'kunjungan_ke' => $row->kunjungan_ke,
				'tgl_berangkat' => $row->tgl_berangkat,
				'tgl_kembali' => $row->tgl_kembali,
				'nama_fraksi' => $row->nama_fraksi,
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
				'diposisi_note' => $row->diposisi_note,
				'alasan_tolak' => $row->alasan_tolak,
				'content' => 'backend/kunker/kunker_read',
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
			'button' => 'Ajukan Permohonan',
			'action' => site_url('kunker/create_action'),
			'id_kunker' => set_value('id_kunker'),
			'id_jenis_kunjungan' => set_value('id_jenis_kunjungan'),
			'kunjungan_ke' => set_value('kunjungan_ke'),
			'nomor_surat' => set_value('nomor_surat'),
			'jumlah_hari' => set_value('jumlah_hari'),
			'tanggal_surat' => set_value('tanggal_surat'),
			'perihal_surat' => set_value('perihal_surat'),
			'lampiran_surat' => set_value('lampiran_surat'),
			'tingkat_keamanan' => set_value('tingkat_keamanan'),
			'id_fraksi' => set_value('id_fraksi', $this->session->userdata('id_fraksi')),
			'no_anggota' => set_value('no_anggota', $this->session->userdata('no_anggota')),
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
			'alasan_tolak' => set_value('alasan_tolak'),
			'created_at' => set_value('created_at'),
			'disposisi_at' => set_value('disposisi_at'),
			'created_by' => set_value('created_by'),
			'disposisi_by' => set_value('disposisi_by'),
			'diposisi_note' => set_value('diposisi_note'),
			'data_ta' => $this->db->select('id_user, fullname')->where('id_parent', $this->session->userdata('id_user'))->where('status', '1')->get('users')->result(),
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
			// VALIDASI JUMLAH KUNJUNGAN
			//ambil data jenis kunjungan => maksimal kunjungan
			$jenis_kunjungan = $this->db->get_where('jenis_kunjungan', ['id_jenis_kunjungan' => $this->input->post('id_jenis_kunjungan', TRUE)])->row();
			//count jumlah kunjungan di table kunker berdasar id jenis kunjungan
			$jumlah_kunjungan = $this->db->get_where('kunker', ['id_jenis_kunjungan' => $this->input->post('id_jenis_kunjungan', TRUE), 'id_anggota_fraksi' => $this->input->post('id_jenis_kunjungan', TRUE), 'YEAR(tgl_berangkat)' => date('Y', strtotime($this->input->post('tgl_berangkat', TRUE)))])->num_rows();
			//jika jumlah kunjungan >= maksimal kunjungan-> tolak jika tidak -> lanjutkan input
			if ($jumlah_kunjungan >= $jenis_kunjungan->maksimal_kunjungan) {

				$this->session->set_flashdata('error_message', 'Quota kunjungan untuk jenis kunjungan ' . $jenis_kunjungan->nama_kunker . ' tersebut sudah penuh. Maksimal adalah ' . $jenis_kunjungan->maksimal_kunjungan . ' kunjungan.');
				$this->create();
			} else {
				//VALIDASI JUMLAH HARI PER 1 KUNJUNGAN
				if ($this->input->post('jumlah_hari', TRUE) > $jenis_kunjungan->jumlah_hari) {

					$this->session->set_flashdata('error_message', 'Jumlah maksimal hari pada jenis kunjungan ' . $jenis_kunjungan->nama_kunker . '  adalah ' . $jenis_kunjungan->jumlah_hari . ' hari.');
					$this->create();
				} else {
					//cek apakah rentang waktu yang dinnputkan bentrok dengan kunjungan lain atau tidak

					$id_anggota_fraksi = $this->input->post('id_anggota_fraksi', TRUE);
					$tgl_berangkat = $this->input->post('tgl_berangkat', TRUE);
					$tgl_kembali = $this->input->post('tgl_kembali', TRUE);
					$sql = "SELECT * FROM kunker WHERE id_anggota_fraksi='$id_anggota_fraksi' AND (tgl_berangkat BETWEEN '$tgl_berangkat' AND '$tgl_kembali' OR tgl_kembali BETWEEN '$tgl_berangkat' AND '$tgl_kembali')";
					$cek_tgl = $this->db->query($sql)->num_rows();

					if ($cek_tgl != 0) {

						$this->session->set_flashdata('error_message', '<h4>Sudah ada kunjungan pada tanggal tersebut. Silahkan cek kembali permohonan Anda.</h4>');
						$this->create();
					} else {
						$data = array(
							'id_jenis_kunjungan' => $this->input->post('id_jenis_kunjungan', TRUE),
							'alasan_tolak' => $this->input->post('alasan_tolak', TRUE),
							'kunjungan_ke' => $this->input->post('kunjungan_ke', TRUE),
							'nomor_surat' => $this->input->post('nomor_surat', TRUE),
							'tanggal_surat' => $this->input->post('tanggal_surat', TRUE),
							'tgl_berangkat' => $this->input->post('tgl_berangkat', TRUE),
							'tgl_kembali' => $this->input->post('tgl_kembali', TRUE),
							'jumlah_hari' => $this->input->post('jumlah_hari', TRUE),
							'perihal_surat' => $this->input->post('perihal_surat', TRUE),
							'lampiran_surat' => $this->input->post('lampiran_surat', TRUE),
							'tingkat_keamanan' => $this->input->post('tingkat_keamanan', TRUE),
							'id_fraksi' => $this->input->post('id_fraksi', TRUE),
							'id_anggota_fraksi' => $this->input->post('id_anggota_fraksi', TRUE),
							'id_kunker_ta' => $this->input->post('id_kunker_ta', TRUE),
							'nama_daerah_tujuan' => $this->input->post('nama_daerah_tujuan', TRUE),
							'file_surat' => sf_upload('dok_permohonan', 'assets/dok_permohonan', 'pdf', 2048, 'file_surat'),
							'created_at' => date('Y-m-d H:i:s'),
							'notif_admintu' => 1,
							'notif_adminta' => 0
						);
						//input ke kunker;
						$this->Kunker_model->insert($data);
						$insert_id = $this->db->insert_id();
						//$arr_ta = $this->input->post('id_ta', TRUE);
						//print_r($arr_ta);
						//die('sasa');
						//foreach ($arr_ta as $v) {
						$data = array(
							'id_kunker' => $insert_id,
							'id_ta' => $this->input->post('id_ta', TRUE),
						);
						//input ke kunker_ta;
						$this->Kunker_ta_model->insert($data);
						//}

						$this->session->set_flashdata('message', 'Data Kunjungan Berhasil Diajukan');
						redirect(site_url('kunker'));
					}
				}
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
				'no_anggota' => set_value('no_anggota', $row->no_anggota),
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

				'kunjungan_ke' => set_value('kunjungan_ke'),
				'id_kunker_ta' => set_value('id_kunker_ta'),
				'jumlah_hari' => set_value('jumlah_hari', 3),
				'data_ta' => $this->db->select('id_user, fullname')->where('id_parent', $this->session->userdata('id_user'))->where('status', '1')->get('users')->result(),


				'content' => 'backend/kunker/kunker_form',
			);
			//echo '<pre>';
			//print_r($data);
			//die();
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

			$arr = $this->db->get_where("kunker", ['id_kunker' => $this->input->post('id_kunker', TRUE)])->row();
			if ($_FILES['file_surat']['name'] != "") {
				unlink("./assets/dok_permohonan/" . $arr->file_surat);
				$file_name = sf_upload('dok_permohonan', 'assets/dok_permohonan', 'pdf', 2048, 'file_surat');
			} else {
				$file_name = $arr->file_surat;
			}
			$data = array(
				'id_jenis_kunjungan' => $this->input->post('id_jenis_kunjungan', TRUE),
				'kunjungan_ke' => $this->input->post('kunjungan_ke', TRUE),
				'nomor_surat' => $this->input->post('nomor_surat', TRUE),
				'tanggal_surat' => $this->input->post('tanggal_surat', TRUE),
				'tgl_berangkat' => $this->input->post('tgl_berangkat', TRUE),
				'tgl_kembali' => $this->input->post('tgl_kembali', TRUE),
				'jumlah_hari' => $this->input->post('jumlah_hari', TRUE),
				'perihal_surat' => $this->input->post('perihal_surat', TRUE),
				'lampiran_surat' => $this->input->post('lampiran_surat', TRUE),
				'tingkat_keamanan' => $this->input->post('tingkat_keamanan', TRUE),
				'id_fraksi' => $this->input->post('id_fraksi', TRUE),
				'id_anggota_fraksi' => $this->input->post('id_anggota_fraksi', TRUE),
				'id_kunker_ta' => $this->input->post('id_kunker_ta', TRUE),
				'nama_daerah_tujuan' => $this->input->post('nama_daerah_tujuan', TRUE),
				'file_surat' => $file_name,
				'status_disposisi' => 0,
				'notif_admintu' => 1,
				'notif_adminta' => 0
			);

			$this->Kunker_model->update($this->input->post('id_kunker', TRUE), $data);

			$arr_ta = $this->input->post('id_ta', TRUE);
			$this->db->where('id_kunker', $this->input->post('id_kunker', TRUE))->delete('kunker_ta');
			foreach ($arr_ta as $v) {
				$data = array(
					'id_kunker' => $this->input->post('id_kunker', TRUE),
					'id_ta' => $v,
				);
				//input ke kunker_ta;
				$this->Kunker_ta_model->insert($data);
			}
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

	public function cek_tanggal()
	{

		$sql = "SELECT * FROM kunker WHERE id_anggota_fraksi='$id_anggota_fraksi' AND (tgl_berangkat BETWEEN '$tgl_berangkat' AND '$tgl_kembali' OR tgl_kembali BETWEEN '$tgl_berangkat' AND '$tgl_kembali')";
		$cek_tgl = $this->db->query($sql)->num_rows();
	}

	public function verify($id)
	{

		$row = $this->Kunker_model->get_by_id($id);
		if ($row) {
			$fieldNotif = getSession('id_group') == 2 ? 'notif_admintu' : (getSession('id_group') == 3 ? 'notif_adminta' : '');

			if ($fieldNotif != "") {
				$this->db->where(['id_kunker' => $id])->update('kunker', [$fieldNotif => 0]);
			}

			$data = $row;
			$data->content = 'backend/kunker/kunker_verify';
			$data->arr_tujuan_disposisi = get_combo('karo', 'id_karo', 'karo', ['' => 'Pilih karo ...']);


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

	public function verify_biro_keuangan($id)
	{
		$row = $this->Kunker_model->get_by_id($id);
		if ($row) {

			$data = $row;
			$data->content = 'backend/kunker/kunker_verify_biro_keuangan';
			$data->arr_tujuan_disposisi = get_combo('kasubbag', 'id_kasubbag', 'kasubbag', ['' => 'Pilih kasubbag ...']);


			//wfDebug($data);
			$this->load->view(
				layout(),
				$data
			);
		} else {
			$this->session->set_flashdata('message', 'Record Not Found');
			redirect(site_url('kunker'));
		}
	}


	public function verify_kabag($id)
	{
		$row = $this->Kunker_model->get_by_id($id);
		if ($row) {

			$data = $row;
			$data->content = 'backend/kunker/kunker_verify_kabag';
			$data->arr_tujuan_disposisi = get_combo('karo', 'id_karo', 'karo', ['' => 'Pilih karo ...']);


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

	public function verify_kasubbag($id)
	{
		$row = $this->Kunker_model->get_by_id($id);
		if ($row) {

			$data = $row;
			$data->content = 'backend/kunker/kunker_verify_kasubbag';
			$data->arr_tujuan_disposisi = get_combo('kabag', 'id_kabag', 'kabag', ['' => 'Pilih kabag ...']);


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

	public function verify_action()
	{
		$status = $this->input->post('status', TRUE);
		$note = $this->input->post('diposisi_note', TRUE);
		$alasan_tolak = $this->input->post('alasan_tolak', TRUE);
		$save = $this->db->update('kunker', [
			//notif kebawah
			'notif_adminta' => 1,
			'notif_admintu' => 0,

			//notif keatas
			'dispo_keu_stat' => 0,
			'dispo_keu_notif_from' => 1,
			'dispo_keu_notif_to' => 0,

			//manajemen dispo
			'status_disposisi' => $status,
			'diposisi_note' => $note,
			'tujuan_disposisi' => $this->input->post('tujuan_disposisi'),
			'disposisi_at' => date("Y-m-d H:i:s"),
			'disposisi_by' => getSession('fullname'),
			'alasan_tolak' => $alasan_tolak,

		], array('id_kunker' => $this->input->post('id_kunker')));
		if ($save) {
			if ($status == 1) {
				$res['msg'] = "Pengajuan SPPD berhasil diverifikasi";
				$res['title'] = "Berhasil";
				$res['icon'] = 'success';
			} else {
				$res['msg'] = "Pengajuan SPPD ditolak";
				$res['title'] = "Ditolak";
				$res['icon'] = 'success';
			}
		} else {
			$res['msg'] = "Pengajuan SPPD gagal diverifikasi";
			$res['title'] = "Error";
			$res['icon'] = 'error';
		}
		echo json_encode($res);
	}

	public function verify_action_biro_keuangan()
	{
		$status = $this->input->post('status', TRUE);
		$note = $this->input->post('diposisi_note', TRUE);
		$alasan_tolak = $this->input->post('alasan_tolak', TRUE);
		$save = $this->db->update('kunker', [
			//notif ke bawah
			'notif_admintu' => 1,
			'dispo_keu_notif_from' => 0,

			//notif keatas
			'dispo_kasubag_notif_from' => 1,
			'dispo_kasubag_notif_to' => 0,

			//manajemen dispo
			'dispo_keu_stat' => $status,
			'dispo_keu_note' => $note,
			'dispo_keu_at' => date("Y-m-d H:i:s"),

			//tujuan dispo
			'dispo_kasubag_from' => $this->input->post('tujuan_disposisi'),
			'dispo_kasubag_stat' => 0,

		], array('id_kunker' => $this->input->post('id_kunker')));
		if ($save) {
			if ($status == 1) {
				$res['msg'] = "Pengajuan SPPD berhasil didisposisi";
				$res['title'] = "Berhasil";
				$res['icon'] = 'success';
			} else {
				$res['msg'] = "Pengajuan SPPD ditolak";
				$res['title'] = "Ditolak";
				$res['icon'] = 'success';
			}
		} else {
			$res['msg'] = "Pengajuan SPPD gagal diverifikasi";
			$res['title'] = "Error";
			$res['icon'] = 'error';
		}
		echo json_encode($res);
	}


	public function verify_action_kasubbag()
	{
		$status = $this->input->post('status', TRUE);
		$note = $this->input->post('diposisi_note', TRUE);
		$alasan_tolak = $this->input->post('alasan_tolak', TRUE);
		$save = $this->db->update('kunker', [
			//notif kebawah
			'dispo_keu_notif_to' => 1,
			'dispo_kasubag_notif_from' => 0,

			//notif keatas
			'dispo_kabag_notif_from' => 1,

			//manajemen dispo
			'dispo_kasubag_stat' => $status,
			'dispo_kasubag_note' => $note,
			'dispo_kasubag_at' => date("Y-m-d H:i:s"),

			//tujuan dispo
			'dispo_kabag_from' => $this->input->post('tujuan_disposisi'),
			'dispo_kabag_stat' => 0,

		], array('id_kunker' => $this->input->post('id_kunker')));
		if ($save) {
			if ($status == 1) {
				$res['msg'] = "Pengajuan SPPD berhasil didisposisi";
				$res['title'] = "Berhasil";
				$res['icon'] = 'success';
			} else {
				$res['msg'] = "Pengajuan SPPD ditolak";
				$res['title'] = "Ditolak";
				$res['icon'] = 'success';
			}
		} else {
			$res['msg'] = "Pengajuan SPPD gagal diverifikasi";
			$res['title'] = "Error";
			$res['icon'] = 'error';
		}
		echo json_encode($res);
	}


	public function verify_action_kabag()
	{
		$status = $this->input->post('status', TRUE);
		$note = $this->input->post('diposisi_note', TRUE);
		$alasan_tolak = $this->input->post('alasan_tolak', TRUE);
		$save = $this->db->update('kunker', [
			//notif kebawah
			'dispo_kasubag_notif_to' => 1,
			'dispo_kabag_notif_from' => 0,

			//manajemen dispo
			'dispo_kabag_stat' => $status,
			'dispo_kabag_note' => $note,
			'dispo_kabag_at' => date("Y-m-d H:i:s"),

		], array('id_kunker' => $this->input->post('id_kunker')));
		if ($save) {
			if ($status == 1) {
				$res['msg'] = "Pengajuan SPPD berhasil didisposisi";
				$res['title'] = "Berhasil";
				$res['icon'] = 'success';
			} else {
				$res['msg'] = "Pengajuan SPPD ditolak";
				$res['title'] = "Ditolak";
				$res['icon'] = 'success';
			}
		} else {
			$res['msg'] = "Pengajuan SPPD gagal diverifikasi";
			$res['title'] = "Error";
			$res['icon'] = 'error';
		}
		echo json_encode($res);
	}


	public function disposisi($id)
	{
		$data = [
			'v' => $this->Kunker_model->get_by_id($id),
			'content' => 'backend/kunker/kunker_disposisi'
		];
		$this->load->view($data['content'], $data);
	}

	public function tracking()
	{
		$data = [
			'content' => 'backend/kunker/kunker_track',
		];

		$this->load->view(layout(), $data);
	}

	public function tracking_action()
	{
		$no_surat = $this->input->post('nomor_surat', TRUE);

		$row = $this->db->get_where('kunker', ['nomor_surat' => $no_surat])->row();
		if ($row) {
			$row->content = 'backend/kunker/kunker_timeline';
			$this->load->view(
				layout(),
				$row
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
		$this->db->where('status', '1');
		$q = $this->db->get('users')->result();
		echo json_encode($q);
	}

	public function get_maks_hari()
	{
		$id_jenis_kunjungan = 1; //$this->input->get('id_jenis_kunjungan');
		$res = $this->db->get_where('jenis_kunjungan', ['id_jenis_kunjungan' => $id_jenis_kunjungan])->row();
		echo json_encode($res);
	}

	public function get_data_kunjungan()
	{
		$id_jenis_kunjungan = $this->input->get('id_jenis_kunjungan');
		$res['jenis_kunjungan'] = $this->db->get_where('jenis_kunjungan', ['id_jenis_kunjungan' => $id_jenis_kunjungan])->row();
		$res['jumlah_kunjungan'] = $this->db->get_where('kunker', ['id_jenis_kunjungan' => $id_jenis_kunjungan, 'id_anggota_fraksi' => $this->session->userdata('id_user'), 'YEAR(tgl_berangkat)' => date('Y')])->num_rows();
		echo json_encode($res);
	}

	public function _rules()
	{
		$this->form_validation->set_rules('id_jenis_kunjungan', 'id jenis kunjungan', 'trim|required');
		$this->form_validation->set_rules('kunjungan_ke', 'kunjungan ke', 'trim');
		$this->form_validation->set_rules('nomor_surat', 'nomor surat', 'trim|required');
		$this->form_validation->set_rules('tanggal_surat', 'tanggal surat', 'trim|required');
		$this->form_validation->set_rules('perihal_surat', 'perihal surat', 'trim|required');
		$this->form_validation->set_rules('lampiran_surat', 'lampiran surat', 'trim|required');
		$this->form_validation->set_rules('tingkat_keamanan', 'tingkat keamanan', 'trim|required');
		$this->form_validation->set_rules('id_fraksi', 'id fraksi', 'trim|required');
		$this->form_validation->set_rules('id_anggota_fraksi', 'id anggota fraksi', 'trim|required');
		$this->form_validation->set_rules('id_kunker_ta', 'id kunker ta', 'trim');
		$this->form_validation->set_rules('nama_daerah_tujuan', 'nama daerah tujuan', 'trim');
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
