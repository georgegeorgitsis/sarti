<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Hotel
 *
 * @author George-pc
 */
class Hotel extends MY_F_Controller {

    protected $hotel_id;

    public function __construct() {
        parent::__construct();
        $this->load->model('hotel_model');
        $this->hotel_id = $this->uri->segment(2);
    }

    public function index() {
        $hotel = $this->hotel_model->getFHotel($this->hotel_id, $this->lang_id);
      var_dump($hotel);
        
        $this->view_data['hotel'] = $hotel;
        $this->load->template('frontend/hotel_view', $this->view_data);
    }

}
