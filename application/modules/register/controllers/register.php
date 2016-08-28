<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class Register extends MX_Controller 
{

function __construct() {
parent::__construct();
}


function index() {

    if($this->session->userdata('user_id') != NULL){
        if($this->session->userdata('role') == 'admin'){
            //var_dump($this->session->userdata('user_id'));
            $data['page_title'] = "Register An Account";
            $this->load->view('commons/header', $data);
            $this->load->view('registerform');
            $this->load->view('commons/footer');
        }else {
            $this->load->view('commons/header');
            echo '<br><br><br><br><p>You are not an Admin</p>';
            $this->load->view('commons/footer');
        }
    }else {
        $data['page_title'] = 'Register An Account';
        $this->load->view('commons/header-off', $data);
        echo '<br><br><br><br><br><br><p>You are not Logged in.</p>';
        $this->load->view('commons/footer');
    }
}

function registerAccount() {

    // echo '<pre>';
    // var_dump($_POST);
    // echo '</pre>';
    // exit();
    if($this->session->userdata('role') != 'admin') {
        $this->load->view('commons/header');
        echo '<br><br><br><br><p>Access Forbidden. For admin rights only</p>';
        $this->load->view('commons/footer');
    }
    $phonenumber = "";
    if(isset($_POST['phone'])){
        $phonenumber = $_POST['prefixnumber'] . $_POST['phone'];
    }else {
        $phonenumber = "N/A";
    }

    $data['fname'] = $_POST['fname'];
    $data['lname'] = $_POST['lname'];
    $data['age'] = $_POST['age'];
    $data['birthdate'] = date('Y-m-d', strtotime($_POST['birthdate']));
    $data['username'] = $_POST['username'];
    $data['email'] = $_POST['email'];
    $data['password'] = md5($_POST['password']);
    $data['phone'] = $phonenumber;
    $data['role'] = $_POST['role'];
    $base_url = base_url();
    $succ_message = "Registration Success";
    $fail_message = "[ Registration Failed ].";
    try{
        $this->_insert($data);
        $data['messageC'] = $succ_message;
        $this->load->view('commons/header', $data);
        $this->load->view('commons/footer');
    }catch(Exception $e) {
        $data['messageC'] = $fail_message . $e->getMessage();
        $this->load->view('commons/header', $data);
        $this->load->view('commons/footer');
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