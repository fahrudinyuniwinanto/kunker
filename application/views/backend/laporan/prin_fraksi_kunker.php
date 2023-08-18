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
	<title>Laporan Fraksi</title>
</head>

<body>
	<div class="paper container">
		<h5 class="text-center">SEKRETARIAT JENDERAL<br>
			DEWAN REPUBLIK INDONESIA<br>
			DEPUTI BIDANG ADMINISTRASI<br><br>
			<strong>LAPORAN <?=$data_jenis_kunjungan->nama_kunker?></strong><br><br>
        TAHUN <?=$tahun?></h5>
		<p><i>*Maksimal Jumlah Kunjungan: <?=$data_jenis_kunjungan->maksimal_kunjungan?> kali</i></p>
		<table width="100%" border="1">
            <tr>
                <td>No</td>
                <td>Fraksi</td>
                <td>Jumlah Kunjungan</td>
                <td>Sisa Kunjungan</td>
            </tr>
            <?php foreach ($kunker_data as $k => $v) :
				$sisa=$data_jenis_kunjungan->maksimal_kunjungan-$v->jml_kunjungan; ?>
			<tr>
				<td><?=$k+1?></td>
				<td><?=$this->db->get_where('fraksi', ['id_fraksi' => $v->id_fraksi])->row('nama_fraksi')?></td>
				<td><?= $v->jml_kunjungan ?></td>
				<td><?=$sisa==0?'Habis':$sisa?></td>
			</tr>
            <?php endforeach ?>
		</table>
		<br>
		<div width="100%">
			<canvas id="chart-fraksi" width="100%" ></canvas>
		</div>
	</div>
</body>
<script>
	window.print();
	const ctx = document.getElementById('chart-fraksi');

	new Chart(ctx, {
		type: 'bar',
		data: {
			labels: <?= json_encode($arrLabel) ?>,
			datasets: [{
				label: 'Fraksi vs Jumlah Kunjungan',
				data: <?= json_encode($arrData) ?>,
				borderWidth: 4
			}]
		},
		options: {
			scales: {
				y: {
					ticks: {
						precision: 0
					},
					beginAtZero: true
				}
			}
		}
	});
</script>

</html>