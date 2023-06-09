<ol class="breadcrumb float-xl-end">
    <li class="breadcrumb-item"><a href="javascript:;"><?php if ($this->uri->segment('1')) {
                                                            echo $this->uri->segment('1');
                                                        } ?></a></li>
    <li class="breadcrumb-item active"><?php if ($this->uri->segment('2')) {
                                            echo $this->uri->segment('2');
                                        } ?></li>
</ol>

<h1 class="page-header">Detail Config <small></small></h1>
<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h2 style="margin-top:0px" class="panel-title">Detail Config</h2>
                <div class="panel-heading-btn">
                    <a href="javascript:;" class="btn btn-xs btn-icon btn-default" data-toggle="panel-expand"><i class="fa fa-expand"></i></a>
                    <a href="javascript:;" class="btn btn-xs btn-icon btn-success" data-toggle="panel-reload"><i class="fa fa-redo"></i></a>
                    <a href="javascript:;" class="btn btn-xs btn-icon btn-warning" data-toggle="panel-collapse"><i class="fa fa-minus"></i></a>
                    <!-- <a href="javascript:;" class="btn btn-xs btn-icon btn-danger" data-toggle="panel-remove"><i class="fa fa-times"></i></a> -->
                </div>
                <div class="ibox-tools">
                </div>
            </div>
            <div class="panel-body">
                <div class="table-responsive">

                    <table class="table">
                        <tr>
                            <td>Conf Name</td>
                            <td><?php echo $conf_name; ?></td>
                        </tr>
                        <tr>
                            <td>Conf Val</td>
                            <td><?php echo $conf_val; ?></td>
                        </tr>
                        <tr>
                            <td>Note</td>
                            <td><?php echo $note; ?></td>
                        </tr>
                        <tr>
                            <td></td>
                            <td><a href="<?php echo site_url('sy_config') ?>" class="btn btn-default">Cancel</a></td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>