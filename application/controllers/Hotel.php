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
        $this->loadGalleryStylesheets();
        $this->loadGalleryScripts();
        
        // var_dump($this->session->userdata());
        // die();

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
        
        if(isset($hotel_rooms) && $hotel_rooms){
            $rooms_with_packages = array();
            foreach ($hotel_rooms as &$hotel_room) {
                $hotel_room['prices_amount'] = 0;
                $hotel_rooms_facilities = $this->hotel_model->getFRoomsFacilities($hotel_room['room_id'], $this->lang_id);
                // $hotel_rooms_prices = $this->hotel_model->getFRoomsPrices($hotel_room['room_id']);
                $rooms_with_packages[$hotel_room['room_name']]['available_periods'] = $this->package_model->getPeriodsPerPackage($hotel_room['room_package_id']);
                
                $hotel_room['available_periods'] = $this->package_model->getPeriodsPerPackage($hotel_room['room_package_id']);
                if($hotel_room['available_periods'] && isset($hotel_room['available_periods'])){
                    foreach($hotel_room['available_periods'] as &$av_period){
                        $av_period['all_prices'] = $this->room_model
                            ->getRoomPeriodPricesWithoutAd($hotel_room['room_id'], $av_period['package_period_id']);
                        
                        if($av_period['all_prices']){
                            $hotel_room['has_prices'] = true;
                            $hotel_room['prices_amount'] += 1;
                        }
                    }
                }
            }

            $hotel_rooms_distinct_type = array();
            $hotel_rooms_distinct_type[$hotel_rooms[0]['room_type_id']] = $hotel_rooms[0];
            $this->view_data['rooms_distinct_type'] = $hotel_rooms_distinct_type;
        }

        $this->view_data['hotel'] = $hotel;
        $this->view_data['hotel_image'] = $hotel_image;
        $this->view_data['hotel_images'] = $hotel_images;
        $this->view_data['hotel_image_thumbs'] = $hotel_image_thumbs;
        $this->view_data['hotel_facilities'] = $hotel_facilities;
        $this->view_data['hotel_rooms'] = $hotel_rooms;
        if(isset($hotel_rooms_facilities) && $hotel_rooms_facilities){
            $this->view_data['hotel_rooms_facilities'] = $hotel_rooms_facilities;
        }
        if(isset($hotel_rooms_prices) && $hotel_rooms_prices){
            $this->view_data['hotel_rooms_prices'] = $hotel_rooms_prices;
        }
        $this->view_data['location'] = $location;
        

        $this->load->template('frontend/hotel_view', $this->view_data);
    }

    public function requestBooking($room=NULL, $period=NULL){
        if(isset($room)){
            $hotel_room = $this->room_model->getRoom($room);
            $hotel = $this->hotel_model->getHotel($hotel_room['hotel_id']);
            $this->view_data['hotel'] = $hotel;
            $this->view_data['room'] = $hotel_room;
        }
        if(isset($period)){
            $hotel_period = $this->package_model->getPackagePeriod($period);
            $this->view_data['period'] = $hotel_period;
        }
        
        $this->load->template('frontend/request_booking', $this->view_data);
    }

    protected function loadGalleryStylesheets(){
        // array_push($this->styles, base_url('assets/css/vendor/lightgallery.min.css'));
        // array_push($this->styles, base_url('assets/css/vendor/lightslider.min.css'));
        $this->loadStyles();
    }
    protected function loadGalleryScripts(){
        // array_push($this->scripts, base_url('assets/js/vendor/lightgallery.min.js'));
        // array_push($this->scripts, base_url('assets/js/vendor/lightslider.min.js'));
        // array_push($this->scripts, base_url('assets/js/image-slider.js'));
        $this->loadScripts();
    }

}
