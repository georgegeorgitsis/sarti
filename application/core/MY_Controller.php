<?php

if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
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

class MY_F_Controller extends CI_Controller {

    protected $view_data;
    protected $hotel_info;
    protected $credentials;

    function __construct() {
        parent::__construct();


        $chose_lang = $this->session->userdata('language');
        $post_lang = $this->input->post('language');

        if (!empty($post_lang)) {
            $this->view_data['lang'] = $post_lang;
        } elseif (!empty($chose_lang)) {
            $this->view_data['lang'] = $this->session->userdata('language');
        } else {
            $this->session->set_userdata('language', 'gr');
            $this->view_data['lang'] = 'gr';
            $this->view_data['abbreviation'] = 'gr';
            $this->view_data['lang_png'] = 'gr.png';
            $this->view_data['language_name'] = "Ελληνικά";
        }

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
        } elseif ($this->view_data['lang'] == 'it') {
            $this->lang->load('site', 'italian');
            $this->view_data['abbreviation'] = 'it';
            $this->view_data['lang_png'] = 'it.png';
            $this->view_data['language_name'] = "Italian";
        } elseif ($this->view_data['lang'] == 'fr') {
            $this->lang->load('site', 'french');
            $this->view_data['abbreviation'] = 'fr';
            $this->view_data['lang_png'] = 'fr.png';
            $this->view_data['language_name'] = "French";
        } elseif ($this->view_data['lang'] == 'es') {
            $this->lang->load('site', 'spanish');
            $this->view_data['abbreviation'] = 'es';
            $this->view_data['lang_png'] = 'es.png';
            $this->view_data['language_name'] = "Spanish";
        } elseif ($this->view_data['lang'] == 'de') {
            $this->lang->load('site', 'german');
            $this->view_data['abbreviation'] = 'de';
            $this->view_data['lang_png'] = 'de.png';
            $this->view_data['language_name'] = "German";
        } elseif ($this->view_data['lang'] == 'nl') {
            $this->lang->load('site', 'dutch');
            $this->view_data['abbreviation'] = 'nl';
            $this->view_data['lang_png'] = 'sr.png';
            $this->view_data['language_name'] = "Dutch";
        }

        $this->credentials = $this->availability_search_form_values();
    }

    public function availability_search_form_values() {
        $checkin = $this->input->post('checkin');
        $checkout = $this->input->post('checkout');
        $adults = $this->input->post('adults');
        $children = $this->input->post('children');
        $coupon = $this->input->post('coupon');

        if ($checkin != '' && $checkout != '') {
            $credentials['checkin'] = $checkin;
            $credentials['checkout'] = $checkout;
        } elseif (!empty($this->session->credentials->checkin) && !empty($this->session->credentials->checkout)) {
            $credentials['checkin'] = $this->session->dates->checkin;
            $credentials['checkout'] = $this->session->dates->checkout;
        } else {
            $today = date('d-m-Y');
            $tomorrow = date('d-m-Y', strtotime('+1 day', strtotime($today)));
            $credentials['checkin'] = $today;
            $credentials['checkout'] = $tomorrow;
        }
        $nights = floor((strtotime($credentials['checkout']) - strtotime($credentials['checkin'])) / (60 * 60 * 24));
        $credentials['nights'] = $nights;
        if ($adults != '') {
            $credentials['adults'] = $adults;
        } elseif (!empty($this->session->credentials->adults)) {
            $credentials['adults'] = $this->session->credentials->adults;
        } else {
            $credentials['adults'] = 2;
        }
        if ($children != '') {
            $credentials['children'] = $children;
        } elseif (!empty($this->session->credentials->children)) {
            $credentials['children'] = $this->session->credentials->children;
        } else {
            $credentials['children'] = 0;
        }
        if ($coupon != '') {
            $credentials['coupon'] = $coupon;
        } elseif (!empty($this->session->credentials->coupon)) {
            $credentials['coupon'] = $this->session->credentials->coupon;
        } else {
            $credentials['coupon'] = '';
        }
        return $credentials;
    }

}

class Backoffice_Controller extends CI_Controller {

    protected $view_data;
    protected $hotel_info;

    function __construct() {

        parent::__construct();
    }

}

?>