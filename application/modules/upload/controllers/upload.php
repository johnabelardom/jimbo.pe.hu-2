<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class Upload extends MX_Controller 
{


function __construct() {
    parent::__construct();



}


function index() {

    if($this->session->userdata('user_id') != NULL){
        $uid = $this->session->userdata('user_id');
        try{
         
        } catch (Exception $e) {
            echo '[Problem with retrieving datas]. ' . $e->getMessage();
        }
        $data['page_title'] = "Files";
        $this->load->view('commons/header', $data);
        $this->load->view('commons/sidebar');
        $this->load->view('uploads');
        $this->load->view('commons/footer');
    }else {
        echo '<p>You are not Logged In</p>';
    }

}

function uploadfile(){

    $this->load->model('mdl_perfectcontroller');
    // var_dump($this->input->post('upload'));
    // exit();
    if($this->input->post('upload') == "Upload"){

        $this->mdl_perfectcontroller->do_upload();
        redirect('upload');
        
    }else {
        echo 'No file chosen';
    }
}


function get($order_by)
{
    $this->load->model('mdl_perfectcontroller');
    $query = $this->mdl_perfectcontroller->get($order_by);
    return $query;
}

function get_with_limit($limit, $offset, $order_by) 
{
    if ((!is_numeric($limit)) || (!is_numeric($offset))) {
        die('Non-numeric variable!');
    }

    $this->load->model('mdl_perfectcontroller');
    $query = $this->mdl_perfectcontroller->get_with_limit($limit, $offset, $order_by);
    return $query;
}

function get_where($id)
{
    if (!is_numeric($id)) {
        die('Non-numeric variable!');
    }

    $this->load->model('mdl_perfectcontroller');
    $query = $this->mdl_perfectcontroller->get_where($id);
    return $query;
}

function get_where_custom($col, $value) 
{
    $this->load->model('mdl_perfectcontroller');
    $query = $this->mdl_perfectcontroller->get_where_custom($col, $value);
    return $query;
}

function _insert($data)
{
    $this->load->model('mdl_perfectcontroller');
    $this->mdl_perfectcontroller->_insert($data);
}

function _update($id, $data)
{
    if (!is_numeric($id)) {
        die('Non-numeric variable!');
    }

    $this->load->model('mdl_perfectcontroller');
    $this->mdl_perfectcontroller->_update($id, $data);
}

function _delete($id)
{
    if (!is_numeric($id)) {
        die('Non-numeric variable!');
    }

    $this->load->model('mdl_perfectcontroller');
    $this->mdl_perfectcontroller->_delete($id);
}

function count_where($column, $value) 
{
    $this->load->model('mdl_perfectcontroller');
    $count = $this->mdl_perfectcontroller->count_where($column, $value);
    return $count;
}

function get_max() 
{
    $this->load->model('mdl_perfectcontroller');
    $max_id = $this->mdl_perfectcontroller->get_max();
    return $max_id;
}

function _custom_query($mysql_query) 
{
    $this->load->model('mdl_perfectcontroller');
    $query = $this->mdl_perfectcontroller->_custom_query($mysql_query);
    return $query;
}

}