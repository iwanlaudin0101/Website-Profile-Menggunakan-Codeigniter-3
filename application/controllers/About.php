<?php
defined('BASEPATH') or exit('No direct script access allowed');

class About extends MY_Controller{
    private $user;
    private $user_id;

    public function __construct()
    {
        parent::__construct();
        $this->user_id  = $this->session->userdata('id');
        $this->user     = $this->about->where('id', $this->user_id)->first('user');
        check_is_login();
    }

    public function index()
    {
        $data['user']       = $this->user;
        $data['about']    = $this->about->select(
            [
                'id', 'name', 'address', 'profile', 'about_me', 'whatsapp','github','email','image'
            ]
        )
            ->first('about');

        $data['skills'] = $this->about->select(['title','color'])->get('skills');

        $data['title']      = 'About Me';
        $data['page']       = 'pages/about/index';

        $this->view($data);
        return;
    }

    public function edit($id)
    {
        $data['content'] = $this->about->where('id', $id)->first('about');
        
        $input = (object) $this->input->post(null, true);

        if (!empty($_FILES) && $_FILES['image']['name'] !== '') {
			$imageName	= url_title($input->name, '-', true) . '-' . date('YmdHis');
			$upload		= $this->about->uploadImage('image', $imageName);
			if ($upload) {
                if ($data['content']->image !== '') {
                    $this->about->deleteImage($data['content']->image);
                }
				$input->image	= $upload['file_name'];
			} else {
				redirect(base_url('about/index'));
			}
		}

        if ($this->about->where('id', $id)->update($input, 'about')) {
            $this->session->set_flashdata('success', 'Data berhasil diperbaharui!');
        } else {
            $this->session->set_flashdata('error', 'Oops! Terjadi suatu kesalahan.');
        }

        redirect(base_url('about/index'));
    }

    public function aboutme()
    {
        $id = $this->input->post('id', true);

        $data['input'] = [
            'about_me' => $this->input->post('aboutme', true)
        ];

        if ($this->about->where('id', $id)->update($data['input'], 'about')) {
            $this->session->set_flashdata('success', 'Data berhasil diperbaharui!');
        } else {
            $this->session->set_flashdata('error', 'Oops! Terjadi suatu kesalahan.');
        }

        redirect(base_url('about/index'));
    }
}