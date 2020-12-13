
<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('admin_model');
    }
    public function index()
    {
        $admins = $this->admin_model->get_admins();
        $result['data'] = $admins;
        $this->load->view('admin/admins/Admin', $result);
    }
    public function Admins()
    {
        $this->load->view('admin/admins/Create');
    }

    //Add Administrator
    public function create()
    {
        $this->form_validation->set_rules('name', 'Name', 'required');
        $this->form_validation->set_rules(
            'email',
            'Email',
            'required|valid_email|is_unique[admins.email]'
        );
        $this->form_validation->set_rules(
            'password',
            'Password',
            'required|trim|max_length[8]'
        );
        $this->form_validation->set_rules(
            'passconf',
            'Password Confirmation',
            'required|matches[password]'
        );

        if ($this->form_validation->run() == true) {
            $data_array = [];

            $data_array['name'] = $this->input->post('name');
            $data_array['email'] = $this->input->post('email');
            $data_array['password'] = password_hash(
                $this->input->post('password'),
                PASSWORD_BCRYPT
            );
            $data_array['created_at'] = date('Y-m-d H:i:s');
            $data_array['updated_at'] = date('Y-m-d H:i:s');
            $this->admin_model->saveRegister($data_array);

            $this->session->set_flashdata(
                'msg',
                'Administrator Created Successfully'
            );
            redirect(base_url('admin/Admin/index'),'refresh');
        } else {
            $this->load->view('admin/admins/Create');
        }
    }
    // Updatedata Administrator
    public function update_data()
    {
        $id = $this->input->get('id');
        $admin = $this->admin_model->getAdminById($id);
        $result['data'] = $admin;
        $this->load->view('admin/admins/Edit', $result);
    }

    // Edit Administrator

    public function Edit()
    {
        $this->form_validation->set_rules('name', 'Name', 'required');
        $this->form_validation->set_rules(
            'email',
            'Email',
            'required|valid_email|is_unique[admins.email]'
        );
        if ($this->form_validation->run() == true) {
            $data_array = [];
            $id = $this->input->post('id');
            $data_array['name'] = $this->input->post('name');
            $data_array['email'] = $this->input->post('email');
            $data_array['updated_at'] = date('Y-m-d H:i:s');
            $this->admin_model->updateAdmin($data_array, $id);
            $this->session->set_flashdata(
                'msg',
                'Administrator Edited Successfully'
            );
            redirect(base_url() . 'admin/Admin/index', 'refresh');
        } else {
            redirect(base_url() . 'admin/Admin/Edit');
        }
    }

    //Delete Administrator

    public function delete_admin()
    {
        $id = $this->input->get('id');
        $this->admin_model->deleteAdmin($id);
        $this->session->set_flashdata(
            'msg',
            'Administrator Deleted Successfully'
        );
        redirect(base_url() . 'admin/Admin/index', 'refresh');

    }

}

