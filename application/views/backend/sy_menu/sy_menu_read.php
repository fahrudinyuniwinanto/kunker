<ol class="breadcrumb float-xl-end">
    <li class="breadcrumb-item"><a href="javascript:;"><?php if ($this->uri->segment('1')) {
                                                            echo $this->uri->segment('1');
                                                        } ?></a></li>
    <li class="breadcrumb-item active"><?php if ($this->uri->segment('2')) {
                                            echo $this->uri->segment('2');
                                        } ?></li>
</ol>

<h1 class="page-header">Detail Sy Menu <small></small></h1>
<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h2 style="margin-top:0px" class="panel-title">Detail Sy Menu</h2>
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
                            <td>Label</td>
                            <td><?php echo $label; ?></td>
                        </tr>
                        <tr>
                            <td>Redirect</td>
                            <td><?php echo $redirect; ?></td>
                        </tr>
                        <tr>
                            <td>Url</td>
                            <td><?php echo $url; ?></td>
                        </tr>
                        <tr>
                            <td>Parent</td>
                            <td><?php echo $parent; ?></td>
                        </tr>
                        <tr>
                            <td>Icon</td>
                            <td><?php echo $icon; ?></td>
                        </tr>
                        <tr>
                            <td>Note</td>
                            <td><?php echo $note; ?></td>
                        </tr>
                        <tr>
                            <td>Order No</td>
                            <td><?php echo $order_no; ?></td>
                        </tr>
                        <tr>
                            <td>Created By</td>
                            <td><?php echo $created_by; ?></td>
                        </tr>
                        <tr>
                            <td>Created At</td>
                            <td><?php echo $created_at; ?></td>
                        </tr>
                        <tr>
                            <td>Updated By</td>
                            <td><?php echo $updated_by; ?></td>
                        </tr>
                        <tr>
                            <td>Updated At</td>
                            <td><?php echo $updated_at; ?></td>
                        </tr>
                        <tr>
                            <td></td>
                            <td><a href="<?php echo site_url('sy_menu') ?>" class="btn btn-default">Cancel</a></td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>