<?php

$string = "<ol class=\"breadcrumb float-xl-end\">
<li class=\"breadcrumb-item\"><a href=\"javascript:;\"><?php if (\$this->uri->segment('1')) {
                                                        echo \$this->uri->segment('1');
                                                    } ?></a></li>
<li class=\"breadcrumb-item active\"><?php if (\$this->uri->segment('2')) {
                                        echo \$this->uri->segment('2');
                                    } ?></li>
</ol>


<h1 class=\"page-header\">" . ucfirst($table_name) . " <small></small></h1>
<?php if (\$this->session->userdata('message') != '') { ?>
<div class=\"alert alert-success alert-dismissible fade show\">
    <strong><?= \$this->session->userdata('message') ?> </strong>
    <a class=\"alert-link\" href=\"#\"></a>
    <button type=\"button\" class=\"btn-close\" data-bs-dismiss=\"alert\"></span>
</div>
<?php } ?>
    <div class=\"row\">
        <div class=\"col-lg-12\">
            <div class=\"panel panel-default\">
                <div class=\"panel-heading\">
                    <h2 class=\"panel-title\"><b>List " . ucfirst($table_name) . "</b></h2>
                    <div class=\"panel-heading-btn\">
                    <a href=\"javascript:;\" class=\"btn btn-xs btn-icon btn-default\" data-toggle=\"panel-expand\"><i class=\"fa fa-expand\"></i></a>
                    <a href=\"javascript:;\" class=\"btn btn-xs btn-icon btn-success\" data-toggle=\"panel-reload\"><i class=\"fa fa-redo\"></i></a>
                    <a href=\"javascript:;\" class=\"btn btn-xs btn-icon btn-warning\" data-toggle=\"panel-collapse\"><i class=\"fa fa-minus\"></i></a>
                    <!-- <a href=\"javascript:;\" class=\"btn btn-xs btn-icon btn-danger\" data-toggle=\"panel-remove\"><i class=\"fa fa-times\"></i></a> -->
                </div>
                </div>
                <div class=\"panel-body\">
        <div class=\"row\" style=\"margin-bottom: 10px\">
            <div class=\"col-md-8\">
                <?php echo anchor(site_url('" . $c_url . "/create'),'Tambah Data', 'class=\"btn btn-flat btn-success\"'); ?>
            </div>
            
            
            <div class=\"col-md-1 text-right\">
            </div>
            <div class=\"col-md-3 text-right\">
                <form action=\"<?php echo site_url('$c_url/index'); ?>\" class=\"form-inline\" method=\"get\">
                    <div class=\"input-group\">
                        <input type=\"text\" class=\"form-control\" name=\"q\" value=\"<?php echo \$q; ?>\">
                            <?php 
                                if (\$q <> '')
                                {
                                    ?>
                                    <a href=\"<?php echo site_url('$c_url'); ?>\" class=\"btn btn-flat btn-default\">Reset</a>
                                    <?php
                                }
                            ?>
                          <button class=\"btn btn-flat btn-success\" type=\"submit\">Cari</button>
                    </div>
                </form>
            </div>
        </div>
        <div class=\"table-responsive\">
        <table class=\"table table-bordered table-hover table-condensed\" style=\"margin-bottom: 10px\">
            <thead class=\"thead-light\">
            <tr>
                <th class=\"text-center\">No</th>";
foreach ($non_pk as $row) {
    $string .= "\n\t\t<th class=\"text-center\">" . label($row['column_name']) . "</th>";
}
$string .= "\n\t\t<th class=\"text-center\">Action</th>
            </tr>
            </thead>\n\t\t\t<tbody>";
$string .= "<?php
            foreach ($" . $c_url . "_data as \$$c_url)
            {
                ?>
                <tr>";

$string .= "\n\t\t\t<td width=\"80px\"><?php echo ++\$start ?></td>";
foreach ($non_pk as $row) {
    $string .= "\n\t\t\t<td><?php echo $" . $c_url . "->" . $row['column_name'] . " ?></td>";
}


$string .= "\n\t\t\t<td style=\"text-align:center\" width=\"200px\">"
    . "\n\t\t\t\t<?php "
    . "\n\t\t\t\techo anchor(site_url('" . $c_url . "/read/'.$"  . $c_url . "->" . $pk . "),'<i class=\"fa fa-eye\"></i>','class=\"btn btn-xs btn-success\"'); "
    . "\n\t\t\t\techo ' | '; "
    . "\n\t\t\t\techo anchor(site_url('" . $c_url . "/update/'.$" . $c_url . "->" . $pk . "),'<i class=\"fa fa-edit\"></i>','class=\"btn btn-xs btn-warning\"'); "
    . "\n\t\t\t\techo ' | '; "
    . "\n\t\t\t\techo anchor(site_url('" . $c_url . "/delete/'.$" . $c_url . "->" . $pk . "),'<i class=\"fa fa-trash\"></i>','class=\"btn btn-xs btn-danger\" onclick=\"javascript: return confirm(\\'Yakin hapus data?\\')\"'); "
    . "\n\t\t\t\t?>"
    . "\n\t\t\t</td>";

$string .=  "\n\t\t</tr>
                
                <?php
            }
            ?>
            </tbody>
        </table>
        </div>
        <div class=\"row\">
            <div class=\"col-md-6\">
                <a href=\"#\" class=\"btn btn-flat btn-success\">Total Record : <?php echo \$total_rows ?></a>";
if ($export_excel == '1') {
    $string .= "\n\t\t<?php echo anchor(site_url('" . $c_url . "/excel'), 'Excel', 'class=\"btn btn-flat btn-success\"'); ?>";
}
if ($export_word == '1') {
    $string .= "\n\t\t<?php echo anchor(site_url('" . $c_url . "/word'), 'Word', 'class=\"btn btn-flat btn-success\"'); ?>";
}
if ($export_pdf == '1') {
    $string .= "\n\t\t<?php echo anchor(site_url('" . $c_url . "/pdf'), 'PDF', 'class=\"btn btn-flat btn-success\"'); ?>";
}
$string .= "\n\t    </div>
            <div class=\"col-md-6 text-right\">
                <?php echo \$pagination ?>
            </div>
        </div>
        </div>
    </div>
    </div>
    </div>";


$hasil_view_list = createFile($string, $target . "views/backend/" . $c_url . "/" . $v_list_file);
