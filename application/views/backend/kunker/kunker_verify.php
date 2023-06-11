<ol class="breadcrumb hidden-print float-xl-end">
				<li class="breadcrumb-item"><a href="javascript:;">Home</a></li>
				<li class="breadcrumb-item active">Invoice</li>
			</ol>
			<!-- END breadcrumb -->
			<!-- BEGIN page-header -->
			<h1 class="page-header hidden-print">Invoice <small>header small text goes here...</small></h1>
			<!-- END page-header -->
			<!-- BEGIN invoice -->
			<div class="invoice">
				<!-- BEGIN invoice-company -->
				<div class="invoice-company">
					<span class="float-end hidden-print">
						<a href="javascript:;" class="btn btn-sm btn-white mb-10px"><i class="fa fa-file-pdf t-plus-1 text-danger fa-fw fa-lg"></i> Lihat Surat</a>
						<a href="javascript:;" onclick="window.print()" class="btn btn-sm btn-white mb-10px"><i class="fa fa-print t-plus-1 fa-fw fa-lg"></i> Cetak Nodin</a>
					</span>
					Verifikasi SPPD tentang <?php echo $perihal_surat; ?>
				</div>
				<!-- END invoice-company -->
				<!-- BEGIN invoice-header -->
				<div class="invoice-header">
					<div class="invoice-from">
						<small>Pemohon</small>
						<address class="mt-5px mb-5px">
							<strong class="text-dark"><?=@$nama_fraksi?></strong><br />
							Jenis: <?=$nama_kunker?><br />
							Fax: (123) 456-7890
						</address>
					</div>
					<div class="invoice-to">
						<small>Perihal</small>
						<address class="mt-5px mb-5px">
							<strong class="text-dark"><?=@$perihal_surat?></strong><br />
							Nomor Surat: <?=@$nomor_surat?><br />
							Tanggal Surat: <?=@$tanggal_surat?><br />
							
						</address>
					</div>
					<div class="invoice-date">
						<small>Tujuan</small>
						<div class="date text-dark mt-5px"><?=@$nama_daerah_tujuan?></div>
						<div class="invoice-detail">
							Berangkat Pada: <?=@date('d-m-Y', strtotime($tgl_berangkat ))?><br />
							Kembali Pada: <?=@date('d-m-Y', strtotime($tgl_berangkat . ' + ' . $jumlah_hari . ' day'))?><br />
							Jumlah Hari: <?=@$jumlah_hari?> hari<br />
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
								<?php foreach($ta=$this->db->get_where('users',[])->result() as $k => $v): ?>
								<tr>
									<td><?=$k+1?></td>
									<td>
										<span class="text-dark"><?=@$v->fullname?></span></td>
									<td class="text-center"><?=@$v->telp?></td>
									<td class="text-end"><?=@$v->email?></td>
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
									<span class="text-dark"><?=@date_format(date_create($tgl_berangkat),'d-m-Y')?></span>
								</div>
								<div class="sub-price">
									s/d
								</div>
								<div class="sub-price">
									<small>PULANG</small>
									<span class="text-dark"><?=@date('d-m-Y', strtotime($tgl_berangkat . ' + ' . $jumlah_hari . ' day'))?></span>
								</div>
							</div>
						</div>
						<div class="invoice-price-right">
							<small>TOTAL</small> <span class="fw-bold"><?=@count($ta)?> Tenaga Ahli</span>
						</div>
					</div>
					<!-- END invoice-price -->
				</div>
				<!-- END invoice-content -->
				<!-- BEGIN invoice-note -->
				<div class="invoice-note">
					* Maksimal kunjungan <?=$maksimal_kunjungan?> kali dalam setahun<br />
					* Maksimal <?=@$maksimal_hari?> hari dalam sekali kunjungan<br />
				</div>
				<!-- END invoice-note -->
				<!-- BEGIN invoice-footer -->
				<div class="invoice-footer">
					<p class="text-center mb-5px fw-bold">
						VERIFIKATOR
						<span class="me-10px"><i class="fa fa-fw fa-lg fa-user"></i> mr.xxx</span>
						<span class="me-10px"><i class="fa fa-fw fa-lg fa-phone-volume"></i> T:016-18192302</span>
						<span class="me-10px"><i class="fa fa-fw fa-lg fa-envelope"></i> rtiemps@gmail.com</span>
					</p>
					
					<p class="text-center">
					<a href="javascript:;" onclick="window.print()" class="btn btn-sm btn-success mb-10px"><i class="fa fa-check-circle t-plus-1 fa-fw fa-lg"></i> Verifikasi</a>
					<a href="javascript:;" onclick="window.print()" class="btn btn-sm btn-danger mb-10px"><i class="fa fa-times-circle t-plus-1 fa-fw fa-lg"></i> Tolak</a>
					</p>
					
				</div>
				<!-- END invoice-footer -->
			</div>