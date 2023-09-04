<ol class="breadcrumb float-xl-end">
    <li class="breadcrumb-item"><a href="javascript:;">Home</a></li>
    <li class="breadcrumb-item active">Dashboard</li>
</ol>


<h1 class="page-header">Dashboard <small></small></h1>

<div class="row">

    <div class="col-xl-3 col-md-6">
        <div class="widget widget-stats bg-blue">
            <div class="stats-icon"><i class="fa fa-envelope"></i></div>
            <div class="stats-info">
                <h4>Total Permohonan</h4>
                <p><?= $permohonan_masuk ?></p>
            </div>
            <div class="stats-link">
                <a href="<?= site_url('kunker') ?>">View Detail <i class="fa fa-arrow-alt-circle-right"></i></a>
            </div>
        </div>
    </div>




    <div class="col-xl-3 col-md-6">
        <div class="widget widget-stats bg-orange">
            <div class="stats-icon"><i class="fa fa-clock"></i></div>
            <div class="stats-info">
                <h4>Permohonan Pending</h4>
                <p><?= $permohonan_pending ?></p>
            </div>
            <div class="stats-link">
                <a href="<?= site_url('kunker') . '?s=0' ?>">View Detail <i class="fa fa-arrow-alt-circle-right"></i></a>
            </div>
        </div>
    </div>

    <div class="col-xl-3 col-md-6">
        <div class="widget widget-stats bg-info">
            <div class="stats-icon"><i class="fa fa-check-circle"></i></div>
            <div class="stats-info">
                <h4>Permohonan Disetujui</h4>
                <p><?= $permohonan_disetujui ?></p>
            </div>
            <div class="stats-link">
                <a href="<?= site_url('kunker') . '?s=1' ?>">View Detail <i class="fa fa-arrow-alt-circle-right"></i></a>
            </div>
        </div>
    </div>


    <div class="col-xl-3 col-md-6">
        <div class="widget widget-stats bg-red">
            <div class="stats-icon"><i class="fa fa-times-circle"></i></div>
            <div class="stats-info">
                <h4>Permohonan Ditolak</h4>
                <p><?= $permohonan_ditolak ?></p>
            </div>
            <div class="stats-link">
                <a href="<?= site_url('kunker') . '?s=2' ?>">View Detail <i class="fa fa-arrow-alt-circle-right"></i></a>
            </div>
        </div>
    </div>

</div>
<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h2 class="panel-title"><b>Data Permohonan Kunjungan Kerja Terbaru</b></h2>
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
                    </div>

                    <div class="col-md-4 text-right">
                        <form action="<?php echo site_url('backend/index'); ?>" class="form-inline" method="get">


                            <div class="input-group">
                                <select type="text" class="form-control col-md-1" name="s" value="<?php echo $s; ?>">
                                    <option value="">--Pilih Status--</option>
                                    <option value="0">PENDING</option>
                                    <option value="1">DISETUJUI</option>
                                    <option value="2">DITOLAK</option>
                                </select>
                                <input type="text" class="form-control" name="q" value="<?php echo $q; ?>">

                                <?php
                                if ($q <> '' | $s <> '') {
                                    ?>
                                    <a href="<?php echo site_url('backend'); ?>" class="btn btn-flat btn-default">Reset</a>
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
                                <th class="text-center">No. Anggota</th>
                                <th class="text-center">Nama Anggota</th>
                                <th class="text-center">Tingkat Keamanan</th>
                                <th class="text-center">Tgl. Dibuat</th>
                                <th class="text-center">Status</th>
                                <!-- <th class="text-center">Keterangan Disposisi</th> -->
                            </tr>
                        </thead>
                        <tbody><?php
                                foreach ($kunker_data as $kunker) {
                                    ?>
                                <tr class="<?= $kunker->status_disposisi == '1' ? 'bg-success' : ($kunker->status_disposisi == '2' ? 'bg-danger' : '') ?>">
                                    <td width="50px"><?php echo ++$start ?></td>
                                    <td width="300px"><?php echo $kunker->nama_kunker ?></td>
                                    <td width="250px"><strong><?php echo $kunker->nama_fraksi ?></strong></td>
                                    <td><strong><?php echo $kunker->no_anggota ?></strong></td>
                                    <td><strong><?php echo $kunker->fullname ?></strong></td>
                                    <td width="150px"><?php echo $kunker->tingkat_keamanan ?></td>
                                    <td><?php echo @$kunker->tgl_dibuat ?></td>
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
                                    <!-- <td><?= @$diposisi_note ?></td> -->

                                </tr>

                            <?php
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
                <div class="row hide">
                    <div class="col-md-6">
                        <a href="#" class="btn btn-flat btn-success">Total Record : <?php echo @$total_rows ?></a>
                        <?php echo anchor(site_url('kunker/excel'), 'Excel', 'class="btn btn-flat btn-success"'); ?>
                    </div>
                    <div class="col-md-6 text-right">

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>