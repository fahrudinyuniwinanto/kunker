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
<?php if (\$this->session->userdata('message') != '') {?>
    <div class=\"alert alert-success alert-dismissable\">
                <button aria-hidden=\"true\" data-dismiss=\"alert\" class=\"close\" type=\"button\">×</button>
                <?=\$this->session->userdata('message')?> <a class=\"alert-link\" href=\"#\"></a>
    </div>
 <?php }?>
    <div class=\"row\">
        <div class=\"col-lg-12\">
            <div class=\"panel panel-default\">
                <div class=\"panel-heading\">
                    <h2 class=\"panel-heading\"><b>List " . ucfirst($table_name) . "</b></h2>
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
               
            </div>
            
            
            <div class=\"col-md-1 text-right\">
            </div>
            <div class=\"col-md-3 text-right\">
                <form action=\"<?php echo site_url('$c_url/index'); ?>\" class=\"form-inline\" method=\"get\">
                    <div class=\"input-group\">
                        <input type=\"text\" class=\"form-control\" name=\"q\" id=\"q\" value=\"<?php echo @\$_GET['q']; ?>\">
                        <span class=\"input-group-btn\">
                          <button type=\"button\" class=\"btn btn-success\" onclick=\"lookup('<?php echo base_url()?>" . $c_url . "/lookup')\" >Search</button>
                        </span>
                    </div>
                </form>
            </div>
        </div>
        <table class=\"table table-bordered table-hover table-condensed\" style=\"margin-bottom: 10px\">
            <thead class=\"thead-light\">
            <tr>
                <th class=\"text-center\">No</th>";
foreach ($non_pk as $row) {
    $string .= "\n\t\t<th class=\"text-center\">" . label($row['column_name']) . "</th>";
}
$string .= "</tr>
            </thead>\n\t\t\t<tbody>";
$string .= "<?php
            foreach ($" . $c_url . "_data as \$$c_url)
            {
                ?>
                <tr style=\"cursor: pointer\">";

$string .= "\n\t\t\t<td width=\"80px\"><?php echo ++\$start ?></td>";
foreach ($non_pk as $row) {
    $string .= "\n\t\t\t<td><?php echo $" . $c_url . "->" . $row['column_name'] . " ?></td>";
}

$string .=  "\n\t\t</tr>
                
                <?php
            }
            ?>
            </tbody>
        </table>
        <div class=\"row\">
            <div class=\"col-md-6\">
                <a href=\"#\" class=\"btn btn-success\">Total Record : <?php echo \$total_rows ?></a>";

$string .= "\n\t    </div>
        </div>
        </div>
    </div>
    </div>
    </div>";


$hasil_view_lookup = createFile($string, $target . "views/backend/" . $c_url . "/" . $v_lookup_file);
