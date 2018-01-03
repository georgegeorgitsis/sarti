<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Languages
 *
 * @author George-pc
 */
class Locations extends MY_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('language_model');
        $this->load->model('location_model');
    }

    public function index() {
        $this->showLocations();
    }

    public function showLocations() {
        $locations = $this->location_model->getLocations();
        $this->view_data['locations'] = $locations;
        $this->load->admintemplate('backend/locations/locations_view', $this->view_data);
    }

    public function addLocation() {
        $this->form_validation->set_rules('location_name', 'Location name', 'required|trim');
        $languages = $this->language_model->getLanguages();

        if (!$languages || empty($languages)) {
            $this->session->set_flashdata('error', 'You need to add at least one language in order to add packages');
            redirect($this->admin_url . 'languages');
        }

        if ($this->form_validation->run() == FALSE) {
            $this->view_data['languages'] = $languages;
            $this->load->admintemplate('backend/locations/add_location_view', $this->view_data);
        } else {
            $locationData['location_name'] = $this->input->post('location_name');

            $location_locale = array();
            foreach ($languages as $language) {
                $temp = array();
                $temp['location_name'] = $this->input->post('location_name_' . $language['lang_id']);
                $temp['lang_id'] = $language['lang_id'];
                array_push($location_locale, $temp);
            }

            $location_id = $this->location_model->addLocation($locationData);
            if ($location_id) {
                foreach ($location_locale as $p_l_key => $p_l) {
                    $location_locale[$p_l_key]['location_id'] = $location_id;
                    $this->location_model->addLocationLocale($location_locale[$p_l_key]);
                }

                $this->session->set_flashdata('message', 'Row inserted');
            } else {
                $this->session->set_flashdata('error', 'Row problem');
            }
            redirect($this->admin_url . 'locations');
        }
    }

    public function editLocation() {
        $this->form_validation->set_rules('location_name', 'Location name', 'required|trim');
        $languages = $this->language_model->getLanguages();
        
        if ($this->form_validation->run() == FALSE) {
            $locationId = $this->uri->segment(4);
            $locationData = $this->location_model->getLocation($locationId);
            $tempLocationLocales = $this->location_model->getLocationLocales($locationId);
            $locationLocales = array();
            if($tempLocationLocales && count($tempLocationLocales) > 0){
                foreach ($tempLocationLocales as $p_l_key => $p_l) {
                    $locationLocales[$p_l['lang_id']] = $p_l;
                }
            }

            $this->view_data['location'] = $locationData;
            $this->view_data['locationLocales'] = $locationLocales;
            $this->view_data['languages'] = $languages;
            $this->load->admintemplate('backend/locations/edit_location_view', $this->view_data);
        } else {
            $locationData['location_id'] = $this->input->post('location_id');
            $locationData['location_name'] = $this->input->post('location_name');

            $location_locale = array();
            foreach ($languages as $language) {
                $temp = array();
                $temp['location_name'] = $this->input->post('location_name_' . $language['lang_id']);
                $temp['lang_id'] = $language['lang_id'];
                array_push($location_locale, $temp);
            }

            $this->location_model->editLocation($locationData);

            if ($locationData['location_id']) {
                foreach ($location_locale as $p_l_key => $p_l) {
                    $location_locale[$p_l_key]['location_id'] = $locationData['location_id'];
                    var_dump($this->location_model->editLocationLocale($location_locale[$p_l_key]));
                    var_dump($location_locale[$p_l_key]);
                }
                die();
                $this->session->set_flashdata('message', 'Row updated');
            } else {
                $this->session->set_flashdata('error', 'Row problem');
            }
            redirect($this->admin_url . 'locations');
        }
    }

    public function deleteLocation() {
        $locationId = $this->uri->segment(4);

        if ($this->location_model->deleteLocation($locationId)) {
            $this->session->set_flashdata('message', 'Location deleted');
        } else {
            $this->session->set_flashdata('error', 'There was an error and we couldn\'t delete the language');
        }

        redirect($this->admin_url . 'locations');
    }

}
