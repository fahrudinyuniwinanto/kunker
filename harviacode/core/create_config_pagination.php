<?php

$string = "<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/* 
 * Pagination Config Bootstrap 3 CSS Style
 * harviacode.com
 */

\$config['query_string_segment'] = 'start';
\$config['full_tag_open'] = '<div class=\"pagination\">';
\$config['full_tag_close'] = '</div>';
\$config['first_link'] = 'First';
\$config['first_tag_open'] = '<div class=\"page-item\">';
\$config['first_tag_close'] = '</div>';
\$config['last_divnk'] = 'Last';
\$config['last_tag_open'] = '<div>';
\$config['last_tag_close'] = '</div>';
\$config['next_link'] = '&gt;';
\$config['next_tag_open'] = '<div>';
\$config['next_tag_close'] = '</div>';
\$config['prev_divnk'] = '&lt;';
\$config['prev_tag_open'] = '<div>';
\$config['prev_tag_close'] = '</div>';
\$config['cur_tag_open'] = '<div class=\"page-item active\"><a href=\"#\" class=\"page-link\">';
\$config['cur_tag_close'] = '</a></div>';
\$config['num_tag_open'] = '<div>';
\$config['num_tag_close'] = '</div>';
\$config['attributes'] = array('class' => 'page-link');


/* End of file pagination.php */
/* Location: ./application/config/pagination.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator " . date('Y-m-d H:i:s') . " */
/* http://harviacode.com */";



$hasil_config_pagination = createFile($string, $target . "config/pagination.php");