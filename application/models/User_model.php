<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class User_model extends CI_Model {

    public function save_user($user){
        $this -> db -> insert('user', $user);
        return $this -> db -> affected_rows();
    }

    public function get_all(){
//        return $this -> db ->get('user') -> result();

        /*
            select user.*, course.coursename
            from user left join course
            on user.id=course.user_id;
        */

        $this->db->select('user.*, course.coursename');
        $this->db->from('user');
        $this->db->join('course', 'user.id=course.user_id', 'left');
        $this->db->order_by('user.id', 'asc');
        return $this->db->get()->result();
    }


    public function get_by_id($user_id){
//        return $this -> db -> get_where("user", array("id"=>$user_id)) -> row();
        $query = $this->db->get_where('user', array('id' => $user_id));
        return $query -> row();
//        return $this -> db -> query("select * from user where id=".$user_id) -> row();
    }

    public function update_user($user){
        $this->db->where('id', $user["id"]);
        $this->db->update('user', array(
            "username" => $user["username"],
            "password" => $user["password"]
        ));
        return $this->db->affected_rows();
    }

    public function delete($id){
        $this->db->delete('user', array("id"=>$id));
        return $this->db->affected_rows();

    }

    public function get_by_username_pwd($username, $pwd){
        $query = $this -> db -> get_where("user", array(
            "username" => $username,
            "password" => $pwd
        ));
//        var_dump($username);
//        var_dump($pwd);
//        die();
        return $query -> row();
    }

    public function get_by_username($username){
        return $this -> db -> get_where("user", array("username" => $username)) -> row();
    }


}