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
                <h2 class="panel-title"><b>Data Permohonan Kunjungan Kerja</b></h2>
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
                        <?php
                        if (is_allow('TAMBAH_KUNKER')) {
                            echo anchor(site_url('kunker/create'), 'Tambah Permohonan', 'class="btn btn-flat btn-success"');
                        } ?>
                    </div>


                    <div class="col-md-1 text-right">
                    </div>
                    <div class="col-md-3 text-right">
                        <form action="<?php echo site_url('kunker/index'); ?>" class="form-inline" method="get">
                            <div class="input-group">
                                <input type="text" class="form-control" name="q" value="<?php echo $q; ?>">
                                <?php
                                if ($q <> '') {
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
                                <th class="text-center">Jenis Kunjungan</th>
                                <th class="text-center">Fraksi</th>
                                <th class="text-center">Nama Anggota</th>
                                <th class="text-center">Tingkat Keamanan</th>
                                <th class="text-center">Tgl. Dibuat</th>
                                <th class="text-center">Status</th>
                                <th class="text-center">Keterangan Disposisi</th>
                                <th class="text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody><?php
                                foreach ($kunker_data as $kunker) {
                                    ?>
                                <tr class="<?= $kunker->status_disposisi == '1' ? 'bg-success' : ($kunker->status_disposisi == '2' ? 'bg-danger' : '') ?>">
                                    <td width="50px"><?php echo ++$start ?></td>
                                    <td><strong>
                                            <?php echo $kunker->nama_kunker ?></strong><br>
                                        <?= '<label class="badge bg-green">Kunjungan Ke-' . $kunker->kunjungan_ke . '</label>' ?>
                                    </td>
                                    <td><strong><?php echo $kunker->nama_fraksi ?></strong></td>
                                    <td><strong><?php echo $kunker->fullname ?></strong></td>
                                    <td><?php echo $kunker->tingkat_keamanan ?></td>
                                    <td><?php echo $kunker->tgl_dibuat ?></td>
                                    <td class="text-center"><?php
                                                                if ($kunker->status_disposisi == 0) {
                                                                    echo '<label class="badge bg-warning">PENDING</label>';
                                                                }
                                                                if ($kunker->status_disposisi == 1) {
                                                                    echo '<label class="badge bg-success">DISETUJUI</label>';
                                                                }
                                                                if ($kunker->status_disposisi == 2) {
                                                                    echo '<label class="badge bg-danger">DITOLAK</label>';
                                                                }
                                                                ?></td>
                                    <td><?= @$diposisi_note ?></td>
                                    <td style="text-align:center" width="150px">
                                        <?php
                                            if (is_allow('DETAIL_KUNKER')) {
                                                echo anchor(site_url('kunker/read/' . $kunker->id_kunker), '<i class="fa fa-eye"></i>', 'class="btn btn-xs btn-success" title="Detail Data"');
                                            }
                                            if (is_allow('VERIFIKASI_KUNKER')) {
                                                echo ' &nbsp ';
                                                echo anchor(site_url('kunker/verify/' . $kunker->id_kunker), '<i class="fa fa-check-circle"></i>', 'class="btn btn-xs btn-info" title="Verifikasi Data"');
                                            }
                                            // echo anchor(site_url('kunker/update/' . $kunker->id_kunker), '<i class="fa fa-edit"></i>', 'class="btn btn-xs btn-warning"');
                                            // echo ' | ';
                                            if (is_allow('HAPUS_KUNKER')) {
                                                //bisa dihapus selama status masih pending
                                                if ($kunker->status_disposisi == 0) {
                                                    echo ' &nbsp ';
                                                    echo anchor(site_url('kunker/delete/' . $kunker->id_kunker), '<i class="fa fa-trash"></i>', 'class="btn btn-xs btn-danger" onclick="javascript: return confirm(\'Yakin hapus data?\')"');
                                                }
                                            }
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