<?php

if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class MY_F_Controller extends CI_Controller {

    protected $view_data;
    protected $language;
    protected $lang_id;

    function __construct() {
        parent::__construct();
        $this->handleLang();
    }

    public function handleLang() {
        $chose_lang = $this->session->userdata('language');
        $post_lang = $this->input->post('language');

        if (!empty($post_lang)) {
            $this->language = $post_lang;
        } elseif (!empty($chose_lang)) {
            $this->language = $this->session->userdata('language');
        } else {
            $this->language = "gr";
            $this->session->set_userdata('language', 'gr');
        }
        $this->view_data['lang'] = $this->language;

        $this->load->model('language_model');
        $language = $this->language_model->getLanguagePerAbbr($this->language);
        //if lang is empty redirect and set the default 'gr' lang
        if (!$language)
            redirect(base_url('hotels'));

        $this->lang_id = $language['lang_id'];

        $this->load->helper('language');
        if ($this->view_data['lang'] == 'gr') {
            $this->lang->load('site', 'greek');
            $this->view_data['abbreviation'] = 'gr';
            $this->view_data['lang_png'] = 'gr.png';
            $this->view_data['language_name'] = "Ελληνικά";
        } elseif ($this->view_data['lang'] == 'en') {
            $this->lang->load('site', 'english');
            $this->view_data['abbreviation'] = 'en';
            $this->view_data['lang_png'] = 'en.png';
            $this->view_data['language_name'] = "English";
        }
    }

}

class MY_Controller extends CI_Controller {

    protected $view_data;
    protected $hotel_info;
    protected $user;
    protected $user_groups;
    protected $admin_url;
    protected $upload_dir;

    function __construct() {
        parent::__construct();

        if (!$this->ion_auth->logged_in()) {
            redirect(base_url('backend/auth/login'));
        }

        $this->admin_url = $this->config->item('admin_url');
        $this->view_data['admin_url'] = $this->admin_url;
        $this->upload_dir = $this->config->item('upload_dir');
        $this->view_data['upload_dir'] = $this->upload_dir;
        $this->view_data['controller'] = $this->uri->segment(2);
    }

}

?>