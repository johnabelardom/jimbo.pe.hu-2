<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class Feeds extends MX_Controller 
{

function __construct() {
    parent::__construct();
}

function index() {
    if($this->session->userdata('user_id') != NULL){
        $uid = $this->session->userdata('user_id');
        //use this script for displaying all the feeds by one owner only
        //$sql = "SELECT * FROM feeds WHERE owner_id = $uid ORDER BY date_created DESC";

        //use this script for displaying all the feeds
        //$sql = "SELECT * FROM feeds ORDER BY date_created DESC";

        //use this script for displaying all feeds with joined with two tables
        $sql = "SELECT * FROM accounts INNER JOIN feeds ON accounts.id = feeds.owner_id ORDER BY feeds.date_created DESC";

        try{
            $feeds = $this->_custom_query($sql);
            $res = $feeds->result();
            $data['msg'] = "";
            if($res == NULL){
                $data['msg'] = "<p>No recent posts yet.</p>";
            } else {
                $data['feeds'] = $res;
            }
        } catch (Exception $e) {
            echo '[Problem with retrieving datas]. ' . $e->getMessage();
        }
        $data['page_title'] = "News Feed";
        $this->load->view('commons/header', $data);
        //$this->load->view('commons/sidebar');
        $this->load->view('news_feed');
        $this->load->view('commons/footer');
    }else {
        echo '<p>You are not Logged In</p>';
    }
}

function postFeedcheck() {
    $ownerid = $this->session->userdata('user_id');
    $ownername = $this->session->userdata('fname') . ' ' . $this->session->userdata('lname');
    $content = trim($_POST['content']);
    $file = $_POST['file'];

    if($content != ""){
        $data = array('owner_id' => $ownerid, 'ownername' => $ownername, 'content' => $content, 'attached_file' => $file);
        try {
            $this->_insert($data);
            //echo "s_POSTuccess";
            if($_POST['from_place'] == 'feeds'){
                redirect('feeds'); 
            }
            if($_POST['from_place'] == 'profile'){
                redirect('profile');
            }
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }else {
        //$dat['msgerr'] = '<p>Nothing to post.</p>';
       
        redirect('feeds');
         //return $dat;
    }
}

function deletePost() {
    $id = $_GET['id'];

    try{
        $this->_delete($id);
        echo "";
    }catch (Exception $e) {
        echo $e->getMessage();
    }
}

function updatePost() {
    // $editID = $this->input->post('editid');//$_GET['editid'];
    // $contentup = $this->input->post('contenttext');//$_GET['contenttext'];
    $editID = $_POST['editid'];
    $contentUP = $_POST['contenttext'];
    $ownerID = $this->session->userdata('user_id');
    var_dump($editID . " + " . $contentUP);
    //exit();
    //$data = array('content', $contentup);
    try {
        //$this->_update($editID, $data);
        $sql = "UPDATE feeds SET content = '$contentUP' WHERE id = $editID AND owner_id = $ownerID";
        // var_dump($sql);
        // exit();
        $this->_custom_query($sql);      
       // redirect('feeds');
        //echo "SUCCESS";
        //redirect('feeds');
    }catch (Exception $e) {
        echo $e->getMessage();
    }
}


//     $this->load->helper('form');
//     $this->form_validation->set_rules('content', 'Content', 'required|callback_postFeedins');

//     if($this->form_validation->run() == false){
//         redirect('feeds');
//     }else {
//         echo "Success";
//         redirect('feeds');
//     }

// }

// function postFeedins() {
//     $content = $this->input->post('content');

//     $ownerid = $this->session->userdata('user_id');
//     $ownername = $this->session->userdata('fname') . ' ' . $this->session->userdata('lname');
//     $file = $this->input->post('file');
//     $data = array('owner_id' => $ownerid, 'ownername' => $ownername, 'content' => $content, 'attached_file' => $file);
//     try {
//         $this->_insert($data);
//         //echo "s_POSTuccess";
//         return true;
//         //redirect('feeds'); 
//     } catch (Exception $e) {
//         return false;
//         echo $e->getMessage();
//     }


// }


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