<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class Profile extends MX_Controller 
{

function __construct() {
    parent::__construct();
}

function index() {
    // $username = $_GET['identifier'];
    if($this->session->userdata('user_id') != NULL){
        $fullname = $this->session->userdata('fname') . " " . $this->session->userdata('lname');
        $oid = $this->session->userdata('user_id');
        $default['page_title'] = $fullname;
        $username = $this->session->userdata('username');
        //use this variable and edit the value if you want some message
        //$data['messageC'] = "Not yet available contact admin for this. <a target='_blank' href='http://www.facebook.com/johnabelardom/'>Click here.</a>";
        //$sql = "SELECT * FROM accounts WHERE username = $username LIMIT 1,1";
        $query = $this->get_where_custom('username', $username);
        $profile = $query->result();
        $default['profile'] = $profile;

        //use this if something wrong with the second sql script
        //$sql = "SELECT * FROM feeds WHERE owner_id = $oid ORDER BY date_created DESC";

        //use this one if everything's fine
        $sql ="SELECT * FROM accounts INNER JOIN feeds ON accounts.id = feeds.owner_id WHERE username = '" . $username . "' ORDER BY feeds.date_created DESC";
        try{
            $feeds = $this->_custom_query($sql);
            $res = $feeds->result();
            $default['msg'] = "";
            if($res == NULL){
                $default['msg'] = "<p>No recent posts yet.</p>";
            } else {
                $default['feeds'] = $res;
            }
        } catch (Exception $e) {
            echo '[ Problem with retrieving datas ]. ' . $e->getMessage();
        }

        $this->load->view('commons/header', $default);
        $this->load->view('profilecontent');
        $this->load->view('commons/footer');

    }else {
        $message['page_title'] = 'Jimbo';
        $message['messageC'] = "You are not Logged In.";
        $this->load->view('commons/header-off', $message);
        $this->load->view('commons/footer');
    }
}

function person() {


    if(! isset($_GET['identifier']) || $_GET['identifier'] == "") {
        if($this->session->userdata('user_id') > 0) {
           $_GET['identifier'] = $this->session->userdata('username');
        }else {
            redirect('login');
        }

    }
        $uname = str_replace(' ', '-', $_GET['identifier']);
        $username = preg_replace('/[^A-Za-z0-9\-]/', '', $uname);

            try {
                $query = $this->get_where_custom('username', $username);
                $profile = $query->result();
                //var_dump($profile); exit();
                if(sizeof($profile) > 0) {
                    $default['profile'] = $profile;
                }
            } catch(Exception $e) {
                $default['page_title'] = "Jimbo";
                $default['msg'] += "<br><br>Unable to show profile. There's no $username registered here.";
            }

            
            $sql = "SELECT * FROM accounts INNER JOIN feeds ON accounts.id = feeds.owner_id WHERE username = '" . $username . "' ORDER BY feeds.date_created DESC";
            try{
                // error_reporting(0);
                $feeds = $this->_custom_query($sql);
                $res = $feeds->result();
                $default['msg'] = "";
                    if($res == NULL){
                        $default['msg'] = "<p>No recent posts yet.</p>";
                        $default['page_title'] = $username;
                    }else{
                        $default['page_title'] = $res[0]->ownername;
                    }
                    $default['feeds'] = $res;
            } catch (Exception $e) {
                $default['msg'] += '<br><br>[ Problem with retrieving datas ]. ' . $e->getMessage();
            }

            if($username == ""){
                $this->load->view('commons/header', $default);
            }else {
                // echo '<pre>';
                // var_dump($this->session->userdata);
                // exit();
                if($this->session->userdata('user_id')){
                    $this->load->view('commons/header', $default);
                }else {
                    $this->load->view('commons/header-off', $default);
                }
                $this->load->view('profilecontent');
                $this->load->view('commons/footer');
            }
}

function error_view($username) {
    $uname = str_replace(' ', '-', $username);
    $user = preg_replace('/[^A-Za-z0-9\-]/', '', $uname);
    $error['page_title'] = "Jimbo";
    $error['messageC'] = "<br><br>Unable to show profile. There's no '<i><b>" . $user . "</b></i>' registered here.";
    $this->load->view('commons/header-off', $error);
    $this->load->view('commons/footer');
}

function profile_setting() {

    $this->load->view('commons/header');
    $this->load->view('profilesetting');
    $this->load->view('commons/footer');
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