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
        $hotels = $this->hotel_model->getHotels();

        if (isset($hotels) && !empty($hotels)) {
            foreach ($hotels as $hotel_key => $hotel_val) {
                $hotels[$hotel_key]['thumb'] = $this->hotel_model->getHotelThumb($hotel_val['hotel_id']);
            }
        }

        $this->view_data['hotels'] = $hotels;

        $this->load->template('frontend/hotels_view', $this->view_data);
    }

}
