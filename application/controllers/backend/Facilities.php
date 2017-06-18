<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Facilities
 *
 * @author George-pc
 */
class Facilities extends MY_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('facility_model');
        $this->load->model('language_model');
    }

    public function index() {
        $this->showFacilities();
    }

    public function showFacilities() {
        $facilities = $this->facility_model->getFacilities();
        $this->view_data['facilities'] = $facilities;
        $this->load->admintemplate('backend/facilities/facilities_view', $this->view_data);
    }

    public function addFacility() {
        $this->form_validation->set_rules('facility_type', 'Facility Type', 'required|trim');
        $languages = $this->language_model->getLanguages();

        if (!$languages || empty($languages)) {
            $this->session->set_flashdata('error', 'You need to add at least one language in order to add facilities');
            redirect($this->admin_url . 'languages');
        }

        if ($this->form_validation->run() == FALSE) {
            $this->view_data['languages'] = $languages;
            $this->load->admintemplate('backend/facilities/add_facility_view', $this->view_data);
        } else {
            $facility_locale = array();
            foreach ($languages as $language) {
                $temp = array();
                $temp['facility_name'] = $this->input->post('facility_name_' . $language['lang_id']);
                $temp['lang_id'] = $language['lang_id'];
                array_push($facility_locale, $temp);
            }
            $facilityData['facility_type'] = $this->input->post('facility_type');

            if ($_FILES['facility_icon']['error'] == 0) {
                $image_name = strtotime(date('Y-m-d H:i:s')) . "_" . basename($_FILES["facility_icon"]["name"]);
                $target_file = $this->upload_dir . $image_name;
                $uploadOk = 1;
                $imageFileType = pathinfo($target_file, PATHINFO_EXTENSION);

                if ($_FILES["facility_icon"]["size"] > 500000) {
                    $uploadOk = 0;
                }
                if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif" && $imageFileType != "JPG" && $imageFileType != "PNG" && $imageFileType != "JPEG" && $imageFileType != "GIF") {
                    $uploadOk = 0;
                }
                if ($uploadOk == 0) {
                    
                } else {
                    if (move_uploaded_file($_FILES["facility_icon"]["tmp_name"], $target_file)) {
                        $facilityData['facility_icon'] = $image_name;
                    }
                }
            }
            $facility_id = $this->facility_model->addFacility($facilityData);

            if ($facility_id && is_numeric($facility_id)) {
                foreach ($facility_locale as $f_l_key => $f_l) {
                    $facility_locale[$f_l_key]['facility_id'] = $facility_id;
                    $this->facility_model->addFacilityLocale($facility_locale[$f_l_key]);
                }
                $this->session->set_flashdata('message', 'Row inserted');
            } else {
                $this->session->set_flashdata('error', 'Row problem');
            }
            redirect($this->admin_url . 'facilities');
        }
    }

    public function editFacility() {
        $this->form_validation->set_rules('facility_type', 'Facility Type', 'required|trim');
        $languages = $this->language_model->getLanguages();

        if ($this->form_validation->run() == FALSE) {
            $facilityId = $this->uri->segment(4);
            $facilityData = $this->facility_model->getFacility($facilityId);
            $tempFacilityLocales = $this->facility_model->getFacilityLocales($facilityId);
            $facilityLocales = array();
            foreach ($tempFacilityLocales as $f_l_key => $f_l) {
                $facilityLocales[$f_l['lang_id']] = $f_l;
            }
            $this->view_data['facility'] = $facilityData;
            $this->view_data['facilityLocale'] = $facilityLocales;
            $this->view_data['languages'] = $languages;
            $this->load->admintemplate('backend/facilities/edit_facility_view', $this->view_data);
        } else {
            $facility_locale = array();
            foreach ($languages as $language) {
                $temp = array();
                $temp['facility_name'] = $this->input->post('facility_name_' . $language['lang_id']);
                $temp['lang_id'] = $language['lang_id'];
                array_push($facility_locale, $temp);
            }

            $facilityId = $this->input->post('facility_id');
            $facilityData['facility_id'] = $facilityId;
            $facilityData['facility_type'] = $this->input->post('facility_type');

            if ($_FILES['facility_icon']['error'] == 0) {
                $facilityData = $this->facility_model->getFacility($facilityId);
                unlink($this->upload_dir . $facilityData['facility_icon']);
                $image_name = strtotime(date('Y-m-d H:i:s')) . "_" . basename($_FILES["facility_icon"]["name"]);
                $target_file = $this->upload_dir . $image_name;
                $uploadOk = 1;
                $imageFileType = pathinfo($target_file, PATHINFO_EXTENSION);

                if ($_FILES["facility_icon"]["size"] > 500000) {
                    $uploadOk = 0;
                }
                if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif" && $imageFileType != "JPG" && $imageFileType != "PNG" && $imageFileType != "JPEG" && $imageFileType != "GIF") {
                    $uploadOk = 0;
                }
                if ($uploadOk == 0) {
                    
                } else {
                    if (move_uploaded_file($_FILES["facility_icon"]["tmp_name"], $target_file)) {
                        $facilityData['facility_icon'] = $image_name;
                    }
                }
            }

            $this->facility_model->editFacility($facilityData);

            if ($facilityData['facility_id'] && is_numeric($facilityData['facility_id'])) {
                foreach ($facility_locale as $f_l_key => $f_l) {
                    $facility_locale[$f_l_key]['facility_id'] = $facilityData['facility_id'];
                    $this->facility_model->editFacilityLocale($facility_locale[$f_l_key]);
                }
                $this->session->set_flashdata('message', 'Row updated');
            } else {
                $this->session->set_flashdata('error', 'Row problem');
            }
            redirect($this->admin_url . 'facilities');
        }
    }

    public function deleteFacility() {
        $facilityId = $this->uri->segment(4);

        if ($facilityId && is_numeric($facilityId)) {
            if ($this->facility_model->deleteFacility($facilityId)) {
                $this->session->set_flashdata('message', 'Row Deleted');
            } else {
                $this->session->set_flashdata('error', 'Row Locale Problem');
            }
        } else {
            $this->session->set_flashdata('error', 'Row Problem');
        }
        redirect($this->admin_url . 'facilities');
    }

}
