<?php

use App\Libraries\Permission;

function DB()
{
    $db = \Config\Database::connect();
    return $db;
}

function newSession()
{
    $session = \Config\Services::session();
    return $session;
}

function get_data_by_id($needCol, $table, $whereCol, $whereInfo)
{
    $table = DB()->table($table);

    $query = $table->where($whereCol,$whereInfo)->get();
    $findResult = $query->getRow();
    if (!empty($findResult)) {
        $col = ($findResult->$needCol == NULL) ? NULL: $findResult->$needCol;
    }else {
        $col = false;
    }
    return $col;
}

function showWithCurrencySymbol($money) {
//    $table = DB()->table('gen_settings');
//    $currency_before_symbol = $table->where('sch_id',$_SESSION['shopId'])->where('label','currency_before_symbol')->get()->getRow();
//    $currency_after_symbol = $table->where('sch_id',$_SESSION['shopId'])->where('label','currency_after_symbol')->get()->getRow();
//    $result = $currency_before_symbol->value." ".number_format($money, 2, '.', ',')." ".$currency_after_symbol->value;
//    return $result;
    return '৳ '.number_format($money, 2, '.', ',').' /-';
}

function statusView($selected = '1') {
    $status = [
        '0' => 'Inactive',
        '1' => 'Active',
    ];

    $row = '';
    foreach ($status as $key => $option) {
        $row .= ($selected == $key) ? $option : '';
    }
    return $row;
}

function globalStatus($selected = 'sel') {
    $status = [
        'sel' => '--Select--',
        '1' => 'Active',
        '0' => 'Inactive',
    ];

    $row = '';
    foreach ($status as $key => $option) {
        $row .= '<option value="' . $key . '"';
        $row .= ($selected == $key) ? ' selected' : '';
        $row .= '>' . $option . '</option>';
    }
    return $row;
}

function user($id) {
    $table = DB()->table('admin');

    $query = $table->where('user_id',$id)->get();
    $findResult = $query->getRow();
    if (!empty($findResult)) {
        $col = $findResult;
    }else {
        $col = array();
    }
    return $col;
}

function globalDateTimeFormat($datetime = '0000-00-00 00:00:00') {

    if ($datetime == '0000-00-00 00:00:00' or $datetime == '0000-00-00' or $datetime == '') {
        return 'Unknown';
    }
    return date('h:i A d/m/y', strtotime($datetime));
}

function globalDateFormat($datetime = '0000-00-00 00:00:00') {

    if ($datetime == '0000-00-00 00:00:00' or $datetime == '0000-00-00' or $datetime == null) {
        return 'Unknown';
    }
    return date('d F, Y', strtotime($datetime));
}

function work_all_image($work_id){
    $table = DB()->table('work_gallary');
    if (isset(newSession()->image_protect)) {
        $result = $table->where('work_id', $work_id)->get()->getResult();
    }else {
        $result = $table->where('work_id', $work_id)->where('protected','0')->get()->getResult();
    }

    return $result;
}

function image_view($url,$slug,$image,$no_image,$class=''){
    $dir = FCPATH .'/'.$url.'/'.$slug;
    $bas_url = base_url();
    $img = $bas_url.'/'.$url.'/'.$slug.'/'.$image;
    $no_img = $bas_url.'/'.$url.'/'.$no_image;
    if (!empty($image)){
        if(!file_exists($dir)){
            $result = '<img data-sizes="auto" src="'.$no_img.'" class="'.$class.'" loading="lazy">';
        }else{
            $result = '<img data-sizes="auto" src="' . $img . '" class="' . $class . '" loading="lazy">';
        }
    }else{
        $result = '<img data-sizes="auto" src="'.$no_img.'" class="'.$class.'" loading="lazy">';
    }
    return $result;
}

function image_view_url($url,$slug,$image,$no_image,$class=''){
    $dir = FCPATH .'/'.$url.'/'.$slug;
    $bas_url = base_url();
    $img = $bas_url.'/'.$url.'/'.$slug.'/'.$image;
    $no_img = $bas_url.'/'.$url.'/'.$no_image;
    if (!empty($image)){
        if(!file_exists($dir)){
            $result = $no_img;
        }else{
            $result = $img;
        }
    }else{
        $result = $no_img;
    }
    return $result;
}

function slider_image($url,$image,$no_image,$class=''){
    $dir = FCPATH .'/'.$url;
    $bas_url = base_url();

    $img = $bas_url.'/'.$url.'/'.$image;
    $no_img = $bas_url.'/'.$url.'/'.$no_image;
    if (!empty($image)){
        if(!file_exists($dir)){
            $result = '<img data-sizes="auto" src="'.$no_img.'" class="'.$class.'">';
        }else{
            $result = '<img data-sizes="auto" src="' . $img . '" class="' . $class . '">';
        }
    }else{
        $result = '<img data-sizes="auto" src="'.$no_img.'" class="'.$class.'">';
    }
    return $result;
}

function title_by_global_settings_value($title){
    $table = DB()->table('global_settings');
    $data = $table->where('title',$title)->get()->getRow();

    if (!empty($data)){
        $result = $data->value;
    }else{
        $result = false;
    }
    return $result;
}


function getAllListInOption($selected, $tblId, $needCol, $table)
{
    $table = DB()->table($table);
    $query = $table->get();
    $options = '';
    foreach ($query->getResult() as $value) {
        $options .= '<option value="' . $value->$tblId . '" ';
        $options .= ($value->$tblId == $selected ) ? ' selected="selected"' : '';
        $options .= '>' . $value->$needCol. '</option>';
    }
    return $options;
}

function getAllListInOptionWithStatus($selected, $tblId, $needCol, $table,$orderBy)
{
    $table = DB()->table($table);

    $query = $table->where('status','1')->orderBy($orderBy,'ASC')->get();
    $options = '';
    foreach ($query->getResult() as $value) {
        $options .= '<option value="' . $value->$tblId . '" ';
        $options .= ($value->$tblId == $selected ) ? ' selected="selected"' : '';
        $options .= '>' . $value->$needCol. '</option>';
    }
    return $options;
}

function page_type($selected = ''){
    $status = [
        '1' => 'Profile',
        '2' => 'Contact',
        '3' => 'Employment',
    ];

    $row = '';
    foreach ($status as $key => $option) {
        $row .= '<option value="' . $key . '"';
        $row .= ($selected == $key) ? ' selected' : '';
        $row .= '>' . $option . '</option>';
    }
    return $row;
}

function page_type_view($selected = '1') {
    $status = [
        '1' => 'Profile',
        '2' => 'Contact',
        '3' => 'Employment',
    ];

    $row = '';
    foreach ($status as $key => $option) {
        $row .= ($selected == $key) ? $option : '';
    }
    return $row;
}

function get_all_data_array_by_table_name($table){
    $table = DB()->table($table);
    $query = $table->get();

    return $query->getResult();
}

function years_of_experience($selected = 'sel') {
    $status = [
        '1' => '1-3 Years Experience',
        '2' => '3-5 Years Experience',
        '3' => '5-7 Years Experience',
        '4' => '7-10 Years Experience',
        '5' => '10-15 Years Experience',
        '6' => '15-20 Years Experience',
        '7' => '20+ Years Experience',
    ];

    $row = '';
    foreach ($status as $key => $option) {
        $row .= '<option value="' . $key . '"';
        $row .= ($selected == $key) ? ' selected' : '';
        $row .= '>' . $option . '</option>';
    }
    return $row;
}

function years_of_experience_view($selected = 'sel') {
    $status = [
        '1' => '1-3 Years Experience',
        '2' => '3-5 Years Experience',
        '3' => '5-7 Years Experience',
        '4' => '7-10 Years Experience',
        '5' => '10-15 Years Experience',
        '6' => '15-20 Years Experience',
        '7' => '20+ Years Experience',
    ];

    $row = '';
    foreach ($status as $key => $option) {
        $row .= ($selected == $key) ? $option : '';
    }
    return $row;
}

function review_process($selected = 'sel') {
    $status = [
        '1' => 'Schedule Interview',
        '2' => 'Interview Sceduled',
        '3' => 'Interview completed',
        '4' => 'Save for later',
        '5' => 'Dismissed',
    ];

    $row = '';
    foreach ($status as $key => $option) {
        $row .= '<option value="' . $key . '"';
        $row .= ($selected == $key) ? ' selected' : '';
        $row .= '>' . $option . '</option>';
    }
    return $row;
}

function review_process_view($selected = 'sel') {
    $status = [
        '1' => 'Schedule Interview',
        '2' => 'Interview Sceduled',
        '3' => 'Interview completed',
        '4' => 'Save for later',
        '5' => 'Dismissed',
    ];

    $row = '';
    foreach ($status as $key => $option) {
        $row .= ($selected == $key) ? $option : '';
    }
    return $row;
}



