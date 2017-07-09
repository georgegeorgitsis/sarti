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
        $hotel_image = $this->hotel_model->getFHotelImage($this->hotel_id);
        $hotel_image_thumbs = $this->hotel_model->getFHotelImageThumbs($this->hotel_id);
        $hotel_facilities = $this->hotel_model->getFHotelFacilities($this->hotel_id, $this->lang_id);
        //dwmatia
        $hotel_rooms = $this->hotel_model->getFRooms($this->hotel_id);
        //dwmatia facilities        
        //var_dump($hotel);
        //var_dump($hotel_image);
        //var_dump($hotel_image_thumbs);
        //var_dump($hotel_facilities);
        //var_dump($hotel_rooms);
        //var_dump($hotel_rooms_facilities);

        foreach ($hotel_rooms as $hotel_room) {
            $hotel_rooms_facilities = $this->hotel_model->getFRoomsFacilities($hotel_room['room_id']);
            
        }

        $this->view_data['hotel'] = $hotel;
        $this->view_data['hotel_image'] = $hotel_image;
        $this->view_data['hotel_image_thumbs'] = $hotel_image_thumbs;
        $this->view_data['hotel_facilities'] = $hotel_facilities;
        $this->view_data['hotel_rooms'] = $hotel_rooms;
        $this->view_data['hotel_rooms_facilities'] = $hotel_rooms_facilities;
        $this->load->template('frontend/hotel_view', $this->view_data);
    }

}
