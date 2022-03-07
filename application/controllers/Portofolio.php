<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Portofolio extends MY_Controller{

    private $user;
    private $user_id;

    public function __construct()
    {
        parent::__construct();
        $this->user_id  = $this->session->userdata('id');
        $this->user     = $this->portofolio->where('id', $this->user_id)->first('user');
        check_is_login();
    }

    public function index()
    {
        $data = [
            'user' => $this->user,
            'title'=> 'Portofolio Me',
            'page' => 'pages/portofolio/index'
        ];

        $data['content']    = $this->portofolio->select(
            [
                'portofolio.id','portofolio.slug', 'portofolio.title', 'portofolio.description', 'category.title AS category_title', 'portofolio.date'
            ]
        )
            ->join('portofolio', 'category')
            ->orderBy('id', 'desc')
            ->get('portofolio');

        $this->view($data);
        return;
    }

    public function add()
    {
        if (!$_POST) {
            $input = (object) $this->portofolio->getDefaultValues();
        } else {
            $input = (object) $this->input->post(null, true);
        }
        
        if (!empty($_FILES) && $_FILES['image']['name'] !== '') {
            $imageName	= url_title($input->title, '-', true) . '-' . date('YmdHis');
			$upload		= $this->portofolio->uploadImage('image', $imageName);
			if ($upload) {
				$input->image	= $upload['file_name'];
			} else {
				redirect(base_url('portofolio/add'));
			}
        }

        if (!$this->portofolio->validate()) {
            $data = [
                'user'      => $this->user,
                'category'  => $this->portofolio->get('category'),
                'input'     => $input,
                'title'     => 'Add Portofolio',
                'form_action'=> base_url('portofolio/add'),
                'page'      => 'pages/portofolio/form'
            ];

            $this->view($data);
            return;
        }

        if ($this->portofolio->create($input, 'portofolio')) {
            $this->session->set_flashdata('success', 'Data berhasil disimpan!');
        } else {
            $this->session->set_flashdata('error', 'Oops! Terjadi suatu kesalahan');
        }

        redirect(base_url('portofolio'));
    }

    public function edit($slug)
    {
        $data['content'] = $this->portofolio->where('slug', $slug)->first('portofolio');

		if (!$data['content']) {
			$this->session->set_flashdata('warning', 'Maaf! Data tidak ditemukan!');
			redirect(base_url('portofolio'));
		}

        if (!$_POST) {
            $data['input'] = (object) $data['content'];
        } else {
            $data['input'] = (object) $this->input->post(null, true);
        }

        if (!empty($_FILES) && $_FILES['image']['name'] !== '') {
            $imageName	= url_title($data['input']->title, '-', true) . '-' . date('YmdHis');
			$upload		= $this->portofolio->uploadImage('image', $imageName);
			if ($upload) {
                if ($data['content']->image !== '') {
                    $this->portofolio->deleteImage($data['content']->image);
                }
				$data['input']->image	= $upload['file_name'];
			} else {
				redirect(base_url('portofolio/edit/'.$slug));
			}
        }

        if (!$this->portofolio->validate()) {
            $data['user']       = $this->user;
            $data['category']   = $this->portofolio->get('category');
            $data['title']      = 'Edit Portofolio';
            $data['form_action']= base_url('portofolio/edit/'.$slug);
            $data['page']       = 'pages/portofolio/form';

            $this->view($data);
            return;
        }

        if ($this->portofolio->where('slug', $slug)->update($data['input'], 'portofolio')) {
            $this->session->set_flashdata('success', 'Data berhasil diubah!');
        } else {
            $this->session->set_flashdata('error', 'Data gagal diubah!');
        }
        redirect(base_url('portofolio/index'));
    }

    public function delete($slug)
    {
        if (!$_POST) {
            redirect(base_url('portofolio/index'));
        }

        $portofolio = $this->portofolio->where('slug', $slug)->first('portofolio');

        if (!$portofolio) {
            $this->session->set_flashdata('warning', 'Maaf! Data tidak ditemukan!');
            redirect(base_url('portofolio/index'));
        }

        if ($this->portofolio->where('slug', $slug)->delete('portofolio')) {
            $this->portofolio->deleteImage($portofolio->image);
            $this->session->set_flashdata('success', 'Data sudah berhasil dihapus!');
		} else {
			$this->session->set_flashdata('error', 'Oops! Terjadi suatu kesalahan!');
		}

        redirect(base_url('portofolio/index'));
    }

    public function unique_slug(){
        $slug   = $this->input->post('slug');
        $id     = $this->input->post('id');
        $portofolio = $this->portofolio->where('slug', $slug)->first('event');

        if ($portofolio) {
            if ($id == $portofolio->id) {
                return true;
            }
            $this->load->library('form_validation');
            $this->form_validation->set_message('unique_slug', '%s sudah digunakan!');
            return false;
        }

        return true;
    }

    public function image_required()
	{
		if (empty($_FILES) || $_FILES['image']['name'] === '') {
			$this->session->set_flashdata('image_error', 'Bukti transfer tidak boleh kosong!');
			return false;
		}
		return true;
	}
}
