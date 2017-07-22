<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of hotels
 *
 * @author George-pc
 */
class Hotels extends MY_F_Controller {

    protected $conf;
    protected $page;
    protected $hotels;
    protected $hotel_ids;

    public function __construct() {
        parent::__construct();
        $this->load->model('hotel_model');
    }

    public function index() {
        $this->session->unset_userdata('search');
        $this->getHotel_ids();
        $this->parseHotels();
        $this->view_data['hotels'] = $this->hotels;
        $this->load->template('frontend/hotels_view', $this->view_data);
    }

    public function searchHotels() {
        $this->session->unset_userdata('search');
        $this->view_data['is_search'] = 1;
        $packageType = $this->uri->segment(3);
        $package_id = null;
        $checkin = null;
        $checkout = null;
        if ($packageType == 1) {
            $checkin = $this->input->get('checkin');
            $checkout = $this->input->get('checkout');
        } else {
            $package_id = $this->input->get('p');
        }
        $adults = $this->input->get('a');

        $search['packageType'] = $packageType;
        $search['package_id'] = $package_id;
        $search['checkin'] = $checkin;
        $search['checkout'] = $checkout;
        $search['adults'] = $adults;
        $this->session->set_userdata('search', $search);

        $this->getHotel_ids($checkin, $checkout, $adults, $packageType, $package_id);
        $this->parseHotels();
        $this->view_data['hotels'] = $this->hotels;
        $this->load->template('frontend/hotels_view', $this->view_data);
    }

    protected function getHotel_ids($checkin = null, $checkout = null, $adults = null, $packageType = null, $package_id = null) {
        $this->paginateHotels();
        if (!$checkin && !$checkout) {
            $this->hotel_ids = $this->hotel_model->getFHotels($checkin, $checkout, $adults, $packageType, $package_id, $this->conf['per_page'], $this->page, $this->lang_id);
        } elseif ($checkin && $checkout) {
            $begin = new DateTime($checkin);
            $end = new DateTime($checkout);

            $interval = DateInterval::createFromDateString('1 day');
            $period = new DatePeriod($begin, $interval, $end);

            $legit_packages = array();
            foreach ($period as $dt) {
                $legit_day_packages = array();
                $day = $dt->format("Y-m-d");
                $periods_found = $this->hotel_model->findFPackagePeriodsPerDay($day);

                if ($periods_found) {
                    foreach ($periods_found as $p_f_key => $p_f) {
                        array_push($legit_day_packages, $p_f['package_id']);
                    }
                }
                array_push($legit_packages, $legit_day_packages);
            }

            $first = $legit_packages[0];
            for ($i = 1; $i < count($legit_packages); $i++) {
                $result = array_intersect($first, $legit_packages[$i]);
                $first = $result;
            }
            
        } 
    }

    protected function parseHotels() {
        if (isset($this->hotel_ids) && !empty($this->hotel_ids)) {
            foreach ($this->hotel_ids as $hotel) {
                $hotel_id = $hotel['hotel_id'];
                $this->hotels[$hotel_id] = $this->hotel_model->getFHotel($hotel_id, $this->lang_id);
                $this->hotels[$hotel_id]['thumb'] = $this->hotel_model->getHotelThumb($hotel_id);
                $this->hotels[$hotel_id]['main_facilities'] = $this->hotel_model->getFHotelMainFacilities($hotel_id, $this->lang_id);
                //$this->hotels[$hotel_id]['rooms'] = $this->hotel_model->getFHotelRooms($hotel_id, $this->lang_id);
                $location_name = $this->hotel_model->getFHotelLocationName($hotel_id, $this->lang_id);
                $this->hotels[$hotel_id]['location_name'] = $location_name['location_name'];
            }
        }
    }

    public function filterHotels($destination = null, $boards = null, $room_types = null, $facilities = null) {
        $hotels_array = array();
        foreach ($this->hotel_ids as $h_id) {
            array_push($hotels_array, $h_id['hotel_id']);
        }

        if ($hotels_array && !empty($hotels_array)) {
            $this->hotel_ids = $this->hotel_model->getFHotelsFiltered($hotels_array, $destination, $boards, $room_types, $facilities);
            $this->parseHotels();
            $this->view_data['hotels'] = $this->hotels;
            $hotels_view = $this->load->view('frontend/hotels_list', $this->view_data, TRUE);
            echo $hotels_view;
        }
    }

    public function ajaxFilters() {
        if ($this->input->is_ajax_request()) {
            $this->handleSessionSearch();
            $destination = $this->input->post('destination');
            $boards = $this->input->post('boards');
            $room_types = $this->input->post('room_types');
            $facilities = $this->input->post('facilities');

            $this->filterHotels($destination, $boards, $room_types, $facilities);
        }
    }

    protected function handleSessionSearch() {
        $search = $this->session->userdata('search');
        $package_id = null;
        $checkin = null;
        $checkout = null;
        $adults = null;
        if (isset($search) && !empty($search)) {
            if ($search['packageType'] == 1) {
                $checkin = $search['checkin'];
                $checkout = $search['checkout'];
                $adults = $search['adults'];
            } else {
                $packageType = $search['packageType'];
                $package_id = $search['package_id'];
                $adults = $search['adults'];
            }
            $this->getHotel_ids($checkin, $checkout, $adults, $packageType, $package_id);
        } else {
            $this->getHotel_ids();
        }
    }

    protected function paginateHotels() {
        $hotelsCount = $this->hotel_model->getFHotelsCount();
        $this->load->library('pagination');
        $this->conf['base_url'] = base_url('hotels');
        $this->conf['total_rows'] = $hotelsCount['count'];
        $this->conf['per_page'] = 10;
        $this->conf["uri_segment"] = 3;
        $this->pagination->initialize($this->conf);
        $this->page = ($this->input->get('page')) ? $this->input->get('page') : 0;
        $this->view_data['links'] = $this->pagination->create_links();
    }

}
