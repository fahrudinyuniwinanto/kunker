<ol class="breadcrumb float-xl-end">
    <li class="breadcrumb-item"><a href="javascript:;"><?php if ($this->uri->segment('1')) {
                                                            echo $this->uri->segment('1');
                                                        } ?></a></li>
    <li class="breadcrumb-item active"><?php if ($this->uri->segment('2')) {
                                            echo $this->uri->segment('2');
                                        } ?></li>
</ol>


<h1 class="page-header">Data Tenaga Ahli <small></small></h1>
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
                <h2 class="panel-title"><b>List Tenaga Ahli</b></h2>

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
                        echo anchor(site_url('ta/create'), 'Tambah Tenaga Ahli', 'class="btn btn-flat btn-success"');
                        ?>
                    </div>

                    <div class="col-md-1 text-right">
                    </div>
                    <div class="col-md-3 text-right">
                        <?php
                        if (allow([1, 2])) { ?>
                            <form action="<?php echo site_url('ta/index'); ?>" class="form-inline" method="get">
                                <div class="input-group">
                                    <input type="text" class="form-control" name="q" value="<?php echo $q; ?>">

                                    <?php
                                        if ($q <> '') {
                                            ?>
                                        <a href="<?php echo site_url('ta'); ?>" class="btn btn-default">Reset</a>
                                    <?php
                                        }
                                        ?>
                                    <button class="btn btn-success" type="submit">Cari</button>

                                </div>
                            </form>
                        <?php } ?>
                    </div>
                </div>
                <table class="table table-bordered" style="margin-bottom: 10px">
                    <thead class="thead-light">
                        <tr>
                            <th class="text-center">No</th>
                            <th class="text-center">NIK</th>
                            <th class="text-center">Nama Tenaga Ahli Anggota (TAA)</th>
                            <th class="text-center">Nama Anggota</th>
                            <th class="text-center">Nama Fraksi</th>
                            <th class="text-center">Status</th>
                            <th class="text-center">Action</th>
                        </tr>
                    </thead>
                    <tbody><?php
                            foreach ($users_data as $users) {
                                ?>
                            <tr>
                                <td width="50px"><?php echo ++$start ?></td>
                                <td><strong><?php echo @$users->nik ?></strong></td>
                                <td><strong><?php echo @$users->fullname ?></strong></td>
                                <td><?php echo @$this->db->get_where('users', ['id_user' => $users->id_parent])->row()->fullname ?></td>
                                <td><?php echo @$this->db->get_where('fraksi', ['id_fraksi' => $users->id_fraksi])->row()->nama_fraksi ?></td>
                                <td style="text-align:center"><?php if ($users->status == 1) {
                                                                        echo "<label class='badge bg-green'>AKTIF</label>";
                                                                    } else {
                                                                        echo "<label class='badge bg-danger'>NON AKTIF</label>";
                                                                    } ?>
                                </td>
                                <td style="text-align:center" width="150px">
                                    <?php
                                        echo anchor(site_url('ta/read/' . $users->id_user), '<i class="fa fa-eye"></i>', 'class="btn btn-xs btn-success" data-toggle="tooltip" data-placement="top" title="Lihat"');
                                        echo ' | ';
                                        echo anchor(site_url('ta/update/' . $users->id_user), '<i class="fa fa-edit"></i>', 'class="btn btn-xs btn-warning" data-toggle="tooltip" data-placement="top" title="Edit"');
                                        echo ' | ';
                                        echo anchor(site_url('ta/delete/' . $users->id_user), '<i class="fa fa-trash"></i>', 'class="btn btn-xs btn-danger" data-toggle="tooltip" data-placement="top" title="Hapus" onclick="javascript: return confirm(\'Yakin hapus data?\')"');

                                        ?>
                                </td>
                            </tr>

                        <?php
                        }
                        ?>
                    </tbody>
                </table>
                <div class="row">
                    <div class="col-md-6">
                        <a href="#" class="btn btn-success">Total Record : <?php echo $total_rows ?></a>
                    </div>
                    <div class="col-md-6 text-right">
                        <?php echo $pagination ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>