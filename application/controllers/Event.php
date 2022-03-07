<?php

class Event extends MY_Controller{

    private $user;
    private $user_id;

    public function __construct()
    {
        parent::__construct();
        $this->user_id  = $this->session->userdata('id');
        $this->user     = $this->event->where('id', $this->user_id)->first('user');
        check_is_login();
    }

    public function index()
    {
        $data['user']       = $this->user;
        $data['content']    = $this->event->select(['slug','title','description', 'organizer', 'date', 'image'])->get('event');

        $data['title']      = 'My Event';
        $data['page']       = 'pages/event/index';

        $this->view($data);
        return;
    }

    public function add()
    {
        if (!$_POST) {
            $input = (object) $this->event->getDefaultValues();
        } else {
            $input = (object) $this->input->post(null, true);
            // $input->tanggal     = time();
        }

        if (!empty($_FILES) && $_FILES['image']['name'] !== '') {
			$imageName	= url_title($input->title, '-', true) . '-' . date('YmdHis');
			$upload		= $this->event->uploadImage('image', $imageName);
			if ($upload) {
				$input->image	= $upload['file_name'];
			} else {
				redirect(base_url('event/add'));
			}
		} else {
            $input->image = 'default.jpg';
        }

        if (!$this->event->validate()) {
            $data['title'] = 'Add Event';
            $data['user'] = $this->user;
            $data['input'] = $input;
            $data['form_action'] = base_url('event/add');
            $data['page']  = 'pages/event/form';

            $this->view($data);
            return;
        }

        if ($this->event->create($input, 'event')) {
            $this->session->set_flashdata('success', 'Data berhasil disimpan!');
        } else {
            $this->session->set_flashdata('error', 'Oops! Terjadi suatu kesalahan');
        }

        redirect(base_url('event'));
    }

    public function edit($slug)
    {
        $data['content'] = $this->event->where('slug', $slug)->first('event');

		if (!$data['content']) {
			$this->session->set_flashdata('warning', 'Maaf! Data tidak ditemukan!');
			redirect(base_url('event'));
		}

        if (!$_POST) {
            $data['input'] = (object) $data['content'];
        } else {
            $data['input'] = (object) $this->input->post(null, true);
        }

        if (!empty($_FILES) && $_FILES['image']['name'] !== '') {
            $imageName	= url_title($data['input']->title, '-', true) . '-' . date('YmdHis');
			$upload		= $this->event->uploadImage('image', $imageName);
			if ($upload) {
                if ($data['content']->image !== '') {
                    $this->event->deleteImage($data['content']->image);
                }
				$data['input']->image	= $upload['file_name'];
			} else {
				redirect(base_url('event/edit/'.$slug));
			}
        }

        if (!$this->event->validate()) {
            $data['user']       = $this->user;
            $data['title']      = 'Edit Event';
            $data['form_action'] = base_url('event/edit/'.$slug);
            $data['page']       = 'pages/event/form';

            $this->view($data);
            return;
        }

        if ($this->event->where('slug', $slug)->update($data['input'], 'event')) {
            $this->session->set_flashdata('success', 'Data berhasil diubah!');
        } else {
            $this->session->set_flashdata('error', 'Data gagal diubah!');
        }
        redirect(base_url('event/index'));
    }

    public function delete($slug)
    {
        if (!$_POST) {
            redirect(base_url('event/index'));
        }

        $event = $this->event->where('slug', $slug)->first('event');

        if (!$event) {
            $this->session->set_flashdata('warning', 'Maaf! Data tidak ditemukan!');
            redirect(base_url('event/index'));
        }

        if ($this->event->where('slug', $slug)->delete('event')) {
            $this->event->deleteImage($event->image);
            $this->session->set_flashdata('success', 'Data sudah berhasil dihapus!');
		} else {
			$this->session->set_flashdata('error', 'Oops! Terjadi suatu kesalahan!');
		}

        redirect(base_url('event/index'));
    }

    public function unique_slug(){
        $slug   = $this->input->post('slug');
        $id     = $this->input->post('id');
        $event = $this->event->where('slug', $slug)->first('event');

        if ($event) {
            if ($id == $event->id) {
                return true;
            }
            $this->load->library('form_validation');
            $this->form_validation->set_message('unique_slug', '%s sudah digunakan!');
            return false;
        }

        return true;
    }
}