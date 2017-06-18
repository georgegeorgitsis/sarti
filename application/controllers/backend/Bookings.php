<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Bookings
 *
 * @author george
 */
class Bookings extends MY_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('booking_model');
    }

    public function index() {
        $this->showBookings();
    }

    public function showBookings() {
        $bookings = $this->booking_model->getBookings();
        $this->view_data['bookings'] = $bookings;
        $this->load->admintemplate('backend/bookings/bookings_view', $this->view_data);
    }

}
