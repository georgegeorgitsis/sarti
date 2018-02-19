<?php

class Hotel_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    public function getHotelThumb($hotelId) {
        $qry = $this->db->select('*')
                ->from('hotel_images')
                ->where('hotel_id', $hotelId)
                ->where('is_thumb=1')
                ->get();
        if ($qry->num_rows() > 0)
            return $qry->row_array();
        return false;
    }

    public function getFHotelsCount() {
        $qry = $this->db->select('count(hotel_id) as count')
                ->from('hotels')
                ->where('hotel_active', 1)
                ->get();

        if ($qry->num_rows() > 0)
            return $qry->row_array();
        return false;
    }

    public function getFHotelRooms($hotel_id, $lang_id) {
        $qry = $this->db->select('*')
                ->from('rooms')
                ->join('hotels', 'hotels.hotel_id=rooms.hotel_id')
                ->where('hotels.hotel_id', $hotel_id)
                ->get();
        if ($qry->num_rows() > 0)
            return $qry->result_array();
        return FALSE;
    }

    public function getHotelNames($query = null){
        $this->db->select('hotels.hotel_id, hotels.hotel_name')
                ->from('hotels')
                ->where('hotels.hotel_active', 1);
        
        if(isset($query)){
            $this->db->like('hotels.hotel_name', $query, 'both');
        }
        
        $qry = $this->db->get();

        
        if ($qry->num_rows() > 0)
            return $qry->result_array();
        return FALSE;
    }

    public function getFHotelMainFacilities($hotel_id, $lang_id) {
        $qry = $this->db->select('facility_locales.facility_name,facilities.facility_icon')
                ->from('hotel_facilities')
                ->join('hotels', 'hotels.hotel_id=hotel_facilities.hotel_id')
                ->join('facilities', 'facilities.facility_id=hotel_facilities.facility_id')
                ->join('facility_locales', 'facility_locales.facility_id=facilities.facility_id')
                ->where('hotels.hotel_id', $hotel_id)
                ->where('facility_locales.lang_id', $lang_id)
                ->where('hotel_facilities.is_main', 1)
                ->get();
        if ($qry->num_rows() > 0)
            return $qry->result_array();
        return FALSE;
    }

    public function get_total_hotel_count($checkin = null, $checkout = null, $adults = null, $packageType = null){
        $this->db->select('COUNT(DISTINCT(hotels.hotel_id)) as total')
                ->from('hotels')
                ->join('rooms', 'rooms.hotel_id=hotels.hotel_id')
                ->join('packages', 'rooms.room_package_id=packages.package_id', 'inner')
                ->join('package_periods', 'package_periods.package_id=packages.package_id', 'inner')
                ->join('room_package_prices', 'room_package_prices.room_id=rooms.room_id', 'inner')
                ->where('rooms.room_active', 1)
                ->where('hotels.hotel_active', 1)
                ->where('room_package_prices.price >', 0)
                ->where('room_package_prices.is_active ', 1);

        if (isset($packageType)) {
            $this->db->where('packages.is_package_type', $packageType);
        }
        
        if(isset($checkin) && isset($checkout)){
            if ($packageType == 1 ) {
                $this->db->where('package_periods.period_from <= ', $checkin);
                $this->db->where('package_periods.period_to >= ', $checkout);
            }
            else{
                $this->db->where('package_periods.period_from', $checkin);
                $this->db->where('package_periods.period_to', $checkout);
            }
        }      

        if (isset($adults)) {
            $this->db->where('room_package_prices.adults', $adults);   
        }


        $qry = $this->db->get();

        // echo $this->db->last_query();
        // die();
        
        if ($qry->num_rows() > 0)
            return $qry->row_array();
        return FALSE;
    }

    public function getFHotels($checkin = null, $checkout = null, $adults = null, $packageType = null, 
        $limit = null, $start = null, $lang_id) {

        $this->db->select('DISTINCT(hotels.hotel_id)')
                ->from('hotels')
                ->join('rooms', 'rooms.hotel_id=hotels.hotel_id')
                ->join('packages', 'rooms.room_package_id=packages.package_id', 'inner')
                ->join('package_periods', 'package_periods.package_id=packages.package_id', 'inner')
                // ->join('room_package_prices', 'room_package_prices.package_period_id=package_periods.package_period_id', 'inner')
                ->join('room_package_prices', 'room_package_prices.room_id=rooms.room_id', 'inner')
                ->where('rooms.room_active', 1)
                ->where('hotels.hotel_active', 1)
                ->where('room_package_prices.price >', 0)
                ->where('room_package_prices.is_active ', 1)
                ->order_by('hotels.hotel_name', 'ASC');
                
        if ($packageType) {
            $this->db->where('packages.is_package_type', $packageType);
        }
        
        if($checkin && $checkout){
            if ($packageType == 1 ) {
                $this->db->where('package_periods.period_from <= ', $checkin);
                $this->db->where('package_periods.period_to >= ', $checkout);
            }
            else{
                $this->db->where('package_periods.period_from', $checkin);
                $this->db->where('package_periods.period_to', $checkout);
            }
        }      

        if ($adults) {
            $this->db->where('room_package_prices.adults', $adults);   
        }
        if(isset($limit) && isset($start)){
            $this->db->limit($limit, $start);
        }
        $qry = $this->db->get();

        // echo $this->db->last_query();
        // die();
        
        if ($qry->num_rows() > 0)
            return $qry->result_array();
        return FALSE;
    }

    public function getFRoomsPerCriteria($hotel_id, $checkin = null, $checkout = null, $adults = null, 
        $packageType = null) {
        $this->db->select('*')
                ->from('rooms')
                ->where('rooms.hotel_id', $hotel_id)
                ->where('rooms.room_active', 1)
                ->join('room_types', 'rooms.room_type_id=room_types.room_type_id', 'inner')
                ->join('packages', 'rooms.room_package_id=packages.package_id', 'inner')
                ->join('package_periods', 'package_periods.package_id=packages.package_id', 'inner');

        if ($packageType) {
            $this->db->where('packages.is_package_type', $packageType);
        }

        if($checkin && $checkout){
            if ($packageType == 1 ) {
                $this->db->where('package_periods.period_from <= ', $checkin);
                $this->db->where('package_periods.period_to >= ', $checkout);
            }
            else{
                $this->db->where('package_periods.period_from = ', $checkin);
                $this->db->where('package_periods.period_to = ', $checkout);
            }
        }

        // if ($adults) {
        //     // $this->db->where('rooms.min_adults <=', $adults);
        //     // $this->db->where('rooms.max_adults >=', $adults);
        //     $this->db->where('room_package_prices.adults', $adults);
        // }

        $qry = $this->db->get();
        
        if ($qry->num_rows() > 0)
            return $qry->result_array();
        return FALSE;
    }



    public function getFRoomsMinPrice($hotelId) {
        $qry = $this->db->select('rooms.*, room_package_prices.*, packages.is_package_type')
                ->from('room_package_prices')
                ->join('rooms', 'room_package_prices.room_id = rooms.room_id', 'inner')
                ->join('package_periods', 'package_periods.package_period_id = room_package_prices.package_period_id', 'inner')
                ->join('packages', 'packages.package_id = rooms.room_package_id', 'inner')
                ->where('package_periods.package_active', '1')
                ->where('rooms.hotel_id', $hotelId)
                ->where('room_package_prices.price >', 0)
                ->order_by('room_package_prices.price', 'ASC')
                ->limit(1)
                ->get();
        // var_dump($qry->row_array());
        
        if ($qry->num_rows() > 0)
            return $qry->row_array();
        return false;
    }

    public function findFPackagePeriodsPerDay($day) {
        $qry = $this->db->select('packages.package_id')
                ->from('package_periods')
                ->join('packages', 'packages.package_id=package_periods.package_id')
                ->where('packages.is_package_type', 1)
                ->where('package_periods.period_from<=', $day)
                ->where('package_periods.period_to>=', $day)
                ->get();

        if ($qry->num_rows() > 0)
            return $qry->result_array();
        return FALSE;
    }

    public function getFHotelsPerRoomForPackagePeriod($package_id) {
        $qry = $this->db->select('DISTINCT(hotels.hotel_id)')
                ->from('hotels')
                ->join('rooms', 'rooms.hotel_id=hotels.hotel_id')
                ->join('room_package_prices', 'room_package_prices.room_id=rooms.room_id')
                ->where('rooms.room_package_id', $package_id)
                ->where('room_package_prices.price>', 0)
                ->get();

        if ($qry->num_rows() > 0)
            return $qry->result_array();
        return FALSE;
    }

    public function getFRoomsForPackagePeriod($hotel_id, $package_id) {
        $qry = $this->db->select('DISTINCT(rooms.room_id), room_package_prices.price')
                ->from('hotels')
                ->join('rooms', 'rooms.hotel_id=hotels.hotel_id')
                ->join('room_package_prices', 'room_package_prices.room_id=rooms.room_id')
                ->where('hotels.hotel_id', $hotel_id)
                ->where('rooms.room_package_id', $package_id)
                ->where('room_package_prices.price>', 0)
                ->get();

        if ($qry->num_rows() > 0)
            return $qry->result_array();
        return FALSE;
    }

    public function getFHotelLocationName($hotel_id, $lang_id) {
        $qry = $this->db->select('location_locales.location_name as location_name')
                ->from('hotels')
                ->join('locations', 'locations.location_id=hotels.location_id')
                ->join('location_locales', 'location_locales.location_id=locations.location_id')
                ->where('location_locales.lang_id', $lang_id)
                ->where('hotels.hotel_id', $hotel_id)
                ->get();
        if ($qry->num_rows() > 0)
            return $qry->row_array();
        return false;
    }

    

    public function getFHotelsFiltered($hotels_array, $destination = null, $boards = null, $room_types = null, 
        $facilities = null, $sorting_title = null, $sorting_price = null, $sorting_loc=null, $floors=null,
        $limit=null, $start=null) {
        $this->db->select('DISTINCT(hotels.hotel_id)')
                ->from('hotels')
                ->where('hotels.hotel_active', 1)
                ->where_in('hotels.hotel_id', $hotels_array);
        
        if ($destination) {
            $this->db->where('hotels.location_id', $destination);
        }
        if ($boards || $room_types || $facilities || $sorting_price == "price-asc" || $sorting_price == "price-desc" || $floors) {
            $this->db->join('rooms', 'rooms.hotel_id=hotels.hotel_id');
            $this->db->join('room_types', 'rooms.room_type_id=room_types.room_type_id');
        }
        if($floors){
            $this->db->where_in('rooms.floor', $floors);
        }
        if ($boards) {
            $this->db->where_in('rooms.board_id', $boards);
        }
        if ($room_types) {
            $this->db->like('room_types.room_type_name', $room_types[0]);
            if(count($room_types) > 1){
                for($i = 1; $i < count($room_types); $i++){
                    $this->db->or_like('room_types.room_type_name', $room_types[$i]);
                }
            }
        }
        if ($facilities) {
            // $this->db->join('room_facilities', 'rooms.room_id=room_facilities.room_id');
            $this->db->join('hotel_facilities', 'hotels.hotel_id=hotel_facilities.hotel_id');
            // $this->db->where_in('room_facilities.facility_id', $facilities);
            $this->db->where_in('hotel_facilities.facility_id', $facilities);
        }

        if(isset($sorting_price) || isset($sorting_loc) || isset($sorting_title)){
            if($sorting_title == "title-asc"){
                $this->db->order_by('hotel_name', 'asc');
            }
            else if($sorting_title == "title-desc"){
                $this->db->order_by('hotel_name', 'desc');
            }
            else if($sorting_loc == "loc-asc"){
                $this->db->join('locations', 'hotels.location_id=locations.location_id');
                $this->db->order_by('locations.location_name', 'asc');
            }
            else if($sorting_loc == "loc-desc"){
                $this->db->join('locations', 'hotels.location_id=locations.location_id');
                $this->db->order_by('locations.location_name', 'desc');
            }
        }
        else{
            $this->db->order_by('hotel_name', 'asc');
        }

        if(isset($limit) && isset($start)){
            $this->db->limit($limit, $start);
        }

        $qry = $this->db->get();

        // echo $this->db->last_query();
        // die();

        if ($qry->num_rows() > 0)
            return $qry->result_array();
        return FALSE;
    }

    public function getFHotelTitlesFiltered($hotels_array, $title = null) {
        $this->db->select('DISTINCT(hotels.hotel_id)')
                ->from('hotels')
                ->where('hotels.hotel_active', 1)
                ->where_in('hotels.hotel_id', $hotels_array);
        
        if ($title) {
            $this->db->like('hotels.hotel_name', $title);
        }
        $this->db->order_by('hotel_name', 'asc');
        $qry = $this->db->get();

        // echo $this->db->last_query();
        // die();

        if ($qry->num_rows() > 0)
            return $qry->result_array();
        return FALSE;
    }

    public function getFHotel($hotelId, $langId) {
        $qry = $this->db->select('*')
                ->from('hotels')
                ->join('hotel_locales', 'hotel_locales.hotel_id=hotels.hotel_id')
                ->where('hotel_locales.lang_id', $langId)
                ->where('hotels.hotel_id', $hotelId)
                ->get();
        if ($qry->num_rows() > 0)
            return $qry->row_array();
        return false;
    }

    //pairnw tin kentriki eikona tou hotel
    public function getFHotelImage($hotelId) {
        $qry = $this->db->select('*')
                ->from('hotel_images')
                ->where('hotel_images.hotel_id', $hotelId)
                ->get();
        if ($qry->num_rows() > 0) {
            return $qry->row_array();
        }
        return false;
    }

     //pairnw oles tis eikones tou hotel
     public function getFHotelImages($hotelId) {
        $qry = $this->db->select('*')
                ->from('hotel_images')
                ->where('hotel_images.hotel_id', $hotelId)
                ->get();
        if ($qry->num_rows() > 0) {
            return $qry->result_array();
        }
        return false;
    }

    //pairnw ta hotel thumbs
    public function getFHotelImageThumbs($hotelId) {
        $qry = $this->db->select('hotel_Id', 'image_name', 'is_thumb')
                ->from('hotel_images')
                ->where('hotel_images.hotel_id', $hotelId)
                ->where('hotel_images.is_thumb', '1')
                ->get();
        //echo $this->db->last_query();
        if ($qry->num_rows() > 0) {
            return $qry->result_array();
        }
        return false;
    }

    //pairnw ta facilities toy kathe hotel
    public function getFHotelFacilities($hotelId, $lang_id, $group_categories=false) {
        $this->db->select('hotel_facilities.*, facility_locales.*, facilities.facility_icon, facilities.is_main as fac_is_main, facility_categories.*')
                ->from('hotel_facilities')
                ->where('hotel_id', $hotelId)
                ->join('facilities', 'facilities.facility_id = hotel_facilities.facility_id', 'inner')
                ->join('facility_categories', 'facilities.category_id = facility_categories.id', 'inner')
                ->join('facility_locales', 'facility_locales.facility_id = hotel_facilities.facility_id', 'inner')
                ->where('lang_id', $lang_id);

        if($group_categories){
            // $this->db->group_by('facilities.category_id');
        }
        
        $this->db->order_by("facilities.facility_type", "asc");

        $qry = $this->db->get();

        if ($qry->num_rows() > 0){
            return $qry->result_array();
        }
            
        return false;
    }

    public function getFHotelFacilitiesAndCategories($hotelId, $lang_id, $group_categories=false) {
        $this->db->select('facility_categories.*')
                ->from('facility_categories')
                ->join('facilities', 'facilities.category_id = facility_categories.id', 'inner')
                ->join('hotel_facilities', 'facilities.facility_id = hotel_facilities.facility_id', 'inner')
                ->where('hotel_facilities.hotel_id', $hotelId);

        if($group_categories){
            $this->db->group_by('facility_categories.id');
        }

        $qry = $this->db->get();

        if ($qry->num_rows() > 0){
            $results = $qry->result_array();
            foreach($results as &$res){
                $qry2 = '';
                $this->db->select('facility_locales.*, facilities.facility_icon, facilities.is_main as fac_is_main')
                    ->from('hotel_facilities')
                    ->join('facilities', 'facilities.facility_id = hotel_facilities.facility_id', 'inner')
                    ->join('facility_categories', 'facilities.category_id = facility_categories.id', 'inner')
                    ->join('facility_locales', 'facility_locales.facility_id = hotel_facilities.facility_id', 'inner')
                    ->where('hotel_id', $hotelId)
                    ->where('facility_categories.id', $res['id'])
                    ->where('lang_id', $lang_id);
                $this->db->order_by("facilities.order", "asc");
                $qry2 = $this->db->get();
                if($qry2->num_rows()>0){
                    $res['facilities'] = $qry2->result_array();
                }
            }
            return $results;
        }
            
        return false;
    }

    public function getBHotelFacilitiesAndCategories($hotelId, $group_categories=false) {
        $this->db->select('facility_categories.*')
                ->from('facility_categories')
                ->join('facilities', 'facilities.category_id = facility_categories.id', 'inner')
                ->join('hotel_facilities', 'facilities.facility_id = hotel_facilities.facility_id', 'inner')
                ->where('hotel_facilities.hotel_id', $hotelId);

        if($group_categories){
            $this->db->group_by('facility_categories.id');
        }

        $qry = $this->db->get();

        if ($qry->num_rows() > 0){
            $results = $qry->result_array();
            foreach($results as &$res){
                $qry2 = '';
                $this->db->select('facility_locales.*, facilities.facility_icon, facilities.is_main as fac_is_main')
                    ->from('hotel_facilities')
                    ->join('facilities', 'facilities.facility_id = hotel_facilities.facility_id', 'inner')
                    ->join('facility_categories', 'facilities.category_id = facility_categories.id', 'inner')
                    ->join('facility_locales', 'facility_locales.facility_id = hotel_facilities.facility_id', 'inner')
                    ->where('hotel_id', $hotelId)
                    ->where('facility_categories.id', $res['id']);
                $this->db->order_by("facilities.facility_type", "asc");
                $qry2 = $this->db->get();
                if($qry2->num_rows()>0){
                    $res['facilities'] = $qry2->result_array();
                }
            }
            return $results;
        }
            
        return false;
    }

    //vriskw ta dwmatia gia kathe ksenodoxeio
    public function getFRooms($hotelId) {
        $qry = $this->db->select('rooms.*, room_types.*, ground_plans.*')
                ->from('rooms')
                ->where('hotel_id', $hotelId)
                ->join('ground_plans', 'rooms.ground_plan_id = ground_plans.ground_plan_id', 'left')
                ->join('room_types', 'room_types.room_type_id = rooms.room_type_id', 'inner')
                ->get();
        //echo $this->db->last_query();
        if ($qry->num_rows() > 0)
            return $qry->result_array();
        return false;
    }

    //vriskw ta facilities gia kathe dwmatio
    public function getFRoomsFacilities($room_id, $lang_id) {
        $qry = $this->db->select('rooms.room_id, room_facilities.*, facility_locales.*, facilities.*')
                ->from('rooms')
                ->where('rooms.room_id', $room_id)
                ->join('room_facilities', 'room_facilities.room_id = rooms.room_id', 'inner')
                ->join('facility_locales', 'facility_locales.facility_id = room_facilities.facility_id', 'inner')
                ->join('facilities', 'facilities.facility_id = facility_locales.facility_id')
                ->where('facility_locales.lang_id', $lang_id)
                ->get();
        // echo $this->db->last_query().'<br/>';
        if ($qry->num_rows() > 0)
            return $qry->result_array();
        return false;
    }

   

    public function getHotelPackages($hotel_id){

        $qry = $this->db->select('DISTINCT(packages.*)')
            ->from('packages')
            ->join('rooms', 'packages.package_id = rooms.room_package_id', 'inner')
            ->join('package_periods', 'package_periods.package_id = packages.package_id', 'inner')
            ->where('rooms.hotel_id', $hotel_id)
            ->where('package_periods.package_active', '1')
            ->get();
        
        if ($qry->num_rows() > 0)
            return $qry->result_array();
        return false;

    }

    //vriskw ta prixes gia kathe dwmatio
    public function getFRoomsPrices($room_id) {
        $qry = $this->db->select('rooms.*, packages.package_id, packages.package_type, package_periods.*, room_package_prices.*, room_types.*')
                ->from('rooms')
                ->where('rooms.room_id', $room_id)
                ->join('packages', 'packages.package_id = rooms.room_package_id', 'inner')
                ->join('package_periods', 'package_periods.package_id = packages.package_id', 'inner')
                ->join('room_types', 'room_types.room_type_id = rooms.room_type_id', 'inner')
                ->where('package_periods.package_active', '1')
                ->join('room_package_prices', 'room_package_prices.package_period_id = package_periods.package_period_id', 'inner')
                ->get();
        // echo $this->db->last_query().'<br/>';
        if ($qry->num_rows() > 0)
            return $qry->result_array();
        return false;
    }

    public function getHotels() {
        $qry = $this->db->select('*')
                ->from('hotels')
                ->get();

        if ($qry->num_rows() > 0)
            return $qry->result_array();
        return false;
    }

    public function getHotel($hotelId) {
        $qry = $this->db->select('*')
                ->from('hotels')
                ->where('hotels.hotel_id', $hotelId)
                ->get();
        if ($qry->num_rows() > 0)
            return $qry->row_array();
        return false;
    }

    public function getHotelLocales($hotelId) {
        $qry = $this->db->select('*')
                ->from('hotel_locales')
                ->where('hotel_id', $hotelId)
                ->get();
        if ($qry->num_rows() > 0)
            return $qry->result_array();
        return false;
    }

    public function getHotelFacilities($hotelId) {
        $qry = $this->db->select('*')
                ->from('hotel_facilities')
                ->where('hotel_id', $hotelId)
                ->get();
        if ($qry->num_rows() > 0)
            return $qry->result_array();
        return false;
    }

    public function getImages($hotelId) {
        $qry = $this->db->select('*')
                ->from('hotel_images')
                ->where('hotel_id', $hotelId)
                ->get();
        if ($qry->num_rows() > 0)
            return $qry->result_array();
        return false;
    }

    public function setThumbImage($hotel_id, $hotel_image_id) {
        $this->db->where('hotel_id', $hotel_id)->update('hotel_images', array('is_thumb' => 0));
        $this->db->where('hotel_image_id', $hotel_image_id)->update('hotel_images', array('is_thumb' => 1));
        if ($this->db->affected_rows() == 1)
            return TRUE;
        return FALSE;
    }

    public function addImage($hotelData) {
        $this->db->insert('hotel_images', $hotelData);
        if ($this->db->affected_rows() == 1)
            return $this->db->insert_id();
        return FALSE;
    }

    public function deleteImage($imageId) {
        $this->db->delete('hotel_images', array('hotel_image_id' => $imageId));
        if ($this->db->affected_rows() == 1)
            return TRUE;
        return FALSE;
    }

    public function addHotel($hotelData) {
        $this->db->insert('hotels', $hotelData);
        if ($this->db->affected_rows() == 1)
            return $this->db->insert_id();
        return FALSE;
    }

    public function addHotelLocale($hotelLocale) {
        $this->db->insert('hotel_locales', $hotelLocale);
        if ($this->db->affected_rows() == 1)
            return TRUE;
        return FALSE;
    }

    public function addHotelFacilities($hotelFacility) {
        $this->db->insert('hotel_facilities', $hotelFacility);
        if ($this->db->affected_rows() == 1)
            return TRUE;
        return FALSE;
    }

    public function editHotel($hotelData) {
        $this->db->where('hotel_id', $hotelData['hotel_id'])->update('hotels', $hotelData);
        if ($this->db->affected_rows() == 1)
            return TRUE;
        return FALSE;
    }

    public function editHotelLocale($hotelLocale) {
        $this->db->where('hotel_id', $hotelLocale['hotel_id'])->where('lang_id', $hotelLocale['lang_id'])->update('hotel_locales', $hotelLocale);
        if ($this->db->affected_rows() == 1)
            return TRUE;
        return FALSE;
    }

    public function deleteHotel($hotelId) {
        $this->db->delete('hotel_locales', array('hotel_id' => $hotelId));
        $this->db->delete('hotels', array('hotel_id' => $hotelId));
        if ($this->db->affected_rows() > 0)
            return true;
        return false;
    }

    public function deleteHotelFacilities($hotelId) {
        $this->db->delete('hotel_facilities', array('hotel_id' => $hotelId));
        if ($this->db->affected_rows() > 0)
            return true;
        return false;
    }

}
