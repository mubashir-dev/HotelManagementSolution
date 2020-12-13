
<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Customers extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('customer_model');
    }
    public function index()
    {
        $customers = $this->customer_model->get_customers();
        $result['data'] = $customers;
        $this->load->view('admin/customer/Customers', $result);
    }
    public function Customers()
    {
        $this->load->view('admin/customer/Create');
    }

    //Add Customer
    public function create()
    {
        $this->form_validation->set_rules('name', 'Name', 'required');
        $this->form_validation->set_rules(
            'contact',
            'Contact',
            'required|is_unique[customers.contact]|required|regex_match[/^[0-9]{11}$/]'
        );
        $this->form_validation->set_rules(
            'cnic',
            'CNIC',
            'required|is_unique[customers.cnic]|required|regex_match[/^[0-9]{13}$/]'
        );
        $this->form_validation->set_rules('city', 'City', 'required');

        if ($this->form_validation->run() == true) {
            $data_array = [];

            $data_array['name'] = $this->input->post('name');
            $data_array['contact'] = $this->input->post('contact');
            $data_array['cnic'] = $this->input->post('cnic');
            $data_array['city'] = $this->input->post('city');
            $data_array['created_at'] = date('Y-m-d H:i:s');
            $data_array['updated_at'] = date('Y-m-d H:i:s');
            $this->customer_model->saveCustomer($data_array);

            $this->session->set_flashdata(
                'msg',
                'Customers Created Successfully'
            );
            redirect(base_url('admin/Customers/index'), 'refresh');
        } else {
            $this->load->view('admin/customer/create');
        }
    }
    // Updatedata Customer
    public function update_data()
    {
        $id = $this->input->get('id');
        $customer = $this->customer_model->getCustomerById($id);
        $result['data'] = $customer;
        $this->load->view('admin/customer/Edit', $result);
    }

    // Edit Customer

    public function Edit()
    {
        $this->form_validation->set_rules('name', 'Name', 'required');
        $this->form_validation->set_rules(
            'contact',
            'Contact',
            'required|required|regex_match[/^[0-9]{11}$/]'
        );
        $this->form_validation->set_rules(
            'cnic',
            'CNIC',
            'required|required|regex_match[/^[0-9]{13}$/]'
        );
        $this->form_validation->set_rules('city', 'City', 'required');

        if ($this->form_validation->run() == true) {
            $data_array = [];

            $id = $this->input->post('id');
            $data_array['name'] = $this->input->post('name');
            $data_array['contact'] = $this->input->post('contact');
            $data_array['cnic'] = $this->input->post('cnic');
            $data_array['city'] = $this->input->post('city');
            $data_array['updated_at'] = date('Y-m-d H:i:s');
            if ($this->customer_model->updateCustomer($data_array, $id)) {
                $this->session->set_flashdata(
                    'msg',
                    'Customers Edited Successfully'
                );
                redirect(base_url('admin/Customers/index'), 'refresh');
            }
        } else {
            $this->session->set_flashdata(
                'msg',
                'Customers Edited Not Successfully'
            );
            redirect(base_url('admin/Customers/index'), 'refresh');
        }
    }

    //Delete Customer

    public function delete_customer()
    {
        $id = $this->input->get('id');
        $this->customer_model->deleteCustomer($id);
        $this->session->set_flashdata('msg', 'Customer Deleted Successfully');
        redirect(base_url() . 'admin/Customers/index', 'refresh');
    }
}

