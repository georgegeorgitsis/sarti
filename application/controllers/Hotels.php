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

    public function __construct() {
        parent::__construct();
        $this->load->model('hotel_model');
    }

    public function index() {
        $hotelsCount = $this->hotel_model->getFHotelsCount();
        $this->load->library('pagination');
        $config['base_url'] = base_url('hotels');
        $config['total_rows'] = $hotelsCount['count'];
        $config['per_page'] = 10;
        $config["uri_segment"] = 3;
        $this->pagination->initialize($config);

        $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;

        $hotels = $this->hotel_model->getFHotels($config["per_page"], $page);

        if (isset($hotels) && !empty($hotels)) {
            foreach ($hotels as $hotel_key => $hotel_val) {
                $hotels[$hotel_key]['thumb'] = $this->hotel_model->getHotelThumb($hotel_val['hotel_id']);
            }
        }

        $this->view_data['links'] = $this->pagination->create_links();
        $this->view_data['hotels'] = $hotels;

        $this->load->template('frontend/hotels_view', $this->view_data);
    }

    public function searchAllotment() {
        $checkin = $this->input->get('checkin');
        $checkout = $this->input->get('checkin');
        $adults = $this->input->get('adults');
    }

}
