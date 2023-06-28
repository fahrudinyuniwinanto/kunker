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
			font-size: 16px;
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
			DEWAN REPUBLIK INDONESIA<br>
			DEPUTI BIDANG ADMINISTRASI<br><br>
			LAPORAN <?=$this->db->get_where('jenis_kunjungan', ['id_jenis_kunjungan' => $jenis_kunjungan])->row('nama_kunker')?><br><br>
        TAHUN <?=$tahun?></h5>
		<table width="100%" border="1">
            <tr>
                <td>No</td>
                <td>Anggota</td>
                <td>Fraksi</td>
                <td>Jumlah Kunjungan</td>
            </tr>
            <?php foreach ($kunker_data as $k => $v) : ?>
			<tr>
				<td><?=$k+1?></td>
				<td><?=$this->db->get_where('users', ['id_user' => $v->id_user])->row('fullname')?></td>
				<td><?=$this->db->get_where('fraksi', ['id_fraksi' => $v->id_fraksi])->row('nama_fraksi')?></td>
				<td><?= $v->jml_kunjungan ?></td>
			</tr>
            <?php endforeach ?>
		</table>
	</div>
</body>
<script>
		window.print();
</script>
</html>