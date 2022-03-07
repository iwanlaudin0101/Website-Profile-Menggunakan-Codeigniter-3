<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Blog extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $data['title'] = 'Iwan La Udin';

        $data['about']    = $this->blog->select(
            [
                'id', 'name', 'address', 'profile', 'about_me', 'whatsapp','github','email','image'
            ]
        )
            ->first('about');

        $data['skills'] = $this->blog->select(['title','color'])->get('skills');
        $data['event'] = (object) $this->blog->select(
            [
                'slug','title', 'description', 'organizer', 'date' ,'image' 
            ]
        )
            ->orderBy('id', 'desc')
            ->get('event');
            
        $data['portofolio']    = (object) $this->blog->select(
            [
                'portofolio.id','portofolio.slug', 'portofolio.title', 'portofolio.description', 'portofolio.link', 'category.title AS category_title', 'portofolio.date', 'portofolio.image'
            ]
        )
            ->join('portofolio', 'category')
            ->orderBy('id', 'desc')
            ->get('portofolio');
        
        $this->views($data);
        return;
    }
}

/* End of file Blog.php */
