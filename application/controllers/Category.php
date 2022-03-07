<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Category extends MY_Controller
{
    private $user;
    private $user_id;

    public function __construct()
    {
        parent::__construct();
        $this->user_id  = $this->session->userdata('id');
        $this->user     = $this->category->where('id', $this->user_id)->first('user');
        check_is_login();
    }


    public function index()
    {
        $data['user']       = $this->user;
        $data['title']      = 'Category';
        $data['category']   = $this->category->get('category');
        $data['page']       = 'pages/kategori/index';

        $this->view($data);
        
    }

    public function add()
    {
        if (!$_POST) {
            $input = (object) $this->category->getDefaultValues();
        } else {
            $input = (object) $this->input->post(null, true);
        }

        if (!$this->category->validate()) {
            $data['user']        = $this->user;
            $data['input']       = $input;
            $data['title']       = 'Tambah Kategori';
            $data['form_action'] = base_url('category/add');
            $data['page']        = 'pages/kategori/form';

            $this->view($data);
            return;
        }

        if ($this->category->create($input, 'category')) {
            $this->session->set_flashdata('success', 'Data berhasil disimpan!');
        } else {
            $this->session->set_flashdata('success', 'Data berhasil disimpan!');
        }
        redirect(base_url('category/index'));
    }

    public function edit($id)
    {
        $data['content'] = $this->category->where('id', $id)->first('category');
        if (!$data['content']) {
            $this->session->set_flashdata('warning', 'Maaf! Data tidak ditemukan!');
            redirect(base_url('category/index'));
        }

        if (!$_POST) {
            $data['input'] = $data['content'];
        } else {
            $data['input'] = (object) $this->input->post(null, true);
        }

        if (!$this->category->validate()) {
            $data['user']        = $this->user;
            $data['title']       = 'Edit Kategori';
            $data['form_action'] = base_url("category/edit/$id");
            $data['page']        = 'pages/kategori/form';

            $this->view($data);
            return;
        }

        if ($this->category->where('id', $id)->update($data['input'], 'category')) {
            $this->session->set_flashdata('success', 'Data berhasil diperbaharui!');
        } else {
            $this->session->set_flashdata('error', 'Oops! Terjadi suatu kesalahan.');
        }

        redirect(base_url('category/index'));
    }

    public function delete($id)
    {
        if (!$_POST) {
            redirect(base_url('category/index'));
        }

        if (!$this->category->where('id', $id)->first('category')) {
            $this->session->set_flashdata('warning', 'Maaf! Data tidak ditemukan!');
            redirect(base_url('category/index'));
        }

        if ($this->category->where('id', $id)->delete('category')) {
            $this->session->set_flashdata('success', 'Data berhasil diperbaharui!');
        } else {
            $this->session->set_flashdata('error', 'Oops! Terjadi suatu kesalahan.');
        }

        redirect(base_url('category/index'));
    }
}

/* End of file Kategori.php */
