<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class customer_model extends CI_Model {

	public function getByUsername($email)
	{
        $this->db->where('email',$email);
        $admins = $this->db->get('admins')->row_array();
        return $admins;
    }

    public function getCustomerStatus()
	{
        $this->db->where('status',0);
        $customers = $this->db->get('customers')->result_array();
        return $customers;
    }
    
    public function getCustomerById($id)
	{
        $this->db->where('id',$id);
        $admins = $this->db->get('customers')->row_array();
        return $admins;
    }
    

    public function get_customers(){
        $customers = $this->db->get('customers')->result_array();
        return $customers;   
    }
    public function saveCustomer($data_array){
    
        $this->db->insert("customers",$data_array);    
    }

    public function updateCustomer($data_array,$id)
    {
        $this->db->where('id', $id);
        $this->db->update('customers', $data_array);
        
    }
    public function deleteCustomer($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('customers');
        
    }

    //update status
    public function updateStatusCustomer($id,$data_array){
        // $data_array['status'] = 1;
        $this->db->where('id', $id);
        $this->db->update('customers', $data_array);
    }

    
}