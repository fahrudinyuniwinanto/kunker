<ol class="breadcrumb float-xl-end">
    <li class="breadcrumb-item"><a href="javascript:;"><?php if ($this->uri->segment('1')) {
                                                            echo $this->uri->segment('1');
                                                        } ?></a></li>
    <li class="breadcrumb-item active"><?php if ($this->uri->segment('2')) {
                                            echo $this->uri->segment('2');
                                        } ?></li>
</ol>


<h1 class="page-header">Jenis Kunjungan <small></small></h1>
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
                <h2 class="panel-title"><b>List Jenis Kunjungan</b></h2>
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
                        <?php echo anchor(site_url('jenis_kunjungan/create'), 'Tambah Jenis Kunjungan', 'class="btn btn-flat btn-success"'); ?>
                    </div>


                    <div class="col-md-1 text-right">
                    </div>
                    <div class="col-md-3 text-right">
                        <form action="<?php echo site_url('jenis_kunjungan/index'); ?>" class="form-inline" method="get">
                            <div class="input-group">
                                <input type="text" class="form-control" name="q" value="<?php echo $q; ?>">
                                <?php
                                if ($q <> '') {
                                    ?>
                                    <a href="<?php echo site_url('jenis_kunjungan'); ?>" class="btn btn-flat btn-default">Reset</a>
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
                                <th class="text-center">Nama Jenis Kunjungan</th>
                                <th class="text-center">Maksimal Kunjungan</th>
                                <th class="text-center">Jumlah Hari</th>
                                <th class="text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody><?php
                                foreach ($jenis_kunjungan_data as $jenis_kunjungan) {
                                    ?>
                                <tr>
                                    <td width="50px"><?php echo ++$start ?></td>
                                    <td><strong><?php echo $jenis_kunjungan->nama_kunker ?></strong></td>
                                    <td width="200px"><?php echo $jenis_kunjungan->maksimal_kunjungan ?> kali pertahun</td>
                                    <td width="200px"><?php echo $jenis_kunjungan->jumlah_hari ?> hari perkunjungan</td>
                                    <td style="text-align:center" width="150px">
                                        <?php
                                            echo anchor(site_url('jenis_kunjungan/read/' . $jenis_kunjungan->id_jenis_kunjungan), '<i class="fa fa-eye"></i>', 'class="btn btn-xs btn-success"');
                                            echo ' | ';
                                            echo anchor(site_url('jenis_kunjungan/update/' . $jenis_kunjungan->id_jenis_kunjungan), '<i class="fa fa-edit"></i>', 'class="btn btn-xs btn-warning"');
                                            echo ' | ';
                                            echo anchor(site_url('jenis_kunjungan/delete/' . $jenis_kunjungan->id_jenis_kunjungan), '<i class="fa fa-trash"></i>', 'class="btn btn-xs btn-danger" onclick="javascript: return confirm(\'Yakin hapus data?\')"');
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
                        <?php echo anchor(site_url('jenis_kunjungan/excel'), 'Excel', 'class="btn btn-flat btn-success"'); ?>
                    </div>
                    <div class="col-md-6 text-right">
                        <?php echo $pagination ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>