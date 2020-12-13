<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class admin_model extends CI_Model {

	public function getByUsername($email)
	{
        $this->db->where('email',$email);
        $admins = $this->db->get('admins')->row_array();
        return $admins;
    }
    
    public function getAdminById($id)
	{
        $this->db->where('id',$id);
        $admins = $this->db->get('admins')->row_array();
        return $admins;
    }
    

    public function get_admins(){
        $admins = $this->db->get('admins')->result_array();
        return $admins;   
    }
    public function saveRegister($data_array){
    
        $this->db->insert("admins",$data_array);    
    }

    public function updateAdmin($data_array,$id)
    {
        $this->db->where('id', $id);
        $this->db->update('admins', $data_array);
        
    }

    public function deleteAdmin($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('admins');
        
    }
    }