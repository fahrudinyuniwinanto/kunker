<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <link
      rel="stylesheet"
      href="<?=base_url()?>assets/vendor/paper/paper.min.css"
    />
	<style>
		.paper>*,td {
			font-family: Arial, Helvetica, sans-serif;
			font-size: 18px;
		}
	</style>
    <title>Document</title>
  </head>
  <body>
    <div class="paper container">
      <h5 class="text-center">SEKRETARIAT JENDERAL<br>
DEWAN REPUBLIK INDONESIA<br>
DEPUTI BIDANG ADMINISTRASI<br>
DISPOSISI KUNJUNGAN KERJA KUNDAPIL</h5>
      <table width="100%" border="1">
		<tr>
			<td>Nomor Registrasi</td>
			<td>:</td>
			<td><?=$v->nomor_surat?></td>
			<td>Tingkat Keamanan</td>
			<td>:</td>
			<td><?=$v->tingkat_keamanan?></td>
		</tr>
		<tr>
			<td>Tanggal Surat</td>
			<td>:</td>
			<td><?=date_format(date_create($v->tanggal_surat),"m-d-Y")?></td>
			<td>Tanggal Terima</td>
			<td>:</td>
			<td><?=date_format(date_create($v->created_at),"m-d-Y H:i")?></td>
		</tr>
		<tr>
			<td>Nomor Surat</td>
			<td>:</td>
			<td><?=$v->nomor_surat?></td>
			<td>Asal Surat</td>
			<td>:</td>
			<td><?=$v->nama_fraksi?></td>
		</tr>
		<tr>
			<td>Lampiran</td>
			<td>:</td>
			<td><?=$v->lampiran_surat?> lembar</td>
			<td>Unit Kerja Pemberi Disposisi</td>
			<td>:</td>
			<td></td>
		</tr>
		<tr><td colspan="6">Diteruskan kepada</td></tr>
		<tr><td colspan="3"><label><input type="checkbox"/> Karo Organisasi dan Perencanaan</label></td><td colspan="3"></td></tr>
		<tr><td colspan="3"><label><input type="checkbox"/> Karo Sumber Daya Manusia Aparatur</label></td><td colspan="3"></td></tr>
		<tr><td colspan="3"><label><input type="checkbox"/> Karo Keuangan</label></td><td colspan="3"></td></tr>
		<tr><td colspan="3"><label><input type="checkbox"/> Karo Pengelolaan Bangunan dan Wisma</label></td><td colspan="3"></td></tr>
		<tr><td colspan="3"><label><input type="checkbox"/> Karo Umum</label></td><td colspan="3"></td></tr>

	  </table>
    </div>
  </body>
</html>