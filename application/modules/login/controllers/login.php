<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class Login extends MX_Controller 
{

function __construct() {
parent::__construct();
}

function index() {
    if($this->session->userdata('user_id') > 0){
        redirect('dashboard');
    }else {
        $data['page_title'] = 'Jimbo - Login your Account';
        $this->load->view('commons/header-off', $data);
        $this->load->view('login_page');
        $this->load->view('commons/footer');
    }
}

function loginuser() {
    $email = $_GET['email'];
    $pass = md5($_GET['pass']);
    $sql = "SELECT * FROM accounts WHERE email = '$email' AND password = '$pass'";
    

    if($data = $this->_custom_query($sql)) {
        $res = $data->result();
        // var_dump($res[0]->id);
        // exit();
        if($res == NULL){
            //var_dump(FALSE);
            return NULL;
        }else{
            if($res[0]->id > 0){
                $user_details = array('user_id' => $res[0]->id, 
                    'role' => $res[0]->role,
                    'fname' => $res[0]->fname,
                    'lname' => $res[0]->lname,
                    'username' => $res[0]->username,
                    'bdate' => $res[0]->birthdate  );
                $this->session->set_userdata($user_details);
                echo $this->session->userdata('user_id');
                //return TRUE;
            }
        }
    } else {
        //$asd = "walang data sa database";
        //var_dump($asd);
        return NULL;
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