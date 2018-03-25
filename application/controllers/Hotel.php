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
    protected $search;

    public function __construct() {
        parent::__construct();
        $this->load->library('user_agent');
        $this->load->model('hotel_model');
        $this->load->model('location_model');
        $this->load->model('package_model');
        array_push($this->styles, base_url('assets/css/sidebar.css'));
        $this->loadStyles();
        $this->hotel_id = $this->uri->segment(2);
    }

    public function showRoomPeriods(){
        if ($this->input->is_ajax_request()) {
            $date = $this->input->post('dateFrom');
            $packageType = $this->input->post('pType');
            $hotelId = $this->input->post('hotelId');
            $time = strtotime($date);
            $dateFrom = date("Y-m-d", $time);
            $dateTo = date("Y-m-t", $time);

            $packages = $this->package_model->getPackagesForHotel($packageType, $hotelId, $dateFrom, $dateTo);

            $html = "";
            
            if(isset($packages) && !empty($packages)){
                $formated_packages = [];
                foreach($packages as $package_key => $package_val){
                    $formated_period = $package_val['period_from']."-".$package_val['period_to'];
                    if(in_array($formated_period, $formated_packages)){
                        unset($packages[$package_key]);
                    }
                    else{
                        $formated_packages[] = $formated_period;
                    }
                }
                foreach($packages as $package){
                    $from = new DateTime($package['period_from']);
                    $to = new DateTime($package['period_to']);
                    $overnights = $to->diff($from)->format("%a"); 
                    $search = $this->session->userdata('seven_d_search');

                    if(isset($search['checkin']) && isset($search['checkout'])){
                        $search_checkin = new DateTime($search['checkin']);
                        $search_checkout = new DateTime($search['checkout']);
                        if($search_checkin == $from && $search_checkout == $to){
                            $html .= "<option value='".$package['package_period_id']."' selected>".date('d/m/y', strtotime($package['period_from']))." - "
                                .date('d/m/y', strtotime($package['period_to']))." - ".$overnights." nights </option>";
                        }
                        else{
                            $html .= "<option value='".$package['package_period_id']."'>".date('d/m/y', strtotime($package['period_from']))." - "
                                .date('d/m/y', strtotime($package['period_to']))." - ".$overnights." nights </option>";
                        }
                    }
                    else{
                        $html .= "<option value='".$package['package_period_id']."'>".date('d/m/y', strtotime($package['period_from']))." - "
                            .date('d/m/y', strtotime($package['period_to']))." - ".$overnights." nights </option>";
                    } 
                }
            }
            else{
                $html = "<option value=''> Please try another month </option>";
            }
            echo $html;
        }
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

    private function handleReferrerSearch(){
        $referrer_url = $this->agent->referrer();
        $package_type = $this->input->get('pt');

        if(isset($package_type) && trim($package_type) != "" && is_numeric($package_type)){
            
            if($package_type == 2 || $package_type == 3){
                $package_period_id = $this->input->get('p');
                $period = $this->package_model->getPackagePeriod($package_period_id);
                $checkin = date("Y-m-d", strtotime($period['period_from']));
                $checkout = date("Y-m-d", strtotime($period['period_to']));

                $adults = $this->input->get('a');
                $search['packageType'] = $package_type;
                $search['checkin'] = $checkin;
                $search['checkout'] = $checkout;
                $search['adults'] = $adults;
                if($package_type == 2){
                    
                    $this->session->set_userdata('seven_d_search', $search);
                }
                else{
                    $this->session->set_userdata('ten_d_search', $search);
                }
            }
            elseif($package_type == 1){
                $checkinInput = $this->input->get('checkin');
                $checkoutInput = $this->input->get('checkout');
                $checkinTime = strtotime($checkinInput);
                $checkin = date('Y-m-d', $checkinTime);
                $checkoutTime = strtotime($checkoutInput);
                $checkout = date('Y-m-d', $checkoutTime);

                $adults = $this->input->get('a');
                $search['packageType'] = 1;
                $search['checkin'] = $checkin;
                $search['checkout'] = $checkout;
                $search['adults'] = $adults;
                $this->session->set_userdata('allot_search', $search);
            }
            $session_search = $search;
        }
        else{         
            if(strpos($referrer_url, "seven-day-packages")){
                $session_search = $this->session->userdata('seven_d_search');
            }
            elseif(strpos($referrer_url, "ten-day-packages")){
                $session_search = $this->session->userdata('ten_d_search');
            }
            else{
                $session_search = $this->session->userdata('allot_search');
            }
        }
        
        $this->view_data['search'] = $session_search;
        $this->search = $session_search;
    }

    public function index() {
        $this->handleReferrerSearch();
        // echo "<pre>";
        // var_dump($this->hotel_id);
        // echo "</pre>";
        // die();
        $this->loadGalleryStylesheets();
        $this->loadGalleryScripts();
        $has_seven = false;
        $has_ten= false;
        $has_allot = false;
        $hotel = $this->hotel_model->getFHotel($this->hotel_id, $this->lang_id);
        $ground_plans = $this->hotel_model->getHotelPlans($this->hotel_id);
        $hotel_image = $this->hotel_model->getFHotelImage($this->hotel_id);
        $hotel_image_thumbs = $this->hotel_model->getFHotelImageThumbs($this->hotel_id);
        $hotel_facilities = $this->hotel_model->getFHotelFacilitiesAndCategories($this->hotel_id, $this->lang_id, true);
        $hotel_rooms = $this->hotel_model->getFRooms($this->hotel_id);
        $location_locales = $this->location_model->getLocationLocalesForLang($hotel['location_id'], $this->lang_id);
        $hotel_images = $this->hotel_model->getFHotelImages($this->hotel_id);
        
        $hotel_main_facilities = array();

        if(isset($hotel_facilities) && !empty($hotel_facilities)){
            foreach($hotel_facilities as $fac_cat){
                if(isset($fac_cat['facilities'])){
                    foreach($fac_cat['facilities'] as $facility){
                        if($facility['fac_is_main']){
                            array_push($hotel_main_facilities, $facility);
                        }
                    }
                }
            }
        }
        $this->view_data['main_facility_icons'] = $hotel_main_facilities;

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

                $early_bookings = $this->package_model->getPackageEarlyBookings($hotel_room['room_package_id']);
                if(isset( $early_bookings ) && !empty($early_bookings)){
                    $present_eb = $early_bookings[0];
                    foreach($early_bookings as $key => $eb){
                        $valid_until = strtotime($eb['valid_until']);
                        $present_eb_time = strtotime($present_eb['valid_until']); 
                        if((time()-(60*60*24)) <= $valid_until && $present_eb_time > $valid_until ){
                            $present_eb = $eb;
                        }
                    }
                    $hotel_room['early_booking_offer'] = $present_eb;
                }

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
                        // echo "<pre>";
                        // var_dump($av_period);
                        // echo "</pre>";
                        // die();
                        if(isset($this->search) && $av_period['is_package_type'] == $this->search['packageType']
                            && $av_period['period_from'] == $this->search['checkin'] 
                            && $av_period['period_to'] == $this->search['checkout']){
                            if(isset($av_period['all_prices']) && !empty($av_period['all_prices'])){
                                foreach($av_period['all_prices'] as $period_price){
                                    // echo "<pre>";
                                    // var_dump($av_period);
                                    // echo "</pre>";
                                    // die();
                                    // ADD ERALY BOOKING CHECK
                                    if($period_price['adults'] == $this->search['adults']){
                                        $hotel_room['searched_room_period']['from'] = $av_period['period_from'];
                                        $hotel_room['searched_room_period']['to'] = $av_period['period_to'];
                                        $hotel_room['searched_room_period']['period_id'] = $av_period['package_period_id'];
                                        $hotel_room['searched_room_period']['price'] = $period_price['price'];
                                        $hotel_room['searched_room_period']['offer'] = $period_price['special_offer'];
                                        $hotel_room['searched_room_period']['adults'] = $period_price['adults'];
                                    }
                                }
                            }
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

        $this->view_data['has_seven'] = $has_seven;
        $this->view_data['has_ten'] = $has_ten;
        $this->view_data['has_allot'] = $has_allot;
        $this->view_data['hotel'] = $hotel;
        $this->view_data['hotel_image'] = $hotel_image;
        $this->view_data['hotel_images'] = $hotel_images;
        $this->view_data['hotel_image_thumbs'] = $hotel_image_thumbs;
        $this->view_data['hotel_facilities'] = $hotel_facilities;
        $this->view_data['hotel_rooms'] = $hotel_rooms;
        $this->view_data['ground_plans'] = $ground_plans;

        if(isset($hotel_rooms_facilities) && $hotel_rooms_facilities){
            $this->view_data['hotel_rooms_facilities'] = $hotel_rooms_facilities;
        }
        if(isset($hotel_rooms_prices) && $hotel_rooms_prices){
            $this->view_data['hotel_rooms_prices'] = $hotel_rooms_prices;
        }
        $this->view_data['location'] = $location;
        

        $this->load->template('frontend/hotel_view', $this->view_data);
    }

    public function requestBooking(){
        $room_id = $this->input->post('room');
        $period_id = $this->input->post('period');
        // $room_amount = $this->input->post('rooms_select');
        $adults = $this->input->post('adults_select');
        if(isset($room_id) && isset($period_id)){
            $hotel_room = $this->room_model->getRoom($room_id);
            $hotel_period = $this->package_model->getPackagePeriod($period_id);
            $hotel = $this->hotel_model->getFHotel($hotel_room['hotel_id'], $this->lang_id);
            $hotel['thumb'] = $this->hotel_model->getHotelThumb($hotel_room['hotel_id']);
            $location = $this->location_model->getLocation($hotel['location_id']);
            $period_price = $this->room_model->getRoomPeriodPrices($room_id, $period_id, $adults);
            $this->view_data['location'] = $location;
            $this->view_data['hotel'] = $hotel;
            $this->view_data['room'] = $hotel_room;
            $this->view_data['price'] = $period_price;
            $this->view_data['period'] = $hotel_period;
        }
        $this->load->template('frontend/request_booking', $this->view_data);
    }

    protected function loadGalleryStylesheets(){
        $this->loadStyles();
    }
    protected function loadGalleryScripts(){
        $this->loadScripts();
    }

}
