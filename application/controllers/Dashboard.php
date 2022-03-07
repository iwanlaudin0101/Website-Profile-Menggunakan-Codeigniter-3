<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends MY_Controller
{
    private $user;
    private $user_id;

    public function __construct()
    {
        parent::__construct();

        $this->user_id = $this->session->userdata('id');
        $this->user    = $this->dashboard->where('id', $this->user_id)->first('user');
        check_is_login();
        check_user_access();
    }

    public function index()
    {
        // var_dump($this->session->userdata('is_login'));
        // die;
        $data['title'] = 'Dashboard';

        if ($this->user->role === 'admin') {
            // $data['user_count'] = $this->dashboard->count('user');
            // $data['beritas'] = $this->dashboard->count('berita');
            // $data['opini'] = $this->dashboard->count('opini');
            // $data['categori'] = $this->dashboard->count('kategori');
            $data['user'] = $this->user;
            $data['page'] = 'pages/dashboard/index';
        } else {
            $data['page'] = 'pages/dashboard/indexx';
            $data['user'] = $this->user;
        }


        $this->view($data);
        return;
    }
}

/* End of file Dashboard.php */
