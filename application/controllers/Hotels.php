<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of hotels
 *
 * @author George-pc
 */
class Hotels extends MY_F_Controller {

    protected $conf;
    protected $page;
    protected $hotels;

    public function __construct() {
        parent::__construct();
        $this->load->model('hotel_model');
    }

    public function index() {
        $this->getHotels();
        $this->load->template('frontend/hotels_view', $this->view_data);
    }

    public function searchHotels() {
        $this->view_data['is_search'] = 1;
        $packageType = $this->uri->segment(3);
        $checkin = $this->input->get('checkin');
        $checkout = $this->input->get('checkin');
        $adults = $this->input->get('adults');

        $this->getHotels($checkin, $checkout, $adults, $packageType);
        $this->load->template('frontend/hotels_view', $this->view_data);
    }

    protected function getHotels($checkin = null, $checkout = null, $adults = null, $packageType = null) {
        $this->paginateHotels();
        $this->hotels = $this->hotel_model->getFHotels($checkin, $checkout, $adults, $packageType, $this->conf['per_page'], $this->page, $this->lang_id);
        $this->parseHotels();
        $this->view_data['hotels'] = $this->hotels;
    }

    protected function parseHotels() {
        if (isset($this->hotels) && !empty($this->hotels)) {
            foreach ($this->hotels as $hotel_key => $hotel_val) {
                $this->hotels[$hotel_key]['thumb'] = $this->hotel_model->getHotelThumb($hotel_val['hotel_id']);
                $this->hotels[$hotel_key]['main_facilities'] = $this->hotel_model->getFHotelMainFacilities($hotel_val['hotel_id'], $this->lang_id);
            }
        }
    }
    
    protected function getRooms() {
        
    }

    protected function paginateHotels() {
        $hotelsCount = $this->hotel_model->getFHotelsCount();
        $this->load->library('pagination');
        $this->conf['base_url'] = base_url('hotels');
        $this->conf['total_rows'] = $hotelsCount['count'];
        $this->conf['per_page'] = 10;
        $this->conf["uri_segment"] = 3;
        $this->pagination->initialize($this->conf);
        $this->page = ($this->uri->segment(4)) ? $this->uri->segment(4) : 0;
        $this->view_data['links'] = $this->pagination->create_links();
    }

}
