<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Dashboard
 *
 * @author George-pc
 */
class Dashboard extends MY_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('hotel_model');
        $this->load->model('room_model');
    }

    public function index() {
        $this->load->admintemplate('backend/dashboard_view', $this->view_data);
    }


}
