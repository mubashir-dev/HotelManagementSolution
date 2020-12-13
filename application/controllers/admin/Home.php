<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $admin = $this->session->userdata('admin');
        if (empty($admin)) {
            $this->session->set_flashdata(
                'msg',
                'Your Session has been expired'
            );
            redirect(base_url() . 'admin/login/index', 'refresh');
        }
    }

    public function index()
    {
        $admin = $this->session->userdata('admin');
        $result['data'] = $admin;
        // print_r($admin);
        $this->load->view('admin/dashboard', $result);
    }
    public function Admins()
    {
        $this->load->view('admin/admins/Create');
    }
}
