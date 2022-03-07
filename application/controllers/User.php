<?php

defined('BASEPATH') or exit('No direct script access allowed');

class User extends MY_Controller
{
    private $users;
    private $user_id;

    public function __construct()
    {
        parent::__construct();
        $this->user_id  = $this->session->userdata('id');
        $this->users    = $this->user->where('id', $this->user_id)->first('user');
        check_is_login();
        check_user_access();
    }

    public function index()
    {
        $data['user']       = $this->users;
        $data['content']    = $this->user->get('user');
        $data['title']      = 'Data User';
        $data['page']       = 'pages/user/index';

        $this->view($data);
    }

    public function add()
    {
        if (!$_POST) {
            $input = (object) $this->user->getDefaultValues();
        } else {
            $input = (object) $this->input->post(null, true);

            $this->load->library('form_validation');
            $this->form_validation->set_rules('password', 'Password', 'required|min_length[5]');
            $input->password = password_hash($input->password, PASSWORD_DEFAULT);
        }
        // var_dump($input);die;

        if (!empty($_FILES) && $_FILES['image']['name'] !== '') {
            $imageName = url_title('user gambar') . '-' . date('YmdHis');
            $upload    = $this->user->uploadImage('image', $imageName);
            if ($upload) {
                $input->image = $upload['file_name'];
            } else {
                redirect(base_url('user/add'));
            }
        }

        if (!$this->user->validate()) {
            $data['user']       = $this->users;
            $data['input']      = $input;
            $data['title']      = 'Tambah User';
            $data['form_action'] = base_url('user/add');
            $data['page']       = 'pages/user/form';

            $this->view($data);
            return;
        }

        if ($this->user->create($input, 'user')) {
            $this->session->set_flashdata('success', 'Data berhasil disimpan!');
        } else {
            $this->session->set_flashdata('error', 'Data gagal disimpan!');
        }
        redirect(base_url('user/index'));
    }

    public function edit($id)
    {
        $data['content'] = $this->user->where('id', $id)->first('user');
        if (!$data['content']) {
            $this->session->set_flashdata('warning', 'Maaf! Data tidak ditemukan!');
            redirect(base_url('user/index'));
        }

        if (!$_POST) {
            $data['input'] = $data['content'];
        } else {
            $data['input'] = (object) $this->input->post(null, true);

            if ($data['input']->password !== '') {
                $data['input']->password = password_hash($data['input']->password, PASSWORD_DEFAULT);
            } else {
                $data['input']->password = $data['content']->password;
            }
        }

        if (!empty($_FILES) && $_FILES['image']['name'] !== '') {
            $imageName = url_title('berita gambar') . '-' . date('YmdHis');
            $upload    = $this->user->uploadImage('image', $imageName);
            if ($upload) {
                if ($data['content']->image !== '' && 'default.jpg') {
					$this->user->deleteImage($data['content']->image);
				}
                $data['input']->image = $upload['file_name'];
            } else {
                redirect(base_url('user/edit/'.$id));
            }
        }

        if (!$this->user->validate()) {
            $data['user']       = $this->users;
            $data['title']      = 'Edit User';
            $data['form_action'] = base_url('user/edit/') . $id;
            $data['page']       = 'pages/user/form';

            $this->view($data);
            return;
        }

        if ($this->user->where('id', $id)->update($data['input'], 'user')) {
            $this->session->set_flashdata('success', 'Data berhasil diubah!');
        } else {
            $this->session->set_flashdata('error', 'Data gagal diubah!');
        }
        redirect(base_url('user/index'));
    }

    public function delete($id)
    {
        if (!$_POST) {
            redirect(base_url('user/index'));
        }

        $user = $this->user->where('id', $id)->first('user');
        if (!$user) {
            $this->session->set_flashdata('warning', 'Maaf, data tidak dapat ditemukan');
            redirect(base_url('user'));
        }

        if ($this->user->where('id', $id)->delete('user')) {
            $this->user->deleteImage($user->image);
            $this->session->set_flashdata('success', 'Data berhasil dihapus!');
        } else {
            $this->session->set_flashdata('error', 'Data gagal dihapus!');
        }

        redirect(base_url('user/index'));
    }

    public function unique_email()
    {
        $email    = $this->input->post('email');
        $id       = $this->input->post('id');
        $user     = $this->user->where('email', $email)->first('user');

        if ($user) {
            if ($id == $user->id) {
                return true;
            }
            $this->load->library('form_validation');
            $this->form_validation->set_message('unique_email', '%s sudah digunakan!');
            return false;
        }
        return true;
    }
}

/* End of file User.php */
