<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Login extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('admin_model');
    }
    public function index()
    {
        $this->load->view('admin/login');
    }

    public function authenticate()
    {
        $this->form_validation->set_rules('email', 'Email', 'required|trim');
        $this->form_validation->set_rules(
            'password',
            'Password',
            'required|trim'
        );

        if ($this->form_validation->run() == true) {
            $email = $this->input->post('email');
            $password = $this->input->post('password');
            $admins = $this->admin_model->getByUsername($email);

            // check if no email is matched
            if (!empty($admins)) {
                $password_hash = $admins['password'];
                if (password_verify($password, $password_hash)) {
                    $adminarray['admin_id'] = $admins['id'];
                    $adminarray['name'] = $admins['name'];
                    $this->session->set_userdata('admin', $adminarray);
                    redirect(base_url() . 'admin/Home/index');
                } else {
                    $this->session->set_flashdata('msg', 'password_wrong');
                    redirect(base_url() . 'admin/login/index');
                }
            } else {
                $this->session->set_flashdata(
                    'msg',
                    'Sorry for inconvience,No User Found'
                );
                redirect(base_url() . 'admin/login/index');
            }
        } else {
            $this->load->view('admin/login');
        }
    }

    // Logout method
    public function logout()
    {
        $this->session->unset_userdata('admin');
        redirect(base_url() . 'admin/login/index', 'refresh');
    }
}
