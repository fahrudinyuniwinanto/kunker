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

<?php if (\$this->session->userdata('message') != '') { ?>
    <div class=\"alert alert-danger alert-dismissible fade show\">
        <strong><?= \$this->session->userdata('message') ?> </strong>
        <a class=\"alert-link\" href=\"#\"></a>
        <button type=\"button\" class=\"btn-close\" data-bs-dismiss=\"alert\"></span>
    </div>
    <?php } ?>

    <div class=\"row\">
        <div class=\"col-lg-12\">
            <div class=\"panel panel-default\">
                <div class=\"panel-heading\">
                    <h2 class=\"panel-title\" style=\"margin-top:0px\"><?php echo \$button ?> " . ucfirst($table_name) . " </h2>
                    <div class=\"panel-heading-btn\">
                    <a href=\"javascript:;\" class=\"btn btn-xs btn-icon btn-default\" data-toggle=\"panel-expand\"><i class=\"fa fa-expand\"></i></a>
                    <a href=\"javascript:;\" class=\"btn btn-xs btn-icon btn-success\" data-toggle=\"panel-reload\"><i class=\"fa fa-redo\"></i></a>
                    <a href=\"javascript:;\" class=\"btn btn-xs btn-icon btn-warning\" data-toggle=\"panel-collapse\"><i class=\"fa fa-minus\"></i></a>
                    <!-- <a href=\"javascript:;\" class=\"btn btn-xs btn-icon btn-danger\" data-toggle=\"panel-remove\"><i class=\"fa fa-times\"></i></a> -->
                </div>
            </div>
        
        <form action=\"<?php echo \$action; ?>\" method=\"post\">
        <div class=\"panel-body\">";
foreach ($non_pk as $row) {
    if ($row["data_type"] == 'text') {
        $string .= "\n\t    <div class=\"mb-3\">
            <label class=\"form-label\" for=\"" . $row["column_name"] . "\">" . label($row["column_name"]) . " <?php echo form_error('" . $row["column_name"] . "') ?></label>
            <textarea class=\"form-control\" rows=\"3\" name=\"" . $row["column_name"] . "\" id=\"" . $row["column_name"] . "\" placeholder=\"" . label($row["column_name"]) . "\"><?php echo $" . $row["column_name"] . "; ?></textarea>
        </div>";
    } else {
        $string .= "\n\t    <div class=\"mb-3\">
            <label class=\"form-label\" for=\"" . $row["data_type"] . "\">" . label($row["column_name"]) . " <?php echo form_error('" . $row["column_name"] . "') ?></label>
            <input type=\"text\" class=\"form-control\" name=\"" . $row["column_name"] . "\" id=\"" . $row["column_name"] . "\" placeholder=\"" . label($row["column_name"]) . "\" value=\"<?php echo $" . $row["column_name"] . "; ?>\" />
        </div>";
    }
}
$string .= "\n\t    <input type=\"hidden\" name=\"" . $pk . "\" value=\"<?php echo $" . $pk . "; ?>\" /> ";

$string .= "\n\t    <input type=\"hidden\" name=\"<?php echo \$this->security->get_csrf_token_name(); ?>\" value=\"<?php echo \$this->security->get_csrf_hash(); ?>\" >";

$string .= "\n\t    <button type=\"submit\" class=\"btn btn-flat btn-success\"><?php echo \$button ?></button> ";
$string .= "\n\t    <a href=\"<?php echo site_url('" . $c_url . "') ?>\" class=\"btn btn-flat btn-default\">Cancel</a>";
$string .= "\n\t</div>
            </form>
        </div>
        </div>
        </div>";

$hasil_view_form = createFile($string, $target . "views/backend/" . $c_url . "/" . $v_form_file);
