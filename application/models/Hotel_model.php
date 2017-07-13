<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Hotels
 *
 * @author George-pc
 */
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

    /*
      public function getFHotels($limit, $start, $lang_id) {
      $qry = $this->db->select('*')
      ->from('hotels')
      ->join('hotel_locales', 'hotel_locales.hotel_id=hotels.hotel_id')
      ->join('locations', 'locations.location_id=hotels.location_id')
      ->join('location_locales', 'location_locales.location_id=locations.location_id')
      ->where('hotel_active', 1)
      ->where('hotel_locales.lang_id', $lang_id)
      ->where('location_locales.lang_id', $lang_id)
      ->limit($limit, $start)
      ->get();

      if ($qry->num_rows() > 0)
      return $qry->result_array();
      return false;
      }
     * 
     */

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

    public function getFHotels($checkin = null, $checkout = null, $adults = null, $packageType = null, $package_id = null, $limit, $start, $lang_id) {
        $this->db->select('DISTINCT(hotels.hotel_id)')
                ->from('hotels')
                ->join('rooms', 'rooms.hotel_id=hotels.hotel_id')
                ->where('rooms.room_active', 1)
                ->where('hotels.hotel_active', 1)
                ->limit($limit, $start);

        if ($packageType) {
            $this->db->where('rooms.room_package_id', $packageType);
        }
        if ($package_id && $adults) {
            $this->db->join('room_package_prices', 'room_package_prices.room_id=rooms.room_id');
            $this->db->where('room_package_prices.package_period_id', $package_id);
            $this->db->where('room_package_prices.adults', $adults);
            $this->db->where('room_package_prices.price>', 0);
        }

        $qry = $this->db->get();
        if ($qry->num_rows() > 0)
            return $qry->result_array();
        return FALSE;
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

    public function getFHotelsFiltered($hotels_array, $destination = null, $boards = null, $room_types = null, $facilities = null) {
        $this->db->select('DISTINCT(hotels.hotel_id)')
                ->from('hotels')
                ->where('hotels.hotel_active', 1)
                ->where_in('hotels.hotel_id', $hotels_array);

        if ($destination) {
            $this->db->where('hotels.location_id', $destination);
        }

        if ($boards || $room_types || $facilities) {
            $this->db->join('rooms', 'rooms.hotel_id=hotels.hotel_id');
        }

        if ($boards) {
            $this->db->where_in('rooms.board_id', $boards);
        }

        if ($room_types) {
            $this->db->where_in('rooms.room_type_id', $room_types);
        }

        if ($facilities) {
            $this->db->join('room_facilities', 'rooms.room_id=room_facilities.room_id');
            $this->db->where_in('room_facilities.facility_id', $facilities);
        }

        $qry = $this->db->get();
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

    //pairnw ta facilities toy kathe gotel
    public function getFHotelFacilities($hotelId, $lang_id) {
        $qry = $this->db->select('hotel_facilities.*, facility_locales.*')
                ->from('hotel_facilities')
                ->where('hotel_id', $hotelId)
                ->join('facility_locales', 'facility_locales.facility_id = hotel_facilities.facility_id', 'inner')
                ->where('lang_id', $lang_id)
                ->get();

        //echo $this->db->last_query();
        if ($qry->num_rows() > 0)
            return $qry->result_array();
        return false;
    }

    //vriskw ta dwmatia gia kathe ksenodoxeio
    public function getFRooms($hotelId) {
        $qry = $this->db->select('rooms.*, room_types.*')
                ->from('rooms')
                ->where('hotel_id', $hotelId)
                ->join('room_types', 'room_types.room_type_id = rooms.room_type_id', 'inner')
                ->get();
        //echo $this->db->last_query();
        if ($qry->num_rows() > 0)
            return $qry->result_array();
        return false;
    }

    //vriskw ta facilities gia kathe dwmatio
    public function getFRoomsFacilities($room_id, $lang_id) {
        $qry = $this->db->select('rooms.room_id, room_facilities.*, facility_locales.*')
                ->from('rooms')
                ->where('rooms.room_id', $room_id)
                ->join('room_facilities', 'room_facilities.room_id = rooms.room_id', 'inner')
                ->join('facility_locales', 'facility_locales.facility_id = room_facilities.facility_id', 'inner')
                ->where('facility_locales.lang_id', $lang_id)
                ->get();
        // echo $this->db->last_query().'<br/>';
        if ($qry->num_rows() > 0)
            return $qry->result_array();
        return false;
    }

    //vriskw ta prixes gia kathe dwmatio
    public function getFRoomsPrices($room_id) {
        $qry = $this->db->select('rooms.*, packages.package_id, package_periods.*, room_package_prices.*, room_types.*')
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
