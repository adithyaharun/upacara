<?php

$config['base_url'] = current_url();
$config['query_string_segment'] = 'page';
$config['page_query_string'] = true;
$config['use_page_numbers'] = true;
$config['reuse_query_string'] = true;
$config['num_links'] = 4;
$config['full_tag_open'] = '<ul class="pagination" style="margin: 0">';
$config['full_tag_close'] = '</ul>';
$config['first_tag_open'] = '<li class="page-item">';
$config['first_tag_close'] = '</li>';
$config['first_link'] = false;
$config['last_link'] = false;
$config['prev_link'] = '&laquo';
$config['prev_tag_open'] = '<li class="page-item prev">';
$config['prev_tag_close'] = '</li>';
$config['next_link'] = '&raquo';
$config['next_tag_open'] = '<li class="page-item">';
$config['next_tag_close'] = '</li>';
$config['last_tag_open'] = '<li class="page-item">';
$config['last_tag_close'] = '</li>';
$config['cur_tag_open'] = '<li class="page-item active"><a href="javascript:;">';
$config['cur_tag_close'] = '</a></li>';
$config['num_tag_open'] = '<li class="page-item">';
$config['num_tag_close'] = '</li>';
$config['next_link'] = '<i class="fa fa-chevron-right"></i>';
$config['prev_link'] = '<i class="fa fa-chevron-left"></i>';
