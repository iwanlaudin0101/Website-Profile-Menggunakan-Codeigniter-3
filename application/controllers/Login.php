<?php


defined('BASEPATH') or exit('No direct script access allowed');

class Login extends MY_Controller
{

    public function __construct()
    {
        parent::__construct();
        $is_login = $this->session->userdata('is_login');
        if ($is_login) {
            redirect(base_url('dashboard'));
            return;
        }
    }

    public function index()
    {
        if (!$_POST) {
            $input = (object) $this->login->getDefaultValues();
        } else {
            $input = (object) $this->input->post(null, true);
        }

        if (!$this->login->validate()) {
            $data['title'] = 'Login';
            $data['input'] = $input;
            $data['form_action'] = base_url() . 'login';

            $this->load->view('layouts/login', $data);
            return;
        }

        if ($this->login->run($input)) {
            $this->session->set_flashdata('success', 'Berhasil melakukan login!');
            redirect(base_url('dashboard'));
        } else {
            $this->session->set_flashdata('error', 'Username atau Password anda salah!');
            redirect(base_url('login'));
        }
    }
}

/* End of file login.php */
