<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Category_model extends MY_Model
{
    public function getDefaultValues()
    {
        return [
            'title' => '',
            'id' => ''
        ];
    }

    public function getValidationRules()
    {
        $validationRules = [
            [
                'field' => 'title',
                'label' => 'Title',
                'rules' => 'required'
            ]
        ];

        return $validationRules;
    }
}

/* End of file Kategori_model.php */
