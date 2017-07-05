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

    public function __construct() {
        parent::__construct();
        $this->load->model('hotel_model');
    }

    public function index() {
        $this->paginateHotels();

        $hotels = $this->hotel_model->getFHotels($this->conf["per_page"], $this->page, $this->lang_id);
        $hotels = $this->parseHotels($hotels);

        $this->view_data['hotels'] = $hotels;
        $this->load->template('frontend/hotels_view', $this->view_data);
    }

    public function searchHotels() {
        $packageType = $this->uri->segment(3);
        $checkin = $this->input->get('checkin');
        $checkout = $this->input->get('checkin');
        $adults = $this->input->get('adults');

        $this->paginateHotels();
        $hotels = $this->hotel_model->getFHotelsPerPackage($checkin, $checkout, $adults, $packageType, $this->conf['per_page'], $this->page, $this->lang_id);
        $hotels = $this->parseHotels($hotels);

        $this->view_data['hotels'] = $hotels;
        $this->load->template('frontend/hotels_view', $this->view_data);
    }

    protected function parseHotels($hotels) {
        if (isset($hotels) && !empty($hotels)) {
            foreach ($hotels as $hotel_key => $hotel_val) {
                $hotels[$hotel_key]['thumb'] = $this->hotel_model->getHotelThumb($hotel_val['hotel_id']);
            }
        }
        return $hotels;
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
