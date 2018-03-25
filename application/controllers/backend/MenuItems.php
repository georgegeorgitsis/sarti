<?php

class MenuItems extends MY_Controller {

    private $languages;
    public function __construct() {
        parent::__construct();
        $this->load->model('menu_model', 'menu');
        $this->load->model('language_model', 'language');
        
        $this->languages = $this->language->getLanguages();
        $this->view_data['languages'] = $this->languages;
    }

    public function index() {
        $banners = $this->banner->getBanners();
        $this->view_data['banners'] = $banners;

        $this->load->admintemplate('backend/banners/index', $this->view_data);
    }

    public function show(){
        $banners = $this->banner->getBanner($this->lang_id);
    }

    public function add(){
        $this->load->admintemplate('backend/banners/create', $this->view_data);
    }

    public function create(){
        $this->form_validation->set_rules('name', 'Name', 'required|trim');
        $this->form_validation->set_rules('url', 'URL', 'required|trim');

        if ($this->form_validation->run()) {
            $banner = array();
            $banner_locale = array();

            foreach ($this->languages as $language) {
                $temp = array();
                $temp['title'] = $this->input->post('title_' . $language['lang_id']);
                $temp['description'] = $this->input->post('description_' . $language['lang_id']);
                $temp['lang_id'] = $language['lang_id'];
                array_push($banner_locale, $temp);
            }

            $banner['name'] = $this->input->post('name');
            $banner['background_color'] = $this->input->post('background_color');
            $banner['link_url'] = $this->input->post('url');
            $banner['link_target'] = $this->input->post('target');

            if ($_FILES['image']['error'] == 0 ) {
                $image_name = strtotime(date('Y-m-d H:i:s')) . "_" . basename($_FILES["image"]["name"]);
                $target_file = $this->upload_dir ."banners/". $image_name;
                $uploadOk = 1;
                $imageFileType = pathinfo($target_file, PATHINFO_EXTENSION);

                if ($_FILES["image"]["size"] > 500000) {
                    $uploadOk = 0;
                }
                if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif" && $imageFileType != "JPG" && $imageFileType != "PNG" && $imageFileType != "JPEG" && $imageFileType != "GIF") {
                    $uploadOk = 0;
                }
                if ($uploadOk != 0) {
                    if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
                        $banner['image_url'] = $image_name;
                    }
                }
            }
            if ($_FILES['icon']['error'] == 0) {
                $image_name = strtotime(date('Y-m-d H:i:s')) . "_" . basename($_FILES["icon"]["name"]);
                $target_file = $this->upload_dir ."banners/". $image_name;
                $uploadOk = 1;
                $imageFileType = pathinfo($target_file, PATHINFO_EXTENSION);

                if ($_FILES["icon"]["size"] > 500000) {
                    $uploadOk = 0;
                }
                if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif" && $imageFileType != "JPG" && $imageFileType != "PNG" && $imageFileType != "JPEG" && $imageFileType != "GIF") {
                    $uploadOk = 0;
                }
                if ($uploadOk != 0) {
                    if (move_uploaded_file($_FILES["icon"]["tmp_name"], $target_file)) {
                        $banner['icon_url'] = $image_name;
                    }
                }
            }
            $active = $this->input->post('active');
            if(isset($active) && $active == "on"){
                $banner['active'] = true;
            }

            $id = $this->banner->addBanner($banner);
            if ($id && is_numeric($id)) {
                foreach ($banner_locale as $b_l_key => $b_l) {
                    $banner_locale[$b_l_key]['banner_id'] = $id;
                    $this->banner->addBannerLocale($banner_locale[$b_l_key]);
                }
                $this->session->set_flashdata('message', 'Banner Created Succesfully');
            } else {
                $this->session->set_flashdata('error', 'Creation problem');
            }
            redirect($this->admin_url . 'banners/edit/'. $id);
        }
    }

    public function edit(){
        $id = $this->uri->segment(4);
        $banner = $this->banner->getBanner($id);
        $banner['locales'] = $this->banner->getBannerLocales($id);
        
        $this->view_data['banner'] = $banner;
        $this->load->admintemplate('backend/banners/edit', $this->view_data);
    }

    public function update(){
        $id = $this->uri->segment(4);

        $this->form_validation->set_rules('name', 'Name', 'required|trim');
        $this->form_validation->set_rules('url', 'URL', 'required|trim');

        if ($this->form_validation->run()) {
            $banner = array();
            $banner['id'] = $id;
            $banner_locale = array();

            foreach ($this->languages as $language) {
                $temp = array();
                $temp['banner_id'] = $id;
                $temp['title'] = $this->input->post('title_' . $language['lang_id']);
                $temp['description'] = $this->input->post('description_' . $language['lang_id']);
                $temp['lang_id'] = $language['lang_id'];
                array_push($banner_locale, $temp);
            }

            $banner['name'] = $this->input->post('name');
            $banner['background_color'] = $this->input->post('background_color');
            $banner['link_url'] = $this->input->post('url');
            $banner['link_target'] = $this->input->post('target');

            $ex_banner = $this->banner->getBanner($id);
            if ($_FILES['image']['error'] == 0 ) {
                unlink($this->upload_dir . $ex_banner['image_url']);
                $image_name = strtotime(date('Y-m-d H:i:s')) . "_" . basename($_FILES["image"]["name"]);
                $target_file = $this->upload_dir ."banners/". $image_name;
                $uploadOk = 1;
                $imageFileType = pathinfo($target_file, PATHINFO_EXTENSION);

                if ($_FILES["image"]["size"] > 500000) {
                    $uploadOk = 0;
                }
                if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif" && $imageFileType != "JPG" && $imageFileType != "PNG" && $imageFileType != "JPEG" && $imageFileType != "GIF") {
                    $uploadOk = 0;
                }
                if ($uploadOk != 0) {
                    if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
                        $banner['image_url'] = $image_name;
                    }
                }
            }
            if ($_FILES['icon']['error'] == 0) {
                unlink($this->upload_dir . $ex_banner['icon_url']);
                $image_name = strtotime(date('Y-m-d H:i:s')) . "_" . basename($_FILES["icon"]["name"]);
                $target_file = $this->upload_dir ."banners/". $image_name;
                $uploadOk = 1;
                $imageFileType = pathinfo($target_file, PATHINFO_EXTENSION);

                if ($_FILES["icon"]["size"] > 500000) {
                    $uploadOk = 0;
                }
                if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif" && $imageFileType != "JPG" && $imageFileType != "PNG" && $imageFileType != "JPEG" && $imageFileType != "GIF") {
                    $uploadOk = 0;
                }
                if ($uploadOk != 0) {
                    if (move_uploaded_file($_FILES["icon"]["tmp_name"], $target_file)) {
                        $banner['icon_url'] = $image_name;
                    }
                }
            }
            $active = $this->input->post('active');
            if(isset($active) && $active == "on"){
                $banner['active'] = true;
            }

            $this->banner->editBanner($banner);
            if ($id && is_numeric($id)) {
                foreach ($banner_locale as $b_l_key => $b_l) {
                    $ex_locale = $this->banner->getBannerLocaleByBannerAndLanguage($id, $b_l['lang_id']);
                    $banner_locale[$b_l_key]['id'] = $ex_locale['id'];
                    $this->banner->editBannerLocale($banner_locale[$b_l_key]);
                }
                $this->session->set_flashdata('message', 'Banner Updated Succesfully');
            } else {
                $this->session->set_flashdata('error', 'Update problem');
            }
            redirect($this->admin_url . 'banners/edit/'. $id);
        }

    }

    public function delete(){
        $id = $this->uri->segment(4);

        if ($id && is_numeric($id)) {
            if ($this->banner->deleteBanner($id) && $this->banner->deleteBannerLocalesForBanner($id)) {
                $this->session->set_flashdata('message', 'Banner Deleted');
            } else {
                $this->session->set_flashdata('error', 'Banner Deletion Problem');
            }
        } else {
            $this->session->set_flashdata('error', 'Banner Deletion Problem');
        }
        redirect($this->admin_url . 'banners');
    }
}
