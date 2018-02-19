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
        $this->load->model('package_model');
        array_push($this->styles, base_url('assets/css/sidebar.css'));
        $this->loadStyles();
        $this->hotel_id = $this->uri->segment(2);
    }

    public function getPeriodPriceForAdults(){
        $roomID = $this->input->get('room');
        $periodID = $this->input->get('period');
        $adults = $this->input->get('adults');

        $room_price = $this->room_model->getRoomPeriodPrices($roomID, $periodID, $adults);
        $html = '';
        if($room_price){
            if($room_price['special_offer']>0){
                $html = '<span class="special_offer_price">
                '.(($room_price['price']) - 
                ($room_price['price']*$room_price['special_offer']/100)).'
                &euro;
            </span>
            <span class="before_special_offer_price"> 
                '. $room_price['price'] .' &euro;
            </span>';
            }
            else{
                $html = $room_price['price'] .' &euro;';
            }
        }
        else{
            $html = "Not available";
        }

        echo $html;

    }

    public function index() {
        $this->loadGalleryStylesheets();
        $this->loadGalleryScripts();
        $has_seven = false;
        $has_ten= false;
        $has_allot = false;
        $hotel = $this->hotel_model->getFHotel($this->hotel_id, $this->lang_id);
        $hotel_image = $this->hotel_model->getFHotelImage($this->hotel_id);
        $hotel_image_thumbs = $this->hotel_model->getFHotelImageThumbs($this->hotel_id);
        $hotel_facilities = $this->hotel_model->getFHotelFacilitiesAndCategories($this->hotel_id, $this->lang_id, true);
        $hotel_rooms = $this->hotel_model->getFRooms($this->hotel_id);
        $location_locales = $this->location_model->getLocationLocalesForLang($hotel['location_id'], $this->lang_id);
        $hotel_images = $this->hotel_model->getFHotelImages($this->hotel_id);
        
        $hotel_main_facilities_icon = array();

        // echo "<pre>";
        // var_dump($hotel_facilities);
        // echo "</pre>";
        // die();

        if(isset($hotel_facilities) && !empty($hotel_facilities)){
            foreach($hotel_facilities as $fac_cat){
                if(isset($fac_cat['facilities'])){
                    foreach($fac_cat['facilities'] as $facility){
                        if($facility['fac_is_main']){
                            array_push($hotel_main_facilities_icon, $facility['facility_icon']);
                        }
                    }
                }
            }
        }
        $this->view_data['main_facility_icons'] = $hotel_main_facilities_icon;

        if($location_locales)
            $location = $location_locales;
        else
            $location = $this->location_model->getLocation($hotel['location_id']);
        
        if(isset($hotel_rooms) && $hotel_rooms){
            $rooms_packages = array();
            $hotel_rooms_distinct_type = array();
            foreach ($hotel_rooms as &$hotel_room) {
                $hotel_room['prices_amount'] = 0;
                $hotel_room['room_facilities'] = $this->hotel_model->getFRoomsFacilities($hotel_room['room_id'], $this->lang_id);
                $room_package = $this->package_model->getPackage($hotel_room['room_package_id']);
                $rooms_packages[$hotel_room['room_id']] = $room_package;
                // $hotel_rooms_prices = $this->hotel_model->getFRoomsPrices($hotel_room['room_id']);
                // $rooms_with_packages[$hotel_room['room_name']]['available_periods'] = $this->package_model->getPeriodsPerPackage($hotel_room['room_package_id']);
                
                $hotel_room['available_periods'] = $this->package_model->getPeriodsPerPackage($hotel_room['room_package_id']);
                $hotel_room['available_prices'] = 0;

                if($hotel_room['available_periods'] && isset($hotel_room['available_periods'])){
                    foreach($hotel_room['available_periods'] as &$av_period){

                        $av_period['all_prices'] = $this->room_model
                            ->getRoomPeriodPricesWithoutAd($hotel_room['room_id'], $av_period['package_period_id']);
                        
                        if($av_period['all_prices']){
                            $av_period['has_prices'] = false;
                            $av_period['prices_amount'] = 0;
                            foreach($av_period['all_prices'] as $price){
                                
                                if(isset($price['price']) && $price['price'] > 0){
                                    if($av_period['has_prices'] == false){
                                        $av_period['has_prices'] = true;
                                    }
                                    $av_period['prices_amount'] += 1; 
                                    $hotel_room['available_prices'] += 1;
                                }
                            }
                            $hotel_room['has_prices'] = true;
                            $hotel_room['prices_amount'] += 1;
                        }
                    }
                }
                $hotel_rooms_distinct_type[$hotel_room['room_type_id']] = $hotel_room;
            }
            $this->view_data['rooms_distinct_type'] = $hotel_rooms_distinct_type;
            foreach($rooms_packages as $pack){
                if($pack['is_package_type'] == 1){
                    $has_allot = true;
                }
                elseif($pack['is_package_type'] == 2){
                    $has_seven = true;
                }
                elseif($pack['is_package_type'] == 3){
                    $has_ten = true;
                }
            }
        }

        // echo '<pre>' . var_dump($hotel_rooms[1]) . '</pre>';
        // die();
        $this->view_data['has_seven'] = $has_seven;
        $this->view_data['has_ten'] = $has_ten;
        $this->view_data['has_allot'] = $has_allot;
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
        
        

        $session_search = $this->session->userdata('search');

        if(isset($session_search) && !empty($session_search)){
            $this->view_data['search'] = $session_search;
        }

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
