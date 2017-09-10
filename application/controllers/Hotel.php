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
        $this->load->model('location_model');
        $this->hotel_id = $this->uri->segment(2);
    }

    public function index() {
        $hotel = $this->hotel_model->getFHotel($this->hotel_id, $this->lang_id);
        $hotel_image = $this->hotel_model->getFHotelImage($this->hotel_id);
        $hotel_image_thumbs = $this->hotel_model->getFHotelImageThumbs($this->hotel_id);
        $hotel_facilities = $this->hotel_model->getFHotelFacilities($this->hotel_id, $this->lang_id);
        $hotel_rooms = $this->hotel_model->getFRooms($this->hotel_id);
        $location_locales = $this->location_model->getLocationLocalesForLang($hotel['location_id'], $this->lang_id);
        $hotel_images = $this->hotel_model->getFHotelImages($this->hotel_id);

        if($location_locales)
            $location = $location_locales;
        else
            $location = $this->location_model->getLocation($hotel['location_id']);
        

        foreach ($hotel_rooms as $hotel_room) {
            $hotel_rooms_facilities = $this->hotel_model->getFRoomsFacilities($hotel_room['room_id'], $this->lang_id);
            $hotel_rooms_prices = $this->hotel_model->getFRoomsPrices($hotel_room['room_id']);
        }

        $this->view_data['hotel'] = $hotel;
        $this->view_data['hotel_image'] = $hotel_image;
        $this->view_data['hotel_images'] = $hotel_images;
        $this->view_data['hotel_image_thumbs'] = $hotel_image_thumbs;
        $this->view_data['hotel_facilities'] = $hotel_facilities;
        $this->view_data['hotel_rooms'] = $hotel_rooms;
        $this->view_data['hotel_rooms_facilities'] = $hotel_rooms_facilities;
        $this->view_data['hotel_rooms_prices'] = $hotel_rooms_prices;
        $this->view_data['location'] = $location;
        
        $hotel_rooms_distinct_type = array();
        $hotel_rooms_distinct_type[$hotel_rooms[0]['room_type_id']] = $hotel_rooms[0];
        foreach($hotel_rooms as $room){
            if(!isset($hotel_rooms_distinct_type[$room['room_type_id']])){
                $hotel_rooms_distinct_type[$room['room_type_id']] = $room;
            }
            
        }
        $this->view_data['rooms_distinct_type'] = $hotel_rooms_distinct_type;
        
        // var_dump($hotel_facilities);
        // die();

        $this->load->template('frontend/hotel_view', $this->view_data);
    }

}
