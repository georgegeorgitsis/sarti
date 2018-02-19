<?php

class Hotels extends MY_F_Controller {

    protected $conf;
    protected $page;
    protected $hotels;
    protected $hotel_ids = array();
    protected $all_hotel_ids = array();
    protected $hotels_count = 0;
    protected $is_search = false;
    protected $pagination_url;

    public function __construct() {
        parent::__construct();
        $this->load->model('hotel_model');
        $this->load->model('package_model');
        $this->load->model('room_model');
        array_push($this->styles, base_url('assets/css/sidebar.css'));
        $this->loadStyles();
    }

    public function getHotelNames(){
        $query = $this->input->get('search');
        $names = $this->hotel_model->getHotelNames($query);
        if($names && count($names) > 0){
            $res = [];
            foreach($names as $name){
                $resObj = new stdClass();
                $resObj->id = $name['hotel_id'];
                $resObj->name = $name['hotel_name'];     
                $res[] = $resObj;           
            }
            echo json_encode($res);
        }
        else{
            echo json_encode('error');
        }        
    }

    public function index() {
        $clear_search = $this->input->get('clear');
        $this->pagination_url = base_url("/");
        $index_search = $this->session->userdata('index_search');
        if(isset($clear_search) && $clear_search == 1){
            $this->is_search = false;
            $this->session->unset_userdata('index_search');
            $this->getHotel_ids();
            $this->parseHotels();
        }
        else{
            $this->getHotel_ids();
            // $this->parseHotels();
            if(isset( $index_search['filters'] ) && count($index_search['filters']) > 0){   
                // $this->is_search = false;/
                $this->is_search = true;
                // $this->filterHotels($index_search['filters']['destination'], $index_search['filters']['boards'], 
                //     $index_search['filters']['room_types'], $index_search['filters']['facilities'], 
                //     $index_search['filters']['sorting_title'], $index_search['filters']['sorting_price'], $index_search['filters']['floors']);
                $this->filterHotels($index_search);
                $this->view_data['search'] = $index_search;
            }
            else{
                $this->parseHotels();
            }
        }
        $this->view_data['is_search'] = $this->is_search;
        $this->view_data['hotels'] = $this->hotels;
        $this->load->template('frontend/hotels_view', $this->view_data);
    }

    public function seven_day_packages(){
        $clear_search = $this->input->get('clear');
        $this->pagination_url = base_url("seven-day-packages");
        if(isset($clear_search) && $clear_search == 1){
            $this->is_search = false;
            $this->session->unset_userdata('seven_d_search');
            $this->getHotel_ids();
            $this->parseHotels();
        }
        else{
            $package_period_id = $this->input->get('p');
            $this->is_search = true;
            if(isset($package_period_id) && trim($package_period_id) != ""){
                $period = $this->package_model->getPackagePeriod($package_period_id);
                $checkin = date("Y-m-d", strtotime($period['period_from']));
                $checkout = date("Y-m-d", strtotime($period['period_to']));

                $adults = $this->input->get('a');
                $search['packageType'] = 2;
                $search['checkin'] = $checkin;
                $search['checkout'] = $checkout;
                $search['adults'] = $adults;

                $this->session->unset_userdata('seven_d_search');
                $this->session->set_userdata('seven_d_search', $search);
                $this->view_data['search'] = $this->session->userdata('seven_d_search');

                $this->getHotel_ids($checkin, $checkout, $adults, $search['packageType']);
                $this->parseHotels($checkin, $checkout, $adults, $search['packageType']);
            }
            else{
                $session_search = $this->session->userdata('seven_d_search');
                if(isset($session_search) && !empty($session_search)){
                    $this->is_search = true;
                    $this->getHotel_ids($session_search['checkin'], $session_search['checkout'], $session_search['adults'], $session_search['packageType']);
                
                    if(isset($session_search['filters']) && count($session_search['filters']) > 0){
                        $this->filterHotels($session_search);
                    }
                    else{
                        $this->parseHotels($session_search['checkin'], $session_search['checkout'], $session_search['adults'], $session_search['packageType']);
                    }
                    $this->view_data['search'] = $session_search;
                }
                else{
                    $this->is_search = false;
                    $this->getHotel_ids();
                    $this->parseHotels();
                }
            }
        }
        $this->view_data['package_type'] = 2;
        $this->view_data['is_search'] = $this->is_search;
        $this->view_data['hotels'] = $this->hotels;
        $this->load->template('frontend/hotels_view', $this->view_data);
    }

    public function ten_day_packages(){
        $clear_search = $this->input->get('clear');
        $this->pagination_url = base_url("ten-day-packages");
        if(isset($clear_search) && $clear_search == 1){
            $this->session->unset_userdata('ten_d_search');
            $this->getHotel_ids(null, null, null, 3);
            $this->parseHotels(null, null, null, 3);
            $this->is_search = false;
        }
        else{
            $package_period_id = $this->input->get('p');
            $this->is_search = true;
            if(isset($package_period_id) && trim($package_period_id) != ""){
                $period = $this->package_model->getPackagePeriod($package_period_id);
                $checkin = date("Y-m-d", strtotime($period['period_from']));
                $checkout = date("Y-m-d", strtotime($period['period_to']));

                $adults = $this->input->get('a');
                $search['packageType'] = 3;
                $search['checkin'] = $checkin;
                $search['checkout'] = $checkout;
                $search['adults'] = $adults;

                $this->session->unset_userdata('ten_d_search');
                $this->session->set_userdata('ten_d_search', $search);
                $this->view_data['search'] = $this->session->userdata('ten_d_search');

                $this->getHotel_ids($checkin, $checkout, $adults, $search['packageType']);
                $this->parseHotels($checkin, $checkout, $adults, $search['packageType']);
            }
            else{
                $session_search = $this->session->userdata('ten_d_search');
                if(isset($session_search) && !empty($session_search)){
                    $this->is_search = true;
                    $this->getHotel_ids($session_search['checkin'], $session_search['checkout'], $session_search['adults'], $session_search['packageType']);
                        // echo "<pre>";
                        // var_dump($this->all_hotel_ids);
                        // echo "</pre>";
                    if(isset($session_search['filters']) && count($session_search['filters']) > 0){
                        // echo "<pre>";
                        // var_dump($session_search);
                        // echo "</pre>";
                        // die();
                        $this->filterHotels($session_search);
                        // echo "<pre>";
                        // var_dump($this->all_hotel_ids);
                        // echo "</pre>";
                        // die();
                    }
                    else{
                        $this->parseHotels($session_search['checkin'], $session_search['checkout'], $session_search['adults'], $session_search['packageType']);
                    }
                    $this->view_data['search'] = $session_search;
                }
                else{
                    $this->is_search = false;
                    $this->getHotel_ids();
                    $this->parseHotels();
                }
            }
        }
        $this->view_data['package_type'] = 3;
        $this->view_data['is_search'] = $this->is_search;
        $this->view_data['hotels'] = $this->hotels;
        $this->load->template('frontend/hotels_view', $this->view_data);
    }

    public function allot_packages(){
        $clear_search = $this->input->get('clear');
        $this->pagination_url = base_url("allotment-packages");
        if(isset($clear_search) && $clear_search == 1){
            $this->session->unset_userdata('allot_search');
            $this->getHotel_ids();
            $this->parseHotels();
            $this->is_search = false;
        }
        else{
            $checkinInput = $this->input->get('checkin');
            $checkoutInput = $this->input->get('checkout');
            $this->is_search = true;
            if(isset($checkinInput) && isset($checkoutInput) && trim($checkinInput) != "" && trim($checkoutInput) != ""){
                $checkinTime = strtotime($checkinInput);
                $checkin = date('Y-m-d', $checkinTime);
                $checkoutTime = strtotime($checkoutInput);
                $checkout = date('Y-m-d', $checkoutTime);
                $date1 = new DateTime($checkin);
                $date2 = new DateTime($checkout);

                $numberOfNights= $date2->diff($date1)->format("%a"); 
                $this->view_data['number_of_nights'] = $numberOfNights;

                $adults = $this->input->get('a');
                $search['packageType'] = 1;
                $search['checkin'] = $checkin;
                $search['checkout'] = $checkout;
                $search['adults'] = $adults;

                $this->session->unset_userdata('allot_search');
                $this->session->set_userdata('allot_search', $search);
                $this->view_data['search'] = $this->session->userdata('allot_search');

                $this->getHotel_ids($checkin, $checkout, $adults, $search['packageType']);
                $this->parseHotels($checkin, $checkout, $adults, $search['packageType']);
            }
            else{
                $session_search = $this->session->userdata('allot_search');
                if(isset($session_search) && !empty($session_search)){
                    $this->is_search = true;
                    $this->getHotel_ids($session_search['checkin'], $session_search['checkout'], $session_search['adults'], $session_search['packageType']);
                    if(isset($session_search['filters']) && count($session_search['filters']) > 0){
                        $this->filterHotels($session_search);
                    }
                    else{
                        $this->parseHotels($session_search['checkin'], $session_search['checkout'], $session_search['adults'], $session_search['packageType']);
                    }
                    $this->view_data['search'] = $session_search;
                }
                else{
                    $this->is_search = false;
                    $this->getHotel_ids();
                    $this->parseHotels();
                }
            }
        }
        $this->view_data['package_type'] = 1;
        $this->view_data['is_search'] = $this->is_search;
        $this->view_data['hotels'] = $this->hotels;
        $this->load->template('frontend/hotels_view', $this->view_data);
    }

    protected function getHotel_ids($checkin = null, $checkout = null, $adults = null, $packageType = null) {
        // $this->count_hotels($checkin, $checkout, $adults, $packageType);
        $this->all_hotel_ids = $this->hotel_model->getFHotels($checkin, $checkout, $adults, $packageType,
            null, null, $this->lang_id);

        $this->paginateHotels();

        $this->hotel_ids = $this->hotel_model->getFHotels($checkin, $checkout, $adults, $packageType,
            $this->conf['per_page'], $this->page, $this->lang_id); 
    }

    protected function count_hotels($checkin = null, $checkout = null, $adults = null, $packageType = null){
        $this->hotels_count = $this->hotel_model->get_total_hotel_count($checkin, $checkout, $adults, $packageType);
        $this->view_data['total_hotel_count'] = $this->hotels_count['total'];
    }

    protected function parseHotels($checkin = null, $checkout = null, $adults = null, 
        $packageType = null) {

        if (isset($this->hotel_ids) && !empty($this->hotel_ids)) {
            $this->view_data['total_hotel_count'] = count($this->all_hotel_ids);
            foreach ($this->hotel_ids as $key => $hotel) {  

                $hotel_id = $hotel['hotel_id'];
                
                $hotel_rooms = $this->hotel_model->getFRoomsPerCriteria($hotel_id, $checkin, $checkout, $adults, $packageType);
                if(isset($hotel_rooms) && !empty($hotel_rooms)){
                    $this->hotels[$hotel_id] = $this->hotel_model->getFHotel($hotel_id, $this->lang_id);
                    $this->hotels[$hotel_id]['rooms_distinct_types'] = [];
                    $this->hotels[$hotel_id]['thumb'] = $this->hotel_model->getHotelThumb($hotel_id);
                    $this->hotels[$hotel_id]['facilities'] = $this->hotel_model->getFHotelFacilities($hotel_id, $this->lang_id);
                    foreach($hotel_rooms as &$room){
                        $type_arr = explode(' ',trim($room['room_type_name']));
                        if(!array_key_exists($type_arr[0], $this->hotels[$hotel_id]['rooms_distinct_types'])){
                            $this->hotels[$hotel_id]['rooms_distinct_types'] [$type_arr[0]] = ['min_adults'=> $room['min_adults'], 'max_adults'=> $room['max_adults'], 'type'=> $type_arr[0]];
                        }
                    }
                    $this->hotels[$hotel_id]['rooms'] = $hotel_rooms;
    
                    if(isset($this->hotels[$hotel_id]['rooms']) && count($this->hotels[$hotel_id]['rooms']) > 0){
                        $this->hotels[$hotel_id]['min_price_room'] = $hotel_rooms[0];
                    }
                    
                    $location_name = $this->hotel_model->getFHotelLocationName($hotel_id, $this->lang_id);
                    $this->hotels[$hotel_id]['location_name'] = $location_name['location_name'];
                }
                else{
                    // unset($this->hotel_ids[$key]);
                    // unset($this->all_hotel_ids[$key]);
                }
            }
        }
    }

    public function filterHotels($session_data) {
        $hotels_array = array();
        foreach ($this->all_hotel_ids as $h_id) {
            array_push($hotels_array, $h_id['hotel_id']);
        }
        // echo "<pre>";
        // var_dump($hotels_array);
        // echo "</pre>";
        
        if($hotels_array && !empty($hotels_array)){
            if (isset($session_data['filters']) && count($session_data['filters']) > 0) {
                $this->all_hotel_ids = $this->hotel_model->getFHotelsFiltered($hotels_array, $session_data['filters']['destination'],
                $session_data['filters']['boards'], $session_data['filters']['room_types'], $session_data['filters']['facilities'],
                $session_data['filters']['sorting_title'], $session_data['filters']['sorting_price'], $session_data['filters']['floors']);
                // echo "<pre>";
                // var_dump($this->all_hotel_ids);
                // echo "</pre>";
    
                $this->hotel_ids = $this->hotel_model->getFHotelsFiltered($hotels_array, $session_data['filters']['destination'],
                $session_data['filters']['boards'], $session_data['filters']['room_types'], $session_data['filters']['facilities'],
                $session_data['filters']['sorting_title'], $session_data['filters']['sorting_price'], $session_data['filters']['floors'], $this->conf['per_page'], $this->page);
                // echo "<pre>";
                // var_dump($this->hotel_ids);
                // echo "</pre>";
                // die();

            }
            if( isset($session_data['packageType']) && trim($session_data['packageType']) != "" ){
                $this->parseHotels($session_data['checkin'], $session_data['checkout'], $session_data['adults'], 
                    $session_data['packageType']);    
            }
            else{
                $this->parseHotels();
            }
                        
            $this->view_data['hotels'] = $this->hotels;
        }
    }

    public function ajaxFilters() {
        if ($this->input->is_ajax_request()) {
            $filters = [];

            $destination = $this->input->post('destination');
            $filters['destination'] = $destination;
            $boards = $this->input->post('boards');
            $filters['boards'] = $boards;
            $room_types = $this->input->post('room_types');
            $filters['room_types'] = $room_types;
            $facilities = $this->input->post('facilities');
            $filters['facilities'] = $facilities;
            $sorting_title = $this->input->post('sortingTitle');
            $filters['sorting_title'] = $sorting_title;
            $sorting_price = $this->input->post('sortingPrice');
            $filters['sorting_price'] = $sorting_price;
            $floors = $this->input->post('floors');
            $filters['floors'] = $floors;

            $package_type = $this->input->post('packageType');
            $session_search = array();
            if(isset($package_type)){
                if($package_type == 1){
                    $this->pagination_url = base_url("allotment-packages");
                    $session_search = $this->session->userdata('allot_search');
                    $session_search['filters'] = $filters;
                    $this->session->unset_userdata('allot_search');
                    $this->session->set_userdata('allot_search', $session_search);
                }
                elseif($package_type == 2){
                    $this->pagination_url = base_url("seven-d-packages");
                    $session_search = $this->session->userdata('seven_d_search');
                    $session_search['filters'] = $filters;
                    $this->session->unset_userdata('seven_d_search');
                    $this->session->set_userdata('seven_d_search', $session_search);
                }
                elseif($package_type == 3){
                    $this->pagination_url = base_url("ten-d-packages");
                    $session_search = $this->session->userdata('ten_d_search');
                    $session_search['filters'] = $filters;
                    $this->session->unset_userdata('ten_d_search');
                    $this->session->set_userdata('ten_d_search', $session_search);
                }
                $this->handleSessionSearch($package_type);
            }
            else{
                $this->pagination_url = base_url("");
                $session_search = $this->session->userdata('index_search');
                $session_search['filters'] = $filters;
                $this->session->unset_userdata('index_search');
                $this->session->set_userdata('index_search', $session_search);
                $this->handleSessionSearch();
            }
            $this->filterHotels($session_search);
            
            $response = array();
            $hotels_view = $this->load->view('frontend/hotels_list', $this->view_data, TRUE);
            $response['html'] = $hotels_view;
            $response['total_count'] = count($this->all_hotel_ids);
            echo json_encode($response);
        }
    }

    public function filterHotelTitles($title = null) {
        $hotels_array = array();

        foreach ($this->all_hotel_ids as $h_id) {
            array_push($hotels_array, $h_id['hotel_id']);
        }
        if ($hotels_array && !empty($hotels_array)) {
            $this->hotel_ids = $this->hotel_model->getFHotelTitlesFiltered($hotels_array, $title);
            $this->parseHotels();
            $this->view_data['hotels'] = $this->hotels;
            $hotels_view = $this->load->view('frontend/hotels_list', $this->view_data, TRUE);
            echo $hotels_view;
        }
    }

    public function title_filter() {
        if ($this->input->is_ajax_request()) {
            $this->handleSessionSearch();
            $query = $this->input->get('query');

            $this->filterHotelTitles( $query);
        }
    }

    protected function handleSessionSearch($package_type = null) {
        $checkin = null;
        $checkout = null;
        $adults = null;
        
        if (isset($package_type) && trim($package_type) != "") {
            if ($package_type == 2) {
                $search = $this->session->userdata('seven_d_search');
            }
            elseif( $package_type == 3 ){
                $search = $this->session->userdata('ten_d_search');
            } 
            elseif( $package_type == 1 ) {
                $search = $this->session->userdata('allot_search');
            }
            
            // echo "<pre>";
            // var_dump($search);
            // echo "</pre>";
            // die();

            $checkin = $search['checkin'];
            $checkout = $search['checkout'];
            $adults = $search['adults'];
            $this->getHotel_ids($checkin, $checkout, $adults, $package_type);
        } 
        else {
            $this->getHotel_ids();
        }
    }

    protected function paginateHotels() {
        $this->conf['base_url'] = $this->pagination_url;

        $hotelsCount = count($this->all_hotel_ids);

        $this->load->library('pagination');
        $this->conf['anchor_class'] = 'follow_link';
        $this->conf['per_page'] = 10;
        $this->conf['uri_segment'] = 4;
        $this->conf['total_rows'] = $hotelsCount;
        $this->conf['num_links'] = $hotelsCount;
        $this->conf['page_query_string'] = TRUE;
        $this->conf['display_pages'] = TRUE;
        $this->conf['query_string_segment'] = 'page';
        $this->conf['first_link'] = '&laquo; First';
        $this->conf['last_link'] = 'Last &raquo;';
        $this->conf['next_link'] = 'Next &rarr;';
        $this->conf['prev_link'] = '&larr; Previous';
        $this->conf['full_tag_open'] = "<ul class='pagination'>";
        $this->conf['full_tag_close'] ="</ul>";
        $this->conf['num_tag_open'] = '<li>';
        $this->conf['num_tag_close'] = '</li>';
        $this->conf['cur_tag_open'] = "<li class='disabled'><li class='active'><a href='#'>";
        $this->conf['cur_tag_close'] = "<span class='sr-only'></span></a></li>";
        $this->conf['next_tag_open'] = "<li>";
        $this->conf['next_tagl_close'] = "</li>";
        $this->conf['prev_tag_open'] = "<li class='prev'>";
        $this->conf['prev_tagl_close'] = "</li>";
        $this->conf['first_tag_open'] = "<li>";
        $this->conf['first_tagl_close'] = "</li>";
        $this->conf['last_tag_open'] = "<li>";
        $this->conf['last_tagl_close'] = "</li>";

        $this->pagination->initialize($this->conf);
        $this->page = ($this->input->get('page')) ? $this->input->get('page') : 0;
        
        $this->view_data['links'] = $this->pagination->create_links();
    }


    public function get7PackagesFromDate(){
        if ($this->input->is_ajax_request()) {
            $date = $this->input->post('dateFrom');
            $time = strtotime($date);
            $dateFrom = date("Y-m-d", $time);
            $dateTo = date("Y-m-t", $time);
            $packages7 = $this->package_model->getF7dayspackages($dateFrom, $dateTo);
            $html = "";
            
            if($packages7){
                
                $formated_packages7 = [];

                foreach($packages7 as $package7_key => $package7){
                    $formated_period7 = $package7['period_from']."-".$package7['period_to'];
                    if(in_array($formated_period7, $formated_packages7)){
                        unset($packages7[$package7_key]);
                    }
                    else{
                        $formated_packages7[] = $formated_period7;
                    }
                }
                foreach($packages7 as $package){
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

    public function get10PackagesFromDate(){
        if ($this->input->is_ajax_request()) {
            $date = $this->input->post('dateFrom');
            $time = strtotime($date);
            $date = date("Y-m-d", $time);
            $dateTo = date("Y-m-t", $time);
            $packages10 = $this->package_model->getF10dayspackages($date, $dateTo);
            $html = "";
            if($packages10){

                $formated_packages10 = [];
                foreach($packages10 as $package10_key => $package10){
                    $formated_period10 = $package10['period_from']."-".$package10['period_to'];
                    if(in_array($formated_period10, $formated_packages10)){
                        unset($packages10[$package10_key]);
                    }
                    else{
                        $formated_packages10[] = $formated_period10;
                    }
                }
                foreach($packages10 as $package){
                    $from = new DateTime($package['period_from']);
                    $to = new DateTime($package['period_to']);
                    $overnights = $to->diff($from)->format("%a"); 
                    $search = $this->session->userdata('ten_d_search');
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

    public function getPackagesByDate(){
        if ($this->input->is_ajax_request()) {
            $date = $this->input->post('date');
            $packages = $this->package_model->getFPackagesByDate($date);
            $response = '<div class="modal" id="popover" title="Available Packages:"><div class="content" 
                style="width:100%; display:flex; flex-direction: column; justify-content: flex-start; max-height: 250px;">'; 
            if($packages && count($packages) > 0){
                foreach($packages as $pack){
                    $response .= "<a href='hotel/".$pack['hotel_id']."'>";
                    $response .= "<h5 class='text-semibold text-center'>".$pack['period_from']." - ".$pack['period_to']."</h5>";
                    $response .= "<h5>".$pack['hotel_name']." - ".$pack['room_name']." - ".$pack['package_type']."</h5>";
                    $response .= "</a>";
                }
            }
            else{
                $response .= '<h4 class="text-center"> No packages </h4?';
            }
            $response .= '</div></div>';
            echo $response;
        }
    }

    private function handle_search(){
        $packageType = $this->input->get('pt');
        $clear_search = $this->input->get('clear');

        if(isset($clear_search) && $clear_search == 1){

        }
        elseif(isset($packageType)){
            if($packageType == 1){
                $this->is_search = true;
                $this->view_data['is_search'] = 1;
            }
            elseif($packageType == 2){
                $this->is_search = true;
                $this->view_data['is_search'] = 1;
            }
            elseif($packageType == 3){
                $this->is_search = true;
                $this->view_data['is_search'] = 1;
            }
            else{
                $this->session->unset_userdata('seven_d_search');
                $this->session->unset_userdata('ten_d_search');
                $this->session->unset_userdata('allot_search');
                $this->is_search = false;
            }
        }

        $this->view_data['is_search'] = $this->is_search;
        $package_period_id = null;
        $checkin = null;
        $checkout = null;

        if ($packageType == 1) {
            $checkinInput = $this->input->get('checkin');
            $checkinTime = strtotime($checkinInput);
            $checkin = date('Y-m-d', $checkinTime);
            $checkoutInput = $this->input->get('checkout');
            $checkoutTime = strtotime($checkoutInput);
            $checkout = date('Y-m-d', $checkoutTime);
            $date1 = new DateTime($checkin);
            $date2 = new DateTime($checkout);

            $numberOfNights= $date2->diff($date1)->format("%a"); 
            $this->view_data['number_of_nights'] = $numberOfNights;
        } else {
            $package_period_id = $this->input->get('p');
            $period = $this->package_model->getPackagePeriod($package_period_id);
            $checkin = date("Y-m-d", strtotime($period['period_from']));
            $checkout = date("Y-m-d", strtotime($period['period_to']));
        }

        $adults = $this->input->get('a');

        $search['packageType'] = $packageType;
        $search['package_id'] = $package_period_id;
        $search['checkin'] = $checkin;
        $search['checkout'] = $checkout;
        $search['adults'] = $adults;

        $room_types = $this->input->get('r_type');
        if(isset($room_types) && (trim($room_types) != "" || count($room_types) > 0)){
            $search['room_types'] = $room_types;
        }
        
        $this->session->set_userdata('search', $search);
        $this->view_data['search'] = $this->session->userdata('search');
        if(isset($packageType)){
            $this->getHotel_ids($checkin, $checkout, $adults, $packageType);
            $this->parseHotels($checkin, $checkout, $adults, $packageType);
        }
        else{
            $this->getHotel_ids();
            $this->parseHotels();
        }
    }
}
