<ol class="breadcrumb float-xl-end">
    <li class="breadcrumb-item"><a href="javascript:;"><?php if ($this->uri->segment('1')) {
                                                            echo $this->uri->segment('1');
                                                        } ?></a></li>
    <li class="breadcrumb-item active"><?php if ($this->uri->segment('2')) {
                                            echo $this->uri->segment('2');
                                        } ?></li>
</ol>


<h1 class="page-header">List Users Access<small></small></h1>
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
                <h2 class="panel-title"><b>List Users Access</b></h2>

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


                    <div class="col-md-1 text-right">
                    </div>
                    <div class="col-md-3 text-right">
                        <form action="<?php echo site_url('user_access/index'); ?>" class="form-inline" method="get">
                            <div class="input-group">
                                <input type="text" class="form-control" name="q" value="<?php echo $q; ?>">
                                <?php
                                if ($q <> '') {
                                    ?>
                                    <a href="<?php echo site_url('user_access'); ?>" class="btn btn-default">Reset</a>
                                <?php
                                }
                                ?>
                                <button class="btn btn-success" type="submit">Search</button>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="table-responsive">
                    <table class="table table-bordered table-hover table-condensed" style="margin-bottom: 10px">
                        <thead class="thead-light">
                            <tr>
                                <th class="text-center">No</th>
                                <th class="text-center">User Group</th>
                                <th class="text-center">Nama Akses</th>
                                <th class="text-center">Nama Menu</th>
                                <th class="text-center">Note</th>
                                <th class="text-center">Status Aktif</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            foreach ($user_access_data as $user_access) {
                                ?>
                                <tr>
                                    <td width="80px"><?php echo ++$start ?></td>
                                    <td><?php echo $user_access->group_name ?></td>
                                    <td><?php echo $user_access->nm_access ?></td>
                                    <td><?php echo $user_access->id_menu ?></td>
                                    <td><?php echo $user_access->note ?></td>
                                    <td align="center">
                                        <!-- Rounded switch -->
                                        <label class="switch">
                                            <!-- parameter function js aktifkan(id_master_akses,id_group,id_master) -->
                                            <input type="checkbox" id="cek-<?= $user_access->id ?>" onclick="aktifkan(<?= $user_access->id ?>,<?= $user_access->id_user_group ?>,<?= $user_access->id_master_access ?>,<?= $user_access->id_menu ?>)" <?= $this->User_access_model->get_isallow($user_access->id_user_group, $user_access->id_master_access) ? "checked" : ""; ?> />
                                            <span class="slider round"></span>
                                        </label>

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
                        <a href="#" class="btn btn-success">Total Record : <?php echo $total_rows ?></a>
                        <?php echo anchor(site_url('user_access/excel'), 'Excel', 'class="btn btn-success"'); ?>
                    </div>
                    <div class="col-md-6 text-right">
                        <?php echo $pagination ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</body>

<!--Fungsi Java Script untuk tombol radio aktif menuju ke controler user access dan model user acces-->
<script type="text/javascript">
    function aktifkan(iduseraccess, idgroup, kdmasteraccess, idmenu) {
        if ($('#cek-' + iduseraccess).is(':checked')) {
            ischeck = 1;
        } else {
            ischeck = 0;
        }
        //alert(ischeck);<!--menuju ke controller user_acces fungsi aktifkan-->
        $.post("<?= base_url() . 'user_access/aktifkan' ?>", {
            iduseraccess: iduseraccess,
            idgroup: idgroup,
            kdmasteraccess: kdmasteraccess,
            idmenu: idmenu,
            ischeck: ischeck
        }, function(data, textStatus, xhr) {
            toastr.success("Telah diaktifkan", iduseraccess);
        });
    }
</script>

</html>