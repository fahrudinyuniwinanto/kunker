<ol class="breadcrumb hidden-print float-xl-end">
	<li class="breadcrumb-item"><a href="javascript:;">Home</a></li>
	<li class="breadcrumb-item active">Invoice</li>
</ol>
<!-- END breadcrumb -->
<!-- BEGIN page-header -->
<h1 class="page-header hidden-print">Permohonan SPPD <small>Tentang <?php echo $perihal_surat; ?></small></h1>
<!-- END page-header -->
<!-- BEGIN invoice -->
<div class="invoice">
	<!-- BEGIN invoice-company -->
	<div class="invoice-company">
		<span class="float-end hidden-print">
			<a href="<?= base_url() ?>kunker" class="btn btn-sm btn-white mb-10px"><i class="fa fa-arrow-circle-left t-plus-1 text-danger fa-fw fa-lg"></i>Kembali</a>
			<a target="_blank" href="<?= base_url() ?>assets/dok_permohonan/<?= @$file_surat ?>" class="btn btn-sm btn-white mb-10px"><i class="fa fa-file-pdf t-plus-1 text-danger fa-fw fa-lg"></i> Lihat Surat <i>(<?= @$file_surat ?>)</i></a>
			<a href="<?= base_url() ?>kunker/disposisi/<?= $id_kunker ?>" target="_blank" class="btn btn-sm btn-white mb-10px"><i class="fa fa-print t-plus-1 fa-fw text-danger fa-lg"></i> Cetak Disposisi</a>
		</span>
		<?php if($alasan_tolak!=""){
			$alasan_tolak = "<i> Alasan tolak: ".$alasan_tolak."</i>";
		} else{
			$alasan_tolak = "";
		}?>
		&nbsp;Status: <?= $status_disposisi == 1 ? '<span class="text-success"><i class="fa fa-check-square"></i> Diverifikasi</span>' : ($status_disposisi == 2 ? '<span class="text-danger"><i class="fa fa-times"></i> Ditolak</span>' : ($status_disposisi == 0 ? '<span class="text-warning"><i class="fa fa-clock"></i> Menunggu Verifikasi</span>' : '')).$alasan_tolak; ?>
	</div>
	<!-- END invoice-company -->
	<!-- BEGIN invoice-header -->
	<div class="invoice-header">
		<div class="invoice-from">
			<small>Pemohon</small>
			<address class="mt-5px mb-5px">
				<strong class="text-dark"><?= @$nama_fraksi ?></strong><br />
				<strong><?= @$this->db->get_where('users', ['id_user' => $id_anggota_fraksi])->row()->fullname ?></strong><br>
				Jenis: <?= $nama_kunker ?><br />
			</address>
		</div>
		<div class="invoice-to">
			<small>Perihal</small>
			<address class="mt-5px mb-5px">
				<strong class="text-dark"><?= @$perihal_surat ?></strong><br />
				Nomor Surat: <?= @$nomor_surat ?><br />
				Tanggal Surat: <?= @$tanggal_surat ?><br />

			</address>
		</div>

		<?php $jumlah_hari_min1 = $jumlah_hari - 1; ?>
		<div class="invoice-date">
			<small>Tujuan</small>
			<div class="date text-dark mt-5px"><?= @$nama_daerah_tujuan ?></div>
			<div class="invoice-detail">
				Berangkat Pada: <?= @date('d-m-Y', strtotime($tgl_berangkat)) ?><br />
				Kembali Pada: <?= @date('d-m-Y', strtotime($tgl_berangkat . ' + ' . $jumlah_hari_min1 . ' day')) ?><br />
				Jumlah Hari: <?= @$jumlah_hari ?> hari<br />
			</div>
		</div>
	</div>
	<!-- END invoice-header -->
	<!-- BEGIN invoice-content -->
	<div class="invoice-content">
		<!-- BEGIN table-responsive -->
		<div class="table-responsive">
			<table class="table table-invoice">
				<thead>
					<tr>
						<th>NO</th>
						<th class="text-center" width="40%">NAMA</th>
						<th class="text-center" width="30%">KONTAK</th>
						<th class="text-end" width="20%">EMAIL</th>
					</tr>
				</thead>
				<tbody>
					<?php foreach ($ta = $this->db->get_where('users', "id_user IN (SELECT id_ta from kunker_ta where id_kunker='$id_kunker' )")->result() as $k => $v) : ?>
						<tr>
							<td><?= $k + 1 ?></td>
							<td>
								<span class="text-dark"><?= @$v->fullname ?></span>
							</td>
							<td class="text-center"><?= @$v->telp ?></td>
							<td class="text-end"><?= @$v->email ?></td>
						</tr>
					<?php endforeach ?>
				</tbody>
			</table>
		</div>
		<!-- END table-responsive -->
		<!-- BEGIN invoice-price -->
		<div class="invoice-price">
			<div class="invoice-price-left">
				<div class="invoice-price-row">
					<div class="sub-price">
						<small>BERANGKAT</small>
						<span class="text-dark"><?= @date_format(date_create($tgl_berangkat), 'd-m-Y') ?></span>
					</div>
					<div class="sub-price">
						s/d
					</div>
					<div class="sub-price">
						<small>PULANG</small>
						<span class="text-dark"><?= @date('d-m-Y', strtotime($tgl_berangkat . ' + ' . $jumlah_hari_min1 . ' day')) ?></span>
					</div>
				</div>
			</div>
			<div class="invoice-price-right">
				<small>TOTAL</small> <span class="fw-bold"><?= @count($ta) ?> Tenaga Ahli</span>
			</div>
		</div>
		<!-- END invoice-price -->
	</div>
	<!-- END invoice-content -->
	<!-- BEGIN invoice-note -->
	<div class="invoice-note">
		<div class="row">
			<div class="col-md-4">
				* Maksimal kunjungan <strong><?= $maksimal_kunjungan ?> kali</strong> dalam setahun<br />
				* Maksimal <strong><?= @$maksimal_hari ?> hari</strong> dalam sekali kunjungan
			</div>
			<div class="col-md-4">
				
			</div>
			<div class="col-md-4">
			<strong><i class="fa fa-fw fa-lg fa-forward"></i> Tujuan Disposisi</strong>
				<?=form_dropdown('tujuan_disposisi', $arr_tujuan_disposisi, $tujuan_disposisi,['class'=>'form-control mb-10px','id'=>'tujuan_disposisi'])?>
				<strong><i class="fa fa-fw fa-lg fa-edit"></i> Catatan Disposisi</strong>
				<p><input type='checkbox' id='disposisi_check' name='disposisi_check' <?= ($diposisi_note == "") ? 'checked' : '' ?> /> <label for="disposisi_check">Mohon untuk ditindaklanjuti sesuai dengan ketentuan yang berlaku
					</label>'</p>
				<textarea style="width: 400px;" name="diposisi_note" id="diposisi_note" class="form-control mb-10px" required placeholder="Catatan Disposisi..." rows="2" <?= ($diposisi_note == "") ? 'readonly' : '' ?>><?= $diposisi_note ?></textarea>
				<div class="collapse" id="div-btn-tolak">
				<textarea style="width: 400px;" name="alasan_tolak" id="alasan_tolak" class="form-control mb-10px" required placeholder="Isi alasan menolak disposisi..." rows="2"></textarea>
				<a href="#" onclick="confirm('2')" class="btn btn-sm btn-danger mb-10px">Tolak Disposisi</a>
					</div>
			</div>
		</div>
	</div>
	<!-- END invoice-note -->
	<!-- BEGIN invoice-footer -->
	<div class="invoice-footer">
		<p class="text-center mb-5px fw-bold">
			VERIFIKATOR
			<span class="me-10px"><i class="fa fa-fw fa-lg fa-user"></i><?= @$this->db->get_where('users', ['id_user' => $disposisi_by])->row()->fullname ?></span>
			<span class="me-10px"><i class="fa fa-fw fa-lg fa-clock"></i><?= @date_format(date_create($disposisi_at), "d-m-Y H:i") ?></span>
		</p>
		<p class="text-center fw-bold">
			<a href="<?= base_url() ?>kunker" class="btn btn-sm btn-info mb-10px"><i class="fa fa-arrow-left t-plus-1 fa-fw fa-lg"></i> Kembali</a>
			<?php if (!in_array($status_disposisi, [1, 2])) : ?>
				<a href="#" onclick="confirm('1')" class="btn btn-sm btn-success mb-10px"><i class="fa fa-check-circle t-plus-1 fa-fw fa-lg"></i> Verifikasi</a>
				<a class="btn btn-danger btn-sm mb-10px" data-toggle="collapse" href="#div-btn-tolak" aria-expanded="false" aria-controls="div-btn-tolak"><i class="fa fa-times-circle t-plus-1 fa-fw fa-lg"></i> Tolak</a>
				
			<?php elseif (in_array($status_disposisi, [1, 2])) : ?>
				<a href="#" class="btn btn-sm btn-disabled mb-10px">Sudah dilakukan disposisi</a>
			<?php endif ?>
		</p>

	</div>
	<!-- END invoice-footer -->
</div>
<script>
	$(document).ready(function() {
		$("#disposisi_check").click(function() {
			$("#diposisi_note").prop('readonly', this.checked);
		});
	});

	function confirm(status) {
		if($("#tujuan_disposisi").val() == "" && status!='2') {
			console.log($("#tujuan_disposisi").val()+'aa');
			swal('Tujuan disposisi kosong','Silakan isi tujuan disposisi dahulu','warning');
			return false;
		}
		console.log($("#tujuan_disposisi").val()+'bb');
		console.log('x');
		var msgstatus = status == '1' ? 'terima' : (status == '2' ? 'tolak' : '');
		swal({
			title: 'Yakin ' + msgstatus + ' Permohonan SPPD?',
			text: 'Setelah verifikasi, Anda tidak dapat merubah status lagi!',
			type: 'warning',
			showCancelButton: true,
			confirmButtonColor: status == '1' ? '#3085d6' : '#ff5b57',
			cancelButtonColor: '#d33',
			confirmButtonText: 'Ya, ' + msgstatus + "!",
			cancelButtonText: 'Batal',
			closeOnConfirm: false
		}, function(isConfirmed) {
			if (isConfirmed) {
				$.ajax({
					url: '<?= base_url() ?>kunker/verify_action',
					type: 'POST',
					data: {
						status: status,
						id_kunker: <?= @$id_kunker ?>,
						diposisi_note: $("#diposisi_note").val(),
						tujuan_disposisi: $("#tujuan_disposisi").val(),
						alasan_tolak: $("#alasan_tolak").val(),
					},
					dataType: 'json',
					success: function(data) {
						swal({
							title: data.title,
							text: data.msg + "<br><img src='https://cdn-icons-png.flaticon.com/512/5290/5290058.png' style='width:40%'>",
							html: true,
							customClass: '',
						}, function(result) {
							console.log(result);
							if (result) {
								location.reload();
							}
						});
					}
				})
			} else {
				swal('Dibatalkan', 'Aksi dibatalkan', 'error');
			}
		});
	}
</script>