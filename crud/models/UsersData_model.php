<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class UsersData_model extends CI_Model {

    public function save($data){
        $this->db->query("ALTER TABLE user AUTO_INCREMENT 1");
        $this->db->insert("usersdata", $data);
    }

    public function getUsers(){
        $this->db->select("*");
        $this->db->from("usersdata");
        $results=$this->db->get();
        return $results->result();
    }

    public function getUser($id){
        $this->db->select("u.id, u.full_name, u.email");
        $this->db->from("usersdata u");
        $this->db->where("u.id", $id);
        $result=$this->db->get();
        return $result->row();
    }

    public function update($data,$id){
        $this->db->where("id", $id);
        $this->db->update("usersdata", $data);
    }

    public function delete($id){
        $this->db->where("id", $id);
        $this->db->delete("usersdata");
    }
    
}
