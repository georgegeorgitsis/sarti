<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Room_model
 *
 * @author George-pc
 */
class Room_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    public function getRooms() {
        $qry = $this->db->select('*')
                ->from('rooms')
                ->join('hotels', 'rooms.hotel_id=hotels.hotel_id')
                ->get();

        if ($qry->num_rows() > 0)
            return $qry->result_array();
        return false;
    }

    public function getRoomTypes() {
        $qry = $this->db->select('*')
                ->from('room_types')
                ->get();

        if ($qry->num_rows() > 0)
            return $qry->result_array();
        return false;
    }

    public function getRoom($roomId) {
        $qry = $this->db->select('*')
                ->from('rooms')
                ->where('rooms.room_id', $roomId)
                ->join('hotels', 'rooms.hotel_id=hotels.hotel_id')
                ->get();
        if ($qry->num_rows() > 0)
            return $qry->row_array();
        return false;
    }

    public function getRoomType($roomTypeId) {
        $qry = $this->db->select('*')
                ->from('room_types')
                ->where('room_type_id', $roomTypeId)
                ->get();
        if ($qry->num_rows() > 0)
            return $qry->row_array();
        return false;
    }

    public function getRoomLocales($roomId) {
        $qry = $this->db->select('*')
                ->from('room_locales')
                ->where('room_id', $roomId)
                ->get();
        if ($qry->num_rows() > 0)
            return $qry->result_array();
        return false;
    }

    public function getRoomFacilities($roomId) {
        $qry = $this->db->select('*')
                ->from('room_facilities')
                ->where('room_id', $roomId)
                ->get();
        if ($qry->num_rows() > 0)
            return $qry->result_array();
        return false;
    }

    public function getRoomPeriodPrices($roomId, $packagePeriodId, $adults) {
        $qry = $this->db->select('*')
                ->from('room_package_prices')
                ->where('room_package_prices.room_id', $roomId)
                ->where('room_package_prices.package_period_id', $packagePeriodId)
                ->where('room_package_prices.adults', $adults)
                ->get();
        if ($qry->num_rows() > 0)
            return $qry->row_array();
        return false;
    }


    public function getRoomPeriodPricesWithoutAd($roomId, $packagePeriodId) {
        $qry = $this->db->select('*')
                ->from('room_package_prices')
                ->where('room_package_prices.room_id', $roomId)
                ->where('room_package_prices.package_period_id', $packagePeriodId)
                ->order_by('room_package_prices.price', 'ASC')
                ->get();
        if ($qry->num_rows() > 0)
            return $qry->result_array();
        return false;
    }

    public function getGroundPlans() {
        $qry = $this->db->select('*')
                ->from('ground_plans')
                ->get();
        if ($qry->num_rows() > 0)
            return $qry->result_array();
        return FALSE;
    }

    public function addGroundPlan($roomData) {
        $this->db->insert('ground_plans', $roomData);
        if ($this->db->affected_rows() == 1)
            return $this->db->insert_id();
        return FALSE;
    }

    public function deleteGroundPlan($groundPlanId) {
        $this->db->delete('ground_plans', array('ground_plan_id' => $groundPlanId));
        if ($this->db->affected_rows() == 1)
            return TRUE;
        return FALSE;
    }

    public function getImages($hotelId) {
        $qry = $this->db->select('*')
                ->from('room_images')
                ->where('room_id', $hotelId)
                ->get();
        if ($qry->num_rows() > 0)
            return $qry->result_array();
        return false;
    }

    public function addImage($roomData) {
        $this->db->insert('room_images', $roomData);
        if ($this->db->affected_rows() == 1)
            return $this->db->insert_id();
        return FALSE;
    }

    public function setThumbImage($room_image_id) {
        $this->db->update('room_images', array('is_thumb' => 0));
        $this->db->where('room_image_id', $room_image_id)->update('room_images', array('is_thumb' => 1));
        if ($this->db->affected_rows() == 1)
            return TRUE;
        return FALSE;
    }

    public function deleteImage($imageId) {
        $this->db->delete('room_images', array('room_image_id' => $imageId));
        if ($this->db->affected_rows() == 1)
            return TRUE;
        return FALSE;
    }

    public function addRoom($roomData) {
        $this->db->insert('rooms', $roomData);
        if ($this->db->affected_rows() == 1)
            return $this->db->insert_id();
        return FALSE;
    }

    public function addRoomType($roomTypeData) {
        $this->db->insert('room_types', $roomTypeData);
        if ($this->db->affected_rows() == 1)
            return $this->db->insert_id();
        return FALSE;
    }

    public function addRoomLocale($roomLocale) {
        $this->db->insert('room_locales', $roomLocale);
        if ($this->db->affected_rows() == 1)
            return TRUE;
        return FALSE;
    }

    public function addRoomFacilities($roomFacility) {
        $this->db->insert('room_facilities', $roomFacility);
        if ($this->db->affected_rows() == 1)
            return TRUE;
        return FALSE;
    }

    public function addRoomPriceForPeriod($roomPrice) {
        $this->db->insert('room_package_prices', $roomPrice);
        if ($this->db->affected_rows() == 1)
            return TRUE;
        return FALSE;
    }

    public function deleteRoomPrices($roomId, $packagePeriodId) {
        $this->db->delete('room_package_prices', array('room_id' => $roomId, 'package_period_id' => $packagePeriodId));
        if ($this->db->affected_rows() > 0)
            return true;
        return false;
    }

    public function editRoom($roomData) {
        $this->db->where('room_id', $roomData['room_id'])->update('rooms', $roomData);
        if ($this->db->affected_rows() == 1)
            return TRUE;
        return FALSE;
    }

    public function editRoomType($roomTypeData) {
        $this->db->where('room_type_id', $roomTypeData['room_type_id'])->update('room_types', $roomTypeData);
        if ($this->db->affected_rows() == 1)
            return TRUE;
        return FALSE;
    }

    public function editRoomLocale($roomLocale) {
        $this->db->where('room_id', $roomLocale['room_id'])->where('lang_id', $roomLocale['lang_id'])->update('room_locales', $roomLocale);
        if ($this->db->affected_rows() == 1)
            return TRUE;
        return FALSE;
    }

    public function deleteRoom($roomId) {
        $this->db->delete('room_locales', array('room_id' => $roomId));
        $this->db->delete('rooms', array('room_id' => $roomId));
        if ($this->db->affected_rows() > 0)
            return true;
        return false;
    }

    public function deleteRoomType($roomTypeId) {
        $this->db->delete('room_types', array('room_type_id' => $roomTypeId));
        if ($this->db->affected_rows() > 0)
            return true;
        return false;
    }

    public function deleteRoomFacilities($roomId) {
        $this->db->delete('room_facilities', array('room_id' => $roomId));
        if ($this->db->affected_rows() > 0)
            return true;
        return false;
    }

    public function deleteRoomPackagePrices($roomId) {
        $this->db->delete('room_package_prices', array('room_id' => $roomId));
        if ($this->db->affected_rows() > 0)
            return true;
        return false;
    }

}
