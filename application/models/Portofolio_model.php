<?php

class Portofolio_model extends MY_Model{
    
    public function getDefaultValues()
    {
        return [
            'slug' => '', 'title' => '', 'id_category' => '', 'description' => '', 'link' => '', 'image' => ''
        ];
    }

    public function getValidationRules()
    {
        $validationRules = [
            [
                'field' => 'slug',
                'label' => 'Slug',
                'rules' => 'trim|required|callback_unique_slug'
            ],
            [
                'field' => 'id_category',
                'label' => 'Category',
                'rules' => 'required'
            ],
            [
                'field' => 'title',
                'label' => 'Title',
                'rules' => 'trim|required'
            ],
            [
                'field' => 'link',
                'label' => 'Link',
                'rules' => 'trim|required'
            ],
            [
                'field' => 'description',
                'label' => 'Description',
                'rules' => 'trim|required'
            ]
        ];

        return $validationRules;
    }

    public function uploadImage($fieldName, $fileName)
    {
        $config	= [
			'upload_path'		=> './images/portofolio',
			'file_name'			=> $fileName,
			'allowed_types'		=> 'jpg|gif|png|jpeg|JPG|PNG',
			'max_size'			=> 1024,
			'max_width'			=> 0,
			'max_height'		=> 0,
			'overwrite'			=> true,
			'file_ext_tolower'	=> true
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
		if (file_exists("./images/portofolio/$fileName")) {
			unlink("./images/portofolio/$fileName");
		}
	}
}