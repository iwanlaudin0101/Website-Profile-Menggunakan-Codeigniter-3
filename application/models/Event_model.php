<?php

class Event_model extends MY_Model{

    public function getDefaultValues()
    {
        return ['slug' => '', 'title' => '', 'description' => '', 'organizer' => '', 'image' => ''];
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
                'field' => 'title',
                'label' => 'Title',
                'rules' => 'trim|required'
            ],
            [
                'field' => 'description',
                'label' => 'Description',
                'rules' => 'trim|required',
            ],
            [
                'field' => 'organizer',
                'label' => 'Organizer',
                'rules' => 'trim|required'
            ]
        ];

        return $validationRules;
    }

    public function uploadImage($fieldName, $fileName)
	{
		$config	= [
			'upload_path'		=> './images/event',
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
		if (file_exists("./images/event/$fileName")) {
			unlink("./images/event/$fileName");
		}
	}
    
}