<?php

class Assets extends CI_Controller {


    public function __construct() {
        parent::__construct();
        $this->load->model('banner_model', 'banner');
    }


    public function get_active_banners(){
        $limit = $this->input->get('limit');
        $lang = $this->input->get('lang');

        $banners = $this->banner->getActiveBanners($limit, $lang);
        echo json_encode($banners);
    }

    public function getHeader(){
        $headerView = $this->load->view('frontend/shared/header', null, TRUE);
        echo $headerView;
    }
    
    public function getFooter(){
        $footerView = $this->load->view('frontend/shared/footer', null, TRUE);
        echo $footerView;
    }
}

