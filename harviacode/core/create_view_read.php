<?php

$string = "<ol class=\"breadcrumb float-xl-end\">
<li class=\"breadcrumb-item\"><a href=\"javascript:;\"><?php if (\$this->uri->segment('1')) {
                                                        echo \$this->uri->segment('1');
                                                    } ?></a></li>
<li class=\"breadcrumb-item active\"><?php if (\$this->uri->segment('2')) {
                                        echo \$this->uri->segment('2');
                                    } ?></li>
</ol>
<h1 class=\"page-header\">" . ucfirst($table_name) . "  <small></small></h1>

<div class=\"row\">
    <div class=\"col-lg-12\">
    <div class=\"panel panel-default\">
        <div class=\"panel-heading\">
            <h2 class=\"panel-title\" style=\"margin-top:0px\">" . ucfirst($table_name) . " Read</h2>
            <div class=\"panel-heading-btn\">
                    <a href=\"javascript:;\" class=\"btn btn-xs btn-icon btn-default\" data-toggle=\"panel-expand\"><i class=\"fa fa-expand\"></i></a>
                    <a href=\"javascript:;\" class=\"btn btn-xs btn-icon btn-success\" data-toggle=\"panel-reload\"><i class=\"fa fa-redo\"></i></a>
                    <a href=\"javascript:;\" class=\"btn btn-xs btn-icon btn-warning\" data-toggle=\"panel-collapse\"><i class=\"fa fa-minus\"></i></a>
                    <!-- <a href=\"javascript:;\" class=\"btn btn-xs btn-icon btn-danger\" data-toggle=\"panel-remove\"><i class=\"fa fa-times\"></i></a> -->
                </div>
        </div>
        <div class=\"panel-body\">
        <div class=\"table-responsive\">
        <table class=\"table\">";
foreach ($non_pk as $row) {
    $string .= "\n\t    <tr><td>" . label($row["column_name"]) . "</td><td><?php echo $" . $row["column_name"] . "; ?></td></tr>";
}
$string .= "\n\t    <tr><td></td><td><a href=\"<?php echo site_url('" . $c_url . "') ?>\" class=\"btn btn-flat btn-default\">Cancel</a></td></tr>";
$string .= "\n\t</table>
             </div>
            </div>
        </div>
    </div>
    </div>";



$hasil_view_read = createFile($string, $target . "views/backend/" . $c_url . "/" . $v_read_file);