<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        header("Content-type:text/html;charset=utf-8");
    }

    public function index()
    {
        $this->load->view('login');
    }

    public function login(){
        $username = $this -> input -> post("username");
        $password = $this -> input -> post("password");

        $this->load->model('user_model');
        $row = $this -> user_model -> get_by_username_pwd($username, $password);

        if($row){
            $this->session->set_userdata(array(
                "userinfo" => $row
            ));
//            setCookie("userid", $row->id);

//            $this -> user_list();
            redirect("user/user_list");
        }else{
            echo "登录失败";
        }
    }
    public function regist_page(){
        $this -> load -> view("regist");
    }
    
    public function regist(){
        $username = $this->input->post("username");
        $password = $this->input->post("password");

        $this->load->model('user_model');
        $row = $this -> user_model -> save_user(array(
            "username" => $username,
            "password" => $password
        ));
        if($row > 0){
//            $users = $this -> user_model -> get_all();
//            $this->load->view('user_list', array(
//                "users" => $users
//            ));
            redirect("user/user_list");
        }else{
            echo  "fail";
        }
    }
    public function user_list(){
        $this->load->model('user_model');
        $users = $this -> user_model -> get_all();

        $this->load->view('user_list', array(
            "users" => $users
        ));
    }

    public function update_user(){
        $user_id = $this -> input -> get("user_id");
        $this->load->model('user_model');
        $user = $this -> user_model ->get_by_id($user_id);
        $this->load->view('update_user', array(
            "user" => $user
        ));
    }
    
    
    public function update(){
        $id = $this -> input -> post("id");
        $username = $this -> input -> post("username");
        $password = $this -> input -> post("password");
        $this->load->model('user_model');
        $row = $this -> user_model ->update_user(array(
            "id" => $id,
            "username" => $username,
            "password" => $password
        ));
        if($row > 0){
            redirect("user/user_list");
        }else{
            echo  "fail";
        }
    }

    public function delete_user(){
        $id = $this -> input -> get("user_id");
        $this->load->model('user_model');
        $row = $this -> user_model -> delete($id);
        if($row > 0){
            redirect("user/user_list");


        }else{
            echo  "fail";
        }
    }

    public function check_username(){
        $username = $this -> input -> get("username");
        $this->load->model('user_model');
        $row = $this -> user_model -> get_by_username($username);
        if($row){
            echo "no";
        }else{
            echo "yes";
        }

    }
    
}
