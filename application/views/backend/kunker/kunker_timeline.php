<?php //wfDebug(get_defined_vars());  ?>
<ol class="breadcrumb float-xl-end">
	<li class="breadcrumb-item"><a href="javascript:;">Home</a></li>
	<li class="breadcrumb-item"><a href="javascript:;">Tracking</a></li>

</ol>


<h1 class="page-header">Hasil Pencarian <small>Surat Permohonan Kunjungan Kerja Nomor Surat:
		<?= $nomor_surat ?>
	</small></h1>


<div class="timeline">
	<div class="timeline-item">
		<div class="timeline-time">
			<span class="date">Admin TA</span>
			<span class="time">
				<?= tanggal_indo($created_at) ?><br><small style="font-size:12px;">Jam
					<?= date_format(date_create($created_at), "H:i:s") ?>
				</small>
			</span>
		</div>
		<div class="timeline-icon">
			<a href="javascript:;">&nbsp;</a>
		</div>
		<div class="timeline-content">
			<div class="timeline-header">
				<img src="https://cdn-icons-png.flaticon.com/512/4727/4727424.png" style="width: 40px" alt="">
				<div class="username">
					<?php $ta = $this->db->get_where('users', ['id_user' => $id_anggota_fraksi])->row() ?>
					<a href="javascript:;"><?= @$ta->fullname ?></a>
					<div class="text-muted fs-12px"><i class="fa fa-id-card opacity-5 ms-1"></i>
						TA-<?= @$ta->no_anggota ?> </div>
				</div>
				<div>
				</div>
			</div>
			<div class="timeline-body">
				<div class="mb-3">
					<div class="mb-2">
						Permohonan Kunjungan Kerja dibuat
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="timeline-item">
		<div class="timeline-time">
			<span class="date">Admin TU</span>
			<span class="time">
				<?= tanggal_indo($disposisi_at) ?><br><small style="font-size:12px;">Jam
					<?= date_format(date_create($disposisi_at), "H:i:s") ?>
				</small>
			</span>
		</div>
		<div class="timeline-icon">
			<a href="javascript:;">&nbsp;</a>
		</div>
		<div class="timeline-content">
			<div class="timeline-header">
				<img src="https://cdn-icons-png.flaticon.com/512/4727/4727424.png" style="width: 40px" alt="">
				<div class="username">
					<?php $tu = $this->db->get_where('users', ['id_user' => 2])->row() ?>
					<a href="javascript:;"><?= @$tu->fullname ?></a>
					<div class="text-muted fs-12px"><i class="fa fa-envelope opacity-5 ms-1"></i>
						<?= @$tu->email ?> </div>
				</div>
				<div>
				</div>
			</div>
			<div class="timeline-body">
				<div class="mb-3">
					<div class="mb-2">
						<?=$diposisi_note?>
					</div>
				</div>
			</div>
		</div>
	</div>

	<div class="timeline-item">
		<div class="timeline-time">
			<span class="date">BIRO KEUANGAN</span>
			<span class="time">
				<?= tanggal_indo($dispo_keu_at) ?><br><small style="font-size:12px;">Jam
					<?= date_format(date_create($dispo_keu_at), "H:i:s") ?>
				</small>
			</span>
		</div>
		<div class="timeline-icon">
			<a href="javascript:;">&nbsp;</a>
		</div>
		<div class="timeline-content">
			<div class="timeline-header">
				<img src="https://cdn-icons-png.flaticon.com/512/4727/4727424.png" style="width: 40px" alt="">
				<div class="username">
					<?php $biro = $this->db->get_where('users', ['id_user' => $dispo_keu_from])->row() ?>
					<a href="javascript:;"><?= @$biro->fullname ?></a>
					<div class="text-muted fs-12px"><i class="fa fa-envelope opacity-5 ms-1"></i>
						<?= @$biro->email ?> </div>
				</div>
				<div>
				</div>
			</div>
			<div class="timeline-body">
				<div class="mb-3">
					<div class="mb-2">
						<?=$dispo_keu_note?>
					</div>
				</div>
			</div>
		</div>
	</div>

	<div class="timeline-item">
		<div class="timeline-time">
			<span class="date">KEPALA BAGIAN</span>
			<span class="time">
				<?= tanggal_indo($dispo_kabag_at) ?><br><small style="font-size:12px;">Jam
					<?= date_format(date_create($dispo_kabag_at), "H:i:s") ?>
				</small>
			</span>
		</div>
		<div class="timeline-icon">
			<a href="javascript:;">&nbsp;</a>
		</div>
		<div class="timeline-content">
			<div class="timeline-header">
				<img src="https://cdn-icons-png.flaticon.com/512/4727/4727424.png" style="width: 40px" alt="">
				<div class="username">
					<?php $kabag = $this->db->get_where('users', ['id_user' => $dispo_kabag_from])->row() ?>
					<a href="javascript:;"><?= @$kabag->fullname ?></a>
					<div class="text-muted fs-12px"><i class="fa fa-envelope opacity-5 ms-1"></i>
						<?= @$kabag->email ?> </div>
				</div>
				<div>
				</div>
			</div>
			<div class="timeline-body">
				<div class="mb-3">
					<div class="mb-2">
						<?=$dispo_kabag_note?>
					</div>
				</div>
			</div>
		</div>
	</div>

	
	<div class="timeline-item">
		<div class="timeline-time">
			<span class="date">KEPALA SUB BAGIAN</span>
			<span class="time">
				<?= tanggal_indo($dispo_kasubag_at) ?><br><small style="font-size:12px;">Jam
					<?= date_format(date_create($dispo_kasubag_at), "H:i:s") ?>
				</small>
			</span>
		</div>
		<div class="timeline-icon">
			<a href="javascript:;">&nbsp;</a>
		</div>
		<div class="timeline-content">
			<div class="timeline-header">
				<img src="https://cdn-icons-png.flaticon.com/512/4727/4727424.png" style="width: 40px" alt="">
				<div class="username">
					<?php $kasubag = $this->db->get_where('users', ['id_user' => $dispo_kasubag_from])->row() ?>
					<a href="javascript:;"><?= @$kasubag->fullname ?></a>
					<div class="text-muted fs-12px"><i class="fa fa-envelope opacity-5 ms-1"></i>
						<?= @$kasubag->email ?> </div>
				</div>
				<div>
				</div>
			</div>
			<div class="timeline-body">
				<div class="mb-3">
					<div class="mb-2">
						<?=$dispo_kasubag_note?>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>