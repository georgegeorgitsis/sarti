<?php

if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class MY_F_Controller extends CI_Controller {

    protected $view_data;
    protected $language;
    protected $lang_id;
    protected $lang_name;
    protected $lang_icon;
    protected $all_langs;
    protected $styles = [];
    protected $scripts = [];

    function __construct() {
        parent::__construct();
        $this->load->model('language_model');
        $this->load->model('location_model');
        $this->load->model('room_model');
        $this->load->model('board_model');
        $this->load->model('facility_model');
        $this->load->model('package_model');
        $this->handleLang();
        $this->getLocations();
        $this->getRoomTypes();
        $this->getBoards();
        $this->getFacilities();
        // $this->get7DaysPeriods();
        // $this->get10DaysPeriods();
        $this->getMinMaxAdults7Days();
        $this->getMinMaxAdults10Days();
        $this->getMinMaxAdultsAllotment();
        
        
        // $this->loadSidebarStylesheet();
        // $this->loadScripts();
    }

    public function handleLang() {
        $this->all_langs = $this->language_model->getLanguages();
        $chose_lang = $this->session->userdata('language');
        $post_lang = $this->input->post('language');

        if (!empty($post_lang)) {
            $this->language = $post_lang;
        } elseif (!empty($chose_lang)) {
            $this->language = $this->session->userdata('language');
        } else {
            $this->language = "en";
            $this->session->set_userdata('language', 'en');
        }
        $this->view_data['lang'] = $this->language;

        $language = $this->language_model->getLanguagePerAbbr($this->language);
        //if lang is empty redirect and set the default 'gr' lang
        if (!$language)
            redirect(base_url('hotels'));

        $this->lang_id = $language['lang_id'];
        $this->lang_name = $language['lang_name'];
        $this->lang_icon = $language['lang_icon'];

        $this->load->helper('language');
        if ($this->view_data['lang'] == 'gr') {
            $this->lang->load('site', 'greek');
            $this->view_data['abbreviation'] = $this->language;
            $this->view_data['lang_png'] = $this->lang_icon;
            $this->view_data['language_name'] = $this->lang_name;
        } elseif ($this->view_data['lang'] == 'en') {
            $this->lang->load('site', 'english');
            $this->view_data['abbreviation'] = $this->language;
            $this->view_data['lang_png'] = $this->lang_icon;
            $this->view_data['language_name'] = $this->lang_name;
        }
        $this->view_data['all_langs'] = $this->all_langs;
    }

    protected function loadScripts(){
        $this->view_data['script_files'] = $this->scripts ;
    }

    protected function loadStyles(){
        $this->view_data['css_files'] = $this->styles ;
    }

    protected function getLocations() {
        $locations = $this->location_model->getFLocations($this->lang_id);
        $this->view_data['locations'] = $locations;
    }

    protected function getRoomTypes() {
        $roomTypes = $this->room_model->getRoomTypes();
        $room_types_arr = [];
        foreach($roomTypes as $room_type){
            $first_word = explode(' ',trim($room_type['room_type_name']));
            if(!in_array($first_word[0], $room_types_arr)){
                array_push($room_types_arr, $first_word[0]);
            }
        }
        $this->view_data['room_types'] = $room_types_arr;
    }

    protected function getBoards() {
        $boards = $this->board_model->getBoards();
        $this->view_data['boards'] = $boards;
    }

    protected function getFacilities() {
        $facilities = $this->facility_model->getFFacilities($this->lang_id);
        $this->view_data['facilities'] = $facilities;
    }

    protected function get7DaysPeriods() {
        $package_7_days = $this->package_model->getF7dayspackages();
        $this->view_data['packages_7_days'] = $package_7_days;
    }

     protected function get10DaysPeriods() {
        $package_10_days = $this->package_model->getF10dayspackages();
        $this->view_data['packages_10_days'] = $package_10_days;

    }
    
    protected function getMinMaxAdultsAllotment() {
        $minMaxAdultsAllotment = $this->package_model->getMinMaxAdultsAllotment();
        $this->view_data['minMaxAllotment'] = $minMaxAdultsAllotment;
    }
    
    protected function getMinMaxAdults7Days() {
        $minMaxAdults7Days = $this->package_model->getFMinMaxAdults7Days();
        $this->view_data['minMax7Days'] = $minMaxAdults7Days;
    }
    
    protected function getMinMaxAdults10Days() {
        $minMaxAdults10Days = $this->package_model->getFMinMaxAdults10Days();
        $this->view_data['minMax10Days'] = $minMaxAdults10Days;
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