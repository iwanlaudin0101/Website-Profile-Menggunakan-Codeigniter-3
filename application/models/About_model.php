<?php

class About_model extends MY_Model{

    public function uploadImage($fieldName, $fileName)
    {
        $config    = [
            'upload_path'       => './images/about',
            'file_name'         => $fileName,
            'allowed_types'     => 'jpg|gif|png|jpeg|JPG|PNG',
            'max_size'          => 2048,
            'max_width'         => 0,
            'max_height'        => 0,
            'overwrite'         => true,
            'file_ext_tolower'  => true
        ];

        $this->load->library('upload', $config);
        if ($this->upload->do_upload($fieldName)) {
            return $this->upload->data();
        } else {
            $this->session->set_flashdata('image_error', $this->upload->display_errors('', ''));
            return false;
        }
    }

    public function deleteImage($fileName)
    {
        if (file_exists("./images/about/$fileName")) {
            unlink("./images/about/$fileName");
        }
    }
}