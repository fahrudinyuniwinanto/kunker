<ol class="breadcrumb float-xl-end">
<li class="breadcrumb-item"><a href="javascript:;"><?php if ($this->uri->segment('1')) {
                                                        echo $this->uri->segment('1');
                                                    } ?></a></li>
<li class="breadcrumb-item active"><?php if ($this->uri->segment('2')) {
                                        echo $this->uri->segment('2');
                                    } ?></li>
</ol>


<h1 class="page-header">Kunker <small></small></h1>
<?php if ($this->session->userdata('message') != '') { ?>
<div class="alert alert-success alert-dismissible fade show">
    <strong><?= $this->session->userdata('message') ?> </strong>
    <a class="alert-link" href="#"></a>
    <button type="button" class="btn-close" data-bs-dismiss="alert"></span>
</div>
<?php } ?>
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h2 class="panel-title"><b>List Kunker</b></h2>
                    <div class="panel-heading-btn">
                    <a href="javascript:;" class="btn btn-xs btn-icon btn-default" data-toggle="panel-expand"><i class="fa fa-expand"></i></a>
                    <a href="javascript:;" class="btn btn-xs btn-icon btn-success" data-toggle="panel-reload"><i class="fa fa-redo"></i></a>
                    <a href="javascript:;" class="btn btn-xs btn-icon btn-warning" data-toggle="panel-collapse"><i class="fa fa-minus"></i></a>
                    <!-- <a href="javascript:;" class="btn btn-xs btn-icon btn-danger" data-toggle="panel-remove"><i class="fa fa-times"></i></a> -->
                </div>
                </div>
                <div class="panel-body">
        <div class="row" style="margin-bottom: 10px">
            <div class="col-md-8">
                <?php echo anchor(site_url('kunker/create'),'Tambah Data', 'class="btn btn-flat btn-success"'); ?>
            </div>
            
            
            <div class="col-md-1 text-right">
            </div>
            <div class="col-md-3 text-right">
                <form action="<?php echo site_url('kunker/index'); ?>" class="form-inline" method="get">
                    <div class="input-group">
                        <input type="text" class="form-control" name="q" value="<?php echo $q; ?>">
                            <?php 
                                if ($q <> '')
                                {
                                    ?>
                                    <a href="<?php echo site_url('kunker'); ?>" class="btn btn-flat btn-default">Reset</a>
                                    <?php
                                }
                            ?>
                          <button class="btn btn-flat btn-success" type="submit">Cari</button>
                    </div>
                </form>
            </div>
        </div>
        <div class="table-responsive">
        <table class="table table-bordered table-hover table-condensed" style="margin-bottom: 10px">
            <thead class="thead-light">
            <tr>
                <th class="text-center">No</th>
		<th class="text-center">Id Jenis Kunjungan</th>
		<th class="text-center">Nomor Surat</th>
		<th class="text-center">Tanggal Surat</th>
		<th class="text-center">Perihal Surat</th>
		<th class="text-center">Lampiran Surat</th>
		<th class="text-center">Tingkat Keamanan</th>
		<th class="text-center">Id Fraksi</th>
		<th class="text-center">Id Anggota Fraksi</th>
		<th class="text-center">Id Kunker Ta</th>
		<th class="text-center">Nama Daerah Tujuan</th>
		<th class="text-center">File Surat</th>
		<th class="text-center">File Nodin</th>
		<th class="text-center">Pemberi Disposisi</th>
		<th class="text-center">Isi Disposisi</th>
		<th class="text-center">Tujuan Disposisi</th>
		<th class="text-center">Status Disposisi</th>
		<th class="text-center">Created At</th>
		<th class="text-center">Disposisi At</th>
		<th class="text-center">Created By</th>
		<th class="text-center">Disposisi By</th>
		<th class="text-center">Diposisi Note</th>
		<th class="text-center">Action</th>
            </tr>
            </thead>
			<tbody><?php
            foreach ($kunker_data as $kunker)
            {
                ?>
                <tr>
			<td width="80px"><?php echo ++$start ?></td>
			<td><?php echo $kunker->id_jenis_kunjungan ?></td>
			<td><?php echo $kunker->nomor_surat ?></td>
			<td><?php echo $kunker->tanggal_surat ?></td>
			<td><?php echo $kunker->perihal_surat ?></td>
			<td><?php echo $kunker->lampiran_surat ?></td>
			<td><?php echo $kunker->tingkat_keamanan ?></td>
			<td><?php echo $kunker->id_fraksi ?></td>
			<td><?php echo $kunker->id_anggota_fraksi ?></td>
			<td><?php echo $kunker->id_kunker_ta ?></td>
			<td><?php echo $kunker->nama_daerah_tujuan ?></td>
			<td><?php echo $kunker->file_surat ?></td>
			<td><?php echo $kunker->file_nodin ?></td>
			<td><?php echo $kunker->pemberi_disposisi ?></td>
			<td><?php echo $kunker->isi_disposisi ?></td>
			<td><?php echo $kunker->tujuan_disposisi ?></td>
			<td><?php echo $kunker->status_disposisi ?></td>
			<td><?php echo $kunker->created_at ?></td>
			<td><?php echo $kunker->disposisi_at ?></td>
			<td><?php echo $kunker->created_by ?></td>
			<td><?php echo $kunker->disposisi_by ?></td>
			<td><?php echo $kunker->diposisi_note ?></td>
			<td style="text-align:center" width="200px">
				<?php 
				echo anchor(site_url('kunker/read/'.$kunker->id_kunker),'<i class="fa fa-eye"></i>','class="btn btn-xs btn-success"'); 
				echo ' | '; 
				echo anchor(site_url('kunker/update/'.$kunker->id_kunker),'<i class="fa fa-edit"></i>','class="btn btn-xs btn-warning"'); 
				echo ' | '; 
				echo anchor(site_url('kunker/delete/'.$kunker->id_kunker),'<i class="fa fa-trash"></i>','class="btn btn-xs btn-danger" onclick="javascript: return confirm(\'Yakin hapus data?\')"'); 
				?>
			</td>
		</tr>
                
                <?php
            }
            ?>
            </tbody>
        </table>
        </div>
        <div class="row">
            <div class="col-md-6">
                <a href="#" class="btn btn-flat btn-success">Total Record : <?php echo $total_rows ?></a>
		<?php echo anchor(site_url('kunker/excel'), 'Excel', 'class="btn btn-flat btn-success"'); ?>
	    </div>
            <div class="col-md-6 text-right">
                <?php echo $pagination ?>
            </div>
        </div>
        </div>
    </div>
    </div>
    </div>