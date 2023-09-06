<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<meta http-equiv="X-UA-Compatible" content="ie=edge" />
	<link rel="stylesheet" href="<?= base_url() ?>assets/vendor/paper/paper.min.css" />
	<style>
		.paper>*,
		td {
			font-family: Arial, Helvetica, sans-serif;
			font-size: 14px;
		}

		table,
		th,
		td {
			border: 1px solid black;
			border-collapse: collapse;
		}
	</style>
	<title>Document</title>
</head>

<body>
	<div class="paper container">
		<h5 class="text-center">SEKRETARIAT JENDERAL<br>
			DEWAN REPUBLIK INDONESIA<br><br>
			DEPUTI BIDANG ADMINISTRASI<br><br>
			DISPOSISI <?=$this->db->get_where('jenis_kunjungan',['id_jenis_kunjungan'=>$v->id_jenis_kunjungan])->row()->nama_kunker?></h5>
		<table width="100%" border="1">
			<tr>
				<td>Nomor Registrasi</td>
				<td>:</td>
				<td><?= $v->nomor_surat.'/'.$v->nama_alias.'/KU.04/'.date_format(date_create($v->tanggal_surat),'m').'/'.date_format(date_create($v->tanggal_surat),'Y') ?></td>
				<td>Tingkat Keamanan</td>
				<td>:</td>
				<td><?= $v->tingkat_keamanan ?></td>
			</tr>
			<tr>
				<td>Tanggal Surat</td>
				<td>:</td>
				<td><?= date_format(date_create($v->tanggal_surat), "d-m-Y") ?></td>
				<td>Tanggal Terima</td>
				<td>:</td>
				<td><?= date_format(date_create($v->created_at), "d-m-Y H:i") ?></td>
			</tr>
			<tr>
				<td>Nomor Surat</td>
				<td>:</td>
				<td><?= $v->nomor_surat ?></td>
				<td>Asal Surat</td>
				<td>:</td>
				<td><?= $v->pemberi_disposisi ?> (<?=$v->no_anggota?>)</td>
			</tr>
			<tr>
				<td>Lampiran</td>
				<td>:</td>
				<td><?= $v->lampiran_surat ?> lembar</td>
				<td>Unit Kerja Pemberi Disposisi</td>
				<td>:</td>
				<td>Deputi Bidang Administrasi</td>
			</tr>
			<tr>
				<td>Perihal</td>
				<td>:</td>
				<td><?= $v->perihal_surat ?></td>
				<td colspan="3"></td>
			</tr>
			<tr>
				<td colspan="6">Diteruskan kepada</td>
			</tr>
			<?php foreach($this->db->get_where('karo',[])->result() as $v2): ?>
			<tr>
				<td colspan="3"><?=$v->tujuan_disposisi==$v2->id_karo?'&#9745;':'&#9634;'?> <label><?=$v2->karo?></label></td>
				<td colspan="3"></td>
			</tr>
			<?php endforeach; ?>
			<tr>
				<td colspan="4">Disposisi / Catatan : <br>
					<?=$v->diposisi_note==""?" Mohon untuk ditindaklanjuti sesuai dengan ketentuan yang berlaku'":$v->diposisi_note?><br>
					<br>
					<br>
					<br>
					<br>
					<br><br>
					AM: <?=date_format(date_create($v->tanggal_surat),'d-m-Y')?>
				</td>
				<td colspan="2">Paraf,<br>
				<?=date_format(date_create($v->tanggal_surat),'d-m-Y')?>
					<br>
					<img src="<?=base_url()?>/assets/img/qrcode.jpg" style="width:80px; height:80px; border:1px;">
				</td>
			</tr>
		</table>
	</div>
</body>
<script>
		window.print();
</script>
</html>