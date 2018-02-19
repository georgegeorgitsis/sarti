<?php

class Hotels extends MY_F_Controller {

    protected $conf;
    protected $page;
    protected $hotels;
    protected $hotel_ids = array();
    protected $all_hotel_ids = array();
    protected $hotels_count = 0;
    protected $is_search = false;

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
        $this->handle_search();

        $this->view_data['hotels'] = $this->hotels;
        $this->load->template('frontend/hotels_view', $this->view_data);
    }

    private function handle_search(){
        $this->session->unset_userdata('search');
        $packageType = $this->input->get('pt');
        if(isset($packageType)){
            $this->is_search = true;
            $this->view_data['is_search'] = 1;
        }
        else{
            $this->is_search = false;
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
        // echo "<pre>";
        // var_dump($this->hotels);
        // echo "</pre>";
        // die();
        
    }

    protected function getHotel_ids($checkin = null, $checkout = null, $adults = null, $packageType = null) {
        $this->count_hotels($checkin, $checkout, $adults, $packageType);
        $this->paginateHotels();
        $this->all_hotel_ids = $this->hotel_model->getFHotels($checkin, $checkout, $adults, $packageType,
            null, null, $this->lang_id);
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
            foreach ($this->hotel_ids as $hotel) {

                $hotel_id = $hotel['hotel_id'];
                $this->hotels[$hotel_id] = $this->hotel_model->getFHotel($hotel_id, $this->lang_id);
                $this->hotels[$hotel_id]['rooms_distinct_types'] = [];
                $this->hotels[$hotel_id]['thumb'] = $this->hotel_model->getHotelThumb($hotel_id);
                $this->hotels[$hotel_id]['facilities'] = $this->hotel_model->getFHotelFacilities($hotel_id, $this->lang_id);
                $hotel_rooms = $this->hotel_model->getFRoomsPerCriteria($hotel_id, $checkin, $checkout, $adults, $packageType);
                
                foreach($hotel_rooms as &$room){
                    $type_arr = explode(' ',trim($room['room_type_name']));
                    if(!array_key_exists($type_arr[0], $this->hotels[$hotel_id]['rooms_distinct_types'])){
                        $this->hotels[$hotel_id]['rooms_distinct_types'] [$type_arr[0]] = ['min_adults'=> $room['min_adults'], 'max_adults'=> $room['max_adults'], 'type'=> $type_arr[0]];
                    }
                    
                    if(isset($checkin) && isset($checkout) && isset($packageType)){
                        if(isset($adults)){
                            $room_price = $this->room_model->getRoomPeriodPrices($room['room_id'], $room['package_period_id'], $adults);
                            // if($room_price['is_active'] == 1){
                                $room['price'] = $room_price;
                            // }
                        }
                        else{
                            $room_prices = $this->room_model->getRoomPeriodPricesWithoutAd($room['room_id'], $room['package_period_id']);
                        }
                    }
                    else{
                        $room_periods = $this->package_model->getPeriodsPerPackage($room['room_package_id']);
                        if($room_periods){
                            $prices = [];
                            
                            foreach ($room_periods as $key => $value) {
                                $period_prices = $this->room_model->getRoomPeriodPricesWithoutAd($room['room_id'], $value['package_period_id']);
                                // if($period_prices['is_active'] == 1){
                                    $prices[] = $period_prices[0];
                                // }
                            }
                            
                            $min_per_price = 9999;
                            $min_per_price_room = null;
                            foreach ($prices as $pkey => $pvalue) {
                                if($pvalue['price'] > 0 && $pvalue['price'] <= $min_per_price){
                                    $min_per_price = $pvalue['price'];
                                    $min_per_price_room = $pvalue;
                                }
                            }
                            $room['price'] = $min_per_price_room;
                        }
                        else{

                        }
                    }
                }
                $this->hotels[$hotel_id]['rooms'] = $hotel_rooms;

                $min_price = 9999;
                $min_price_room = null;
                foreach($hotel_rooms as $room_r){
                    if($room_r['price'] && isset($room_r['price']['price']) && $room_r['price']['price'] > 0 
                        && $room_r['price']['price'] <= $min_price){
                        
                        $min_price = $room_r['price']['price'];
                        $min_price_room = $room_r;
                    }
                }
                if(isset($this->hotels[$hotel_id]['rooms']) && count($this->hotels[$hotel_id]['rooms']) > 0){
                    $this->hotels[$hotel_id]['min_price_room'] = $min_price_room;
                }
                
                $location_name = $this->hotel_model->getFHotelLocationName($hotel_id, $this->lang_id);
                $this->hotels[$hotel_id]['location_name'] = $location_name['location_name'];
            }
        }
    }

    public function filterHotels($destination = null, $boards = null, $room_types = null, 
            $facilities = null, $sorting_title= null, $sorting_price= null, $sorting_loc=null, $floors=null) {
        $hotels_array = array();

        // echo(json_encode($this->all_hotel_ids));
        // die();

        foreach ($this->all_hotel_ids as $h_id) {
            array_push($hotels_array, $h_id['hotel_id']);
        }

        if ($hotels_array && !empty($hotels_array)) {
            $this->hotel_ids = $this->hotel_model
                ->getFHotelsFiltered($hotels_array, $destination, $boards, $room_types, 
                $facilities, $sorting_title, $sorting_price, $sorting_loc, $floors, $this->conf['per_page'], $this->page);
            
            $this->parseHotels();
            $this->view_data['hotels'] = $this->hotels;
            $hotels_view = $this->load->view('frontend/hotels_list', $this->view_data, TRUE);
            echo $hotels_view;
        }
    }

    public function ajaxFilters() {
        if ($this->input->is_ajax_request()) {
            $this->handleSessionSearch();
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
            $sorting_loc = $this->input->post('sortingLoc');
            $filters['sorting_loc'] = $sorting_loc;
            $floors = $this->input->post('floors');
            $filters['floors'] = $floors;
            $this->session->unset_userdata('filters');
            $this->session->set_userdata('filters', $filters);

            $this->filterHotels($destination, $boards, $room_types, $facilities, $sorting_title, $sorting_price, $sorting_loc, $floors);
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

    protected function handleSessionSearch() {
        $search = $this->session->userdata('search');
        // echo(json_encode($search));
        // die();
        $package_period_id = null;
        $checkin = null;
        $checkout = null;
        $adults = null;
        if (isset($search) && !empty($search) && isset($search['packageType']) && trim($search['packageType']) > 0) {
            if ($search['packageType'] == 1) {
                $checkin = $search['checkin'];
                $checkout = $search['checkout']; 
                $adults = $search['adults'];
            } else {
                $checkin = $search['checkin'];
                $checkout = $search['checkout']; 
                $packageType = $search['packageType'];
                $package_period_id = $search['package_id'];
                $adults = $search['adults'];
            }
            $this->getHotel_ids($checkin, $checkout, $adults, $packageType, $package_period_id);
        } 
        else {
            $this->getHotel_ids();
        }
    }

    protected function paginateHotels() {

        $search = $this->session->userdata('search');
        if(isset($search) && $this->is_search){
            $checkin = $search['checkin'];
            $checkout = $search['checkout']; 
            $adults = $search['adults'];
            $packageType = $search['packageType'];
            $package_period_id = $search['package_id'];

            $this->conf['base_url'] = base_url('hotels/index?pt='.$packageType.'&checkin='.$checkin
                .'&checkout='.$checkout.'&p='.$package_period_id.'&a='.$adults);
        }
        else{
            $this->conf['base_url'] = base_url('hotels/index');
        }
        $hotelsCount = $this->hotels_count['total'];

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
                    $search = $this->session->userdata('search');

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
                    $search = $this->session->userdata('search');
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
}

// public function searchHotels() {
//     $this->session->unset_userdata('search');
//     $this->view_data['is_search'] = 1;
//     $packageType = $this->input->get('pt');
//     $package_period_id = null;
//     $checkin = null;
//     $checkout = null;

//     if ($packageType == 1) {
//         $checkinInput = $this->input->get('checkin');
//         $checkinTime = strtotime($checkinInput);
//         $checkin = date('Y-m-d', $checkinTime);
//         $checkoutInput = $this->input->get('checkout');
//         $checkoutTime = strtotime($checkoutInput);
//         $checkout = date('Y-m-d', $checkoutTime);
//         $date1 = new DateTime($checkin);
//         $date2 = new DateTime($checkout);

//         $numberOfNights= $date2->diff($date1)->format("%a"); 
//         $this->view_data['number_of_nights'] = $numberOfNights;
//     } else {
//         $package_period_id = $this->input->get('p');
//         $period = $this->package_model->getPackagePeriod($package_period_id);
//         $checkin = date("Y-m-d", strtotime($period['period_from']));
//         $checkout = date("Y-m-d", strtotime($period['period_to']));
//     }

//     $adults = $this->input->get('a');

//     $search['packageType'] = $packageType;
//     $search['package_id'] = $package_period_id;
//     $search['checkin'] = $checkin;
//     $search['checkout'] = $checkout;
//     $search['adults'] = $adults;

//     $this->session->set_userdata('search', $search);
//     $this->view_data['search'] = $this->session->userdata('search');

//     $this->getHotel_ids($checkin, $checkout, $adults, $packageType);
//     $this->parseHotels($checkin, $checkout, $adults, $packageType);

    
    
//     $this->load->template('frontend/hotels_view', $this->view_data);
// }

// protected function getRoomsPerHotelId($hotel_id, $checkin = null, $checkout = null, $adults = null, 
//         $packageType = null, $package_period_id = null) {
//         if (!$checkin && !$checkout) {
//             $rooms = $this->hotel_model->getFRoomsPerCriteria($hotel_id, $checkin, $checkout, $adults, $packageType);
//         } 
//         else {
//             //psakse gia ta package period pou kaliptoyn olo to fasma tou checkin checkout, kai checkare na kaliptoun kathe imera anazitisis
//             $begin = new DateTime($checkin);
//             $end = new DateTime($checkout);

//             $interval = DateInterval::createFromDateString('1 day');
//             $period = new DatePeriod($begin, $interval, $end);

//             $legit_packages = array();
//             foreach ($period as $dt) {
//                 $legit_day_packages = array();
//                 $day = $dt->format("Y-m-d");
//                 $periods_found = $this->hotel_model->findFPackagePeriodsPerDay($day);

//                 if ($periods_found) {
//                     foreach ($periods_found as $p_f_key => $p_f) {
//                         array_push($legit_day_packages, $p_f['package_id']);
//                     }
//                 }
//                 array_push($legit_packages, $legit_day_packages);
//             }


//             $first = $legit_packages[0];
//             for ($i = 0; $i < count($legit_packages); $i++) {

//                 $result = array_intersect($first, $legit_packages[$i]);
//                 $first = $result;
//             }

//             //to result krataei osa pakets periods exoun sinexomenes imeres, gia tis imeres pou epsakse o xristis
//             //gia kathe package period id, prepei na vroume ta dwmatia pou exoun timi
//             if (isset($result) && !empty($result)) {
//                 foreach ($result as $package_period_id) {
//                     $valid_hotels = array();
//                     $rooms = $this->hotel_model->getFRoomsForPackagePeriod($hotel_id, $package_period_id);
//                 }
//             }
//         }
//         if(isset($rooms)){
//             return $rooms;
//         }
//         else{
//             return null;
//         }
        
//     }


// protected function getHotel_ids($checkin = null, $checkout = null, $adults = null, $packageType = null) {

//     $this->paginateHotels();
    
//     $this->hotel_ids = $this->hotel_model->getFHotels($checkin, $checkout, $adults, $packageType,
//         $this->conf['per_page'], $this->page, $this->lang_id);
     
//     if (false) {
//         // psakse gia ta package period pou kaliptoyn olo to fasma tou checkin checkout, 
//         // kai checkare na kaliptoun kathe imera anazitisis
        
//         $begin = DateTime::createFromFormat("d/m/Y", $checkin);
//         $end = DateTime::createFromFormat("d/m/Y", $checkout);
//         $interval = DateInterval::createFromDateString('1 day');
//         $period = new DatePeriod($begin, $interval, $end);

//         $legit_packages = array();
//         foreach ($period as $dt) {
//             $legit_day_packages = array();
//             $day = $dt->format("Y-m-d");
//             $periods_found = $this->hotel_model->findFPackagePeriodsPerDay($day);

//             if ($periods_found) {
//                 foreach ($periods_found as $p_f_key => $p_f) {
//                     array_push($legit_day_packages, $p_f['package_id']);
//                 }
//             }
//             array_push($legit_packages, $legit_day_packages);
//         }

//         $first = $legit_packages[0];
//         for ($i = 0; $i < count($legit_packages); $i++) {

//             $result = array_intersect($first, $legit_packages[$i]);
//             $first = $result;
//         }

//         //to result krataei osa pakets periods exoun sinexomenes imeres, gia tis imeres pou epsakse o xristis
//         //gia kathe package period id, prepei na vroume ta dwmatia pou to ipostirizoun, ara kai ta hotels toys
//         if (isset($result) && !empty($result)) {
//             foreach ($result as $package_period_id) {
//                 $valid_hotels = array();
//                 $valid_hotels = $this->hotel_model->getFHotelsPerRoomForPackagePeriod($package_period_id);

//                 if ($valid_hotels) {
//                     foreach ($valid_hotels as $hotel) {
//                         array_push($this->hotel_ids, $hotel);
//                     }
//                 }
//             }
//         }
//     }
// }
