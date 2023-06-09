<ol class="breadcrumb float-xl-end">
    <li class="breadcrumb-item"><a href="javascript:;"><?php if ($this->uri->segment('1')) {
                                                            echo $this->uri->segment('1');
                                                        } ?></a></li>
    <li class="breadcrumb-item active"><?php if ($this->uri->segment('2')) {
                                            echo $this->uri->segment('2');
                                        } ?></li>
</ol>


<h1 class="page-header">Users <small></small></h1>
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
                <h2 class="panel-title"><b>List Users</b></h2>

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
                        if (allow([1])) {
                            echo anchor(site_url('users/create'), 'Create', 'class="btn btn-flat btn-success"');
                        } ?>

                    </div>

                    <div class="col-md-1 text-right">
                    </div>
                    <div class="col-md-3 text-right">
                        <?php
                        if (allow([1])) { ?>
                            <form action="<?php echo site_url('users/index'); ?>" class="form-inline" method="get">
                                <div class="input-group">
                                    <input type="text" class="form-control" name="q" value="<?php echo $q; ?>">

                                    <?php
                                        if ($q <> '') {
                                            ?>
                                        <a href="<?php echo site_url('users'); ?>" class="btn btn-default">Reset</a>
                                    <?php
                                        }
                                        ?>
                                    <button class="btn btn-success" type="submit">Search</button>

                                </div>
                            </form>
                        <?php } ?>
                    </div>
                </div>
                <table class="table table-bordered" style="margin-bottom: 10px">
                    <thead class="thead-light">
                        <tr>
                            <th class="text-center">No</th>
                            <th class="text-center">Nama</th>
                            <th class="text-center">Username</th>
                            <th class="text-center">Email</th>
                            <th class="text-center">Level Akses</th>
                            <th class="text-center">Action</th>
                        </tr>
                    </thead>
                    <tbody><?php
                            foreach ($users_data as $users) {
                                if ($this->session->userdata('level') <= $users->id_group) {
                                    ?>
                                <tr>
                                    <td width="80px"><?php echo ++$start ?></td>
                                    <td><?php echo $users->fullname ?></td>
                                    <td><?php echo $users->username ?></td>
                                    <td><?php echo $users->email ?></td>
                                    <td><?php echo $users->group_name ?></td>
                                    <td style="text-align:center" width="200px">
                                        <?php
                                                echo anchor(site_url('users/read/' . $users->id_user), '<i class="fa fa-eye"></i>', 'class="btn btn-xs btn-success" data-toggle="tooltip" data-placement="top" title="Lihat"');
                                                if ($this->session->userdata('level') == $users->id_group) {
                                                    echo ' | ';
                                                    echo anchor(site_url('users/update/' . $users->id_user), '<i class="fa fa-edit"></i>', 'class="btn btn-xs btn-warning" data-toggle="tooltip" data-placement="top" title="Edit"');
                                                    echo ' | ';
                                                    echo anchor(site_url('users/ubah_password/' . $users->id_user), '<i class="fa fa-edit"></i>', 'class="btn btn-xs btn-info" data-toggle="tooltip" data-placement="top" title="Ubah Password"');
                                                }
                                                if (allow([1])) {
                                                    echo ' | ';
                                                    echo anchor(site_url('users/reset_password/' . $users->id_user), '<i class="fa fa-sync"></i>', 'class="btn btn-xs btn-danger" data-toggle="tooltip" data-placement="top" title="Reset Password" title="Hapus" onclick="javascript: return confirm(\'Yakin mereset password user ini?\')"');
                                                    echo ' | ';
                                                    echo anchor(site_url('users/delete/' . $users->id_user), '<i class="fa fa-trash"></i>', 'class="btn btn-xs btn-danger" data-toggle="tooltip" data-placement="top" title="Hapus" onclick="javascript: return confirm(\'Yakin hapus data?\')"');
                                                }
                                                ?>
                                    </td>
                                </tr>

                        <?php
                            }
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