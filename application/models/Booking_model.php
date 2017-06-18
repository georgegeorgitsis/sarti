<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Booking_model
 *
 * @author george
 */
class Booking_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    public function getBookings() {
        $qry = $this->db->select('*')
                ->from('bookings')
                ->join('clients', 'bookings.client_id=clients.client_id')
                ->join('hotels', 'bookings.hotel_id=hotels.hotel_id')
                ->join('rooms', 'bookings.room_id=rooms.room_id')
                ->get();
        if ($qry->num_rows() > 0)
            return $qry->result_array();
        return FALSE;
    }

    public function getBooking($bookingId) {
        $qry = $this->db->select('*')
                ->from('bookings')
                ->join('clients', 'bookings.client_id=clients.client_id')
                ->where('bookings.booking_id', $bookingId)
                ->get();
        if ($qry->num_rows() > 0)
            return $qry->row_array();
        return FALSE;
    }

}
